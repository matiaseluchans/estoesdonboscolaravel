@extends('layouts.app')

@section('content')
<div class="carousel-header">
    <div id="carouselId" class="carousel slide" data-bs-ride="carousel">
        <ol class="carousel-indicators">
            <li data-bs-target="#carouselId" data-bs-slide-to="0" class="active"></li>
            <li data-bs-target="#carouselId" data-bs-slide-to="1"></li>
            <li data-bs-target="#carouselId" data-bs-slide-to="2"></li>
            <li data-bs-target="#carouselId" data-bs-slide-to="3"></li>
            <li data-bs-target="#carouselId" data-bs-slide-to="4"></li>
            <li data-bs-target="#carouselId" data-bs-slide-to="5"></li>
            <!--<li data-bs-target="#carouselId" data-bs-slide-to="6"></li>-->

        </ol>
        <div class="carousel-inner" role="listbox">


            <!--<div class="carousel-item  ">
                <div class="d-none d-sm-block">
                    <img src="img/venta_ecko_1.jpeg" class="img-fluid " alt="Image">

                    <div class="carousel-caption">

                        <div class="carousel-caption mt-4 d-flex flex-column justify-content-end ">
                            <div class="text-center  " style="max-width: 900px;height: 350px;">

                                <h1 class="display-5 text-white mb-3 mb-md-4 d-flex flex-column justify-content-end"> <br><br><br></h1>
                                <a class="btn btn-warning flash border-secondary rounded-pill text-white pt-3 px-5  justify-content-end" href="{{ route('ecko') }}">Conocé más</a>
                            </div>
                        </div>

                    </div>
                </div>

                <div class=" d-block d-sm-none">

                    <img src="img/venta_ecko_3.jpeg" class="img-fluid " alt="Image">
                    <div class="carousel-caption">

                        <div class="carousel-caption mt-4 d-flex flex-column justify-content-end ">
                            <div class="text-center  " style="max-width: 900px;height: 350px;">

                                <h1 class="display-5 text-white mb-3 mb-md-4 d-flex flex-column justify-content-end"> <br><br><br><br><br><br></h1>
                                <a class="btn btn-warning flash border-secondary rounded-pill text-white pt-3 px-5  justify-content-end" href="{{ route('ecko') }}">Conocé más</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>-->
            <div class="carousel-item active">
                <img src="img/cancha2.jpeg" class="img-fluid" alt="Image">
                <div class="carousel-caption">
                    <div class="text-center p-4" style="max-width: 900px;">

                        <h1 class="display-4 text-white mb-3 mb-md-4">¡Colaborando participás de increíbles sorteos!</h1>

                        <a class="btn btn-warning flash border-secondary rounded-pill text-white py-3 px-5" href="{{ route('metros.index') }}">Colaborá</a>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img src="img/cancha2.jpeg" class="img-fluid" alt="Image">
                <div class="carousel-caption">
                    <div class="text-center p-4" style="max-width: 900px;">

                        <h1 class="display-4 text-white mb-3 mb-md-4">Colaborá con un M2</h1>

                        <a class="btn btn-warning flash border-secondary rounded-pill text-white py-3 px-5" href="{{ route('metros.index') }}">Colaborá</a>
                    </div>
                </div>
            </div>
            <div class="carousel-item  ">
                <img src="img/cancha-squad.jpeg" class="img-fluid" alt="Image">

                <div class="carousel-caption">
                    <div class="text-center p-4" style="max-width: 900px;">

                        <h1 class="display-4 text-white mb-3 mb-md-4">Proyecto 11deSintético</h1>
                        <!--<p class="text-white mb-4 mb-md-5 fs-5 wow fadeInUp" data-wow-delay="0.5s">Sumate
                                    </p>-->
                        <a class="btn btn-primary flash border-secondary rounded-pill text-white py-3 px-3" href="#proyecto">Conocé más del proyecto</a>
                    </div>
                </div>

            </div>
            <div class="carousel-item">
                <img src="img/cancha2.jpeg" class="img-fluid" alt="Image">
                <div class="carousel-caption">
                    <div class="text-center p-4" style="max-width: 900px;">

                        <h1 class="display-4 text-white mb-3 mb-md-4">Sumate al grupo de WhatsApp y enterate todas las novedades</h1>

                        <a class="btn btn-primary flash border-secondary rounded-pill text-white py-3 px-5" onclick="abrirWhatsApp()">Unirme al grupo</a>
                    </div>
                </div>
            </div>

            <div class="carousel-item">
                <img src="img/cancha1.jpeg" class="img-fluid" alt="Image">
                <div class="carousel-caption">
                    <div class="text-center p-4" style="max-width: 900px;">

                        <h1 class="display-4 text-capitalize text-white mb-3 mb-md-4 d-flex flex-column justify-content-end">Como lo vamos a hacer?</h1>
                        <a class="btn btn-primary flash border-secondary rounded-pill text-white py-3 px-5" href="{{ route('iniciativas') }}">Enterate las iniciativas</a>
                    </div>
                </div>
            </div>

            <div class=" carousel-item">
                <img src="img/ecko-3.jpeg" class="img-fluid" alt="Image">
                <div class="carousel-caption mt-4 d-flex flex-column justify-content-end">
                    <div class="text-center  " style="max-width: 900px;height: 250px;">

                        <h1 class="display-5 text-white mb-3 mb-md-4 d-flex flex-column justify-content-end">Ecko: De la cancha al escenario del Club</h1>
                        <a class="btn btn-primary flash border-secondary rounded-pill text-white py-3 px-5" href="{{ route('ecko') }}">Nuestro Padrino</a>
                    </div>
                </div>
            </div>

        </div>


    </div>
    <button class=" carousel-control-prev" type="button" data-bs-target="#carouselId" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bg-secondary wow fadeInLeft" data-wow-delay="0.2s" aria-hidden="false"></span>
        <span class="visually-hidden-focusable">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselId" data-bs-slide="next">
        <span class="carousel-control-next-icon bg-secondary wow fadeInRight" data-wow-delay="0.2s" aria-hidden="false"></span>
        <span class="visually-hidden-focusable">Next</span>
    </button>
