<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromCollection;

class EstadisticaExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    // public function collection()
    // {
    //     //
    // }

    public function view(): View
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
}
