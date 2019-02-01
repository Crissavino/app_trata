<?php

namespace App\FormB;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bformulario extends Model
{
    use SoftDeletes;

    protected $fillable =  ['victima_nombre_y_apellido', 'victima_nombre_y_apellido_desconoce', 'victima_apodo', 'victima_apodo_desconoce', 'genero_id', 'victima_genero_otro', 'tienedoc_id', 'tipodocumento_id', 'residenciaprecaria_id', 'victima_tipo_documento_otro', 'victima_documento', 'victima_documento_se_desconoce', 'victima_fecha_nacimiento', 'victima_edad', 'victima_edad_desconoce', 'franjaetaria_id', 'embarazorelevamiento_id', 'embarazoprevio_id', 'hijosembarazo_id', 'bajoefecto_id', 'victima_discapacidad', 'tienelesion_id', 'victima_lesion', 'lesionconstatada_id', 'victima_lesion_organismo', 'enfermedadcronica_id', 'victima_tipo_enfermedad_cronica', 'victima_limitacion_otra', 'niveleducativo_id', 'oficio_id', 'victima_oficio_cual', 'user_id', 'numeroCarpeta'];

    protected $dates = ['victima_fecha_nacimiento', 'deleted_at', 'created_at', 'updated_at'];

    //Relaciones

    public function discapacidads()
    {
    	return $this->belongsToMany('App\FormB\Discapacidad');
    }


    public function limitacions()
    {
    	return $this->belongsToMany('\App\FormB\Limitacion');
    }

    public function numerocarpeta()
    {
        return $this->belongsTo('App\Carpetas\Numerocarpeta');
    }

    public function lugarnacimientos()
    {
        return $this->hasMany('App\FormB\Lugarnacimiento');
    }

    //Scope

    // public function scopeCarpeta($query, $numeroCarpeta)
    // {
    //     if ($numeroCarpeta) {
    //         return $query->WHERE('numeroCarpeta', $numeroCarpeta);
    //     }
    // }

    public function scopeNombApe($query, $nombreApellido)
    {
        if ($nombreApellido) {
            return $query->WHERE('victima_nombre_y_apellido', 'LIKE', "%$nombreApellido%");
        }
    }

    public function scopeDNI($query, $dni)
    {
        if ($dni) {
            return $query->WHERE('victima_documento', 'LIKE', "%$dni%");
        }
    }



}


