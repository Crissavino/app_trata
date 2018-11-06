<?php

namespace App\FormC;

use Illuminate\Database\Eloquent\Model;

class Conviviente extends Model
{
    protected $fillable = ['nombre_apellido', 'edad', 'genero_id', 'vinculo_id', 'vinculo_otro', 'user_id'];

    protected $dates = ['deleted_at', 'created_at', 'updated_at'];

    public function cformularios()
    {
    	return $this->belongsToMany('\App\FormC\Cformularios');
    }
}
