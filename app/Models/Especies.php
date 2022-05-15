<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Especies extends Model
{

    protected $table='especies';
    protected $fillabel=['id','Nombre','especieUnidad'];
    public function Inscripciones()
    {
        return $this->hasMany('App\Inscripciones');
    }
}
