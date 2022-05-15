<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>

<body>
    {{-- comuenzo del bucle del menu compara si tiene un slug o esclavo para armar la cascada --}}
    @if ($item['submenu'] == [])
        <div class="collapse navbar-collapse" id="navBarNavDarkDropdown">
            @if ($item['slug'] == 'home')
                <li class="collapse navbar-collapse">
                    <a class="navbar-brand" href="{{ url($item['slug']) }}">{{ $item['name'] }} </a>
                </li>
        </div>
    @elseif ($item['submenu'] == [])
        <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
            <ul class="navbar-nav">
                <li class=" nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        {{ $item['name'] }}
                    </a>
                </li>
        </div>
    @endif
@else
    <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
        <ul class="navbar-nav">
            <li class=" nav-item dropdown">
                <a class="nav-link btn-sm dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false" aria-haspopup="true" data-toggle="dropdown"
                    aria-expanded="true">{{ $item['name'] }} <span class="caret"></span></a>
                <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                    @foreach ($item['submenu'] as $submenu)
                        @if ($submenu['submenu'] == [])
                            <li>
                                <a class="  btn-sm  dropdown-item"
                                    href="{{ url('', ['item' => $item['slug'], 'slug' => $submenu['slug']]) }}">{{ $submenu['name'] }}
                                </a>
                            </li>
                        @else
                            <li>
                                <a class="btn-sm dropdown-item">
                                    @include('partials.menu-item', ['item' => $submenu])
                                </a>
                            </li>
                        @endif
                    @endforeach
                </ul>

            </li>
        </ul>
    </div>
    @endif
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
</body>

</html>
