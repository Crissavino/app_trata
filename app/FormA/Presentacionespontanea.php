<?php

namespace App\FormA;

use Illuminate\Database\Eloquent\Model;

class Presentacionespontanea extends Model
{
    public function getNombre()
    {
        return $this->nombre;
    }

    public function getId()
    {
        return $this->id;
    }
}
