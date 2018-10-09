<?php

namespace App\FormB;

use Illuminate\Database\Eloquent\Model;

class Genero extends Model
{
	public function getNombreGenero()
    {
        return $this->nombre;
    }

    	public function getIdGenero()
    {
        return $this->id;
    }

}
