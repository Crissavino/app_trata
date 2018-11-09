<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Validation\Rule;

class FormsController extends Controller
{

	public function index()
	{
		return view('formularios.index');
	}

	//con esta funcion obtengo una viste de todos los formularios guardados en la base de datos
	public function formularios()
	{
		//quiero acceder a los formularios que cargo cada usuario
		$userId = auth()->user()->id;
		$aFormPorId = DB::table('aformularios')
											->WHERE('user_id', '=', $userId)
											->ORDERBY('updated_at')
											->get();
		$bFormPorId = DB::table('bformularios')
											->WHERE('user_id', '=', $userId)
											->ORDERBY('updated_at')
											->get();
		//datos del formulario C
	        // $cFormPorId = DB::table('cformularios')
									// 			->WHERE('cformularios.user_id', '=', $userId)
									// 			->ORDERBY('updated_at')
									// 			->get();

			$cFormPorId = DB::table('cformularios')
												->WHERE('cformularios.user_id', '=', $userId)
												->WHERE('cformularios.deleted_at', '=', null)
												->JOIN('cformulario_conviviente', 'cformularios.id', '=', 'cformulario_conviviente.cformulario_id')
												->JOIN('convivientes', 'cformulario_conviviente.conviviente_id', '=', 'convivientes.id')
												->ORDERBY('convivientes.updated_at', 'desc')
												->get();
		//hasta aca


		// $aFormularios = \App\FormA\Aformulario::all();
		// $bFormularios = \App\FormB\Bformulario::all();		

		return view('formularios.formularios', ['aFormPorId' => $aFormPorId,
												'bFormPorId' => $bFormPorId,
												'cFormPorId' => $cFormPorId]);
	}

	public function createA()
	{
		//aca voy a tener que llamar a todos los modelos de los que saque datos
		$datosModalidad = \App\FormA\Modalidad::all();
		$datosEstadoCaso = \App\FormA\Estadocaso::all();
		$datosCaratulacion = \App\FormA\Caratulacionjudicial::all();
		$datosProfesional = \App\FormA\Profesional::all();
		$datosIntervieneActualmente = \App\FormA\Profesionalactualmente::all();
		$datosPresentacion = \App\FormA\Presentacionespontanea::all();
		$datosOrganismo = \App\FormA\Otrosorganismo::all();
		$ultimoNroCarpeta = DB::table('aformularios')->orderBy('datos_numero_carpeta', 'desc')
		                                             ->first()
		                                             ->datos_numero_carpeta;		

		return view('formularios.formularioA', ['datosModalidad' => $datosModalidad,
												'datosEstadoCaso' => $datosEstadoCaso,
												'datosCaratulacion' => $datosCaratulacion,
												'datosProfesional' => $datosProfesional,
												'datosIntervieneActualmente' => $datosIntervieneActualmente,
												'datosPresentacion' => $datosPresentacion,
												'datosOrganismo' => $datosOrganismo,
												'ultimoNroCarpeta' => $ultimoNroCarpeta,
												]);
	}

