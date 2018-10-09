<?php

namespace App\FormB;

use Illuminate\Database\Eloquent\Model;

class Hijosembarazo extends Model
{
     public function getHijos()
    {
        return $this->nombre;
    }

    	public function getId()
    {
        return $this->id;
    }
}
