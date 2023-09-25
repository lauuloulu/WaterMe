@extends('layouts.base')

@section('content')

<h1>{{ $planta->nombre_planta }}</h1>
@if ($planta->imagen)
    <img src="{{ asset('storage/' . $planta->imagen) }}" alt="{{ $planta->nombre_planta }}">
@endif
<ul>
    <li><strong>Tipo de Planta:</strong> {{ $nombre_tipo }}</li>
    <li><strong>Estado:</strong> {{ $planta->estado }}</li>
    <li><strong>Cantidad de Agua:</strong> {{ $planta->cantidad_agua }} ml</li>
    <li><strong>Riego:</strong> Cada {{ $diasEntreRiegos }} días</li>
</ul>

<a class="btn custom-btn" href="{{ route('planta.edit', ['planta'=> $planta->id_planta])}}">Editar</a>
<a class="btn custom-btn" href="{{ route('planta.index_planta')}}">Volver a plantas</a>


@endsection