	public function insertA()
	{
		$userId = auth()->user()->id;
		
		//esta fecha es la del momento
		$fecha_hoy = Carbon::now();

		request()->validate([
							'datos_nombre_referencia' => 'required',
							'datos_numero_carpeta' => 'required',
							'datos_fecha_ingreso' => 'required|date|before_or_equal:'.$fecha_hoy,
							'modalidad_id' => 'required',
							'estadocaso_id' => 'required',
							'datos_ente_judicial' => 'required',
							'caratulacionjudicial_id' => 'required',
							'datos_nro_causa' => 'required',
							'profesional_id.*' => 'nullable',
							'profesional_id.0' => 'required',
							'datos_profesional_interviene_desde.*' => 'nullable|date|after_or_equal:datos_fecha_ingreso',
							'datos_profesional_interviene_desde.0' => 'required|date|after_or_equal:datos_fecha_ingreso',
							'datos_profesional_interviene_hasta.*' => 'nullable|date|after_or_equal:datos_profesional_interviene_desde.*',
							'datos_profesional_interviene_hasta.0' => 'nullable|date|after_or_equal:datos_profesional_interviene_desde.0',
							'profesionalactualmente_id.*' => 'nullable',
							'profesionalactualmente_id.0' => 'required',
						],
						[		

							'datos_nombre_referencia.required' => 'Este campo es obligatorio',
							'datos_numero_carpeta.required' => 'Este campo es obligatorio',
							'datos_fecha_ingreso.required' => 'Este campo es obligatorio',
							'datos_fecha_ingreso.before_or_equal' => 'La fecha ingresada es posterior al dia de hoy',
							'modalidad_id.required' => 'Este campo es obligatorio',
							'estadocaso_id.required' => 'Este campo es obligatorio',
							'datos_ente_judicial.required' => 'Este campo es obligatorio',
							'caratulacionjudicial_id.required' => 'Este campo es obligatorio',
							'datos_nro_causa.required' => 'Este campo es obligatorio',
							'profesional_id.*.required' => 'Este campo es obligatorio',
							'datos_profesional_interviene_desde.*.required' => 'Este campo es obligatorio',
							'datos_profesional_interviene_desde.*.after_or_equal' => 'Se ingresó una fecha anterior a la fecha de ingreso del caso',
							'datos_profesional_interviene_hasta.*.required' => 'Este campo es obligatorio',
							'datos_profesional_interviene_hasta.*.after_or_equal' => 'Se ingresó un fecha anterior a la fecha de inicio de intervención',
							'profesionalactualmente_id.*.required' => 'Este campo es obligatorio',
						]);
		// dd($_POST);
		$data = request()->all();
		$data['user_id'] = $userId;
		// dd($data);
		$guardoAformulario = \App\FormA\Aformulario::create($data);
		// $guardoAformulario = \App\FormA\Aformulario::create(request()->only(['datos_nombre_referencia', 'datos_numero_carpeta', 'datos_fecha_ingreso', 'modalidad_id', 'estadocaso_id', 'datos_ente_judicial', 'caratulacionjudicial_id', 'datos_nro_causa']));

		$ultimoId = $guardoAformulario->id;

		//de aca obtengo la cantidad de veces que tengo que iterar para asignarle valores al array
		$cant = (count(request()->input('profesional_id')));

		for ($i=0; $i < $cant; $i++) 
		{ 
			//asigno manualmente los valores
			$profesional['profesional_id'] = $data['profesional_id'][$i];
			$profesional['datos_profesional_interviene_desde'] = $data['datos_profesional_interviene_desde'][$i];
			$profesional['datos_profesional_interviene_hasta'] = $data['datos_profesional_interviene_hasta'][$i];
			$profesional['profesionalactualmente_id'] = $data['profesionalactualmente_id'][$i];
			$profesional['user_id'] = $data['user_id'];

			//una vez ya asignados los valores los guardo en la base, en la tabla que corresponde
			$guardoProfesionalInterviniente = \App\FormA\Profesionalinterviniente::create($profesional);
			//de aca obtengo los id de los profesionales guardados
			$profId[] = $guardoProfesionalInterviniente->id;
		}
		//busco el id del formulario A guardado recien
		$aFormulario = \App\FormA\Aformulario::find($ultimoId);
		//guardo en la tabla pivot
		$guardoRelacion = $aFormulario->profesionalintervinientes()->sync($profId);
		//redirijo al formulario siguiente
	    return redirect('formularios/B');
	}

