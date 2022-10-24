<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoInstituciones extends Model
{
    protected $table = 'tipoinstitucion';
    protected $fillabel=[
        'id',
        'Nombre'

    ];
    public function Institucion()
    {
        return $this->hasMany(Institucion::class);
    }
}
