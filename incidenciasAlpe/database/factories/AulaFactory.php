<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AulaFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nombre' => 'Aula ' . fake()->unique()->numberBetween(100, 500), // Ej: Aula 105
            'ubicacion' => fake()->randomElement(['Planta 1', 'Planta 2', 'Edificio B']),
        ];
    }
}
