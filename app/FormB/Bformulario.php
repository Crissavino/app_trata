<?php

namespace App\FormB;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bformulario extends Model
{
    use SoftDeletes;

    protected $fillable =  ['victima_nombre_y_apellido', 'victima_nombre_y_apellido_desconoce', 'victima_apodo', 'victima_apodo_desconoce', 'genero_id', 'victima_genero_otro', 'tienedoc_id', 'tipodocumento_id', 'residenciaprecaria_id', 'victima_tipo_documento_otro', 'victima_documento', 'victima_documento_se_desconoce', 'pais_id', 'argprovincia_id', 'localidadAR_id', 'urprovincia_id', 'chprovincia_id', 'brestado_id', 'victima_fecha_nacimiento', 'victima_edad', 'victima_edad_desconoce', 'franjaetaria_id', 'embarazorelevamiento_id', 'embarazoprevio_id', 'hijosembarazo_id', 'bajoefecto_id', 'victima_discapacidad', 'tienelesion_id', 'victima_lesion', 'lesionconstatada_id', 'victima_lesion_organismo', 'enfermedadcronica_id', 'victima_tipo_enfermedad_cronica', 'victima_limitacion_otra', 'niveleducativo_id', 'oficio_id', 'victima_oficio_cual'];

    protected $dates = ['victima_fecha_nacimiento', 'deleted_at', 'created_at', 'updated_at'];



    public function discapacidads()
    {
    	return $this->belongsToMany('App\FormB\Discapacidad');
    }


    public function limitacions()
    {
    	return $this->belongsToMany('\App\FormB\Limitacion');
    }



}


