<?php

namespace App\FormB;

use Illuminate\Database\Eloquent\Model;

class Niveleducativo extends Model
{
    public function getNivelEducativo()
    {
        return $this->nombre;
    }

    public function getId()
    {
        return $this->id;
    }
}
