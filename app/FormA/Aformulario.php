<?php

namespace App\FormA;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

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

	//Relaciones
	
	public function profesionalintervinientes()
	{
		return $this->belongsToMany('\App\FormA\Profesionalinterviniente')
		            ->withPivot('id', 'aformulario_id', 'profesionalinterviniente_id');
	}

	public function numerocarpeta()
    {
        return $this->belongsTo('App\Carpetas\Numerocarpeta');
    }

	//Scope

	// public function scopeCarpeta($query, $numeroCarpeta)
	// {
	// 	if ($numeroCarpeta) {
	// 		return $query->WHERE('datos_numero_carpeta', $numeroCarpeta);
	// 			// ->JOIN('numerocarpetas', 'aformularios.datos_numero_carpeta', '=', 'numerocarpetas.numeroCarpeta');
	// 	}
	// }

	public function scopeNombreRef($query, $nombreReferencia)
	{
		if ($nombreReferencia) {
			return $query->WHERE('datos_nombre_referencia', 'LIKE', "%$nombreReferencia%");

		}
	}

	public function scopeNumeroCausa($query, $numeroCausa)
	{
		if ($numeroCausa) {
			return $query->WHERE('datos_nro_causa', 'LIKE', "%$numeroCausa%");
		}
	}
}
