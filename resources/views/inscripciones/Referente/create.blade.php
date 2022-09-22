<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-theme.min.css') }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <title>Crear Referente</title>
</head>

<body class=" bg-dark text-white">
    @include('layouts.Menu')
    <hr>
    <div class="container">

        <form class=" offset-md-1" action="{{ route('Referente.store') }}" method="post">


            <div class="well">
                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="Apellido">Apellido:</label>
                            <input type="text" name="Apellido" class="form-control" placeholder="APELLIDO"
                                tabindex="1">
                        </div>
                    </div>

                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="Nombre">Nombre:</label>

                            <input type="text" name="Nombre" class="form-control" placeholder="NOMBRE" tabindex="2">
                        </div>
                    </div>
                </div>

                <div class="row">

                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="dni">Documento:</label>

                            <input type="text" name="DNI" class="form-control" placeholder="DNI-CUIT-CUIL-LE"
                                tabindex="4">
                        </div>
                    </div>

                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="celular">Fecha de nacimiento:</label>
                            <input type="date" class="form-control" name="FechaNacimiento" tabindex="3">
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="correo">Correo electronico:</label>
                            <input type="text" name="Mail" class="form-control" placeholder="MAIL" tabindex="5">
                        </div>
                    </div>

                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="correo">Telefono:</label>
                            <input type="text" name="Telefono" class="form-control" placeholder="TELEFONO"
                                tabindex="6">
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">

                            <label for="">Rol-Cargo</label>
                            <br>
                            <select  name="IdRol" id="IdRol">

                                @foreach ($rol as $key => $value)
                                    <option value="{{ $value }}">{{ $key }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="localidad">Localidad:</label>
                            <select name="IdLocalidad" id="IdLocalidad" tabindex="8">
                                @foreach ($localidad as $key => $value)
                                    <option value="{{ $value }}">{{ $key }}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="localidad">Institucion:</label>
                            <br>
                            <select name="IdInstitucion" id="IdInstitucion" tabindex="9">
                                @foreach ($Institucion as $key => $value)
                                    <option value="{{ $value }}">{{ $key }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>






                </div>
                <div class="form-group">
                    <label for="direccion">Direccion:</label>
                    <input type="text" name="Direccion" class="form-control" placeholder="DIRECCION" tabindex="10">
                </div>

                <div class="form-group">
                    <label for="descripcion">Descripcion:</label>
                    <input type="text" name="Descripcion" class="form-control" placeholder="DESCRIPCION"
                        tabindex="11">
                </div>


                <hr>

                <div class="row float-right">
                    <div class="col-xs-6 col-md-6">@csrf
                        <button type="submit" class=" btn btn-outline-success ">Guardar</button>
                    </div>



                </div>
            </div>
        </form>


    </div>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
</body>

</html>
