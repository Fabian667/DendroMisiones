<span x-data="{ load: 0, error: true }">
    <div>
        <x-slot name="header">

        </x-slot>

        <div class="py-12 bg-dark text-white">
            <div class="max-w-7xl mx-auto sm:px6 lg:px-8 bg-dark text-white">
                <div class="bg-dark text-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
                    <template x-if="true">
                    </template>
                    @include('livewire.CrearItem')
                    <br>
                    <table class="table table-dark responsive" id="tablaItem">
                        <thead class="thead-light table-bordered ">

                            <tr>
                                <th class="px-4 py-2">CANTIDAD</th>
                                <th class="px-4 py-2">TIPO</th>
                                <th class="px-4 py-2">ESPECIE</th>
                                <th class="px-4 py-2">   AREA</th>
                                <th class="px-4 py-2"></th>
                                <th class="px-4 py-2">ACCIONES</th>

                            </tr>

                        </thead>
                        <tbody>
                            @foreach ($items as $item)
                                <tr>
                                    <td>{{ $item->Cantidad }}</td>
                                    @foreach ($Especies as $especie)
                                        @if ($especie->id === $item->idEspecie)
                                            <td>{{ $especie->especieUnidad }}</td>
                                            <td>{{ $especie->Nombre }}</td>
                                        @endif
                                    @endforeach
                                    <td>{{ $item->areaUni }}</td>
                                    <td>{{ $item->areaApl }}</td>
                                    <td class="">

                                        <button wire:click="borrar({{ $item->id }})"
                                            class="btn  btn-sm btn-outline-danger text-white">Borrar</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</span>
