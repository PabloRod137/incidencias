<?php

namespace Database\Factories;

use App\Models\Incidencia;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ComentarioFactory extends Factory
{
    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            // Selecciona una incidencia al azar de las que ya existen o crea una nueva
            'incidencia_id' => Incidencia::inRandomOrder()->first()?->id ?? Incidencia::factory(),
            
            // Selecciona un usuario al azar para que sea el autor del comentario o crea uno
            'user_id' => User::inRandomOrder()->first()?->id ?? User::factory(),
            
            // Genera una frase aleatoria como mensaje
            'mensaje' => fake()->sentence(10),
            
            'created_at' => fake()->dateTimeBetween('-1 month', 'now'),
        ];
    }
}
