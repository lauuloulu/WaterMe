@extends('layouts.base')

@section('title', 'Nueva planta')

@section('content')

<div class="formulario">
    <h1>Nueva planta</h1>
    <form method="POST" action="{{ route('planta.store')}}">
        @csrf
        <div class="mb-3">
            <label for="tipo_planta" class="form-label">Tipo de Planta</label>
            <select name="id_tipo" class="form-control" id="tipo_planta">
                <option value="">Selecciona un tipo existente</option>
                @foreach ($tipos as $tipo)
                    <option value="{{$tipo->id_tipo}}">{{$tipo->tipo_planta}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="nuevo_tipo_planta" class="form-label">Nuevo Tipo de Planta</label>
            <input type="text" name="nuevo_tipo_planta" class="form-control" id="nuevo_tipo_planta">
        </div>
        <div class="mb-3">
            <label for="estado_planta" class="form-label">Estado de Planta</label>
            <select name="estado" class="form-control" id="estado_planta">
                <option value="">Selecciona estado de la planta</option>
                @foreach ($estados as $estado)
                    <option value="{{$estado}}">{{$estado}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre planta</label>
            <input type="text" name="nombre_planta" required class="form-control" id="nombre" aria-describedby="nombre">
        </div>
        <div class="mb-3">
            <label for="water" class="form-label">Cantidad de agua</label>
            <input type="text" name="cantidad_agua" required class="form-control" id="water" aria-describedby="correo">
        </div>
        <div class="mb-3">
            <label for="days" class="form-label">Riego en días</label>
            <input type="text" name="riego" required class="form-control" id="days" aria-describedby="correo">
        </div>
        <button type="submit" class="btn custom-btn">Guardar</button>    
    </form>
</div>
<div class="center-container">
    <a class="btn custom-btn" href="{{ route('planta.index_planta')}}">Volver a plantas</a>
 </div>

@endsection