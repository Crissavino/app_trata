<?php

namespace App\FormC;

use Illuminate\Database\Eloquent\Model;

class Referente extends Model
{
    protected $fillable = ['nombre_apellido', 'edad', 'referenteContacto', 'vinculo_id', 'vinculo_otro', 'user_id'];

    protected $dates = ['deleted_at', 'created_at', 'updated_at'];

    public function cformularios()
    {
    	return $this->belongsToMany('\App\FormC\Cformularios');
    }
}
