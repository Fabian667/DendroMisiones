<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ secure_asset('css/bootstrap-theme.min.css') }}">
    <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark   sticky-top py-1 ">
        <a class="navbar-brand" href="#"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDarkDropdown"
            aria-controls="navbarNavDarkDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
            <div class="navbar-brand" href="#">
                <ul class="nav navbar-nav ">
                    @foreach ($menus as $key => $item)
                        @if ($item['parent'] != 0)
                            @break
                        @endif
                        @include('partials.menu-item', ['item' => $item])
                     @endforeach
                </ul>
            </div>
        </div>
        <script src="{{ secure_asset('js/jquery.min.js') }}"></script>
        <script src="{{ secure_asset('js/app.js') }}" defer></script>
    </nav>
<script src="{{ secure_asset('js/jquery.min.js') }}"></script>
<script src="{{ secure_asset('js/app.js') }}" defer></script>

</body>

</html>
