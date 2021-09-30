@extends('layouts.layout')

@section('titulo', 'Crear nuevo Proyecto')

@section('content')
<h1 class="text-center my-5">Crear nuevo proyecto</h1>
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
<form action="{{ route('proyectos.store') }}" method="post">
    @csrf
    @method('post')
    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre del proyecto</label>
        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre del proyecto" value="{{ old('nombre') }}">
    </div>
    <div class="mb-3">
        <label for="duracion" class="form-label">Duración del proyecto</label>
        <input type="number" class="form-control" id="duracion" name="duracion" placeholder="0" value="{{ old('duracion') }}">
    </div>
    <button type="submit" class="btn btn-primary">Guardar</button>
</form>
@endsection