<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-theme.min.css') }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <title>Carga de Inscripcion</title>
</head>

<body class=" p-3 bg-dark text-white">
    @include('layouts.Menu')
    <hr>
    <section style="padding-top: 20px">
        <div class="container">
            @if ($errors->any())
                <div class="  alert alert-danger">
                    @foreach ($errors->all() as $error)
                        -{{ $error }}
                        <br>
                    @endforeach
                </div>
            @endif

            <div class="row">
                {{-- comienzo formulario----------------------------------------------------------------------------------------------------------------------------------- --}}
                <div class=" col-sm-5 bg-dark text-white">
                    <div class="  container-fluid">
                        <label class=" row justify-content-start ">INGRESE EL DNI DEL PRODUCTOR</label>
                        <div class=" row justify-content-start  ">
                            {!! Form::open(['route' => 'Inscripcion.create', 'method' => 'GET', 'role' => 'search']) !!}
                            {!! Form::text('DNIPr', null, ['class' => 'form-control', 'placeholder' => ' DNI ']) !!}
                            <button type="submit" class=" btn  btn-sm btn-outline-primary">BUSCAR</button>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
                <hr>
                <H6>
                    Datos del Productor
                </H6>



                <form class="text-white bg-dark" action="{{ route('Inscripcion.store') }}" method="post">
                    <div class="well">

                        <div class="row">
                            <div class="col-lg-5 control-label ">
                                <div class="fomr-group ">
                                    <label>FECHA DE INSCRIPCION</label>
                                    <input type="date" class="form-control" name="FechaInscripcion" tabindex="1">
                                </div>

                            </div>
                            {{-- comienzo datos del productor----------------------------------------------------------------------------------------------------------------------------------- --}}

                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label for="">inscripcion n°</label>
                                    <input type="text" name="ultimo" class="form-control" value="{{ $ultimo }}"
                                        placeholder="" tabindex="2">
                                </div>
                            </div>

                            @foreach ($productor as $pro)
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label for="">Apellido</label>
                                        <input type="text" name="ApellidoPr" class="form-control"
                                            value="{{ $pro->Apellido }}" placeholder="Apellido" tabindex="2">
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label for="">Nombre</label>
                                        <input type="text" name="NombrePr" class="form-control"
                                            value="{{ $pro->Nombre }}" placeholder="NOMBRE" tabindex="3">
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label for="">DNI</label>
                                        <input type="text" name="DNIPr" class="form-control"
                                            value="{{ $pro->DNI }}" placeholder="NOMBRE" tabindex="4">
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label for="">E-Mail</label>
                                        <input type="text" name="MailPr" class="form-control"
                                            value="{{ $pro->Mail }}" placeholder="EMAIL">
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">

                                        <label for="">Direccion</label>
                                        <input type="text" name="DireccionPr" class="form-control"
                                            value="{{ $pro->Direccion }}" placeholder="DOMICILIO">

                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">

                                        <label for="">Localidad</label>
                                        <br>
                                        <select name="PDAPJECNIA" id="PDAPJECNIA" value="{{ $pro->IdLocalidad }}">
                                            @foreach ($localidad as $key => $value)
                                                <option value="{{ $key }}"
                                                    @if ($value == old('IdLocalidad', $pro->IdLocalidad)) selected="selected" @endif>
                                                    {{ $key }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <br>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">

                                        <label for="">Telefono</label>
                                        <input type="text" name="TelefonoPr" class="form-control"
                                            value="{{ $pro->Telefono }}" placeholder="TELEFONO">
                            @endforeach
                        </div>
                    </div>
            </div>
            <hr>
            {{-- -- comienzo datos del predio---------------------------------------------------------------------------------------------------------------------------------- --}}

            <div class="col-xs-6 col-sm-6 col-md-6">
                <u>
                    <H6>
                        Datos del Predio
                    </H6>

                </u>
            </div>


            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <label for="">Documentacion Legal</label>
                    <input type="text" name="DocumentacionLegal" class="form-control"
                        placeholder=" DOCUMENTACION LEGAL">

                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <label for="">Nomenclatura Catastral</label>
                    <input type="text" name="NomenclaturaCatastral" class="form-control"
                        placeholder="NOMENCLATURA CATASTRAL">
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <label for="">Lote</label>
                    <input type="text" name="Lote" class="form-control" placeholder="LOTE">
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <label for="">Domicilio del Emprendimiento</label>
                    <input type="text" name="DomicilioEmprendimiento" class="form-control"
                        placeholder="DIRECCION DEL EMPRENDIMIENTO">
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <label for="">Localidad</label>
                    <br>
                    <select name="DomicilioEmprendimiento" id="DomicilioEmprendimiento">
                        @foreach ($localidad as $key => $value)
                            <option value="{{ $value }}">{{ $key }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <label for="">Latitud</label>
                    <br>
                    <input type="text" name="LAT" class="form-control" placeholder="LATITUD">
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <label for="">Longitud</label>
                    <br>
                    <input type="text" name="LONG" class="form-control" placeholder="LONGITUD">
                    <br>
                </div>
                {{-- -- comienzo datos del emprendimiento---------------------------------------------------------------------------------------------------------------------------------- --}}

                <hr>

                <div class="col-xs-100 col-sm-6 col-md-6" style="text-align: center">
                    <u>
                        <H6>
                            Datos del Emprendimiento

                        </H6>
                        <br>
                    </u>
                </div>
                <br>

                <div class="">
                    <u>
                        <h6>
                            Carga de Productos a Entregar
                        </H6>
                    </u>
                </div>
            </div>

            {{-- empieza la carga de item --}}
            <div class="col-xs-6 col-sm-6 col-md-6">
                <button type="button" class=" btn  btn-sm btn-outline-primary" data-bs-toggle="modal"
                    data-bs-target="#CargaItem">
                    Agregar Producto
                </button>





            </div>

            <div class="col-sm-10  h-auto">
                <label for="">Descripciones</label>
                <input type="text" name="Descripcion" class="form-control" placeholder="DESCRIPCION">

            </div>
            <br>
            <hr>
            <div class="col-sm-8">
                <u>
                    <H6>
                        Datos Anexos
                    </H6>
                </u>
            </div>
            <br>
            {{-- @foreach ($productor as $pro)
                        <div class="col-sm-5  ">
                            <label for="">Entidad</label>
                            <select name="IdEntidad" id="IdEntidad">
                                @foreach ($Institucion as $key => $value)
                                    <option value="{{ $key }}" @if ($value == old('IdInstitucion', $pro->IdInstitucion))
                                        selected="selected"
                                @endif
                                >{{ $key }}</option>
                            </select>
                        </div>
                    @endforeach --}}
            <div class="col-sm-5">
                <label for="">Referente</label>
                <select name="IdReferente" id="IdReferente">
                    @foreach ($persona as $key => $value)
                        <option value="{{ $value }}">{{ $key }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-auto">
                @csrf
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>

            </form>




        </div>

    </section>
    {{-- comienzo de la clase ModalFormularioItem --}}

    <!-- Button trigger modal -->
    {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#CargaItem">
        Launch demo modal
    </button> --}}

    <!-- Modal -->

    <!-- Full screen modal -->

    <div class="modal fade  " id="CargaItem" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">



        <div class="modal-dialog modal-fullscreen-sm-down">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h5 class="modal-title" id="exampleModalLabel">Item</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body  bg-dark">
                    <div class="row  bg-dark ">
                        @include('inscripciones.Inscripcion.anexo.itemCreate')
                        {{-- ----------------------------------------------------------------------------- --}}
                    </div>
                </div>
                <div class="modal-footer bg-success">
                    <button type="button" class="btn  btn-sm btn-outline-warning text-white"
                        data-bs-dismiss="modal">CERRAR</button>
                    <button type="button" class="btn  btn-sm btn-outline-primary text-white">GUARDAR</button>
                </div>
            </div>
        </div>
    </div>



    <script src="{{ asset('js/app.js') }}" defer></script>
</body>

</html>
