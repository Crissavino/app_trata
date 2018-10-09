<?php

namespace App\FormB;

use Illuminate\Database\Eloquent\Model;

class Discapacidad extends Model
{
    protected $fillable = ['nombre'];

    public function getDiscapacidad()
    {
        return $this->nombre;
    }

    	public function getId()
    {
        return $this->id;
    }

    public function bformularios()
    {
    	return $this->belongsToMany('App\FormB\Bformulario');
    }
}
