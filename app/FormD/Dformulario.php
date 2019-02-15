<?php

namespace App\FormD;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Dformulario extends Model
{
    use SoftDeletes;

    protected $fillable = ['calificaciongeneral_id', 'calificaciongeneral_otra', 'calificacionespecifica_id', 'finalidad_id', 'finalidad_otra', 'actividad_id', 'actividad_otra', 'privado_otra', 'domicilioVenta', 'paisCaptacion', 'provinciaCaptacion', 'ciudadCaptacion', 'rural_otra', 'marcaTextil', 'textil_otra', 'contactoexplotacion_id', 'contactoexplotacion_otro', 'viajo_id', 'acompanado_id', 'acompanadored_id', 'paisExplotacion', 'provinciaExplotacion', 'ciudadExplotacion', 'domicilio', 'residelugar_id', 'engano_id', 'haypersona_id', 'tipovictima_id', 'tarea', 'horasTarea', 'frecuenciapago_id', 'modalidadpagos_id', 'especiaconceptos_otro', 'montoPago', 'deuda_id', 'lugardeuda_id', 'motivodeuda_otro', 'permanencia_id', 'testigo_id', 'coordinadorPTN', 'coordinadorPTN_otro', 'haycorriente_id', 'haygas_id', 'haymedidas_otro', 'hayhacinamiento_id', 'hayagua_id', 'haybano_id', 'cuantosbano_id', 'material_id', 'material_otro', 'elementotrabajo_id', 'elementoseguridad_id', 'user_id', 'numeroCarpeta'];

    protected $dates = ['updated_at', 'deleted_at', 'created_at'];

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getId()
    {
        return $this->id;
    }

    //Relaciones

    public function privados()
    {
    	return $this->belongsToMany('\App\FormD\Privado');
    }

    public function textils()
    {
    	return $this->belongsToMany('\App\FormD\Textil');
    }

    public function rurals()
    {
    	return $this->belongsToMany('\App\FormD\Rural');
    }

    public function especiaconceptos()
    {
    	return $this->belongsToMany('\App\FormD\Especiaconcepto');
    }

    public function motivodeudas()
    {
    	return $this->belongsToMany('\App\FormD\Motivodeuda');
    }

    public function haymedidas()
    {
    	return $this->belongsToMany('\App\FormD\Haymedida');
    }

    public function numerocarpeta()
    {
        return $this->hasOne('App\Carpetas\Numerocarpeta');
    }

    //Scope

    public function scopeCarpeta($query, $numeroCarpeta)
    {
        if ($numeroCarpeta) {
            return $query->WHERE('numeroCarpeta', $numeroCarpeta);
        }
    }
}
