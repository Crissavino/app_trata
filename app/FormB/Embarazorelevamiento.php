<?php

namespace App\FormB;

use Illuminate\Database\Eloquent\Model;

class Embarazorelevamiento extends Model
{
    public function getEmbarazada()
    {
        return $this->nombre;
    }

    	public function getId()
    {
        return $this->id;
    }
}
