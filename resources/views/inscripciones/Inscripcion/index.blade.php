<!DOCTYPE html>
<html lang="en">



<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inscripciones</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-theme.min.css') }}">
</head>



<body class=" p-3 bg-dark text-white">

    @include('layouts.Menu')
    <hr>



    <div class="container">

        <div class="accordion accordion-flush text-light bg-dark" id="accordionFlushExample">
        <div class="accordion-item text-light bg-dark">

                <button class="accordion-button   collapsed btn btn-outline-secondary btn-sm" type="button" data-bs-toggle="collapse"
                    data-bs-target="#seccion" aria-expanded="false" aria-controls="collapseWidthExample">
                    BUSQUEDA DE INSCRIPCIONES
                </button>

            <div id="seccion" class="accordion-collapse collapse bg-dark text-white" aria-labelledby="headingThree"
                data-bs-parent="#seccion">
                <div id="seccion" class="accordion-body  bg-dark text-white">
                    {!! Form::open(['route' => 'Inscripcion.index', 'method' => 'GET', 'role' => 'search']) !!}
                    <div class="col-xs-6 col-sm-6 col-md-6 ">{!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'APELLIDO, NOMBRE, DNI, ENTIDAD']) !!}
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6 ">
                        {!! Form::date('desde', null, ['class' => 'form-control', 'placeholder' => 'DESDE']) !!}
                    </div>

                    <div class=" col-md-6 mt-2">
                        <button class="btn btn-outline-success btn-sm " type="submit"
                            class="btn btn-success">BUSCAR</button>
                        {{--  Un botón que te llevará al formulario para crear un nuevo registro.  --}}
                        <a class="btn btn-outline-primary btn-sm "
                            href="{{ route('Inscripcion.create') }}">NUEVO</a></i>

                        {{--  Un botón que exportará los datos a un archivo de Excel.  --}}
                        <a class="btn btn-outline-secondary btn-sm "
                            href="{{ route('Inscripcion.export') }}">Exportar</a></i>
                    </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>





    {{--  Creando una tabla con un fondo oscuro.  --}}
    <table class="table table-dark">
        <thead class="table-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">APELLIDO</th>
                <th scope="col">NOMBRE</th>
                <th scope="col">DNI</th>
                <th scope="col">DOMICILIO</th>
                <th scope="col">TELEFONO</th>
                <th scope="col">NOMENCLATURA CATAS.</th>
                {{-- <th scope="col">LATITUD</th>
                        <th scope="col">LONGITUD</th> --}}
                <th scope="col">SUPERFICIE LEGAL</th>
                <th scope="col">DOCUMENTACION LEGAL</th>
                {{-- <th scope="col">DOMICILIO DEL EMPRENDIMIENTO</th> --}}

                <th scope="col">ACCION</th>
                <TH></TH>
            </tr>

        </thead>
        <tbody>
            {{--   Comprobando si la mesa está vacía. Si está vacío, mostrará un mensaje. Si no está vacío,
        mostrará la tabla.   --}}

            @if ($Inscripciones->isEmpty())
                <div style='font-size: 19px;'>No hay resultados!</div>
            @else
                @foreach ($Inscripciones as $inscriptos)
                    <tr>
                        <td>{{ $inscriptos->id }}</td>
                        <td>{{ $inscriptos->ApellidoPr }}</td>
                        <td>{{ $inscriptos->NombrePr }}</td>
                        <td>{{ $inscriptos->DNIPr }}</td>
                        <td>{{ $inscriptos->DireccionPr }}</td>
                        <td>{{ $inscriptos->TelefonoPr }}</td>
                        <td>{{ $inscriptos->NomenclaturaCatastral }}</td>
                        {{-- <td>{{ $inscriptos->LAT }}</td>
                                        <td>{{ $inscriptos->LONG }}</td> --}}
                        <td>{{ $inscriptos->SupPINO }}</td>
                        <td>{{ $inscriptos->DocumentacionLegal }}</td>
                        {{-- <td>{{ $inscriptos->DomicilioEmprendimiento }}</td> --}}

                        <td>
                            <a class="btn btn-outline-warning btn-sm"
                                href="{{ route('Inscripcion.edit', $inscriptos->id) }}"
                                class="btn btn-sm btn-default">EDITAR</a>
                        </td>
                        <td>
                            <form action="{{ route('Inscripcion.destroy', $inscriptos) }}" method="POST">
                                @csrf
                                @method('DELETE')

                                <input type="submit" value="ELIMINAR" class="btn  btn-outline-danger btn-sm"
                                    onclick="return confirm('¿Desea eliminar...?')">
                            </form>
                        </td>
                    </tr>
                @endforeach
            @endif

        </tbody>
    </table>
    <div class="bg-dark text-white">
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item"><a class="page-link" href="{{ $Inscripciones->previousPageUrl() }}">Anterior</a>
                </li>
                <li class="page-item active"><a class="page-link" href="#"><span
                            class="sr-only">{{ $Inscripciones->currentPage() }}</span></a></li>
                <li class="page-item"><a class="page-link" href="{{ $Inscripciones->nextPageUrl() }}">Siguiente</a>
                </li>
            </ul>
        </nav>
    </div>
    </div>

</body>


<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/app.js') }}" defer></script>


<footer class="navbar navbar-inverse navbar-fixed-bottom">
    @extends('layouts.Pie')
</footer>

</html>
