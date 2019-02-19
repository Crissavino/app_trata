<?php

namespace App\Carpetas;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\SoftDeletes;

class Numerocarpeta extends Model
{
    use SoftDeletes;

    protected $fillable = ['numeroCarpeta', 'aformulario_id', 'bformulario_id', 'cformulario_id', 'dformulario_id', 'eformulario_id', 'fformulario_id', 'gformulario_id', 'user_id'];

    protected $dates = ['deleted_at', 'created_at', 'updated_at'];
    
    // public function fformularios()
    // {
    // 	return $this->belongsToMany('\App\FormF\Fformulario');
    // }

    //Relaciones

    public function aformulario()
    {
        return $this->belongsTo('App\FormA\Aformulario');
    }

    public function bformulario()
    {
        return $this->belongsTo('App\FormB\Bformulario');
    }

    public function cformulario()
    {
        return $this->belongsTo('App\FormC\Cformulario');
    }

    public function dformulario()
    {
        return $this->belongsTo('App\FormD\Dformulario');
    }

    public function eformulario()
    {
        return $this->belongsTo('App\FormE\Eformulario');
    }

    public function fformulario()
    {
        return $this->belongsTo('App\FormF\Fformulario');
    }

    public function gformulario()
    {
        return $this->belongsTo('App\FormG\Gformulario');
    }

    //Scopes

    public function scopeCarpeta($query, $numeroCarpeta)
	{
		if ($numeroCarpeta) {
			return $query->WHERE('numeroCarpeta', $numeroCarpeta);
                // ->JOIN('aformularios', 'aformularios.datos_numero_carpeta', '=', 'numerocarpetas.numeroCarpeta');
		}
	}

	// public function scopeNumeroCausa($query, $numeroCausa)
	// {
	// 	if ($numeroCausa) {
	// 		return $query->WHERE('datos_nro_causa', 'LIKE', "%$numeroCausa%");
	// 	}
	// }
}