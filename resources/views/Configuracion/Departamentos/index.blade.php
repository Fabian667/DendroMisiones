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
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    @include('layouts.menu')
    <div class="table table-sm">
        <div class=" col-sm-15 mx-auto">

        </div>

        <table class="table table-bordered">

        </table>
    </div>

    {{-- ---------------------------- --}}
    {{-- ------------------------------------------------------------- --}}

    <div class="container">

        <div class="accordion accordion-flush  bg-dark" id="accordionFlushExample">
            <div class="accordion-item  bg-dark">
                <h2 class="accordion-header" id="flush-headingOne">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                        <h5>Carga Departamento</h5>
                    </button>
                </h2>
                <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne"
                    data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <form action="{{ route('departamentos.store') }}" method="post">
                            <div class="form-row">
                                <div class="col-sm-5">
                                    <input type="text" name="Nombre" class="form-control" placeholder="Departamento">
                                </div>
                                <div class="col-sm-5">
                                    <input type="text" name="CodigoPostal" class="form-control"
                                        placeholder="Codigo Postal">
                                </div>

                                <div class="col-sm-5">

                                    <label for="">Provincia</label>
                                    <select name="IdProvincia" id="IdProvincia">
                                        @foreach ($provincias as $key => $value)
                                            <option value="{{ $value }}">{{ $key }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-5">

                                    <label for="">Zona</label>
                                    <select name="IdZona" id="IdZona">
                                        @foreach ($zonas as $key => $value)
                                            <option value="{{ $value }}">{{ $key }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <th>&nbsp;</th>
                                <div class="col-auto">
                                    @csrf
                                    <button type="submit" class=" btn-primary btn-lg">Guardar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


        </div>





        <div class="card bg-dark text-white border border-success">
            <div class="card-body">

                @if ($errors->any())
                    <div class="alert alert-danger">

                        @foreach ($errors->all() as $error)
                            -{{ $error }} <br>
                        @endforeach

                    </div>
                @endif
                <div class="panel panel-success">
                    <div class="panel-heading">buscar Provincia</div>
                    <input type="text" name="Nombre" class="form-control"
                        placeholder="Ingresar nombre del Departamento" required="required">
                    {{-- {!! Form::open(['route' => 'Productor.index', 'method' => 'GET', 'role' => 'search']) !!}
                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'DEPARTAMENTO']) !!}
                <button type="submit" class="btn btn-success">buscar</button>

                {!! Form::close() !!} --}}

                </div>
                <div class="panel-footer">
                    <button type="submit" class="btn btn-success btn-lg">buscar</button>
                </div>

            </div>
            <div class="col-auto">
            </div>
        </div>



        <table class="table table-dark">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Codigo Postal</th>
                    <th scope="col">Zona</th>
                    <th scope="col">Provincia</th>
                    <th scope="col">Accion</th>

                </tr>
            </thead>
            <tbody>

                @foreach ($departamentos as $variable)
                    <tr>
                        <td>{{ $variable->id }}</td>
                        <td>{{ $variable->Nombre }}</td>
                        <td>{{ $variable->CodigoPostal }}</td>

                        @foreach ($zonas as $key => $value)
                            @if ($value === $variable->IdZona)
                                <td>{{ $key }}</td>
                            @endif
                        @endforeach



                        @foreach ($provincias as $key => $value)
                            @if ($value === $variable->IdProvincia)
                                <td>{{ $key }}</td>
                            @endif
                        @endforeach


                        {{-- <td>{{$variable->}}</td> --}}
                        <td>
                            <form action="{{ route('departamentos.destroy', $variable) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <input type="submit" value="Eliminar" class=" btn-lg btn-danger"
                                    onclick="return confirm('¿Desea eliminar...?')">
                            </form>
                        </td>
                    </tr>
                @endforeach

            </tbody>

        </table>
    </div>










</body>

</html>
