@extends('layouts.base')

@section('title', 'Nueva planta')

@section('content')

<div class="formulario">
    <h1>Nueva planta</h1>
    <form method="POST" action="{{ route('planta.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="nombre_tipo" class="form-label">Tipo de Planta</label>
            <select name="nombre_tipo" class="form-control" id="nombre_tipo">
                <option value="">Selecciona un tipo existente o crea uno nuevo</option>
                @foreach ($tipos as $tipo)
                    <option value="{{$tipo->nombre_tipo}}">{{$tipo->nombre_tipo}}</option>
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
                    <option value="{{$estado}}">{{$estado}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre planta</label>
            <input type="text" name="nombre_planta" required class="form-control" id="nombre" aria-describedby="nombre">
        </div>
        <div class="mb-3">
            <label for="water" class="form-label">Cantidad de agua en ml</label>
            <input type="text" name="cantidad_agua" required class="form-control" id="water" aria-describedby="correo">
        </div>
        <div class="mb-3">
            <label for="days" class="form-label">Riego en días</label>
            <input type="number" name="riego" required class="form-control" id="days" aria-describedby="correo" min="1">
        </div> 
        <div class="mb-3">
            <label for="imagen" class="form-label">Imagen de planta</label>
            <input type="file" name="imagen" class="form-control" id="imagen">
        </div>       
        <button type="submit" class="btn custom-btn">Guardar</button>    
    </form>
</div>
<div class="center-container">
    <a class="btn custom-btn" href="{{ route('planta.index_planta')}}">Volver a plantas</a>
 </div>

@endsection