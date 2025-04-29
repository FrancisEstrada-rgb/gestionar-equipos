<?php

namespace Database\Factories;
use App\Models\Jugador;
use App\Models\Equipo;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Jugador>
 */
class JugadorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->name, 
            'posicion' => $this->faker->randomElement(['Delantero', 'Defensa', 'Centrocampista', 'Portero']),
            'equipo_id' => Equipo::inRandomOrder()->first()->id, 
        ];
    }
}
