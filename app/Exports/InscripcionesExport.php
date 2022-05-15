<?php

namespace App\Exports;

use App\Models\Inscripciones;
use Maatwebsite\Excel\Concerns\FromCollection;

class InscripcionesExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Inscripciones::all();
    }
}
