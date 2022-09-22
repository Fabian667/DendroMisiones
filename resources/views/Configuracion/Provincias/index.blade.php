<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-theme.min.css') }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Document</title>
</head>

<body class=" p-3 bg-dark text-white">
    @include('layouts.Menu')



    {{-- ------------------------------------------------------------------------------------------------ --}}
    {{-- ------------------------------------------------------------------------------------------------ --}}
    {{-- ------------------------------------------------------------------------------------------------ --}}






    <div class="container">




        @if ($errors->any())
            <div class="alert alert-danger">

                @foreach ($errors->all() as $error)
                    -{{ $error }} <br>
                @endforeach

            </div>
        @endif
        <div class="col-auto">


        </div>

        <form action="{{ route('provincias.store') }}" method="post">
            <div class="form-row">
                <div class="col-sm-5">
                    <input type="text" name="Nombre" class="form-control" placeholder="Nombre">
                </div>
                <th>&nbsp;</th>
                <div class="col-auto">
                    @csrf
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </form>



        <table class="table table-dark">
            <thead class="table-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Accion</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($provincias as $provincia)
                    <tr>
                        <td>{{ $provincia->id }}</td>
                        <td>{{ $provincia->Nombre }}</td>
                        <td>
                            <form action="{{ route('provincias.destroy', $provincia) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <input type="submit" value="Eliminar" class="btn btn-sm btn-danger"
                                    onclick="return confirm('¿Desea eliminar...?')">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>
    </div>
</body>
















<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/app.js') }}" defer></script>

</body>

</html>
