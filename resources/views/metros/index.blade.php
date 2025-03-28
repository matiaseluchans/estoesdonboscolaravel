@extends('layouts.app')

@section('content')

<style>
    .table td,
    .table th {
        height: 15px;
        /* Ajusta la altura según tus necesidades */
        vertical-align: middle;
        /* Opcional: para alinear verticalmente el contenido */
        padding: 2px;
        /* Opcional: para agregar espacio dentro de las celdas */
        font-size: 12px;
    }

    .grid-container {
        display: grid;
        grid-template-columns: repeat(auto-fill, 4px);
        grid-gap: 1px;
        /* Espacio entre los cuadraditos */
        width: 600px;
        /* Ancho fijo */
        height: 700px;
        /* Alto fijo */
        overflow-y: scroll;
        /* Permite scroll vertical */
        overflow-x: hidden;
        /* Oculta el scroll horizontal */
        border: 0.5px solid #ccc;
        /* Bordes opcionales */
        margin: 0 auto;
        /* Centrar el grid */
    }

    .grid-item {
        width: 4px;
        height: 4px;
        background-color: #eee;
    }

    .sold {
        background-color: #229547;
    }


    .progress-container {
        width: 100%;
        max-width: 900px;
        /* Ajusta según tus necesidades */
        margin: 0 auto;
        background-color: #f3f3f3;
        border-radius: 5px;
        padding: 3px;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.2);
    }

    .progress-bar {
        height: 30px;
        background-color: green;
        border-radius: 5px;
        text-align: center;
        color: white;
        line-height: 30px;
        font-weight: bold;
        transition: width 0.4s ease;
    }

    .progress-bar-gray {
        background-color: gray;
        height: 30px;
        display: inline-block;
        border-radius: 5px;
    }

    .display-24 {
        font-size: 1.25rem;
    }

    .display-5 {
        font-size: 1.50rem;
    }

    li {
        font-size: 1rem;
    }

    :focus {
        outline: none;
    }

    .service {
        caret-color: transparent;
    }
</style>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<div class="container-fluid bg-breadcrumb">
    <div class="container text-center pt-2 pb-2" style="max-width: 900px;">
        <h3 class="text-white display-3 mb-4 wow fadeInDown" data-wow-delay="0.1s">Colaborá con el proyecto </h1>
            <div class="text-center my-3">
                <a class="btn btn-warning btn-lg flash" onclick="editProduct(2, 'Colaborá', 'Al realizar tu colaboración se te asignarán 2 números válidos para cada uno de los sorteos.')">Colaborá<br>$30.000<br> 2 rifas</a>
                <a class="btn btn-warning btn-lg flash" onclick="editProduct(1, 'Colaborá', 'Al realizar tu colaboración se te asignarán 1 número válido para cada uno de los sorteos.')">Colaborá<br>$15.000<br> 1 rifa</a>
                <!--<h5 class="text-white mt-2 mb-1 " style="font-size:28px;margin-top:20px !important">Cada metro cuenta:<br> $30.000 por m<sup>2</sup> <br> 2 chances de ganar!</h5>
-->
                <p class=" pb-0 mb-0" style="color:white;font-size:20px;margin-top:10px">Los números son válidos para cada uno de los sorteos.</p>

            </div>
    </div>
