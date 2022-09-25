<?php

namespace App\Exports;

use App\Models\Inscripciones;
use Maatwebsite\Excel\Concerns\FromCollection;

class InscripcionesExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    /**
     * El método de recopilación se utiliza para formatear los datos que se exportarán
     */
    public function collection()
    {
        return Inscripciones::all();
    }
}
