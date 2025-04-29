@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Añadir Jugador al Equipo: {{ $equipo->nombre }}</h1>

    <form action="{{ route('jugadores.store', $equipo->id) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nombre">Nombre del Jugador</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
        </div>
        <div class="form-group">
            <label for="posicion">Posición</label>
            <input type="text" class="form-control" id="posicion" name="posicion" required>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Añadir Jugador</button>
    </form>
</div>
@endsection
