<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personas extends Model
{
    protected $table = 'personas';
    protected $fillabel=[
                            'id' ,
                            'Apellido',
                            'Nombre','DNI',
                            'FechaNacimiento',
                            'Direccion','Mail',
                            'Telefono','Descripcion',
                            'IdLocalidad','IdRol',
                            'IdInstitucion',




                        ];
     public function localidad()
    {
        return $this ->belongsTo(departamentos::class);
    }
    public function Institucion()
    {
        return $this ->belongsTo(Insititucion::class);
    }
    public function roles()
    {
        return $this ->belongsTo(roles::class);
    }
}
