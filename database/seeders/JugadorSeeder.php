<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Jugador;
use App\Models\Equipo;

class JugadorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $equipos = Equipo::all();

        foreach ($equipos as $equipo) {
            Jugador::factory(rand(5, 15))->create([
                'equipo_id' => $equipo->id, 
            ]);
        }
    }
}
