@extends('layouts.layout')

@section('titulo', 'Editar Desarrollador')

@section('content')
<h1 class="text-center my-5">Editar desarrollador</h1>
@if ($errors->any())
    <div class="alert alert-danger">
        <div class="header"><strong>Ups...</strong> algo salió mal</div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{ route('desarrolladores.update', $desarrollador->id) }}" method="post">
    @csrf
    @method('put')
    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $desarrollador->nombre }}">
    </div>
    <div class="mb-3">
        <label for="nombre" class="form-label">Apellido</label>
        <input type="text" class="form-control" id="apellido" name="apellido" value="{{ $desarrollador->apellido }}">
    </div>
    <div class="mb-3">
        <label for="nombre" class="form-label">Dirección</label>
        <input type="text" class="form-control" id="direccion" name="direccion" value="{{ $desarrollador->direccion }}">
    </div>
    <div class="mb-3">
        <label for="nombre" class="form-label">Teléfono</label>
        <input type="text" class="form-control" id="telefono" name="telefono" value="{{ $desarrollador->telefono }}">
    </div>
    <div class="mb-3">
        <label for="proyectoId" class="form-label">Proyecto</label>
        <select name="proyectoId" id="proyectoId" class="form-control">
            @foreach ($proyectos as $proyecto)
                <option value="{{ $proyecto->id }}"
                    @if ($desarrollador->proyectoId == $proyecto->id)
                        selected
                    @endif
                    >
                    {{ $proyecto->nombre }}
                </option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Guardar</button>
</form>
@endsection