</div>
<div class="container-fluid service overflow-hidden py-5" style="cursor:">
    <div class=" row px-4">

        <div class="col-md-6 col-xs-12 mx-auto">


            <h5 class="pe-3 text-center display-24">¡Cada vez falta menos para tanto!</h5>
            <div style="">
                <div class="progress-container mt-4" style="">
                    <div class="progress-bar" style="width: {{ $porcentajeVendidos }}%;">
                        {{ number_format($porcentajeVendidos, 2, ',', '.')}}% Completado
                    </div>
                </div>

                <div class="text-center mt-3">
                    <p style="font-size: 18px; font-weight: 900;">{{ number_format($porcentajeVendidos, 2, ',', '.') }}% Completado</p>
                    <!--<p>{{ $cantidadVendidos }} metros cuadrados <span class="badge bg-danger">VENDIDOS</span></p>
                <p>{{ $cantidadDisponibles }} metros cuadrados <span class="badge bg-success">DISPONIBLES</span></p>
                -->
                </div>
            </div>
            <h1 class="display-5 mb-4 text-center">¡Colaborando participás de increíbles sorteos!</h1>

            <div class="rounded text-center mx-auto">

                <img src="img/premios-2.png" class="mx-auto mx-auto d-block d-sm-none" style="border-radius:20px" alt="Image" width="300">

                <img src="img/premios.png" class="mx-auto d-none d-sm-block" style="border-radius:20px;" alt="Image" width="700">

            </div>


            <br>
            <table class="table table-striped mx-auto" style="width:350px">
                <thead>
                    <tr class="bg-primary">
                        <th width="120" class="text-center"> Fecha</th>
                        <th>Sorteo</th>

                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="height:13px" class="text-start">7 de diciembre 2024</td>
                        <td>Un televisor de última generación</td>
                    </tr>

                    <tr>
                        <td style="height:13px" class="text-start">28 de febrero 2025</td>
                        <td>Un juego de living completo</td>
                    </tr>
                    <tr>
                        <td style="height:13px" class="text-start">29 de marzo 2025</td>
                        <td>Una moto eléctrica</td>
                    </tr>
                    <tr>
                        <td style="height:13px" class="text-start">23 de mayo 2025</td>
                        <td>Una PlayStation 5</td>
                    </tr>

                    <tr>
                        <td style="height:13px" class="text-start">5 de julio 2025</td>
                        <td>Un auto 0 km</td>
                    </tr>
                </tbody>
            </table>



        </div>
    </div>
    <div class="row px-4">


        <!--
        <div class="col-md-6 col-xs-12 mx-auto" style="height: 700px;overflow-y:scroll;    border: thin solid rgba(0, 0, 0, 0.12);padding: 0px;">
-->
        <div class="col-md-6 col-xs-12 mx-auto">
            <div class="text-center my-3">
                <a class="btn btn-warning btn-lg flash" style="font-size:0.8rem" onclick="editProduct(2,  'Colaborá', 'Al realizar tu colaboración se te asignarán 2 números válidos para cada uno de los sorteos.')">Colaborá<br>$30.000<br> 2 Números</a>
                <a class="btn btn-warning btn-lg flash" style="font-size:0.8rem" onclick="editProduct(1,  'Colaborá', 'Al realizar tu colaboración se te asignarán 1 número válido para cada uno de los sorteos.')">Colaborá<br>$15.000<br> 1 Número</a>
                <p class="" style="margin-top:7%">Al realizar tu colaboración se te asignarán 2 números válidos para cada uno de los sorteos.</p>
                <a href="pdf/terminos.pdf" target="_blank" class="btn btn-default" style="color: blue; text-decoration: underline;">Ver términos y condiciones</a>

            </div>




            <!--
            @if($data->isEmpty())
            <p>No hay productos disponibles.</p>
            @else
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th width="40" class="text-center"> ID</th>
                        <th>Tickets</th>
                        <th>Precio</th>
                        <th width="70">Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $d)
                    <tr>
                        <td style="height:13px" class="text-center">{{ $d->id }}</td>
                        <td>{{ $d->descripcion }}</td>
                        <td>$ {{ number_format($d->precio, 0, ',', '.') }}</td>
                        <td> <span class="badge
                                    @if($d->estado == 'DISPONIBLE')
                                        bg-success
                                    @else
                                        bg-danger
                                    @endif">
                                {{ $d->estado }}
                            </span>
                        <td>
                            @if($d->estado != 'VENDIDO')

                            <a class="btn btn-warning btn-sm" onclick="editProduct({{ $d->id }})">Colabora</a>


                            @endif

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
-->

            <!--modal-->
            <!-- Modal -->
            <div class="modal fade" id="editProductModal" tabindex="-1" aria-labelledby="editProductModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">

                            <h5 class="modal-title" id="editProductModalLabel">Colabora con 1 metro<sup>2<sup></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- Aquí se cargará dinámicamente el formulario con los datos del producto -->
                            <form id="editProductForm" action="{{ route('metros.update', $d->id) }}">
                                @csrf

                                <div class="row">
                                    <div class="col-md-6">

                                        <label for="nombre" class="form-label">Nombre</label>
                                        <input type="text" name="nombre" id="nombre" class="form-control" required>

                                    </div>
                                    <div class="col-md-6">
                                        <label for="apellido" class="form-label">Apellido</label>
                                        <input type="text" name="apellido" id="apellido" class="form-control" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" name="email" id="email" class="form-control" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="telefono" class="form-label">Teléfono</label>
                                        <input type="number" name="telefono" id="telefono" class="form-control" required>
                                    </div>
                                </div>
                                <!--<div class="row">
                                    <div class="col-md-6">

                                        <label for="precio" class="form-label">Precio</label>
                                        <input type="text" name="precio" id="precio" class="form-control">
                                    </div>
                                    <div class="col-md-6">

                                        <label for="estado" class="form-label">Estado</label>
                                        <select name="estado" id="estado" class="form-select" required>
                                            <option value="DISPONIBLE">DISPONIBLE</option>
                                            <option value="VENDIDO">VENDIDO</option>
                                        </select>
                                    </div>
                                </div>-->
                                <hr>
                                <div class="row mt-3">
                                    <p class="mt-2" style="color:black">Al realizar tu colaboración se te asignarán el/los número/s válido/s para cada uno de los sorteos.</p>

                                    <div class="col-md-12 text-end">
                                        <button type="button" id="mp-button" class="btn btn-primary">Realizar Pago</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--modal-->

            @endif
        </div>

        <div class="row px-4">

            <div class="col-md-6 col-xs-12 mx-auto">



                <!--<p class="mb-4 mt-4">
                    El sorteo se llevará a cabo una vez que alcancemos el número de colaboradores necesario para cada premio.
                    <br>Los sorteos se realizarán en un evento especial que tendrá lugar en nuestra cancha,
                    ubicada en <b>[dirección del club]</b>, el día <b>[fecha del sorteo]</b>, a las <b>[hora del sorteo]</b>.<br><br>

                    El evento será transmitido en vivo a través de nuestras redes sociales, para que todos puedan seguirlo desde sus casas.
                    <br><br>Además, se notificará a los ganadores por email y teléfono.

                    <br><br><b>¡No te pierdas esta oportunidad de colaborar y ganar!</b>
                </p>-->

            </div>
        </div>
    </div>
