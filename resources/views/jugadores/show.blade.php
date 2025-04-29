@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalles del Jugador: {{ $jugador->nombre }}</h1>

    <p><strong>Nombre:</strong> {{ $jugador->nombre }}</p>
    <p><strong>Posición:</strong> {{ $jugador->posicion }}</p>
    <p><strong>Equipo:</strong> {{ $jugador->equipo->nombre }}</p>

    <a href="{{ route('jugadores.index', $jugador->equipo->id) }}" class="btn btn-secondary">Volver a la lista de jugadores</a>
    <a href="{{ route('jugadores.edit', [$jugador->equipo->id, $jugador->id]) }}" class="btn btn-warning">Editar Jugador</a>

    <form action="{{ route('jugadores.destroy', [$jugador->equipo->id, $jugador->id]) }}" method="POST" style="display: inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Eliminar Jugador</button>
    </form>
</div>
@endsection

