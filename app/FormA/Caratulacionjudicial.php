<?php

namespace App\FormA;

use Illuminate\Database\Eloquent\Model;

class Caratulacionjudicial extends Model
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
