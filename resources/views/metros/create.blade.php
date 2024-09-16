@extends('layouts.app')

@section('content')
    <h1>Crear Producto</h1>

    <form action="{{ route('productos.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="apellido" class="form-label">Apellido</label>
            <input type="text" name="apellido" id="apellido" class="form-control">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control">
        </div>
        <div class="mb-3">
            <label for="telefono" class="form-label">Teléfono</label>
            <input type="text" name="telefono" id="telefono" class="form-control">
        </div>
        <div class="mb-3">
            <label for="precio" class="form-label">Precio</label>
            <input type="text" name="precio" id="precio" class="form-control">
        </div>
        <div class="mb-3">
            <label for="estado" class="form-label">Estado</label>
            <select name="estado" id="estado" class="form-select" required>
                <option value="disponible">Disponible</option>
                <option value="no disponible">No disponible</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
@endsection
