@extends('layouts.base')

@section('title', 'Índice')
    
@section('content')

@foreach ($registros as $registro)
    @php
        $nextWateringDate = Carbon\Carbon::parse($registro->planta_persona->planta->riego)->addDays($registro->planta_persona->planta->riego);
    @endphp

    <x-plant-water-countdown 
       :plantImage="asset('storage/' . $registro->planta_persona->planta->imagen)"
       :plantName="$registro->planta_persona->planta->nombre_planta" 
       :nextWateringDate="$nextWateringDate"
       :registro="$registro"
       :editRoute=" route('registro.edit', ['registro' => $registro->id_registro]) " />

    <a href="{{ route('registro.edit', ['registro' => $registro]) }}" class="btn btn-primary">Actualizar riego</a><br>
@endforeach

@endsection