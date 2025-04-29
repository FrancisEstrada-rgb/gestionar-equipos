<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EquipoController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function index()
    {
        
        $equipos = Auth::user()->equipos;
        return view('equipos.index', compact('equipos')); 
    }

   
    public function create()
    {
        
        return view('equipos.create');
    }

    
    public function store(Request $request)
    {
       
        $request->validate([
            'nombre' => 'required|string|max:255',
        ]);

        
        $equipo = new Equipo();
        $equipo->nombre = $request->nombre;
        $equipo->user_id = Auth::id(); 
        $equipo->save();

        
        return redirect()->route('equipos.index')->with('success', 'Equipo creado correctamente');
    }

   
    public function show(string $id)
    {
       
        $equipo = Equipo::findOrFail($id);
        return view('equipos.show', compact('equipo')); 
    }

   
    public function edit(string $id)
    {
        
        $equipo = Equipo::findOrFail($id);
        return view('equipos.edit', compact('equipo')); 
    }

   
    public function update(Request $request, string $id)
    {
        
        $request->validate([
            'nombre' => 'required|string|max:255',
        ]);

        
        $equipo = Equipo::findOrFail($id);
        $equipo->nombre = $request->nombre;
        $equipo->save(); 

        
        return redirect()->route('equipos.index')->with('success', 'Equipo actualizado correctamente');
    }

    
    public function destroy(string $id)
    {
       
        $equipo = Equipo::findOrFail($id);
        $equipo->delete(); 

        return redirect()->route('equipos.index')->with('success', 'Equipo eliminado correctamente');
    }
}
