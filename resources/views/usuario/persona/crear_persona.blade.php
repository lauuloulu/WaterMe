@extends('layouts.base')

@section('title', 'Crear usuario')

@section('content')

<div class="formulario">
    <h1>Nuevo usuario</h1>
    <form method="POST" action="{{ route('persona.store')}}">
        @csrf
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" name="nombre_persona" required class="form-control" id="nombre" aria-describedby="nombre">
        </div>
        <div class="mb-3">
            <label for="nombre" class="form-label">Apellios</label>
            <input type="text" name="apellidos" required class="form-control" id="apellidos" aria-describedby="nombre">
        </div>
        <div class="mb-3">
            <label for="correo" class="form-label">Correo</label>
            <input type="text" name="correo" required class="form-control" id="correo" aria-describedby="correo">
        </div>
        <button type="submit" class="btn custom-btn">Guardar</button>
    </form>
</div>
<div class="center-container">
    <a class="btn custom-btn" href="{{ route('persona.index_persona')}}">Volver a usuario</a>
 </div>

@endsection