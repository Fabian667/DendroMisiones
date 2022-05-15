<?php

namespace App\Http\Controllers;

use App\Exports\InscripcionesExport;
use App\Models\Departamentos;
use App\Models\Especies;
use App\Models\Inscripciones;
use App\Models\Instituciones;
use App\Models\Item;
use App\Models\Localidades;
use App\Models\Personas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Maatwebsite\Excel\Facades\Excel;

class InscripcionesController extends Controller
{
    public function index(Request $request)
    {
        if ($request) {
            // $FechaHasta=$request->get('Hasta');
            $Variable = $request->get('name');
            $FechaDesde = $request->get('desde');
            if ($Variable == "" && $FechaDesde == "") {
                $insripcion = inscripciones::latest()->paginate(6);
            } else if ($FechaDesde !== "") {
                $insripcion = inscripciones::where('FechaInscripcion', '>=',  $FechaDesde)
                    ->paginate(4);
            } else {
                $insripcion = inscripciones::where('ApellidoPr', 'LIKE', '%' . $Variable . '%')
                    ->orwhere('NombrePr', 'LIKE', '%' . $Variable . '%')
                    ->orwhere('DNIPr', 'LIKE', '%' . $Variable . '%')
                    ->paginate(4);
            }
            $localidad = Localidades::pluck('id', 'Nombre');
            return view('inscripciones.Inscripcion.index', ['Inscripciones' => $insripcion], compact('localidad'));
        }
    }
    public function export()
    {
        return Excel::download(new InscripcionesExport, 'Inscriptos.xlsx');
    }

    public function create(Request $request)
    {

        $Variable =  $request->input("DNIPr");
        //---------------------------------------------
        $insripcion = inscripciones::latest()->get();
        $Especies = Especies::pluck('id', 'Nombre');
        $localidad = Localidades::orderBy('Nombre', 'asc')->pluck('id', 'Nombre');
        $Institucion = Instituciones::orderBy('Nombre', 'asc')->pluck('id', 'Nombre');
        $departamentos = Departamentos::pluck('id', 'Nombre');
        $persona =   Personas::where('IdRol', '=', '3')->get()->pluck('id', 'Apellido', 'Nombre');
        $productor = Personas::Where('DNI', '=', $Variable)->get();
          //----------------------
           $item = new Item();
           $action = URL::route('Inscripcion.create',);


        return view('inscripciones.Inscripcion.create', ['Inscripciones' => $insripcion, 'productor' => $productor, 'ItemList' => $item], compact('localidad', 'Institucion', 'persona', 'Especies','action'));
    }
    public function LoadItem(Request $item)
    {
        $Plantin =  $item->input("plantin");
        $Unidad =  $item->input("Unidad");
        $Cantidad =  $item->input("Cantidad");
        $Superficie =  $item->input("Superficie");



    }






    public function store(Request $request)
    {
        $request->validate([
            'DNIPr' => 'required',
        ]);
        $insripcion = new inscripciones();
        $insripcion->FechaInscripcion = $request->input("FechaInscripcion");
        $insripcion->ApellidoPr = $request->input("ApellidoPr");
        $insripcion->NombrePr = $request->input("NombrePr");
        $insripcion->DNIPr = $request->input("DNIPr");
        $insripcion->DireccionPr = $request->input("DireccionPr");
        $insripcion->IdEntidad = $request->input("IdEntidad");
        $insripcion->MailPr = $request->input("MailPr");
        $insripcion->TelefonoPr = $request->input("TelefonoPr");
        $insripcion->NomenclaturaCatastral = $request->input("NomenclaturaCatastral");
        $insripcion->Lote = $request->input("Lote");
        $insripcion->LAT = $request->input("LAT");
        $insripcion->LONG = $request->input("LONG");
        $insripcion->PDAPJECNIA = $request->input("PDAPJECNIA");
        $insripcion->IdEspecie = $request->input("IdEspecie");
        $insripcion->SupPINO = $request->input("SupPINO");
        $insripcion->PlantinCantidad = $request->input("PlantinCantidad");
        $insripcion->DocumentacionLegal = $request->input("DocumentacionLegal");
        $insripcion->DomicilioEmprendimiento = $request->input("DomicilioEmprendimiento");
        $insripcion->Descripcion = $request->input("Descripcion");
        $insripcion->DocumentacionLegal = $request->input("DocumentacionLegal");
        $insripcion->IdReferente = $request->input("IdReferente");
        $insripcion->save();
        $insripcion = inscripciones::all();
        return back();
        $item = new item();
    }
    public function item(Request $items)
    {
        $item = new Item();
        $item->Cantidad = $items->input("Cantidad");
        return view('inscripciones.Inscripcion.create', ['Item' => $item]);

    }

    public function show(Inscripciones $inscripciones)
    {
    }
    public function edit($id)
    {
        $inscriptos = inscripciones::findOrFail($id);
        $Especies = especies::pluck('id', 'Nombre');
        $localidad = Localidades::orderBy('Nombre', 'asc')->pluck('id', 'Nombre');
        $Institucion = Instituciones::orderBy('Nombre', 'asc')->pluck('id', 'Nombre');
        $departamentos = departamentos::pluck('id', 'Nombre');
        $persona =   Personas::where('IdRol', '=', '3')->get()->pluck('id', 'Apellido', 'Nombre');
        return view('inscripciones.inscripcion.edit', ['inscripciones' => $inscriptos], compact('localidad', 'Institucion', 'Especies', 'departamentos', 'persona'));
    }

    public function update(Request $request, $id)
    {
        $insripcion = inscripciones::findOrFail($id);
        $insripcion->FechaInscripcion = $request->input("FechaInscripcion");
        $insripcion->ApellidoPr = $request->input("ApellidoPr");
        $insripcion->NombrePr = $request->input("NombrePr");
        $insripcion->DNIPr = $request->input("DNIPr");
        $insripcion->DireccionPr = $request->input("DireccionPr");
        $insripcion->IdEntidad = $request->input("IdEntidad");
        $insripcion->MailPr = $request->input("MailPr");
        $insripcion->TelefonoPr = $request->input("TelefonoPr");
        $insripcion->NomenclaturaCatastral = $request->input("NomenclaturaCatastral");
        $insripcion->Lote = $request->input("Lote");
        $insripcion->LAT = $request->input("LAT");
        $insripcion->LONG = $request->input("LONG");
        $insripcion->PDAPJECNIA = $request->input("PDAPJECNIA");
        $insripcion->IdEspecie = $request->input("IdEspecie");
        $insripcion->SupPINO = $request->input("SupPINO");
        $insripcion->PlantinCantidad = $request->input("PlantinCantidad");
        $insripcion->DocumentacionLegal = $request->input("DocumentacionLegal");
        $insripcion->DomicilioEmprendimiento = $request->input("DomicilioEmprendimiento");
        $insripcion->Descripcion = $request->input("Descripcion");
        $insripcion->DocumentacionLegal = $request->input("DocumentacionLegal");
        $insripcion->IdReferente = $request->input("IdReferente");
        $insripcion->save();
        $insripcion = inscripciones::all();
        return redirect()->route('Inscripcion.index');
    }

    public function destroy($id)
    {
        $inscripciones = inscripciones::findOrFail($id);
        $inscripciones->delete();
        return redirect()->route('Inscripcion.index');
    }
}
