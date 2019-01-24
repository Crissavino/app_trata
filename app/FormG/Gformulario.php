<?php

namespace App\FormG;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gformulario extends Model
{
	use SoftDeletes;
    
    protected $fillable = ['numeroCarpeta', 'introduccion', 'user_id'];

    protected $dates = ['deleted_at', 'created_at', 'updated_at'];

    //Relaciones

    public function intervencions()
    {
        return $this->belongsToMany('\App\FormG\Intervencion');
    }

    public function docinternas()
    {
        return $this->hasMany('App\FormG\Docinterna');
    }

    public function docexternas()
    {
        return $this->hasMany('App\FormG\Docexterna');
    }

    public function notrelacionadas()
    {
        return $this->hasMany('App\FormG\Notrelacionada');
    }

    public function intervencionestrategias()
    {
        return $this->hasMany('App\FormG\Intervencionestrategia');
    }

    public function infosocioambientals()
    {
        return $this->hasMany('App\FormG\Infosocioambiental');
    }

    public function numerocarpeta()
    {
        return $this->belongsTo('App\Carpetas\Numerocarpeta');
    }

    //Scope

    public function scopeCarpeta($query, $numeroCarpeta)
    {
        if ($numeroCarpeta) {
            return $query->WHERE('numeroCarpeta', $numeroCarpeta);
        }
    }
}

    
  