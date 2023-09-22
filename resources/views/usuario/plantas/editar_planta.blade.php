@extends('layouts.base')

@section('title', 'Editar planta')

@section('content')

<div class="formulario">
    <h1>Editar planta</h1>
    <form method="POST" action="{{ route('planta.update', ['planta' => $planta->id_planta]) }}">
        @csrf
        @method('PUT') <!-- Agregar el campo oculto _method para indicar una actualización -->

        <div class="mb-3">
            <label for="nombre_tipo" class="form-label">Tipo de Planta</label>
            <select name="id_tipo" class="form-control" id="nombre_tipo">
                <option value="">Selecciona un tipo existente o crea uno nuevo</option>
                @foreach ($tipos as $tipo)
                    <option value="{{ $tipo->id_tipo }}" {{ $planta->id_tipo == $tipo->id_tipo ? 'selected' : '' }}>
                        {{ $tipo->nombre_tipo }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="nuevo_nombre_tipo" class="form-label">Nuevo Tipo de Planta</label>
            <input type="text" name="nuevo_nombre_tipo" class="form-control" id="nuevo_nombre_tipo">
        </div>
        <div class="mb-3">
            <label for="estado_planta" class="form-label">Estado de Planta</label>
            <select name="estado" class="form-control" id="estado_planta">
                <option value="">Selecciona estado de la planta</option>
                @foreach ($estados as $estado)
                    <option value="{{ $estado }}" {{ $planta->estado == $estado ? 'selected' : '' }}>
                        {{ $estado }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre planta</label>
            <input type="text" name="nombre_planta" value="{{ $planta->nombre_planta }}" required class="form-control" id="nombre" aria-describedby="nombre">
        </div>
        <div class="mb-3">
            <label for="water" class="form-label">Cantidad de agua en ml</label>
            <input type="text" name="cantidad_agua" value="{{ $planta->cantidad_agua }}" required class="form-control" id="water" aria-describedby="correo">
        </div>
        <div class="mb-3">
            <label for="days" class="form-label">Riego en días</label>
            <input type="text" name="riego" value="{{ $planta->riego }}" required class="form-control" id="days" aria-describedby="correo">
        </div>
        <button type="submit" class="btn custom-btn">Guardar</button>
    </form>
</div>

<a class="btn custom-btn" href="{{ route('planta.index_planta')}}">Volver a plantas</a>

@endsection