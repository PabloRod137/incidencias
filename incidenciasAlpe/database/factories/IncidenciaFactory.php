<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Aula;
use App\Models\Categoria;
use Illuminate\Database\Eloquent\Factories\Factory;

class IncidenciaFactory extends Factory
{
    public function definition(): array
    {
        return [
            'titulo' => fake()->sentence(4), // Ej: "El proyector no enciende"
            'descripcion' => fake()->paragraph(),
            'acciones_a_realizar' => fake()->optional()->sentence(),
            'estado' => fake()->randomElement(['abierta', 'en_proceso', 'resuelta']),
            'prioridad' => fake()->randomElement(['baja', 'media', 'alta', 'critica']),
            // Relaciones: elige un ID al azar de lo que ya existe o crea uno nuevo si no hay registros
            'user_id' => User::inRandomOrder()->first()?->id ?? User::factory(),
            'aula_id' => Aula::inRandomOrder()->first()?->id ?? Aula::factory(),
            'categoria_id' => Categoria::inRandomOrder()->first()?->id ?? Categoria::factory(),
        ];
    }
}