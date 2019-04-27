<?php

namespace App\Mapa;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mapacalor extends Model
{
    use SoftDeletes;

    protected $fillable =  ['numero_carpeta', 'localidad', 'lat', 'long', 'bformulario_id','dformulario_id', 'user_id'];

    protected $dates = ['deleted_at', 'created_at', 'updated_at'];
}
