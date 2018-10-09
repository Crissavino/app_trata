<?php

namespace App\FormB;

use Illuminate\Database\Eloquent\Model;

class Embarazoprevio extends Model
{
    public function getEmbarazoPrevio()
    {
        return $this->nombre;
    }

    	public function getId()
    {
        return $this->id;
    }
}