	public function editA($id)
	{
		$datosModalidad = \App\FormA\Modalidad::all();;
		$datosEstadoCaso = \App\FormA\Estadocaso::all();
		$datosCaratulacion = \App\FormA\Caratulacionjudicial::all();
		$datosProfesional = \App\FormA\Profesional::all();
		$datosIntervieneActualmente = \App\FormA\Profesionalactualmente::all();
		$datosPresentacion = \App\FormA\Presentacionespontanea::all();
		$datosOrganismo = \App\FormA\Otrosorganismo::all();
		$aFormulario = \App\FormA\Aformulario::find($id);
		$todo = DB::table('aformularios')
		                            ->WHERE('aformulario_id', '=', $id)
									->JOIN('aformulario_profesionalinterviniente', 'aformularios.id', '=', 'aformulario_profesionalinterviniente.aformulario_id')
									->JOIN('profesionalintervinientes', 'aformulario_profesionalinterviniente.profesionalinterviniente_id', '=', 'profesionalintervinientes.id')
									->JOIN('profesionals', 'profesionalintervinientes.profesional_id', '=', 'profesionals.id')
									->JOIN('profesionalactualmentes', 'profesionalintervinientes.profesionalactualmente_id', '=', 'profesionalactualmentes.id')
		                            ->get();


		return view('formularios.editar.formularioA_edit', ['aFormulario' => $aFormulario,
															'datosModalidad' => $datosModalidad,
															'datosEstadoCaso' => $datosEstadoCaso,
															'datosCaratulacion' => $datosCaratulacion,
															'datosProfesional' => $datosProfesional,
															'datosIntervieneActualmente' => $datosIntervieneActualmente,
															'datosPresentacion' => $datosPresentacion,
															'datosOrganismo' => $datosOrganismo,
															'todo' => $todo
															]);
	}

	public function updateA($id)
	{	
		//busco segun el id el formulario deseado
		$aFormulario = \App\FormA\Aformulario::find($id);
		                            // //convertir objeto a array
		                            // $array = json_decode(json_encode($todo), true);
		                            // //convertir array a objeto stdClass
		                            // $object = json_decode(json_encode($array), FALSE);
		// $fecha_hoy = Carbon::now();
		request()->validate([
							// 'datos_fecha_ingreso' => 'required|date|before_or_equal:'.$fecha_hoy,
							'profesional_id.*' => 'nullable',
							'profesional_id.0' => 'required',
							'datos_profesional_interviene_desde.*' => 'nullable|date|before_or_equal:datos_profesional_interviene_hasta.*',
							'datos_profesional_interviene_desde.0' => 'required|date|before_or_equal:datos_profesional_interviene_hasta.0',
							'datos_profesional_interviene_hasta.*' => 'nullable|date|after_or_equal:datos_profesional_interviene_desde.*',
							'datos_profesional_interviene_hasta.0' => 'required|date|after_or_equal:datos_profesional_interviene_desde.0',
							'profesionalactualmente_id.*' => 'nullable',
							'profesionalactualmente_id.0' => 'required',
						],
						[		

							// 'datos_fecha_ingreso.required' => 'Este campo es obligatorio',
							// 'datos_fecha_ingreso.before_or_equal' => 'La fecha ingresada es posterior al dia de hoy',
							'profesional_id.*.required' => 'Este campo es obligatorio',
							'datos_profesional_interviene_desde.*.required' => 'Este campo es obligatorio',
							'datos_profesional_interviene_desde.*.before_or_equal' => 'Se ingresó un fecha posterior a la fecha de fin de intervención',
							'datos_profesional_interviene_hasta.*.required' => 'Este campo es obligatorio',
							'datos_profesional_interviene_hasta.*.after_or_equal' => 'Se ingresó un fecha anterior a la fecha de inicio de intervención',
							'profesionalactualmente_id.*.required' => 'Este campo es obligatorio',

						]);
		$data = request()->all();
		$data['user_id'] = $userId;
		$aFormulario->update($data);

		//requiero los datos de los profesionales
		$arrayProfesionales = request()->only(['profesional_id', 'datos_profesional_interviene_desde', 'datos_profesional_interviene_hasta', 'profesionalactualmente_id']);	
		
		//de aca obtengo la cantidad de veces que tengo que iterar para asignarle valores al array
		$cant = (count(request()->input('profesional_id')));

		// HOY 12 DE OCTUBRE ESTA MANERA BORRA TODOS PROFESIONALES ANTERIORES Y SOLO ASIGNA LOS QUE SE UPDETEAN
		for ($i=0; $i < $cant; $i++) 
		{ 
			//asigno manualmente los valores
			$profesional['profesional_id'] = $arrayProfesionales['profesional_id'][$i];
			$profesional['datos_profesional_interviene_desde'] = $arrayProfesionales['datos_profesional_interviene_desde'][$i];
			$profesional['datos_profesional_interviene_hasta'] = $arrayProfesionales['datos_profesional_interviene_hasta'][$i];
			$profesional['profesionalactualmente_id'] = $arrayProfesionales['profesionalactualmente_id'][$i];
			$profesional['user_id'] = $data['user_id'];
			//una vez ya asignados los valores los guardo en la base, en la tabla que corresponde
			$guardoProfesionalInterviniente = \App\FormA\Profesionalinterviniente::create($profesional);
			//de aca obtengo los id de los profesionales guardados
			$profId[] = $guardoProfesionalInterviniente->id;	
		}
		//guardo en la tabla pivot
		$guardoRelacion = $aFormulario->profesionalintervinientes()->sync($profId);


		return redirect('formularios');
	}
	
