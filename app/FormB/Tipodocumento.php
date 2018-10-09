<?php

namespace App\FormB;

use Illuminate\Database\Eloquent\Model;

class Tipodocumento extends Model
{
    public function getNombreTipoDocumento()
    {
        return $this->nombre;
    }

    	public function getIdTipoDocumento()
    {
        return $this->id;
    }
}
