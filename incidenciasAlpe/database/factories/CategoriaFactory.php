<?php


namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoriaFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nombre' => fake()->randomElement(['Software', 'Hardware', 'Mobiliario', 'Limpieza', 'Electricidad']),
            // Buscamos un usuario que sea admin o mantenimiento para ser responsable o creamos uno
            'responsable_id' => User::whereIn('role', ['admin', 'mantenimiento'])->inRandomOrder()->first()?->id ?? User::factory()->state(['role' => 'admin']),
        ];
    }
}
