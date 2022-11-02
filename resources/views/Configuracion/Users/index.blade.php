<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-theme.min.css') }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Document</title>
</head>

<body class="p-3 bg-dark text-white">
    @include('layouts.Menu')
    <hr>

    <div class="container">
        <a class="btn btn-outline-primary btn-sm "
        href="{{ route('users.create') }}">NUEVO</a></i>
        <table class="table table-dark">
            <thead class="table-dark">
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Email</th>
                    <th scope="col">Accion</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($user as $user)
                <tr>


                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>

                    <td>
                        <a class="btn btn-sm btn-outline-warning" href="{{ route('users.edit', $user->id) }}"
                            class="btn btn-sm btn-default">Editar</a>
                    </td>
                    <td>
                        <form action="{{ route('users.destroy', $user) }}" method="POST">
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

</html>
