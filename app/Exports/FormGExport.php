<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\Exportable;

class FormGExport implements FromView
{
	use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */

    public $id;

    function __construct($id)
    {
        $this->id = $id;

    }


    public function view(): View
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
			$aFormularios = \App\FormA\Aformulario::all();
		//fin datos del formulario A

		//datos del formulario F
			$datosOrgJudicialesActualmente = \App\FormF\Orgjudicialactualmente::all();
			$datosProgNacionalesActualmente = \App\FormF\Orgprognacionalactualmente::all();
			$datosPoliciaActualmente = \App\FormF\Policiaactualmente::all();
			// ---necesarios para el edit
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
			$formularioG = \App\FormG\Gformulario::find($this->id);
			$intervenciones = $formularioG->intervencions;
			$docInterna = $formularioG->docinternas;
			$docExterna = $formularioG->docexternas;
			$infoSocioambiental = $formularioG->infosocioambientals;
			$intervencionEstrategias = $formularioG->intervencionestrategias;
			$notRelacionadas = $formularioG->notrelacionadas;
		//Fin datos del G

		//id de los formularios de una misma carpeta
			$idFormA = \App\Carpetas\Numerocarpeta::where('user_id', '=', $userId)
							->where('gformulario_id', '=', $this->id)
							->value('aformulario_id');
			$idFormB = \App\Carpetas\Numerocarpeta::where('user_id', '=', $userId)
								->where('gformulario_id', '=', $this->id)
								->value('bformulario_id');
			$idFormC = \App\Carpetas\Numerocarpeta::where('user_id', '=', $userId)
								->where('gformulario_id', '=', $this->id)
								->value('cformulario_id');
			$idFormD = \App\Carpetas\Numerocarpeta::where('user_id', '=', $userId)
								->where('gformulario_id', '=', $this->id)
								->value('dformulario_id');
			$idFormE = \App\Carpetas\Numerocarpeta::where('user_id', '=', $userId)
								->where('gformulario_id', '=', $this->id)
								->value('eformulario_id');
			$idFormF = \App\Carpetas\Numerocarpeta::where('user_id', '=', $userId)
								->where('gformulario_id', '=', $this->id)
								->value('fformulario_id');
			$idFormG = \App\Carpetas\Numerocarpeta::where('user_id', '=', $userId)
								->where('gformulario_id', '=', $this->id)
								->value('gformulario_id');
		//fin ids

		return view('pdfFormG', [
												'numeroCarpeta' => $numeroCarpeta,
												'aFormularios' => $aFormularios,
												//formulario A
												'datosModalidad' => $datosModalidad,
												'datosEstadoCaso' => $datosEstadoCaso,
												'datosCaratulacion' => $datosCaratulacion,
												'datosProfesional' => $datosProfesional,
												'datosIntervieneActualmente' => $datosIntervieneActualmente,
												'datosPresentacion' => $datosPresentacion,
												'datosOrganismo' => $datosOrganismo,
												//fin formulario A
												//formulario F
												'datosOrgJudicialesActualmente' => $datosOrgJudicialesActualmente,
												'datosProgNacionalesActualmente' => $datosProgNacionalesActualmente,
												'datosPoliciaActualmente' => $datosPoliciaActualmente,
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
												'idFormG' => $idFormG
												]);
    }
}
