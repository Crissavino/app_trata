<?php

namespace App\FormD;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Modalidadpago extends Model
{
    use SoftDeletes;

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getId()
    {
        return $this->id;
    }
}
