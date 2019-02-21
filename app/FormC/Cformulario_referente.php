<?php

namespace App\FormC;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cformulario_referente extends Model
{
    use SoftDeletes;
    
    protected $dates = ['deleted_at', 'created_at', 'updated_at'];
}
