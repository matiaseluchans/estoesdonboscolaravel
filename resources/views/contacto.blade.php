@extends('layouts.app')

@section('content')
<!-- Header Start -->
<div class="container-fluid bg-breadcrumb">
    <div class="container text-center py-5" style="max-width: 900px;">
        <h3 class="text-white display-3 mb-4 wow fadeInDown" data-wow-delay="0.1s">Formulario de Contacto</h1>
            <!--<ol class="breadcrumb justify-content-center text-white mb-0 wow fadeInDown" data-wow-delay="0.3s">
                    <li class="breadcrumb-item"><a href="index.html" class="text-white">Inicio</a></li>
                    <li class="breadcrumb-item"><a href="#" class="text-white">Pages</a></li>
                    <li class="breadcrumb-item active text-secondary">Espacios de Publicidad</li>
                </ol>-->
    </div>
</div>
<!-- Header End -->

<!-- Services Start -->
<div class="container-fluid service overflow-hidden py-5">



    <div class="row">
        <div class="col-md-12 mx-auto">

            <div class="col-lg-6 mx-auto wow fadeInRight" data-wow-delay="0.3">

                <div class="alert alert-success" role="alert" style="display :none;" id="alert-message">
                    Gracias por contactarte a la brevedad nos comunicaremos.
                </div>

                <form action="https://formsubmit.co/matiaseluchans@gmail.com" method="POST">
                    <div class="row g-4">
                        <div class="col-lg-12 col-xl-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Nombre" required>
                                <label for="name">Nombre</label>
                            </div>
                        </div>
                        <div class="col-lg-12 col-xl-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Apellido" required>
                                <label for="apellido">Apellido</label>
                            </div>
                        </div>
                        <div class="col-lg-12 col-xl-6">
                            <div class="form-floating">
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                                <label for="email">Email</label>
                            </div>
                        </div>
                        <div class="col-lg-12 col-xl-6">
                            <div class="form-floating">
                                <input type="phone" class="form-control" id="phone" name="phone" placeholder="Telefono" required>
                                <label for="telefono">Telefono</label>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="subject" name="subject" placeholder="Asunto" required>
                                <label for="subject">Asunto</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <textarea class="form-control" placeholder="Dejanos tu mensaje" id="comments" name="comments" style="height: 160px" required></textarea>
                                <label for="comments">Mensaje</label>
                            </div>
                        </div>
                        <input type="hidden" name="_captcha" value="false">
                        <input type="hidden" name="_cc" value="estoesdonbosco@gmail.com,proyecto11desintetico@gmail.com">
                        <input type="hidden" name="_next" value="">


                        <div class="col-12">
                            <button type="submit" class="btn btn-primary w-100 py-3">Enviar Mensaje</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
<script>
    document.getElementsByName('_next')[0].value = window.location.origin + "/contact.html?success=true"

    const currentUrl = window.location.href;

    // Crear un objeto URL para analizar la cadena de consulta
    const urlParams = new URLSearchParams(window.location.search);

    // Evaluar si el parámetro "success" está presente y es "true"
    if (urlParams.get('success') === 'true') {
        console.log("Success es true");
        document.getElementById('alert-message').style.display = 'block';

        // Aquí puedes agregar tu código para mostrar una alerta o realizar otra acción
    } else {
        console.log("Success es false");
        document.getElementById('alert-message').style.display = 'none';

    }
</script>

@endsection