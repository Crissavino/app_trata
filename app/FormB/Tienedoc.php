<?php

namespace App\FormB;

use Illuminate\Database\Eloquent\Model;

class Tienedoc extends Model
{
    public function getNombreDocumentacion()
    {
        return $this->nombre;
    }

    	public function getIdDocumentacion()
    {
        return $this->id;
    }
}
