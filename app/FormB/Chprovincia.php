<?php

namespace App\FormB;

use Illuminate\Database\Eloquent\Model;

class Chprovincia extends Model
{
    public function getNombreProvincia()
    {
        return $this->provincia_nombre;
    }

    	public function getIdProvincia()
    {
        return $this->id;
    }
}
