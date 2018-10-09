<?php

namespace App\FormB;

use Illuminate\Database\Eloquent\Model;

class Franjaetaria extends Model
{
    public function getNombreFranja()
    {
        return $this->nombre;
    }

    	public function getIdFranja()
    {
        return $this->id;
    }
}
