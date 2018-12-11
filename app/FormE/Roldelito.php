<?php

namespace App\FormE;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Roldelito extends Model
{
    use SoftDeletes;

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getId()
    {
        return $this->id;
    }

    public function eformularios()
    {
    	return $this->belongsToMany('\App\FormE\Eformulario');
    }
}
