<?php

namespace App\Exports;

use App\Models\Instituciones;
use App\Models\Personas;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\FromView;


class ProductorExport implements  FromView
{




    public function view(): View
    {
        $Institucion = Instituciones::orderBy('Nombre', 'asc')->pluck('id', 'Nombre');

        return view('inscripciones.Productor.index', ['productor' => Personas::all(),('institucion') =>Instituciones::all()]);
    }
    // {
    // return query()
    //     ->innerJoin('institucion')
    //     ->select('personas.Apellido', 'personas.Nombre', 'personas.DNI', 'personas.FechaNacimiento','personas.Telefono','institucion.Nombre');

    // }



}
