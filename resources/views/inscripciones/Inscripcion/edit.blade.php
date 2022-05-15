<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-theme.min.css') }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Editar Inscripción</title>
</head>

<body class="bg-dark text-white">
    @include('layouts.menu')
    <div class="container">

        @if ($errors->any())
            <div P-5 class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    -{{ $error }}
                @endforeach
            </div>
        @endif

        <div class="bg-dark text-white">
            <div class="col-sm-8 ">
                <div class="fomr-group">
                    <label>FECHA DE INSCRIPCION</label>
                    <input type="date" class="form-control" name="FechaInscripcion">
                </div>
                <u>
                    <H3>
                        <p>Datos del Productor </p>
                    </H3>
                </u>
            </div>
            <div class="col-sm-5">
                <P> <input type="text" name="ApellidoPr" class="form-control" placeholder="APELLIDO"></P>
            </div>
            <div class="col-sm-5">
                <P> <input type="text" name="NombrePr" class="form-control" placeholder="NOMBRE"></P>
            </div>
            <div class="col-sm-4">
                <P> <input type="text" name="DNIPr" class="form-control" placeholder="DNI-CUIT-CUIL-LE"></P>
            </div>
            <div class="col-md-1 col-lg-1">

                <p><input type="image" name="botondeenvio" src="/image/prodni.png" alt="Enviar formulario"></p>
            </div>
            <div class="col-sm-5">
                <P> <input type="text" name="DireccionPr" class="form-control" placeholder="DOMICILIO"></P>
            </div>
            <div class="col-sm-5">
                <P> <input type="text" name="MailPr" class="form-control" placeholder="EMAIL"></P>
            </div>
            <div class="col-sm-5">
                <P> <input type="text" name="" class="form-control" placeholder="LOCALIDAD"></P>
            </div>

            <div class="col-sm-5">
                <P> <input type="text" name="TelefonoPr" class="form-control" placeholder="TELEFONO"></P>
            </div>
            <div class="col-sm-8">
                <u>
                    <H3>
                        <p>Datos del Predio </p>
                    </H3>
                </u>
            </div>
            <div class="col-sm-10  h-auto">
                <P> <input type="text" name="DocumentacionLegal" class="form-control"
                        placeholder=" DOCUMENTACION LEGAL"></P>
            </div>
            <div class="col-sm-5">
                <P> <input type="text" name="NomenclaturaCatastral" class="form-control"
                        placeholder="NOMENCLATURA CATASTRAL"></P>
            </div>
            <div class="col-sm-5">
                <P> <input type="text" name="Lote" class="form-control" placeholder="LOTE"></P>
            </div>
            <div class="col-sm-5">
                <P> <input type="text" name="DomicilioEmprendimiento" class="form-control"
                        placeholder="DIRECCION DEL EMPRENDIMIENTO"></P>
            </div>
            <div class="col-sm-5">

                <label for="">Localidad</label>
                <select name="PDAPJECNIA" id="PDAPJECNIA">
                    @foreach ($localidad as $key => $value)
                        <option value="{{ $value }}">{{ $key }}</option>
                    @endforeach
                </select>
            </div>


            <div class="col-sm-5">
                <P> <input type="text" name="LAT" class="form-control" placeholder="LATITUD"></P>
            </div>
            <div class="col-sm-5">
                <P> <input type="text" name="LONG" class="form-control" placeholder="LONGITUD"></P>
            </div>
            <div class="col-sm-8">
                <u>
                    <H3>
                        <p>Datos del Emprendimiento </p>
                    </H3>
                </u>
            </div>
            <div class="col-sm-5">

                <label for="">Localidad</label>
                <select class="col-sm-5 p-2" name="PDAPJECNIA" id="PDAPJECNIA">
                    @foreach ($localidad as $key => $value)
                        <option value="{{ $value }}">{{ $key }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-sm-5">

                <P> <input type="text" name="IdEspecie" class="form-control" placeholder="ESPECIE"></P>
            </div>
            <div class="col-sm-5">
                <P> <input type="text" name="SupPINO" class="form-control" placeholder="SUPERFICIE"></P>
            </div>
            <div class="col-sm-5">
                <P> <input type="text" name="PlantinCantidad" class="form-control" placeholder="CANTIDAD"></P>
            </div>
            <div class="col-sm-10  h-auto">
                <P> <input type="text" name="Descripcion" class="form-control" placeholder="DESCRIPCION"></P>
            </div>


            <div class="col-sm-8">
                <u>
                    <H3>
                        <p>Datos Anexos </p>
                    </H3>
                </u>
            </div>
            <div class="col-sm-5  ">

                <label for="">Entidad</label>
                <select name="IdEntidad" id="IdEntidad">
                    @foreach ($Institucion as $key => $value)
                        <option value="{{ $value }}">{{ $key }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-sm-5">

                <label for="">Referente

                </label>
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


        </div>
    </div>

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
</body>

</html>
