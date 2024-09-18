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
        <h3 class="text-white display-3 mb-4 wow fadeInDown" data-wow-delay="0.1s">Listado De Metros Vendidos</h1>

    </div>
</div>
<div class="container-fluid service overflow-hidden py-5">

    <div class="row px-4">


        <div class="col-md-6 col-xs-12 mx-auto" style="height: 700px;overflow-y:scroll;    border: thin solid rgba(0, 0, 0, 0.12);padding: 0px;">
            <div class="progress-container">
                <div class="progress-bar" style="width: {{ $porcentajeVendidos }}%;">
                    {{ $porcentajeVendidos }}% Vendido
                </div>
            </div>

            <div class="text-center mt-3">
                <p>{{ number_format($porcentajeVendidos, 2, ',', '.') }}% Completado</p>
                <p>{{ $cantidadVendidos }} metros cuadrados <span class="badge bg-danger">VENDIDOS</span></p>
                <p>{{ $cantidadDisponibles }} metros cuadrados <span class="badge bg-success">DISPONIBLES</span></p>
            </div>

            @if($data->isEmpty())
            <p>No hay productos disponibles.</p>
            @else
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th width="40" class="text-center"> ID</th>
                        <th>Tickets</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Email</th>
                        <th>Teléfono</th>
                        <th>Precio</th>
                        <th width="70">Estado</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $d)
                    <tr>
                        <td style="height:13px" class="text-center">{{ $d->id }}</td>
                        <td>{{ $d->descripcion }}</td>
                        <td>{{ $d->nombre }}</td>
                        <td>{{ $d->apellido }}</td>
                        <td>{{ $d->email }}</td>
                        <td>{{ $d->telefono }}</td>
                        <td>$ {{ number_format($d->precio, 0, ',', '.') }}</td>
                        <td> <span class="badge
                                    @if($d->estado == 'DISPONIBLE')
                                        bg-success
                                    @else
                                        bg-danger
                                    @endif">
                                {{ $d->estado }}
                            </span>

                    </tr>
                    @endforeach
                </tbody>
            </table>




            @endif
        </div>

    </div>
</div>


<script>

</script>

@endsection