	public function destroyA($id)
	{
		$aFormulario = \App\FormA\Aformulario::find($id);

		$aFormulario->delete();

    	session()->flash('message', 'El formulario se eliminó con éxito.');

    	return redirect('formularios');
	}

	public function createB()
	{
		$datosGenero = \App\FormB\Genero::all();
		$datosDocumento = \App\FormB\Tienedoc::all();
		$datosTipoDocumento = \App\FormB\Tipodocumento::all();
		$datosPaises = \App\FormB\Paises::all();
		$datosArgProvincias = \App\FormB\Argprovincia::all();
		$datosArgCiudades = \App\FormB\Argciudad::all();
		$datosUrProvincias = \App\FormB\Urprovincia::all();
		$datosChProvincias = \App\FormB\Chprovincia::all();
		$datosBrEstados = \App\FormB\Brestado::all();
		$datosFranjaEtaria = \App\FormB\Franjaetaria::all();
		$datosEmbarazadaRelevamiento = \App\FormB\Embarazorelevamiento::all();
		$datosEmbarazoPrevio = \App\FormB\Embarazoprevio::all();
		$datosHijos = \App\FormB\Hijosembarazo::all();
		$datosBajoEfecto = \App\FormB\Bajoefecto::all();
		$datosLesion = \App\FormB\Tienelesion::all();
		$datosLesionConstatada = \App\FormB\Lesionconstatada::all();
		$datoEnfermedadCronica = \App\FormB\Enfermedadcronica::all();
		$datosNivelEducativo = \App\FormB\Niveleducativo::all();
		$datosDiscapacidad = \App\FormB\Discapacidad::all();
		$datosLimitacion = \App\FormB\Limitacion::all();
		$datosOficio = \App\FormB\Oficio::all();
		$datosResidencia = \App\FormB\Residenciaprecaria::all();
		$userId = auth()->user()->id;
		$numeroCarpeta = DB::table('aformularios')
											->WHERE('user_id', '=', $userId)
											->ORDERBY('updated_at', 'desc')
											->first()
											->datos_numero_carpeta;

		return view('formularios/formularioB', 
			['datosGenero' => $datosGenero,
				'datosDocumento' => $datosDocumento,
				'datosTipoDocumento' => $datosTipoDocumento,
				'datosPaises' => $datosPaises,
				'datosArgProvincias' => $datosArgProvincias,
				'datosArgCiudades' => $datosArgCiudades,
				'datosUrProvincias' => $datosUrProvincias,
				'datosChProvincias' => $datosChProvincias,
				'datosBrEstados' => $datosBrEstados,
				'datosFranjaEtaria' => $datosFranjaEtaria,
				'datosEmbarazadaRelevamiento' => $datosEmbarazadaRelevamiento,
				'datosEmbarazoPrevio' => $datosEmbarazoPrevio,
				'datosHijos' => $datosHijos,
				'datosBajoEfecto' => $datosBajoEfecto,
				'datosLesion' => $datosLesion,
				'datosLesionConstatada' => $datosLesionConstatada,
				'datoEnfermedadCronica' => $datoEnfermedadCronica,
				'datosNivelEducativo' => $datosNivelEducativo,
				'datosDiscapacidad' => $datosDiscapacidad,
				'datosLimitacion' => $datosLimitacion,
				'datosOficio' => $datosOficio,
				'datosResidencia' => $datosResidencia,
				'numeroCarpeta' => $numeroCarpeta,
			]);
	}

