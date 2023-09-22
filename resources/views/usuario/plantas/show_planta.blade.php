@extends('layouts.base')

@section('content')

<h1>{{ $planta->nombre_planta }}</h1>
<ul>
    <li><strong>Tipo de Planta:</strong> {{ $nombre_tipo }}</li>
    <li><strong>Estado:</strong> {{ $planta->estado }}</li>
    <li><strong>Cantidad de Agua en ml:</strong> {{ $planta->cantidad_agua }}</li>
    <li><strong>Riego en días:</strong> {{ $planta->riego }}</li>
</ul>

<a class="btn custom-btn" href="{{ route('planta.index_planta')}}">Volver a plantas</a>


@endsection
