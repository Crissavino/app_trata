<?php

namespace App\FormA;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Aformulario extends Model
{
	use SoftDeletes;
	
    protected $fillable = ['datos_nombre_referencia', 
							'datos_numero_carpeta', 
							'datos_fecha_ingreso', 
							'modalidad_id',
							'modalidad_otro', 
							'estadocaso_id', 
							'datos_ente_judicial', 
							'caratulacionjudicial_id',
							'caratulacionjudicial_otro',
							'presentacion_espontanea_id',
							'derivacion_otro_organismo_id',
							'derivacion_otro_organismo_cual',
							'datos_nro_causa',
							'user_id',
						];

	protected $dates = ['datos_fecha_ingreso', 'deleted_at', 'created_at', 'updated_at'];

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
