<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-theme.min.css') }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <title>Instituciones</title>
</head>

<body class="bg-dark text-white">

    @include('layouts.Menu')
    <hr>
    <div class="container">
        <div class=" bg-dark text-white">
            {!! Form::open(['route' => 'Institucion.index', 'method' => 'GET', 'role' => 'search']) !!}
            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Apellido Nombre']) !!}
            <button type="submit" class="btn btn-sm btn-success">BUSCAR</button>
            <a class="btn btn-sm btn-primary" href="{{ route('Institucion.create') }}">Nuevo</a></i>
            {!! Form::close() !!}

            <table class="table table-dark">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">INSTITUCION</th>
                        <th scope="col">TIPO DE INSTITUCION</th>
                        <th scope="col">DIRECCION</th>
                        <th scope="col-sm-8">TELEFONO</th>
                        <th scope="col">E-MAIL</th>
                        <th scope="col">LOCALIDAD</th>
                        <th scope="col">DESCRIPCION</th>

                        {{-- <TH scope="col"> <a      class="btn btn-primary" href="{{route('roles.create') }}">Nuevo</a></i> --}}
                        </TH>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($Institucion as $Instituciones)
                        <tr>
                            <td>{{ $Instituciones->id }}</td>
                            <td>{{ $Instituciones->Nombre }}</td>
                            <td>{{ $Instituciones->idTipo }}</td>
                            <td>{{ $Instituciones->Direccion }}</td>
                            <td>{{ $Instituciones->Telefono }}</td>
                            <td>{{ $Instituciones->Mail }}</td>
                            <td>{{ $Instituciones->Descripcion }}</td>



                            <td>
                                <form action="{{ route('Institucion.destroy', $Institucion) }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <input type="submit" value="Eliminar" class="btn btn-sm btn-danger"
                                        onclick="return confirm('¿Desea eliminar...?')">
                                </form>
                            </td>

                        </tr>
                    @endforeach
                </tbody>


            </table>
            <span class="link-success"> {{ $Institucion->links() }}</span>



        </div>






        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <script src="{{ asset('js/app.js') }}" defer></script>
    </div>






</body>

</html>
