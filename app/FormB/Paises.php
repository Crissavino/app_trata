<?php

namespace App\FormB;

use Illuminate\Database\Eloquent\Model;

class Paises extends Model
{
    public function getNombrePais()
    {
        return $this->nombre;
    }

    	public function getIdPais()
    {
        return $this->id;
    }
}
