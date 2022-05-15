<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-theme.min.css') }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>
        Editar Productor
    </title>
</head>

<body class= "bg-dark text-white">
    @include('layouts.menu')
    <hr>
    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger">

                @foreach ($errors->all() as $error)
                    -{{ $error }} <br>
                @endforeach

            </div>
        @endif
        <div class="bg-dark text-white">
            <div class="container">

                <h3>Editar Productor</h3>
                <hr>
                <form role="form" action="{{ route('Productor.update',$persona->id) }}" method="post">
                    <div class="well">
                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label for="Apellido">Apellido:</label>
                                    <input type="text" name="Apellido" class="form-control" placeholder="APELLIDO"  value="{{$persona->Apellido}}"
                                        tabindex="1">
                                </div>
                            </div>

                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label for="Nombre">Nombre:</label>

                                    <input type="text" name="Nombre" class="form-control" placeholder="NOMBRE"
                                    value="{{$persona->Nombre}}"    tabindex="2">
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label for="dni">Documento:</label>

                                    <input type="text" name="DNI" class="form-control" placeholder="DNI-CUIT-CUIL-LE"
                                    value="{{$persona->DNI}}"    tabindex="4">
                                </div>
                            </div>

                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label for="celular">Fecha de nacimiento:</label>
                                    <input type="date" class="form-control" selected value="{{date('Y-m-d', strtotime($persona->FechaNacimiento))
                                   }}" name="FechaNacimiento" tabindex="3">
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label for="correo">Correo electronico:</label>
                                    <input type="text" name="Mail" class="form-control" placeholder="MAIL"
                                    value="{{$persona->Mail}}"     tabindex="5">
                                </div>
                            </div>

                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label for="correo">Telefono:</label>
                                    <input type="text" name="Telefono" class="form-control" placeholder="TELEFONO"
                                    value="{{$persona->Telefono}}"    tabindex="6">
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label for="localidad">Localidad:</label>
                                    <select name="IdLocalidad" id="IdLocalidad" value="{{$persona->IdLocalidad}}">

                                        @foreach ($localidad   as $key => $value )

                                        <option  value="{{$value}}"
                                            @if ($value == old('IdLocalidad', $persona->IdLocalidad))
                                                selected="selected"
                                            @endif
                                        >{{$key}}</option>
                                        @endforeach

                                    </select>
                                </div>

                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label for="localidad">Institucion:</label>
                                    <br>
                                    <select name="IdInstitucion" id="IdInstitucion">
                                        @foreach ($Institucion   as $key => $value )
                                        <option value="{{$value}}"
                                            @if ($value == old('IdInstitucion', $persona->IdInstitucion))
                                                selected="selected"
                                            @endif
                                        >{{$key}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>






                        </div>
                        <div class="form-group">
                            <label for="direccion">Direccion:</label>
                            <input type="text" name="Direccion" class="form-control" placeholder="DIRECCION"
                            value="{{$persona->Direccion}}"    tabindex="10">
                        </div>

                        <div class="form-group">
                            <label for="descripcion">Descripcion:</label>
                            <input type="text" name="Descripcion" class="form-control" placeholder="DESCRIPCION"
                            value="{{$persona->Descripcion}}"    tabindex="11">
                        </div>


                        <hr>

                        <div class="row ">

                            <div class="col-xs-6 col-md-6">@csrf
                                <button type="submit" class=" btn btn-outline-success ">Guardar</button>
                            </div>



                        </div>
                    </div>
                </form>

            </div>




        </div>
    </div>

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
</body>

</html>
