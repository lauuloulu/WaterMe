@extends('layouts.base')

@section('title', 'Plantas')

@section('content')

<a class="btn custom-btn" href="{{ route('planta.crear')}}">Nueva planta</a>
<p>Esto es index_planta</p>


@foreach ($plantas as $planta )
<p>{{ $planta->nombre_planta }}</p>
@endforeach

@endsection