	public function insertB()
	{
		$userId = auth()->user()->id;

		request()->validate([
			'victima_nombre_y_apellido' => 'required',
			//'victima_nombre_y_apellido_desconoce' => 'required',
			'victima_apodo' => 'required',
			//'victima_apodo_desconoce' => 'required',
			'genero_id' => 'required',
			//'victima_genero_otro' => 'required',
			'tienedoc_id' => 'required',
			'tipodocumento_id' => 'required',
			//'victima_tipo_documento_otro' => 'required',
			'victima_documento' => 'required',
			//'victima_documento_se_desconoce' => 'required',
			'pais_id' => 'required',
			//'argprovincia' => 'required',
			//'brestado' => 'required',
			'victima_fecha_nacimiento' => 'required',
			'victima_edad' => 'required',
			//'victima_edad_desconoce' => 'required',
			'franjaetaria_id' => 'required',
			'embarazorelevamiento_id' => 'required',
			'embarazoprevio_id' => 'required',
			'hijosembarazo_id' => 'required',
			'bajoefecto_id' => 'required',
			'tienelesion_id' => 'required',
			//'victima_lesion' => 'required',
			//'lesionconstatada_id' => 'required',
			//'victima_lesion_organismo' => 'required',
			'enfermedadcronica_id' => 'required',
			//'victima_tipo_enfermedad_cronica' => 'required',
			//'victima_limitacion_otra' => 'required',
			'niveleducativo_id' => 'required',
			'oficio_id' => 'required',
			//'victima_oficio_cual' => 'required',
		], 
		[
			'victima_nombre_y_apellido.required' => 'Este campo es obligatorio',
			//'victima_nombre_y_apellido_desconoce.required' => 'Este campo es obligatorio',
			'victima_apodo.required' => 'Este campo es obligatorio',
			//'victima_apodo_desconoce.required' => 'Este campo es obligatorio',
			'genero_id.required' => 'Este campo es obligatorio',
			//'victima_genero_otro.required' => 'Este campo es obligatorio',
			'tienedoc_id.required' => 'Este campo es obligatorio',
			'tipodocumento_id.required' => 'Este campo es obligatorio',
			//'victima_tipo_documento_otro.required' => 'Este campo es obligatorio',
			'victima_documento.required' => 'Este campo es obligatorio',
			//'victima_documento_se_desconoce.required' => 'Este campo es obligatorio',
			'pais_id.required' => 'Este campo es obligatorio',
			//'argprovincia.required' => 'Este campo es obligatorio',
			//'brestado.required' => 'Este campo es obligatorio',
			'victima_fecha_nacimiento.required' => 'Este campo es obligatorio',
			'victima_edad.required' => 'Este campo es obligatorio',
			//'victima_edad_desconoce.required' => 'Este campo es obligatorio',
			'franjaetaria_id.required' => 'Este campo es obligatorio',
			'embarazorelevamiento_id.required' => 'Este campo es obligatorio',
			'embarazoprevio_id.required' => 'Este campo es obligatorio',
			'hijosembarazo_id.required' => 'Este campo es obligatorio',
			'bajoefecto_id.required' => 'Este campo es obligatorio',
			'tienelesion_id.required' => 'Este campo es obligatorio',
			//'victima_lesion.required' => 'Este campo es obligatorio',
			//'lesionconstatada_id.required' => 'Este campo es obligatorio',
			//'victima_lesion_organismo.required' => 'Este campo es obligatorio',
			'enfermedadcronica_id.required' => 'Este campo es obligatorio',
			//'victima_tipo_enfermedad_cronica.required' => 'Este campo es obligatorio',
			//'victima_limitacion_otra.required' => 'Este campo es obligatorio',
			'niveleducativo_id.required' => 'Este campo es obligatorio',
			'oficio_id.required' => 'Este campo es obligatorio',
			//'victima_oficio_cual.required' => 'Este campo es obligatorio',
		]);

		$data = request()->all();

		$data['user_id'] = $userId;

		$guardoBformulario = \App\FormB\Bformulario::create($data);

		$ultimoId = $guardoBformulario->id;


		request()->validate([
			'discapacidad_id' => 'required'
		],[
			'discapacidad_id.required' => 'Este campo es obligatorio'
		]);

		$bformulario = \App\FormB\Bformulario::find($ultimoId);

		$arrayDiscapacidades = request()->input('discapacidad_id');

		$guardoDiscapacidades = $bformulario->discapacidads()->sync($arrayDiscapacidades);

		request()->validate([
			'limitacion_id' => 'required'
		],[
			'limitacion_id.required' => 'Este campo es obligatorio'
		]);

		$bformulario = \App\FormB\Bformulario::find($ultimoId);

		$arrayLimitaciones = request()->input('limitacion_id');

		$guardoLimitaciones = $bformulario->limitacions()->sync($arrayLimitaciones);


 		// dsp deberia redirigir al formC [esta es la URL no la view]
	    return redirect('formularios/B');
	}

