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
    }
</style>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<div class="container-fluid bg-breadcrumb">
    <div class="container text-center py-5" style="max-width: 900px;">
        <h3 class="text-white display-3 mb-4 wow fadeInDown" data-wow-delay="0.1s">Comprar M<sup>2</sup></h1>

    </div>
</div>
<div class="container-fluid service overflow-hidden py-5">
    <div class="row">
        <div class="col-md-6 col-xs-12 mx-auto px-4">
            <div class="rounded">
                <img src="img/cancha-grilla-2.png" class="img-fluid w-100" style="margin-bottom: -7px;" alt="Image">

            </div>
        </div>

        <div class="col-md-6 col-xs-12 mx-auto  px-4" style="height: 500px;overflow-y:scroll;">
            @if($productos->isEmpty())
            <p>No hay productos disponibles.</p>
            @else
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Descripcion</th>
                        <!--<th>Nombre</th>
                        <th>Apellido</th>
                        <th>Email</th>
                        <th>Teléfono</th>-->
                        <th>Precio</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($productos as $producto)
                    <tr>
                        <td style="height:15px">{{ $producto->id }}</td>
                        <td>{{ $producto->descripcion }}</td>
                        <!--<td>{{ $producto->nombre }}</td>
                            <td>{{ $producto->apellido }}</td>
                            <td>{{ $producto->email }}</td>
                            <td>{{ $producto->telefono }}</td>-->
                        <td>$ {{ number_format($producto->precio, 2, ',', '.') }}</td>
                        <td> <span class="badge
                                    @if($producto->estado == 'DISPONIBLE')
                                        bg-success
                                    @else
                                        bg-danger
                                    @endif">
                                {{ $producto->estado }}
                            </span>
                        <td>
                            @if($producto->estado != 'VENDIDO')

                            <!--<a href="{{ route('productos.edit', $producto->id) }}" class="btn btn-warning btn-sm">Comprar</a>
-->
                            <a href="#" class="btn btn-warning btn-sm" onclick="editProduct({{ $producto->id }})">Comprar</a>

                            <!--<form action="{{ route('productos.destroy', $producto->id) }}" method="POST" class="d-inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                </form>-->
                            @endif

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>


            <!--modal-->
            <!-- Modal -->
            <div class="modal fade" id="editProductModal" tabindex="-1" aria-labelledby="editProductModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editProductModalLabel">Comprar metro<sup>2<sup></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- Aquí se cargará dinámicamente el formulario con los datos del producto -->
                            <form id="editProductForm" action="{{ route('productos.update', $producto->id) }}">
                                @csrf

                                <div class="row">
                                    <div class="col-md-6">

                                        <label for="nombre" class="form-label">Nombre</label>
                                        <input type="text" name="nombre" id="nombre" class="form-control" required>

                                    </div>
                                    <div class="col-md-6">
                                        <label for="apellido" class="form-label">Apellido</label>
                                        <input type="text" name="apellido" id="apellido" class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="text" name="email" id="email" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="telefono" class="form-label">Teléfono</label>
                                        <input type="text" name="telefono" id="telefono" class="form-control">
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
                                    <div class="col-md-12 text-end">
                                        <button type="button" id="mp-button" class="btn btn-primary">Registrar compra</button>
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
    function editProduct(id) {
        $('#editProductForm').attr('action', `/productos/${id}`);
        $('#editProductModal').modal('show');
        // Realiza una petición AJAX para obtener los datos del producto por ID
        /*$.ajax({
            url: `/productos/${id}/edit`, // Ruta para obtener los datos del producto
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
                $('#editProductForm').attr('action', `/productos/${id}`);

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
            // Crear un objeto vacío donde almacenarás los datos
            let formDataObject = {};

            // Usar serializeArray para obtener los datos y luego convertirlo en un objeto
            form.serializeArray().forEach(function(field) {
                formDataObject[field.name] = field.value;
            });

            console.log(formDataObject);


            //let formData = form.serialize();
            //let formData = new FormData(form[0]);
            //console.log(formData);
            let productId = form.attr('action').split('/').pop();

            Swal.fire({
                title: 'Aguarde un momento',
                text: 'Redirigiendo a Mercado Pago...',
                allowOutsideClick: false,
                showConfirmButton: false,
                willOpen: () => {
                    Swal.showLoading();
                }
            });
            //console.log(formData);

            $.ajax({
                url: `/productos-pago/${productId}`,
                method: 'POST',
                //data: formData,
                data: formDataObject,
                //data: {
                //   _token: '{{ csrf_token() }}',
                //form: formData
                //},
                success: function(response) {
                    window.location.href = response.init_point;
                },
                error: function(xhr) {
                    Swal.close();
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Ocurrió un error al procesar el pago. Por favor, intenta nuevamente.',
                    });
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