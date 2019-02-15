<?php

namespace App\FormF;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fformulario extends Model
{
    use SoftDeletes;
    
    protected $fillable = ['numeroCarpeta', 'intervinieronOrganismos', 'intervinieronOrganismosActualmente', 'socioeconomicaCual', 'user_id'];

    protected $dates = ['deleted_at', 'created_at', 'updated_at'];

    //Relaciones

    public function orgjudicials()
    {
    	return $this->belongsToMany('\App\FormF\Orgjudicial');
    }

    public function orgprognacionals()
    {
    	return $this->belongsToMany('\App\FormF\Orgprognacional');
    }

    public function policias()
    {
    	return $this->belongsToMany('\App\FormF\Policia');
    }

    public function asistencias()
    {
        return $this->belongsToMany('\App\FormF\Asistencia');
    }

    public function socioeconomics()
    {
        return $this->belongsToMany('\App\FormF\Socioeconomic');
    }

    public function orgjudicialactualmentes()
    {
        return $this->belongsToMany('\App\FormF\Orgjudicialactualmente');
    }

    public function orgprognacionalactualmentes()
    {
        return $this->belongsToMany('\App\FormF\Orgprognacionalactualmente');
    }

    public function policiaactualmentes()
    {
        return $this->belongsToMany('\App\FormF\Policiaactualmente');
    }

    public function orgprognacionalotros()
    {
        return $this->hasMany('App\FormF\Orgprognacionalotro');
    }

    public function orgprogprovincials()
    {
        return $this->hasMany('App\FormF\Orgprogprovincial');
    }

    public function orgprogmunicipals()
    {
        return $this->hasMany('App\FormF\Orgprogmunicipal');
    }

    public function orgsoccivils()
    {
        return $this->hasMany('App\FormF\Orgsoccivil');
    }

    public function orgprognacionalactualmenteotros()
    {
        return $this->hasMany('App\FormF\Orgprognacionalactualmenteotro');
    }

    public function orgprogprovincialesactualmentes()
    {
        return $this->hasMany('App\FormF\Orgprogprovincialesactualmente');
    }

    public function orgprogmunicipalesactualmentes()
    {
        return $this->hasMany('App\FormF\Orgprogmunicipalesactualmente');
    }

    public function orgsoccivilactualmentes()
    {
        return $this->hasMany('App\FormF\Orgsoccivilactualmente');
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