	public function editB($id)
	{
		$datosGenero = \App\FormB\Genero::all();
		$datosDocumento = \App\FormB\Tienedoc::all();
		$datosTipoDocumento = \App\FormB\Tipodocumento::all();
		$datosPaises = \App\FormB\Paises::all();
		$datosArgProvincias = \App\FormB\Argprovincia::all();
		$datosArgCiudades = \App\FormB\Argciudad::all();
		$datosUrProvincias = \App\FormB\Urprovincia::all();
		$datosChProvincias = \App\FormB\Chprovincia::all();
		$datosBrEstados = \App\FormB\Brestado::all();
		$datosFranjaEtaria = \App\FormB\Franjaetaria::all();
		$datosEmbarazadaRelevamiento = \App\FormB\Embarazorelevamiento::all();
		$datosEmbarazoPrevio = \App\FormB\Embarazoprevio::all();
		$datosHijos = \App\FormB\Hijosembarazo::all();
		$datosBajoEfecto = \App\FormB\Bajoefecto::all();
		$datosLesion = \App\FormB\Tienelesion::all();
		$datosLesionConstatada = \App\FormB\Lesionconstatada::all();
		$datoEnfermedadCronica = \App\FormB\Enfermedadcronica::all();
		$datosNivelEducativo = \App\FormB\Niveleducativo::all();
		$datosOficio = \App\FormB\Oficio::all();
		$datosDiscapacidad = \App\FormB\Discapacidad::all();
		$datosLimitacion = \App\FormB\Limitacion::all();
		$datosResidencia = \App\FormB\Residenciaprecaria::all();
		$Bformulario = \App\FormB\Bformulario::find($id);

		return view('formularios.editar.formularioB_edit', ['Bformulario' => $Bformulario,
															'datosGenero' => $datosGenero,
															'datosDocumento' => $datosDocumento,
															'datosTipoDocumento' => $datosTipoDocumento,
															'datosPaises' => $datosPaises,
															'datosArgProvincias' => $datosArgProvincias,
															'datosArgCiudades' => $datosArgCiudades,
															'datosUrProvincias' => $datosUrProvincias,
															'datosChProvincias' => $datosChProvincias,
															'datosBrEstados' => $datosBrEstados,
															'datosFranjaEtaria' => $datosFranjaEtaria,
															'datosEmbarazadaRelevamiento' => $datosEmbarazadaRelevamiento,
															'datosEmbarazoPrevio' => $datosEmbarazoPrevio,
															'datosHijos' => $datosHijos,
															'datosBajoEfecto' => $datosBajoEfecto,
															'datosLesion' => $datosLesion,
															'datosLesionConstatada' => $datosLesionConstatada,
															'datoEnfermedadCronica' => $datoEnfermedadCronica,
															'datosNivelEducativo' => $datosNivelEducativo,
															'datosDiscapacidad' => $datosDiscapacidad,
															'datosLimitacion' => $datosLimitacion,
															'datosOficio' => $datosOficio,
															'datosResidencia' => $datosResidencia,
															]);
	}

