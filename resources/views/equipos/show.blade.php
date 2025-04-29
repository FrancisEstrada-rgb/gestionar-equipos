@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalles del Equipo: {{ $equipo->nombre }}</h1>

    <p><strong>Nombre del equipo:</strong> {{ $equipo->nombre }}</p>

    <a href="{{ route('equipos.index') }}" class="btn btn-secondary">Volver a la lista</a>
    <a href="{{ route('equipos.edit', $equipo->id) }}" class="btn btn-warning">Editar Equipo</a>
    <form action="{{ route('equipos.destroy', $equipo->id) }}" method="POST" style="display: inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Eliminar Equipo</button>
    </form>
</div>
@endsection


