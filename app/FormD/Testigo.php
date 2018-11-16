<?php

namespace App\FormD;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Testigo extends Model
{
    use SoftDeletes;

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getId()
    {
        return $this->id;
    }
}
