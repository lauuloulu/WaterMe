@extends('layouts.base')

@section('title', 'Índice')
    


@section('content')

<h1>Hello world! Esto es el usuario.index</h1>

<a class="btn custom-btn" href="{{ route('persona.index_persona')}}">Usuario</a>
<a class="btn custom-btn" href="{{ route('planta.index_planta')}}">Planta</a>
<a class="btn custom-btn" href="{{ route('registro.index_registro')}}">Riego</a>


@endsection