<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-theme.min.css') }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <title>Crear Institucion</title>
</head>

<body class="bg-dark text-white">
    @include('layouts.Menu')
    <hr>
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6">
                <label for="Nombre">Nombre:</label>
                <input type="text" name="Nombre" class="form-control" placeholder="Nombre de la entidad">
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
                <label for="Nombre">Direccion:</label>
                <input type="text" name="NombrePr" class="form-control" placeholder="Direccion">
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
                <label for="Nombre">Telefono:</label>
                <input type="text" name="DNIPr" class="form-control" placeholder="Telefono">
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6 ">
                <label for="Nombre">E-Mail:</label>
                <input type="text" name="ApellidoPr" class="form-control" placeholder="E-Mail">
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
                <label for="Nombre">Localidad:</label>
                <input type="text" name="NombrePr" class="form-control" placeholder="Localidad">
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
                <label for="Nombre">Descripcion:</label>
                <input type="text" name="DNIPr" class="form-control" placeholder="Descripcion">
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
                @csrf
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>



</div>
</div>
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/app.js') }}" defer></script>
</body>

</html>
