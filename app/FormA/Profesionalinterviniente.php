<?php

namespace App\FormA;

use Illuminate\Database\Eloquent\Model;

class Profesionalinterviniente extends Model
{
	protected $fillable = ['profesional_id', 'datos_profesional_interviene_desde', 'datos_profesional_interviene_hasta', 'profesionalactualmente_id'];

	protected $dates = ['datos_profesional_interviene_desde', 'datos_profesional_interviene_hasta'];

    public function aformulario()
	{
		return $this->belongsToMany('\App\FormA\Aformulario');
	}

	public function profesional()
	{
		return $this->hasMany('App\FormA\Profesional');
	}

	public function profesionalactualmente()
	{
		return $this->hasMany('App\FormA\Profesionalactualmente');
	}
}
