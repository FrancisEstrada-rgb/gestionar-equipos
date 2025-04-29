@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Jugador: {{ $jugador->nombre }}</h1>

    <form action="{{ route('jugadores.update', [$equipo->id, $jugador->id]) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nombre">Nombre del Jugador</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre', $jugador->nombre) }}" required>
        </div>

        <div class="form-group">
            <label for="posicion">Posición</label>
            <input type="text" class="form-control" id="posicion" name="posicion" value="{{ old('posicion', $jugador->posicion) }}" required>
        </div>

        <button type="submit" class="btn btn-warning mt-3">Actualizar Jugador</button>
    </form>

    <a href="{{ route('jugadores.index', $equipo->id) }}" class="btn btn-secondary mt-3">Volver a la lista de jugadores</a>
</div>
@endsection

