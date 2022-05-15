<?php

namespace App\Http\Controllers;

use App\Models\Instituciones;
use Illuminate\Http\Request;

class InstitucionesController extends Controller
{
    public function index(Request $request)
    {
        if ($request) {

            $Variable = $request->get('name');

            if ($Variable == "") {
                $institucion = Instituciones::latest()->paginate(5);
            } else {
                $institucion = Instituciones::where('Nombre', 'LIKE', '%' . $Variable . '%')
                    ->paginate(5);
            }
            $localidad = Instituciones::pluck('id', 'Nombre');
            $tipo = Instituciones::pluck('id', 'Nombre');
            return view('inscripciones.Institucion.index', ['Institucion' => $institucion], compact('localidad','tipo'));
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('inscripciones.Institucion.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Institucion  $institucion
     * @return \Illuminate\Http\Response
     */
    public function show(Instituciones $institucion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Institucion  $institucion
     * @return \Illuminate\Http\Response
     */
    public function edit(Instituciones $institucion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Institucion  $institucion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Instituciones $institucion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Institucion  $institucion
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Instituciones = Instituciones::findOrFail($id);
        $Instituciones->delete();
        return redirect()->route('Institucion.index');
    }
}
