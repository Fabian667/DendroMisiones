<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-theme.min.css') }}">
    <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">

    <title>DendroMisiones</title>
</head>
<body background="{{ asset('image/pinos.jfif') }}"  alt="img"class="antialiased  w-100">



<div>
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-success">
                <div class="card-header bg-success text-white border-success">{{ __('Es un placer tenerlo por aqui') }}</div>

                <div class="card-body text-success">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('  Bienvenido!  ') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
</div>

</body>
