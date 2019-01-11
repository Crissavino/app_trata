<?php

namespace App\FormG;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Notrelacionada extends Model
{
    use SoftDeletes;
    
    protected $fillable = ['nombreArchivo', 'path', 'gformulario_id'];

    protected $dates = ['deleted_at', 'created_at', 'updated_at'];
}