</div>
</div>
<!-- Carousel End -->



<div class="d-block d-sm-none" style="height:0px">&nbsp;</div>
<div class="d-none d-sm-block" style="height:100px">&nbsp;</div>



<!-- About Start -->
<section id="proyecto">
    <div class="container-fluid pb-5 ">
        <div class="container ">
            <div class="row ">
                <div class="col-xs-12 col-md-4 wow fadeInLeft  pb-5" data-wow-delay="0.1s">
                    <div class="rounded text-center">
                        <img src="img/donbosco.png" class=" text-center mx-auto" style="width:250px;" alt="Image">


                    </div>
                </div>
                <div class="col-xl-8 wow fadeInRight" data-wow-delay="0.3s">
                    <h5 class="sub-title pe-3">Renueva el Sueño</h5>
                    <h1 class="display-5 mb-4"> Proyecto 11deSINTÉTICO</h1>
                    <p class="mb-4">Durante más de 70 años, nuestro club ha sido el corazón del desarrollo deportivo y social en el barrio. Para seguir ofreciendo un espacio de crecimiento continuo, presentamos el proyecto "11deSINTÉTICO": una cancha profesional de 6000 m2 homologada para competencia de alto nivel.
                        <br><br>
                        <b>Fase 1: Fundamentos del Futuro</b><br>
                        Nivelaremos el terreno y construiremos una base sólida con hormigón y sistemas de drenaje para asegurar una cancha duradera y funcional.
                        <br><br>
                        <b>Fase 2: El Campo Renace</b><br>
                        Instalaremos pasto sintético, demarcaremos el campo y colocaremos los arcos. Esto permitirá a los jóvenes seguir su pasión en ligas competitivas, fútbol femenino y senior, manteniéndose conectados con el club más allá de la etapa de baby fútbol.
                        <br><br>
                        <b>Fase 3: Ilumina el Juego</b><br>
                        Esta fase traerá moderna iluminación para extender los entrenamientos y partidos hasta la noche, revitalizando el club como un centro activo y vibrante en el barrio.
                        <br><br>
                        Con 11deSINTÉTICO, fortalecemos el compromiso del club con la comunidad y garantizamos un futuro lleno de oportunidades para todos. Queremos a los chicos en el club y no en la calle. <b>¡Unite a esta transformación y sé parte del legado!</b>
                    </p>
                    <div class="row gy-4 align-items-center">
                        <div class="col-12 col-sm-12 d-flex align-items-center">
                            <i class="fas fa-map-marked-alt fa-3x text-secondary"></i>
                            <h5 class="ms-4">Arriola 1833 -Ramos Mejia</h5>
                        </div>
                        <!--<div class="col-12 col-sm-6 d-flex align-items-center">
                                    <i class="fas fa-passport fa-3x text-secondary"></i>
                                    <h5 class="ms-4">Return Visas Availabile</h5>
                                </div>
                                <div class="col-4 col-md-3">
                                    <div class="bg-light text-center rounded p-3">
                                        <div class="mb-2">
                                            <i class="fas fa-ticket-alt fa-4x text-primary"></i>
                                        </div>
                                        <h1 class="display-5 fw-bold mb-2">34</h1>
                                        <p class="text-muted mb-0">Years of Experience</p>
                                    </div>
                                </div>
                                <div class="col-8 col-md-9">
                                    <div class="mb-5">
                                        <p class="text-primary h6 mb-3"><i class="fa fa-check-circle text-secondary me-2"></i> Offer 100 % Genuine Assistance</p>
                                        <p class="text-primary h6 mb-3"><i class="fa fa-check-circle text-secondary me-2"></i> It’s Faster & Reliable Execution</p>
                                        <p class="text-primary h6 mb-3"><i class="fa fa-check-circle text-secondary me-2"></i> Accurate & Expert Advice</p>
                                    </div>
                                    <div class="d-flex flex-wrap">
                                        <div id="phone-tada" class="d-flex align-items-center justify-content-center me-4">
                                            <a href="" class="position-relative wow tada" data-wow-delay=".9s">
                                                <i class="fa fa-phone-alt text-primary fa-3x"></i>
                                                <div class="position-absolute" style="top: 0; left: 25px;">
                                                    <span><i class="fa fa-comment-dots text-secondary"></i></span>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="d-flex flex-column justify-content-center">
                                            <span class="text-primary">Have any questions?</span>
                                            <span class="text-secondary fw-bold fs-5" style="letter-spacing: 2px;">Free: +0123 456 7890</span>
                                        </div>
                                    </div>
                                </div>-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- About End -->


