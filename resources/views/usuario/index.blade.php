@extends('layouts.base')

@section('title', 'Índice')
    


@section('content')

<h1>Hello world! Esto es el usuario.index</h1>

@foreach ($registros as $registro)
    @php
        $nextWateringDate = $registro->fecha_registro->addDays($registro->planta_persona->planta->riego);
    @endphp

    <x-plant-water-countdown :plantName="$registro->planta_persona->planta->nombre_planta" :nextWateringDate="$nextWateringDate" />
@endforeach

<a class="btn custom-btn" href="{{ route('persona.index_persona')}}">Usuario</a>
<a class="btn custom-btn" href="{{ route('planta.index_planta')}}">Planta</a>
<a class="btn custom-btn" href="{{ route('registro.index_registro')}}">Riego</a>


@endsection