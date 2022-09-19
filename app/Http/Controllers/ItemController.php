<?php

namespace App\Http\Controllers;

use App\Models\Inscripciones;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $item = item::latest() ->get();

        //---------------------------------------------


        return view('inscripciones.Inscripcion.anexo.itemCreate', ['items' => $item],compact('Especies')); //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create(Request $request)
    {
       // 'id','Cantidad','idEspecie','areaApl','areaUni','idInscripcion'

        $Variable =  $request->input("IdEspecie");
        //---------------------------------------------
        $item = Item::latest()->get();

        return view('inscripciones.Inscripcion.anexo.itemCreate', ['items' => $item],compact('Especies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $item)
    {
        //'Cantidad','idEspecie','areaApl','areaUni','idInscripcion

        $max= Inscripciones::max('id');
        $siguiente=$max+1;
        $item->idEspecie=$item->input("IdEspecie");
        $item->idInscripcion=$siguiente;
        $item->Cantidad = $item->input("Cantidad");
        $item->areaApl = $item->input("SupPINO");
        $item->areaUni=$item->input("Superficie");
        $item->save();
        return redirect()->route('Inscripcion.create');
        //-----------------------------------------------










    }

    /**
     * Display the specified resource.
     *
     * @param  \App\item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        $item = item::findOrFail($item);
        $item->delete();
        return redirect()->route('Inscripcion.create');
        //
    }
    //
}
