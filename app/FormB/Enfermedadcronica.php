<?php

namespace App\FormB;

use Illuminate\Database\Eloquent\Model;

class Enfermedadcronica extends Model
{
    public function getEnfermedadCronica()
    {
        return $this->nombre;
    }

    public function getId()
    {
        return $this->id;
    }
}
