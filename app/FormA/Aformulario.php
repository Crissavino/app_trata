<?php

namespace App\FormA;

use Illuminate\Database\Eloquent\Model;

class Aformulario extends Model
{
    protected $fillable = ['datos_nombre_referencia', 
							'datos_numero_carpeta', 
							'datos_fecha_ingreso', 
							'modalidad_id', 
							'estadocaso_id', 
							'datos_ente_judicial', 
							'caratulacionjudial_id', 
							'datos_nro_causa'
						];

	protected $dates = ['datos_fecha_ingreso'];

	public function profesionalntervinientes()
	{
		return $this->belongsToMany('\App\FormA\Profesionalinterviniente');
	}
}
