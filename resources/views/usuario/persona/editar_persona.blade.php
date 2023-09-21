@extends('layouts.base')
@section('title', 'Editar usuario')

@section('content')
<div class="formulario">
    <h1>Editar usuario</h1>
    <form method="POST" action="{{ route('persona.store')}}">
        @csrf
        <div class="mb-3">
            <label for="nombre_persona" class="form-label">Nombre</label>
            <input type="text" name="nombre_persona" value="{{$persona->nombre_persona}}" required class="form-control" id="nombre_persona" aria-describedby="nombre_persona">
        </div>
        <div class="mb-3">
            <label for="apellidos" class="form-label">Apellios</label>
            <input type="text" name="apellidos" value="{{$persona->apellidos}}" required class="form-control" id="apellidos" aria-describedby="apellidos">
        </div>
        <div class="mb-3">
            <label for="correo" class="form-label">Correo</label>
            <input type="text" name="correo" value="{{$persona->correo}}" required class="form-control" id="correo" aria-describedby="correo">
        </div>
        <div class="mb-3">
            <label for="contraseña" class="form-label">Contraseña</label>
            <input type="password" name="contraseña" value="{{$persona->contraseña}}"class="form-control" id="contraseña" aria-describedby="contraseña">
        </div>
        <button type="submit" class="btn custom-btn">Guardar</button>
    </form>
</div>



@endsection