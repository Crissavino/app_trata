<?php

namespace App\FormC;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cformulario extends Model
{
    use SoftDeletes;

    protected $fillable = ['otraspersonas_id', 'user_id', 'numeroCarpeta'];

    protected $dates = ['deleted_at', 'created_at', 'updated_at'];

    //Relaciones

    public function referentes()
    {
    	return $this->belongsToMany('\App\FormC\Referente');
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
