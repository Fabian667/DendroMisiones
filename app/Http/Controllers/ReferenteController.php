<?php

namespace App\Http\Controllers;

use App\Models\Instituciones;
use App\Models\Localidades;
use App\Models\Personas;
use App\Models\Roles;
use Illuminate\Http\Request;

class ReferenteController extends Controller
{
    public function index(Request $request)
    {
        if ($request) {
            $apellido = $request->get('name');
            if ($apellido == "") {
                $referente = Personas::where('IdRol', '!=', '2')->get();
            } else {
                $referente = Personas::where('IdRol', '!=', '2')
                    ->where('Apellido', 'LIKE', '%' . $apellido . '%')
                    ->orwhere('Nombre', 'LIKE', '%' . $apellido . '%')
                    ->orwhere('DNI', 'LIKE', '%' . $apellido . '%')
                    ->get();
            }
            $rol = Roles::pluck('id', 'Nombre');
            $institucion = Instituciones::pluck('id', 'Nombre');
            $localidad = Localidades::pluck('id', 'Nombre');
            return view('inscripciones.Referente.index', ['Personas' => $referente], compact('institucion'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $referente =   Personas::where('IdRol', '=', '3')->get();
        $localidad = Localidades::orderBy('Nombre', 'asc')->pluck('id', 'Nombre');
        $Institucion = Instituciones::orderBy('Nombre', 'asc')->pluck('id', 'Nombre');
        $rol = roles::pluck('id', 'Nombre');
        return view('inscripciones.Referente.create', ['persona' => $referente], compact('localidad', 'Institucion', 'rol'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
                'Apellido' => 'required',
                'Nombre' => 'required',
                'DNI' => 'required',
                'Mail' => 'required',
                //'email' => 'required|email|unique:REF',
            ]);
            $persona = new Personas();
            $persona->FechaNacimiento = $request->input("FechaNacimiento");
            $persona->Apellido = $request->input("Apellido");
            $persona->Nombre = $request->input("Nombre");
            $persona->DNI = $request->input("DNI");
            $persona->Direccion = $request->input("Direccion");
            $persona->IdLocalidad = $request->input("IdLocalidad");
            $persona->Mail = $request->input("Mail");
            $persona->Telefono = $request->input("Telefono");
            $persona->IdRol = "3";
            $persona->IdInstitucion = $request->input("IdInstitucion");
            $persona->Descripcion = $request->input("Descripcion");
            $persona->save();
            $persona = Personas::all();
             return redirect()->route('Referente.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $referente = Personas::findOrFail($id);
        $localidad = Localidades::pluck('id', 'Nombre');
        $Institucion = Instituciones::pluck('id', 'Nombre');
        return view('inscripciones.Referente.edit', ['persona' => $referente], compact('localidad', 'Institucion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $referente = Personas::findOrFail($id);
        $referente->Apellido = $request->input("Apellido");
        $referente->Nombre = $request->input("Nombre");
        $referente->DNI = $request->input("DNI");
        $referente->Direccion = $request->input("Direccion");
        $referente->IdLocalidad = $request->input("IdLocalidad");
        $referente->Mail = $request->input("Mail");
        $referente->Telefono = $request->input("Telefono");
        $referente->IdRol = "3";
        $referente->IdInstitucion = $request->input("IdInstitucion");
        $referente->Descripcion = $request->input("Descripcion");
        $referente->save();
        $referente = Personas::all();
        return redirect()->route('Referente.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $persona = Personas::findOrFail($id);
        $persona->delete();
        return redirect()->route('Referente.index');
    }
}
