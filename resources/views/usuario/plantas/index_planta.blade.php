@extends('layouts.base')

@section('title', 'Plantas')

@section('content')

<a class="btn custom-btn" href="{{ route('planta.crear')}}">Nueva planta</a>

@foreach ($plantas as $planta )

<li><a href="{{ route('planta.show',  ['planta'=> $planta->id_planta])}}">{{ $planta->nombre_planta }}</a> | <a href="{{ route('planta.edit', ['planta'=> $planta->id_planta])}}">Editar</a> 
    <form action="{{ route('planta.delete', ['planta' => $planta->id_planta])}}" method="POST">
        @csrf
        @method('DELETE')
        <input type="submit" value="DELETE" />
    </form>

@endforeach
<a class="btn custom-btn" href="{{ route('usuario.index')}}">Índice</a>
@endsection