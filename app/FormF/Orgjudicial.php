<?php

namespace App\FormF;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Orgjudicial extends Model
{
    use SoftDeletes;
    
    public function fformularios()
    {
    	return $this->belongsToMany('\App\FormF\Fformulario');
    }
}
