<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    use HasFactory;

     // Relación uno a muchos con Jugadores
     public function jugadores()
     {
         return $this->hasMany(Jugador::class);  // Un equipo tiene muchos jugadores
     }
}
