<?php

namespace App\FormA;

use Illuminate\Database\Eloquent\Model;

class Profesional extends Model
{
    public function getNombreCompletoyProfesion()
    {
    	$nombre = $this->nombre_apellido;
    	$profesion = $this->prefesion;
        return $nombre.' - '.$profesion;
    }

    public function getProfesion()
    {
    	return $this->profesion;
    }

    public function getId()
    {
        return $this->id;
    }
}
