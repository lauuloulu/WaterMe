@extends('layouts.base')

@section('title', 'Crear registro riego')

@section('content')

<div class="formulario">
    <h1>Nuevo riego</h1>
    <form method="POST" action="{{ route('registro.store')}}">
        @csrf
        <div class="mb-3">
            <label for="fecha_registro" class="form-label">Fecha de hoy</label>
            <input type="date" name="fecha_registro" required class="form-control" id="fecha_registro" aria-describedby="fecha_registro">
        </div>
        <div class="mb-3">
            <label for="id_planta" class="form-label">Planta a regar</label>
            <select name="id_planta" required class="form-control" id="id_planta">
                <option value="" selected>Selecciona una planta</option>
                @foreach($plantas as $planta)
                    <option value="{{ $planta->id_planta }}">{{ $planta->nombre_planta }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="id_persona" class="form-label">Persona que realizó el riego</label>
            <select name="id_persona" required class="form-control" id="id_persona">
                <option value="">Selecciona una persona</option>
                @foreach($personas as $persona)
                    <option value="{{ $persona->id_persona }}">{{ $persona->nombre_persona }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="nota_registro" class="form-label">Nota</label>
            <input type="text" name="nota_registro" required class="form-control" id="nota_registro" aria-describedby="nota_registro">
        </div>

        <button type="submit" class="btn custom-btn">Guardar</button>
    </form>
</div>
<div class="center-container">
    <a class="btn custom-btn" href="{{ route('registro.index_registro')}}">Volver a riegos</a>
 </div>

@endsection