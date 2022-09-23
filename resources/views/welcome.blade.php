<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-theme.min.css') }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <title>DendroMisiones</title>
</head>

<body background="{{ asset('image/pinos.jfif') }}" alt="img" class="antialiased  w-100">

    @include('layouts.Menu')

    <section class="">
        {{-- <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="image/dendro.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="image/agroMisiones.png" class="d-block w-100" alt="...">
            </div>
             <div class="carousel-item">
                <img src="image/pre1.jpg" class="d-block w-100" alt="...">
            </div>
        </div>
    </div> --}}


        <section class="float-md-end mb-3 ms-md-3" style="width: 25rem; height: 100%;">
            <div class="accordion accordion-flush" id="accordionFlushExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingOne">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                            <h5>Programa de Recursos Dendroenergéticos Renovables</h5>
                        </button>
                    </h2>
                    <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne"
                        data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">El programa Dendro Energia Renovable Misiones se basa en la inciativa
                            de mejorar la calidad de produccion Misionera.</div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h3 class="accordion-header" id="flush-headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                            Secretaria de desarrollo Forestal
                        </button>

                    </h3>

                    <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo"
                        data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <p>
                                En este marco la Subsecretaría de Desarrollo Forestal, está trabajando en generar acuerdos con consumidores de recursos
                                dendroenergéticos (leña), con productores y/o con instituciones que los representen
                                (cooperativas, municipalidades, etc.) a fin de establecer en el presente año parte de
                                las plantaciones forestales con fines energéticos, de un total de diez mil que se piensa
                                establecer hasta el año 2015 inclusive (en el año 2015 la Ley prevé la sustitución total
                                de la leña originada en bosques nativos por la proveniente de bosques cultivados).
                            </p>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseThree" aria-expanded="false"
                            aria-controls="flush-collapseThree">
                            Inscripcion
                        </button>
                    </h2>
                    <div id="flush-collapseThree" class="accordion-collapse collapse"
                        aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            Para formalizar la inscripción, se requerirá un formulario, provisto por la Subsecretaría,
                            para cada productor con los datos básicos, al que se adjuntará una copia del DNI y de la
                            documentación de la chacra.
                            Estos formularios, junto a la documentación, deben ser entregados a la subsecretaría antes
                            de la fecha de cierre de las inscripciones.

                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="float-md-end mb-3 ms-md-3" style="width: 40rem ; height: 25%;">
            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="image/agroMisiones.png" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="image/agroMisiones.png" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="image/agroMisiones.png" class="d-block w-100" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>










        </section>
        <section>

            <div class="vstack gap-3">
                <div class="bg-light border">
                    <H3>
                        Breve Explicación del programa
                    </H3>

                    <P>


                        En vista del consumo industrial de leña en la provincia y de la presión que este consumo ejerce
                        sobre los bosques nativos la Cámara de Representantes de la Provincia de Misiones ha sancionado
                        la
                        Ley XVI 106 de Recursos Dendroenergéticos Renovables.
                        En ella se propician entre otras cosas la sustitución de la producción, comercialización y
                        consumo
                        industrial de leña y de carbón vegetal de origen de bosques naturales, por leña de bosques
                        cultivados.

                    </P>
                </div>

            </DIV>
            <script src="{{ asset('js/jquery.min.js') }}"></script>
            <script src="{{ asset('js/app.js') }}" defer></script>
        </section>


</body>
{{-- <footer>
    @include('layouts.Pie')
</footer> --}}

</html>
