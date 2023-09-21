@extends('layouts.base')

@section('title', 'Plantas')

@section('content')

<a class="btn custom-btn" href="{{ route('planta.crear')}}">Nueva planta</a>

@foreach ($plantas as $planta )

<li><a href="#">{{ $planta->nombre_planta }}</a> | <a href="{{ route('planta.edit', ['planta'=> $planta->id_planta])}}">Editar</a> | <a href="{{ route('planta.delete', ['planta' => $planta->id_planta])}}">Borrar</a> </li>

@endforeach
<a class="btn custom-btn" href="{{ route('usuario.index')}}">Índice</a>
@endsection