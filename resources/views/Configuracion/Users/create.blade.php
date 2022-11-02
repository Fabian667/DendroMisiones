<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body bg-dark text-white>
    @include('layouts.Menu')

        @section('content')
        <div class="container">
            @section('contenido')
    <section class="section">
        <h1 class="is-size-3">Datos del usuario</h1>
        <form action="{{ route('usuarios.store') }}" method="post">
            @csrf
            <div class="field">
                <label class="label">Nombre</label>
                <div class="control">
                    <input required class="input" type="text" placeholder="Escribe el nombre" name="name">
                </div>
            </div>
            <div class="field">
                <label class="label">Correo</label>
                <div class="control">
                    <input required class="input" type="email" placeholder="Escribe el correo" name="email">
                </div>
            </div>
            <div class="field">
                <label class="label">Contraseña</label>
                <div class="control">
                    <input required class="input" type="password" placeholder="Escribe la contraseña" name="password">
                </div>
            </div>
            <div class="field">
                <label class="label">Confirmar contraseña</label>
                <div class="control">
                    <input required class="input" type="password" placeholder="Vuelve a escribir la contraseña"
                        name="passwordConfirm">
                </div>
            </div>
            <div class="field">
                <label class="label">Rol</label>
                <div class="select">
                    <select name="rol">
                        <option value="personal" selected>Personal</option>
                        <option value="administrador">Administrador</option>
                    </select>
                </div>
            </div>
            <button type="submit" class="button is-success">Guardar</button>
        </form>
        @include('notificacion_general')
    </section>
@endsection
        @endsect


</body>

</html>
