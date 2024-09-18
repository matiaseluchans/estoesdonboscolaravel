<!DOCTYPE html>
<html lang="es">

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

    <div class="container">
        <h1 class="my-4">Laravel Log Viewer</h1>

        <div class="card">
            <div class="card-header bg-dark text-white">
                <strong>Log Details</strong>
            </div>
            <div class="card-body">
                @if ($logs)
                <!-- Mostrar logs dentro de un pre para mantener formato -->
                <pre class="bg-light p-3" style="max-height: 500px; overflow-y: scroll; font-size: 14px; border-radius: 5px;">
                    {!! nl2br(e($logs)) !!}
                </pre>
                @else
                <p>No se encontró ningún archivo de log.</p>
                @endif
            </div>
        </div>
    </div>

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
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const logContent = document.querySelector('pre');

            if (logContent) {
                let content = logContent.innerHTML;

                // Resaltar los errores y advertencias
                content = content.replace(/ERROR/g, '<span class="badge bg-danger font-weight-bold">ERROR</span>');
                content = content.replace(/WARNING/g, '<span class="badge bg-warning font-weight-bold">WARNING</span>');
                content = content.replace(/DEBUG/g, '<span class="badge bg-primary font-weight-bold">DEBUG</span>');
                content = content.replace(/INFO/g, '<span class="badge bg-info font-weight-bold">DEBUG</span>');

                logContent.innerHTML = content;
            }
        });
    </script>
</body>

</html>