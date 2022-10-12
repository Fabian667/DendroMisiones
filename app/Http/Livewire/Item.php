<?php

namespace App\Http\Livewire;

use App\Models\Especies;
use App\Models\Inscripciones;
use App\Models\Item as ModelsItem;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Item extends Component
{
    public $Cantidad, $idEspecie, $areaUni, $areaApl,$idInscripcion;

    public function render()
    {
        $max= Inscripciones::max('id');
        $siguiente=$max+1;
         $item = DB::table('item')->where('idInscripcion', $siguiente)->get();

        // $item = ModelsItem::latest()->get();
        $Especies = Especies ::latest()->get();
        return view('livewire.item', ['items' => $item,'ultimo'=>$siguiente],compact('Especies'));
    }

    public function borrar($id)
    {
        ModelsItem::find($id)->delete();
        session()->flash('message', 'Registro eliminado correctamente');
    }
    private function resetInput()
    {
        $this->Cantidad= null;
        $this->idEspecie= null;
        $this->areaUni= null;
        $this->areaApl= null;
        $this->idInscripcion= null;
    }
    public function guardar()
    {
        // $max= Inscripciones::max('id');
        // $idInscripcion=$max+1;


            ModelsItem::create([
                'Cantidad' => $this->Cantidad,
                'idEspecie' => $this->idEspecie,
                'areaUni' => $this->areaUni,
                'areaApl' => $this->areaApl,
                'idInscripcion' => $this->idInscripcion

            ]);
            $this->resetInput();

    }

}
