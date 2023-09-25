@extends('layouts.base')

@section('content')

<ul>
    <li>Planta: {{ $registro->planta_persona->planta->nombre_planta }}</li> 
    <li>Persona que regó: {{ $registro->planta_persona->persona->nombre_persona }}</li> 
    <li>Fecha de riego: {{ $registro->fecha_registro }}</li> 
    <li>Nota: {{$registro->nota_registro}}</li>
</ul>

<a class="btn custom-btn" href="{{ route('registro.index_registro')}}">Volver a plantas</a>


@endsection