@extends('layouts.base')

@section('title', 'Persona')

@section('content')

<a href="{{route('persona.crear')}}">Crear nueva Persona</a>

<ul>
    @forelse ($persona as $persona )
        <li><a href="#">{{$persona->nombre_persona}}</a> | <a href="{{ route('persona.edit', ['persona' => $persona->id_persona])}}">Editar</a> | <a href="{{ route('persona.delete', ['persona' => $persona->id_persona])}}">Borrar</a> </li>
    @empty

    <p>No hay usuarios disponibles</p>    
    @endforelse
</ul>

<a class="btn custom-btn" href="{{ route('usuario.index')}}">Índice</a>


@endsection