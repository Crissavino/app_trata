<?php

namespace App\FormA;

use Illuminate\Database\Eloquent\Model;

class Aformulario extends Model
{
    protected $fillable = ['datos_nombre_referencia', 
							'datos_numero_carpeta', 
							'datos_fecha_ingreso', 
							'modalidad_id',
							'modalidad_otro', 
							'estadocaso_id', 
							'datos_ente_judicial', 
							'caratulacionjudicial_id',
							'caratulacionjudicial_otro', 
							'datos_nro_causa'
						];

	protected $dates = ['datos_fecha_ingreso'];

	public function getId()
	{
		return $this->id;
	}

	public function profesionalintervinientes()
	{
		return $this->belongsToMany('\App\FormA\Profesionalinterviniente')
		            ->withPivot('id', 'aformulario_id', 'profesionalinterviniente_id');
	}
}
