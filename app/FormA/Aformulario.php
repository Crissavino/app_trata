<?php

namespace App\FormA;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Aformulario extends Model
{
	use SoftDeletes;
	
    protected $fillable = [	'id',
							'datos_nombre_referencia',
							'datos_numero_carpeta',
							'datos_fecha_ingreso',
							'modalidad_id',
							'modalidad_otro',
							'estadocaso_id',
							'motivocierre_id',
							'datos_ente_judicial',
							'caratulacionjudicial_id',
							'caratulacionjudicial_otro',
							'presentacion_espontanea_id',
							'derivacion_otro_organismo_id',
							'derivacion_otro_organismo_cual',
							'datos_nro_causa',
							'ambito_id',
							'departamento_id',
							'otrasprov_id',
							'fiscalia_juzgado',
							'tipovictima_id',
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
        return $this->hasOne('App\Carpetas\Numerocarpeta');
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

	public function scopeAmbitoCompetencia($query, $ambitoCompetencia)
	{
		if ($ambitoCompetencia) {
			return $query->WHERE('ambito_id', 'LIKE', "%$ambitoCompetencia%");
		}
	}
	public function scopeJuzgado($query, $fiscaliaJuzgado)
	{
		if ($fiscaliaJuzgado) {
			return $query->WHERE('fiscalia_juzgado', 'LIKE', "%$fiscaliaJuzgado%");
		}
	}
}
