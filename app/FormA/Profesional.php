<?php

namespace App\FormA;

use Illuminate\Database\Eloquent\Model;

class Profesional extends Model
{
    public function getNombreCompletoyProfesion()
    {
    	return $this->nombre_apellido_profesion;
    }

    public function getId()
    {
        return $this->id;
    }

    // public function prueba($id)
    // {
    //     $aFormulario = \App\FormA\Aformulario::find($id);

    //     $datosProfesional_interviniente = $aFormulario->profesionalintervinientes;

    //     foreach ($datosProfesional_interviniente as $key) {
    //         $id = $key->profesional_id;
    //         $profesional = \App\FormA\Profesional::find($id);
    //         $ids = $profesional->id;
    //         $nombres = $profesional->nombre_apellido_profesion;
    //     }
    //         dd($nombres);

    //     return $nombres;
    // }
}
