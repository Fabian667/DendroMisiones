<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-theme.min.css') }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <title>Crear Institucion</title>
</head>

<body class="bg-dark text-white">
    @include('layouts.Menu')
    <hr>

    <div class="container">

        <form role="form" action="{{ route('Institucion.update', $Institucion->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <label for="Nombre">Nombre:</label>
                    <input type="text" value="{{ $Institucion->Nombre }}" name="Nombre" class="form-control"
                        placeholder="Nombre de la entidad">
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <label for="Direccion">Direccion:</label>
                    <input type="text" value="{{ $Institucion->Direccion }}" name="Direccion" class="form-control"
                        placeholder="Direccion">
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <label for="Telefono">Telefono:</label>
                    <input type="text" value="{{ $Institucion->Telefono }}" name="Telefono" class="form-control"
                        placeholder="Telefono">
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 ">
                    <label for="Mail">E-Mail:</label>
                    <input type="text" value="{{ $Institucion->Mail }}" name="Mail" class="form-control"
                        placeholder="E-Mail">
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <label for="">Localidad</label>
                    <br>
                    <select name="IdLocalidad" value="{{ $Institucion->IdLocalidad }}" id="IdLocalidad">

                        @foreach ($localidad as $key => $value)
                            <option value="{{ $value }}"
                                @if ($value == old('IdLocalidad', $Institucion->IdLocalidad)) selected="selected" @endif>{{ $key }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <label for="">Tipo de Institucion</label>
                    <br>
                    <select name="idTipo"value="{{ $Institucion->idTipo }}" id="idTipo">
                        @foreach ($tipoInstitucion as $key => $value)
                            <option value="{{ $value }}"
                                @if ($value == old('idTipo', $Institucion->idTipo)) selected="selected" @endif>{{ $key }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-xs-6 col-sm-6 col-md-6">
                    <label for="Descripcion">Descripcion:</label>
                    <input type="text" value="{{ $Institucion->Descripcion }}" name="Descripcion"
                        class="form-control" placeholder="Descripcion">
                </div>
                <br>

                <hr>

                <div class="col-xs-6 col-sm-6 col-md-6">
                    @csrf
                    <button type="submit" class="btn btn-outline-primary">Guardar</button>
                </div>

        </form>

    </div>
    </div>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
</body>
<footer>
    @include('layouts.Pie')
</footer>
</html>
