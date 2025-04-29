@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Jugadores del Equipo: {{ $equipo->nombre }}</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('jugadores.create', $equipo->id) }}" class="btn btn-primary mb-3">Añadir Jugador</a>

    <table class="table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Posición</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($jugadores as $jugador)
                <tr>
                    <td>{{ $jugador->nombre }}</td>
                    <td>{{ $jugador->posicion }}</td>
                    <td>
                        <a href="{{ route('jugadores.edit', [$equipo->id, $jugador->id]) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('jugadores.destroy', [$equipo->id, $jugador->id]) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                         
                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que quieres eliminar este jugador?');">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>


</div>
@endsection


