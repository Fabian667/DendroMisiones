<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-theme.min.css') }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Carga de Item</title>
</head>
<body>

    <div class="table-responsive">
        <table class="table table-dark" id="tablaItem">
            <thead class="thead-light">

                <tr>

                    <?php
                    if (isset($_REQUEST['btn'])):
                        for ($x = 1; $x <= sizeof($_REQUEST['cant']); $x++):
                            echo $_REQUEST['cant'][$x] . '<br>';
                        endfor;
                    endif;
                    ?>



                    <?php
                    $array = [' Cantidad', 'Unidad ', ' Especie', 'Superficie ', 'Unidad'];
                    foreach ($array as $items => $itemsResibidos) {
                        echo '<th>' . $itemsResibidos . '</th>';
                    }
                    ?>
                </tr>

            </thead>
            <tbody class="col-sm-5">

                @foreach ($ItemList as $item)
                    {{-- 'id','Cantidad','idEspecie','areaApl','areaUni','idInscripcion' --}}
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
                        <td>
                            <button  type="button" class="btn  btn-sm btn-outline-danger text-white">Editar</button>
                        </td>
                        <td>
                            {{-- class="btn  btn-sm btn-outline-warning text-white">Eliminar</button> --}}
                            <form action="{{ route('Item.destroy', $item) }}" method="POST">
                                @csrf
                                @method('DELETE')

                                <input type="submit" value="ELIMINAR"  class="btn  btn-sm btn-outline-warning text-white"
                                    onclick="return confirm('¿Desea eliminar...?')">
                            </form>




                        </td>
                        </tr>
                @endforeach








            </tbody>
        </table>
        </div>
    <form class=" offset-md-1 col w-100 "  action="{{ route('Item.store') }}" method="post">
        {{-- 'id','Cantidad','idEspecie','areaApl','areaUni','idInscripcion'  --}}
        <div class="col-xs-6 col-sm-6 ">
            <label for="">Especie</label>
            <br>
            <select class="col-sm-8 " name="IdEspecie" id="IdEspecie">
                @foreach ($cmbEspecie as $key => $value)
                    <option value="{{ $value }}">{{ $key }}</option>
                @endforeach
            </select>
            <br>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6 ">
            <label for="">Cantidad </label>

            <input type="text" name="Cantidad" class="form-control" placeholder="CANTIDAD">
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6">
            <label for="">Unidad de aplicacion</label>
            <input type="text" name="SupPINO" class="form-control" placeholder="UNIDAD">
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6">
            <label for="">Superficie o area de aplicacion</label>
            <input type="text" name="SupPINO" class="form-control" placeholder="HECT..">
        </div>
        {{-- ------------------------------------------------------------------------------------------------------ --}}
        {{-- <script src="{{ asset('\App\Http\MisClases\AgregarFila.js') }}"></script> --}}





    </form>

</body>
</html>
