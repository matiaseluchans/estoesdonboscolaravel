@extends('layouts.app')


@section('content')

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

@if(session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif

<h1>Editar Producto</h1>

<form action="{{ route('productos.update', $producto->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" name="nombre" id="nombre" class="form-control" value="{{ $producto->nombre }}" required>
    </div>
    <div class="mb-3">
        <label for="apellido" class="form-label">Apellido</label>
        <input type="text" name="apellido" id="apellido" class="form-control" value="{{ $producto->apellido }}">
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" name="email" id="email" class="form-control" value="{{ $producto->email }}">
    </div>
    <div class="mb-3">
        <label for="telefono" class="form-label">Teléfono</label>
        <input type="text" name="telefono" id="telefono" class="form-control" value="{{ $producto->telefono }}">
    </div>
    <div class="mb-3">
        <label for="precio" class="form-label">Precio</label>
        <input type="text" name="precio" id="precio" class="form-control" value="{{ $producto->precio }}">
    </div>
    <div class="mb-3">
        <label for="estado" class="form-label">Estado</label>
        <select name="estado" id="estado" class="form-select" required>
            <option value="DISPONBLE" {{ $producto->estado == 'DISPONIBLE' ? 'selected' : '' }}>DISPONIBLE</option>
            <option value="VENDIDO" {{ $producto->estado == 'VENDIDO' ? 'selected' : '' }}>VENDIDO</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Actualizar</button>
</form>
@endsection