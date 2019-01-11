<?php

namespace App\FormG;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Intervencion extends Model
{
	use SoftDeletes;
    
    protected $fillable = ['fechaIntervencion','temaIntervencion_id','temaOtro','nombreContacto','telefonoContacto','descripcionIntervencion', 'user_id'];
    
    protected $dates = ['deleted_at', 'created_at', 'updated_at'];

    public function gformularios()
    {
        return $this->belongsToMany('\App\FormG\Gformulario');
    }
}
