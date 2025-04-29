@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Nuevo Equipo</h1>

    <form action="{{ route('equipos.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nombre">Nombre del Equipo</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Crear Equipo</button>
    </form>
</div>
@endsection