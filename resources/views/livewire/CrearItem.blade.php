


            <div  class="row" >
                <form >
                    <div class=" row bg-dark text-white">
                        <div  class=" col-sm-2 bg-dark text-white">
                            <label>Cantidad:</label>
                            <input type="text"  id="Cantidad" wire:model="Cantidad">
                        </div>

                        <div  class=" col-sm-2 bg-dark text-white">
                            <label>Especie:</label>
                            <select class="col-sm-8 " name="IdEspecie" id="IdEspecie" wire:model="idEspecie">
                                @foreach ($Especies as $key => $value)
                                    <option value="{{ $key }}">{{ $value->Nombre }}</option>





                                @endforeach
                            </select>
                        </div>
                        <div  class=" col-sm-2 bg-dark text-white">
                            <label>Superficie:</label>
                            <input type="text"  id="areaApl" wire:model="areaUni">
                        </div>
                        <div  class=" col-sm-2 bg-dark text-white">
                            <label>IDInscripcion:</label>
                            <input type="text" value="{{ $ultimo }}"  id="idInscripcion" wire:model="idInscripcion">
                        </div>
                        <div  class=" col-sm-2 bg-dark text-white">
                            <label>Unidad Sup:</label>
                            <input type="text"  id="descripcion" wire:model="areaApl">
                        </div>
                        <div  class=" col-sm-1  bg-dark text-white">
                           <br>
                            <button wire:click="guardar()" type="button" class=" btn  btn-sm btn-outline-primary" >Agregar</button>
                        </div>










                    </div>
                </form>

            </div>