	public function updateB($id)
	{
		//busco segun el id el formulario desdeado
		$Bformulario = \App\FormB\Bformulario::find($id);

		//requiero el input discapacidad_id para actualizarlo
		$arrayDiscapacidades = request()->input('discapacidad_id');

		//sincrononizo atravez de la funcion discapacidads que tiene una realcion de belongsToMany con bformulario
		$actualizoDiscapacidades = $Bformulario->discapacidads()->sync($arrayDiscapacidades);


		$arrayLimitaciones = request()->input('limitacion_id');

		$actualizoLimitaciones = $Bformulario->limitacions()->sync($arrayLimitaciones);

		//actualizo todo
		$Bformulario->update(request()->all());

		//cuando edito el formulario y le doy enviar, entra en juego la funcion update, y una vez actualizado todo te redirige nuevamente al formulario B, despues se tendria que ver a donde verdaderamente deberia redirigir [recordar que el redirect te lleva a la URL]
		return redirect('formularios');
	}

	public function destroyB($id)
	{
		$Bformulario = \App\FormB\Bformulario::find($id);

		$Bformulario->delete();

    	session()->flash('message', 'El formulario se eliminó con éxito.');

    	return redirect('formularios');	
	}

	public function createC()
	{
		$datosOtraspersonas = \App\FormC\Otraspersona::all();
		$datosGeneros = \App\FormB\Genero::all();
		$datosVinculos = \App\FormC\Vinculo::all();
		$userId = auth()->user()->id;

		$numeroCarpeta = DB::table('aformularios')
											->WHERE('user_id', '=', $userId)
											->ORDERBY('updated_at')
											->first()
											->datos_numero_carpeta;

		return view('formularios.formularioC', ['datosOtraspersonas' => $datosOtraspersonas,
												'datosGeneros' => $datosGeneros,
												'datosVinculos' => $datosVinculos,
												'numeroCarpeta' => $numeroCarpeta,
												]);
	}

	public function insertC()
	{	
		
		//guardo el id del usuario en una variable
		$userId = auth()->user()->id;

			request()->validate([
			'otraspersonas_id' => 'required',
			'nombre_apellido.*' => 'nullable',
			'nombre_apellido.0' => 'required_if:otraspersonas_id,==,1',
			'edad.*' => 'nullable',
			'edad.0' => 'required_if:otraspersonas_id,==,1',
			'genero_id.*' => 'nullable',
			'genero_id.0' => 'required_if:otraspersonas_id,==,1',
			'vinculo_id.*' => 'nullable',
			'vinculo_id.0' => 'required_if:otraspersonas_id,==,1',
		],
		[
			'otraspersonas_id.required' => 'Este campo es obligatorio',
			'nombre_apellido.*.required_if' => 'Este campo es obligatorio',
			'edad.*.required_if' => 'Este campo es obligatorio',
			'genero_id.*.required_if' => 'Este campo es obligatorio',
			'vinculo_id.*.required_if' => 'Este campo es obligatorio'
		]);
		// ver que hacer si la cantidad que se recibe es 0, osea lo mando de una
		$data = request()->all();
		// dd($data);

		$data['user_id'] = $userId;
		// dd(isset($data['nombre_apellido']));

		$guardoCformulario = \App\FormC\Cformulario::create($data);

		//id del formulario recien creado
		$ultimoId = $guardoCformulario->id;

		if (isset($data['nombre_apellido'])) {
			$cant = (count(request()->input('nombre_apellido')));

			for ($i=0; $i < $cant; $i++) {

				$conviviente['nombre_apellido'] = $data['nombre_apellido'][$i];
				$conviviente['edad'] = $data['edad'][$i];
				$conviviente['genero_id'] = $data['genero_id'][$i];
				$conviviente['vinculo_id'] = $data['vinculo_id'][$i]; 
				$conviviente['user_id'] = $data['user_id'];

				$guardoCoviviente = \App\FormC\Conviviente::create($conviviente);

				$convivienteId[] = $guardoCoviviente->id;
			}

			$cFormulario = \App\FormC\Cformulario::find($ultimoId);

			$guardoRelacion = $cFormulario->convivientes()->sync($convivienteId);

			return redirect('formularios/D');
		}else{
			return redirect('formularios/D');
		}		
	}

	public function editC($id)
	{
		$datosOtraspersonas = \App\FormC\Otraspersona::all();
		$datosGeneros = \App\FormB\Genero::all();
		$datosVinculos = \App\FormC\Vinculo::all();
		$userId = auth()->user()->id;
		$datosConvivientes = \App\FormC\Conviviente::all();
		$cFormulario = \App\FormC\Cformulario::find($id);

		$numeroCarpeta = DB::table('aformularios')
											->WHERE('user_id', '=', $userId)
											->ORDERBY('updated_at')
											->first()
											->datos_numero_carpeta;

		$datosTodo = DB::table('cformularios')
		                            ->WHERE('cformularios.id', '=', $id)
									->JOIN('cformulario_conviviente', 'cformularios.id', '=', 'cformulario_conviviente.cformulario_id')
									->JOIN('convivientes', 'cformulario_conviviente.conviviente_id', '=', 'convivientes.id')
		                            ->get();


		return view('formularios.editar.formularioC_edit', [
															'datosOtraspersonas' => $datosOtraspersonas,
															'datosGeneros' => $datosGeneros,
															'datosVinculos' => $datosVinculos,
															'userId' => $userId,
															'cFormulario' => $cFormulario,
															'numeroCarpeta' => $numeroCarpeta,
															'datosTodo' => $datosTodo,
														]);
	}

	public function updateC($id)
	{	
		$userId = auth()->user()->id;

		request()->validate([
			'nombre_apellido.*' => 'nullable',
			'nombre_apellido.0' => 'required',
			'edad.*' => 'nullable',
			'edad.0' => 'required',
			'genero_id.*' => 'nullable',
			'genero_id.0' => 'required',
			'vinculo_id.*' => 'nullable',
			'vinculo_id.0' => 'required',
		],
		[
			'nombre_apellido.*.required' => 'Este campo es obligatorio',
			'edad.*.required' => 'Este campo es obligatorio',
			'genero_id.*.required' => 'Este campo es obligatorio',
			'vinculo_id.*.required' => 'Este campo es obligatorio'
		]);
		$data = request()->all();
		$data['user_id'] = $userId;

		$cant = (count(request()->input('nombre_apellido')));
		
		for ($i=0; $i < $cant; $i++) {

			$conviviente['nombre_apellido'] = $data['nombre_apellido'][$i];
			$conviviente['edad'] = $data['edad'][$i];
			$conviviente['genero_id'] = $data['genero_id'][$i];
			$conviviente['vinculo_id'] = $data['vinculo_id'][$i]; 
			$conviviente['user_id'] = $data['user_id'];

			$guardoCoviviente = \App\FormC\Conviviente::create($conviviente);

			$convivienteId[] = $guardoCoviviente->id;
		}
			
		$cFormulario = \App\FormC\Cformulario::find($id);

		$cFormulario->update($data);

		//de esta manera lo que hago es guardar los convivientes nuevos y mantener los viejos
		// $guardoRelacion = $cFormulario->convivientes()->sync($convivienteId, false);
		$guardoRelacion = $cFormulario->convivientes()->sync($convivienteId);

		return redirect('formularios/D');	
	}

	public function destroyC($id)
	{
		$Cformulario = \App\FormC\Cformulario::find($id);

		$Cformulario->delete();

    	session()->flash('message', 'El formulario se eliminó con éxito.');

    	return redirect('formularios');	
	}

	public function createC()
	{

	}

	public function insertC(){

	}

	public function editC($id){

	}

	public function updateC($id){

	}

	public function destroyC($id){

	}

}
