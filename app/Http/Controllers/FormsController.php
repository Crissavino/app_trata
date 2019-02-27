<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\EstadisticaExport;
use App\Exports\FormGExport;
use App\Rules\RequiredConditional;
use App\Rules\FormBDocumentacion;
use App\Rules\RequiredCheckbox;

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
											->ORDERBY('created_at')
											->get();
		$bFormPorId = DB::table('bformularios')
											->WHERE('user_id', '=', $userId)
											->WHERE('bformularios.deleted_at', '=', null)
											->ORDERBY('created_at')
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
											
		// $eFormPorId = DB::table('eformularios')
		// 									->WHERE('user_id', '=', $userId)
		// 									->WHERE('eformularios.deleted_at', '=', null)
		// 									->ORDERBY('updated_at')
		// 									->get();
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

		$carpetas = DB::table('numerocarpetas')
											->WHERE('user_id', '=', $userId)
											->WHERE('numerocarpetas.deleted_at', '=', null)
											->ORDERBY('updated_at')
											->get();

		// $carpetas = \App\Carpetas\Numerocarpeta::all();

		// $guardoNumeroCarpeta = \App\Carpetas\Numerocarpeta::create(['numeroCarpeta' => $formA->datos_numero_carpeta, 'aformulario_id' => $formA->id, 'bformulario_id' => $formB->id, 'cformulario_id' => $formC->id, 'user_id' => $userId]);




		// if (\App\Carpetas\Numerocarpeta::where('numeroCarpeta', '=', Input::get('email'))->exists()) {
		//    // user found
		// }


		//PREUBA PARA IR GUARDANDO A MEDIDA QUE SE VAN CREANDO NO CUANDO ESTAN TODOS CREADOS
			// foreach ($tablaCarpetas as $carpeta) {
			// 	foreach ($aFormPorId as $formA) {
			// 		if (!($carpeta->where('numeroCarpeta', '=', $formA->datos_numero_carpeta)->exists())) {
			// 			echo "<pre>";
			// 			var_dump($formA->datos_numero_carpeta);
			// 			var_dump($carpeta->numeroCarpeta);
			// 			var_dump($formA->datos_numero_carpeta !== $carpeta->numeroCarpeta );
			// 			var_dump('otra');
			// 			if ($formA->datos_numero_carpeta !== $carpeta->numeroCarpeta ) {
			// 				\App\Carpetas\Numerocarpeta::where('numeroCarpeta', '=', $carpeta->numeroCarpeta)->create(['numeroCarpeta' => $carpeta->numeroCarpeta, 'aformulario_id' => $formA->id, 'user_id' => $userId]);
			// 			}else{
			// 				foreach ($bFormPorId as $formB) {
			// 					if ($formA->datos_numero_carpeta == $carpeta->numeroCarpeta && $formB->numeroCarpeta !== $carpeta->numeroCarpeta) {
			// 						dd('hola');
			// 						\App\Carpetas\Numerocarpeta::where('numeroCarpeta', '=', $carpeta->numeroCarpeta)->update(['numeroCarpeta' => $carpeta->numeroCarpeta, 'aformulario_id' => $formA->id, 'bformulario_id' => $formB->id, 'user_id' => $userId]);
			// 					}else{
			// 						foreach ($cFormPorId as $formC) {
			// 							if ($formA->datos_numero_carpeta == $carpeta->numeroCarpeta && $formB->numeroCarpeta == $carpeta->numeroCarpeta && $formC->numeroCarpeta !== $carpeta->numeroCarpeta) {
			// 								\App\Carpetas\Numerocarpeta::where('numeroCarpeta', '=', $carpeta->numeroCarpeta)->update(['numeroCarpeta' => $carpeta->numeroCarpeta, 'aformulario_id' => $formA->id, 'bformulario_id' => $formB->id, 'cformulario_id' => $formC->id, 'user_id' => $userId]);
			// 							}else{
			// 								foreach ($dFormPorId as $formD) {
			// 									if ($formA->datos_numero_carpeta == $carpeta->numeroCarpeta && $formB->numeroCarpeta == $carpeta->numeroCarpeta && $formC->numeroCarpeta == $carpeta->numeroCarpeta && $formD->numeroCarpeta !== $carpeta->numeroCarpeta) {
			// 										\App\Carpetas\Numerocarpeta::where('numeroCarpeta', '=', $carpeta->numeroCarpeta)->update(['numeroCarpeta' => $carpeta->numeroCarpeta, 'aformulario_id' => $formA->id, 'bformulario_id' => $formB->id, 'cformulario_id' => $formC->id, 'dformulario_id' => $formD->id, 'user_id' => $userId]);
			// 									}else{
			// 										foreach ($eFormPorId as $formE) {
			// 											if ($formA->datos_numero_carpeta == $carpeta->numeroCarpeta && $formB->numeroCarpeta == $carpeta->numeroCarpeta && $formC->numeroCarpeta == $carpeta->numeroCarpeta && $formD->numeroCarpeta == $carpeta->numeroCarpeta && $formE->numeroCarpeta !== $carpeta->numeroCarpeta) {
			// 												\App\Carpetas\Numerocarpeta::where('numeroCarpeta', '=', $carpeta->numeroCarpeta)->update(['numeroCarpeta' => $carpeta->numeroCarpeta, 'aformulario_id' => $formA->id, 'bformulario_id' => $formB->id, 'cformulario_id' => $formC->id, 'dformulario_id' => $formD->id, 'eformulario_id' => $formE->id, 'user_id' => $userId]);
			// 											}else{
			// 												foreach ($fFormPorId as $formF) {
			// 													if ($formA->datos_numero_carpeta == $carpeta->numeroCarpeta && $formB->numeroCarpeta == $carpeta->numeroCarpeta && $formC->numeroCarpeta == $carpeta->numeroCarpeta && $formD->numeroCarpeta == $carpeta->numeroCarpeta && $formE->numeroCarpeta == $carpeta->numeroCarpeta && $formF->numeroCarpeta !== $carpeta->numeroCarpeta) {
			// 														\App\Carpetas\Numerocarpeta::where('numeroCarpeta', '=', $carpeta->numeroCarpeta)->update(['numeroCarpeta' => $carpeta->numeroCarpeta, 'aformulario_id' => $formA->id, 'bformulario_id' => $formB->id, 'cformulario_id' => $formC->id, 'dformulario_id' => $formD->id, 'eformulario_id' => $formE->id, 'fformulario_id' => $formF->id, 'user_id' => $userId]);
			// 													}else{
			// 														foreach ($gFormPorId as $formG) {
			// 															if ($formA->datos_numero_carpeta == $carpeta->numeroCarpeta && $formB->numeroCarpeta == $carpeta->numeroCarpeta && $formC->numeroCarpeta == $carpeta->numeroCarpeta && $formD->numeroCarpeta == $carpeta->numeroCarpeta && $formE->numeroCarpeta == $carpeta->numeroCarpeta && $formF->numeroCarpeta == $carpeta->numeroCarpeta && $formG->numeroCarpeta !== $carpeta->numeroCarpeta) {
			// 																\App\Carpetas\Numerocarpeta::where('numeroCarpeta', '=', $carpeta->numeroCarpeta)->update(['numeroCarpeta' => $carpeta->numeroCarpeta, 'aformulario_id' => $formA->id, 'bformulario_id' => $formB->id, 'cformulario_id' => $formC->id, 'dformulario_id' => $formD->id, 'eformulario_id' => $formE->id, 'fformulario_id' => $formF->id, 'gformulario_id' => $formG->id, 'user_id' => $userId]);
			// 															}
			// 														}
			// 													}
			// 												}
			// 											}
			// 										}
			// 									}
			// 								}
			// 							}
			// 						}
			// 					}
			// 				}
			// 			}
			// 		}
			// 	}		
			// }
		//FIN PRUEBA

		// foreach ($tablaCarpetas as $carpeta) {
		// 	foreach ($aFormPorId as $formA) {
		// 		if (!($carpeta->where('numeroCarpeta', '=', $formA->datos_numero_carpeta)->exists())) {
		// 			if ($formA->datos_numero_carpeta !== $carpeta->numeroCarpeta ) {
		// 				foreach ($bFormPorId as $formB) {
		// 					foreach ($cFormPorId as $formC) {
		// 						foreach ($dFormPorId as $formD) {
		// 							foreach ($eFormPorId as $formE) {
		// 								foreach ($fFormPorId as $formF) {
		// 									foreach ($gFormPorId as $formG) {
		// 										if ($formA->datos_numero_carpeta == $formB->numeroCarpeta && $formA->datos_numero_carpeta == $formC->numeroCarpeta && $formA->datos_numero_carpeta == $formD->numeroCarpeta && $formA->datos_numero_carpeta == $formE->numeroCarpeta && $formA->datos_numero_carpeta == $formF->numeroCarpeta && $formA->datos_numero_carpeta == $formG->numeroCarpeta) {
		// 											$guardoNumeroCarpeta = \App\Carpetas\Numerocarpeta::create(['numeroCarpeta' => $formA->datos_numero_carpeta, 'aformulario_id' => $formA->id, 'bformulario_id' => $formB->id, 'cformulario_id' => $formC->id, 'dformulario_id' => $formD->id, 'eformulario_id' => $formE->id, 'fformulario_id' => $formF->id, 'gformulario_id' => $formG->id, 'user_id' => $userId]);
		// 										}
		// 									}
		// 								}
		// 							}
		// 						}
		// 					}
		// 				}
		// 			}
		// 		}
				
		// 	}
		// }

		return view('formularios.formularios', ['userName' => $userName,
												'bFormPorId' => $bFormPorId,
												'aFormPorId' => $aFormPorId,
												'cFormPorId' => $cFormPorId,
												'dFormPorId' => $dFormPorId,
												// 'eFormPorId' => $eFormPorId,
												'fFormPorId' => $fFormPorId,
												'gFormPorId' => $gFormPorId,
												'carpetas' => $carpetas
												]);
	}

	public function search(Request $request)
	{
		$userId = auth()->user()->id;
		$userName = auth()->user()->name;

		$numeroCarpeta    = $request->get('numeroCarpeta');
	

		$carpetas = \App\Carpetas\Numerocarpeta::orderBy('numeroCarpeta', 'DESC')
			->carpeta($numeroCarpeta)
			->paginate(5);

		return view('formularios.buscador', 
										[
											'userId' => $userId,
											'userName' => $userName,
											'carpetas' => $carpetas
										]);


	}

	public function searchName(Request $request)
	{
		$userId = auth()->user()->id;
		$userName = auth()->user()->name;


		$nombreReferencia = $request->get('nombreReferencia');
		$numeroCausa      = $request->get('numeroCausa');

		$formsA = \App\FormA\Aformulario::orderBy('datos_numero_carpeta', 'DESC')
			->select('numerocarpetas.id as numerocarpetasId','aformularios.*')
			->join('numerocarpetas','numerocarpetas.numeroCarpeta','=','aformularios.datos_numero_carpeta')
			->where('numerocarpetas.deleted_at', '=', null)
			->nombreRef($nombreReferencia)
			->numeroCausa($numeroCausa)
			->paginate(5);
		// dd($formsA);
		return view('formularios.buscadorNombre', 
										[
											'userId' => $userId,
											'userName' => $userName,
											'formsA' => $formsA,
											'nombreReferencia' => $nombreReferencia,
											'numeroCausa' => $numeroCausa
										]);
	}

	public function searchVictim(Request $request)
	{
		$userId = auth()->user()->id;
		$userName = auth()->user()->name;

		$nombreApellido   = $request->get('nombreApellido');
		$dni              = $request->get('dni');


		$formsB = \App\FormB\Bformulario::orderBy('numeroCarpeta', 'DESC')
			->select('numerocarpetas.id as numerocarpetasId','bformularios.*')
			->join('numerocarpetas','numerocarpetas.numeroCarpeta','=','bformularios.numeroCarpeta')
			->where('numerocarpetas.deleted_at', '=', null)
			->nombApe($nombreApellido)
			->DNI($dni)
			->paginate(5);


		return view('formularios.buscadorVictima', 
										[
											'userId' => $userId,
											'formsB' => $formsB,
											'nombreApellido' => $nombreApellido,
											'dni' => $dni
										]);
	}


	public function showEstadisticas()
	{
		$formsA = \App\FormA\Aformulario::all();
		$datosModalidad = \App\FormA\Modalidad::all();
		$datosEstadoCaso = \App\FormA\Estadocaso::all();
		$datosMotivoCierre = \App\FormA\Motivocierre::all();
		$datosCaratulacion = \App\FormA\Caratulacionjudicial::all();
		$formsB = \App\FormB\Bformulario::all();
		$datosGenero = \App\FormB\Genero::all();
		$datosFranjaEtaria = \App\FormB\Franjaetaria::all();
		$formsD = \App\FormD\Dformulario::all();
		$datosFinalidad = \App\FormD\Finalidad::all();
		$datosTipoVictima = \App\FormD\Tipovictima::all();
		$carpetas = \App\Carpetas\Numerocarpeta::all();
		return view('estadisticas', [
										'formsA' => $formsA,
										'datosModalidad' => $datosModalidad,
										'datosEstadoCaso' => $datosEstadoCaso,
										'datosMotivoCierre' => $datosMotivoCierre,
										'datosCaratulacion' => $datosCaratulacion,
										'formsB' => $formsB,
										'datosGenero' => $datosGenero,
										'datosFranjaEtaria' => $datosFranjaEtaria,
										'formsD' => $formsD,
										'datosFinalidad' => $datosFinalidad,
										'datosTipoVictima' => $datosTipoVictima,
										'carpetas' => $carpetas,
									]);
	}

	//funciona perfecto y me descarga el excel
	public function exportarExcel() 
	{
		$fecha_hoy = Carbon::now();

        return Excel::download(new EstadisticaExport, 'Estadisticas al '.Carbon::parse($fecha_hoy)->format('d-m-Y').'.xlsx');
	}

	// public function isDeveloper()
	// {
	// 	$data = request()->all();
	// 	var_dump($data);
	// }

	public function createA()
	{
		//aca voy a tener que llamar a todos los modelos de los que saque datos
		$datosModalidad = \App\FormA\Modalidad::all();
		$datosEstadoCaso = \App\FormA\Estadocaso::all();
		$datosMotivoCierre = \App\FormA\Motivocierre::all();
		$datosCaratulacion = \App\FormA\Caratulacionjudicial::all();
		$datosProfesional = \App\FormA\Profesional::all();
		$datosIntervieneActualmente = \App\FormA\Profesionalactualmente::all();
		$datosPresentacion = \App\FormA\Presentacionespontanea::all();
		$datosOrganismo = \App\FormA\Otrosorganismo::all();
		$datosAmbito = \App\FormA\Ambito::all();
		$datosDepartamento = \App\FormA\Departamento::all();
		$datosOtrasProv = \App\FormA\Otrasprov::all();
		// $ultimoNroCarpeta = \App\FormA\Aformulario::orderBy('datos_numero_carpeta', 'desc')->first();
		$ultimoNroCarpeta = \App\FormA\Aformulario::WHERE('deleted_at', '=', null)->orderBy('datos_numero_carpeta', 'desc')->first();
		// $ultimoNroCarpeta = DB::table('aformularios')->orderBy('datos_numero_carpeta', 'desc')
		//                                              ->first()
		//                                              ->datos_numero_carpeta;

		// dd($ultimoNroCarpeta === null);

		if ($ultimoNroCarpeta !== null) {
			$ultimoNroCarpeta = $ultimoNroCarpeta->datos_numero_carpeta;
		}else{
			$ultimoNroCarpeta = 'Todavía no se cargó ninguna carpeta';
		}

		return view('formularios.formularioA', ['datosModalidad' => $datosModalidad,
												'datosEstadoCaso' => $datosEstadoCaso,
												'datosMotivoCierre' => $datosMotivoCierre,
												'datosCaratulacion' => $datosCaratulacion,
												'datosProfesional' => $datosProfesional,
												'datosIntervieneActualmente' => $datosIntervieneActualmente,
												'datosPresentacion' => $datosPresentacion,
												'datosOrganismo' => $datosOrganismo,
												'datosAmbito' => $datosAmbito,
												'datosDepartamento' => $datosDepartamento,
												'datosOtrasProv' => $datosOtrasProv,
												'ultimoNroCarpeta' => $ultimoNroCarpeta,
												]);
	}

	public function insertA()
	{
		$userId = auth()->user()->id;
		
		//esta fecha es la del momento
		$fecha_hoy = Carbon::now();
		// if(request()->input('estadocaso_id')==3){
		// 	request()->validate([
		// 		'motivocierre_id' => 'required | numeric | min:0 | max:5'
		// 	],
		// 	[
		// 		'motivocierre_id.required' => 'Este campo es obligatorio',
		// 		'motivocierre_id.numeric' => 'La opci&oacute;n seleccionada no es v&aacute;lida',
		// 		'motivocierre_id.min' => 'La opci&oacute;n seleccionada no es v&aacute;lida',
		// 		'motivocierre_id.max' => 'La opci&oacute;n seleccionada no es v&aacute;lida',
		// 	]);
		// } 
		// Validacion del formulario A
		request()->validate([
							// input A1 Nombre de referencia 
							'datos_nombre_referencia' => 'required',
							// input A2 Numeros de carpeta
							'datos_numero_carpeta' => 'required|unique:numerocarpetas,numeroCarpeta',
							// input_fecha A3 Fecha de ingreso
							'datos_fecha_ingreso' => 'required|date|before_or_equal:'.$fecha_hoy,
							// select A4 Modalidad de ingreso
							'modalidad_id' => 'required | numeric | min:0 | max:5',
							// select oculto que se desoculta si A4 es id 3
							'presentacion_espontanea_id' => [new RequiredConditional(request()->get('modalidad_id'),array('3'),0,2,'Para ingresar un tipo debe seleccionar presentaci&oacute;n espont&aacute;nea')],
							// select oculto que se desoculta si A4 es id 5
							'derivacion_otro_organismo_id' => [new RequiredConditional(request()->get('modalidad_id'),array('5'),0,16,'Para ingresar un organismo debe seleccionar derivaci&oacute;n de otro organismo')],
							// input Introduzca el Organismo, input oculto que se desoculta si derivacion_otro_organismo_id es id 16
							'derivacion_otro_organismo_cual' => [new RequiredConditional(request()->get('derivacion_otro_organismo_id'),array('16'),0,255,'Para ingresar otro organismo debe seleccionar otro',true)],
							// select A5 Estado actual
							'estadocaso_id' => 'required | numeric | min:0 | max:3',
							// select oculto A5I Motivo de cierre se desoculta si A5 es id 3
							'motivocierre_id' => [new RequiredConditional(request()->get('estadocaso_id'),array('3'),0,5,'Para ingresar un motivo de cierre el estado dede ser cerrado')],						
							// select A6 Ambito de competencia 
							'ambito_id' => 'required | numeric | min:0 | max:3',
							// select oculto que se desoculta si A6 es id 2
							'departamento_id' => [new RequiredConditional(request()->get('ambito_id'),array('2'),0,18,'Para ingresar un departamento debe seleccionar provincial')],
							// select oculto que se desoculta si A6 es id 3
							'otrasprov_id' => [new RequiredConditional(request()->get('ambito_id'),array('3'),0,23,'Para ingresar una provincia debe seleccionar otra provincia')],
							// select A7 Caratulacion judicial 
							'caratulacionjudicial_id' => 'required | numeric | min:0 | max:7',
							// input oculto Introduzca tipo de caratulacion se desoculta si A7 es id 7
							'caratulacionjudicial_otro' => [new RequiredConditional(request()->get('caratulacionjudicial_id'),array('7'),0,255,'Para ingresar otra caratulaci&oacute;n judicial debe ingresar otro',true)],
							// input A8 N° Causa o Id Judicial
							'datos_nro_causa' => 'required',
							// select A9.1 Nombre/Equipo/Profesion 
							'profesional_id.*' => 'nullable | numeric | min:0 | max:25',
							'profesional_id.0' => 'required | numeric | min:0 | max:25',
							// input fecha A9.2 Interviene desde 
							'datos_profesional_interviene_desde.*' => 'nullable|date|after_or_equal:datos_fecha_ingreso',
							'datos_profesional_interviene_desde.0' => 'required|date|after_or_equal:datos_fecha_ingreso',
							// select A9.3 Actualmente interviene
							'profesionalactualmente_id.*' => 'nullable',
							'profesionalactualmente_id.0' => 'required | numeric | min:0 | max:2',
							// input fecha A9.4 Interviene hasta
							'datos_profesional_interviene_hasta.*' => 'nullable|date|after_or_equal:datos_profesional_interviene_desde.*',
							'datos_profesional_interviene_hasta.0' => 'nullable|date|after_or_equal:datos_profesional_interviene_desde.0',							
						],
						[		

							'datos_nombre_referencia.required' => 'Este campo es obligatorio',
							'datos_numero_carpeta.required' => 'Este campo es obligatorio',
							//nuevo
							'datos_numero_carpeta.unique' => 'Ya existe una carpeta con este número',
							'datos_fecha_ingreso.required' => 'Este campo es obligatorio',
							'datos_fecha_ingreso.before_or_equal' => 'La fecha ingresada es posterior al dia de hoy',
							'modalidad_id.required' => 'Este campo es obligatorio',
							'modalidad_id.numeric' => 'La opci&oacute;n seleccionada no es v&aacute;lida',
							'modalidad_id.min' => 'La opci&oacute;n seleccionada no es v&aacute;lida',
							'modalidad_id.max' => 'La opci&oacute;n seleccionada no es v&aacute;lida',
							'estadocaso_id.required' => 'Este campo es obligatorio',
							'estadocaso_id.numeric' => 'La opci&oacute;n seleccionada no es v&aacute;lida',
							'estadocaso_id.min' => 'La opci&oacute;n seleccionada no es v&aacute;lida',
							'estadocaso_id.max' => 'La opci&oacute;n seleccionada no es v&aacute;lida',																		
							'ambito_id.required' => 'Este campo es obligatorio',
							'departamento_id.required_if' => 'Este campo es obligatorio',
							'otrasprov_id.required_if' => 'Este campo es obligatorio',
							'caratulacionjudicial_id.required' => 'Este campo es obligatorio',
							'datos_nro_causa.required' => 'Este campo es obligatorio',
							'profesional_id.*.required' => 'Este campo es obligatorio',
							'profesional_id.*.min' => 'La opci&oacute;n seleccionada no es v&aacute;lida',
							'profesional_id.*.max' => 'La opci&oacute;n seleccionada no es v&aacute;lida',
							'profesional_id.*.numeric' => 'La opci&oacute;n seleccionada no es v&aacute;lida',
							'datos_profesional_interviene_desde.*.required' => 'Este campo es obligatorio',
							'datos_profesional_interviene_desde.*.after_or_equal' => 'Se ingresó una fecha anterior a la fecha de ingreso del caso',
							'datos_profesional_interviene_hasta.*.required' => 'Este campo es obligatorio',
							'datos_profesional_interviene_hasta.*.after_or_equal' => 'Se ingresó un fecha anterior a la fecha de inicio de intervención',
							'profesionalactualmente_id.*.required' => 'Este campo es obligatorio',							
							'derivacion_otro_organismo_cual.required_if' => 'Este campo es obligatorio', 
							'caratulacionjudicial_otro.required_if' => 'Este campo es obligatorio', 
						]);
		$data = request()->all();
		$data['user_id'] = $userId;
		// dd($data);
		$guardoAformulario = \App\FormA\Aformulario::create($data);
		// $guardoAformulario = \App\FormA\Aformulario::create(request()->only(['datos_nombre_referencia', 'datos_numero_carpeta', 'datos_fecha_ingreso', 'modalidad_id', 'estadocaso_id', 'datos_ente_judicial', 'caratulacionjudicial_id', 'datos_nro_causa']));
		// dd('Hola');

		$ultimoId = $guardoAformulario->id;
		$guardoNumeroCarpeta = \App\Carpetas\Numerocarpeta::create([ 'numeroCarpeta' => $data['datos_numero_carpeta'], 'aformulario_id' => $ultimoId, 'user_id' => $data['user_id']]);
		$idCarpeta=$guardoNumeroCarpeta->id;
		$numeroCarpeta=$guardoNumeroCarpeta->numeroCarpeta;
		//de aca obtengo la cantidad de veces que tengo que iterar para asignarle valores al array
		$cant = (count(request()->input('profesional_id')));

		for ($i=0; $i < $cant; $i++) 
		{ 
			//asigno manualmente los valores
			$profesional['profesional_id'] = $data['profesional_id'][$i];
			$profesional['datos_profesional_interviene_desde'] = $data['datos_profesional_interviene_desde'][$i];
			 if (!isset($data['datos_profesional_interviene_hasta'][$i])) {  
			$profesional['datos_profesional_interviene_hasta'] = null;
			 }else{
				 $profesional['datos_profesional_interviene_hasta'] = $data['datos_profesional_interviene_hasta'][$i];
			 }
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
	    return redirect('formularios/B/'.$idCarpeta.'/'.$numeroCarpeta);
	}

	public function editA($idCarpeta,$idFormulario)
	{
		$datosModalidad = \App\FormA\Modalidad::all();;
		$datosEstadoCaso = \App\FormA\Estadocaso::all();
		$datosMotivoCierre = \App\FormA\Motivocierre::all();
		$datosCaratulacion = \App\FormA\Caratulacionjudicial::all();
		$datosProfesional = \App\FormA\Profesional::all();
		$datosIntervieneActualmente = \App\FormA\Profesionalactualmente::all();
		$datosPresentacion = \App\FormA\Presentacionespontanea::all();
		$datosOrganismo = \App\FormA\Otrosorganismo::all();
		$datosAmbito = \App\FormA\Ambito::all();
		$datosDepartamento = \App\FormA\Departamento::all();
		$datosOtrasProv = \App\FormA\Otrasprov::all();
		$aFormulario = \App\FormA\Aformulario::find($idFormulario);
		$userId = auth()->user()->id;
		// dd($aFormulario->profesionalintervinientes);
		$profesionalIntervinientes = $aFormulario->profesionalintervinientes;
		$todo = DB::table('aformularios')
		                            ->WHERE('aformulario_id', '=', $idFormulario) 
									->JOIN('aformulario_profesionalinterviniente', 'aformularios.id', '=', 'aformulario_profesionalinterviniente.aformulario_id')
									->JOIN('profesionalintervinientes', 'aformulario_profesionalinterviniente.profesionalinterviniente_id', '=', 'profesionalintervinientes.id')
									->JOIN('profesionals', 'profesionalintervinientes.profesional_id', '=', 'profesionals.id')
									->JOIN('profesionalactualmentes', 'profesionalintervinientes.profesionalactualmente_id', '=', 'profesionalactualmentes.id')
		                            ->WHERE('profesionalintervinientes.deleted_at', '=', null) //esta se setea para desvincular el eprsonal									
									->get();

		//id de los formularios de una misma carpeta
			$idFormA = \App\Carpetas\Numerocarpeta::where('aformulario_id', '=', $idFormulario)
							// ->where('cformulario_id', '=', $id)
							->value('aformulario_id');
			// $idFormB = \App\Carpetas\Numerocarpeta::where('user_id', '=', $userId)
			$idFormB = \App\Carpetas\Numerocarpeta::where('aformulario_id', '=', $idFormulario)
								// ->where('cformulario_id', '=', $id)
								->value('bformulario_id');
			// $idFormC = \App\Carpetas\Numerocarpeta::where('user_id', '=', $userId)
			$idFormC = \App\Carpetas\Numerocarpeta::where('aformulario_id', '=', $idFormulario)
								// ->where('cformulario_id', '=', $id)
								->value('cformulario_id');
			// $idFormD = \App\Carpetas\Numerocarpeta::where('user_id', '=', $userId)
			$idFormD = \App\Carpetas\Numerocarpeta::where('aformulario_id', '=', $idFormulario)
								// ->where('cformulario_id', '=', $id)
								->value('dformulario_id');
			// $idFormE = \App\Carpetas\Numerocarpeta::where('user_id', '=', $userId)
			$idFormE = \App\Carpetas\Numerocarpeta::where('aformulario_id', '=', $idFormulario)
								// ->where('cformulario_id', '=', $id)
								->value('eformulario_id');
			// $idFormF = \App\Carpetas\Numerocarpeta::where('user_id', '=', $userId)
			$idFormF = \App\Carpetas\Numerocarpeta::where('aformulario_id', '=', $idFormulario)
								// ->where('cformulario_id', '=', $id)
								->value('fformulario_id');
			// $idFormG = \App\Carpetas\Numerocarpeta::where('user_id', '=', $userId)
			$idFormG = \App\Carpetas\Numerocarpeta::where('aformulario_id', '=', $idFormulario)
								// ->where('cformulario_id', '=', $id)
								->value('gformulario_id');
		//fin ids
			$usuarioCarpeta = \App\Carpetas\Numerocarpeta::WHERE('aformulario_id', '=', $idFormulario)->value('user_id');

		return view('formularios.editar.formularioA_edit', ['aFormulario' => $aFormulario,
															'datosModalidad' => $datosModalidad,
															'datosEstadoCaso' => $datosEstadoCaso,
															'datosMotivoCierre' => $datosMotivoCierre,
															'datosCaratulacion' => $datosCaratulacion,
															'datosProfesional' => $datosProfesional,
															'datosIntervieneActualmente' => $datosIntervieneActualmente,
															'datosPresentacion' => $datosPresentacion,
															'datosOrganismo' => $datosOrganismo,
															'datosAmbito' => $datosAmbito,
															'datosDepartamento' => $datosDepartamento,
															'datosOtrasProv' => $datosOtrasProv,
															'todo' => $todo,
															'idFormA' => $idFormulario,
															'idFormB' => $idFormB,
															'idFormC' => $idFormC,
															'idFormD' => $idFormD,
															'idFormE' => $idFormE,
															'idFormF' => $idFormF,
															'idFormG' => $idFormG,
															'usuarioCarpeta' => $usuarioCarpeta,
															'idCarpeta'=>$idCarpeta,
															'profesionalIntervinientes' => $profesionalIntervinientes
															]);
	}

	public function updateA($idCarpeta,$idFormulario)
	{	
		$userId = auth()->user()->id;
		//busco segun el id el formulario deseado
		$aFormulario = \App\FormA\Aformulario::find($idFormulario);
		// dd(request()->all());                       
		$fecha_hoy = Carbon::now();
		
		request()->validate([
							// input A1 Nombre de referencia 
							'datos_nombre_referencia' => 'required',
							// input A2 Numeros de carpeta
							'datos_numero_carpeta' => 'required|unique:numerocarpetas,numeroCarpeta,'. $idCarpeta,
							// input_fecha A3 Fecha de ingreso
							'datos_fecha_ingreso' => 'required|date|before_or_equal:'.$fecha_hoy,
							// select A4 Modalidad de ingreso
							'modalidad_id' => 'required | numeric | min:0 | max:5',
							// select oculto que se desoculta si A4 es id 3
							'presentacion_espontanea_id' => [new RequiredConditional(request()->get('modalidad_id'),array('3'),0,2,'Para ingresar un tipo debe seleccionar presentaci&oacute;n espont&aacute;nea')],
							// select oculto que se desoculta si A4 es id 5
							'derivacion_otro_organismo_id' => [new RequiredConditional(request()->get('modalidad_id'),array('5'),0,16,'Para ingresar un organismo debe seleccionar derivaci&oacute;n de otro organismo')],
							// input Introduzca el Organismo, input oculto que se desoculta si derivacion_otro_organismo_id es id 16
							'derivacion_otro_organismo_cual' => [new RequiredConditional(request()->get('derivacion_otro_organismo_id'),array('16'),0,255,'Para ingresar otro organismo debe seleccionar otro',true)],
							// select A5 Estado actual
							'estadocaso_id' => 'required | numeric | min:0 | max:3',
							// select oculto A5I Motivo de cierre se desoculta si A5 es id 3
							'motivocierre_id' => [new RequiredConditional(request()->get('estadocaso_id'),array('3'),0,5,'Para ingresar un motivo de cierre el estado dede ser cerrado')],						
							// select A6 Ambito de competencia 
							'ambito_id' => 'required | numeric | min:0 | max:3',
							// select oculto que se desoculta si A6 es id 2
							'departamento_id' => [new RequiredConditional(request()->get('ambito_id'),array('2'),0,18,'Para ingresar un departamento debe seleccionar provincial')],
							// select oculto que se desoculta si A6 es id 3
							'otrasprov_id' => [new RequiredConditional(request()->get('ambito_id'),array('3'),0,23,'Para ingresar una provincia debe seleccionar otra provincia')],
							// select A7 Caratulacion judicial 
							'caratulacionjudicial_id' => 'required | numeric | min:0 | max:7',
							// input oculto Introduzca tipo de caratulacion se desoculta si A7 es id 7
							'caratulacionjudicial_otro' => [new RequiredConditional(request()->get('caratulacionjudicial_id'),array('7'),0,255,'Para ingresar otra caratulaci&oacute;n judicial debe ingresar otro',true)],
							// input A8 N° Causa o Id Judicial
							'datos_nro_causa' => 'required',
							// select A9.1 Nombre/Equipo/Profesion 
							// 'profesional_id' => 'required_without:profesional_id_viejo | array | min:0' ,
							// 'profesional_id.*' => 'nullable | numeric | min:0 | max:25',						
							// // input fecha A9.2 Interviene desde 
							// 'datos_profesional_interviene_desde' => 'required_without:profesional_id_viejo | array | min:0',
							// 'datos_profesional_interviene_desde.*' => 'nullable|date|after_or_equal:datos_fecha_ingreso',							
							// // select A9.3 Actualmente interviene
							// 'profesionalactualmente_id' => 'required_without:profesional_id_viejo | array | min:0' ,							
							// 'profesionalactualmente_id.*' => 'nullable | numeric | min:0 | max:2',							
							// // input fecha A9.4 Interviene hasta
							// 'datos_profesional_interviene_hasta.*' => 'nullable|date|after_or_equal:datos_profesional_interviene_desde.*',
							// 'datos_profesional_interviene_hasta.0' => 'nullable|date|after_or_equal:datos_profesional_interviene_desde.0',
						],
						[		
							'datos_nombre_referencia.required' => 'Este campo es obligatorio',
							'datos_numero_carpeta.required' => 'Este campo es obligatorio',
							//nuevo
							'datos_numero_carpeta.unique' => 'Ya existe una carpeta con este número',
							'datos_fecha_ingreso.required' => 'Este campo es obligatorio',
							'datos_fecha_ingreso.before_or_equal' => 'La fecha ingresada es posterior al dia de hoy',
							'modalidad_id.required' => 'Este campo es obligatorio',
							'estadocaso_id.required' => 'Este campo es obligatorio',
							'motivocierre_id.required' => 'Este campo es obligatorio',
							'ambito_id.required' => 'Este campo es obligatorio',
							'departamento_id.required' => 'Este campo es obligatorio',
							'otrasprov_id.required' => 'Este campo es obligatorio',
							'caratulacionjudicial_id.required' => 'Este campo es obligatorio',
							'datos_nro_causa.required' => 'Este campo es obligatorio',
							'presentacion_espontanea_id.required_if' => 'Este campo es obligatorio', 
							'derivacion_otro_organismo_id.required_if' => 'Este campo es obligatorio', 
							'derivacion_otro_organismo_cual.required_if' => 'Este campo es obligatorio', 
							'caratulacionjudicial_otro.required_if' => 'Este campo es obligatorio', 

							'profesional_id.required_without' => 'Este campo es obligatorio',
							'profesional_id.*.numeric' => 'Opci&oacute;n incorrecta',
							'profesional_id.*.min' => 'Opci&oacute;n incorrecta',
							'profesional_id.*.max' => 'Opci&oacute;n incorrecta',
							'datos_profesional_interviene_desde.required_without' => 'Este campo es obligatorio',
							'datos_profesional_interviene_desde.*.date' => 'Opci&oacute;n incorrecta',
							'datos_profesional_interviene_desde.*.after_or_equal' => 'Opci&oacute;n incorrecta',
							'profesionalactualmente_id.required_without' => 'Este campo es obligatorio',
							'profesionalactualmente_id.*.numeric' => 'Opci&oacute;n incorrecta',
							'profesionalactualmente_id.*.min' => 'Opci&oacute;n incorrecta',
							'profesionalactualmente_id.*.max' => 'Opci&oacute;n incorrecta',
							'datos_profesional_interviene_hasta.*.date' => 'Opci&oacute;n incorrecta',
							'datos_profesional_interviene_hasta.*.after_or_equal' => 'Opci&oacute;n incorrecta'
						]);

		$data = request()->all();

		$data['user_id'] = $userId;
		$aFormulario->update($data);
		$carpeta=\App\Carpetas\Numerocarpeta::find($idCarpeta);
		$carpeta->update(['numeroCarpeta'=>$data['datos_numero_carpeta']]);
		// dd($data, $aFormulario, $carpeta);
		if($carpeta->bformulario){
		$carpeta->bformulario->update(['numeroCarpeta'=>$data['datos_numero_carpeta']]);
		}
		if($carpeta->cformulario){
		$carpeta->cformulario->update(['numeroCarpeta'=>$data['datos_numero_carpeta']]);
		}
		if($carpeta->dformulario){
			$carpeta->dformulario->update(['numeroCarpeta'=>$data['datos_numero_carpeta']]);
		}
		if($carpeta->fformulario){
			$carpeta->fformulario->update(['numeroCarpeta'=>$data['datos_numero_carpeta']]);
		}
		if($carpeta->gformulario){
			$carpeta->gformulario->update(['numeroCarpeta'=>$data['datos_numero_carpeta']]);
		}


		//requiero los datos de los profesionales
		// $arrayProfesionales = request()->only(['profesional_id', 'datos_profesional_interviene_desde', 'datos_profesional_interviene_hasta', 'profesionalactualmente_id']);	

		// if (request()->input('profesional_id') !== null) {
		// 	//de aca obtengo la cantidad de veces que tengo que iterar para asignarle valores al array
		// 	$cant = (count(request()->input('profesional_id')));

		// 	// HOY 12 DE OCTUBRE ESTA MANERA BORRA TODOS PROFESIONALES ANTERIORES Y SOLO ASIGNA LOS QUE SE UPDETEAN
		// 	for ($i=0; $i < $cant; $i++) 
		// 	{ 
		// 		//asigno manualmente los valores
		// 		$profesional['profesional_id'] = $data['profesional_id'][$i];
		// 		$profesional['datos_profesional_interviene_desde'] = $data['datos_profesional_interviene_desde'][$i];
		// 		$profesional['profesionalactualmente_id'] = $data['profesionalactualmente_id'][$i];
		// 		if ($profesional['profesionalactualmente_id'] == 1){
		// 			$profesional['datos_profesional_interviene_hasta'] = null;
		// 		}else{
		// 			$profesional['datos_profesional_interviene_hasta'] = $data['datos_profesional_interviene_hasta'][$i];
		// 		}
		// 		if (!isset($data['datos_profesional_interviene_hasta'][$i])) {  
		// 			$profesional['datos_profesional_interviene_hasta'] = null;
		// 	 }else{
		// 		 $profesional['datos_profesional_interviene_hasta'] = $data['datos_profesional_interviene_hasta'][$i];
		// 	 }
		// 	//  dd($data);
				
		// 		$profesional['user_id'] = $data['user_id'];
		// 		//una vez ya asignados los valores los guardo en la base, en la tabla que corresponde
		// 		$guardoProfesionalInterviniente = \App\FormA\Profesionalinterviniente::($profesional);
		// 		//de aca obtengo los id de los profesionales guardados
		// 		$profId[] = $guardoProfesionalInterviniente->id;	
		// 	}
		// 	//guardo en la tabla pivot
		// 	$guardoRelacion = $aFormulario->profesionalintervinientes()->sync($profId);

		// 	return redirect('formularios/buscador');
		// 	}else{
		// 	return redirect('formularios/buscador');
		// }
		
		$cantidadProfesionalesViejos = false;
			if (request()->input('profesional_id_viejo')[0]) {
				$cantidadProfesionalesViejos = (count(request()->input('profesional_id_viejo')));
			}

			$cantidadProfesionalesNuevos = false;
			if (request()->input('profesional_id')[0]) {
				$cantidadProfesionalesNuevos = (count(request()->input('profesional_id')));
			}

			if (isset($data['idsEliminados'])) {
				// dd($data);
				$ids = array_map("intval", explode(',', $data['idsEliminados']));
				for ($i = 0; $i < count($ids); $i++) {

					\App\FormA\Profesionalinterviniente::find($ids[$i])->aformularios()->detach();

					\App\FormA\Profesionalinterviniente::find($ids[$i])->delete();
				}
			}

			$profesionales = $aFormulario->profesionalintervinientes;

			// dd($profesionales);

			if ($cantidadProfesionalesViejos) {
				foreach ($profesionales as $i => $profesional) {
					$profesionalCargado = \App\FormA\Profesionalinterviniente::find($profesional->id);
					$profesionalViejo = [
											'profesional_id' => $data['profesional_id_viejo'][$i],
											'datos_profesional_interviene_desde' => $data['datos_profesional_interviene_desde_viejo'][$i],
											'profesionalactualmente_id' => $data['profesionalactualmente_id_viejo'][$i],
											'user_id' => $data['user_id']
										];
					if (isset($data['datos_profesional_interviene_hasta_viejo'][$i])) {
						$profesionalViejo['datos_profesional_interviene_hasta'] = $data['datos_profesional_interviene_hasta_viejo'][$i];
					}
					// dd($profesionalViejo);
					$actualizoProfesionalCargado = $profesionalCargado->update($profesionalViejo);

					$profesionalIds[] = $profesional->id;
				}
			}

			if ($cantidadProfesionalesNuevos) {
				for ($i = 0; $i < $cantidadProfesionalesNuevos ; $i++) { 
					
					$profesional = [
											'profesional_id' => $data['profesional_id'][$i],
											'datos_profesional_interviene_desde' => $data['datos_profesional_interviene_desde'][$i],
											'profesionalactualmente_id' => $data['profesionalactualmente_id'][$i],
											'user_id' => $data['user_id']
										];
					if (isset($data['datos_profesional_interviene_hasta'][$i])) {
						$profesional['datos_profesional_interviene_hasta'] = $data['datos_profesional_interviene_hasta'][$i];
					}

					$profesionalNuevo = \App\FormA\Profesionalinterviniente::create($profesional);

					$profesionalIds[] = $profesionalNuevo->id;

				}

				$guardoRelacion = $aFormulario->profesionalintervinientes()->sync($profesionalIds);
			}
		// fin intervencion
		return redirect('formularios/buscador');

	}
	
	public function destroyA($id)
	{
		$fecha_hoy = Carbon::now();
		$carpeta = \App\Carpetas\Numerocarpeta::find($id);
		// $aFormulario = \App\FormA\Aformulario::find($id);
		$carpetaFormA = \App\Carpetas\Numerocarpeta::where('aformulario_id', '=', $id);
		// dd($carpeta->bformulario);
		
		if ($carpeta->bformulario !== null) {
			$carpeta->bformulario()->delete();
			}
			if($carpeta->cformulario !== null){
				$carpeta->cformulario()->delete();
			}
			if($carpeta->dformulario !== null){
				$carpeta->dformulario()->delete();
			}
			if($carpeta->fformulario !== null){				
				$carpeta->fformulario()->delete();
			}
			if($carpeta->gformulario !== null){
				$carpeta->gformulario()->delete();
			}
			$carpetaFormA->update([ 'deleted_at' => $fecha_hoy]);

			// $carpetaFormA->update([ 'deleted_at' => $fecha_hoy]);
			// $carpeta->aformulario->update([ 'deleted_at' => $fecha_hoy]);
			// $carpeta->bformulario->update([ 'deleted_at' => $fecha_hoy]);
			// $carpeta->cformulario->update([ 'deleted_at' => $fecha_hoy]);
			// $carpeta->dformulario->update([ 'deleted_at' => $fecha_hoy]);
			// $carpeta->eformulario->update([ 'deleted_at' => $fecha_hoy]);
			// $carpeta->gformulario->update([ 'deleted_at' => $fecha_hoy]);
		// }elseif ($carpetaFormA->value('bformulario_id') !== null || $carpetaFormA->value('cformulario_id') !== null || $carpetaFormA->value('dformulario_id') !== null || $carpetaFormA->value('fformulario_id') !== null || $carpetaFormA->value('gformulario_id') !== null) {

		// 	$carpetaFormA->update(['aformulario_id' => null]);

	
		
		// if ($carpetaFormA->value('bformulario_id') == null && $carpetaFormA->value('cformulario_id') == null && $carpetaFormA->value('dformulario_id') == null && $carpetaFormA->value('fformulario_id') == null && $carpetaFormA->value('gformulario_id') == null) {
			
			// $carpetaFormA->update([ 'deleted_at' => $fecha_hoy]);
			// $carpeta->aformulario->update([ 'deleted_at' => $fecha_hoy]);
			// $carpeta->bformulario->update([ 'deleted_at' => $fecha_hoy]);
			// $carpeta->cformulario->update([ 'deleted_at' => $fecha_hoy]);
			// $carpeta->dformulario->update([ 'deleted_at' => $fecha_hoy]);
			// $carpeta->eformulario->update([ 'deleted_at' => $fecha_hoy]);
			// $carpeta->gformulario->update([ 'deleted_at' => $fecha_hoy]);
		// }elseif ($carpetaFormA->value('bformulario_id') !== null || $carpetaFormA->value('cformulario_id') !== null || $carpetaFormA->value('dformulario_id') !== null || $carpetaFormA->value('fformulario_id') !== null || $carpetaFormA->value('gformulario_id') !== null) {

		// 	$carpetaFormA->update(['aformulario_id' => null]);

		// }

		// $aFormulario->delete();

    	session()->flash('message', 'El formulario se eliminó con éxito.');

    	return redirect('formularios/buscador');
	}

	public function createB($idCarpeta,$idFormulario=null)
	{
		$datosGenero = \App\FormB\Genero::all();
		$datosDocumento = \App\FormB\Tienedoc::all();
		$datosTipoDocumento = \App\FormB\Tipodocumento::all();
		// $datosPaises = \App\FormB\Paises::all();
		// $datosArgProvincias = \App\FormB\Argprovincia::all();
		// $datosArgCiudades = \App\FormB\Argciudad::all();
		// $datosUrProvincias = \App\FormB\Urprovincia::all();
		// $datosChProvincias = \App\FormB\Chprovincia::all();
		// $datosBrEstados = \App\FormB\Brestado::all();
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

		$numeroCarpeta = DB::table('numerocarpetas')
												  ->WHERE('user_id', '=', $userId)
												  ->WHERE('deleted_at', '=', null)
												  ->WHERE('id','=',$idCarpeta)
												  ->first(); 

		/* $numeroCarpeta = DB::table('aformularios')
											->WHERE('user_id', '=', $userId)
											->WHERE('deleted_at', '=', null)
											->ORDERBY('updated_at', 'desc')
											->first()
											->datos_numero_carpeta; */
		// $todoFormA = DB::table('aformularios')
		// 									->WHERE('user_id', '=', $userId)
		// 									->ORDERBY('updated_at', 'desc')
		// 									->get();

		$carpetas = \App\Carpetas\Numerocarpeta::where('aformulario_id', '!=', null)->get();

		// dd($carpetas->id);

		// foreach ($carpetas as $carpeta) {
		// 	dump($carpeta->aformulario_id);
		// }

		return view('formularios/formularioB', 
			['datosGenero' => $datosGenero,
				'datosDocumento' => $datosDocumento,
				'datosTipoDocumento' => $datosTipoDocumento,
				// 'datosPaises' => $datosPaises,
				// 'datosArgProvincias' => $datosArgProvincias,
				// 'datosArgCiudades' => $datosArgCiudades,
				// 'datosUrProvincias' => $datosUrProvincias,
				// 'datosChProvincias' => $datosChProvincias,
				// 'datosBrEstados' => $datosBrEstados,
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
				// 'todoFormA' => $todoFormA,
				'numeroCarpeta' => $numeroCarpeta->numeroCarpeta,
				'carpetas' => $carpetas,
				'userId' => $userId,
				'idCarpeta' =>$idCarpeta

			]);
	}

	public function insertB()
	{
		$userId = auth()->user()->id;

		
		
		request()->validate([
			// input B1 Nombre y apellido
			'victima_nombre_y_apellido' => 'required',
			// input B2 Apodo
			'victima_apodo' => 'required',
			// select B3 Genero
			'genero_id' => 'required | numeric | min:0 | max:6',
			// select B4 Documentacion
			'tienedoc_id' => 'required | numeric | min:0 | max:6',
			// select B5 Tipo de documentacion si B4 es id 3 o 6 se oculta
			'tipodocumento_id' => [new FormBDocumentacion(request()->get('tienedoc_id'),0,9)],
			// select B6 Nro documento si B4 es id 3 o 6 se oculta
			'victima_documento' => [new FormBDocumentacion(request()->get('tienedoc_id'),0,255, true)],
			// select B7 B8 B9 nacimiento
			'paisNacimiento' => 'required',
			'provinciaNacimiento' => 'required',
			'ciudadNacimiento' => 'required',
			// input fecha B10 Fecha de nacimiento
			'victima_fecha_nacimiento' => 'required',
			// input B11 Edad
			'victima_edad' => 'required',
			// select B12 Franja Etaria
			'franjaetaria_id' => 'required | numeric | min:0 | max:7',
			// select B13 Embarazo al momento del relevamineto 
			'embarazorelevamiento_id' => 'required | numeric | min:0 | max:3',
			// select B14 Embarazo previo
			'embarazoprevio_id' => 'required | numeric | min:0 | max:3',
			// select B15 Embarazo hijos anterior
			'hijosembarazo_id' => 'required | numeric | min:0 | max:3',
			// select B16 Bajo efectos de estupefacientes
			'bajoefecto_id' => 'required | numeric | min:0 | max:3',
			// checkbox B17 Discapacidad
			'discapacidad_id' => [new RequiredCheckbox('Si ingres&oacute; No o Se Desconoce no puede seleccionar otra opci&oacute;n', array('5','6'), 0, 6)],
			// select B18 Lesion visible
			'tienelesion_id' => 'required | numeric | min:0 | max:3',
			// input oculto B18I se desoculta si B18 es id 1
			'victima_lesion' => [new RequiredConditional(request()->get('tienelesion_id'),array('1'),0,255,'Para ingresar un tipo debe seleccionar si',true)],
			// select oculto B18II se desoculta si B18 es id 1
			'lesionconstatada_id' => [new RequiredConditional(request()->get('tienelesion_id'),array('1'),0,3,'Para ingresar si fue constatada debe seleccionar si',false,2)],
			// input oculto B18III se desoculta si B18II es id 1
			'victima_lesion_organismo' => [new RequiredConditional(request()->get('lesionconstatada_id'),array('1'),0,255,'Para ingresar un organismo debe seleccionar si',true)],
			// select B19 Enfermedad cronica
			'enfermedadcronica_id' => 'required | numeric | min:0 | max:3',
			// input oculto B19I se desoculta si B19 es id 1
			'victima_tipo_enfermedad_cronica' => [new RequiredConditional(request()->get('enfermedadcronica_id'),array('1'),0,255,'Para ingresar un tipo debe seleccionar si',true)],
			// checkbox B20 limitacion para comunicarse
			'limitacion_id' => [new RequiredCheckbox('Si ingres&oacute; No no puede seleccionar otra opci&oacute;n', array('4'), 0, 5)],
			// input oculto "cual?" se desoculta si B20I contiene id 5
			'victima_limitacion_otra' => [new RequiredCheckbox('Debe seleccionar la opcion otra para ingresar una nueva limitacion', 5, 0, 255,true,request()->get('limitacion_id'))],
			// select B21 nivel educativo
			'niveleducativo_id' => 'required | numeric | min:0 | max:8',
			// select B22 oficio
			'oficio_id' => 'required | numeric | min:0 | max:3',
			// input oculto "cual?" si B22 es id 1
			'victima_oficio_cual' => [new RequiredConditional(request()->get('oficio_id'),array('1'),0,255,'Para ingresar un oficio debe seleccionar si',true)],
			
			
			
			

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
			'paisNacimiento.required' => 'Este campo es obligatorio',
			'provinciaNacimiento.required' => 'Este campo es obligatorio',
			'ciudadNacimiento.required' => 'Este campo es obligatorio',
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
			'discapacidad_id.required' => 'Este campo es obligatorio',
			'limitacion_id.required' => 'Este campo es obligatorio',

		]);

		$data = request()->all();
		

		$data['user_id'] = $userId;

		$guardoBformulario = \App\FormB\Bformulario::create($data);

		$ultimoId = $guardoBformulario->id;

		// nuevo
		$carpeta = \App\Carpetas\Numerocarpeta::where('numeroCarpeta', '=', $data['numeroCarpeta'])->first();

		$idCarpeta = $carpeta->id;

		$numeroCarpeta = $carpeta->numeroCarpeta;

		$guardoNumeroCarpeta = \App\Carpetas\Numerocarpeta::where('numeroCarpeta', '=', $data['numeroCarpeta'])->update(['bformulario_id' => $ultimoId]);

		// request()->validate([
		// 	'discapacidad_id' => 'required'
		// ],[
		// 	'discapacidad_id.required' => 'Este campo es obligatorio'
		// ]);

		$bformulario = \App\FormB\Bformulario::find($ultimoId);

		$arrayDiscapacidades = request()->input('discapacidad_id');

		$guardoDiscapacidades = $bformulario->discapacidads()->sync($arrayDiscapacidades);

		// request()->validate([
		// 	'limitacion_id' => 'required'
		// ],[
		// 	'limitacion_id.required' => 'Este campo es obligatorio'
		// ]);

		$bformulario = \App\FormB\Bformulario::find($ultimoId);

		$arrayLimitaciones = request()->input('limitacion_id');

		$guardoLimitaciones = $bformulario->limitacions()->sync($arrayLimitaciones);

		$guardoLugarNacimiento = \App\FormB\Lugarnacimiento::create(['bformulario_id' => $ultimoId, 'paisNacimiento' => $data['paisNacimiento'], 'provinciaNacimiento' => $data['provinciaNacimiento'], 'ciudadNacimiento' => $data['ciudadNacimiento']]);

	    return redirect('formularios/C/'.$idCarpeta.'/'.$numeroCarpeta);
	}

	public function editB($idCarpeta,$idFormulario)
	{
		$datosGenero = \App\FormB\Genero::all();
		$datosDocumento = \App\FormB\Tienedoc::all();
		$datosTipoDocumento = \App\FormB\Tipodocumento::all();
		// $datosPaises = \App\FormB\Paises::all();
		// $datosArgProvincias = \App\FormB\Argprovincia::all();
		// $datosArgCiudades = \App\FormB\Argciudad::all();
		// $datosUrProvincias = \App\FormB\Urprovincia::all();
		// $datosChProvincias = \App\FormB\Chprovincia::all();
		// $datosBrEstados = \App\FormB\Brestado::all();
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
		$Bformulario = \App\FormB\Bformulario::find($idFormulario);
		$userId = auth()->user()->id;
		
		//id de los formularios de una misma carpeta
			$idFormA = \App\Carpetas\Numerocarpeta::where('bformulario_id', '=', $idFormulario)
							// ->where('cformulario_id', '=', $id)
							->value('aformulario_id');
			// $idFormB = \App\Carpetas\Numerocarpeta::where('user_id', '=', $userId)
			$idFormB = \App\Carpetas\Numerocarpeta::where('bformulario_id', '=', $idFormulario)
								// ->where('cformulario_id', '=', $id)
								->value('bformulario_id');
			// $idFormC = \App\Carpetas\Numerocarpeta::where('user_id', '=', $userId)
			$idFormC = \App\Carpetas\Numerocarpeta::where('bformulario_id', '=', $idFormulario)
								// ->where('cformulario_id', '=', $id)
								->value('cformulario_id');
			// $idFormD = \App\Carpetas\Numerocarpeta::where('user_id', '=', $userId)
			$idFormD = \App\Carpetas\Numerocarpeta::where('bformulario_id', '=', $idFormulario)
								// ->where('cformulario_id', '=', $id)
								->value('dformulario_id');
			// $idFormE = \App\Carpetas\Numerocarpeta::where('user_id', '=', $userId)
			$idFormE = \App\Carpetas\Numerocarpeta::where('bformulario_id', '=', $idFormulario)
								// ->where('cformulario_id', '=', $id)
								->value('eformulario_id');
			// $idFormF = \App\Carpetas\Numerocarpeta::where('user_id', '=', $userId)
			$idFormF = \App\Carpetas\Numerocarpeta::where('bformulario_id', '=', $idFormulario)
								// ->where('cformulario_id', '=', $id)
								->value('fformulario_id');
			// $idFormG = \App\Carpetas\Numerocarpeta::where('user_id', '=', $userId)
			$idFormG = \App\Carpetas\Numerocarpeta::where('bformulario_id', '=', $idFormulario)
								// ->where('cformulario_id', '=', $id)
								->value('gformulario_id');
		//fin ids
			$usuarioCarpeta = \App\Carpetas\Numerocarpeta::WHERE('bformulario_id', '=', $idFormulario)->value('user_id');

		return view('formularios.editar.formularioB_edit', ['Bformulario' => $Bformulario,
															'datosGenero' => $datosGenero,
															'datosDocumento' => $datosDocumento,
															'datosTipoDocumento' => $datosTipoDocumento,
															// 'datosPaises' => $datosPaises,
															// 'datosArgProvincias' => $datosArgProvincias,
															// 'datosArgCiudades' => $datosArgCiudades,
															// 'datosUrProvincias' => $datosUrProvincias,
															// 'datosChProvincias' => $datosChProvincias,
															// 'datosBrEstados' => $datosBrEstados,
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
															'idFormA' => $idFormA,
															'idFormB' => $idFormB,
															'idFormC' => $idFormC,
															'idFormD' => $idFormD,
															'idFormE' => $idFormE,
															'idFormF' => $idFormF,
															'idFormG' => $idFormG,
															'userId' => $userId,
															'usuarioCarpeta' => $usuarioCarpeta,
															'idCarpeta' => $idCarpeta
															]);
	}

	public function updateB($idCarpeta,$idFormulario)
	{
		request()->validate([
// input B1 Nombre y apellido
'victima_nombre_y_apellido' => 'required',
// input B2 Apodo
'victima_apodo' => 'required',
// select B3 Genero
'genero_id' => 'required | numeric | min:0 | max:6',
// select B4 Documentacion
'tienedoc_id' => 'required | numeric | min:0 | max:6',
// select B5 Tipo de documentacion si B4 es id 3 o 6 se oculta
'tipodocumento_id' => [new FormBDocumentacion(request()->get('tienedoc_id'),0,9)],
// select B6 Nro documento si B4 es id 3 o 6 se oculta
'victima_documento' => [new FormBDocumentacion(request()->get('tienedoc_id'),0,255, true)],
// select B7 B8 B9 nacimiento
'paisNacimiento' => 'required',
'provinciaNacimiento' => 'required',
'ciudadNacimiento' => 'required',
// input fecha B10 Fecha de nacimiento
'victima_fecha_nacimiento' => 'required',
// input B11 Edad
'victima_edad' => 'required',
// select B12 Franja Etaria
'franjaetaria_id' => 'required | numeric | min:0 | max:7',
// select B13 Embarazo al momento del relevamineto 
'embarazorelevamiento_id' => 'required | numeric | min:0 | max:3',
// select B14 Embarazo previo
'embarazoprevio_id' => 'required | numeric | min:0 | max:3',
// select B15 Embarazo hijos anterior
'hijosembarazo_id' => 'required | numeric | min:0 | max:3',
// select B16 Bajo efectos de estupefacientes
'bajoefecto_id' => 'required | numeric | min:0 | max:3',
// checkbox B17 Discapacidad
'discapacidad_id' => [new RequiredCheckbox('Si ingres&oacute; No o Se Desconoce no puede seleccionar otra opci&oacute;n', array('5','6'), 0, 6)],
// select B18 Lesion visible
'tienelesion_id' => 'required | numeric | min:0 | max:3',
// input oculto B18I se desoculta si B18 es id 1
'victima_lesion' => [new RequiredConditional(request()->get('tienelesion_id'),array('1'),0,255,'Para ingresar un tipo debe seleccionar si',true)],
// select oculto B18II se desoculta si B18 es id 1
'lesionconstatada_id' => [new RequiredConditional(request()->get('tienelesion_id'),array('1'),0,3,'Para ingresar si fue constatada debe seleccionar si',false,2)],
// input oculto B18III se desoculta si B18II es id 1
'victima_lesion_organismo' => [new RequiredConditional(request()->get('lesionconstatada_id'),array('1'),0,255,'Para ingresar un organismo debe seleccionar si',true)],
// select B19 Enfermedad cronica
'enfermedadcronica_id' => 'required | numeric | min:0 | max:3',
// input oculto B19I se desoculta si B19 es id 1
'victima_tipo_enfermedad_cronica' => [new RequiredConditional(request()->get('enfermedadcronica_id'),array('1'),0,255,'Para ingresar un tipo debe seleccionar si',true)],
// checkbox B20 limitacion para comunicarse
'limitacion_id' => [new RequiredCheckbox('Si ingres&oacute; No no puede seleccionar otra opci&oacute;n', array('4'), 0, 5)],
// input oculto "cual?" se desoculta si B20I contiene id 5
'victima_limitacion_otra' => [new RequiredCheckbox('Debe seleccionar la opcion otra para ingresar una nueva limitacion', 5, 0, 255,true,request()->get('limitacion_id'))],
// select B21 nivel educativo
'niveleducativo_id' => 'required | numeric | min:0 | max:8',
// select B22 oficio
'oficio_id' => 'required | numeric | min:0 | max:3',
// input oculto "cual?" si B22 es id 1
'victima_oficio_cual' => [new RequiredConditional(request()->get('oficio_id'),array('1'),0,255,'Para ingresar un oficio debe seleccionar si',true)],

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
			'paisNacimiento.required' => 'Tenes que completar esta campo, si no lo modificaste ingresa el valor anterior',
			'provinciaNacimiento.required' => 'Tenes que completar esta campo, si no lo modificaste ingresa el valor anterior',
			'ciudadNacimiento.required' => 'Tenes que completar esta campo, si no lo modificaste ingresa el valor anterior',
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
			'discapacidad_id.required' => 'Este campo es obligatorio',
			'limitacion_id.required' => 'Este campo es obligatorio',
		]);

		$data = request()->all();
	    
		//busco segun el id el formulario desdeado
		$Bformulario = \App\FormB\Bformulario::find($idFormulario);

		//requiero el input discapacidad_id para actualizarlo
		$arrayDiscapacidades = request()->input('discapacidad_id');

		//sincrononizo atravez de la funcion discapacidads que tiene una realcion de belongsToMany con bformulario
		$actualizoDiscapacidades = $Bformulario->discapacidads()->sync($arrayDiscapacidades);


		$arrayLimitaciones = request()->input('limitacion_id');

		$actualizoLimitaciones = $Bformulario->limitacions()->sync($arrayLimitaciones);

		\App\FormB\Lugarnacimiento::WHERE('bformulario_id', '=', $idFormulario)->update(['bformulario_id' => $idFormulario, 'paisNacimiento' => $data['paisNacimiento'], 'provinciaNacimiento' => $data['provinciaNacimiento'], 'ciudadNacimiento' => $data['ciudadNacimiento']]);

		//actualizo todo
		$Bformulario->update($data);

		return redirect('formularios/buscador');
	}

	public function destroyB($idCarpeta)
	{
		$fecha_hoy = Carbon::now();

		$carpeta = \App\Carpetas\Numerocarpeta::find( $idCarpeta);
				// $carpetaFormG = \App\Carpetas\Numerocarpeta::where('gformulario_id', '=', $id);
		// dd($id);
		// dd($carpeta->bformulario);
		

		// if ($carpetaFormB->value('aformulario_id') == null && $carpetaFormB->value('cformulario_id') == null && $carpetaFormB->value('dformulario_id') == null && $carpetaFormB->value('fformulario_id') == null && $carpetaFormB->value('gformulario_id') == null) {
			
			// $carpetaFormB->aformulario->update(['deleted_at' => $fecha_hoy]);
			// $carpetaFormB->update(['deleted_at' => $fecha_hoy]);
			// $carpetaFormB->cformulario->update(['deleted_at' => $fecha_hoy]);
			// $carpetaFormB->dformulario->update(['deleted_at' => $fecha_hoy]);
			// $carpetaFormB->fformulario->update(['deleted_at' => $fecha_hoy]);
			// $carpetaFormB->gformulario->update(['deleted_at' => $fecha_hoy]);
			
			

		// }elseif ($carpetaFormB->value('aformulario_id') !== null || $carpetaFormB->value('cformulario_id') !== null || $carpetaFormB->value('dformulario_id') !== null || $carpetaFormB->value('fformulario_id') !== null || $carpetaFormB->value('gformulario_id') !== null) {

		// 	$carpetaFormB->update(['bformulario_id' => null]);

		// }

		// $Bformulario->delete();

    	session()->flash('message', 'El formulario se eliminó con éxito.');

    	return redirect('formularios/buscador');	
	}

	public function createC($idCarpeta,$idFormulario=null)
	{
		$datosOtraspersonas = \App\FormC\Otraspersona::all();
		// $datosGeneros = \App\FormB\Genero::all();
		$datosVinculos = \App\FormC\Vinculo::all();
		$userId = auth()->user()->id;

		// $numeroCarpeta = DB::table('aformularios')
		// 									->WHERE('user_id', '=', $userId)
		// 									->WHERE('deleted_at', '=', null)
		// 									->ORDERBY('updated_at', 'desc')
		// 									->first()
		// 									->datos_numero_carpeta;
		$numeroCarpeta= DB::table('numerocarpetas')
												  ->WHERE('user_id', '=', $userId)
												  ->WHERE('deleted_at', '=', null)
												  ->WHERE('id','=',$idCarpeta)
												  ->first()
												  ->numeroCarpeta; 

		$carpetas = \App\Carpetas\Numerocarpeta::where('aformulario_id', '!=', null)->where('bformulario_id', '!=', null)->get();

		//Lo que hago aca es asignarle el id al mapa 
			$IdformB = \App\FormB\Bformulario::WHERE('user_id', '=', $userId)->orderBy('created_at', 'desc')->first()->id;

			$mapa = \App\FormB\Mapa::WHERE('user_id', '=', $userId)->WHERE('bformulario_id', '=', 0)->update(['bformulario_id' => $IdformB]);
		// fin
		// dd('...$args');


		return view('formularios.formularioC', ['datosOtraspersonas' => $datosOtraspersonas,
												// 'datosGeneros' => $datosGeneros,
												'datosVinculos' => $datosVinculos,
												'numeroCarpeta' => $numeroCarpeta,
												'carpetas' => $carpetas,
												// 'todoFormA' => $todoFormA,
												'idCarpeta' =>$idCarpeta
												]);
	}

	public function insertC()
	{	
		
		//guardo el id del usuario en una variable
		$userId = auth()->user()->id;

			request()->validate([
				// select C1 referente
				'otraspersonas_id' => 'required | numeric | min:0 | max:3',
				// DATOS DEL REFERENTE QUE SE DESOCULTA SI C1 ES ID 3
				// input C2 nombre y apellido
				'nombre_apellido' => 'required_if:otraspersonas_id,1|array|min:0',
				'nombre_apellido.*' => [new RequiredConditional(request()->get('otraspersonas_id'),array('1'),0,255,'Para ingresar nombre y apellido debe seleccionar si',true)],
				// input C3 edad
				'edad' => 'required_if:otraspersonas_id,1|array|min:0',
				'edad.*' => [new RequiredConditional(request()->get('otraspersonas_id'),array('1'),0,255,'Para ingresar edad debe seleccionar si',true)],
				// select C4 viculo
				'vinculo_id' => 'required_if:otraspersonas_id,1|array|min:0',			
				'vinculo_id.*' => [new RequiredConditional(request()->get('otraspersonas_id'),array('1'),0,6,'Para ingresar vinculo debe seleccionar si')],			
				// input oculto "cual?" que se desoculta si C4 es id 1
				'vinculo_otro.0' => 'required_if:vinculo_id.0,1',
				'vinculo_otro.*' => 'required_if:vinculo_id.*,1',
				// input C5 contacto referente
				'referenteContacto' => 'required_if:otraspersonas_id,1|array|min:0',
				'referenteContacto.*' => [new RequiredConditional(request()->get('otraspersonas_id'),array('1'),0,255,'Para ingresar contacto debe seleccionar si',true)],
		],
		[
			'otraspersonas_id.required' => 'Este campo es obligatorio',
			'nombre_apellido.*.required_if' => 'Este campo es obligatorio',
			'edad.*.required_if' => 'Este campo es obligatorio',
			// 'genero_id.*.required_if' => 'Este campo es obligatorio',
			'vinculo_id.*.required_if' => 'Este campo es obligatorio',
			'vinculo_otro.*.required_if' => 'Este campo es obligatorio',
			'referenteContacto.*.required_if' => 'Este campo es obligatorio'

		]);
		// ver que hacer si la cantidad que se recibe es 0, osea lo mando de una
		$data = request()->all();
		// dd($data);

		$data['user_id'] = $userId;
		// dd(isset($data['nombre_apellido']));

		$guardoCformulario = \App\FormC\Cformulario::create($data);

		//id del formulario recien creado
		$ultimoId = $guardoCformulario->id;

		$carpeta = \App\Carpetas\Numerocarpeta::where('numeroCarpeta', '=', $data['numeroCarpeta'])->first();

		$idCarpeta = $carpeta->id;

		$numeroCarpeta = $carpeta->numeroCarpeta;

		$guardoNumeroCarpeta = \App\Carpetas\Numerocarpeta::where('numeroCarpeta', '=', $data['numeroCarpeta'])->update(['cformulario_id' => $ultimoId]);

		if (isset($data['nombre_apellido'])) {
			$cant = (count(request()->input('nombre_apellido')));

			for ($i=0; $i < $cant; $i++) {

				$referente['nombre_apellido'] = $data['nombre_apellido'][$i];
				$referente['edad'] = $data['edad'][$i];
				$referente['vinculo_id'] = $data['vinculo_id'][$i]; 
				$referente['vinculo_otro'] = $data['vinculo_otro'][$i]; 
				$referente['referenteContacto'] = $data['referenteContacto'][$i];
				$referente['user_id'] = $data['user_id'];

				$guardoReferente = \App\FormC\Referente::create($referente);

				$referenteId[] = $guardoReferente->id;
			}

			$cFormulario = \App\FormC\Cformulario::find($ultimoId);

			$guardoRelacion = $cFormulario->referentes()->sync($referenteId);

			return redirect('formularios/D/'.$idCarpeta.'/'.$numeroCarpeta);
		}else{
			return redirect('formularios/D/'.$idCarpeta.'/'.$numeroCarpeta);
		}		
	}

	public function editC($idCarpeta,$idFormulario)
	{
		$datosOtraspersonas = \App\FormC\Otraspersona::all();
		// $datosGeneros = \App\FormB\Genero::all();
		$datosVinculos = \App\FormC\Vinculo::all();
		$userId = auth()->user()->id;
		$datosReferentes = \App\FormC\Referente::all();
		$cFormulario = \App\FormC\Cformulario::find($idFormulario);

		// $datosTodo = DB::table('cformularios')
		//                             ->WHERE('cformularios.id', '=', $idFormulario)
		// 							->JOIN('cformulario_referente', 'cformularios.id', '=', 'cformulario_referente.cformulario_id')
		// 							->JOIN('referentes', 'cformulario_referente.referente_id', '=', 'referentes.id')
		//                             ->get();
		$referentes = $cFormulario->referentes;

		//id de los formularios de una misma carpeta
			// $idFormA = \App\Carpetas\Numerocarpeta::where('user_id', '=', $userId)
			$idFormA = \App\Carpetas\Numerocarpeta::where('cformulario_id', '=', $idFormulario)
							// ->where('cformulario_id', '=', $id)
							->value('aformulario_id');
			// $idFormB = \App\Carpetas\Numerocarpeta::where('user_id', '=', $userId)
			$idFormB = \App\Carpetas\Numerocarpeta::where('cformulario_id', '=', $idFormulario)
								// ->where('cformulario_id', '=', $id)
								->value('bformulario_id');
			// $idFormC = \App\Carpetas\Numerocarpeta::where('user_id', '=', $userId)
			$idFormC = \App\Carpetas\Numerocarpeta::where('cformulario_id', '=', $idFormulario)
								// ->where('cformulario_id', '=', $id)
								->value('cformulario_id');
			// $idFormD = \App\Carpetas\Numerocarpeta::where('user_id', '=', $userId)
			$idFormD = \App\Carpetas\Numerocarpeta::where('cformulario_id', '=', $idFormulario)
								// ->where('cformulario_id', '=', $id)
								->value('dformulario_id');
			// $idFormE = \App\Carpetas\Numerocarpeta::where('user_id', '=', $userId)
			$idFormE = \App\Carpetas\Numerocarpeta::where('cformulario_id', '=', $idFormulario)
								// ->where('cformulario_id', '=', $id)
								->value('eformulario_id');
			// $idFormF = \App\Carpetas\Numerocarpeta::where('user_id', '=', $userId)
			$idFormF = \App\Carpetas\Numerocarpeta::where('cformulario_id', '=', $idFormulario)
								// ->where('cformulario_id', '=', $id)
								->value('fformulario_id');
			// $idFormG = \App\Carpetas\Numerocarpeta::where('user_id', '=', $userId)
			$idFormG = \App\Carpetas\Numerocarpeta::where('cformulario_id', '=', $idFormulario)
								// ->where('cformulario_id', '=', $id)
								->value('gformulario_id');
		//fin ids
			$usuarioCarpeta = \App\Carpetas\Numerocarpeta::WHERE('cformulario_id', '=', $idFormulario)->value('user_id');

		return view('formularios.editar.formularioC_edit', [
															'datosOtraspersonas' => $datosOtraspersonas,
															// 'datosGeneros' => $datosGeneros,
															'datosVinculos' => $datosVinculos,
															'userId' => $userId,
															'cFormulario' => $cFormulario,
															// 'datosTodo' => $datosTodo,
															'referentes' => $referentes,
															'idFormA' => $idFormA,
															'idFormB' => $idFormB,
															'idFormC' => $idFormC,
															'idFormD' => $idFormD,
															'idFormE' => $idFormE,
															'idFormF' => $idFormF,
															'idFormG' => $idFormG,
															'usuarioCarpeta' => $usuarioCarpeta,
															'idCarpeta' => $idCarpeta
														]);
	}

	public function updateC($idCarpeta,$idFormulario)
	{	
		$userId = auth()->user()->id;
		$fecha_hoy = Carbon::now();

		//se agregaron campos nombre_apellido_viejo edad_viejo genero_id_viejo vinculo_id_viejo referenteContacto_viejo para
		//diferenciar los referentes cargados anteriormente

		request()->validate([
			// select C1 referente
			'otraspersonas_id' => 'required | numeric | min:0 | max:3',
			// DATOS DEL REFERENTE QUE SE DESOCULTA SI C1 ES ID 3
			// input C2 nombre y apellido
			'nombre_apellido' => 'nullable',
			'nombre_apellido.*' => [new RequiredConditional(request()->get('otraspersonas_id'),array('1'),0,255,'Para ingresar nombre y apellido debe seleccionar si',true)],
			// input C3 edad
			'edad' => 'nullable',
			'edad.*' => [new RequiredConditional(request()->get('otraspersonas_id'),array('1'),0,255,'Para ingresar edad debe seleccionar si',true)],
			// select C4 viculo
			'vinculo_id' => 'nullable',			
			'vinculo_id.*' => [new RequiredConditional(request()->get('otraspersonas_id'),array('1'),0,6,'Para ingresar vinculo debe seleccionar si')],			
			// input oculto "cual?" que se desoculta si C4 es id 1
			'vinculo_otro.0' => 'required_if:vinculo_id.0,1',
			'vinculo_otro.*' => 'required_if:vinculo_id.*,1',
			// input C5 contacto referente
			'referenteContacto' => 'nullable',
			'referenteContacto.*' => [new RequiredConditional(request()->get('otraspersonas_id'),array('1'),0,255,'Para ingresar contacto debe seleccionar si',true)],
		],
		[
			'nombre_apellido.*.required' => 'Este campo es obligatorio',
			'edad.*.required' => 'Este campo es obligatorio',
			// 'genero_id.*.required' => 'Este campo es obligatorio',
			'vinculo_id.*.required' => 'Este campo es obligatorio',
			'referenteContacto.*.required_if' => 'Este campo es obligatorio'
		]);
		$data = request()->all();
		$data['user_id'] = $userId;

		// $cant = (count(request()->input('nombre_apellido')));

		//nuevo
		$cFormulario = \App\FormC\Cformulario::find($idFormulario);

		$referenteId = [];

		// dd((count(request()->input('nombre_apellido_viejo'))));

		$cantidadReferentesViejos = false;
		if (request()->input('nombre_apellido_viejo')) {
			$cantidadReferentesViejos = (count(request()->input('nombre_apellido_viejo')));
		}

		$cantidadReferentesNuevos = false;
		if (request()->input('nombre_apellido')) {
			$cantidadReferentesNuevos = (count(request()->input('nombre_apellido')));
		}
			// dd($cFormulario->referentes()->WHERE('referente_id', '=', $data['idsEliminados']));

		if (isset($data['idsEliminados'])) {
			$ids = array_map("intval", explode(',', $data['idsEliminados']));
			for ($i=0; $i < count($ids); $i++) { 
				
				$referente = DB::table('referentes')->where('referentes.id', '=', $ids[$i])->update(['updated_at' => $fecha_hoy, 'deleted_at' => $fecha_hoy]);
				$tablaPivot = DB::table('cformulario_referente')->where('cformulario_referente.referente_id', '=', $ids[$i])->update(['updated_at' => $fecha_hoy, 'deleted_at' => $fecha_hoy]);

			}
		}

		$referentes = $cFormulario->referentes;

		if ($cantidadReferentesViejos) {
			foreach ($referentes as $i => $referente) {
				$referenteCargado = \App\FormC\Referente::find($referente->id);

				$referenteViejo['nombre_apellido'] = $data['nombre_apellido_viejo'][$i];
				$referenteViejo['edad'] = $data['edad_viejo'][$i];
				$referenteViejo['vinculo_id'] = $data['vinculo_id_viejo'][$i];
				if (isset($data['vinculo_otro_viejo'][$i])) {
					$referenteViejo['vinculo_otro'] = $data['vinculo_otro_viejo'][$i];
				}
				$referenteViejo['referenteContacto'] = $data['referenteContacto_viejo'][$i];
				$referenteViejo['user_id'] = $data['user_id'];


				$actualizoReferente = $referenteCargado->update($referenteViejo);
				
				$referenteId[] = $referente->id;
			}
		}

		if ($cantidadReferentesNuevos) {
			for ($i = 0; $i < $cantidadReferentesNuevos ; $i++) { 

				$referenteNuevo['nombre_apellido'] = $data['nombre_apellido'][$i];
				$referenteNuevo['edad'] = $data['edad'][$i];
				$referenteNuevo['vinculo_id'] = $data['vinculo_id'][$i];
				if (isset($data['vinculo_otro'][$i])) {
					$referenteNuevo['vinculo_otro'] = $data['vinculo_otro'][$i];
				}
				$referenteNuevo['referenteContacto'] = $data['referenteContacto'][$i];
				$referenteNuevo['user_id'] = $data['user_id'];

				$guardoReferente = \App\FormC\Referente::create($referenteNuevo);

				$referenteId[] = $guardoReferente->id;

			}
		}

		//CAMBIOS
		if ($data['otraspersonas_id'] == 2 || $data['otraspersonas_id'] == 3) {
			// dd(count($referentes));
			foreach ($referentes as $referente) {

				$borroReferente = DB::table('referentes')->where('referentes.id', '=', $referente->id)->update(['updated_at' => $fecha_hoy, 'deleted_at' => $fecha_hoy]);
				$borroTablaPivot = DB::table('cformulario_referente')->where('cformulario_referente.referente_id', '=', $referente->id)->update(['updated_at' => $fecha_hoy, 'deleted_at' => $fecha_hoy]);
			}
		}
		//fin cambios subir 22/02

		//fin nuevo

		$cFormulario->update($data);

		//de esta manera lo que hago es guardar los referentes nuevos y mantener los viejos
		// $guardoRelacion = $cFormulario->convivientes()->sync($convivienteId, false);
		if (count($referenteId) !== 0) {
			$guardoRelacion = $cFormulario->referentes()->sync($referenteId);
		}

		return redirect('formularios/buscador');	
	}

	// public function destroyC($id)
	// {
	// 	$fecha_hoy = Carbon::now();

	// 	$Cformulario = \App\FormC\Cformulario::find($id);

	// 	$carpetaFormC = \App\Carpetas\Numerocarpeta::where('cformulario_id', '=', $id);

	// 	// if ($carpetaFormC->value('aformulario_id') == null && $carpetaFormC->value('bformulario_id') == null && $carpetaFormC->value('dformulario_id') == null && $carpetaFormC->value('fformulario_id') == null && $carpetaFormC->value('gformulario_id') == null) {
			
	// 		$carpetaFormC->update([ 'deleted_at' => $fecha_hoy]);

	// 	// }elseif ($carpetaFormC->value('aformulario_id') !== null || $carpetaFormC->value('bformulario_id') !== null || $carpetaFormC->value('dformulario_id') !== null || $carpetaFormC->value('fformulario_id') !== null || $carpetaFormC->value('gformulario_id') !== null) {

	// 	// 	$carpetaFormC->update(['cformulario_id' => null]);

	// 	// }

	// 	// $Cformulario->delete();

    // 	session()->flash('message', 'El formulario se eliminó con éxito.');

    // 	return redirect('formularios/buscador');	
	// }

	public function createD($idCarpeta,$idFormulario=null)
	{
		$userId = auth()->user()->id;
		// $numeroCarpeta = DB::table('aformularios')
		// 									->WHERE('user_id', '=', $userId)
		// 									->WHERE('deleted_at', '=', null)
		// 									->ORDERBY('updated_at', 'desc')
		// 									->first()
		// 									->datos_numero_carpeta;
		$numeroCarpeta = DB::table('numerocarpetas')
												  ->WHERE('user_id', '=', $userId)
												  ->WHERE('deleted_at', '=', null)
												  ->WHERE('id','=',$idCarpeta)
												  ->first()
												  ->numeroCarpeta; 
		// $todoFormA = DB::table('aformularios')
		// 									->WHERE('user_id', '=', $userId)
		// 									->ORDERBY('updated_at', 'desc')
		// 									->get();

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

		$carpetas = \App\Carpetas\Numerocarpeta::all();


		return view('formularios.formularioD', ['carpetas' => $carpetas,
												// 'todoFormA' => $todoFormA,
												'numeroCarpeta' => $numeroCarpeta,
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
												'idCarpeta' => $idCarpeta
											]);
	}

	public function insertD()
	{
		//funciona todo 10 puntos
		$userId = auth()->user()->id;
			// dd($userId);
			// var_dump(request()->get('textil_id'));
			// exit;
		request()->validate(
			[
				// select D1 calificacion general
				'calificaciongeneral_id' => 'required | numeric | min:0 | max:8',
				// input oculta "cual?" que se desoculta si D1 es id 8
				'calificaciongeneral_otra' => [new RequiredConditional(request()->get('calificaciongeneral_id'),array('8'),0,255,'Para ingresar una nueva calificaci&oacute;n debe seleccionar otro',true)],
				// select D2 calificacion especifica
				'calificacionespecifica_id' => 'required | numeric | min:0 | max:22',
				// select D3 finalidad
				'finalidad_id' => 'required | numeric | min:0 | max:5',
				// input oculto "cual?" que se desoculta si D3 es id 5
				'finalidad_otra' => [new RequiredConditional(request()->get('finalidad_id'),array('5'),0,255,'Para ingresar una nueva finalidad debe seleccionar otro',true)],
				// select D4 actividad
				'actividad_id' => 'required | numeric | min:0 | max:6',
				// checkbox oculto D5Ia tipo de negocio se desoculta si D4 es id 1 o 2
				'rural_id' => [new RequiredCheckbox('Si ingres&oacute; Se desconoce no puede seleccionar otra opci&oacute;n', array('5'), 0, 6, false,request()->get('actividad_id'), true, array('1','2'))],
				// input oculto se "cual?" se desoculta si D5Ia se selecciona 6
				'rural_otra' => [new RequiredCheckbox('Se debe seleccionar Otro para ingresar un nuevo tipo de negocio', 6, 0, 255, true, request()->get('rural_id'))],
				// input oculto D5Ib domicilio se desoculta si D4 es id 1 o 2
				'domicilioVenta' => [new RequiredConditional(request()->get('actividad_id'),array('1','2'),0,255,'Para ingresar un domicilio debe seleccionar la actividad rural o manufacturaci&oacute;n',true)],
				// checkbox oculto D5II lugar se desoculta si D4 es id 3 o 4
				'privado_id' => [new RequiredCheckbox('Si ingres&oacute; Se desconoce no puede seleccionar otra opci&oacute;n', array('7'), 0, 8, false,request()->get('actividad_id'), true, array('3','4'))],
				// input oculto "cual?" se desoculta si D5II se selecciona id 8
				'privado_otra' => [new RequiredCheckbox('Se debe seleccionar Otro para ingresar un nuevo lugar', 8, 0, 255, true, request()->get('privado_id'))],
				// input oculto D5IIIa Nombre de marca se desoculta si D4 es id 5
				'marcaTextil' => [new RequiredConditional(request()->get('actividad_id'),array('5'),0,255,'Para ingresar una marca debe seleccionar porducci&oacute;n textil',true)],
				// checkbox oculto D5IIIb lugar se desoculta si D4 es id 5
				'textil_id' => [new RequiredCheckbox('Si ingres&oacute; Se desconoce no puede seleccionar otra opci&oacute;n', array('5'), 0, 7, false,request()->get('actividad_id'), true, array('5'))],
				// input oculto "cual?" se desoculta si D5IIIb se selecciona id 6
				'textil_otra' => [new RequiredCheckbox('Se debe seleccionar Otro para ingresar un nuevo lugar', 6, 0, 255, true, request()->get('textil_id'))],
				// input oculto "cual?" se desoculta si D4 es id 6
				'actividad_otra' => [new RequiredConditional(request()->get('actividad_id'),array('6'),0,255,'Para ingresar una nueva actividad debe seleccionar otro',true)],				
				// select D6 pais
				'paisCaptacion' => 'required',
				// select D7 provincia
				'provinciaCaptacion' => 'required',
				// select D8 ciudad
				'ciudadCaptacion' => 'required',
				// select D9 modo de contacto				
				'contactoexplotacion_id' => 'required | numeric | min:0 | max:7 ',
				// input oculto "cual?" se desoculta si D9 es id 6
				'contactoexplotacion_otro' => [new RequiredConditional(request()->get('contactoexplotacion_id'),array('6'),0,255,'Para ingresar un contacto debe seleccionar otro',true)],
				// select D10 viajo
				'viajo_id' => 'required | numeric | min:0 | max:4',
				// select oculto D10I acompañado se desoculta si D10 es id 2
				'acompanado_id' => [new RequiredConditional(request()->get('viajo_id'),array('2'),0,4,'Para ingresar un acompa&ntilde;ante debe seleccionar acompa&ntilde;o')],
				// select oculto D10II acompañante relacionado se desoculta si D10 es id 2
				'acompanadored_id' => [new RequiredConditional(request()->get('viajo_id'),array('2'),0,3,'Para ingresar un acompa&ntilde;ante debe seleccionar acompa&ntilde;o')],
				// select D11 pais
				'paisExplotacion' => 'required',
				// select D12 provincia
				'provinciaExplotacion' => 'required',
				// select D13 ciudad
				'ciudadExplotacion' => 'required',
				// input D14 domicilio
				'domicilio' => 'required',
				// select D15 reside lugar
				'residelugar_id' => 'required | numeric | min:0 | max:3',
				// select D16 engaño
				'engano_id' => 'required | numeric | min:0 | max:3',
				// select D17 otras personas
				'haypersona_id' => 'required | numeric | min:0 | max:3',
				// select D18 tipo victima
				'tipovictima_id' => 'required | numeric | min:0 | max:4',
				// input D19 tarea
				'tarea' => 'required',
				// input D20 horas ralizadas
				'horasTarea' => 'required',
				// select D21 frecuencia pago
				'frecuenciapago_id' => 'required | numeric | min:0 | max:5',
				// select D22 modalidad
				'modalidadpagos_id' => 'required | numeric | min:0 | max:6',
				// input D23 monto
				'montoPago' => 'required',
				// select D24 deuda
				'deuda_id' => 'required | numeric | min:0 | max:3',
				// checkbox oculto D24I motivo se desoculta si D24 es 1
				'motivodeuda_id' => [new RequiredCheckbox('Si ingres&oacute; Se desconoce no puede seleccionar otra opci&oacute;n', array('-1'), 0, 5, false,request()->get('deuda_id'), true, array('1'))],
				// input oculto "cual?" se desoculta si D24I se selecciona id 5
				'motivodeuda_otro' => [new RequiredCheckbox('Se debe seleccionar Otro para ingresar un nuevo motivo', 5, 0, 255, true, request()->get('motivodeuda_id'))],
				// select oculto D24II lugar se desoculta si D24 es 1
				'lugardeuda_id' => [new RequiredConditional(request()->get('deuda_id'),array('1'),0,3,'Para ingresar un lugar de deuda seleccionar si')], 
				// select D25 permanencia 
				'permanencia_id' => 'required | numeric | min:0 | max:6',
				// select D26 testigo
				'testigo_id' => 'required | numeric | min:0 | max:2',
				// input oculto D26 PNT se desoculta si D26 es id 1
				'coordinadorPTN' => [new RequiredConditional(request()->get('testigo_id'),array('1'),0,255,'Para ingresar este campo debe seleccionar si',true)],
				// input oculto D26 PNT otros se desoculta si D26 es id 1
				'coordinadorPTN_otro' => [new RequiredConditional(request()->get('testigo_id'),array('1'),0,255,'Para ingresar este campo debe seleccionar si',true)],
				// select D27 corriente
				'haycorriente_id' => 'required | numeric | min:0 | max:3',
				// select D28 gas
				'haygas_id' => 'required | numeric | min:0 | max:3',
				// checkbox D29 medidas de control
				'haymedida_id' => [new RequiredCheckbox('Si ingres&oacute; Se desconoce no puede seleccionar otra opci&oacute;n', array('5'), 0, 6)],
				// input oculto "cual?" se desoculta si D29 se selecciona 6
				'haymedidas_otro' => [new RequiredCheckbox('Se debe seleccionar Otro para ingresar un nuevo motivo', 6, 0, 255, true, request()->get('haymedida_id'))],
				// select D30 hacinamiento
				'hayhacinamiento_id' => 'required | numeric | min:0 | max:3',	
				// select D31 agua
				'hayagua_id' => 'required | numeric | min:0 | max:3',
				// select D32 baño
				'haybano_id' => 'required | numeric | min:0 | max:4',
				// select D33 cantidad baños
				'cuantosbano_id' => 'required | numeric | min:0 | max:3',
				// select D34 material
				'material_id' => 'required | numeric | min:0 | max:7',
				// input oculto "cual?" se desoculta si D34 id es 7
				'material_otro' => [new RequiredConditional(request()->get('material_id'),array('7'),0,255,'Para ingresar este campo debe seleccionar otro',true)],
				// select D35 elementos trabajo
				'elementotrabajo_id' => 'required | numeric | min:0 | max:3',
				// select D36 elementos trabajo proveedor 
				'elementoseguridad_id' => 'required | numeric | min:0 | max:3',
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
				'paisCaptacion.required' => 'Este campo es obligatorio',
				'provinciaCaptacion.required' => 'Este campo es obligatorio',
				'ciudadCaptacion.required' => 'Este campo es obligatorio',
				'paisExplotacion.required' => 'Este campo es obligatorio',
				'provinciaExplotacion.required' => 'Este campo es obligatorio',
				'ciudadExplotacion.required' => 'Este campo es obligatorio',
			]);


		$data = request()->all();

		$data['user_id'] = $userId;

		// dd($data);

		$guardoDformulario = \App\FormD\Dformulario::create($data);

		$carpeta = \App\Carpetas\Numerocarpeta::where('numeroCarpeta', '=', $data['numeroCarpeta'])->first();

		$idCarpeta = $carpeta->id;

		$numeroCarpeta = $carpeta->numeroCarpeta;

		$ultimoId = $guardoDformulario->id;
		$guardoNumeroCarpeta = \App\Carpetas\Numerocarpeta::where('numeroCarpeta', '=', $data['numeroCarpeta'])->update(['dformulario_id' => $ultimoId]);

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

		return redirect('formularios/F/'.$idCarpeta.'/'.$numeroCarpeta);
	}

	public function editD($idCarpeta,$idFormulario)
	{
		$userId = auth()->user()->id;
		// $numeroCarpeta = DB::table('aformularios')
		// 									->WHERE('user_id', '=', $userId)
		// 									->ORDERBY('updated_at')
		// 									->first()
		// 									->datos_numero_carpeta;
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
		$dFormulario = \App\FormD\Dformulario::find($idFormulario);
		
		//id de los formularios de una misma carpeta
			// $idFormA = \App\Carpetas\Numerocarpeta::where('user_id', '=', $userId)
			// 				->where('dformulario_id', '=', $id)
			// 				->value('aformulario_id');
			// $idFormB = \App\Carpetas\Numerocarpeta::where('user_id', '=', $userId)
			// 					->where('dformulario_id', '=', $id)
			// 					->value('bformulario_id');
			// $idFormC = \App\Carpetas\Numerocarpeta::where('user_id', '=', $userId)
			// 					->where('dformulario_id', '=', $id)
			// 					->value('cformulario_id');
			// $idFormD = \App\Carpetas\Numerocarpeta::where('user_id', '=', $userId)
			// 					->where('dformulario_id', '=', $id)
			// 					->value('dformulario_id');
			// $idFormE = \App\Carpetas\Numerocarpeta::where('user_id', '=', $userId)
			// 					->where('dformulario_id', '=', $id)
			// 					->value('eformulario_id');
			// $idFormF = \App\Carpetas\Numerocarpeta::where('user_id', '=', $userId)
			// 					->where('dformulario_id', '=', $id)
			// 					->value('fformulario_id');
			// $idFormG = \App\Carpetas\Numerocarpeta::where('user_id', '=', $userId)
			// 					->where('dformulario_id', '=', $id)
			// 					->value('gformulario_id');
			// $idFormA = \App\Carpetas\Numerocarpeta::where('user_id', '=', $userId)
			$idFormA = \App\Carpetas\Numerocarpeta::where('dformulario_id', '=', $idFormulario)
							// ->where('cformulario_id', '=', $id)
							->value('aformulario_id');
			// $idFormB = \App\Carpetas\Numerocarpeta::where('user_id', '=', $userId)
			$idFormB = \App\Carpetas\Numerocarpeta::where('dformulario_id', '=', $idFormulario)
								// ->where('cformulario_id', '=', $id)
								->value('bformulario_id');
			// $idFormC = \App\Carpetas\Numerocarpeta::where('user_id', '=', $userId)
			$idFormC = \App\Carpetas\Numerocarpeta::where('dformulario_id', '=', $idFormulario)
								// ->where('cformulario_id', '=', $id)
								->value('cformulario_id');
			// $idFormD = \App\Carpetas\Numerocarpeta::where('user_id', '=', $userId)
			$idFormD = \App\Carpetas\Numerocarpeta::where('dformulario_id', '=', $idFormulario)
								// ->where('cformulario_id', '=', $id)
								->value('dformulario_id');
			// $idFormE = \App\Carpetas\Numerocarpeta::where('user_id', '=', $userId)
			$idFormE = \App\Carpetas\Numerocarpeta::where('dformulario_id', '=', $idFormulario)
								// ->where('cformulario_id', '=', $id)
								->value('eformulario_id');
			// $idFormF = \App\Carpetas\Numerocarpeta::where('user_id', '=', $userId)
			$idFormF = \App\Carpetas\Numerocarpeta::where('dformulario_id', '=', $idFormulario)
								// ->where('cformulario_id', '=', $id)
								->value('fformulario_id');
			// $idFormG = \App\Carpetas\Numerocarpeta::where('user_id', '=', $userId)
			$idFormG = \App\Carpetas\Numerocarpeta::where('dformulario_id', '=', $idFormulario)
								// ->where('cformulario_id', '=', $id)
								->value('gformulario_id');
		//fin ids
			$usuarioCarpeta = \App\Carpetas\Numerocarpeta::WHERE('dformulario_id', '=', $idFormulario)->value('user_id');

		return view('formularios.editar.formularioD_edit', [
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
												'dFormulario' => $dFormulario,
												'idFormA' => $idFormA,
												'idFormB' => $idFormB,
												'idFormC' => $idFormC,
												'idFormD' => $idFormD,
												'idFormE' => $idFormE,
												'idFormF' => $idFormF,
												'idFormG' => $idFormG,
												'usuarioCarpeta' => $usuarioCarpeta,
												'idCarpeta' => $idCarpeta
											]);
	}

	public function updateD($idCarpeta,$idFormulario)
	{
		$userId = auth()->user()->id;

		request()->validate(
			[
				// select D1 calificacion general
				'calificaciongeneral_id' => 'required | numeric | min:0 | max:8',
				// input oculta "cual?" que se desoculta si D1 es id 8
				'calificaciongeneral_otra' => [new RequiredConditional(request()->get('calificaciongeneral_id'),array('8'),0,255,'Para ingresar una nueva calificaci&oacute;n debe seleccionar otro',true)],
				// select D2 calificacion especifica
				'calificacionespecifica_id' => 'required | numeric | min:0 | max:22',
				// select D3 finalidad
				'finalidad_id' => 'required | numeric | min:0 | max:5',
				// input oculto "cual?" que se desoculta si D3 es id 5
				'finalidad_otra' => [new RequiredConditional(request()->get('finalidad_id'),array('5'),0,255,'Para ingresar una nueva finalidad debe seleccionar otro',true)],
				// select D4 actividad
				'actividad_id' => 'required | numeric | min:0 | max:6',
				// checkbox oculto D5Ia tipo de negocio se desoculta si D4 es id 1 o 2
				'rural_id' => [new RequiredCheckbox('Si ingres&oacute; Se desconoce no puede seleccionar otra opci&oacute;n', array('5'), 0, 6, false,request()->get('actividad_id'), true, array('1','2'))],
				// input oculto se "cual?" se desoculta si D5Ia se selecciona 6
				'rural_otra' => [new RequiredCheckbox('Se debe seleccionar Otro para ingresar un nuevo tipo de negocio', 6, 0, 255, true, request()->get('rural_id'))],
				// input oculto D5Ib domicilio se desoculta si D4 es id 1 o 2
				'domicilioVenta' => [new RequiredConditional(request()->get('actividad_id'),array('1','2'),0,255,'Para ingresar un domicilio debe seleccionar la actividad rural o manufacturaci&oacute;n',true)],
				// checkbox oculto D5II lugar se desoculta si D4 es id 3 o 4
				'privado_id' => [new RequiredCheckbox('Si ingres&oacute; Se desconoce no puede seleccionar otra opci&oacute;n', array('7'), 0, 8, false,request()->get('actividad_id'), true, array('3','4'))],
				// input oculto "cual?" se desoculta si D5II se selecciona id 8
				'privado_otra' => [new RequiredCheckbox('Se debe seleccionar Otro para ingresar un nuevo lugar', 8, 0, 255, true, request()->get('privado_id'))],
				// input oculto D5IIIa Nombre de marca se desoculta si D4 es id 5
				'marcaTextil' => [new RequiredConditional(request()->get('actividad_id'),array('5'),0,255,'Para ingresar una marca debe seleccionar porducci&oacute;n textil',true)],
				// checkbox oculto D5IIIb lugar se desoculta si D4 es id 5
				'textil_id' => [new RequiredCheckbox('Si ingres&oacute; Se desconoce no puede seleccionar otra opci&oacute;n', array('5'), 0, 7, false,request()->get('actividad_id'), true, array('5'))],
				// input oculto "cual?" se desoculta si D5IIIb se selecciona id 6
				'textil_otra' => [new RequiredCheckbox('Se debe seleccionar Otro para ingresar un nuevo lugar', 6, 0, 255, true, request()->get('textil_id'))],
				// input oculto "cual?" se desoculta si D4 es id 6
				'actividad_otra' => [new RequiredConditional(request()->get('actividad_id'),array('6'),0,255,'Para ingresar una nueva actividad debe seleccionar otro',true)],				
				// select D6 pais
				'paisCaptacion' => 'required',
				// select D7 provincia
				'provinciaCaptacion' => 'required',
				// select D8 ciudad
				'ciudadCaptacion' => 'required',
				// select D9 modo de contacto				
				'contactoexplotacion_id' => 'required | numeric | min:0 | max:7 ',
				// input oculto "cual?" se desoculta si D9 es id 6
				'contactoexplotacion_otro' => [new RequiredConditional(request()->get('contactoexplotacion_id'),array('6'),0,255,'Para ingresar un contacto debe seleccionar otro',true)],
				// select D10 viajo
				'viajo_id' => 'required | numeric | min:0 | max:4',
				// select oculto D10I acompañado se desoculta si D10 es id 2
				'acompanado_id' => [new RequiredConditional(request()->get('viajo_id'),array('2'),0,4,'Para ingresar un acompa&ntilde;ante debe seleccionar acompa&ntilde;o')],
				// select oculto D10II acompañante relacionado se desoculta si D10 es id 2
				'acompanadored_id' => [new RequiredConditional(request()->get('viajo_id'),array('2'),0,3,'Para ingresar un acompa&ntilde;ante debe seleccionar acompa&ntilde;o')],
				// select D11 pais
				'paisExplotacion' => 'required',
				// select D12 provincia
				'provinciaExplotacion' => 'required',
				// select D13 ciudad
				'ciudadExplotacion' => 'required',
				// input D14 domicilio
				'domicilio' => 'required',
				// select D15 reside lugar
				'residelugar_id' => 'required | numeric | min:0 | max:3',
				// select D16 engaño
				'engano_id' => 'required | numeric | min:0 | max:3',
				// select D17 otras personas
				'haypersona_id' => 'required | numeric | min:0 | max:3',
				// select D18 tipo victima
				'tipovictima_id' => 'required | numeric | min:0 | max:4',
				// input D19 tarea
				'tarea' => 'required',
				// input D20 horas ralizadas
				'horasTarea' => 'required',
				// select D21 frecuencia pago
				'frecuenciapago_id' => 'required | numeric | min:0 | max:5',
				// select D22 modalidad
				'modalidadpagos_id' => 'required | numeric | min:0 | max:6',
				// input D23 monto
				'montoPago' => 'required',
				// select D24 deuda
				'deuda_id' => 'required | numeric | min:0 | max:3',
				// checkbox oculto D24I motivo se desoculta si D24 es 1
				'motivodeuda_id' => [new RequiredCheckbox('Si ingres&oacute; Se desconoce no puede seleccionar otra opci&oacute;n', array('-1'), 0, 5, false,request()->get('deuda_id'), true, array('1'))],
				// input oculto "cual?" se desoculta si D24I se selecciona id 5
				'motivodeuda_otro' => [new RequiredCheckbox('Se debe seleccionar Otro para ingresar un nuevo motivo', 5, 0, 255, true, request()->get('motivodeuda_id'))],
				// select oculto D24II lugar se desoculta si D24 es 1
				'lugardeuda_id' => [new RequiredConditional(request()->get('deuda_id'),array('1'),0,3,'Para ingresar un lugar de deuda seleccionar si')], 
				// select D25 permanencia 
				'permanencia_id' => 'required | numeric | min:0 | max:6',
				// select D26 testigo
				'testigo_id' => 'required | numeric | min:0 | max:2',
				// input oculto D26 PNT se desoculta si D26 es id 1
				'coordinadorPTN' => [new RequiredConditional(request()->get('testigo_id'),array('1'),0,255,'Para ingresar este campo debe seleccionar si',true)],
				// input oculto D26 PNT otros se desoculta si D26 es id 1
				'coordinadorPTN_otro' => [new RequiredConditional(request()->get('testigo_id'),array('1'),0,255,'Para ingresar este campo debe seleccionar si',true)],
				// select D27 corriente
				'haycorriente_id' => 'required | numeric | min:0 | max:3',
				// select D28 gas
				'haygas_id' => 'required | numeric | min:0 | max:3',
				// checkbox D29 medidas de control
				'haymedida_id' => [new RequiredCheckbox('Si ingres&oacute; Se desconoce no puede seleccionar otra opci&oacute;n', array('5'), 0, 6)],
				// input oculto "cual?" se desoculta si D29 se selecciona 6
				'haymedidas_otro' => [new RequiredCheckbox('Se debe seleccionar Otro para ingresar un nuevo motivo', 6, 0, 255, true, request()->get('haymedida_id'))],
				// select D30 hacinamiento
				'hayhacinamiento_id' => 'required | numeric | min:0 | max:3',	
				// select D31 agua
				'hayagua_id' => 'required | numeric | min:0 | max:3',
				// select D32 baño
				'haybano_id' => 'required | numeric | min:0 | max:4',
				// select D33 cantidad baños
				'cuantosbano_id' => 'required | numeric | min:0 | max:3',
				// select D34 material
				'material_id' => 'required | numeric | min:0 | max:7',
				// input oculto "cual?" se desoculta si D34 id es 7
				'material_otro' => [new RequiredConditional(request()->get('material_id'),array('7'),0,255,'Para ingresar este campo debe seleccionar otro',true)],
				// select D35 elementos trabajo
				'elementotrabajo_id' => 'required | numeric | min:0 | max:3',
				// select D36 elementos trabajo proveedor 
				'elementoseguridad_id' => 'required | numeric | min:0 | max:3',
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
				'paisCaptacion.required' => 'Tenes que completar esta campo, si no lo modificaste ingresa el valor anterior',
				'provinciaCaptacion.required' => 'Tenes que completar esta campo, si no lo modificaste ingresa el valor anterior',
				'ciudadCaptacion.required' => 'Tenes que completar esta campo, si no lo modificaste ingresa el valor anterior',
				'paisExplotacion.required' => 'Tenes que completar esta campo, si no lo modificaste ingresa el valor anterior',
				'provinciaExplotacion.required' => 'Tenes que completar esta campo, si no lo modificaste ingresa el valor anterior',
				'ciudadExplotacion.required' => 'Tenes que completar esta campo, si no lo modificaste ingresa el valor anterior',
			]);

		$data = request()->all();

		$data['user_id'] = $userId;

		$formularioD = \App\FormD\Dformulario::find($idFormulario);

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

		return redirect('formularios/buscador');
	}

	public function destroyD($id)
	{
		$fecha_hoy = Carbon::now();

		$Dformulario = \App\FormD\Dformulario::find($id);

		$carpetaFormD = \App\Carpetas\Numerocarpeta::where('dformulario_id', '=', $id);

		// if ($carpetaFormD->value('aformulario_id') == null && $carpetaFormD->value('bformulario_id') == null && $carpetaFormD->value('cformulario_id') == null && $carpetaFormD->value('fformulario_id') == null && $carpetaFormD->value('gformulario_id') == null) {
			
			$carpetaFormD->update(['deleted_at' => $fecha_hoy]);

		// }elseif ($carpetaFormD->value('aformulario_id') !== null || $carpetaFormD->value('bformulario_id') !== null || $carpetaFormD->value('cformulario_id') !== null || $carpetaFormD->value('fformulario_id') !== null || $carpetaFormD->value('gformulario_id') !== null) {

		// 	$carpetaFormD->update(['dformulario_id' => null]);

		// }

		// $Dformulario->delete();

    	session()->flash('message', 'El formulario se eliminó con éxito.');

    	return redirect('formularios/buscador');	
	}

	//QUEDA SUSPENDIDO EL EJE E Y EL EJE F PARA A SER EL NUEVO EJE E

		// public function createE()
		// {
		// 	$userId = auth()->user()->id;
		// 	$numeroCarpeta = DB::table('aformularios')
		// 										->WHERE('user_id', '=', $userId)
		// 										->ORDERBY('updated_at', 'desc')
		// 										->first()
		// 										->datos_numero_carpeta;
		// 	// $todoFormA = DB::table('aformularios')
		// 	// 									->WHERE('user_id', '=', $userId)
		// 	// 									->ORDERBY('updated_at', 'desc')
		// 	// 									->get();
		// 	$documentos = \App\FormE\Edocumento::all();
		// 	$generos = \App\FormB\Genero::all();
		// 	$vinculaciones = \App\FormE\Vinculacion::all();
		// 	$roles = \App\FormE\Roldelito::all();

		// 	$carpetas = \App\Carpetas\Numerocarpeta::all();

		// 	return view('formularios.formularioE', 
		// 											['carpetas' => $carpetas,
		// 											// 'todoFormA' => $todoFormA,
		// 											'numeroCarpeta' => $numeroCarpeta,
		// 										    'documentos' => $documentos,
		// 										    'generos' => $generos,
		// 										    'vinculaciones' => $vinculaciones,
		// 										    'roles' => $roles]);
		// }

		// public function insertE()
		// {
		// 	$userId = auth()->user()->id;
			
		// 	request()->validate(
		// 		[
		// 			'nombreApellido' => 'required',
		// 			'edocumentos_id' => 'required',
		// 			'documentoCual' => 'required_if:edocumentos_id,==,7',
		// 			'numeroDocumento' => 'required',
		// 			'edad' => 'required',
		// 			'genero_id' => 'required',
		// 			'generoCual' => 'required_if:genero_id,==,5',
		// 			'vinculacion_id' => 'required',
		// 			'vinculacionCual' => 'required_if:vinculacion_id,==,6',
		// 			'rolDelito_id' => 'required'
		// 		],
		// 		[
		// 			'nombreApellido.required' => 'Este campo es obligatorio',
		// 			'edocumentos_id.required' => 'Este campo es obligatorio',
		// 			'documentoCual.required_if' => 'Este campo es obligatorio',
		// 			'numeroDocumento.required' => 'Este campo es obligatorio',
		// 			'edad.required' => 'Este campo es obligatorio',
		// 			'genero_id.required' => 'Este campo es obligatorio',
		// 			'generoCual.required_if' => 'Este campo es obligatorio',
		// 			'vinculacion_id.required' => 'Este campo es obligatorio',
		// 			'vinculacionCual.required_if' => 'Este campo es obligatorio',
		// 			'rolDelito_id.required' => 'Este campo es obligatorio'
		// 		]);

		// 	$data = request()->all();

		// 	$data['user_id'] = $userId;

		// 	// dd($data);

		// 	$guardoEformulario = \App\FormE\Eformulario::create($data);

		// 	$ultimoId = $guardoEformulario->id;
		// 	$guardoNumeroCarpeta = \App\Carpetas\Numerocarpeta::where('numeroCarpeta', '=', $data['numeroCarpeta'])->update(['eformulario_id' => $ultimoId]);

		// 	$eFormulario = \App\FormE\Eformulario::find($ultimoId);

		// 	$eFormulario->roldelitos()->sync($data['rolDelito_id']);

		// 	return redirect('formularios/F');
		// }

		// public function editE($id)
		// {
		// 	$userId = auth()->user()->id;
		// 	$documentos = \App\FormE\Edocumento::all();
		// 	$generos = \App\FormB\Genero::all();
		// 	$vinculaciones = \App\FormE\Vinculacion::all();
		// 	$roles = \App\FormE\Roldelito::all();
		// 	$eFormulario = \App\FormE\Eformulario::find($id);

		// 	//id de los formularios de una misma carpeta
		// 		$idFormA = \App\Carpetas\Numerocarpeta::where('user_id', '=', $userId)
		// 						->where('eformulario_id', '=', $id)
		// 						->value('aformulario_id');
		// 		$idFormB = \App\Carpetas\Numerocarpeta::where('user_id', '=', $userId)
		// 							->where('eformulario_id', '=', $id)
		// 							->value('bformulario_id');
		// 		$idFormC = \App\Carpetas\Numerocarpeta::where('user_id', '=', $userId)
		// 							->where('eformulario_id', '=', $id)
		// 							->value('cformulario_id');
		// 		$idFormD = \App\Carpetas\Numerocarpeta::where('user_id', '=', $userId)
		// 							->where('eformulario_id', '=', $id)
		// 							->value('dformulario_id');
		// 		$idFormE = \App\Carpetas\Numerocarpeta::where('user_id', '=', $userId)
		// 							->where('eformulario_id', '=', $id)
		// 							->value('eformulario_id');
		// 		$idFormF = \App\Carpetas\Numerocarpeta::where('user_id', '=', $userId)
		// 							->where('eformulario_id', '=', $id)
		// 							->value('fformulario_id');
		// 		$idFormG = \App\Carpetas\Numerocarpeta::where('user_id', '=', $userId)
		// 							->where('eformulario_id', '=', $id)
		// 							->value('gformulario_id');
		// 	//fin ids

		// 	return view('formularios.editar.formularioE_edit', 
		// 														[
		// 													    'documentos' => $documentos,
		// 													    'generos' => $generos,
		// 													    'vinculaciones' => $vinculaciones,
		// 													    'roles' => $roles,
		// 														'eFormulario' => $eFormulario,
		// 														'idFormA' => $idFormA,
		// 														'idFormB' => $idFormB,
		// 														'idFormC' => $idFormC,
		// 														'idFormD' => $idFormD,
		// 														'idFormE' => $idFormE,
		// 														'idFormF' => $idFormF,
		// 														'idFormG' => $idFormG
		// 													]);
		// }

		// public function updateE($id)
		// {
		// 	$userId = auth()->user()->id;
			
		// 	request()->validate(
		// 		[
		// 			'nombreApellido' => 'required',
		// 			'edocumentos_id' => 'required',
		// 			'documentoCual' => 'required_if:edocumentos_id,==,7',
		// 			'numeroDocumento' => 'required',
		// 			'edad' => 'required',
		// 			'genero_id' => 'required',
		// 			'generoCual' => 'required_if:genero_id,==,5',
		// 			'vinculacion_id' => 'required',
		// 			'vinculacionCual' => 'required_if:vinculacion_id,==,6',
		// 			'rolDelito_id' => 'required'
		// 		],
		// 		[
		// 			'nombreApellido.required' => 'Este campo es obligatorio',
		// 			'edocumentos_id.required' => 'Este campo es obligatorio',
		// 			'documentoCual.required_if' => 'Este campo es obligatorio',
		// 			'numeroDocumento.required' => 'Este campo es obligatorio',
		// 			'edad.required' => 'Este campo es obligatorio',
		// 			'genero_id.required' => 'Este campo es obligatorio',
		// 			'generoCual.required_if' => 'Este campo es obligatorio',
		// 			'vinculacion_id.required' => 'Este campo es obligatorio',
		// 			'vinculacionCual.required_if' => 'Este campo es obligatorio',
		// 			'rolDelito_id.required' => 'Este campo es obligatorio'
		// 		]);

		// 	$data = request()->all();

		// 	$data['user_id'] = $userId;

		// 	$formularioE = \App\FormE\Eformulario::find($id);

		// 	$formularioE->update($data);

		// 	$formularioE->roldelitos()->sync($data['rolDelito_id']);

		// 	return redirect('formularios/buscador');
		// }

		// public function destroyE($id)
		// {
		// 	$Eformulario = \App\FormE\Eformulario::find($id);

		// 	$Eformulario->delete();

	 //    	session()->flash('message', 'El formulario se eliminó con éxito.');

	 //    	return redirect('formularios');	
		// }

	//NUEVO EJE E

	public function createF($idCarpeta,$idFormulario=null)
	{
		$userId = auth()->user()->id;
		$aFormularios = \App\FormA\Aformulario::all();
		// $numeroCarpeta = DB::table('aformularios')
		// 									->WHERE('user_id', '=', $userId)
		// 									->ORDERBY('updated_at', 'desc')
		// 									->first()
		// 									->datos_numero_carpeta;
		// $numeroCarpeta = DB::table('aformularios')
		// 									->WHERE('user_id', '=', $userId)
		// 									->WHERE('deleted_at', '=', null)
		// 									->ORDERBY('updated_at', 'desc')
		// 									->first()
		// 									->datos_numero_carpeta;
		$numeroCarpeta= DB::table('numerocarpetas')
												  ->WHERE('user_id', '=', $userId)
												  ->WHERE('deleted_at', '=', null)
												  ->WHERE('id','=',$idCarpeta)
												  ->first()
												  ->numeroCarpeta; 
		$todoFormA = DB::table('aformularios')
											->WHERE('user_id', '=', $userId)
											->ORDERBY('updated_at', 'desc')
											->get();
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
		$datosIntervinieronOrganismos = \App\FormF\Intervinieronorganismo::all();
		$datosIntervinieronOrganismosActualmente = \App\FormF\Intervinieronorganismosactualmente::all();

		$carpetas = \App\Carpetas\Numerocarpeta::all();


		return view('formularios.formularioF', ['todoFormA' => $todoFormA,
												'carpetas' => $carpetas,
												'numeroCarpeta' => $numeroCarpeta,
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
												'idCarpeta' => $idCarpeta,
												'datosIntervinieronOrganismos' => $datosIntervinieronOrganismos,
												'datosIntervinieronOrganismosActualmente' => $datosIntervinieronOrganismosActualmente
											]);
	}

	public function insertF()
	{
		request()->validate(
			[
				'intervinieronOrganismos_id' => 'required',
				'intervinieronOrganismosActualmente_id' => 'required',
				// 'intervinieronOrganismos_id' => 'required | numeric | min:0 | max:3',
				// 'orgjudicials_id.*' => [new RequiredCheckbox('Si ingres&oacute; Se desconoce no puede seleccionar otra opci&oacute;n', array('-1'), 0, 2, false,request()->get('intervinieronOrganismos_id'), true, array('3'))],
				// 'orgprognacionals_id.*' => [new RequiredCheckbox('Si ingres&oacute; Se desconoce no puede seleccionar otra opci&oacute;n', array('-1'), 0, 9, false,request()->get('intervinieronOrganismos_id'), true, array('3'))],
				// 'orgprognacionalOtro.*' => [new RequiredCheckbox('Se debe seleccionar intervinieron mas organismos', 3, 0, 255, true, request()->get('orgprognacionals_id.*'))],
				// 'orgProgProvinciales.*' => [new RequiredConditional(request()->get('intervinieronOrganismos_id'),array('3'),0,255,'Para ingresar un nuevo organismo debe seleccionar intervinieron mas organismos',true)],
				// 'orgProgMunicipales.*' => [new RequiredConditional(request()->get('intervinieronOrganismos_id'),array('3'),0,255,'Para ingresar un nuevo organismo debe seleccionar intervinieron mas organismos',true)],
				// 'policias_id.*' => [new RequiredCheckbox('Si ingres&oacute; Se desconoce no puede seleccionar otra opci&oacute;n', array('-1'), 0, 5, false,request()->get('intervinieronOrganismos_id'), true, array('3'))],
				// 'orgSocCivil.*' => [new RequiredCheckbox('Se debe seleccionar intervinieron mas organismos', 3, 0, 255, true, request()->get('orgprognacionals_id'))],
				// 'asistencia_id.*' => 'required | numeric | min:0 | max:3',
				// 'socioeconomic_id.0' => [new RequiredCheckbox('Si ingres&oacute; Se desconoce no puede seleccionar otra opci&oacute;n', array('-1'), 0, 7, false,request()->get('intervinieronOrganismosActualmente_id'), true, array('3'))],
				// 'socioeconomicaCual.0' => [new RequiredCheckbox('Se debe seleccionar otro', 7, 0, 255, true, request()->get('socioeconomic_id'))],
				// 'intervinieronOrganismosActualmente_id' => 'required | numeric | min:0 | max:3',
				// 'orgjudicialactualmentes_id.*' => [new RequiredCheckbox('Si ingres&oacute; Se desconoce no puede seleccionar otra opci&oacute;n', array('-1'), 0, 2, false,request()->get('intervinieronOrganismosActualmente_id'), true, array('3'))],
				// 'orgprognacionalactualmente_id.*' => [new RequiredCheckbox('Si ingres&oacute; Se desconoce no puede seleccionar otra opci&oacute;n', array('-1'), 0, 9, false,request()->get('intervinieronOrganismosActualmente_id'), true, array('3'))],
				// 'orgprognacionalActualmenteOtro.*' => [new RequiredCheckbox('Se debe seleccionar intervinieron mas organismos', 3, 0, 255, true, request()->get('intervinieronOrganismosActualmente_id.*'))],
				// 'orgProgProvincialesActualmente.*' => [new RequiredConditional(request()->get('intervinieronOrganismosActualmente_id'),array('3'),0,255,'Para ingresar un nuevo organismo debe seleccionar intervinieron mas organismos',true)],
				// 'orgProgMunicipalesActualmente.*' => [new RequiredConditional(request()->get('intervinieronOrganismosActualmente_id'),array('3'),0,255,'Para ingresar un nuevo organismo debe seleccionar intervinieron mas organismos',true)],
				// 'policiaactualmentes_id.*' => [new RequiredCheckbox('Si ingres&oacute; Se desconoce no puede seleccionar otra opci&oacute;n', array('-1'), 0, 5, false,request()->get('intervinieronOrganismosActualmente_id'), true, array('3'))],
				// 'orgSocCivilActualmente.*' => [new RequiredCheckbox('Se debe seleccionar intervinieron mas organismos', 3, 0, 255, true, request()->get('intervinieronOrganismosActualmente_id.*'))],

			],
			[
				'intervinieronOrganismos_id.required' => 'Este campo es obligatorio',
				'intervinieronOrganismosActualmente_id.required' => 'Este campo es obligatorio',
			]);

		$userId = auth()->user()->id;

		$data = request()->all();

		$data['user_id'] = $userId;
		// var_dump($data['user_id']);

		$guardoFormularioF = \App\FormF\Fformulario::create($data);

		$carpeta = \App\Carpetas\Numerocarpeta::where('numeroCarpeta', '=', $data['numeroCarpeta'])->first();

		$idCarpeta = $carpeta->id;

		$numeroCarpeta = $carpeta->numeroCarpeta;

		$idFormularioF = $guardoFormularioF->id;

		$guardoNumeroCarpeta = \App\Carpetas\Numerocarpeta::where('numeroCarpeta', '=', $data['numeroCarpeta'])->update(['fformulario_id' => $idFormularioF]);

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

		return redirect('formularios/G/'.$idCarpeta.'/'.$numeroCarpeta);	
	}

	public function editF($idCarpeta,$idFormulario)
	{
		$userId = auth()->user()->id;
		$aFormularios = \App\FormA\Aformulario::all();
		// $numeroCarpeta = DB::table('aformularios')
		// 									->WHERE('user_id', '=', $userId)
		// 									->ORDERBY('updated_at', 'desc')
		// 									->first()
		// 									->datos_numero_carpeta;
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
		$datosIntervinieronOrganismos = \App\FormF\Intervinieronorganismo::all();
		$datosIntervinieronOrganismosActualmente = \App\FormF\Intervinieronorganismosactualmente::all();
		// ---necesarios para el edit
		$formularioF = \App\FormF\Fformulario::find($idFormulario);
		$orgProgNacionalOtro = $formularioF->orgprognacionalotros;
		$orgProgProvincial = $formularioF->orgprogprovincials;
		$orgProgMunipal = $formularioF->orgprogmunicipals;
		$orgSocCivil = $formularioF->orgsoccivils;
		$orgProgNacionalActualmenteOtro = $formularioF->orgprognacionalactualmenteotros;
		$orgProgProvincialesAlactualmente = $formularioF->orgprogprovincialesactualmentes;
		$orgProgMunipalesActualmente = $formularioF->orgprogmunicipalesactualmentes;
		$orgSocCivilActualmente = $formularioF->orgsoccivilactualmentes;

		//id de los formularios de una misma carpeta
			// $idFormA = \App\Carpetas\Numerocarpeta::where('user_id', '=', $userId)
			// 				->where('fformulario_id', '=', $id)
			// 				->value('aformulario_id');
			// $idFormB = \App\Carpetas\Numerocarpeta::where('user_id', '=', $userId)
			// 					->where('fformulario_id', '=', $id)
			// 					->value('bformulario_id');
			// $idFormC = \App\Carpetas\Numerocarpeta::where('user_id', '=', $userId)
			// 					->where('fformulario_id', '=', $id)
			// 					->value('cformulario_id');
			// $idFormD = \App\Carpetas\Numerocarpeta::where('user_id', '=', $userId)
			// 					->where('fformulario_id', '=', $id)
			// 					->value('dformulario_id');
			// $idFormE = \App\Carpetas\Numerocarpeta::where('user_id', '=', $userId)
			// 					->where('fformulario_id', '=', $id)
			// 					->value('eformulario_id');
			// $idFormF = \App\Carpetas\Numerocarpeta::where('user_id', '=', $userId)
			// 					->where('fformulario_id', '=', $id)
			// 					->value('fformulario_id');
			// $idFormG = \App\Carpetas\Numerocarpeta::where('user_id', '=', $userId)
			// 					->where('fformulario_id', '=', $id)
			// 					->value('gformulario_id');
			// $idFormA = \App\Carpetas\Numerocarpeta::where('user_id', '=', $userId)
			$idFormA = \App\Carpetas\Numerocarpeta::where('fformulario_id', '=', $idFormulario)
							// ->where('cformulario_id', '=', $id)
							->value('aformulario_id');
			// $idFormB = \App\Carpetas\Numerocarpeta::where('user_id', '=', $userId)
			$idFormB = \App\Carpetas\Numerocarpeta::where('fformulario_id', '=', $idFormulario)
								// ->where('cformulario_id', '=', $id)
								->value('bformulario_id');
			// $idFormC = \App\Carpetas\Numerocarpeta::where('user_id', '=', $userId)
			$idFormC = \App\Carpetas\Numerocarpeta::where('fformulario_id', '=', $idFormulario)
								// ->where('cformulario_id', '=', $id)
								->value('cformulario_id');
			// $idFormD = \App\Carpetas\Numerocarpeta::where('user_id', '=', $userId)
			$idFormD = \App\Carpetas\Numerocarpeta::where('fformulario_id', '=', $idFormulario)
								// ->where('cformulario_id', '=', $id)
								->value('dformulario_id');
			// $idFormE = \App\Carpetas\Numerocarpeta::where('user_id', '=', $userId)
			$idFormE = \App\Carpetas\Numerocarpeta::where('fformulario_id', '=', $idFormulario)
								// ->where('cformulario_id', '=', $id)
								->value('eformulario_id');
			// $idFormF = \App\Carpetas\Numerocarpeta::where('user_id', '=', $userId)
			$idFormF = \App\Carpetas\Numerocarpeta::where('fformulario_id', '=', $idFormulario)
								// ->where('cformulario_id', '=', $id)
								->value('fformulario_id');
			// $idFormG = \App\Carpetas\Numerocarpeta::where('user_id', '=', $userId)
			$idFormG = \App\Carpetas\Numerocarpeta::where('fformulario_id', '=', $idFormulario)
								// ->where('cformulario_id', '=', $id)
								->value('gformulario_id');
		//fin ids
			$usuarioCarpeta = \App\Carpetas\Numerocarpeta::WHERE('fformulario_id', '=', $idFormulario)->value('user_id');

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
												'orgSocCivilActualmente' => $orgSocCivilActualmente,
												'idFormA' => $idFormA,
												'idFormB' => $idFormB,
												'idFormC' => $idFormC,
												'idFormD' => $idFormD,
												'idFormE' => $idFormE,
												'idFormF' => $idFormF,
												'idFormG' => $idFormG,
												'usuarioCarpeta' => $usuarioCarpeta,
												'idCarpeta' => $idCarpeta,
												'datosIntervinieronOrganismos' => $datosIntervinieronOrganismos,
												'datosIntervinieronOrganismosActualmente' => $datosIntervinieronOrganismosActualmente
											]);
	}

	public function updateF($idCarpeta,$idFormulario)
	{
		$fecha_hoy = Carbon::now();

		request()->validate(
			[
				'intervinieronOrganismos_id' => 'required',
				'intervinieronOrganismosActualmente_id' => 'required',
			],
			[
				'intervinieronOrganismos_id.required' => 'Este campo es obligatorio',
				'intervinieronOrganismosActualmente_id.required' => 'Este campo es obligatorio',
			]);

		$userId = auth()->user()->id;

		$data = request()->all();
		$data['user_id'] = $userId;

		// $guardoFormularioF = \App\FormF\Fformulario::create($data);
		$formularioF = \App\FormF\Fformulario::find($idFormulario);

		$formularioF->update($data);

		//
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
		//

		//NUEVO COPIAR A APP_TRATA

			// orgProgNacionalOtro
				$cantidadOrgProgNacionalOtroViejos = false;
				if (request()->input('orgprognacionalOtro_viejo')[0]) {
					$cantidadOrgProgNacionalOtroViejos = (count(request()->input('orgprognacionalOtro_viejo')));
				}

				$cantidadOrgProgNacionalOtroNuevos = false;
				if (request()->input('orgprognacionalOtro')[0]) {
					$cantidadOrgProgNacionalOtroNuevos = (count(request()->input('orgprognacionalOtro')));
				}

				if (isset($data['idsEliminados1'])) {
					$ids = array_map("intval", explode(',', $data['idsEliminados1']));
					for ($i=0; $i < count($ids); $i++) { 
						
						$orgProgNacionalOtro = \App\FormF\Orgprognacionalotro::find($ids[$i])->delete();

					}
				}

				$orgProgNacionalOtro = $formularioF->orgprognacionalotros;

				if ($cantidadOrgProgNacionalOtroViejos) {
					foreach ($orgProgNacionalOtro as $i => $organismo) {
						$organismoCargado = \App\FormF\Orgprognacionalotro::find($organismo->id);
						$orgViejo = $data['orgprognacionalOtro_viejo'][$i];
						$actualizoorganismoCargado = $organismoCargado->update(['nombreOrganismo' => $orgViejo]);

						$orgProgNacionalOtroIds[] = $organismo->id;
					}
				}

				if ($cantidadOrgProgNacionalOtroNuevos) {
					for ($i = 0; $i < $cantidadOrgProgNacionalOtroNuevos ; $i++) { 

						if($data['orgprognacionalOtro'][$i] !== null){
							$datos = ['nombreOrganismo' => $data['orgprognacionalOtro'][$i], 'fformulario_id' => $idFormulario];

							$orgNacionalNuevo = \App\FormF\Orgprognacionalotro::create($datos);

							$orgProgNacionalOtroIds[] = $orgNacionalNuevo->id;
						}

					}
				}
			// fin orgProgNacionalOtro

			// orgProgProvincial
				$cantidadOrgProgProvincialViejos = false;
				if (request()->input('orgProgProvinciales_viejo')[0]) {
					$cantidadOrgProgProvincialViejos = (count(request()->input('orgProgProvinciales_viejo')));
				}

				$cantidadOrgProgProvincialNuevos = false;
				if (request()->input('orgProgProvinciales')[0]) {
					$cantidadOrgProgProvincialNuevos = (count(request()->input('orgProgProvinciales')));
				}

				if (isset($data['idsEliminados2'])) {
					$ids = array_map("intval", explode(',', $data['idsEliminados2']));
					for ($i=0; $i < count($ids); $i++) { 
						
						$orgProgProvincial = \App\FormF\Orgprogprovincial::find($ids[$i])->delete();
						
					}
				}

				$orgProgProvincial = $formularioF->orgprogprovincials;

				if ($cantidadOrgProgProvincialViejos) {
					foreach ($orgProgProvincial as $i => $organismo) {

						$organismoCargado = \App\FormF\Orgprogprovincial::find($organismo->id);

						$orgViejo = $data['orgProgProvinciales_viejo'][$i];

						$actualizoorganismoCargado = $organismoCargado->update(['nombreOrganismo' => $orgViejo]);
						
						//guardo Ids para sincronizar
						$orgProgProvincialIds[] = $organismo->id;
					}
				}


				if ($cantidadOrgProgProvincialNuevos) {
					for ($i = 0; $i < $cantidadOrgProgProvincialNuevos ; $i++) { 

						if($data['orgProgProvinciales'][$i] !== null){
							$datos = ['nombreOrganismo' => $data['orgProgProvinciales'][$i], 'fformulario_id' => $idFormulario];

							$orgNacionalNuevo = \App\FormF\Orgprogprovincial::create($datos);

							$orgNacionalIds[] = $orgNacionalNuevo->id;
						}

					}
				}
			// fin orgProgProvincial

			// orgProgMunicipales
				$cantidadOrgProgMunicipalesViejos = false;
				if (request()->input('orgProgMunicipales_viejo')[0]) {
					$cantidadOrgProgMunicipalesViejos = (count(request()->input('orgProgMunicipales_viejo')));
				}

				$cantidadOrgProgMunicipalesNuevos = false;
				if (request()->input('orgProgMunicipales')[0]) {
					$cantidadOrgProgMunicipalesNuevos = (count(request()->input('orgProgMunicipales')));
				}

				if (isset($data['idsEliminados3'])) {
					$ids = array_map("intval", explode(',', $data['idsEliminados3']));
					for ($i=0; $i < count($ids); $i++) { 
						
						$orgProgMunicipal = \App\FormF\Orgprogmunicipal::find($ids[$i])->delete();
						
					}
				}

				$orgProgMunicipal = $formularioF->orgprogmunicipals;

				if ($cantidadOrgProgMunicipalesViejos) {
					foreach ($orgProgMunicipal as $i => $organismo) {
						
						$organismoCargado = \App\FormF\Orgprogmunicipal::find($organismo->id);

						$orgViejo = $data['orgProgMunicipales_viejo'][$i];

						$actualizoOrganismoCargado = $organismoCargado->update(['nombreOrganismo' => $orgViejo]);
						
						//guardo Ids para sincronizar
						$orgProgMunicipalIds[] = $organismo->id;
					}
				}

				if ($cantidadOrgProgMunicipalesNuevos) {
					for ($i = 0; $i < $cantidadOrgProgMunicipalesNuevos ; $i++) { 

						if($data['orgProgMunicipales'][$i] !== null){
							$datos = ['nombreOrganismo' => $data['orgProgMunicipales'][$i], 'fformulario_id' => $idFormulario];

							$orgProgMunicipalNuevo = \App\FormF\Orgprogmunicipal::create($datos);

							$orgProgMunicipalIds[] = $orgProgMunicipalNuevo->id;
						}

					}
				}
			// fino orgProgMunicipales

			// orgSocCivil
				$cantidadOrgSocCivilViejos = false;
				if (request()->input('orgSocCivil_viejo')[0]) {
					$cantidadOrgSocCivilViejos = (count(request()->input('orgSocCivil_viejo')));
				}

				$cantidadOrgSocCivilNuevos = false;
				if (request()->input('orgSocCivil')[0]) {
					$cantidadOrgSocCivilNuevos = (count(request()->input('orgSocCivil')));
				}

				if (isset($data['idsEliminados4'])) {
					$ids = array_map("intval", explode(',', $data['idsEliminados4']));
					for ($i=0; $i < count($ids); $i++) { 
						
						$orgSocCivil = \App\FormF\Orgsoccivil::find($ids[$i])->delete();
						
					}
				}

				$orgSocCivil = $formularioF->orgsoccivils;

				if ($cantidadOrgSocCivilViejos) {
					foreach ($orgSocCivil as $i => $organismo) {
						
						$organismoCargado = \App\FormF\Orgsoccivil::find($organismo->id);

						$orgViejo = $data['orgSocCivil_viejo'][$i];

						$actualizoOrganismoCargado = $organismoCargado->update(['nombreOrganismo' => $orgViejo]);
						
						//guardo Ids para sincronizar
						$orgSocCivilIds[] = $organismo->id;
					}
				}

				if ($cantidadOrgSocCivilNuevos) {
					for ($i = 0; $i < $cantidadOrgSocCivilNuevos ; $i++) { 

						if($data['orgSocCivil'][$i] !== null){
							$datos = ['nombreOrganismo' => $data['orgSocCivil'][$i], 'fformulario_id' => $idFormulario];

							$orgSocCivilNuevo = \App\FormF\Orgsoccivil::create($datos);

							$orgSocCivilIds[] = $orgSocCivilNuevo->id;
						}

					}
				}
			// fino orgSocCivil

			//actualmente
				// orgProgNacionalOtroActualmente
					$cantidadOrgProgNacionalOtroActualmenteViejos = false;
					if (request()->input('orgprognacionalActualmenteOtro_viejo')[0]) {
						$cantidadOrgProgNacionalOtroActualmenteViejos = (count(request()->input('orgprognacionalActualmenteOtro_viejo')));
					}

					$cantidadOrgProgNacionalOtroActualmenteNuevos = false;
					if (request()->input('orgprognacionalActualmenteOtro')[0]) {
						$cantidadOrgProgNacionalOtroActualmenteNuevos = (count(request()->input('orgprognacionalActualmenteOtro')));
					}

					if (isset($data['idsEliminados11'])) {
						$ids = array_map("intval", explode(',', $data['idsEliminados11']));
						for ($i=0; $i < count($ids); $i++) { 
							
							$orgProgNacionalOtro = \App\FormF\Orgprognacionalactualmenteotro::find($ids[$i])->delete();

						}
					}

					$orgProgNacionalActualmenteOtro = $formularioF->orgprognacionalactualmenteotros;

					if ($cantidadOrgProgNacionalOtroActualmenteViejos) {
						foreach ($orgProgNacionalActualmenteOtro as $i => $organismo) {

							$organismoCargado = \App\FormF\Orgprognacionalactualmenteotro::find($organismo->id);

							$orgViejo = $data['orgprognacionalActualmenteOtro_viejo'][$i];

							$actualizoorganismoCargado = $organismoCargado->update(['nombreOrganismo' => $orgViejo]);

							//guardo Ids para sincronizar
							$orgProgNacionalActualmenteOtroIds[] = $organismo->id;
						}
					}

					if ($cantidadOrgProgNacionalOtroActualmenteNuevos) {
						for ($i = 0; $i < $cantidadOrgProgNacionalOtroActualmenteNuevos ; $i++) { 

							if($data['orgprognacionalActualmenteOtro'][$i] !== null){
								$datos = ['nombreOrganismo' => $data['orgprognacionalActualmenteOtro'][$i], 'fformulario_id' => $idFormulario];

								$orgNacionalActualmenteNuevo = \App\FormF\Orgprognacionalactualmenteotro::create($datos);

								$orgProgNacionalActualmenteOtroIds[] = $orgNacionalActualmenteNuevo->id;
							}

						}
					}
				// fin orgProgNacionalOtro

				// orgProgProvincialActualmente
					$cantidadOrgProgProvincialesActualmenteViejos = false;
					if (request()->input('orgProgProvincialesActualmente_viejo')[0]) {
						$cantidadOrgProgProvincialesActualmenteViejos = (count(request()->input('orgProgProvincialesActualmente_viejo')));
					}

					$cantidadOrgProgProvincialesActualmenteNuevos = false;
					if (request()->input('orgProgProvincialesActualmente')[0]) {
						$cantidadOrgProgProvincialesActualmenteNuevos = (count(request()->input('orgProgProvincialesActualmente')));
					}

					if (isset($data['idsEliminados22'])) {
						$ids = array_map("intval", explode(',', $data['idsEliminados22']));
						for ($i=0; $i < count($ids); $i++) { 
							
							$orgProgProvincial = \App\FormF\Orgprogprovincialesactualmente::find($ids[$i])->delete();
							
						}
					}

					$orgProgProvincialesAlactualmente = $formularioF->orgprogprovincialesactualmentes;

					if ($cantidadOrgProgProvincialesActualmenteViejos) {
						foreach ($orgProgProvincialesAlactualmente as $i => $organismo) {

							$organismoCargado = \App\FormF\Orgprogprovincialesactualmente::find($organismo->id);

							$orgViejo = $data['orgProgProvincialesActualmente_viejo'][$i];

							$actualizoorganismoCargado = $organismoCargado->update(['nombreOrganismo' => $orgViejo]);
							
							//guardo Ids para sincronizar
							$orgProgProvincialesActualmenteIds[] = $organismo->id;
						}
					}


					if ($cantidadOrgProgProvincialesActualmenteNuevos) {
						for ($i = 0; $i < $cantidadOrgProgProvincialesActualmenteNuevos ; $i++) { 

							if($data['orgProgProvincialesActualmente'][$i] !== null){
								$datos = ['nombreOrganismo' => $data['orgProgProvincialesActualmente'][$i], 'fformulario_id' => $idFormulario];

								$orgProvincialNuevo = \App\FormF\Orgprogprovincialesactualmente::create($datos);

								$orgProgProvincialesActualmenteIds[] = $orgProvincialNuevo->id;
							}

						}
					}
				// fin orgProgProvincial

				// orgProgMunicipalesActualmente
					$cantidadOrgProgMunicipalesActualmenteViejos = false;
					if (request()->input('orgProgMunicipalesActualmente_viejo')[0]) {
						$cantidadOrgProgMunicipalesActualmenteViejos = (count(request()->input('orgProgMunicipalesActualmente_viejo')));
					}

					$cantidadOrgProgMunicipalesActualmenteNuevos = false;
					if (request()->input('orgProgMunicipalesActualmente')[0]) {
						$cantidadOrgProgMunicipalesActualmenteNuevos = (count(request()->input('orgProgMunicipalesActualmente')));
					}

					if (isset($data['idsEliminados33'])) {
						$ids = array_map("intval", explode(',', $data['idsEliminados33']));
						for ($i=0; $i < count($ids); $i++) { 
							
							$orgProgMunipalesActualmente = \App\FormF\Orgprogmunicipalesactualmente::find($ids[$i])->delete();
							
						}
					}

					$orgProgMunipalesActualmente = $formularioF->orgprogmunicipalesactualmentes;

					if ($cantidadOrgProgMunicipalesActualmenteViejos) {
						foreach ($orgProgMunipalesActualmente as $i => $organismo) {
							
							$organismoCargado = \App\FormF\Orgprogmunicipalesactualmente::find($organismo->id);

							$orgViejo = $data['orgProgMunicipalesActualmente_viejo'][$i];

							$actualizoOrganismoCargado = $organismoCargado->update(['nombreOrganismo' => $orgViejo]);
							
							//guardo Ids para sincronizar
							$orgProgMunipalesActualmenteIds[] = $organismo->id;
						}
					}

					if ($cantidadOrgProgMunicipalesActualmenteNuevos) {
						for ($i = 0; $i < $cantidadOrgProgMunicipalesActualmenteNuevos ; $i++) { 

							if($data['orgProgMunicipalesActualmente'][$i] !== null){
								$datos = ['nombreOrganismo' => $data['orgProgMunicipalesActualmente'][$i], 'fformulario_id' => $idFormulario];

								$orgProgMunipalesActualmenteNuevo = \App\FormF\Orgprogmunicipalesactualmente::create($datos);

								$orgProgMunipalesActualmenteIds[] = $orgProgMunipalesActualmenteNuevo->id;
							}

						}
					}
				// fino orgProgMunicipales

				// orgSocCivilActualmente
					$cantidadOrgSocCivilActualmenteViejos = false;
					if (request()->input('orgSocCivilActualmente_viejo')[0]) {
						$cantidadOrgSocCivilActualmenteViejos = (count(request()->input('orgSocCivilActualmente_viejo')));
					}

					$cantidadOrgSocCivilActualmenteNuevos = false;
					if (request()->input('orgSocCivilActualmente')[0]) {
						$cantidadOrgSocCivilActualmenteNuevos = (count(request()->input('orgSocCivilActualmente')));
					}

					if (isset($data['idsEliminados44'])) {
						$ids = array_map("intval", explode(',', $data['idsEliminados44']));
						for ($i=0; $i < count($ids); $i++) { 
							
							$orgSocCivilActualmente = \App\FormF\Orgsoccivilactualmente::find($ids[$i])->delete();
							
						}
					}

					$orgSocCivilActualmente = $formularioF->orgsoccivilactualmentes;

					if ($cantidadOrgSocCivilActualmenteViejos) {
						foreach ($orgSocCivilActualmente as $i => $organismo) {
							
							$organismoCargado = \App\FormF\Orgsoccivilactualmente::find($organismo->id);

							$orgViejo = $data['orgSocCivilActualmente_viejo'][$i];

							$actualizoOrganismoCargado = $organismoCargado->update(['nombreOrganismo' => $orgViejo]);
							
							//guardo Ids para sincronizar
							$orgSocCivilActualmenteIds[] = $organismo->id;
						}
					}

					if ($cantidadOrgSocCivilActualmenteNuevos) {
						for ($i = 0; $i < $cantidadOrgSocCivilActualmenteNuevos ; $i++) { 

							if($data['orgSocCivilActualmente'][$i] !== null){
								$datos = ['nombreOrganismo' => $data['orgSocCivilActualmente'][$i], 'fformulario_id' => $idFormulario];

								$orgSocCivilActualmenteNuevo = \App\FormF\Orgsoccivilactualmente::create($datos);

								$orgSocCivilActualmenteIds[] = $orgSocCivilActualmenteNuevo->id;
							}

						}
					}
				// fino orgSocCivil
			//fin actualmente

			//si se cambia la opcion a intervino solo el organismo que derivo/no
				if ($data['intervinieronOrganismos_id'] == 2 || $data['intervinieronOrganismos_id'] == 1) {
					$orgProgNacionalOtro = $formularioF->orgprognacionalotros;
					foreach ($orgProgNacionalOtro as $i => $organismo) {
						\App\FormF\Orgprognacionalotro::find($organismo->id)->delete();
					}
					$orgProgProvincial = $formularioF->orgprogprovincials;
					foreach ($orgProgProvincial as $i => $organismo) {
						\App\FormF\Orgprogprovincial::find($organismo->id)->delete();
					}
					$orgProgMunipal = $formularioF->orgprogmunicipals;
					foreach ($orgProgMunipal as $i => $organismo) {
						\App\FormF\Orgprogmunicipal::find($organismo->id)->delete();
					}
					$orgSocCivil = $formularioF->orgsoccivils;
					foreach ($orgSocCivil as $i => $organismo) {
						\App\FormF\Orgsoccivil::find($organismo->id)->delete();
					}

					$formularioF->orgjudicials()->sync(null);

					$formularioF->orgprognacionals()->sync(null);

					$formularioF->policias()->sync(null);
				}
			//

			//si se cambia la opcion a no
				if ($data['intervinieronOrganismosActualmente_id'] == 2) {
					$orgProgNacionalActualmenteOtro = $formularioF->orgprognacionalactualmenteotros;
					foreach ($orgProgNacionalActualmenteOtro as $i => $organismo) {
						\App\FormF\Orgprognacionalactualmenteotro::find($organismo->id)->delete();
					}
					$orgProgProvincialesAlactualmente = $formularioF->orgprogprovincialesactualmentes;
					foreach ($orgProgProvincialesAlactualmente as $i => $organismo) {
						\App\FormF\Orgprogprovincialesactualmente::find($organismo->id)->delete();
					}
					$orgProgMunipalesActualmente = $formularioF->orgprogmunicipalesactualmentes;
					foreach ($orgProgMunipalesActualmente as $i => $organismo) {
						\App\FormF\Orgprogmunicipalesactualmente::find($organismo->id)->delete();
					}
					$orgSocCivilActualmente = $formularioF->orgsoccivilactualmentes;
					foreach ($orgSocCivilActualmente as $i => $organismo) {
						\App\FormF\Orgsoccivilactualmente::find($organismo->id)->delete();
					}

					$formularioF->orgjudicialactualmentes()->sync(null);

					$formularioF->orgprognacionalactualmentes()->sync(null);

					$formularioF->policiaactualmentes()->sync(null);

				}
			//

		//FIN NUEVO

		return redirect('formularios/buscador');
	}

	public function destroyF($id)
	{
		$fecha_hoy = Carbon::now();

		$Fformulario = \App\FormF\Fformulario::find($id);

		$carpetaFormF = \App\Carpetas\Numerocarpeta::where('fformulario_id', '=', $id);

		// if ($carpetaFormF->value('aformulario_id') == null && $carpetaFormF->value('bformulario_id') == null && $carpetaFormF->value('cformulario_id') == null && $carpetaFormF->value('dformulario_id') == null && $carpetaFormF->value('gformulario_id') == null) {
			
			$carpetaFormF->update(['deleted_at' => $fecha_hoy]);

		// }elseif ($carpetaFormF->value('aformulario_id') !== null || $carpetaFormF->value('bformulario_id') !== null || $carpetaFormF->value('cformulario_id') !== null || $carpetaFormF->value('dformulario_id') !== null || $carpetaFormF->value('gformulario_id') !== null) {

		// 	$carpetaFormF->update(['fformulario_id' => null]);

		// }

		// $Fformulario->delete();

    	session()->flash('message', 'El formulario se eliminó con éxito.');

    	return redirect('formularios/buscador');	
	}

	public function createG($idCarpeta,$idFormulario=null)
	{
		$userId = auth()->user()->id;
		
		$numeroCarpeta= DB::table('numerocarpetas')
												  ->WHERE('user_id', '=', $userId)
												  ->WHERE('deleted_at', '=', null)
												  ->WHERE('id','=',$idCarpeta)
												  ->first()
												  ->numeroCarpeta;
		//datos del formulario A
			$datosModalidad = \App\FormA\Modalidad::all();;
			$datosEstadoCaso = \App\FormA\Estadocaso::all();
			$datosMotivoCierre = \App\FormA\Motivocierre::all();
			$datosCaratulacion = \App\FormA\Caratulacionjudicial::all();
			$datosProfesional = \App\FormA\Profesional::all();
			$datosIntervieneActualmente = \App\FormA\Profesionalactualmente::all();
			$datosPresentacion = \App\FormA\Presentacionespontanea::all();
			$datosOrganismo = \App\FormA\Otrosorganismo::all();
			$datosAmbito = \App\FormA\Ambito::all();
			$datosDepartamento = \App\FormA\Departamento::all();
			$datosOtrasProv = \App\FormA\Otrasprov::all();
			// $getIdA = DB::table('aformularios')
			//                             ->WHERE('datos_numero_carpeta', '=', $numeroCarpeta)
			// 							->ORDERBY('created_at', 'desc')
			// 							->first()
			// 							->id;
			// $aFormulario = \App\FormA\Aformulario::find($getIdA);
			$aFormularios = \App\FormA\Aformulario::all();
			// $todo = DB::table('aformularios')
			//                             ->WHERE('aformulario_id', '=', $getIdA)
			// 							->JOIN('aformulario_profesionalinterviniente', 'aformularios.id', '=', 'aformulario_profesionalinterviniente.aformulario_id')
			// 							->JOIN('profesionalintervinientes', 'aformulario_profesionalinterviniente.profesionalinterviniente_id', '=', 'profesionalintervinientes.id')
			// 							->JOIN('profesionals', 'profesionalintervinientes.profesional_id', '=', 'profesionals.id')
			// 							->JOIN('profesionalactualmentes', 'profesionalintervinientes.profesionalactualmente_id', '=', 'profesionalactualmentes.id')
			//                             ->get();
		//fin datos del formulario A

		//datos del formulario F
			$datosOrgJudicialesActualmente = \App\FormF\Orgjudicialactualmente::all();
			$datosProgNacionalesActualmente = \App\FormF\Orgprognacionalactualmente::all();
			$datosPoliciaActualmente = \App\FormF\Policiaactualmente::all();
			// ---necesarios para el edit
			// dd($numeroCarpeta);
			// $getIdF = DB::table('fformularios')
			//                             ->WHERE('numeroCarpeta', '=', $numeroCarpeta)
			// 							->ORDERBY('created_at', 'desc')
			// 							// ->get();
			// 							->first()
			// 							->id;
			// 							// dd($getIdF);
			// $formularioF = \App\FormF\Fformulario::find($getIdF);
			$formulariosF = \App\FormF\Fformulario::all();
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

			$carpetas = \App\Carpetas\Numerocarpeta::all();


		return view('formularios.formularioG', [
												'numeroCarpeta' => $numeroCarpeta,
												'carpetas' => $carpetas,
												'aFormularios' => $aFormularios,
												//formulario A
												'datosModalidad' => $datosModalidad,
												'datosEstadoCaso' => $datosEstadoCaso,
												'datosCaratulacion' => $datosCaratulacion,
												'datosProfesional' => $datosProfesional,
												'datosIntervieneActualmente' => $datosIntervieneActualmente,
												'datosPresentacion' => $datosPresentacion,
												'datosOrganismo' => $datosOrganismo,
												// 'todo' => $todo,
												//fin formulario A
												//formulario F
												'datosOrgJudicialesActualmente' => $datosOrgJudicialesActualmente,
												'datosProgNacionalesActualmente' => $datosProgNacionalesActualmente,
												'datosPoliciaActualmente' => $datosPoliciaActualmente,
												// 'datosAsistencia' => $datosAsistencia,
												// 'datosSocioeconomica' => $datosSocioeconomica,
												// 'derivacionOrganismo' => $derivacionOrganismo,
												'formulariosF' => $formulariosF,
												'orgProgNacionalOtro' => $orgProgNacionalOtro,
												'orgProgProvincial' => $orgProgProvincial,
												'orgProgMunipal' => $orgProgMunipal,
												'orgSocCivil' => $orgSocCivil,
												'orgProgNacionalActualmenteOtro' => $orgProgNacionalActualmenteOtro,
												'orgProgProvincialesAlactualmente' => $orgProgProvincialesAlactualmente,
												'orgProgMunipalesActualmente' => $orgProgMunipalesActualmente,
												'orgSocCivilActualmente' => $orgSocCivilActualmente,
												//fin formulario F
												'temaIntervencion' => $temaIntervencion,
												'idCarpeta' => $idCarpeta,
												'datosMotivoCierre' => $datosMotivoCierre,
												'datosAmbito'		=> $datosAmbito,
												'datosDepartamento'	=> $datosDepartamento,
												'datosOtrasProv'	=> $datosOtrasProv,

												]);
	}

	public function insertG()
	{
		$userId = auth()->user()->id;

		request()->validate(
			[	
			'introduccion' => 'required',
		// 		'docInterna.0' => 'required|max:10000',
		// 		'docExterna.0' => 'required|max:10000',
		// 		'notRelacionadas.0' => 'required|max:10000',
		// 		'intervencionEstrategias.0' => 'required|max:10000',
		// 		'infoSocioambiental.0' => 'required|max:10000',

			],
			[
				'introduccion.required' => 'Debes completar la introduccion',
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

		$guardoNumeroCarpeta = \App\Carpetas\Numerocarpeta::where('numeroCarpeta', '=', $data['numeroCarpeta'])->update(['gformulario_id' => $idGFormularioGuardado]);

		// dd(request()->file('docInterna')[0]);

		if (isset($data['docInterna'])) {
			//j sirve para agregarle un indice al archivo y que no arranca en 0
			for ($i=0; $i < count($data['docInterna']); $i++) { 

				// $nombreArchivoCliente = request()->file('docInterna')[$i]->getClientOriginalName();
				$nombreArchivoCliente = pathinfo(request()->file('docInterna')[$i]->getClientOriginalName(), PATHINFO_FILENAME);

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

				$nombreArchivoCliente = pathinfo(request()->file('docExterna')[$i]->getClientOriginalName(), PATHINFO_FILENAME);

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

				$nombreArchivoCliente = pathinfo(request()->file('notRelacionadas')[$i]->getClientOriginalName(), PATHINFO_FILENAME);

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

				$nombreArchivoCliente = pathinfo(request()->file('intervencionEstrategias')[$i]->getClientOriginalName(), PATHINFO_FILENAME);

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

				$nombreArchivoCliente = pathinfo(request()->file('infoSocioambiental')[$i]->getClientOriginalName(), PATHINFO_FILENAME);

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
				if (isset($data['temaOtro'][$i])) {
					$intervencion['temaOtro'] = $data['temaOtro'][$i];
				}
				// $intervencion['temaOtro'] = $data['temaOtro'][$i];
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

		return redirect('formularios/buscador');	
	}

	public function editG($idCarpeta,$idFormulario)
	{
		$userId = auth()->user()->id;
		// $numeroCarpeta = DB::table('aformularios')
		// 									->WHERE('user_id', '=', $userId)
		// 									->ORDERBY('updated_at', 'desc')
		// 									->first()
		// 									->datos_numero_carpeta;
		//datos del formulario A
			$datosModalidad = \App\FormA\Modalidad::all();;
			$datosEstadoCaso = \App\FormA\Estadocaso::all();
			$datosMotivoCierre = \App\FormA\Motivocierre::all();
			$datosCaratulacion = \App\FormA\Caratulacionjudicial::all();
			$datosProfesional = \App\FormA\Profesional::all();
			$datosIntervieneActualmente = \App\FormA\Profesionalactualmente::all();
			$datosPresentacion = \App\FormA\Presentacionespontanea::all();
			$datosOrganismo = \App\FormA\Otrosorganismo::all();
			$aFormularios = \App\FormA\Aformulario::all();
			$datosAmbito = \App\FormA\Ambito::all();
			$datosDepartamento = \App\FormA\Departamento::all();
			$datosOtrasProv = \App\FormA\Otrasprov::all();

			// $getIdA = DB::table('aformularios')
			//                             ->WHERE('datos_numero_carpeta', '=', $numeroCarpeta)
			// 							->ORDERBY('updated_at', 'desc')
			// 							->first()
			// 							->id;
			// $aFormulario = \App\FormA\Aformulario::find($getIdA);
			// $todo = DB::table('aformularios')
			//                             ->WHERE('aformulario_id', '=', $getIdA)
			// 							->JOIN('aformulario_profesionalinterviniente', 'aformularios.id', '=', 'aformulario_profesionalinterviniente.aformulario_id')
			// 							->JOIN('profesionalintervinientes', 'aformulario_profesionalinterviniente.profesionalinterviniente_id', '=', 'profesionalintervinientes.id')
			// 							->JOIN('profesionals', 'profesionalintervinientes.profesional_id', '=', 'profesionals.id')
			// 							->JOIN('profesionalactualmentes', 'profesionalintervinientes.profesionalactualmente_id', '=', 'profesionalactualmentes.id')
			//                             ->get();
		//fin datos del formulario A

		//datos del formulario F
			$datosOrgJudicialesActualmente = \App\FormF\Orgjudicialactualmente::all();
			$datosProgNacionalesActualmente = \App\FormF\Orgprognacionalactualmente::all();
			$datosPoliciaActualmente = \App\FormF\Policiaactualmente::all();
			// ---necesarios para el edit
			// $getIdF = DB::table('fformularios')
			//                             ->WHERE('numeroCarpeta', '=', $numeroCarpeta)
			// 							->ORDERBY('updated_at', 'desc')
			// 							->first()
			// 							->id;
			// 							// dd($getIdF);
			$formulariosF = \App\FormF\Fformulario::all();
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
			$formularioG = \App\FormG\Gformulario::find($idFormulario);
			$intervenciones = $formularioG->intervencions;
			$docInterna = $formularioG->docinternas;
			$docExterna = $formularioG->docexternas;
			$infoSocioambiental = $formularioG->infosocioambientals;
			$intervencionEstrategias = $formularioG->intervencionestrategias;
			$notRelacionadas = $formularioG->notrelacionadas;
			// response()->file($docInterna);
			// dd($docInterna);
		//Fin datos del G

		//id de los formularios de una misma carpeta
			// $idFormA = \App\Carpetas\Numerocarpeta::where('user_id', '=', $userId)
			// 				->where('gformulario_id', '=', $id)
			// 				->value('aformulario_id');
			// $idFormB = \App\Carpetas\Numerocarpeta::where('user_id', '=', $userId)
			// 					->where('gformulario_id', '=', $id)
			// 					->value('bformulario_id');
			// $idFormC = \App\Carpetas\Numerocarpeta::where('user_id', '=', $userId)
			// 					->where('gformulario_id', '=', $id)
			// 					->value('cformulario_id');
			// $idFormD = \App\Carpetas\Numerocarpeta::where('user_id', '=', $userId)
			// 					->where('gformulario_id', '=', $id)
			// 					->value('dformulario_id');
			// $idFormE = \App\Carpetas\Numerocarpeta::where('user_id', '=', $userId)
			// 					->where('gformulario_id', '=', $id)
			// 					->value('eformulario_id');
			// $idFormF = \App\Carpetas\Numerocarpeta::where('user_id', '=', $userId)
			// 					->where('gformulario_id', '=', $id)
			// 					->value('fformulario_id');
			// $idFormG = \App\Carpetas\Numerocarpeta::where('user_id', '=', $userId)
			// 					->where('gformulario_id', '=', $id)
			// 					->value('gformulario_id');
			// $idFormA = \App\Carpetas\Numerocarpeta::where('user_id', '=', $userId)
			$idFormA = \App\Carpetas\Numerocarpeta::where('gformulario_id', '=', $idFormulario)
							// ->where('cformulario_id', '=', $id)
							->value('aformulario_id');
			// $idFormB = \App\Carpetas\Numerocarpeta::where('user_id', '=', $userId)
			$idFormB = \App\Carpetas\Numerocarpeta::where('gformulario_id', '=', $idFormulario)
								// ->where('cformulario_id', '=', $id)
								->value('bformulario_id');
			// $idFormC = \App\Carpetas\Numerocarpeta::where('user_id', '=', $userId)
			$idFormC = \App\Carpetas\Numerocarpeta::where('gformulario_id', '=', $idFormulario)
								// ->where('cformulario_id', '=', $id)
								->value('cformulario_id');
			// $idFormD = \App\Carpetas\Numerocarpeta::where('user_id', '=', $userId)
			$idFormD = \App\Carpetas\Numerocarpeta::where('gformulario_id', '=', $idFormulario)
								// ->where('cformulario_id', '=', $id)
								->value('dformulario_id');
			// $idFormE = \App\Carpetas\Numerocarpeta::where('user_id', '=', $userId)
			$idFormE = \App\Carpetas\Numerocarpeta::where('gformulario_id', '=', $idFormulario)
								// ->where('cformulario_id', '=', $id)
								->value('eformulario_id');
			// $idFormF = \App\Carpetas\Numerocarpeta::where('user_id', '=', $userId)
			$idFormF = \App\Carpetas\Numerocarpeta::where('gformulario_id', '=', $idFormulario)
								// ->where('cformulario_id', '=', $id)
								->value('fformulario_id');
			// $idFormG = \App\Carpetas\Numerocarpeta::where('user_id', '=', $userId)
			$idFormG = \App\Carpetas\Numerocarpeta::where('gformulario_id', '=', $idFormulario)
								// ->where('cformulario_id', '=', $id)
								->value('gformulario_id');
		//fin ids
			$usuarioCarpeta = \App\Carpetas\Numerocarpeta::WHERE('gformulario_id', '=', $idFormulario)->value('user_id');

		return view('formularios.editar.formularioG_edit', [
												// 'numeroCarpeta' => $numeroCarpeta,
												'aFormularios' => $aFormularios,
												//formulario A
												'datosModalidad' => $datosModalidad,
												'datosMotivoCierre' => $datosModalidad,
												'datosEstadoCaso' => $datosEstadoCaso,
												'datosCaratulacion' => $datosCaratulacion,
												'datosProfesional' => $datosProfesional,
												'datosIntervieneActualmente' => $datosIntervieneActualmente,
												'datosPresentacion' => $datosPresentacion,
												'datosOrganismo' => $datosOrganismo,
												'datosAmbito' => $datosAmbito,
												'datosDepartamento' => $datosDepartamento,
												'datosOtrasProv' => $datosOtrasProv,
												// 'todo' => $todo,
												//fin formulario A
												//formulario F
												'datosOrgJudicialesActualmente' => $datosOrgJudicialesActualmente,
												'datosProgNacionalesActualmente' => $datosProgNacionalesActualmente,
												'datosPoliciaActualmente' => $datosPoliciaActualmente,
												// 'datosAsistencia' => $datosAsistencia,
												// 'datosSocioeconomica' => $datosSocioeconomica,
												// 'derivacionOrganismo' => $derivacionOrganismo,
												'formulariosF' => $formulariosF,
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
												'formularioG' => $formularioG,
												//fin formulario F
												'idFormA' => $idFormA,
												'idFormB' => $idFormB,
												'idFormC' => $idFormC,
												'idFormD' => $idFormD,
												'idFormE' => $idFormE,
												'idFormF' => $idFormF,
												'idFormG' => $idFormG,
												'usuarioCarpeta' => $usuarioCarpeta,
												'idCarpeta' => $idCarpeta
												]);
	}

	public function updateG($idCarpeta,$idFormulario)
	{
		$userId = auth()->user()->id;

		request()->validate(
			[	'introduccion' => 'required',
				'docInterna' => 'max:8192',
				'docExterna' => 'max:8192',
				'notRelacionadas' => 'max:8192',
				'intervencionEstrategias' => 'max:8192',
				'infoSocioambiental' => 'max:8192',

			],
			[	'introduccion.required' => 'Debes completar la introduccion',
		// 		'docInterna.*.required' => 'Subi un archivo, dale!',
		// 		'docExterna.*.required' => 'Subi un archivo, dale!',
		// 		'notRelacionadas.*.required' => 'Subi un archivo, dale!',
		// 		'intervencionEstrategias.*.required' => 'Subi un archivo, dale!',
		// 		'infoSocioambiental.*.required' => 'Subi un archivo, dale!',
				'docInterna.max' => 'El tamaño del archivo supera el límite permitido',
				'docExterna.max' => 'El tamaño del archivo supera el límite permitido',
				'notRelacionadas.max' => 'El tamaño del archivo supera el límite permitido',
				'intervencionEstrategias.max' => 'El tamaño del archivo supera el límite permitido',
				'infoSocioambiental.max' => 'El tamaño del archivo supera el límite permitido',
			]);

		$data = request()->all();

		// dd($data);

		$data['user_id'] = $userId;

		$gFormulario = \App\FormG\Gformulario::find($idFormulario);
		$actualizoGformulario = $gFormulario->update($data);

		// $idGFormularioGuardado = $gFormularioGuardado->id;

		// dd(request()->file('docInterna')[0]);

		if (isset($data['docInterna'])) {
			//j sirve para agregarle un indice al archivo y que no arranca en 0
			for ($i=0; $i < count($data['docInterna']); $i++) { 

				$nombreArchivoCliente = pathinfo(request()->file('docInterna')[$i]->getClientOriginalName(), PATHINFO_FILENAME);

				$docInterna = $nombreArchivoCliente.' - Número de carpeta '.str_slug($data['numeroCarpeta']);

	            $docInterna = $docInterna.'.'.request()->file('docInterna')[$i]->extension();

	            $pathDocInterna = request()->file('docInterna')[$i]->storeAs('public/archivos/docInterna', $docInterna);

	            $pathDocInterna = str_replace('public', 'storage', $pathDocInterna);

	            $datos = ['nombreArchivo' => $docInterna, 'path' => $pathDocInterna, 'gformulario_id' => $idFormulario];

	            $guardoDocInterna = \App\FormG\Docinterna::create($datos);
			}
        }

        if (isset($data['docExterna'])) {
			//j sirve para agregarle un indice al archivo y que no arranca en 0
			for ($i=0; $i < count($data['docExterna']); $i++) { 
				
				$nombreArchivoCliente = pathinfo(request()->file('docExterna')[$i]->getClientOriginalName(), PATHINFO_FILENAME);

				$docExterna = $nombreArchivoCliente.' - Número de carpeta '.str_slug($data['numeroCarpeta']);

	            $docExterna = $docExterna.'.'.request()->file('docExterna')[$i]->extension();

	            $pathDocExterna = request()->file('docExterna')[$i]->storeAs('public/archivos/docExterna', $docExterna);

	            $pathDocExterna = str_replace('public', 'storage', $pathDocExterna);

	            $datos = ['nombreArchivo' => $docExterna, 'path' => $pathDocExterna, 'gformulario_id' => $idFormulario];

	            $guardodDocExterna = \App\FormG\Docexterna::create($datos);

			}
        }

        if (isset($data['notRelacionadas'])) {
			//j sirve para agregarle un indice al archivo y que no arranca en 0
			for ($i=0; $i < count($data['notRelacionadas']); $i++) { 

				$nombreArchivoCliente = pathinfo(request()->file('notRelacionadas')[$i]->getClientOriginalName(), PATHINFO_FILENAME);

				$notRelacionadas = $nombreArchivoCliente.' - Número de carpeta '.str_slug($data['numeroCarpeta']);

	            $notRelacionadas = $notRelacionadas.'.'.request()->file('notRelacionadas')[$i]->extension();

	            $pathNotRelacionadas = request()->file('notRelacionadas')[$i]->storeAs('public/archivos/notRelacionadas', $notRelacionadas);

	            $pathNotRelacionadas = str_replace('public', 'storage', $pathNotRelacionadas);

	            $datos = ['nombreArchivo' => $notRelacionadas, 'path' => $pathNotRelacionadas, 'gformulario_id' => $idFormulario];

	            $guardoNotRelacionadas = \App\FormG\Notrelacionada::create($datos);

			}
        }

        if (isset($data['intervencionEstrategias'])) {
			//j sirve para agregarle un indice al archivo y que no arranca en 0
			for ($i=0; $i < count($data['intervencionEstrategias']); $i++) { 

				$nombreArchivoCliente = pathinfo(request()->file('intervencionEstrategias')[$i]->getClientOriginalName(), PATHINFO_FILENAME);

				$intervencionEstrategias = $nombreArchivoCliente.' - Número de carpeta '.str_slug($data['numeroCarpeta']);

	            $intervencionEstrategias = $intervencionEstrategias.'.'.request()->file('intervencionEstrategias')[$i]->extension();

	            $pathIntervencionEstrategias = request()->file('intervencionEstrategias')[$i]->storeAs('public/archivos/intervencionEstrategias', $intervencionEstrategias);

	            $pathIntervencionEstrategias = str_replace('public', 'storage', $pathIntervencionEstrategias);

	            $datos = ['nombreArchivo' => $intervencionEstrategias, 'path' => $pathIntervencionEstrategias, 'gformulario_id' => $idFormulario];

	            $guardoIntervencionEstrategias = \App\FormG\Intervencionestrategia::create($datos);

			}
        }

        if (isset($data['infoSocioambiental'])) {
			//j sirve para agregarle un indice al archivo y que no arranca en 0
			for ($i=0; $i < count($data['infoSocioambiental']); $i++) { 

				$nombreArchivoCliente = pathinfo(request()->file('infoSocioambiental')[$i]->getClientOriginalName(), PATHINFO_FILENAME);

				$infoSocioambiental = $nombreArchivoCliente.' - Número de carpeta '.str_slug($data['numeroCarpeta']);

	            $infoSocioambiental = $infoSocioambiental.'.'.request()->file('infoSocioambiental')[$i]->extension();

	            $pathInfoSocioambiental = request()->file('infoSocioambiental')[$i]->storeAs('public/archivos/infoSocioambiental', $infoSocioambiental);

	            $pathInfoSocioambiental = str_replace('public', 'storage', $pathInfoSocioambiental);

	            $datos = ['nombreArchivo' => $infoSocioambiental, 'path' => $pathInfoSocioambiental, 'gformulario_id' => $idFormulario];

	            $guardoInfoSocioambiental = \App\FormG\Infosocioambiental::create($datos);

			}
        }

		// intervencionesViejas
			$cantidadIntervencionesViejas = false;
			if (request()->input('fechaIntervencion_viejo')[0]) {
				$cantidadIntervencionesViejas = (count(request()->input('fechaIntervencion_viejo')));
			}

			$cantidadIntervencionesNuevas = false;
			if (request()->input('fechaIntervencion')[0]) {
				$cantidadIntervencionesNuevas = (count(request()->input('fechaIntervencion')));
			}
			
			if (isset($data['idsEliminados'])) {
				$ids = array_map("intval", explode(',', $data['idsEliminados']));
				for ($i=0; $i < count($ids); $i++) { 
					
					\App\FormG\Intervencion::find($ids[$i])->gformularios()->detach();

					$borroIntervencion = \App\FormG\Intervencion::find($ids[$i])->delete();

				}
			}

			$intervenciones = $gFormulario->intervencions;

			if ($cantidadIntervencionesViejas) {
				foreach ($intervenciones as $i => $intervencion) {
					$intervencionCargada = \App\FormG\Intervencion::find($intervencion->id);
					$intervencionVieja = [
											'fechaIntervencion' => $data['fechaIntervencion_viejo'][$i],
											'temaIntervencion_id' => $data['temaIntervencion_id_viejo'][$i],
											'nombreContacto' => $data['nombreContacto_viejo'][$i],
											'telefonoContacto' => $data['telefonoContacto_viejo'][$i],
											'descripcionIntervencion' => $data['descripcionIntervencion_viejo'][$i],
											'user_id' => $data['user_id']
										];
					if (isset($data['temaOtro_viejo'][$i])) {
						$intervencionVieja['temaOtro'] = $data['temaOtro_viejo'][$i];
					}
					// dd($intervencionVieja);
					$actualizoIntervencionCargada = $intervencionCargada->update($intervencionVieja);

					$intervencionIds[] = $intervencion->id;
				}
			}

			if ($cantidadIntervencionesNuevas) {
				for ($i = 0; $i < $cantidadIntervencionesNuevas ; $i++) { 
					
					$intervencion = [
											'fechaIntervencion' => $data['fechaIntervencion'][$i],
											'temaIntervencion_id' => $data['temaIntervencion_id'][$i],
											'nombreContacto' => $data['nombreContacto'][$i],
											'telefonoContacto' => $data['telefonoContacto'][$i],
											'descripcionIntervencion' => $data['descripcionIntervencion'][$i],
											'user_id' => $data['user_id']
										];
					if (isset($data['temaOtro'][$i])) {
						$intervencion['temaOtro'] = $data['temaOtro'][$i];
					}

					$intervencionNueva = \App\FormG\Intervencion::create($intervencion);

					$intervencionIds[] = $intervencionNueva->id;

				}

				$guardoRelacion = $gFormulario->intervencions()->sync($intervencionIds);
			}
		// fin intervencion

		return redirect('formularios/buscador');	
	}

	public function destroyG($id)
	{
		$fecha_hoy = Carbon::now();

		$Gformulario = \App\FormG\Gformulario::find($id);

		$carpetaFormG = \App\Carpetas\Numerocarpeta::where('gformulario_id', '=', $id);

		// if ($carpetaFormG->value('aformulario_id') == null && $carpetaFormG->value('bformulario_id') == null && $carpetaFormG->value('cformulario_id') == null && $carpetaFormG->value('dformulario_id') == null && $carpetaFormG->value('fformulario_id') == null) {
			
			$carpetaFormG->update(['deleted_at' => $fecha_hoy]);

		// }elseif ($carpetaFormG->value('aformulario_id') !== null || $carpetaFormG->value('bformulario_id') !== null || $carpetaFormG->value('cformulario_id') !== null || $carpetaFormG->value('dformulario_id') !== null || $carpetaFormG->value('fformulario_id') !== null) {

		// 	$carpetaFormG->update(['gformulario_id' => null]);

		// }

		// $Gformulario->delete();

    	session()->flash('message', 'El formulario se eliminó con éxito.');

    	return redirect('formularios/buscador');	
	}

}
