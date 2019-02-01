<?php

namespace App\FormB;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mapa extends Model
{
    use SoftDeletes;

    protected $fillable =  ['lat', 'long'];

    protected $dates = ['deleted_at', 'created_at', 'updated_at'];
}
