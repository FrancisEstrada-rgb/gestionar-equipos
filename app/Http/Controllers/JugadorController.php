<?php

namespace App\Http\Controllers;

use App\Models\Jugador;
use App\Models\Equipo;
use Illuminate\Http\Request;

class JugadorController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function index($equipoId)
    {
        $equipo = Equipo::findOrFail($equipoId);
        $jugadores = $equipo->jugadores;  // Obtener los jugadores del equipo

        return view('jugadores.index', compact('equipo', 'jugadores'));
    }

    
    public function create($equipoId)
    {
        $equipo = Equipo::findOrFail($equipoId);
        return view('jugadores.create', compact('equipo'));
    }

   
    public function store(Request $request, $equipoId)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'posicion' => 'required|string|max:255',
        ]);

        $equipo = Equipo::findOrFail($equipoId);

        
        $jugador = new Jugador();
        $jugador->nombre = $request->nombre;
        $jugador->posicion = $request->posicion;
        $jugador->equipo_id = $equipo->id;
        $jugador->save();

       
        return redirect()->route('jugadores.index', $equipo->id)->with('success', 'Jugador creado correctamente');
    }

   
    public function edit($equipoId, $jugadorId)
    {
        $equipo = Equipo::findOrFail($equipoId);
        $jugador = Jugador::findOrFail($jugadorId);

        return view('jugadores.edit', compact('equipo', 'jugador'));
    }

    
    public function update(Request $request, $equipoId, $jugadorId)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'posicion' => 'required|string|max:255',
        ]);

        $jugador = Jugador::findOrFail($jugadorId);
        $jugador->nombre = $request->nombre;
        $jugador->posicion = $request->posicion;
        $jugador->save();

        return redirect()->route('jugadores.index', $equipoId)->with('success', 'Jugador actualizado correctamente');
    }

    
    public function destroy($equipoId, $jugadorId)
    {
        $jugador = Jugador::findOrFail($jugadorId);
        $jugador->delete();

        return redirect()->route('jugadores.index', $equipoId)->with('success', 'Jugador eliminado correctamente');
    }
}