</div>

@if(session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: '¡El pago se Realizo con exito!',
        text: "{{ session(' success ') }}",
        //timer: 3000,
        showConfirmButton: true
    });
</script>
@endif

@if(session('error'))
<script>
    Swal.fire({
        icon: 'error',
        title: 'Ocurrio un error con el pago',
        text: "{{ session('error ') }}",
        //timer: 3000,
        showConfirmButton: true
    });
</script>
@endif

@if(session('info'))
<script>
    Swal.fire({
        icon: 'info',
        title: 'El pago se encuentra Pendiente',
        text: "{{ session('info ') }}",
        //timer: 3000,
        showConfirmButton: true
    });
</script>
@endif

<script>
    function editProduct(tipo_rifa, textoTitulo, textoAdicional) {
        console.log(tipo_rifa);
        $('#editProductForm').attr('action', `/metros/${tipo_rifa}`);

        // Actualiza el título del modal
        $('#editProductModalLabel').html(textoTitulo);

        // Actualiza el texto adicional dentro del modal
        $('#editProductModal .modal-body p').html(textoAdicional);

        $('#editProductModal').modal('show');
        // Realiza una petición AJAX para obtener los datos del producto por ID
        /*$.ajax({
            url: `/metros/${id}/edit`, // Ruta para obtener los datos del producto
            method: 'GET',
            success: function(data) {
                // Rellena los campos del formulario con los datos recibidos
                $('#nombre').val(data.nombre);
                $('#apellido').val(data.apellido);
                $('#email').val(data.email);
                $('#telefono').val(data.telefono);
                $('#precio').val(data.precio);
                $('#estado').val(data.estado);

                // Actualiza la acción del formulario con la URL correcta para el update
                $('#editProductForm').attr('action', `/metros/${id}`);

                // Abre el modal
                $('#editProductModal').modal('show');
            },
            error: function(error) {
                console.error('Error al obtener los datos del producto:', error);
            }
    });*/
    }

    $(document).ready(function() {


        $('#mp-button').on('click', function() {
            let form = $('#editProductForm');

            // Validar que los campos requeridos no estén vacíos
            let nombre = $('#nombre').val().trim();
            let apellido = $('#apellido').val().trim();
            let email = $('#email').val().trim();
            let telefono = $('#telefono').val().trim();
            let errorMsg = '';

            if (!nombre) {
                errorMsg += 'El campo Nombre es obligatorio.<br>';
            }
            if (!apellido) {
                errorMsg += 'El campo Apellido es obligatorio.<br>';
            }
            if (!email) {
                errorMsg += 'El campo Email es obligatorio.<br>';
            } else {
                // Validar el formato del email
                //let emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}(?<!\.\.)$/;

                let emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

                // Asegurar que no haya puntos consecutivos en ninguna parte del correo
                let hasConsecutiveDots = email.includes('..');

                if (!emailPattern.test(email) || hasConsecutiveDots) {

                    errorMsg += 'El formato del Email es inválido.<br>';
                }
            }
            if (!telefono) {
                errorMsg += 'El campo Teléfono es obligatorio.<br>';
            }

            // Si hay algún error, mostrar mensaje y no continuar
            if (errorMsg) {
                Swal.fire({
                    icon: 'error',
                    title: 'Faltan datos',
                    html: errorMsg, // Aquí mostramos los mensajes de error acumulados
                    showConfirmButton: true
                });
                return; // Detener la ejecución si hay errores
            }

            // Si todos los campos son válidos, continuar con el proceso
            let formDataObject = {};
            form.serializeArray().forEach(function(field) {
                formDataObject[field.name] = field.value;
            });

            let tipo_rifa = form.attr('action').split('/').pop();

            Swal.fire({
                title: 'Aguarde un momento',
                text: 'Redirigiendo a Mercado Pago...',
                allowOutsideClick: false,
                showConfirmButton: false,
                willOpen: () => {
                    Swal.showLoading();
                }
            });

            // Realizar la llamada AJAX para redirigir a Mercado Pago
            $.ajax({
                url: `/metros-pago/${tipo_rifa}`,
                method: 'POST',
                data: formDataObject,
                success: function(response) {
                    window.location.href = response.init_point;
                },
                error: function(xhr) {

                    // Verificar si el estado es 422 (Unprocessable Entity)
                    if (xhr.status === 422) {
                        // Mostrar los mensajes de error de validación recibidos del servidor
                        let errors = xhr.responseJSON.errors;
                        let errorMessage = '';

                        // Recorremos los errores para mostrarlos en un formato adecuado
                        for (let field in errors) {
                            if (errors.hasOwnProperty(field)) {
                                errorMessage += errors[field].join('<br>') + '<br>';
                            }
                        }

                        Swal.close();
                        Swal.fire({
                            icon: 'error',
                            title: 'Errores de validación',
                            html: errorMessage, // Muestra los errores acumulados
                        });
                    } else {
                        // Manejo de otros códigos de error
                        console.log(xhr.responseJSON.message);

                        Swal.close();
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Ocurrió un error al procesar el pago. Por favor, intenta nuevamente.',
                        });
                    }
                }
            });
        });

        /*$('#editProductForm').on('submit', function(event) {
            event.preventDefault(); // Previene el envío normal del formulario

            let form = $(this);
            let formData = form.serialize(); // Serializa los datos del formulario

            // Mostrar SweetAlert de "Registrando información"
            Swal.fire({
                title: 'Registrando información...',
                text: 'Por favor, espera un momento.',
                allowOutsideClick: false,
                showConfirmButton: false,
                willOpen: () => {
                    Swal.showLoading();
                }
            });

            // Enviar los datos del formulario mediante AJAX
            $.ajax({
                url: form.attr('action'),
                method: 'POST',
                data: formData,
                success: function(response) {
                    // Cierra el Swal de carga
                    Swal.close();

                    // Mostrar SweetAlert de éxito
                    Swal.fire({
                        icon: 'success',
                        title: 'Operación exitosa',
                        text: 'El producto ha sido actualizado correctamente.',
                    }).then(() => {
                        // Recargar la página o actualizar la tabla
                        location.reload(); // O usa otra lógica si no quieres recargar toda la página
                    });
                },
                error: function(xhr) {
                    // Cierra el Swal de carga
                    Swal.close();

                    // Mostrar SweetAlert de error
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Ocurrió un error al intentar actualizar el producto. Por favor, intenta nuevamente.',
                    });
                }
            });
        });*/
    });
</script>

@endsection
