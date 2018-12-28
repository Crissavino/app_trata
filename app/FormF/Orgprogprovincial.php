<?php

namespace App\FormF;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Model;

class Orgprogprovincial extends Model
{
    use SoftDeletes;
    
    protected $fillable = ['nombreOrganismo', 'fformulario_id'];
    
    protected $dates = ['deleted_at', 'created_at', 'updated_at'];
}
