<?php

namespace App\Http\Controllers;

use App\Models\Departamentos;
use App\Models\Provincias;
use App\Models\Zonas;
use Illuminate\Http\Request;

class DepartamentosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {


        if ($request) {

            $Variable = $request->get('name');

            if ($Variable == "") {
                $departamento = Departamentos::latest()->get();
            } else {
                $departamento = departamentos::where('Nombre', 'LIKE', '%' . $Variable . '%')
                    ->orwhere('CodigoPostal', 'LIKE', '%' . $Variable . '%')

                    ->get();
            }
            $provincias = Provincias::pluck('id', 'Nombre');
            $zonas = Zonas::pluck('id', 'Nombre');
            return view('Configuracion.Departamentos.index', ['departamentos' => $departamento], compact('provincias', 'zonas'));
        }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    //     public function busqueda(Request $request)
    // {
    //     $input = $request->all();

    //     if($request->get('busqueda')){
    //         $departamento = departamentos::where("Nombre", "LIKE", "%{$request->get('busqueda')}%")
    //             ->paginate(5);
    //             return view('COnfiguracion.Departamentos.index')->with('buscar', $departamento);
    //     }

    //    // return view('COnfiguracion.Departamentos.index');

    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'Nombre' => 'required',
            'IdZona' => ['required'],
            'IdProvincia' => ['required']

        ]);
        $departamento = new departamentos();
        $departamento->Nombre = $request->input("Nombre");
        $departamento->CodigoPostal = $request->input("CodigoPostal");
        $departamento->IdZona = $request->input("IdZona");
        $departamento->IdProvincia = $request->input("IdProvincia");
        $departamento->save();
        $departamento = departamentos::all();
        return back();
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
        //
    }


    public function search(Request $request)
    {
        $departamento = departamentos::where('Nombre', 'like', '%' . $request->Nombre . '%')->get();
       // return View::make('list', compact('departamentos'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $departamentos = departamentos::findOrFail($id);
        $departamentos->delete();
        return back();
    }
}
