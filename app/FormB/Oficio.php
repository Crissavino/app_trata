<?php

namespace App\FormB;

use Illuminate\Database\Eloquent\Model;

class Oficio extends Model
{
    public function getOficio()
    {
        return $this->nombre;
    }

    public function getId()
    {
        return $this->id;
    }
}
