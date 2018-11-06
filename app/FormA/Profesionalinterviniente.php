<?php

namespace App\FormA;

use Illuminate\Database\Eloquent\Model;

class Profesionalinterviniente extends Model
{
	protected $fillable = ['profesional_id', 'datos_profesional_interviene_desde', 'datos_profesional_interviene_hasta', 'profesionalactualmente_id', 'user_id'];

	protected $dates = ['datos_profesional_interviene_desde', 'datos_profesional_interviene_hasta', 'deleted_at', 'created_at', 'updated_at'];

    public function aformularios()
	{
		return $this->belongsToMany('\App\FormA\Aformulario')
		            ->withPivot('id', 'profesionalinterviniente_id', 'aformulario_id');

	}
	
}
