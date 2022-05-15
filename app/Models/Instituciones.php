<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instituciones extends Model
{
    protected $table = 'Institucion';
    protected $fillabel=['id', 'Nombre','idTipo', 'Direccion', 'Mail', 'Telefono', 'Descripcion', 'IdLocalidad',];

    public function Persona()
    {
        return $this->hasMany('App\Persona');

    }
    //
}
