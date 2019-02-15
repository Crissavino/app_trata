<?php

namespace App\FormE;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Eformulario extends Model
{
    use SoftDeletes;

    protected $fillable = ['nombreApellido', 'edocumentos_id', 'documentoCual', 'numeroDocumento', 'edad', 'genero_id', 'generoCual', 'vinculacion_id', 'vinculacionCual', 'user_id', 'numeroCarpeta'];

    protected $dates = ['deleted_at', 'created_at', 'updated_at'];

    //Relaciones

    public function roldelitos()
    {
    	return $this->belongsToMany('\App\FormE\Roldelito');
    }

    public function numerocarpeta()
    {
        return $this->hasOne('App\Carpetas\Numerocarpeta');
    }

    //Scope

    public function scopeCarpeta($query, $numeroCarpeta)
    {
        if ($numeroCarpeta) {
            return $query->WHERE('numeroCarpeta', $numeroCarpeta);
        }
    }
}
