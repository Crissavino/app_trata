<?php

namespace App\FormB;

use Illuminate\Database\Eloquent\Model;

class Brestado extends Model
{
    public function getNombreEstado()
    {
        return $this->nombre_estado;
    }

    	public function getIdEstado()
    {
        return $this->id;
    }
}
