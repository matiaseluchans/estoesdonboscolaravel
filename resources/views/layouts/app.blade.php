<!DOCTYPE html>
<html lang="es">
<style>
    .image-container {
        display: grid;
        position: relative;
        overflow: hidden;
    }

    .image-container div {
        width: 100%;
        height: 100%;
        background-image: url('img/cancha-squad.jpeg');
        /* Ruta a la imagen */
        background-size: var(--bg-width) var(--bg-height);
        /* Tamaño de la imagen */
        background-repeat: no-repeat;
        opacity: 0;
        animation: appear 0.6s ease-in-out forwards;
        /* Aplicar un retraso secuencial basado en el orden */
        animation-delay: calc(var(--i) * 0.01s);
    }

    @keyframes appear {
        from {
            transform: scale(0);
            opacity: 0;
        }

        to {
            transform: scale(1);
            opacity: 1;
        }
    }

    .nav-item {
        font-size: 15px;
    }
</style>

<head>
    <meta charset="utf-8">
    <title>Don Bosco Proyecto</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600;700&family=Poppins:wght@200;300;400;500;600&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('lib/animate/animate.min.css')}}" rel="stylesheet">
    <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">


    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('css/style.css')}}" rel="stylesheet">
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
</head>



<body>

    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-secondary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


    <!-- Topbar Start -->
    <!--<div class="container-fluid bg-primary px-5 d-none d-lg-block">
            <div class="row gx-0 align-items-center">
                <div class="col-lg-5 text-center text-lg-start mb-lg-0">
                    <div class="d-flex">
                        <a href="#" class="text-muted me-4"><i class="fas fa-envelope text-muted me-2"></i>Example@gmail.com</a>
                        <a href="#" class="text-muted me-0"><i class="fas fa-phone-alt text-muted me-2"></i>+01234567890</a>
                    </div>
                </div>
                <div class="col-lg-3 row-cols-1 text-center mb-2 mb-lg-0">
                    <div class="d-inline-flex align-items-center" style="height: 45px;">
                        <a class="btn btn-sm btn-outline-light btn-square rounded-circle me-2" href=""><i class="fab fa-twitter fw-normal text-muted"></i></a>
                        <a class="btn btn-sm btn-outline-light btn-square rounded-circle me-2" href=""><i class="fab fa-facebook-f fw-normal text-muted"></i></a>
                        <a class="btn btn-sm btn-outline-light btn-square rounded-circle me-2" href=""><i class="fab fa-linkedin-in fw-normal text-muted"></i></a>
                        <a class="btn btn-sm btn-outline-light btn-square rounded-circle me-2" href=""><i class="fab fa-instagram fw-normal text-muted"></i></a>
                        <a class="btn btn-sm btn-outline-light btn-square rounded-circle" href=""><i class="fab fa-youtube fw-normal text-muted"></i></a>
                    </div>
                </div>
                <div class="col-lg-4 text-center text-lg-end">
                    <div class="d-inline-flex align-items-center" style="height: 45px;">
                        <a href="#" class="text-muted me-2"> Help</a><small> / </small>
                        <a href="#" class="text-muted mx-2"> Support</a><small> / </small>
                        <a href="#" class="text-muted ms-2"> Contact</a>
                    </div>
                </div>
            </div>
        </div>-->
    <!-- Topbar End -->

    <!-- Navbar & Hero Start -->
    <div class="container-fluid nav-bar p-0">
        <nav class="navbar navbar-expand-lg navbar-light bg-white px-4 px-lg-5 py-1 py-lg-0">
            <a href="" class="navbar-brand p-0">
                <h1 class="display-24 text-secondary m-0"><img src="img/donbosco.png" class="img-fluid" alt="">Don Bosco</h1>
                <!-- <img src="img/logo.png" alt="Logo"> -->
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0">
                    <a href="{{ route('home') }}" class="text-center nav-item nav-link {{ Request::is('/') ? 'active' : '' }}">Inicio</a>
                    <a href="{{ route('metros.index') }}" class="text-center nav-item nav-link {{ Request::is('metros*') ? 'active' : '' }}"><span class="badge bg-warning" style="font-size: 16px;">Colaborar <br>con M<sup>2</sup></span></a>
                    <a href="{{ route('home') }}#proyecto" class="text-center nav-item nav-link">Proyecto</a>
                    <a href=" {{ route('ecko') }}" class="text-center nav-item nav-link {{ Request::is('ecko') ? 'active' : '' }}">Ecko</a>
                    <a href="{{ route('colabora') }}" class="text-center nav-item nav-link botonesDePago {{ Request::is('colabora') ? 'active' : '' }}">
                        <span class="badge bg-warning" style="font-size: 16px;">Colaborá</span>
                    </a>
                    <a href="{{ route('iniciativas') }}" class="text-center nav-item nav-link {{ Request::is('iniciativas') ? 'active' : '' }}">Iniciativas</a>
                    <a href="{{ route('sponsors') }}" class="text-center nav-item nav-link {{ Request::is('sponsors') ? 'active' : '' }}">Sponsors</a>
                    <a href="{{ route('comision') }}" class="text-center nav-item nav-link {{ Request::is('comision') ? 'active' : '' }}">Comisión</a>
                    <a href="{{ route('contacto') }}" class="text-center nav-item nav-link {{ Request::is('contacto') ? 'active' : '' }}">Contacto</a>

                </div>
                <!--<button class="btn btn-primary btn-md-square border-secondary mb-3 mb-md-3 mb-lg-0 me-3" data-bs-toggle="modal" data-bs-target="#searchModal"><i class="fas fa-search"></i></button>
            <a href="" class="btn btn-primary border-secondary rounded-pill py-2 px-4 px-lg-3 mb-3 mb-md-3 mb-lg-0">Get A Quote</a>-->
            </div>
        </nav>
    </div>

    <div class="">
        @yield('content')
    </div>

    <!-- Copyright Start -->
    <div class="container-fluid copyright py-4">
        <div class="container">
            <div class="row g-4 align-items-center">
                <div class="col-md-6 text-center text-md-start mb-md-0">
                    <span class="text-white">Todos los derechos reservados</span>
                </div>
                <div class="col-md-6 text-center text-md-end text-white">
                    <!--/*** This template is free as long as you keep the below author’s credit link/attribution link/backlink. ***/-->
                    <!--/*** If you'd like to use the template without the below author’s credit link/attribution link/backlink, ***/-->
                    <!--/*** you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". ***/-->
                    Don Bosco
                </div>
            </div>
        </div>
    </div>
    <!-- Copyright End -->


    <!-- Back to Top -->
    <div class="botonesDePago">
        <button type="button" class="btn-flotante flash btn btn-warning btn-lg-square fixed-bottom-right" style="margin-bottom: 60px;" data-bs-toggle="modal" data-bs-target="#donationModal">
            <i class="fa fa-dollar-sign" style="zoom:2;color:#fff"></i>
            <span class="text" style="color:#fff"></span>
        </button>
        <div class="modal fade" id="donationModal" tabindex="-1" aria-labelledby="donationModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="donationModalLabel">Selecciona una opción</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p class="text-center">¿Cuánto podes colaborar?</p>

                        <div class="d-grid gap-2">
                            <button class="btn btn-success btn-lg flash" type="button" onclick="link1000()"> $1.000</button>
                            <button class="btn btn-primary btn-lg flash" type="button" onclick="link3000()"> $3.000</button>
                            <button class="btn btn-primary btn-lg flash" type="button" onclick="link5000()"> $5.000</button>
                            <button class="btn btn-warning btn-lg flash" type="button" onclick="link10000()"> $10.000</button>
                            <button class="btn btn-warning btn-lg flash" type="button" onclick="link25000()"> $25.000</button>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <button onclick="abrirWhatsApp()" class="btn-flotante btn btn-primary flash btn-lg-square fixed-bottom-right">
        <i class="fab fa-whatsapp" style="zoom:2"></i>
        <span class="text" style="color:#fff">Chatea</span>
    </button> <!-- Back to Top -->

    <!-- JavaScript Libraries -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="{{ asset('lib/wow/wow.min.js')}}"></script>
    <script src="{{ asset('lib/easing/easing.min.js')}}"></script>
    <script src="{{ asset('lib/waypoints/waypoints.min.js')}}"></script>
    <script src="{{ asset('lib/counterup/counterup.min.js')}}"></script>
    <script src="{{ asset('lib/owlcarousel/owl.carousel.min.js')}}"></script>


    <!-- Template Javascript -->
    <script src="{{ asset('js/main.js')}}"></script>

    <script type="module">
        import Swiper from 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.mjs'

        const swiper = new Swiper();
    </script>

</body>

</html>