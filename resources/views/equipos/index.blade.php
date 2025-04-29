@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Mis Equipos</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('equipos.create') }}" class="btn btn-primary mb-3">Crear Nuevo Equipo</a>

    <table class="table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($equipos as $equipo)
                <tr>
                    <td>{{ $equipo->nombre }}</td>
                    <td>
                        <a href="{{ route('equipos.show', $equipo->id) }}" class="btn btn-info">Ver</a>
                        <a href="{{ route('equipos.edit', $equipo->id) }}" class="btn btn-warning">Editar</a>
                        <a href="{{ route('jugadores.index', $equipo->id) }}" class="btn btn-primary">Ver Jugadores</a>
                        <form action="{{ route('equipos.destroy', $equipo->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            
                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que quieres eliminar este equipo?');">Eliminar</button>

                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

  
</div>
@endsection

