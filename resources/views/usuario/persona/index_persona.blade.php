@extends('layouts.base')

@section('title', 'Persona')

@section('content')

<a href="{{route('persona.crear')}}">Crear nueva Persona</a>

<ul>
    @forelse ($persona as $persona )
        <li><a href="#">{{$persona->nombre_persona}}</a></li>
    @empty

    <p>No hay usuarios disponibles</p>    
    @endforelse
</ul>

@endsection