<!-- Counter Facts Start -->
<div class="container-fluid counter-facts py-2">
    <div class="container ">
        <div class="row g-4">
            <div class="col-12 col-sm-6 col-md-6 col-xl-3 wow fadeInUp" data-wow-delay="0.1s">
                <div class="counter">
                    <div class="counter-icon">
                        <i class="fas fa-passport"></i>
                    </div>
                    <div class="counter-content">
                        <h3>Fundado en</h3>
                        <div class="d-flex align-items-center justify-content-center">
                            <span class="counter-value" data-toggle="counter-up">1953</span>
                            <h4 class="text-secondary mb-0" style="font-weight: 600; font-size: 25px;"></h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-6 col-xl-3 wow fadeInUp" data-wow-delay="0.3s">
                <div class="counter">
                    <div class="counter-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="counter-content">
                        <h3>Socios</h3>
                        <div class="d-flex align-items-center justify-content-center">
                            <span class="counter-value" data-toggle="counter-up">700</span>
                            <h4 class="text-secondary mb-0" style="font-weight: 600; font-size: 25px;">+</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-6 col-xl-3 wow fadeInUp" data-wow-delay="0.5s">
                <div class="counter">
                    <div class="counter-icon">
                        <i class="fas fa-medal"></i>
                    </div>
                    <div class="counter-content">
                        <h3>Torneos Ganados</h3>
                        <div class="d-flex align-items-center justify-content-center">
                            <span class="counter-value" data-toggle="counter-up">37</span>
                            <h4 class="text-secondary mb-0" style="font-weight: 600; font-size: 25px;"></h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-6 col-xl-3 wow fadeInUp" data-wow-delay="0.7s">
                <div class="counter">
                    <div class="counter-icon">
                        <i class="fas fa-futbol"></i>
                    </div>
                    <div class="counter-content">
                        <h3>Equipos por año</h3>
                        <div class="d-flex align-items-center justify-content-center">
                            <span class="counter-value" data-toggle="counter-up">45</span>
                            <h4 class="text-secondary mb-0" style="font-weight: 600; font-size: 25px;"></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Counter Facts End -->


