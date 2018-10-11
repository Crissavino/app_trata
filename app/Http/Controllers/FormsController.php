<?php

namespace App\Http\Controllers;

use Illuminate\Support\Collection;
use Illuminate\Http\Request;

class FormsController extends Controller
{

	public function index()
	{
		return view('formularios.index');
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

	//Con esta funcion puedo guardar el formulario

	// public static function store()
	// {
	// 	$input = Request::all();

	// 	\App\FormB\Bformulario::create($input);

	// 	return $input;
	// }

	// public function show()
	// {
	// 	return view('formularios/enviado');
	// }

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
															'datosOficio' => $datosOficio
															]);
	}

	public function updateB($id)
	{
		$Bformulario = \App\FormB\Bformulario::find($id);

		$arrayDiscapacidades = request()->input('discapacidad_id');

		$actualizoDiscapacidades = $Bformulario->discapacidads()->sync($arrayDiscapacidades);

		$Bformulario->update(request()->all());


		// $Bformulario->limitacions()->update(request()->input('limitacion_id'));

		//cuando edito el formulario y le doy enviar, entra en juego la funcion update, y una vez actualizado todo te redirige nuevamente al formulario B, despues se tendria que ver a donde verdaderamente deberia redirigir [recordar que el redirect te lleva a la URL]
		return redirect('formularios/B');
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

		return view('formularios/formularioA', ['datosModalidad' => $datosModalidad,
												'datosEstadoCaso' => $datosEstadoCaso,
												'datosCaratulacion' => $datosCaratulacion,
												'datosProfesional' => $datosProfesional,
												'datosIntervieneActualmente' => $datosIntervieneActualmente
												]);
	}

	public function insertA()
	{
		// request()->validate([
		// 					'datos_nombre_referencia' => 'required',
		// 					'datos_numero_carpeta' => 'required',
		// 					'datos_fecha_ingreso' => 'required',
		// 					'modalidad_id' => 'required',
		// 					'estadocaso_id' => 'required',
		// 					'datos_ente_judicial' => 'required',
		// 					'caratulacionjudial_id' => 'required',
		// 					'datos_nro_causa' => 'required',
		// 				],

		// 				[
		// 					'datos_nombre_referencia.required' => 'Este campo es obligatorio',
		// 					'datos_numero_carpeta.required' => 'Este campo es obligatorio',
		// 					'datos_fecha_ingreso.required' => 'Este campo es obligatorio',
		// 					'modalidad_id.required' => 'Este campo es obligatorio',
		// 					'estadocaso_id.required' => 'Este campo es obligatorio',
		// 					'datos_ente_judicial.required' => 'Este campo es obligatorio',
		// 					'caratulacionjudial_id.required' => 'Este campo es obligatorio',
		// 					'datos_nro_causa.required' => 'Este campo es obligatorio',
		// 				]);		

		// $guardoAformulario = \App\FormA\Aformulario::create(request()->all());

		// $ultimoId = $guardoAformulario->id;

		request()->validate([
							'profesional_id' => 'required',
							'datos_profesional_interviene_desde' => 'required',
							'datos_profesional_interviene_hasta' => 'required',
							'profesionalactualmente_id' => 'required'							
							],

							[
							'profesional_id.required' => 'Este campo es obligatorio',
							'datos_profesional_interviene_desde.required' => 'Este campo es obligatorio',
							'datos_profesional_interviene_hasta.required' => 'Este campo es obligatorio',
							'profesionalactualmente_id.required' => 'Este campo es obligatorio'
							]);


		// $profesional_id = request()->input('profesional_id');
		// $datos_profesional_interviene_desde = request()->input('datos_profesional_interviene_desde');
		// $datos_profesional_interviene_hasta = request()->input('datos_profesional_interviene_hasta');
		// $profesionalactualmente_id = request()->input('profesionalactualmente_id');
		// $arrayProfesionales = request()->profesionales;
		$arrayProfesionales = collect([request()->input('profesional_id'), request()->input('datos_profesional_interviene_desde'), request()->input('datos_profesional_interviene_hasta') ,request()->input('profesionalactualmente_id')]);

		$arrayProfesionales = array_pluck($arrayProfesionales, 0);

		dd($arrayProfesionales);

		


		

		// $profesional_id = $arrayProfesionales[0];
		// $datos_profesional_interviene_desde = $arrayProfesionales[1];
		// $datos_profesional_interviene_hasta = $arrayProfesionales[2];
		// $profesionalactualmente_id = $arrayProfesionales[3];

		// $aformulario = \App\FormA\Aformulario::find($ultimoId);

	}

	
	
}
