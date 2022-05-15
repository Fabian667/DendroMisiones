<?php

namespace App\Http\Controllers;

use App\Exports\ProductorExport;
use App\Models\Instituciones;
use App\Models\Localidades;
use App\Models\Personas;
use App\Models\Roles;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ProductorController extends Controller
{
    public function index(Request $request)
    {
        if ($request) {
            $apellido = $request->get('name');
            if ($apellido == "") {
                $productor = Personas::where('IdRol', '=', '2')->paginate(5);
            } else {
                $productor = Personas::where('IdRol', '=', '2')
                    ->where('Apellido', 'LIKE', '%' . $apellido . '%')
                    ->orwhere('Nombre', 'LIKE', '%' . $apellido . '%')
                    ->orwhere('DNI', 'LIKE', '%' . $apellido . '%')
                    ->paginate(6);
            }
            $rol = Roles::pluck('id', 'Nombre');
            $institucion = Instituciones::pluck('id', 'Nombre');
            $localidad = Localidades::pluck('id', 'Nombre');
            return view('inscripciones.Productor.index', ['productor' => $productor], compact('institucion'));
        }
    }
    public function export()
    {
        return Excel::download(new ProductorExport, 'Productores.xlsx');
    }
    public function create()
    {
        $productor =   Personas::where('IdRol', '=', '2')->get();
        $localidad = Localidades::pluck('id', 'Nombre');
        $Institucion = Instituciones::orderBy('Nombre')->pluck('id', 'Nombre');
        return view('inscripciones.Productor.create', ['persona' => $productor], compact('localidad', 'Institucion'));
    }
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
        $persona->Apellido = $request->input("Apellido");
        $persona->Nombre = $request->input("Nombre");
        $persona->DNI = $request->input("DNI");
        $persona->Direccion = $request->input("Direccion");
        $persona->IdLocalidad = $request->input("IdLocalidad");
        $persona->Mail = $request->input("Mail");
        $persona->Telefono = $request->input("Telefono");
        $persona->IdRol = "2";
        $persona->IdInstitucion = $request->input("IdInstitucion");
        $persona->Descripcion = $request->input("Descripcion");
        $persona->save();
        $persona = Personas::all();
        return redirect()->route('Productor.index');
    }
    public function show(Personas $productor)
    {
    }
    public function edit($id)
    {
        $productor = Personas::findOrFail($id);
        $localidad = Localidades::pluck('id', 'Nombre');
        $Institucion = Instituciones::pluck('id', 'Nombre');
        return view('inscripciones.Productor.edit', ['persona' => $productor], compact('localidad', 'Institucion'));
    }
    public function update(Request $request, $id)
    {
        $productor = Personas::findOrFail($id);
        $productor->Apellido = $request->input("Apellido");
        $productor->Nombre = $request->input("Nombre");
        $productor->DNI = $request->input("DNI");
        $productor->Direccion = $request->input("Direccion");
        $productor->IdLocalidad = $request->input("IdLocalidad");
        $productor->Mail = $request->input("Mail");
        $productor->Telefono = $request->input("Telefono");
        $productor->IdRol = "2";
        $productor->IdInstitucion = $request->input("IdInstitucion");
        $productor->Descripcion = $request->input("Descripcion");
        $productor->save();
        $productor = Personas::all();
        return redirect()->route('Productor.index');
    }
    public function destroy($id)
    {
        $persona = Personas::findOrFail($id);
        $persona->delete();
        return redirect()->route('Productor.index');
    }
}
