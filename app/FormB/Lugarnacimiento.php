<?php

namespace App\FormB;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lugarnacimiento extends Model
{
    use SoftDeletes;

    protected $fillable =  ['bformulario_id', 'paisNacimiento', 'provinciaNacimiento', 'ciudadNacimiento'];

    protected $dates = ['deleted_at', 'created_at', 'updated_at'];
}
