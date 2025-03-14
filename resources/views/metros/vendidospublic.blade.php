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
</style>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<div class="container-fluid bg-breadcrumb">
    <div class="container text-center py-5" style="max-width: 900px;">
        <h3 class="text-white display-3 mb-4 wow fadeInDown" data-wow-delay="0.1s">Listado de Rifas Vendidas</h1>

    </div>
</div>
<div class="container-fluid service overflow-hidden py-5">

    <div class="row px-4">


        <div class="col-md-10 col-xs-12 mx-auto" style="    border: thin solid rgba(0, 0, 0, 0.12);padding: 0px;">
            <!--
        <div class="progress-container">


                <div class="progress-bar" style="width: {{ $porcentajeVendidos }}%;">
                    {{ number_format($porcentajeVendidos, 2, ',', '.') }}% Vendido
                </div>
            </div>



            <div class="text-center mt-3">


                <p>{{ number_format($porcentajeVendidos, 2, ',', '.') }}% Completado</p>
                <p>{{ $cantidadVendidos }} metros cuadrados <span class="badge bg-danger">VENDIDOS</span></p>
                <p>{{ $cantidadDisponibles }} metros cuadrados <span class="badge bg-success">DISPONIBLES</span></p>
            </div>
-->

            @if($data->isEmpty())
            <p>No hay productos disponibles.</p>
            @else
            <br>
            <table class="table table-striped ">
                <thead>
                    <tr>

                        <th style="padding-left:20px">Rifas</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <!--<th>Email</th>
                        <th>Teléfono</th>-->

                        <th width="70">Estado</th>


                    </tr>
                </thead>

                <tbody>
                    @foreach($data as $d)
                    <tr>

                        <td style="padding-left:20px">{{ $d->descripcion }}</td>
                        <td>{{ $d->nombre }}</td>
                        <td>{{ $d->apellido }}</td>
                        <!--<td>{{ $d->emailoculto }}</td>
                        <td>{{ $d->telefonooculto }}</td>-->
                        <td> <span class="badge
                                    @if($d->estado == 'DISPONIBLE')
                                        bg-success
                                    @else
                                        bg-danger
                                    @endif">
                                {{ $d->estado }}
                            </span>
                        </td>
                        <td>
                            @if($d->estado != 'VENDIDO')

                            <a class="btn btn-warning btn-sm" onclick="editProduct({{ $d->id }}, '{{ $d->descripcion }}')"
                                style="padding: 0px 6px 0px 6px; margin: 5px;"><i class=" fa fa-edit"></i></a>


                            @endif

                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>


            <!-- Modal -->
            <div class="modal fade" id="editProductModal" tabindex="-1" aria-labelledby="editProductModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editProductModalLabel">Asginar Metro<sup>2<sup></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- Aquí se cargará dinámicamente el formulario con los datos del producto -->
                            <form id="editProductForm" method="POST" action="{{ route('metros.update', $d->id) }}">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-12">
                                        <p><strong>Descripción:</strong> <span id="modalDescripcion"></span></p>
                                    </div>
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

                                <hr>
                                <div class="row mt-3">
                                    <p class="mt-2" style="color:black">Al realizar tu colaboración se te asignarán 2 números válidos para cada uno de los sorteos.</p>

                                    <div class="col-md-12 text-end">
                                        <button type="submit" class="btn btn-primary">Guardar</button>
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
        title: '¡El registro se realizo con exito!',
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
        title: 'Ocurrio un error con el registro',
        text: "{{ session('error ') }}",
        //timer: 3000,
        showConfirmButton: true
    });
</script>
@endif
<script>
    function editProduct(id, descripcion) {
        document.getElementById('editProductForm').action = `/metros/${id}`;
        document.getElementById('modalDescripcion').innerText = descripcion;

        $('#editProductModal').modal('show');

    }
</script>

@endsection