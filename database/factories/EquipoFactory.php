<?php

namespace Database\Factories;
use App\Models\Equipo;
use App\Models\User;


use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Equipo>
 */
class EquipoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->company, 
            'user_id' => User::inRandomOrder()->first()->id,
        ];
    }
}
