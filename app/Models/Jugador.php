<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jugador extends Model
{
    use HasFactory;

    protected $table = 'jugadores';

     //  Un jugador pertenece a un equipo
     public function equipo()
     {
         return $this->belongsTo(Equipo::class);  // Un jugador pertenece a un solo equipo
     }
}
