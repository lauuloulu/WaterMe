@extends('layouts.base')

@section('title', 'Riego')

@section('content')


<ul class="personalista">
    @forelse ($registros as $registro )
    <li>
        Planta: {{ $registro->planta_persona->planta->nombre_planta }} |
        Persona que regó: {{ $registro->planta_persona->persona->nombre_persona }} |
        Fecha de riego: {{ $registro->fecha_registro }} |
        <a href="{{ route('registro.show', ['registro' => $registro->id_registro]) }}">Ver Detalles</a> |
        <a href="{{ route('registro.edit', ['registro' => $registro->id_registro]) }}">Editar</a> |
        <form action="{{ route('registro.delete', ['registro' => $registro->id_registro]) }}" method="POST">
            @csrf
            @method('DELETE')
            <input type="submit" value="DELETE" />
        </form>
    </li>

    @empty

    <p>No hay riegos disponibles</p>    
    @endforelse
</ul>

<a class="btn custom-btn" href="{{ route('usuario.index')}}">Índice</a>
<a href="{{route('registro.crear')}}" class="btn custom-btn">Crear nuevo registro de riego</a>


@endsection
