<?php

namespace App\FormB;

use Illuminate\Database\Eloquent\Model;

class Tienelesion extends Model
{
    public function getLesion()
    {
        return $this->nombre;
    }

    public function getId()
    {
        return $this->id;
    }
}
