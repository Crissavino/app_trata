<?php

namespace App\FormC;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Referente extends Model
{
    use SoftDeletes;
    
    protected $fillable = ['nombre_apellido', 'edad', 'referenteContacto', 'vinculo_id', 'vinculo_otro', 'user_id'];

    protected $dates = ['deleted_at', 'created_at', 'updated_at'];

    public function cformularios()
    {
    	return $this->belongsToMany('\App\FormC\Cformularios');
    }
}
