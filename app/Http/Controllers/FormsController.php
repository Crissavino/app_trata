<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
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
		$aFormularios = \App\FormA\Aformulario::all();
		$bFormularios = \App\FormB\Bformulario::all();		

		return view('formularios.formularios', ['aFormularios' => $aFormularios,
												'bFormularios' => $bFormularios]);
	}

	// public function mostrarA()
	// {
	// 	return view('formularios/formularioA');
	// }

    public function createB()
	{
		$datosGenero = \App\FormB\Genero::all();
		$datosDocumento = \App\FormB\Tienedoc::all();
		$datosTipoDocumento = \App\FormB\Tipodocumento::all();
		$datosPaises = \App\FormB\Paises::all();
		$datosArgProvincias = \App\FormB\Argprovincia::all();
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

		return view('formularios/formularioB', 
			['datosGenero' => $datosGenero,
				'datosDocumento' => $datosDocumento,
				'datosTipoDocumento' => $datosTipoDocumento,
				'datosPaises' => $datosPaises,
				'datosArgProvincias' => $datosArgProvincias,
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
				'datosOficio' => $datosOficio
			]);
	}


	//esta funcion guarda el formulario bien en la base de datos, lo unico que no guarda son los 2 selects multiples en los que se debe hacer una tabla pibot
	public function insertB()
	{
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

		$guardoBformulario = \App\FormB\Bformulario::create(request()->all());

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
	    return redirect('formularios/A');
	}

	public function editB($id)
	{
		$datosGenero = \App\FormB\Genero::all();
		$datosDocumento = \App\FormB\Tienedoc::all();
		$datosTipoDocumento = \App\FormB\Tipodocumento::all();
		$datosPaises = \App\FormB\Paises::all();
		$datosArgProvincias = \App\FormB\Argprovincia::all();
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
		$Bformulario = \App\FormB\Bformulario::find($id);

		return view('formularios.editar.formularioB_edit', ['Bformulario' => $Bformulario,
															'datosGenero' => $datosGenero,
															'datosDocumento' => $datosDocumento,
															'datosTipoDocumento' => $datosTipoDocumento,
															'datosPaises' => $datosPaises,
															'datosArgProvincias' => $datosArgProvincias,
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
															'datosOficio' => $datosOficio
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
		return redirect('index');
	}


	//CON ESTA FUNCION LO QUE QUIERO HACER ES CAMBIAR EL ESTADO DE UN FORMULARIO PARA MOSTRARLO O NO
	// public function deleteB($id)
	// {
	// 	dd('Se esta entrando');
	// 	$Bformulario = \App\FormB\Bformulario::all();

	// 	$cambiarEstado = $Bformulario->id;


	// }

	public function createA()
	{
		//aca voy a tener que llamar a todos los modelos de los que saque datos
		$datosModalidad = \App\FormA\Modalidad::all();;
		$datosEstadoCaso = \App\FormA\Estadocaso::all();
		$datosCaratulacion = \App\FormA\Caratulacionjudicial::all();
		$datosProfesional = \App\FormA\Profesional::all();
		$datosIntervieneActualmente = \App\FormA\Profesionalactualmente::all();
		$datosPresentacion = \App\FormA\Presentacionespontanea::all();
		$datosOrganismo = \App\FormA\Otrosorganismo::all();

		$ultimoNroCarpeta = DB::table('aformularios')->orderBy('datos_numero_carpeta', 'desc')->first()->datos_numero_carpeta;		

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

		
		//esta fecha es la del momento
		$fecha_hoy = Carbon::now();

		$validador = request()->validate([
							'datos_nombre_referencia' => 'required',
							'datos_numero_carpeta' => 'required',
							'datos_fecha_ingreso' => 'required|date|before_or_equal:'.$fecha_hoy,
							'modalidad_id' => 'required',
							// 'derivacion_otro_organismo_id' => 'required',
							// 'derivacion_otro_organismo_cual' => 'required',
							'estadocaso_id' => 'required',
							'datos_ente_judicial' => 'required',
							'caratulacionjudicial_id' => 'required',
							// 'caratulacionjudicial_otro' => 'required',
							'datos_nro_causa' => 'required',
						],
						[		

							'datos_nombre_referencia.required' => 'Este campo es obligatorio',
							'datos_numero_carpeta.required' => 'Este campo es obligatorio',
							'datos_fecha_ingreso.required' => 'Este campo es obligatorio',
							'datos_fecha_ingreso.before_or_equal' => 'La fecha ingresada es posterior al dia de hoy',
							'modalidad_id.required' => 'Este campo es obligatorio',
							// 'derivacion_otro_organismo_id' => 'Este campo es obligatorio',
							// 'derivacion_otro_organismo_cual' => 'Este campo es obligatorio',
							'estadocaso_id.required' => 'Este campo es obligatorio',
							'datos_ente_judicial.required' => 'Este campo es obligatorio',
							'caratulacionjudicial_id.required' => 'Este campo es obligatorio',
							// 'caratulacionjudicial_otro.required' => 'Este campo es obligatorio',
							'datos_nro_causa.required' => 'Este campo es obligatorio',
						]);	

		$guardoAformulario = \App\FormA\Aformulario::create(request()->all());
		// $guardoAformulario = \App\FormA\Aformulario::create(request()->only(['datos_nombre_referencia', 'datos_numero_carpeta', 'datos_fecha_ingreso', 'modalidad_id', 'estadocaso_id', 'datos_ente_judicial', 'caratulacionjudicial_id', 'datos_nro_causa']));


		$ultimoId = $guardoAformulario->id;

		





		//CONSULTAR CON MAXI PORQUE NO ME VALIDA ESTO, LO SALTEA DIRECTAMENTE, CUANDO PONGO POR EJEMPLO 'profesional_id[]' => 'required' y 'profesional_id[].required' => 'Este campo es obligatorio', ME VALIDA PERO NO ME GUARDA LOS DATOS
		request()->validate([
							'profesional_id' => 'required',
							'datos_profesional_interviene_desde' => 'required',
							'datos_profesional_interviene_hasta' => 'required',
							// 'datos_profesional_interviene_desde[]' => 'required|date|before:datos_profesional_interviene_hasta',
							// 'datos_profesional_interviene_desde' => 'required|date|before:datos_profesional_interviene_hasta',
							// 'datos_profesional_interviene_hasta[]' => 'required|date|after:datos_profesional_interviene_desde',
							'profesionalactualmente_id' => 'required'
							],
							[
							'profesional_id.required' => 'Este campo es obligatorio',
							'datos_profesional_interviene_desde.required' => 'Este campo es obligatorio',
							// 'datos_profesional_interviene_desde[].before' => 'El principio de la intervencion no puede ser posterior al fin',
							'datos_profesional_interviene_hasta.required' => 'Este campo es obligatorio',
							// 'datos_profesional_interviene_hasta[].after' => 'El fin de la intervencion no puede ser posterior al inicio',
							'profesionalactualmente_id.required' => 'Este campo es obligatorio'
							]);

		// dd('Hola');




		$arrayProfesionales = request()->only(['profesional_id', 'datos_profesional_interviene_desde', 'datos_profesional_interviene_hasta', 'profesionalactualmente_id']);	
		
		//de aca obtengo la cantidad de veces que tengo que iterar para asignarle valores al array
		$cant = (count(request()->input('profesional_id')));

		for ($i=0; $i < $cant; $i++) 
		{ 
			//asigno manualmente los valores
			$profesional['profesional_id'] = $arrayProfesionales['profesional_id'][$i];
			$profesional['datos_profesional_interviene_desde'] = $arrayProfesionales['datos_profesional_interviene_desde'][$i];
			$profesional['datos_profesional_interviene_hasta'] = $arrayProfesionales['datos_profesional_interviene_hasta'][$i];
			$profesional['profesionalactualmente_id'] = $arrayProfesionales['profesionalactualmente_id'][$i];

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
															// 'profesionales' => $profesionales,
															// 'id_profesional' => $id_profesional,
															// 'nombre_profesional' => $nombre_profesional
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

			//una vez ya asignados los valores los guardo en la base, en la tabla que corresponde
			$guardoProfesionalInterviniente = \App\FormA\Profesionalinterviniente::create($profesional);
			//de aca obtengo los id de los profesionales guardados
			$profId[] = $guardoProfesionalInterviniente->id;	
		}
		//guardo en la tabla pivot
		$guardoRelacion = $aFormulario->profesionalintervinientes()->sync($profId);

		$aFormulario->update(request()->all());

		return redirect('index');
	}
	
}
