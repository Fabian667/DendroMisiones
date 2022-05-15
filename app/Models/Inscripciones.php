<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inscripciones extends Model
{
    protected $table = 'inscripcion';
    protected $fillabel = ['id', 'FechaInscripcion', 'IdUser', 'IdProductor', 'IdEntidad', 'IdReferente', 'ApellidoPr', 'NombrePr', 'DNIPr', 'FechaNacimientoPr', 'DireccionPr', 'MailPr', 'TelefonoPr', 'NomenclaturaCatastral', 'Lote', 'LAT', 'LONG', 'PDAPJECNIA', 'IdEspecie', 'SupPINO', 'PlantinCantidad', 'IdItem', 'DocumentacionLegal', 'DomicilioEmprendimiento', 'IdActa', 'Descripcion',];
    public function localidad()
    {
        return $this->belongsTo(localidad::class);
    }
    public function departamentos()
    {
        return $this->belongsTo(departamentos::class);
    }
    public function Institucion()
    {
        return $this->belongsTo(Institucion::class);
    }
    public function persona()
    {
        return $this->belongsTo(persona::class);
    }
    public function especies()
    {
        return $this->belongsTo(especies::class);
    }
    public function item()
    {
        return $this->belongsTo(item::class);
    }
}
