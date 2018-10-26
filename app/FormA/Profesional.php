<?php

namespace App\FormA;

use Illuminate\Database\Eloquent\Model;

class Profesional extends Model
{
    public function getNombreCompletoyProfesion()
    {
    	return $this->nombre_apellido_equipo;
    }

    public function getId()
    {
        return $this->id;
    }
}
