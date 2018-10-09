<?php

namespace App\FormB;

use Illuminate\Database\Eloquent\Model;

class Bajoefecto extends Model
{
    public function getBajoEfecto()
    {
        return $this->nombre;
    }

    public function getId()
    {
        return $this->id;
    }
}
