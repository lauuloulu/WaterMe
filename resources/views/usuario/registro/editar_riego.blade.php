@extends('layouts.base')

@section('title', 'Editar riego')

@section('content')

<div class="formulario">
    <h1>Editar riego</h1>
    <form method="POST" action="{{ route('registro.update', ['registro' => $registro->id_registro]) }}">
        @csrf
        @method('PUT') 

        <div class="mb-3">
            <label for="fecha_registro" class="form-label">Fecha de hoy</label>
            <input type="date" name="fecha_registro" required class="form-control" id="fecha_registro" aria-describedby="fecha_registro" value="{{ $registro->fecha_registro }}">
        </div>
        <div class="mb-3">
            <label for="id_planta" class="form-label">Planta a regar</label>
            <select name="id_planta" required class="form-control" id="id_planta">
                @foreach($plantas as $planta)
                    <option value="{{ $planta->id_planta }}" {{ $registro->id_planta == $planta->id_planta ? 'selected' : '' }}>{{ $planta->nombre_planta }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="id_persona" class="form-label">Persona que realizó el riego</label>
            <select name="id_persona" required class="form-control" id="id_persona">
                @foreach($personas as $persona)
                    <option value="{{ $persona->id_persona }}" {{ $registro->id_persona == $persona->id_persona ? 'selected' : '' }}>{{ $persona->nombre_persona }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="nota_registro" class="form-label">Nota</label>
            <input type="text" name="nota_registro" required class="form-control" id="nota_registro" aria-describedby="nota_registro" value="{{ $registro->nota_registro }}">
        </div>
        <button type="submit" class="btn custom-btn">Guardar</button>
    </form>
</div>

<a class="btn custom-btn" href="{{ route('registro.index_registro')}}">Volver a riegos</a>

@endsection