<!-- Testimonial Start -->

<div class="container-fluid testimonial overflow-hidden pb-5">
    <div class="container py-5">
        <div class="section-title text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">
            <div class="sub-style">
                <h5 class="sub-title text-primary px-3">Nuestro Equipo</h5>
            </div>
            <h1 class="display-5 mb-4">Que dicen nuestros chicos sobre nosotros</h1>
            <!--<p class="mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat deleniti amet at atque sequi quibusdam cumque itaque repudiandae temporibus, eius nam mollitia voluptas maxime veniam necessitatibus saepe in ab? Repellat!</p>-->
        </div>
        <div class="owl-carousel testimonial-carousel wow zoomInDown" data-wow-delay="0.2s">
            <div class="testimonial-item">
                <div class="testimonial-content p-4 mb-5">
                    <p class="fs-5 mb-0">Vine al club a los 4 años, hoy tengo 31, <b>don bosco</b> me formo no solo como jugador sino como persona
                    </p>
                    <div class="d-flex justify-content-end">
                        <i class="fas fa-star text-secondary"></i>
                        <i class="fas fa-star text-secondary"></i>
                        <i class="fas fa-star text-secondary"></i>
                        <i class="fas fa-star text-secondary"></i>
                        <i class="fas fa-star text-secondary"></i>
                    </div>
                </div>
                <div class="d-flex">
                    <div class="rounded-circle me-4" style="width: 100px; height: 100px;">
                        <img class="img-fluid rounded-circle" src="img/donbosco.png" alt="img">
                    </div>
                    <div class="my-auto">
                        <h5>Gonzalo Lopez</h5>
                        <p class="mb-0">Categoria 1994</p>
                    </div>
                </div>
            </div>
            <div class="testimonial-item">
                <div class="testimonial-content p-4 mb-5">
                    <p class="fs-5 mb-0"><b>Mi barrio, mi club, mi amigos</b>. amo pasar tiempo en el club
                    </p>
                    <div class="d-flex justify-content-end">
                        <i class="fas fa-star text-secondary"></i>
                        <i class="fas fa-star text-secondary"></i>
                        <i class="fas fa-star text-secondary"></i>
                        <i class="fas fa-star text-secondary"></i>
                        <i class="fas fa-star text-secondary"></i>
                    </div>
                </div>
                <div class="d-flex">
                    <div class="rounded-circle me-4" style="width: 100px; height: 100px;">
                        <img class="img-fluid rounded-circle" src="img/donbosco.png" alt="img">
                    </div>
                    <div class="my-auto">
                        <h5>Santiago Moreira</h5>
                        <p class="mb-0">Categoria 2005</p>
                    </div>
                </div>
            </div>
            <div class="testimonial-item">
                <div class="testimonial-content p-4 mb-5">
                    <p class="fs-5 mb-0">Pase 8 años en el club,<b>me llevo grande recuerdos</b> y amigos. cada tanto voy a ver futbol y tomarme un cafe, don bosco es nuestro lugar
                    </p>
                    <div class="d-flex justify-content-end">
                        <i class="fas fa-star text-secondary"></i>
                        <i class="fas fa-star text-secondary"></i>
                        <i class="fas fa-star text-secondary"></i>
                        <i class="fas fa-star text-secondary"></i>
                        <i class="fas fa-star text-secondary"></i>
                    </div>
                </div>
                <div class="d-flex">
                    <div class="rounded-circle me-4" style="width: 100px; height: 100px;">
                        <img class="img-fluid rounded-circle" src="img/donbosco.png" alt="img">
                    </div>
                    <div class="my-auto">
                        <h5>Mateo Piñeiro</h5>
                        <p class="mb-0">Categoria 1991</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection