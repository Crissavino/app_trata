<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;

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
		$userName = auth()->user()->name;
		$aFormPorId = DB::table('aformularios')
											->WHERE('user_id', '=', $userId)
											->WHERE('aformularios.deleted_at', '=', null)
											->ORDERBY('updated_at')
											->get();
		$bFormPorId = DB::table('bformularios')
											->WHERE('user_id', '=', $userId)
											->WHERE('bformularios.deleted_at', '=', null)
											->ORDERBY('updated_at')
											->get();
		//datos del formulario C
        $cFormPorId = DB::table('cformularios')
												->WHERE('cformularios.user_id', '=', $userId)
												->WHERE('cformularios.deleted_at', '=', null)
												->ORDERBY('updated_at')
												->get();

		// $cFormPorId = DB::table('cformularios')
		// 									->WHERE('cformularios.user_id', '=', $userId)
		// // 									->WHERE('cformularios.deleted_at', '=', null)
		// 									// ->JOIN('cformulario_conviviente', 'cformularios.id', '=', 'cformulario_conviviente.cformulario_id')
		// 									// ->JOIN('convivientes', 'cformulario_conviviente.conviviente_id', '=', 'convivientes.id')
		// // 									->ORDERBY('convivientes.updated_at', 'desc')
		// 									->get();


		//hasta aca
		$dFormPorId = DB::table('dformularios')
											->WHERE('user_id', '=', $userId)
											->WHERE('dformularios.deleted_at', '=', null)
											->ORDERBY('updated_at')
											->get();
											
		$eFormPorId = DB::table('eformularios')
											->WHERE('user_id', '=', $userId)
											->WHERE('eformularios.deleted_at', '=', null)
											->ORDERBY('updated_at')
											->get();
		$fFormPorId = DB::table('fformularios')
											->WHERE('user_id', '=', $userId)
											->WHERE('fformularios.deleted_at', '=', null)
											->ORDERBY('updated_at')
											->get();

		$gFormPorId = DB::table('gformularios')
											->WHERE('user_id', '=', $userId)
											->WHERE('gformularios.deleted_at', '=', null)
											->ORDERBY('updated_at')
											->get();
		return view('formularios.formularios', ['userName' => $userName,
												'bFormPorId' => $bFormPorId,
												'aFormPorId' => $aFormPorId,
												'cFormPorId' => $cFormPorId,
												'dFormPorId' => $dFormPorId,
												'eFormPorId' => $eFormPorId,
												'fFormPorId' => $fFormPorId,
												'gFormPorId' => $gFormPorId
												]);
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
							'presentacion_espontanea_id' => 'required_if:modalidad_id,==,3',
							'derivacion_otro_organismo_id' => 'required_if:modalidad_id,==,4',
							'derivacion_otro_organismo_cual' => 'required_if:derivacion_otro_organismo_id,==,16',
							// 'nombre_apellido.0' => 'required_if:otraspersonas_id,==,1',
							'estadocaso_id' => 'required',
							'datos_ente_judicial' => 'required',
							'caratulacionjudicial_id' => 'required',
							'caratulacionjudicial_otro' => 'required_if:caratulacionjudicial_id,==,25',
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
							'presentacion_espontanea_id.required_if' => 'Este campo es obligatorio', 
							'derivacion_otro_organismo_id.required_if' => 'Este campo es obligatorio', 
							'derivacion_otro_organismo_cual.required_if' => 'Este campo es obligatorio', 
							'caratulacionjudicial_otro.required_if' => 'Este campo es obligatorio', 
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
		$userId = auth()->user()->id;
		//busco segun el id el formulario deseado
		$aFormulario = \App\FormA\Aformulario::find($id);
		                       
		$fecha_hoy = Carbon::now();
		request()->validate([
							'datos_nombre_referencia' => 'required',
							'datos_numero_carpeta' => 'required',
							'datos_fecha_ingreso' => 'required|date|before_or_equal:'.$fecha_hoy,
							'modalidad_id' => 'required',
							'presentacion_espontanea_id' => 'required_if:modalidad_id,==,3',
							'derivacion_otro_organismo_id' => 'required_if:modalidad_id,==,4',
							'derivacion_otro_organismo_cual' => 'required_if:derivacion_otro_organismo_id,==,16',
							'estadocaso_id' => 'required',
							'datos_ente_judicial' => 'required',
							'caratulacionjudicial_id' => 'required',
							'caratulacionjudicial_otro' => 'required_if:caratulacionjudicial_id,==,25',
							'datos_nro_causa' => 'required',
							'profesional_id.*' => 'nullable',
							'datos_profesional_interviene_desde.*' => 'nullable|date|before_or_equal:datos_profesional_interviene_hasta.*',
							'datos_profesional_interviene_hasta.*' => 'nullable|date|after_or_equal:datos_profesional_interviene_desde.*',
							'profesionalactualmente_id.*' => 'nullable',
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
							'presentacion_espontanea_id.required_if' => 'Este campo es obligatorio', 
							'derivacion_otro_organismo_id.required_if' => 'Este campo es obligatorio', 
							'derivacion_otro_organismo_cual.required_if' => 'Este campo es obligatorio', 
							'caratulacionjudicial_otro.required_if' => 'Este campo es obligatorio', 
						]);

		$data = request()->all();
		$data['user_id'] = $userId;
		$aFormulario->update($data);

		//requiero los datos de los profesionales
		$arrayProfesionales = request()->only(['profesional_id', 'datos_profesional_interviene_desde', 'datos_profesional_interviene_hasta', 'profesionalactualmente_id']);	

		if (request()->input('profesional_id') !== null) {
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
		}else{
			return redirect('formularios');
		}
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
			// 'pais_id' => 'required',
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
			// 'pais_id.required' => 'Este campo es obligatorio',
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

	    return redirect('formularios/C');
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
		$userId = auth()->user()->id;
		$numeroCarpeta = DB::table('aformularios')
											->WHERE('user_id', '=', $userId)
											->ORDERBY('updated_at', 'desc')
											->first()
											->datos_numero_carpeta;

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
															'numeroCarpeta' => $numeroCarpeta,
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
											->ORDERBY('updated_at', 'desc')
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
			'vinculo_otro.*' => 'nullable',
			'vinculo_otro.0' => 'required_if:vinculo_id,==,6',
		],
		[
			'otraspersonas_id.required' => 'Este campo es obligatorio',
			'nombre_apellido.*.required_if' => 'Este campo es obligatorio',
			'edad.*.required_if' => 'Este campo es obligatorio',
			'genero_id.*.required_if' => 'Este campo es obligatorio',
			'vinculo_id.*.required_if' => 'Este campo es obligatorio',
			'vinculo_otro.*.required_if' => 'Este campo es obligatorio'

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
				$conviviente['vinculo_otro'] = $data['vinculo_otro'][$i]; 
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

	public function createD()
	{
		$userId = auth()->user()->id;
		$numeroCarpeta = DB::table('aformularios')
											->WHERE('user_id', '=', $userId)
											->ORDERBY('updated_at', 'desc')
											->first()
											->datos_numero_carpeta;
		$datosAcompanado = \App\FormD\Acompanado::all();
		$datosAcompanadoRed = \App\FormD\Acompanadored::all();
		$datosActividad = \App\FormD\Actividad::all();
		$datosCalificacionEspecifica = \App\FormD\Calificacionespecifica::all();
		$datosCalificacionGeneral = \App\FormD\Calificaciongeneral::all();
		$datosContactoExplotacion = \App\FormD\Contactoexplotacion::all();
		$datosCuantosBano = \App\FormD\Cuantosbano::all();
		$datosDeuda = \App\FormD\Deuda::all();
		$datosElementoSeguridad = \App\FormD\Elementoseguridad::all();
		$datosElementoTrabajo = \App\FormD\Elementotrabajo::all();
		$datosEngano = \App\FormD\Engano::all();
		$datosEspeciaConcepto = \App\FormD\Especiaconcepto::all();
		$datosFinalidad = \App\FormD\Finalidad::all();
		$datosFrecuenciaPago = \App\FormD\Frecuenciapago::all();
		$datosHayAgua = \App\FormD\Hayagua::all();
		$datosHayBano = \App\FormD\Haybano::all();
		$datosHayCorriente = \App\FormD\Haycorriente::all();
		$datosHayGas = \App\FormD\Haygas::all();
		$datosHayHacinamiento = \App\FormD\Hayhacinamiento::all();
		$datosHayMedida = \App\FormD\Haymedida::all();
		$datosHayPersona = \App\FormD\Haypersona::all();
		$datosLugarDeuda = \App\FormD\Lugardeuda::all();
		$datosMaterial = \App\FormD\Material::all();
		$datosModalidadPago = \App\FormD\Modalidadpago::all();
		$datosMotivoDeuda = \App\FormD\Motivodeuda::all();
		$datosPermanencia = \App\FormD\Permanencia::all();
		$datosPrivado = \App\FormD\Privado::all();
		$datosResideLugar = \App\FormD\Residelugar::all();
		$datosRural = \App\FormD\Rural::all();
		$datosTestigo = \App\FormD\Testigo::all();
		$datosTextil = \App\FormD\Textil::all();
		$datosTipoVictima = \App\FormD\Tipovictima::all();
		$datosViajo = \App\FormD\Viajo::all();

		return view('formularios.formularioD', ['numeroCarpeta' => $numeroCarpeta,
												'datosAcompanado' => $datosAcompanado,
												'datosAcompanadoRed' => $datosAcompanadoRed,
												'datosActividad' => $datosActividad,
												'datosCalificacionEspecifica' => $datosCalificacionEspecifica,
												'datosCalificacionGeneral' => $datosCalificacionGeneral,
												'datosContactoExplotacion' => $datosContactoExplotacion,
												'datosCuantosBano' => $datosCuantosBano,
												'datosDeuda' => $datosDeuda,
												'datosElementoSeguridad' => $datosElementoSeguridad,
												'datosElementoTrabajo' => $datosElementoTrabajo,
												'datosEngano' => $datosEngano,
												'datosEspeciaConcepto' => $datosEspeciaConcepto,
												'datosFinalidad' => $datosFinalidad,
												'datosFrecuenciaPago' => $datosFrecuenciaPago,
												'datosHayAgua' => $datosHayAgua,
												'datosHayBano' => $datosHayBano,
												'datosHayCorriente' => $datosHayCorriente,
												'datosHayGas' => $datosHayGas,
												'datosHayHacinamiento' => $datosHayHacinamiento,
												'datosHayMedida' => $datosHayMedida,
												'datosHayPersona' => $datosHayPersona,
												'datosLugarDeuda' => $datosLugarDeuda,
												'datosMaterial' => $datosMaterial,
												'datosModalidadPago' => $datosModalidadPago,
												'datosMotivoDeuda' => $datosMotivoDeuda,
												'datosPermanencia' => $datosPermanencia,
												'datosPrivado' => $datosPrivado,
												'datosResideLugar' => $datosResideLugar,
												'datosRural' => $datosRural,
												'datosTestigo' => $datosTestigo,
												'datosTextil' => $datosTextil,
												'datosTipoVictima' => $datosTipoVictima,
												'datosViajo' => $datosViajo,
											]);
	}

	public function insertD()
	{
		//funciona todo 10 puntos
		$userId = auth()->user()->id;
			// dd($userId);
		request()->validate(
			[
				'calificaciongeneral_id' => 'required',
				'calificaciongeneral_otra' => 'required_if:calificaciongeneral_id,==,8',
				'calificacionespecifica_id' => 'required',
				'finalidad_id' => 'required',
				'finalidad_otra' => 'required_if:finalidad_id,==,5',
				'actividad_id' => 'required',
				'actividad_otra' => 'required_if:actividad_id,==,8',
				'privado_id' => 'required_if:actividad_id,==,3',
				'privado_otra' => 'required_if:privado_id,==,8',
				'rural_id' => 'required_if:actividad_id,==,1',
				'domicilioVenta' => 'required_if:actividad_id,==,1',
				'rural_otra' => 'required_if:rural_id,==,6',
				'textil_id' => 'required_if:actividad_id,==,6',
				'marcaTextil' => 'required_if:actividad_id,==,6',
				'textil_otra' => 'required_if:textil_id,==,6',
				'contactoexplotacion_id' => 'required',
				'contactoexplotacion_otro' => 'required_if:contactoexplotacion_id,==,6',
				'viajo_id' => 'required',
				'acompanado_id' => 'required_if:viajo_id,==,2',
				'acompanadored_id' => 'required_if:viajo_id,==,2',
				'domicilio' => 'required',
				'residelugar_id' => 'required',
				'engano_id' => 'required',
				'haypersona_id' => 'required',
				'tipovictima_id' => 'required',
				'tarea' => 'required',
				'horasTarea' => 'required',
				'frecuenciapago_id' => 'required',
				'modalidadpagos_id' => 'required',
				'especiaconcepto_id' => 'required_if:modalidadpagos_id,==,4',
				'especiaconceptos_otro' => 'required_if:especiaconcepto_id,==,5',
				'montoPago' => 'required',
				'deuda_id' => 'required',
				'motivodeuda_id' => 'required_if:deuda_id,==,1',
				'lugardeuda_id' => 'required_if:deuda_id,==,1',
				'motivodeuda_otro' => 'required_if:motivodeuda_id,==,5',
				'permanencia_id' => 'required',
				'testigo_id' => 'required',
				'coordinadorPTN' => 'required_if:testigo_id,==,1',
				'coordinadorPTN_otro' => 'required_if:testigo_id,==,1',
				'haycorriente_id' => 'required',
				'haygas_id' => 'required',
				'haymedida_id' => 'required',
				'haymedidas_otro' => 'required_if:haymedida_id,==,6',
				'hayhacinamiento_id' => 'required',
				'hayagua_id' => 'required',
				'haybano_id' => 'required',
				'cuantosbano_id' => 'required',
				'material_id' => 'required',
				'material_otro' => 'required_if:material_id,==,7',
				'elementotrabajo_id' => 'required',
				'elementoseguridad_id' => 'required',
			],
			[
				'calificaciongeneral_id.required' => 'Este campo es obligatorio',
				'calificaciongeneral_otra.required_if' => 'Este campo es obligatorio',
				'calificacionespecifica_id.required' => 'Este campo es obligatorio',
				'finalidad_id.required' => 'Este campo es obligatorio',
				'finalidad_otra.required_if' => 'Este campo es obligatorio',
				'actividad_id.required' => 'Este campo es obligatorio',
				'actividad_otra.required_if' => 'Este campo es obligatorio',
				'privado_id.required_if' => 'Este campo es obligatorio',
				'privado_otra.required_if' => 'Este campo es obligatorio',
				'rural_id.required_if' => 'Este campo es obligatorio',
				'domicilioVenta.required_if' => 'Este campo es obligatorio',
				'rural_otra.required_if' => 'Este campo es obligatorio',
				'textil_id.required_if' => 'Este campo es obligatorio',
				'marcaTextil.required_if' => 'Este campo es obligatorio',
				'textil_otra.required_if' => 'Este campo es obligatorio',
				'contactoexplotacion_id.required' => 'Este campo es obligatorio',
				'contactoexplotacion_otro.required_if' => 'Este campo es obligatorio',
				'viajo_id.required' => 'Este campo es obligatorio',
				'acompanado_id.required_if' => 'Este campo es obligatorio',
				'acompanadored_id.required_if' => 'Este campo es obligatorio',
				'domicilio.required' => 'Este campo es obligatorio',
				'residelugar_id.required' => 'Este campo es obligatorio',
				'engano_id.required' => 'Este campo es obligatorio',
				'haypersona_id.required' => 'Este campo es obligatorio',
				'tipovictima_id.required' => 'Este campo es obligatorio',
				'tarea.required' => 'Este campo es obligatorio',
				'horasTarea.required' => 'Este campo es obligatorio',
				'frecuenciapago_id.required' => 'Este campo es obligatorio',
				'modalidadpagos_id.required' => 'Este campo es obligatorio',
				'especiaconcepto_id.required_if' => 'Este campo es obligatorio',
				'especiaconceptos_otro.required_if' => 'Este campo es obligatorio',
				'montoPago.required' => 'Este campo es obligatorio',
				'deuda_id.required' => 'Este campo es obligatorio',
				'motivodeuda_id.required_if' => 'Este campo es obligatorio',
				'lugardeuda_id.required_if' => 'Este campo es obligatorio',
				'motivodeuda_otro.required_if' => 'Este campo es obligatorio',
				'permanencia_id.required' => 'Este campo es obligatorio',
				'testigo_id.required' => 'Este campo es obligatorio',
				'coordinadorPTN.required_if' => 'Este campo es obligatorio',
				'coordinadorPTN_otro.required_if' => 'Este campo es obligatorio',
				'haycorriente_id.required' => 'Este campo es obligatorio',
				'haygas_id.required' => 'Este campo es obligatorio',
				'haymedida_id.required' => 'Este campo es obligatorio',
				'haymedidas_otro.required_if' => 'Este campo es obligatorio',
				'hayhacinamiento_id.required' => 'Este campo es obligatorio',
				'hayagua_id.required' => 'Este campo es obligatorio',
				'haybano_id.required' => 'Este campo es obligatorio',
				'cuantosbano_id.required' => 'Este campo es obligatorio',
				'material_id.required' => 'Este campo es obligatorio',
				'material_otro.required_if' => 'Este campo es obligatorio',
				'elementotrabajo_id.required' => 'Este campo es obligatorio',
				'elementoseguridad_id.required' => 'Este campo es obligatorio',
			]);


		$data = request()->all();

		$data['user_id'] = $userId;

		// dd($data);

		$guardoDformulario = \App\FormD\Dformulario::create($data);

		$ultimoId = $guardoDformulario->id;

		$dFormulario = \App\FormD\Dformulario::find($ultimoId);

		if (isset($data['privado_id'])) {
			$dFormulario->privados()->sync($data['privado_id']);
		}

		if (isset($data['textil_id'])) {
			$dFormulario->textils()->sync($data['textil_id']);
		}

		if (isset($data['rural_id'])) {
			$dFormulario->rurals()->sync($data['rural_id']);
		}

		if (isset($data['especiaconcepto_id'])) {
			$dFormulario->especiaconceptos()->sync($data['especiaconcepto_id']);
		}

		if (isset($data['motivodeuda_id'])) {
			$dFormulario->motivodeudas()->sync($data['motivodeuda_id']);
		}

		if (isset($data['haymedida_id'])) {
			$dFormulario->haymedidas()->sync($data['haymedida_id']);
		}

		return redirect('formularios/E');
	}

	public function editD($id)
	{
		$userId = auth()->user()->id;
		$numeroCarpeta = DB::table('aformularios')
											->WHERE('user_id', '=', $userId)
											->ORDERBY('updated_at')
											->first()
											->datos_numero_carpeta;
		$datosAcompanado = \App\FormD\Acompanado::all();
		$datosAcompanadoRed = \App\FormD\Acompanadored::all();
		$datosActividad = \App\FormD\Actividad::all();
		$datosCalificacionEspecifica = \App\FormD\Calificacionespecifica::all();
		$datosCalificacionGeneral = \App\FormD\Calificaciongeneral::all();
		$datosContactoExplotacion = \App\FormD\Contactoexplotacion::all();
		$datosCuantosBano = \App\FormD\Cuantosbano::all();
		$datosDeuda = \App\FormD\Deuda::all();
		$datosElementoSeguridad = \App\FormD\Elementoseguridad::all();
		$datosElementoTrabajo = \App\FormD\Elementotrabajo::all();
		$datosEngano = \App\FormD\Engano::all();
		$datosEspeciaConcepto = \App\FormD\Especiaconcepto::all();
		$datosFinalidad = \App\FormD\Finalidad::all();
		$datosFrecuenciaPago = \App\FormD\Frecuenciapago::all();
		$datosHayAgua = \App\FormD\Hayagua::all();
		$datosHayBano = \App\FormD\Haybano::all();
		$datosHayCorriente = \App\FormD\Haycorriente::all();
		$datosHayGas = \App\FormD\Haygas::all();
		$datosHayHacinamiento = \App\FormD\Hayhacinamiento::all();
		$datosHayMedida = \App\FormD\Haymedida::all();
		$datosHayPersona = \App\FormD\Haypersona::all();
		$datosLugarDeuda = \App\FormD\Lugardeuda::all();
		$datosMaterial = \App\FormD\Material::all();
		$datosModalidadPago = \App\FormD\Modalidadpago::all();
		$datosMotivoDeuda = \App\FormD\Motivodeuda::all();
		$datosPermanencia = \App\FormD\Permanencia::all();
		$datosPrivado = \App\FormD\Privado::all();
		$datosResideLugar = \App\FormD\Residelugar::all();
		$datosRural = \App\FormD\Rural::all();
		$datosTestigo = \App\FormD\Testigo::all();
		$datosTextil = \App\FormD\Textil::all();
		$datosTipoVictima = \App\FormD\Tipovictima::all();
		$datosViajo = \App\FormD\Viajo::all();
		$dFormulario = \App\FormD\Dformulario::find($id);
		// $dFormulario = DB::table('dformularios')
		// 								->WHERE('user_id', '=', $userId)
		// 								->WHERE('id', '=', $id)
		// 								// ->ORDERBY('updated_at')
		// 								->get();

		return view('formularios.editar.formularioD_edit', ['numeroCarpeta' => $numeroCarpeta,
												'datosAcompanado' => $datosAcompanado,
												'datosAcompanadoRed' => $datosAcompanadoRed,
												'datosActividad' => $datosActividad,
												'datosCalificacionEspecifica' => $datosCalificacionEspecifica,
												'datosCalificacionGeneral' => $datosCalificacionGeneral,
												'datosContactoExplotacion' => $datosContactoExplotacion,
												'datosCuantosBano' => $datosCuantosBano,
												'datosDeuda' => $datosDeuda,
												'datosElementoSeguridad' => $datosElementoSeguridad,
												'datosElementoTrabajo' => $datosElementoTrabajo,
												'datosEngano' => $datosEngano,
												'datosEspeciaConcepto' => $datosEspeciaConcepto,
												'datosFinalidad' => $datosFinalidad,
												'datosFrecuenciaPago' => $datosFrecuenciaPago,
												'datosHayAgua' => $datosHayAgua,
												'datosHayBano' => $datosHayBano,
												'datosHayCorriente' => $datosHayCorriente,
												'datosHayGas' => $datosHayGas,
												'datosHayHacinamiento' => $datosHayHacinamiento,
												'datosHayMedida' => $datosHayMedida,
												'datosHayPersona' => $datosHayPersona,
												'datosLugarDeuda' => $datosLugarDeuda,
												'datosMaterial' => $datosMaterial,
												'datosModalidadPago' => $datosModalidadPago,
												'datosMotivoDeuda' => $datosMotivoDeuda,
												'datosPermanencia' => $datosPermanencia,
												'datosPrivado' => $datosPrivado,
												'datosResideLugar' => $datosResideLugar,
												'datosRural' => $datosRural,
												'datosTestigo' => $datosTestigo,
												'datosTextil' => $datosTextil,
												'datosTipoVictima' => $datosTipoVictima,
												'datosViajo' => $datosViajo,
												'dFormulario' => $dFormulario
											]);
	}

	public function updateD($id)
	{
		$userId = auth()->user()->id;

		request()->validate(
			[
				'calificaciongeneral_id' => 'required',
				'calificaciongeneral_otra' => 'required_if:calificaciongeneral_id,==,8',
				'calificacionespecifica_id' => 'required',
				'finalidad_id' => 'required',
				'finalidad_otra' => 'required_if:finalidad_id,==,5',
				'actividad_id' => 'required',
				'actividad_otra' => 'required_if:actividad_id,==,8',
				'privado_id' => 'required_if:actividad_id,==,3',
				'privado_otra' => 'required_if:privado_id,==,8',
				'rural_id' => 'required_if:actividad_id,==,1',
				'domicilioVenta' => 'required_if:actividad_id,==,1',
				'rural_otra' => 'required_if:rural_id,==,6',
				'textil_id' => 'required_if:actividad_id,==,6',
				'marcaTextil' => 'required_if:actividad_id,==,6',
				'textil_otra' => 'required_if:textil_id,==,6',
				'contactoexplotacion_id' => 'required',
				'contactoexplotacion_otro' => 'required_if:contactoexplotacion_id,==,6',
				'viajo_id' => 'required',
				'acompanado_id' => 'required_if:viajo_id,==,2',
				'acompanadored_id' => 'required_if:viajo_id,==,2',
				'domicilio' => 'required',
				'residelugar_id' => 'required',
				'engano_id' => 'required',
				'haypersona_id' => 'required',
				'tipovictima_id' => 'required',
				'tarea' => 'required',
				'horasTarea' => 'required',
				'frecuenciapago_id' => 'required',
				'modalidadpagos_id' => 'required',
				'especiaconcepto_id' => 'required_if:modalidadpagos_id,==,4',
				'especiaconceptos_otro' => 'required_if:especiaconcepto_id,==,5',
				'montoPago' => 'required',
				'deuda_id' => 'required',
				'motivodeuda_id' => 'required_if:deuda_id,==,1',
				'lugardeuda_id' => 'required_if:deuda_id,==,1',
				'motivodeuda_otro' => 'required_if:motivodeuda_id,==,5',
				'permanencia_id' => 'required',
				'testigo_id' => 'required',
				'coordinadorPTN' => 'required_if:testigo_id,==,1',
				'coordinadorPTN_otro' => 'required_if:testigo_id,==,1',
				'haycorriente_id' => 'required',
				'haygas_id' => 'required',
				'haymedida_id' => 'required',
				'haymedidas_otro' => 'required_if:haymedida_id,==,6',
				'hayhacinamiento_id' => 'required',
				'hayagua_id' => 'required',
				'haybano_id' => 'required',
				'cuantosbano_id' => 'required',
				'material_id' => 'required',
				'material_otro' => 'required_if:material_id,==,7',
				'elementotrabajo_id' => 'required',
				'elementoseguridad_id' => 'required',
			],
			[
				'calificaciongeneral_id.required' => 'Este campo es obligatorio',
				'calificaciongeneral_otra.required_if' => 'Este campo es obligatorio',
				'calificacionespecifica_id.required' => 'Este campo es obligatorio',
				'finalidad_id.required' => 'Este campo es obligatorio',
				'finalidad_otra.required_if' => 'Este campo es obligatorio',
				'actividad_id.required' => 'Este campo es obligatorio',
				'actividad_otra.required_if' => 'Este campo es obligatorio',
				'privado_id.required_if' => 'Este campo es obligatorio',
				'privado_otra.required_if' => 'Este campo es obligatorio',
				'rural_id.required_if' => 'Este campo es obligatorio',
				'domicilioVenta.required_if' => 'Este campo es obligatorio',
				'rural_otra.required_if' => 'Este campo es obligatorio',
				'textil_id.required_if' => 'Este campo es obligatorio',
				'marcaTextil.required_if' => 'Este campo es obligatorio',
				'textil_otra.required_if' => 'Este campo es obligatorio',
				'contactoexplotacion_id.required' => 'Este campo es obligatorio',
				'contactoexplotacion_otro.required_if' => 'Este campo es obligatorio',
				'viajo_id.required' => 'Este campo es obligatorio',
				'acompanado_id.required_if' => 'Este campo es obligatorio',
				'acompanadored_id.required_if' => 'Este campo es obligatorio',
				'domicilio.required' => 'Este campo es obligatorio',
				'residelugar_id.required' => 'Este campo es obligatorio',
				'engano_id.required' => 'Este campo es obligatorio',
				'haypersona_id.required' => 'Este campo es obligatorio',
				'tipovictima_id.required' => 'Este campo es obligatorio',
				'tarea.required' => 'Este campo es obligatorio',
				'horasTarea.required' => 'Este campo es obligatorio',
				'frecuenciapago_id.required' => 'Este campo es obligatorio',
				'modalidadpagos_id.required' => 'Este campo es obligatorio',
				'especiaconcepto_id.required_if' => 'Este campo es obligatorio',
				'especiaconceptos_otro.required_if' => 'Este campo es obligatorio',
				'montoPago.required' => 'Este campo es obligatorio',
				'deuda_id.required' => 'Este campo es obligatorio',
				'motivodeuda_id.required_if' => 'Este campo es obligatorio',
				'lugardeuda_id.required_if' => 'Este campo es obligatorio',
				'motivodeuda_otro.required_if' => 'Este campo es obligatorio',
				'permanencia_id.required' => 'Este campo es obligatorio',
				'testigo_id.required' => 'Este campo es obligatorio',
				'coordinadorPTN.required_if' => 'Este campo es obligatorio',
				'coordinadorPTN_otro.required_if' => 'Este campo es obligatorio',
				'haycorriente_id.required' => 'Este campo es obligatorio',
				'haygas_id.required' => 'Este campo es obligatorio',
				'haymedida_id.required' => 'Este campo es obligatorio',
				'haymedidas_otro.required_if' => 'Este campo es obligatorio',
				'hayhacinamiento_id.required' => 'Este campo es obligatorio',
				'hayagua_id.required' => 'Este campo es obligatorio',
				'haybano_id.required' => 'Este campo es obligatorio',
				'cuantosbano_id.required' => 'Este campo es obligatorio',
				'material_id.required' => 'Este campo es obligatorio',
				'material_otro.required_if' => 'Este campo es obligatorio',
				'elementotrabajo_id.required' => 'Este campo es obligatorio',
				'elementoseguridad_id.required' => 'Este campo es obligatorio',
			]);

		$data = request()->all();

		$data['user_id'] = $userId;

		$formularioD = \App\FormD\Dformulario::find($id);

		if ($_POST['paisCaptacion'] === '') {

			$data['paisCaptacion'] = $formularioD->paisCaptacion;
		}

		if ($_POST['provinciaCaptacion'] === '') {

			$data['provinciaCaptacion'] = $formularioD->provinciaCaptacion;
		}

		if ($_POST['ciudadCaptacion'] === '') {

			$data['ciudadCaptacion'] = $formularioD->ciudadCaptacion;
		}

		if ($_POST['paisExplotacion'] === '') {

			$data['paisExplotacion'] = $formularioD->paisExplotacion;
		}

		if ($_POST['provinciaExplotacion'] === '') {

			$data['provinciaExplotacion'] = $formularioD->provinciaExplotacion;
		}

		if ($_POST['ciudadExplotacion'] === '') {

			$data['ciudadExplotacion'] = $formularioD->ciudadExplotacion;
		}

		$formularioD->update($data);


		if (isset($data['privado_id'])) {
			$formularioD->privados()->sync($data['privado_id']);
		}

		if (isset($data['textil_id'])) {
			$formularioD->textils()->sync($data['textil_id']);
		}

		if (isset($data['rural_id'])) {
			$formularioD->rurals()->sync($data['rural_id']);
		}

		if (isset($data['especiaconcepto_id'])) {
			$formularioD->especiaconceptos()->sync($data['especiaconcepto_id']);
		}

		if (isset($data['motivodeuda_id'])) {
			$formularioD->motivodeudas()->sync($data['motivodeuda_id']);
		}

		if (isset($data['haymedida_id'])) {
			$formularioD->haymedidas()->sync($data['haymedida_id']);
		}

		return redirect('formularios/D');
	}

	public function destroyD($id)
	{
		$Dformulario = \App\FormD\Dformulario::find($id);

		$Dformulario->delete();

    	session()->flash('message', 'El formulario se eliminó con éxito.');

    	return redirect('formularios');	
	}

	public function createE()
	{
		$userId = auth()->user()->id;
		$numeroCarpeta = DB::table('aformularios')
											->WHERE('user_id', '=', $userId)
											->ORDERBY('updated_at', 'desc')
											->first()
											->datos_numero_carpeta;
		$documentos = \App\FormE\Edocumento::all();
		$generos = \App\FormB\Genero::all();
		$vinculaciones = \App\FormE\Vinculacion::all();
		$roles = \App\FormE\Roldelito::all();

		return view('formularios.formularioE', 
												['numeroCarpeta' => $numeroCarpeta,
												   
											    'documentos' => $documentos,
											   
											    'generos' => $generos,
											   
											    'vinculaciones' => $vinculaciones,
											   
											    'roles' => $roles]);
	}

	public function insertE()
	{
		$userId = auth()->user()->id;
		
		request()->validate(
			[
				'nombreApellido' => 'required',
				'edocumentos_id' => 'required',
				'documentoCual' => 'required_if:edocumentos_id,==,7',
				'numeroDocumento' => 'required',
				'edad' => 'required',
				'genero_id' => 'required',
				'generoCual' => 'required_if:genero_id,==,5',
				'vinculacion_id' => 'required',
				'vinculacionCual' => 'required_if:vinculacion_id,==,6',
				'rolDelito_id' => 'required'
			],
			[
				'nombreApellido.required' => 'Este campo es obligatorio',
				'edocumentos_id.required' => 'Este campo es obligatorio',
				'documentoCual.required_if' => 'Este campo es obligatorio',
				'numeroDocumento.required' => 'Este campo es obligatorio',
				'edad.required' => 'Este campo es obligatorio',
				'genero_id.required' => 'Este campo es obligatorio',
				'generoCual.required_if' => 'Este campo es obligatorio',
				'vinculacion_id.required' => 'Este campo es obligatorio',
				'vinculacionCual.required_if' => 'Este campo es obligatorio',
				'rolDelito_id.required' => 'Este campo es obligatorio'
			]);

		$data = request()->all();

		$data['user_id'] = $userId;

		// dd($data);

		$guardoEformulario = \App\FormE\Eformulario::create($data);

		$ultimoId = $guardoEformulario->id;

		$eFormulario = \App\FormE\Eformulario::find($ultimoId);

		$eFormulario->roldelitos()->sync($data['rolDelito_id']);

		return redirect('formularios/E');
	}

	public function editE($id)
	{
		$userId = auth()->user()->id;
		$numeroCarpeta = DB::table('aformularios')
											->WHERE('user_id', '=', $userId)
											->ORDERBY('updated_at')
											->first()
											->datos_numero_carpeta;
		$documentos = \App\FormE\Edocumento::all();
		$generos = \App\FormB\Genero::all();
		$vinculaciones = \App\FormE\Vinculacion::all();
		$roles = \App\FormE\Roldelito::all();
		$eFormulario = \App\FormE\Eformulario::find($id);

		return view('formularios.editar.formularioE_edit', 
															['numeroCarpeta' => $numeroCarpeta,
															   
														    'documentos' => $documentos,
														   
														    'generos' => $generos,
														   
														    'vinculaciones' => $vinculaciones,
														   
														    'roles' => $roles,

															'eFormulario' => $eFormulario]
														);
	}

	public function updateE($id)
	{
		$userId = auth()->user()->id;
		
		request()->validate(
			[
				'nombreApellido' => 'required',
				'edocumentos_id' => 'required',
				'documentoCual' => 'required_if:edocumentos_id,==,7',
				'numeroDocumento' => 'required',
				'edad' => 'required',
				'genero_id' => 'required',
				'generoCual' => 'required_if:genero_id,==,5',
				'vinculacion_id' => 'required',
				'vinculacionCual' => 'required_if:vinculacion_id,==,6',
				'rolDelito_id' => 'required'
			],
			[
				'nombreApellido.required' => 'Este campo es obligatorio',
				'edocumentos_id.required' => 'Este campo es obligatorio',
				'documentoCual.required_if' => 'Este campo es obligatorio',
				'numeroDocumento.required' => 'Este campo es obligatorio',
				'edad.required' => 'Este campo es obligatorio',
				'genero_id.required' => 'Este campo es obligatorio',
				'generoCual.required_if' => 'Este campo es obligatorio',
				'vinculacion_id.required' => 'Este campo es obligatorio',
				'vinculacionCual.required_if' => 'Este campo es obligatorio',
				'rolDelito_id.required' => 'Este campo es obligatorio'
			]);

		$data = request()->all();

		$data['user_id'] = $userId;

		$formularioE = \App\FormE\Eformulario::find($id);

		$formularioE->update($data);

		$formularioE->roldelitos()->sync($data['rolDelito_id']);

		return redirect('formularios/E');
	}

	public function destroyE($id)
	{
		$Eformulario = \App\FormE\Eformulario::find($id);

		$Eformulario->delete();

    	session()->flash('message', 'El formulario se eliminó con éxito.');

    	return redirect('formularios');	
	}

	public function createF()
	{
		$userId = auth()->user()->id;
		$aFormularios = \App\FormA\Aformulario::all();
		$numeroCarpeta = DB::table('aformularios')
											->WHERE('user_id', '=', $userId)
											->ORDERBY('updated_at', 'desc')
											->first()
											->datos_numero_carpeta;
		$derivacionOrganismo = DB::table('otrosorganismos')
											->get();
		$datosOrgJudiciales = \App\FormF\Orgjudicial::all();
		$datosProgNacionales = \App\FormF\Orgprognacional::all();
		$datosPolicia = \App\FormF\Policia::all();
		$datosAsistencia = \App\FormF\Asistencia::all();
		$datosSocioeconomica = \App\FormF\Socioeconomic::all();
		$datosOrgJudicialesActualmente = \App\FormF\Orgjudicialactualmente::all();
		$datosProgNacionalesActualmente = \App\FormF\Orgprognacionalactualmente::all();
		$datosPoliciaActualmente = \App\FormF\Policiaactualmente::all();

		return view('formularios.formularioF', ['numeroCarpeta' => $numeroCarpeta,
												'aFormularios' => $aFormularios,
												'datosOrgJudiciales' => $datosOrgJudiciales,
												'datosProgNacionales' => $datosProgNacionales,
												'datosPolicia' => $datosPolicia,
												'datosOrgJudicialesActualmente' => $datosOrgJudicialesActualmente,
												'datosProgNacionalesActualmente' => $datosProgNacionalesActualmente,
												'datosPoliciaActualmente' => $datosPoliciaActualmente,
												'datosAsistencia' => $datosAsistencia,
												'datosSocioeconomica' => $datosSocioeconomica,
												'derivacionOrganismo' => $derivacionOrganismo]);
	}

	public function insertF()
	{
		// request()->validate([],[]);
		$userId = auth()->user()->id;

		$data = request()->all();

		$data['user_id'] = $userId;
		// var_dump($data['user_id']);
		// dd($data);

		$guardoFormularioF = \App\FormF\Fformulario::create($data);

		$idFormularioF = $guardoFormularioF->id;

		$fFromulario = \App\FormF\Fformulario::find($idFormularioF);

		if (isset($data['orgjudicials_id'])) {
			$fFromulario->orgjudicials()->sync($data['orgjudicials_id']);
		}else{
			$fFromulario->orgjudicials()->sync(null);
		}

		if (isset($data['orgprognacionals_id'])) {
			$fFromulario->orgprognacionals()->sync($data['orgprognacionals_id']);
		}else{
			$fFromulario->orgprognacionals()->sync(null);
		}

		if (isset($data['policias_id'])) {
			$fFromulario->policias()->sync($data['policias_id']);
		}else{
			$fFromulario->policias()->sync(null);
		}

		if (isset($data['asistencia_id'])) {
			$fFromulario->asistencias()->sync($data['asistencia_id']);
		}else{
			$fFromulario->asistencias()->sync(null);
		}

		if (isset($data['socioeconomic_id'])) {
			$fFromulario->socioeconomics()->sync($data['socioeconomic_id']);
		}else{
			$fFromulario->socioeconomics()->sync(null);
		}

		if (isset($data['orgjudicialactualmentes_id'])) {
			$fFromulario->orgjudicialactualmentes()->sync($data['orgjudicialactualmentes_id']);
		}else{
			$fFromulario->orgjudicialactualmentes()->sync(null);
		}

		if (isset($data['orgprognacionalactualmente_id'])) {
			$fFromulario->orgprognacionalactualmentes()->sync($data['orgprognacionalactualmente_id']);
		}else{
			$fFromulario->orgprognacionalactualmentes()->sync(null);
		}

		if (isset($data['policiaactualmentes_id'])) {
			$fFromulario->policiaactualmentes()->sync($data['policiaactualmentes_id']);
		}else{
			$fFromulario->policiaactualmentes()->sync(null);
		}

		// $orgProgNacionalOtro = $data['orgprognacionalOtro'];
		if (isset($data['orgprognacionalOtro'][0])) {
			foreach ($data['orgprognacionalOtro'] as $nombre) {
			$guardoOrgProgNacionalOtro = \App\FormF\Orgprognacionalotro::create(['nombreOrganismo' => $nombre, 'fformulario_id' => $idFormularioF]);
			}
		}
		
		// $orgProgProvincial = $data['orgProgProvinciales'];
		if (isset($data['orgProgProvinciales'][0])) {
			foreach ($data['orgProgProvinciales'] as $nombre) {
			$guardoOrgProgProvincial = \App\FormF\Orgprogprovincial::create(['nombreOrganismo' => $nombre, 'fformulario_id' => $idFormularioF]);
			}
		}

		// $orgProgMunicipales = $data['orgProgMunicipales'];
		if (isset($data['orgProgMunicipales'][0])) {
			foreach ($data['orgProgMunicipales'] as $nombre) {
				$guardoOrgProgMunicipales = \App\FormF\Orgprogmunicipal::create(['nombreOrganismo' => $nombre, 'fformulario_id' => $idFormularioF]);
			}
		}

		// $orgSocCivil = $data['orgSocCivil'];
		if (isset($data['orgSocCivil'][0])) {
			foreach ($data['orgSocCivil'] as $nombre) {
				$guardoOrgSocCivil = \App\FormF\Orgsoccivil::create(['nombreOrganismo' => $nombre, 'fformulario_id' => $idFormularioF]);
			}
		}

		//-------Parte de Actualmente

		// $orgProgNacionalActualmenteOtro = $data['orgprognacionalActualmenteOtro'];
		if (isset($data['orgprognacionalActualmenteOtro'][0])) {
			foreach ($data['orgprognacionalActualmenteOtro'] as $nombre) {
			$guardoOrgProgNacionalActualmenteOtro = \App\FormF\Orgprognacionalactualmenteotro::create(['nombreOrganismo' => $nombre, 'fformulario_id' => $idFormularioF]);
			}
		}
		
		// $orgProgProvincialesActualmente = $data['orgProgProvincialesActualmente'];
		if (isset($data['orgProgProvincialesActualmente'][0])) {
			foreach ($data['orgProgProvincialesActualmente'] as $nombre) {
			$guardoOrgProgProvincialesActualmente = \App\FormF\Orgprogprovincialesactualmente::create(['nombreOrganismo' => $nombre, 'fformulario_id' => $idFormularioF]);
			}
		}

		// $orgProgMunicipalesActualmente = $data['orgProgMunicipalesActualmente'];
		if (isset($data['orgProgMunicipalesActualmente'][0])) {
			foreach ($data['orgProgMunicipalesActualmente'] as $nombre) {
				$guardoOrgProgMunicipalesActualmente = \App\FormF\Orgprogmunicipalesactualmente::create(['nombreOrganismo' => $nombre, 'fformulario_id' => $idFormularioF]);
			}
		}

		// $orgSocCivilActualmente = $data['orgSocCivilActualmente'];
		if (isset($data['orgSocCivilActualmente'][0])) {
			foreach ($data['orgSocCivilActualmente'] as $nombre) {
				$guardoOrgSocCivilActualmente = \App\FormF\Orgsoccivilactualmente::create(['nombreOrganismo' => $nombre, 'fformulario_id' => $idFormularioF]);
			}
		}
		// dd('Se guardo');

		return redirect('formularios/G');	
	}

	public function editF($id)
	{
		$userId = auth()->user()->id;
		$aFormularios = \App\FormA\Aformulario::all();
		$numeroCarpeta = DB::table('aformularios')
											->WHERE('user_id', '=', $userId)
											->ORDERBY('updated_at', 'desc')
											->first()
											->datos_numero_carpeta;
		$derivacionOrganismo = DB::table('otrosorganismos')
											->get();
		$datosOrgJudiciales = \App\FormF\Orgjudicial::all();
		$datosProgNacionales = \App\FormF\Orgprognacional::all();
		$datosPolicia = \App\FormF\Policia::all();
		$datosAsistencia = \App\FormF\Asistencia::all();
		$datosSocioeconomica = \App\FormF\Socioeconomic::all();
		$datosOrgJudicialesActualmente = \App\FormF\Orgjudicialactualmente::all();
		$datosProgNacionalesActualmente = \App\FormF\Orgprognacionalactualmente::all();
		$datosPoliciaActualmente = \App\FormF\Policiaactualmente::all();
		// ---necesarios para el edit
		$formularioF = \App\FormF\Fformulario::find($id);
		$orgProgNacionalOtro = \App\FormF\Orgprognacionalotro::all();
		$orgProgProvincial = \App\FormF\Orgprogprovincial::all();
		$orgProgMunipal = \App\FormF\Orgprogmunicipal::all();
		$orgSocCivil = \App\FormF\Orgsoccivil::all();
		$orgProgNacionalActualmenteOtro = \App\FormF\Orgprognacionalactualmenteotro::all();
		$orgProgProvincialesAlactualmente = \App\FormF\Orgprogprovincialesactualmente::all();
		$orgProgMunipalesActualmente = \App\FormF\Orgprogmunicipalesactualmente::all();
		$orgSocCivilActualmente = \App\FormF\Orgsoccivilactualmente::all();


		return view('formularios.editar.formularioF_edit', [
												'aFormularios' => $aFormularios,
												'datosOrgJudiciales' => $datosOrgJudiciales,
												'datosProgNacionales' => $datosProgNacionales,
												'datosPolicia' => $datosPolicia,
												'datosOrgJudicialesActualmente' => $datosOrgJudicialesActualmente,
												'datosProgNacionalesActualmente' => $datosProgNacionalesActualmente,
												'datosPoliciaActualmente' => $datosPoliciaActualmente,
												'datosAsistencia' => $datosAsistencia,
												'datosSocioeconomica' => $datosSocioeconomica,
												'derivacionOrganismo' => $derivacionOrganismo,
												'formularioF' => $formularioF,
												'orgProgNacionalOtro' => $orgProgNacionalOtro,
												'orgProgProvincial' => $orgProgProvincial,
												'orgProgMunipal' => $orgProgMunipal,
												'orgSocCivil' => $orgSocCivil,
												'orgProgNacionalActualmenteOtro' => $orgProgNacionalActualmenteOtro,
												'orgProgProvincialesAlactualmente' => $orgProgProvincialesAlactualmente,
												'orgProgMunipalesActualmente' => $orgProgMunipalesActualmente,
												'orgSocCivilActualmente' => $orgSocCivilActualmente
											]);
	}

	public function updateF($id)
	{
		// request()->validate([],[]);
		$userId = auth()->user()->id;

		$data = request()->all();
		$data['user_id'] = $userId;

		// dd($data);

		// $guardoFormularioF = \App\FormF\Fformulario::create($data);
		$formularioF = \App\FormF\Fformulario::find($id);

		$formularioF->update($data);

		// $idFormularioF = $guardoFormularioF->id;

		// $fFromulario = \App\FormF\Fformulario::find($idFormularioF);

		if (isset($data['orgjudicials_id'])) {
			$formularioF->orgjudicials()->sync($data['orgjudicials_id']);
		}else{
			$formularioF->orgjudicials()->sync(null);
		}

		if (isset($data['orgprognacionals_id'])) {
			$formularioF->orgprognacionals()->sync($data['orgprognacionals_id']);
		}else{
			$formularioF->orgprognacionals()->sync(null);
		}

		if (isset($data['policias_id'])) {
			$formularioF->policias()->sync($data['policias_id']);
		}else{
			$formularioF->policias()->sync(null);
		}

		if (isset($data['asistencia_id'])) {
			$formularioF->asistencias()->sync($data['asistencia_id']);
		}else{
			$formularioF->asistencias()->sync(null);
		}

		if (isset($data['socioeconomic_id'])) {
			$formularioF->socioeconomics()->sync($data['socioeconomic_id']);
		}else{
			$formularioF->socioeconomics()->sync(null);
		}

		if (isset($data['orgjudicialactualmentes_id'])) {
			$formularioF->orgjudicialactualmentes()->sync($data['orgjudicialactualmentes_id']);
		}else{
			$formularioF->orgjudicialactualmentes()->sync(null);
		}

		if (isset($data['orgprognacionalactualmente_id'])) {
			$formularioF->orgprognacionalactualmentes()->sync($data['orgprognacionalactualmente_id']);
		}else{
			$formularioF->orgprognacionalactualmentes()->sync(null);
		}

		if (isset($data['policiaactualmentes_id'])) {
			$formularioF->policiaactualmentes()->sync($data['policiaactualmentes_id']);
		}else{
			$formularioF->policiaactualmentes()->sync(null);
		}

		$orgProgNacionalOtro = $formularioF->orgprognacionalotros;

		// dd(isset($data['orgprognacionalOtro'][0]));

		// $orgProgNacionalOtroDatosActualizado = $data['orgprognacionalOtro'];
		if (isset($data['orgprognacionalOtro'][0])) {
			if(count($data['orgprognacionalOtro']) === count($formularioF->orgprognacionalotros)) {
				for ($i=0; $i < count($formularioF->orgprognacionalotros); $i++) { 
					$orgProgNacionalOtro[$i]->update(['nombreOrganismo' => $data['orgprognacionalOtro'][$i], 'fformulario_id' => $id]);
				}
			}elseif(count($data['orgprognacionalOtro']) > count($formularioF->orgprognacionalotros)){
				// dd('Entra');
				// $numActualizado = count($data['orgprognacionalOtro']);//4
				$a = 0;
				do {
					for ($i=0; $i < count($formularioF->orgprognacionalotros); $i++) { 
						$orgProgNacionalOtro[$i]->update(['nombreOrganismo' => $data['orgprognacionalOtro'][$i], 'fformulario_id' => $id]);
					}
					$a++;
				} while ($a < count($formularioF->orgprognacionalotros));
				// dd(count($data['orgprognacionalOtro']));
				for ($i=count($formularioF->orgprognacionalotros); $i < count($data['orgprognacionalOtro']); $i++) { 
					$guardoOrgProgNacionalOtroNuevo = \App\FormF\Orgprognacionalotro::create(['nombreOrganismo' => $data['orgprognacionalOtro'][$i], 'fformulario_id' => $id]);
				}
			}else{
				for ($i=0; $i < count($data['orgprognacionalOtro']) ; $i++) { 
						$orgProgNacionalOtro[$i]->update(['nombreOrganismo' => $data['orgprognacionalOtro'][$i], 'fformulario_id' => $id]);
				}
				for ($i=count($data['orgprognacionalOtro']); $i < count($formularioF->orgprognacionalotros); $i++) { 
					$orgProgNacionalOtro[$i]->update(['nombreOrganismo' => null, 'fformulario_id' => null]);
				}
			}
		}


		$orgProgProvincial = $formularioF->orgprogprovincials;
		// dd($orgProgProvincial->toArray());
		// dd(isset($data['orgProgProvinciales'][0]));

		// $orgProgProvincialDatosActualizado = $data['orgProgProvinciales'];
		// dd(isset($data['orgProgProvinciales'][0]));
		if (isset($data['orgProgProvinciales'][0])) {
			if(count($data['orgProgProvinciales']) === count($formularioF->orgprogprovincials)) {
				for ($i=0; $i < count($formularioF->orgprogprovincials); $i++) { 
					$orgProgProvincial[$i]->update(['nombreOrganismo' => $data['orgProgProvinciales'][$i], 'fformulario_id' => $id]);
				}
			}elseif(count($data['orgProgProvinciales']) > count($formularioF->orgprogprovincials)){
				$a = 0;
				do {
					for ($i=0; $i < count($formularioF->orgprogprovincials); $i++) { 
						$orgProgProvincial[$i]->update(['nombreOrganismo' => $data['orgProgProvinciales'][$i], 'fformulario_id' => $id]);
					}
					$a++;
				} while ($a < count($formularioF->orgprogprovincials));
				for ($i=count($formularioF->orgprogprovincials); $i < count($data['orgProgProvinciales']); $i++) { 
					$guardoOrgProgProvincialNuevo = \App\FormF\Orgprogprovincial::create(['nombreOrganismo' => $data['orgProgProvinciales'][$i], 'fformulario_id' => $id]);
				}
			}else{
				for ($i=0; $i < count($data['orgProgProvinciales']) ; $i++) { 
						$orgProgProvincial[$i]->update(['nombreOrganismo' => $data['orgProgProvinciales'][$i], 'fformulario_id' => $id]);
				}
				for ($i=count($data['orgProgProvinciales']); $i < count($formularioF->orgprogprovincials); $i++) { 
					$orgProgProvincial[$i]->update(['nombreOrganismo' => null, 'fformulario_id' => null]);
				}
			}
		}

		$orgProgMunicipales = $formularioF->orgprogmunicipals;

		// $orgProgMunicipalesDatosActualizado = $data['orgProgMunicipales'];
		// dd(isset($data['orgProgMunicipales'][0]));
		// dd(count($data['orgProgMunicipales']) > count($formularioF->orgprogmunicipals));
		if (isset($data['orgProgMunicipales'][0])) {
			if(count($data['orgProgMunicipales']) === count($formularioF->orgprogmunicipals)) {
				for ($i=0; $i < count($formularioF->orgprogmunicipals); $i++) { 
					$orgProgMunicipales[$i]->update(['nombreOrganismo' => $data['orgProgMunicipales'][$i], 'fformulario_id' => $id]);
				}
			}elseif(count($data['orgProgMunicipales']) > count($formularioF->orgprogmunicipals)){
				$a = 0;
				do {
					for ($i=0; $i < count($formularioF->orgprogmunicipals); $i++) { 
						$orgProgMunicipales[$i]->update(['nombreOrganismo' => $data['orgProgMunicipales'][$i], 'fformulario_id' => $id]);
					}
					$a++;
				} while ($a < count($formularioF->orgprogmunicipals));
				for ($i=count($formularioF->orgprogmunicipals); $i < count($data['orgProgMunicipales']); $i++) { 
					$guardoOrgProgMunicipalesNuevo = \App\FormF\Orgprogmunicipal::create(['nombreOrganismo' => $data['orgProgMunicipales'][$i], 'fformulario_id' => $id]);
				}
			}else{
				for ($i=0; $i < count($data['orgProgMunicipales']) ; $i++) { 
						$orgProgMunicipales[$i]->update(['nombreOrganismo' => $data['orgProgMunicipales'][$i], 'fformulario_id' => $id]);
				}
				for ($i=count($data['orgProgMunicipales']); $i < count($formularioF->orgprogmunicipals); $i++) { 
					$orgProgMunicipales[$i]->update(['nombreOrganismo' => null, 'fformulario_id' => null]);
				}
			}
		}

		$orgSocCivil = $formularioF->orgsoccivils;

		// $orgSocCivilDatosActualizado = $data['orgSocCivil'];
		// dd(isset($data['orgSocCivil'][0]));

		if (isset($data['orgSocCivil'][0])) {
			if(count($data['orgSocCivil']) === count($formularioF->orgsoccivils)) {
				for ($i=0; $i < count($formularioF->orgsoccivils); $i++) { 
					$orgSocCivil[$i]->update(['nombreOrganismo' => $data['orgSocCivil'][$i], 'fformulario_id' => $id]);
				}
			}elseif(count($data['orgSocCivil']) > count($formularioF->orgsoccivils)){
				$a = 0;
				do {
					for ($i=0; $i < count($formularioF->orgsoccivils); $i++) { 
						$orgSocCivil[$i]->update(['nombreOrganismo' => $data['orgSocCivil'][$i], 'fformulario_id' => $id]);
					}
					$a++;
				} while ($a < count($formularioF->orgsoccivils));
				for ($i=count($formularioF->orgsoccivils); $i < count($data['orgSocCivil']); $i++) { 
					$guardoOrgSocCivilNuevo = \App\FormF\Orgsoccivil::create(['nombreOrganismo' => $data['orgSocCivil'][$i], 'fformulario_id' => $id]);
				}
			}else{
				for ($i=0; $i < count($data['orgSocCivil']) ; $i++) { 
						$orgSocCivil[$i]->update(['nombreOrganismo' => $data['orgSocCivil'][$i], 'fformulario_id' => $id]);
				}
				for ($i=count($data['orgSocCivil']); $i < count($formularioF->orgsoccivils); $i++) { 
					$orgSocCivil[$i]->update(['nombreOrganismo' => null, 'fformulario_id' => null]);
				}
			}
		}

		$orgProgNacionalActualmenteOtro = $formularioF->orgprognacionalactualmenteotros;

		// $orgProgNacionalActualmenteOtroDatosActualizado = $data['orgprognacionalActualmenteOtro'];
		// dd(isset($data['orgprognacionalActualmenteOtro'][0]));

		if (isset($data['orgprognacionalActualmenteOtro'][0])) {
			if(count($data['orgprognacionalActualmenteOtro']) === count($formularioF->orgprognacionalactualmenteotros)) {
				for ($i=0; $i < count($formularioF->orgprognacionalactualmenteotros); $i++) { 
					$orgProgNacionalActualmenteOtro[$i]->update(['nombreOrganismo' => $data['orgprognacionalActualmenteOtro'][$i], 'fformulario_id' => $id]);
				}
			}elseif(count($data['orgprognacionalActualmenteOtro']) > count($formularioF->orgprognacionalactualmenteotros)){
				$a = 0;
				do {
					for ($i=0; $i < count($formularioF->orgprognacionalactualmenteotros); $i++) { 
						$orgProgNacionalActualmenteOtro[$i]->update(['nombreOrganismo' => $data['orgprognacionalActualmenteOtro'][$i], 'fformulario_id' => $id]);
					}
					$a++;
				} while ($a < count($formularioF->orgprognacionalactualmenteotros));
				for ($i=count($formularioF->orgprognacionalactualmenteotros); $i < count($data['orgprognacionalActualmenteOtro']); $i++) { 
					$guardoOrgProgNacionalActualmenteOtroNuevo = \App\FormF\Orgprognacionalactualmenteotro::create(['nombreOrganismo' => $data['orgprognacionalActualmenteOtro'][$i], 'fformulario_id' => $id]);
				}
			}else{
				for ($i=0; $i < count($data['orgprognacionalActualmenteOtro']) ; $i++) { 
						$orgProgNacionalActualmenteOtro[$i]->update(['nombreOrganismo' => $data['orgprognacionalActualmenteOtro'][$i], 'fformulario_id' => $id]);
				}
				for ($i=count($data['orgprognacionalActualmenteOtro']); $i < count($formularioF->orgprognacionalactualmenteotros); $i++) { 
					$orgProgNacionalActualmenteOtro[$i]->update(['nombreOrganismo' => null, 'fformulario_id' => null]);
				}
			}
		}

		$orgProgProvincialesActualmente = $formularioF->orgprogprovincialesactualmentes;

		// $orgProgProvincialesActualmenteDatosActualizado = $data['orgProgProvincialesActualmente'];
		// dd(isset($data['orgProgProvincialesActualmente'][0]));

		if (isset($data['orgProgProvincialesActualmente'][0])) {
			if(count($data['orgProgProvincialesActualmente']) === count($formularioF->orgprogprovincialesactualmentes)) {
				for ($i=0; $i < count($formularioF->orgprogprovincialesactualmentes); $i++) { 
					$orgProgProvincialesActualmente[$i]->update(['nombreOrganismo' => $data['orgProgProvincialesActualmente'][$i], 'fformulario_id' => $id]);
				}
			}elseif(count($data['orgProgProvincialesActualmente']) > count($formularioF->orgprogprovincialesactualmentes)){
				$a = 0;
				do {
					for ($i=0; $i < count($formularioF->orgprogprovincialesactualmentes); $i++) { 
						$orgProgProvincialesActualmente[$i]->update(['nombreOrganismo' => $data['orgProgProvincialesActualmente'][$i], 'fformulario_id' => $id]);
					}
					$a++;
				} while ($a < count($formularioF->orgprogprovincialesactualmentes));
				for ($i=count($formularioF->orgprogprovincialesactualmentes); $i < count($data['orgProgProvincialesActualmente']); $i++) { 
					$guardoOrgProgProvincialesActualmenteDatosActualizadoNuevo = \App\FormF\Orgprogprovincialesactualmente::create(['nombreOrganismo' => $data['orgProgProvincialesActualmente'][$i], 'fformulario_id' => $id]);
				}
			}else{
				for ($i=0; $i < count($data['orgProgProvincialesActualmente']) ; $i++) { 
						$orgProgProvincialesActualmente[$i]->update(['nombreOrganismo' => $data['orgProgProvincialesActualmente'][$i], 'fformulario_id' => $id]);
				}
				for ($i=count($data['orgProgProvincialesActualmente']); $i < count($formularioF->orgprogprovincialesactualmentes); $i++) { 
					$orgProgProvincialesActualmente[$i]->update(['nombreOrganismo' => null, 'fformulario_id' => null]);
				}
			}
		}

		$orgProgMunicipalesActualmente = $formularioF->orgprogmunicipalesactualmentes;

		// $orgProgMunicipalesActualmenteDatosActualizado = $data['orgProgMunicipalesActualmente'];
		// dd(isset($data['orgProgMunicipalesActualmente'][0]));

		if (isset($data['orgProgMunicipalesActualmente'][0])) {
			if(count($data['orgProgMunicipalesActualmente']) === count($formularioF->orgprogmunicipalesactualmentes)) {
				for ($i=0; $i < count($formularioF->orgprogmunicipalesactualmentes); $i++) { 
					$orgProgMunicipalesActualmente[$i]->update(['nombreOrganismo' => $data['orgProgMunicipalesActualmente'][$i], 'fformulario_id' => $id]);
				}
			}elseif(count($data['orgProgMunicipalesActualmente']) > count($formularioF->orgprogmunicipalesactualmentes)){
				$a = 0;
				do {
					for ($i=0; $i < count($formularioF->orgprogmunicipalesactualmentes); $i++) { 
						$orgProgMunicipalesActualmente[$i]->update(['nombreOrganismo' => $data['orgProgMunicipalesActualmente'][$i], 'fformulario_id' => $id]);
					}
					$a++;
				} while ($a < count($formularioF->orgprogmunicipalesactualmentes));
				for ($i=count($formularioF->orgprogmunicipalesactualmentes); $i < count($data['orgProgMunicipalesActualmente']); $i++) { 
					$guardoOrgProgMunicipalesActualmenteDatosActualizadoNuevo = \App\FormF\Orgprogmunicipalesactualmente::create(['nombreOrganismo' => $data['orgProgMunicipalesActualmente'][$i], 'fformulario_id' => $id]);
				}
			}else{
				for ($i=0; $i < count($data['orgProgMunicipalesActualmente']) ; $i++) { 
						$orgProgMunicipalesActualmente[$i]->update(['nombreOrganismo' => $data['orgProgMunicipalesActualmente'][$i], 'fformulario_id' => $id]);
				}
				for ($i=count($data['orgProgMunicipalesActualmente']); $i < count($formularioF->orgprogmunicipalesactualmentes); $i++) { 
					$orgProgMunicipalesActualmente[$i]->update(['nombreOrganismo' => null, 'fformulario_id' => null]);
				}
			}
		}

		$orgSocCivilActualmente = $formularioF->orgsoccivilactualmentes;

		// $orgSocCivilActualmenteDatosActualizado = $data['orgSocCivilActualmente'];
		// dd(isset($data['orgSocCivilActualmente'][0]));

		if (isset($data['orgSocCivilActualmente'][0])) {
			if(count($data['orgSocCivilActualmente']) === count($formularioF->orgsoccivilactualmentes)) {
				for ($i=0; $i < count($formularioF->orgsoccivilactualmentes); $i++) { 
					$orgSocCivilActualmente[$i]->update(['nombreOrganismo' => $data['orgSocCivilActualmente'][$i], 'fformulario_id' => $id]);
				}
			}elseif(count($data['orgSocCivilActualmente']) > count($formularioF->orgsoccivilactualmentes)){
				$a = 0;
				do {
					for ($i=0; $i < count($formularioF->orgsoccivilactualmentes); $i++) { 
						$orgSocCivilActualmente[$i]->update(['nombreOrganismo' => $data['orgSocCivilActualmente'][$i], 'fformulario_id' => $id]);
					}
					$a++;
				} while ($a < count($formularioF->orgsoccivilactualmentes));
				for ($i=count($formularioF->orgsoccivilactualmentes); $i < count($data['orgSocCivilActualmente']); $i++) { 
					$guardoOrgSocCivilActualmenteDatosActualizadoNuevo = \App\FormF\OrgSocCivilActualmente::create(['nombreOrganismo' => $data['orgSocCivilActualmente'][$i], 'fformulario_id' => $id]);
				}
			}else{
				for ($i=0; $i < count($data['orgSocCivilActualmente']) ; $i++) { 
						$orgSocCivilActualmente[$i]->update(['nombreOrganismo' => $data['orgSocCivilActualmente'][$i], 'fformulario_id' => $id]);
				}
				for ($i=count($data['orgSocCivilActualmente']); $i < count($formularioF->orgsoccivilactualmentes); $i++) { 
					$orgSocCivilActualmente[$i]->update(['nombreOrganismo' => null, 'fformulario_id' => null]);
				}
			}
		}

		return redirect('formularios/G');
	}

	public function destroyF($id)
	{
		$Fformulario = \App\FormF\Fformulario::find($id);

		$Fformulario->delete();

    	session()->flash('message', 'El formulario se eliminó con éxito.');

    	return redirect('formularios');	
	}

	public function createG()
	{
		$userId = auth()->user()->id;
		$numeroCarpeta = DB::table('aformularios')
											->WHERE('user_id', '=', $userId)
											->ORDERBY('updated_at', 'desc')
											->first()
											->datos_numero_carpeta;
		//datos del formulario A
			$datosModalidad = \App\FormA\Modalidad::all();;
			$datosEstadoCaso = \App\FormA\Estadocaso::all();
			$datosCaratulacion = \App\FormA\Caratulacionjudicial::all();
			$datosProfesional = \App\FormA\Profesional::all();
			$datosIntervieneActualmente = \App\FormA\Profesionalactualmente::all();
			$datosPresentacion = \App\FormA\Presentacionespontanea::all();
			$datosOrganismo = \App\FormA\Otrosorganismo::all();
			$getIdA = DB::table('aformularios')
			                            ->WHERE('datos_numero_carpeta', '=', $numeroCarpeta)
										->ORDERBY('updated_at', 'desc')
										->first()
										->id;
			$aFormulario = \App\FormA\Aformulario::find($getIdA);
			$todo = DB::table('aformularios')
			                            ->WHERE('aformulario_id', '=', $getIdA)
										->JOIN('aformulario_profesionalinterviniente', 'aformularios.id', '=', 'aformulario_profesionalinterviniente.aformulario_id')
										->JOIN('profesionalintervinientes', 'aformulario_profesionalinterviniente.profesionalinterviniente_id', '=', 'profesionalintervinientes.id')
										->JOIN('profesionals', 'profesionalintervinientes.profesional_id', '=', 'profesionals.id')
										->JOIN('profesionalactualmentes', 'profesionalintervinientes.profesionalactualmente_id', '=', 'profesionalactualmentes.id')
			                            ->get();
		//fin datos del formulario A

		//datos del formulario F
			$datosOrgJudicialesActualmente = \App\FormF\Orgjudicialactualmente::all();
			$datosProgNacionalesActualmente = \App\FormF\Orgprognacionalactualmente::all();
			$datosPoliciaActualmente = \App\FormF\Policiaactualmente::all();
			// ---necesarios para el edit
			$getIdF = DB::table('fformularios')
			                            ->WHERE('numeroCarpeta', '=', $numeroCarpeta)
										->ORDERBY('updated_at', 'desc')
										->first()
										->id;
										// dd($getIdF);
			$formularioF = \App\FormF\Fformulario::find($getIdF);
			$orgProgNacionalOtro = \App\FormF\Orgprognacionalotro::all();
			$orgProgProvincial = \App\FormF\Orgprogprovincial::all();
			$orgProgMunipal = \App\FormF\Orgprogmunicipal::all();
			$orgSocCivil = \App\FormF\Orgsoccivil::all();
			$orgProgNacionalActualmenteOtro = \App\FormF\Orgprognacionalactualmenteotro::all();
			$orgProgProvincialesAlactualmente = \App\FormF\Orgprogprovincialesactualmente::all();
			$orgProgMunipalesActualmente = \App\FormF\Orgprogmunicipalesactualmente::all();
			$orgSocCivilActualmente = \App\FormF\Orgsoccivilactualmente::all();
		//fin datos del formulario F

		//datos del G
			$temaIntervencion = \App\FormG\Temaintervencion::all();
		//Fin datos del G

		return view('formularios.formularioG', [
												'numeroCarpeta' => $numeroCarpeta,
												'aFormulario' => $aFormulario,
												//formulario A
												'datosModalidad' => $datosModalidad,
												'datosEstadoCaso' => $datosEstadoCaso,
												'datosCaratulacion' => $datosCaratulacion,
												'datosProfesional' => $datosProfesional,
												'datosIntervieneActualmente' => $datosIntervieneActualmente,
												'datosPresentacion' => $datosPresentacion,
												'datosOrganismo' => $datosOrganismo,
												'todo' => $todo,
												//fin formulario A
												//formulario F
												'datosOrgJudicialesActualmente' => $datosOrgJudicialesActualmente,
												'datosProgNacionalesActualmente' => $datosProgNacionalesActualmente,
												'datosPoliciaActualmente' => $datosPoliciaActualmente,
												// 'datosAsistencia' => $datosAsistencia,
												// 'datosSocioeconomica' => $datosSocioeconomica,
												// 'derivacionOrganismo' => $derivacionOrganismo,
												'formularioF' => $formularioF,
												'orgProgNacionalOtro' => $orgProgNacionalOtro,
												'orgProgProvincial' => $orgProgProvincial,
												'orgProgMunipal' => $orgProgMunipal,
												'orgSocCivil' => $orgSocCivil,
												'orgProgNacionalActualmenteOtro' => $orgProgNacionalActualmenteOtro,
												'orgProgProvincialesAlactualmente' => $orgProgProvincialesAlactualmente,
												'orgProgMunipalesActualmente' => $orgProgMunipalesActualmente,
												'orgSocCivilActualmente' => $orgSocCivilActualmente,
												//fin formulario F
												'temaIntervencion' => $temaIntervencion
												]);
	}

	public function insertG()
	{
		$userId = auth()->user()->id;

		request()->validate(
			[	'introduccion' => 'required',
		// 		'docInterna.0' => 'required|max:10000',
		// 		'docExterna.0' => 'required|max:10000',
		// 		'notRelacionadas.0' => 'required|max:10000',
		// 		'intervencionEstrategias.0' => 'required|max:10000',
		// 		'infoSocioambiental.0' => 'required|max:10000',

			],
			[	'introduccion.required' => 'Debes completar la introduccion',
		// 		'docInterna.*.required' => 'Subi un archivo, dale!',
		// 		'docExterna.*.required' => 'Subi un archivo, dale!',
		// 		'notRelacionadas.*.required' => 'Subi un archivo, dale!',
		// 		'intervencionEstrategias.*.required' => 'Subi un archivo, dale!',
		// 		'infoSocioambiental.*.required' => 'Subi un archivo, dale!',
		// 		'docInterna.*.max' => 'El tamaño del archivo supera el límite permitido',
		// 		'docExterna.*.max' => 'El tamaño del archivo supera el límite permitido',
		// 		'notRelacionadas.*.max' => 'El tamaño del archivo supera el límite permitido',
		// 		'intervencionEstrategias.*.max' => 'El tamaño del archivo supera el límite permitido',
		// 		'infoSocioambiental.*.max' => 'El tamaño del archivo supera el límite permitido',
			]);

		$data = request()->all();

		$data['user_id'] = $userId;

		$gFormularioGuardado = \App\FormG\Gformulario::create($data);

		$idGFormularioGuardado = $gFormularioGuardado->id;

		// dd(request()->file('docInterna')[0]);

		if (isset($data['docInterna'])) {
			//j sirve para agregarle un indice al archivo y que no arranca en 0
			for ($i=0; $i < count($data['docInterna']); $i++) { 

				$nombreArchivoCliente = request()->file('docInterna')[$i]->getClientOriginalName();

				$docInterna = $nombreArchivoCliente.' - Número de carpeta '.str_slug($data['numeroCarpeta']);

	            $docInterna = $docInterna.'.'.request()->file('docInterna')[$i]->extension();

	            $pathDocInterna = request()->file('docInterna')[$i]->storeAs('public/archivos/docInterna', $docInterna);

	            $pathDocInterna = str_replace('public', 'storage', $pathDocInterna);

	            $datos = ['nombreArchivo' => $docInterna, 'path' => $pathDocInterna, 'gformulario_id' => $idGFormularioGuardado];

	            $guardoDocInterna = \App\FormG\Docinterna::create($datos);

			}
        }

        if (isset($data['docExterna'])) {
			//j sirve para agregarle un indice al archivo y que no arranca en 0
			for ($i=0; $i < count($data['docExterna']); $i++) { 

				$nombreArchivoCliente = request()->file('docExterna')[$i]->getClientOriginalName();

				$docExterna = $nombreArchivoCliente.' - Número de carpeta '.str_slug($data['numeroCarpeta']);

	            $docExterna = $docExterna.'.'.request()->file('docExterna')[$i]->extension();

	            $pathDocExterna = request()->file('docExterna')[$i]->storeAs('public/archivos/docExterna', $docExterna);

	            $pathDocExterna = str_replace('public', 'storage', $pathDocExterna);

	            $datos = ['nombreArchivo' => $docExterna, 'path' => $pathDocExterna, 'gformulario_id' => $idGFormularioGuardado];

	            $guardodDocExterna = \App\FormG\Docexterna::create($datos);

			}
        }

        if (isset($data['notRelacionadas'])) {
			//j sirve para agregarle un indice al archivo y que no arranca en 0
			for ($i=0; $i < count($data['notRelacionadas']); $i++) { 

				$nombreArchivoCliente = request()->file('notRelacionadas')[$i]->getClientOriginalName();

				$notRelacionadas = $nombreArchivoCliente.' - Número de carpeta '.str_slug($data['numeroCarpeta']);

	            $notRelacionadas = $notRelacionadas.'.'.request()->file('notRelacionadas')[$i]->extension();

	            $pathNotRelacionadas = request()->file('notRelacionadas')[$i]->storeAs('public/archivos/notRelacionadas', $notRelacionadas);

	            $pathNotRelacionadas = str_replace('public', 'storage', $pathNotRelacionadas);

	            $datos = ['nombreArchivo' => $notRelacionadas, 'path' => $pathNotRelacionadas, 'gformulario_id' => $idGFormularioGuardado];

	            $guardoNotRelacionadas = \App\FormG\Notrelacionada::create($datos);

			}
        }

        if (isset($data['intervencionEstrategias'])) {
			//j sirve para agregarle un indice al archivo y que no arranca en 0
			for ($i=0; $i < count($data['intervencionEstrategias']); $i++) { 

				$nombreArchivoCliente = request()->file('intervencionEstrategias')[$i]->getClientOriginalName();

				$intervencionEstrategias = $nombreArchivoCliente.' - Número de carpeta '.str_slug($data['numeroCarpeta']);

	            $intervencionEstrategias = $intervencionEstrategias.'.'.request()->file('intervencionEstrategias')[$i]->extension();

	            $pathIntervencionEstrategias = request()->file('intervencionEstrategias')[$i]->storeAs('public/archivos/intervencionEstrategias', $intervencionEstrategias);

	            $pathIntervencionEstrategias = str_replace('public', 'storage', $pathIntervencionEstrategias);

	            $datos = ['nombreArchivo' => $intervencionEstrategias, 'path' => $pathIntervencionEstrategias, 'gformulario_id' => $idGFormularioGuardado];

	            $guardoIntervencionEstrategias = \App\FormG\Intervencionestrategia::create($datos);

			}
        }

        if (isset($data['infoSocioambiental'])) {
			//j sirve para agregarle un indice al archivo y que no arranca en 0
			for ($i=0; $i < count($data['infoSocioambiental']); $i++) { 

				$nombreArchivoCliente = request()->file('infoSocioambiental')[$i]->getClientOriginalName();

				$infoSocioambiental = $nombreArchivoCliente.' - Número de carpeta '.str_slug($data['numeroCarpeta']);

	            $infoSocioambiental = $infoSocioambiental.'.'.request()->file('infoSocioambiental')[$i]->extension();

	            $pathInfoSocioambiental = request()->file('infoSocioambiental')[$i]->storeAs('public/archivos/infoSocioambiental', $infoSocioambiental);

	            $pathInfoSocioambiental = str_replace('public', 'storage', $pathInfoSocioambiental);

	            $datos = ['nombreArchivo' => $infoSocioambiental, 'path' => $pathInfoSocioambiental, 'gformulario_id' => $idGFormularioGuardado];

	            $guardoInfoSocioambiental = \App\FormG\Infosocioambiental::create($datos);

			}
        }

        if (isset($data['fechaIntervencion'])) {
			$cant = (count(request()->input('fechaIntervencion')));

			for ($i=0; $i < $cant; $i++) {

				$intervencion['fechaIntervencion'] = $data['fechaIntervencion'][$i];
				$intervencion['temaIntervencion_id'] = $data['temaIntervencion_id'][$i];
				$intervencion['temaOtro'] = $data['temaOtro'][$i];
				$intervencion['nombreContacto'] = $data['nombreContacto'][$i]; 
				$intervencion['telefonoContacto'] = $data['telefonoContacto'][$i]; 
				$intervencion['descripcionIntervencion'] = $data['descripcionIntervencion'][$i];
				$intervencion['user_id'] = $data['user_id'];

				$guardoIntervencion = \App\FormG\Intervencion::create($intervencion);

				$intervencionId[] = $guardoIntervencion->id;
			}

			$gFormulario = \App\FormG\Gformulario::find($idGFormularioGuardado);

			$guardoRelacion = $gFormulario->intervencions()->sync($intervencionId);

		}

		return redirect('/formularios');	
	}

	public function editG($id)
	{
		$userId = auth()->user()->id;
		$numeroCarpeta = DB::table('aformularios')
											->WHERE('user_id', '=', $userId)
											->ORDERBY('updated_at', 'desc')
											->first()
											->datos_numero_carpeta;
		//datos del formulario A
			$datosModalidad = \App\FormA\Modalidad::all();;
			$datosEstadoCaso = \App\FormA\Estadocaso::all();
			$datosCaratulacion = \App\FormA\Caratulacionjudicial::all();
			$datosProfesional = \App\FormA\Profesional::all();
			$datosIntervieneActualmente = \App\FormA\Profesionalactualmente::all();
			$datosPresentacion = \App\FormA\Presentacionespontanea::all();
			$datosOrganismo = \App\FormA\Otrosorganismo::all();
			$getIdA = DB::table('aformularios')
			                            ->WHERE('datos_numero_carpeta', '=', $numeroCarpeta)
										->ORDERBY('updated_at', 'desc')
										->first()
										->id;
			$aFormulario = \App\FormA\Aformulario::find($getIdA);
			$todo = DB::table('aformularios')
			                            ->WHERE('aformulario_id', '=', $getIdA)
										->JOIN('aformulario_profesionalinterviniente', 'aformularios.id', '=', 'aformulario_profesionalinterviniente.aformulario_id')
										->JOIN('profesionalintervinientes', 'aformulario_profesionalinterviniente.profesionalinterviniente_id', '=', 'profesionalintervinientes.id')
										->JOIN('profesionals', 'profesionalintervinientes.profesional_id', '=', 'profesionals.id')
										->JOIN('profesionalactualmentes', 'profesionalintervinientes.profesionalactualmente_id', '=', 'profesionalactualmentes.id')
			                            ->get();
		//fin datos del formulario A

		//datos del formulario F
			$datosOrgJudicialesActualmente = \App\FormF\Orgjudicialactualmente::all();
			$datosProgNacionalesActualmente = \App\FormF\Orgprognacionalactualmente::all();
			$datosPoliciaActualmente = \App\FormF\Policiaactualmente::all();
			// ---necesarios para el edit
			$getIdF = DB::table('fformularios')
			                            ->WHERE('numeroCarpeta', '=', $numeroCarpeta)
										->ORDERBY('updated_at', 'desc')
										->first()
										->id;
										// dd($getIdF);
			$formularioF = \App\FormF\Fformulario::find($getIdF);
			$orgProgNacionalOtro = \App\FormF\Orgprognacionalotro::all();
			$orgProgProvincial = \App\FormF\Orgprogprovincial::all();
			$orgProgMunipal = \App\FormF\Orgprogmunicipal::all();
			$orgSocCivil = \App\FormF\Orgsoccivil::all();
			$orgProgNacionalActualmenteOtro = \App\FormF\Orgprognacionalactualmenteotro::all();
			$orgProgProvincialesAlactualmente = \App\FormF\Orgprogprovincialesactualmente::all();
			$orgProgMunipalesActualmente = \App\FormF\Orgprogmunicipalesactualmente::all();
			$orgSocCivilActualmente = \App\FormF\Orgsoccivilactualmente::all();
		//fin datos del formulario F

		//datos del G
			$temaIntervencion = \App\FormG\Temaintervencion::all();
			$formularioG = \App\FormG\Gformulario::find($id);
			$intervenciones = $formularioG->intervencions;
			$docInterna = $formularioG->docinternas;
			$docExterna = $formularioG->docexternas;
			$infoSocioambiental = $formularioG->infosocioambientals;
			$intervencionEstrategias = $formularioG->intervencionestrategias;
			$notRelacionadas = $formularioG->notrelacionadas;
			// response()->file($docInterna);
			// dd($docInterna);
		//Fin datos del G

		return view('formularios.editar.formularioG_edit', [
												'numeroCarpeta' => $numeroCarpeta,
												'aFormulario' => $aFormulario,
												//formulario A
												'datosModalidad' => $datosModalidad,
												'datosEstadoCaso' => $datosEstadoCaso,
												'datosCaratulacion' => $datosCaratulacion,
												'datosProfesional' => $datosProfesional,
												'datosIntervieneActualmente' => $datosIntervieneActualmente,
												'datosPresentacion' => $datosPresentacion,
												'datosOrganismo' => $datosOrganismo,
												'todo' => $todo,
												//fin formulario A
												//formulario F
												'datosOrgJudicialesActualmente' => $datosOrgJudicialesActualmente,
												'datosProgNacionalesActualmente' => $datosProgNacionalesActualmente,
												'datosPoliciaActualmente' => $datosPoliciaActualmente,
												// 'datosAsistencia' => $datosAsistencia,
												// 'datosSocioeconomica' => $datosSocioeconomica,
												// 'derivacionOrganismo' => $derivacionOrganismo,
												'formularioF' => $formularioF,
												'orgProgNacionalOtro' => $orgProgNacionalOtro,
												'orgProgProvincial' => $orgProgProvincial,
												'orgProgMunipal' => $orgProgMunipal,
												'orgSocCivil' => $orgSocCivil,
												'orgProgNacionalActualmenteOtro' => $orgProgNacionalActualmenteOtro,
												'orgProgProvincialesAlactualmente' => $orgProgProvincialesAlactualmente,
												'orgProgMunipalesActualmente' => $orgProgMunipalesActualmente,
												'orgSocCivilActualmente' => $orgSocCivilActualmente,
												//fin formulario F
												//formulario F
												'temaIntervencion' => $temaIntervencion,
												'intervenciones' => $intervenciones,
												'docInterna' => $docInterna,
												'docExterna' => $docExterna,
												'infoSocioambiental' => $infoSocioambiental,
												'intervencionEstrategias' => $intervencionEstrategias,
												'notRelacionadas' => $notRelacionadas,
												'formularioG' => $formularioG
												//fin formulario F
												]);
	}

	public function updateG($id)
	{
		$userId = auth()->user()->id;

		request()->validate(
			[	'introduccion' => 'required',
		// 		'docInterna.0' => 'required|max:10000',
		// 		'docExterna.0' => 'required|max:10000',
		// 		'notRelacionadas.0' => 'required|max:10000',
		// 		'intervencionEstrategias.0' => 'required|max:10000',
		// 		'infoSocioambiental.0' => 'required|max:10000',

			],
			[	'introduccion.required' => 'Debes completar la introduccion',
		// 		'docInterna.*.required' => 'Subi un archivo, dale!',
		// 		'docExterna.*.required' => 'Subi un archivo, dale!',
		// 		'notRelacionadas.*.required' => 'Subi un archivo, dale!',
		// 		'intervencionEstrategias.*.required' => 'Subi un archivo, dale!',
		// 		'infoSocioambiental.*.required' => 'Subi un archivo, dale!',
		// 		'docInterna.*.max' => 'El tamaño del archivo supera el límite permitido',
		// 		'docExterna.*.max' => 'El tamaño del archivo supera el límite permitido',
		// 		'notRelacionadas.*.max' => 'El tamaño del archivo supera el límite permitido',
		// 		'intervencionEstrategias.*.max' => 'El tamaño del archivo supera el límite permitido',
		// 		'infoSocioambiental.*.max' => 'El tamaño del archivo supera el límite permitido',
			]);

		$data = request()->all();

		$data['user_id'] = $userId;

		$actualizoGFormulario = \App\FormG\Gformulario::find($id)->update($data);

		// $idGFormularioGuardado = $gFormularioGuardado->id;

		// dd(request()->file('docInterna')[0]);

		if (isset($data['docInterna'])) {
			//j sirve para agregarle un indice al archivo y que no arranca en 0
			for ($i=0; $i < count($data['docInterna']); $i++) { 

				$nombreArchivoCliente = request()->file('docInterna')[$i]->getClientOriginalName();

				$docInterna = $nombreArchivoCliente.' - Número de carpeta '.str_slug($data['numeroCarpeta']);

	            $docInterna = $docInterna.'.'.request()->file('docInterna')[$i]->extension();

	            $pathDocInterna = request()->file('docInterna')[$i]->storeAs('public/archivos/docInterna', $docInterna);

	            $pathDocInterna = str_replace('public', 'storage', $pathDocInterna);

	            $datos = ['nombreArchivo' => $docInterna, 'path' => $pathDocInterna, 'gformulario_id' => $id];

	            $guardoDocInterna = \App\FormG\Docinterna::create($datos);

			}
        }

        if (isset($data['docExterna'])) {
			//j sirve para agregarle un indice al archivo y que no arranca en 0
			for ($i=0; $i < count($data['docExterna']); $i++) { 
				
				$nombreArchivoCliente = request()->file('docExterna')[$i]->getClientOriginalName();

				$docExterna = $nombreArchivoCliente.' - Número de carpeta '.str_slug($data['numeroCarpeta']);

	            $docExterna = $docExterna.'.'.request()->file('docExterna')[$i]->extension();

	            $pathDocExterna = request()->file('docExterna')[$i]->storeAs('public/archivos/docExterna', $docExterna);

	            $pathDocExterna = str_replace('public', 'storage', $pathDocExterna);

	            $datos = ['nombreArchivo' => $docExterna, 'path' => $pathDocExterna, 'gformulario_id' => $id];

	            $guardodDocExterna = \App\FormG\Docexterna::create($datos);

			}
        }

        if (isset($data['notRelacionadas'])) {
			//j sirve para agregarle un indice al archivo y que no arranca en 0
			for ($i=0; $i < count($data['notRelacionadas']); $i++) { 

				$nombreArchivoCliente = request()->file('notRelacionadas')[$i]->getClientOriginalName();

				$notRelacionadas = $nombreArchivoCliente.' - Número de carpeta '.str_slug($data['numeroCarpeta']);

	            $notRelacionadas = $notRelacionadas.'.'.request()->file('notRelacionadas')[$i]->extension();

	            $pathNotRelacionadas = request()->file('notRelacionadas')[$i]->storeAs('public/archivos/notRelacionadas', $notRelacionadas);

	            $pathNotRelacionadas = str_replace('public', 'storage', $pathNotRelacionadas);

	            $datos = ['nombreArchivo' => $notRelacionadas, 'path' => $pathNotRelacionadas, 'gformulario_id' => $id];

	            $guardoNotRelacionadas = \App\FormG\Notrelacionada::create($datos);

			}
        }

        if (isset($data['intervencionEstrategias'])) {
			//j sirve para agregarle un indice al archivo y que no arranca en 0
			for ($i=0; $i < count($data['intervencionEstrategias']); $i++) { 

				$nombreArchivoCliente = request()->file('intervencionEstrategias')[$i]->getClientOriginalName();

				$intervencionEstrategias = $nombreArchivoCliente.' - Número de carpeta '.str_slug($data['numeroCarpeta']);

	            $intervencionEstrategias = $intervencionEstrategias.'.'.request()->file('intervencionEstrategias')[$i]->extension();

	            $pathIntervencionEstrategias = request()->file('intervencionEstrategias')[$i]->storeAs('public/archivos/intervencionEstrategias', $intervencionEstrategias);

	            $pathIntervencionEstrategias = str_replace('public', 'storage', $pathIntervencionEstrategias);

	            $datos = ['nombreArchivo' => $intervencionEstrategias, 'path' => $pathIntervencionEstrategias, 'gformulario_id' => $id];

	            $guardoIntervencionEstrategias = \App\FormG\Intervencionestrategia::create($datos);

			}
        }

        if (isset($data['infoSocioambiental'])) {
			//j sirve para agregarle un indice al archivo y que no arranca en 0
			for ($i=0; $i < count($data['infoSocioambiental']); $i++) { 

				$nombreArchivoCliente = request()->file('infoSocioambiental')[$i]->getClientOriginalName();

				$infoSocioambiental = $nombreArchivoCliente.' - Número de carpeta '.str_slug($data['numeroCarpeta']);

	            $infoSocioambiental = $infoSocioambiental.'.'.request()->file('infoSocioambiental')[$i]->extension();

	            $pathInfoSocioambiental = request()->file('infoSocioambiental')[$i]->storeAs('public/archivos/infoSocioambiental', $infoSocioambiental);

	            $pathInfoSocioambiental = str_replace('public', 'storage', $pathInfoSocioambiental);

	            $datos = ['nombreArchivo' => $infoSocioambiental, 'path' => $pathInfoSocioambiental, 'gformulario_id' => $id];

	            $guardoInfoSocioambiental = \App\FormG\Infosocioambiental::create($datos);

			}
        }

        if (isset($data['fechaIntervencion'])) {
			$cant = (count(request()->input('fechaIntervencion')));

			for ($i=0; $i < $cant; $i++) {

				$intervencion['fechaIntervencion'] = $data['fechaIntervencion'][$i];
				$intervencion['temaIntervencion_id'] = $data['temaIntervencion_id'][$i];
				$intervencion['temaOtro'] = $data['temaOtro'][$i];
				$intervencion['nombreContacto'] = $data['nombreContacto'][$i]; 
				$intervencion['telefonoContacto'] = $data['telefonoContacto'][$i]; 
				$intervencion['descripcionIntervencion'] = $data['descripcionIntervencion'][$i];
				$intervencion['user_id'] = $data['user_id'];

				$guardoIntervencion = \App\FormG\Intervencion::create($intervencion);

				$intervencionId[] = $guardoIntervencion->id;
			}

			$gFormulario = \App\FormG\Gformulario::find($id);

			$guardoRelacion = $gFormulario->intervencions()->sync($intervencionId);

		}

		return redirect('/formularios');	
	}

	public function destroyG($id)
	{
		$Gformulario = \App\FormG\Gformulario::find($id);

		$Gformulario->delete();

    	session()->flash('message', 'El formulario se eliminó con éxito.');

    	return redirect('formularios');	
	}
}
