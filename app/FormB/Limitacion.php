<?php

namespace App\FormB;

use Illuminate\Database\Eloquent\Model;

class Limitacion extends Model
{
    public function getLimitacion()
    {
        return $this->nombre;
    }

    	public function getId()
    {
        return $this->id;
    }

    public function bformularios()
    {
    	return $this->belongsToMany('\App\FormB\Bformulario');
    }
}
