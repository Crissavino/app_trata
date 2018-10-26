<?php

namespace App\FormB;

use Illuminate\Database\Eloquent\Model;

class Residenciaprecaria extends Model
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
