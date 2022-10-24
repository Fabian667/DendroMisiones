<?php

namespace App\Http\Controllers;

use App\Models\Instituciones;
use App\Models\Localidades;
use App\Models\TipoInstituciones;
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
            $localidad = Localidades::pluck('id', 'Nombre');
            $tipo = Instituciones::pluck('id', 'Nombre');
            $tipoInstitucion = TipoInstituciones::pluck('id', 'Nombre');
            return view('inscripciones.Institucion.index', ['Institucion' => $institucion], compact('localidad', 'tipoInstitucion'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $localidad = Localidades::orderBy('Nombre', 'asc')->pluck('id', 'Nombre');
        $tipo = TipoInstituciones::pluck('id', 'Nombre');
        return view('inscripciones.Institucion.create', compact('localidad', 'tipo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //insert data
        //'id', 'Nombre','idTipo', 'Direccion', 'Mail', 'Telefono', 'Descripcion', 'IdLocalidad',
        $Institucion = new  Instituciones;
        $Institucion->Nombre = $request->input("Nombre");
        $Institucion->idTipo = $request->input("idTipo");
        $Institucion->Direccion = $request->input("Direccion");
        $Institucion->Telefono = $request->input("Telefono");
        $Institucion->Mail = $request->input("Mail");
        $Institucion->IdLocalidad = $request->input("IdLocalidad");
        $Institucion->Descripcion = $request->input("Descripcion");
        $Institucion->Nombre = $request->input("Nombre");
        $Institucion->save();
        return redirect()->route('Institucion.index');
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
    public function edit($id)
    {
        $institucion = Instituciones::findOrFail($id);
        $localidad = Localidades::pluck('id', 'Nombre');
        $tipo = Instituciones::pluck('id', 'Nombre');
        $tipoInstitucion = TipoInstituciones::pluck('id', 'Nombre');
        return view('inscripciones.Institucion.edit', ['Institucion' => $institucion], compact('localidad', 'tipoInstitucion'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Institucion  $institucion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $Institucion = Instituciones::findOrFail($id);
        $Institucion->Nombre = $request->input("Nombre");
        $Institucion->idTipo = $request->input("idTipo");
        $Institucion->Direccion = $request->input("Direccion");
        $Institucion->Telefono = $request->input("Telefono");
        $Institucion->Mail = $request->input("Mail");
        $Institucion->IdLocalidad = $request->input("IdLocalidad");
        $Institucion->Descripcion = $request->input("Descripcion");
        $Institucion->Nombre = $request->input("Nombre");
        $Institucion->save();
        $Institucion = Instituciones::all();
        return redirect()->route('Institucion.index');
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
