<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Localidades extends Model
{
    protected $table = 'localidad';
    protected $fillabel=[
        'id',
        'Nombre','CodigoPostal',
        'IdDepartamento',

    ];
    public function inscripciones()
    {
        return $this->hasMany('App\inscripciones');

    }
}
