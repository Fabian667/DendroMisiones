<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table='item';
    protected $fillabel=['id','Cantidad','idEspecie','areaApl','areaUni'];
    public function Inscripciones()
    {
        return $this->hasMany('App\Inscripciones');
    }
}
