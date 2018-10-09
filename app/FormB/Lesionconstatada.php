<?php

namespace App\FormB;

use Illuminate\Database\Eloquent\Model;

class Lesionconstatada extends Model
{
    public function getLesionConstatada()
    {
        return $this->nombre;
    }

    public function getId()
    {
        return $this->id;
    }
}
