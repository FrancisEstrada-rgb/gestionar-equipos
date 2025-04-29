@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Equipo</h1>

    <form action="{{ route('equipos.update', $equipo->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nombre">Nombre del Equipo</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $equipo->nombre }}" required>
        </div>
        <button type="submit" class="btn btn-warning mt-3">Actualizar Equipo</button>
    </form>
</div>
@endsection
