<?php

namespace App\FormB;

use Illuminate\Database\Eloquent\Model;

class Argciudad extends Model
{
    public function getNombreCiudad()
    {
        return $this->ciudad_nombre;
    }

    	public function getIdCiudad()
    {
        return $this->id;
    }

    public function getIdProvincia()
    {
    	return $this->provincia_id;
    }
}
