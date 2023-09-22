@extends('layouts.base')

@section('content')
<h1>{{$persona->nombre_persona}} {{$persona->apellidos}}</h1>

    <p>{{ $persona ->correo }}</p>

<a class="btn custom-btn" href="{{ route('persona.index_persona')}}">Volver a usuarios</a>


@endsection