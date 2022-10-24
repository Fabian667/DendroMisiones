<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-theme.min.css') }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <title>Dendro Referentes</title>
</head>

<body class="p-3 bg-dark text-white">
    @include('layouts.Menu')
    <div class="container">
        {!! Form::open(['route' => 'Referente.index', 'method' => 'GET', 'role' => 'search']) !!}
        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Apellido Nombre']) !!}
        <div class="m-1">
            <button type="submit" class="btn btn-sm btn-outline-success">BUSCAR</button>
            <a class="btn btn-sm btn-outline-primary" href="{{ route('Referente.create') }}">Nuevo</a></i>
        </div>
        {!! Form::close() !!}
        <hr>



        <table class="table table-dark">
            <thead class="table-dark">
                <th scope="col">ID</th>
                <th scope="col">APELLIDO</th>
                <th scope="col">NOMBRE</th>
                <th scope="col">TELEFONO</th>
                <th scope="col">DOMICILIO</th>
                <th scope="col">MAIL</th>
                <th scope="col">ENTIDAD</th>
                <th scope="col">DESCRIPCION</th>
                <th width="40px" scope="col">ACCION</th>
                <th scope="col"></th>
            </thead>
            <tbody>
                @foreach ($Personas as $ref)
                    <tr>
                        <td>{{ $ref->id }}</td>
                        <td>{{ $ref->Apellido }}</td>
                        <td>{{ $ref->Nombre }}</td>
                        <td>{{ $ref->Telefono }}</td>
                        <td>{{ $ref->Direccion }}</td>
                        <td>{{ $ref->Mail }}</td>
                        @foreach ($institucion as $key => $value)
                            @if ($value === $ref->IdInstitucion)
                                <td>{{ $key }}</td>
                            @endif
                        @endforeach
                        <TD></TD>
                        <td>
                            <a class="btn btn-sm btn-outline-warning" href="{{ route('Referente.edit', $ref->id) }}"
                                class="btn btn-sm btn-default">Editar</a>
                        </td>
                        <td>
                            <form action="{{ route('Referente.destroy', $ref) }}" method="POST">
                                @csrf
                                @method('DELETE')

                                <input type="submit" value="Eliminar" class="btn btn-sm btn-outline-danger"
                                    onclick="return confirm('¿Desea eliminar...?')">
                            </form>
                        </td>
                    </tr>
                @endforeach


            </tbody>
        </table>

    </div>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
</body>
<footer>
    @include('layouts.Pie')
</footer>

</html>
