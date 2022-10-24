<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-theme.min.css') }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <title>Productores</title>
</head>

<body class=" p-3 bg-dark text-white">



    @include('layouts.Menu')
    <hr>
    <div class="container">

        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    - {{ $error }} <br>
                @endforeach
            </div>
        @endif






        <div class="panel-heading">BUSQUEDA DE PRODUCTORES</div>

        {!! Form::open(['route' => 'Productor.index', 'method' => 'GET', 'role' => 'search']) !!}
        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Apellido Nombre']) !!}
        <br>
        <button type="submit" class="btn btn-sm  btn-outline-success">BUSCAR <span class="glyphicon glyphicon-search"></span></button>
        <a class="btn  btn-sm btn-outline-primary" href="{{ route('Productor.create') }}">Nuevo</a></i>
        <a class="btn  btn-sm btn-outline-secondary " href="{{ route('Productor.export') }}">Exportar a excell</a></i>
        <hr>


        {!! Form::close() !!}
        <table class="table  bg-dark text-white ">
            <thead class="table-dark">
                <tr>

                        <th scope="col">ID</th>
                        <th scope="col">APELLIDO</th>
                        <th scope="col">NOMBRE</th>
                        <th scope="col">DNI</th>
                        <th scope="col">DOMICILIO</th>
                        <th scope="col">MAIL</th>
                        <th scope="col">ENTIDAD</th>
                        <th scope="col">DESCRIPCION</th>
                        <th width="80px" scope="col">ACCION</th>
                        <th scope="col"></th>


                </tr>
            </thead>
            <tbody>



                    @foreach ($productor as $ref)
                        <tr>
                            <td>{{ $ref->id }}</td>
                            <td>{{ $ref->Apellido }}</td>
                            <td>{{ $ref->Nombre }}</td>
                            <td>{{ $ref->DNI }}</td>
                            <td>{{ $ref->Direccion }}</td>
                            <td>{{ $ref->Mail }}</td>

                            @foreach ($institucion as $key => $value)
                                @if ($value === $ref->IdInstitucion)
                                    <td>{{ $key }}</td>
                                @endif
                            @endforeach
                            <td>{{ $ref->Descripcion }}</td>



                            <td>
                                <a class="btn btn-sm   btn-outline-warning" href="{{ route('Productor.edit', $ref->id) }}">Editar</a>
                            </td>

                            <td>
                                <form action="{{ route('Productor.destroy', $ref) }}" method="POST">
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
        <div class="bg-dark text-white">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item"><a class="page-link"
                            href="{{ $productor->previousPageUrl() }}">Anterior</a></li>
                    <li class="page-item active"><a class="page-link" href="#"><span
                                class="sr-only">{{ $productor->currentPage() }}</span></a></li>
                    <li class="page-item"><a class="page-link" href="{{ $productor->nextPageUrl() }}">Siguiente</a>
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
