@extends('layouts.base')

@section('title', 'Persona')

@section('content')


<ul class="personalista">
    @forelse ($persona as $persona )
        <li><a href="{{ route('persona.show', ['persona' => $persona->id_persona])}}">{{$persona->nombre_persona}}</a> | <a href="{{ route('persona.edit', ['persona' => $persona->id_persona])}}">Editar</a> | 
            <form action="{{ route('persona.delete', ['persona' => $persona->id_persona])}}" method="POST">
                @csrf
                @method('DELETE')
                <input type="submit" value="DELETE" />
            </form>
        </li>
    @empty

    <p>No hay usuarios disponibles</p>    
    @endforelse
</ul>

<a class="btn custom-btn" href="{{ route('usuario.index')}}">Índice</a>
<a href="{{route('persona.crear')}}" class="btn custom-btn">Crear nueva Persona</a>


@endsection