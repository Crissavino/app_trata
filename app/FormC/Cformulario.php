<?php

namespace App\FormC;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cformulario extends Model
{
    use SoftDeletes;

    protected $fillable = ['otraspersonas_id', 'user_id', 'numeroCarpeta'];

    protected $dates = ['deleted_at', 'created_at', 'updated_at'];

    public function convivientes()
    {
    	return $this->belongsToMany('\App\FormC\Conviviente');
    }
}
