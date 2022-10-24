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
            <div class="mt-1">
                <button type="submit" class="btn btn-sm btn-outline-success">BUSCAR</button>
                <a class="btn  btn-sm btn-outline-primary" href="{{ route('Institucion.create') }}">Nuevo</a></i>
            </div>
            {!! Form::close() !!}
            <hr>

            <table class="table table-dark">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">INSTITUCION</th>
                        <th scope="col">TIPO DE INSTITUCION</th>
                        <th scope="col">DIRECCION</th>
                        <th scope="col-sm-8">TELEFONO</th>
                        <th scope="col">E-MAIL</th>
                        <th scope="col">LOCALIDAD</th>
                        <th scope="col">DESCRIPCION</th>
                        <th scope="col">ACCION</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($Institucion as $Instituciones)
                        <tr>
                            <td>{{ $Instituciones->Nombre }}</td>

                            {{-- /* Verificando el valor del idTipo en la base de datos y luego comparándolo con
                                    la clave en la matriz. Si son iguales, entonces mostrará la clave. */ --}}

                            @foreach ($tipoInstitucion as $key => $value)
                                @if ($value === $Instituciones->idTipo)
                                    <td>{{ $key }}</td>
                                @endif
                            @endforeach
                            <td>{{ $Instituciones->Direccion }}</td>
                            <td>{{ $Instituciones->Telefono }}</td>
                            <td>{{ $Instituciones->Mail }}</td>
                            @foreach ($localidad as $key => $value)
                                @if ($value === $Instituciones->IdLocalidad)
                                    <td>{{ $key }}</td>
                                @endif
                            @endforeach
                            <td>{{ $Instituciones->Descripcion }}</td>
                            <td>
                                <a class="btn btn-sm   btn-outline-warning"
                                    href="{{ route('Institucion.edit', $Instituciones) }}">Editar</a>
                            </td>

                            <td>
                                <form action="{{ route('Institucion.destroy', $Instituciones) }}" method="POST">
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
        {{-- Una paginación.  --}}
        <div class="bg-dark text-white">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item"><a class="page-link"
                            href="{{ $Institucion->previousPageUrl() }}">Anterior</a></li>
                    <li class="page-item active"><a class="page-link" href="#"><span
                                class="sr-only">{{ $Institucion->currentPage() }}</span></a></li>
                    <li class="page-item"><a class="page-link" href="{{ $Institucion->nextPageUrl() }}">Siguiente</a>
                    </li>
                </ul>
            </nav>
        </div>
        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <script src="{{ asset('js/app.js') }}" defer></script>
    </div>
</body>
<footer>
    @include('layouts.Pie')
</footer>

</html>
