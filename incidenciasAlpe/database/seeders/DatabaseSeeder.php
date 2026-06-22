<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Crear usuarios de distintos roles
        User::factory(2)->state(['role' => 'admin'])->create();
        User::factory(5)->state(['role' => 'profesor'])->create();
        User::factory(3)->state(['role' => 'mantenimiento'])->create();

        // Crear un usuario de prueba específico
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'role' => 'admin'
        ]);

        // 2. Crear aulas
        \App\Models\Aula::factory(10)->create();

        // 3. Crear categorias
        \App\Models\Categoria::factory(5)->create();

        // 4. Crear incidencias
        \App\Models\Incidencia::factory(15)->create();

        // 5. Crear comentarios
        \App\Models\Comentario::factory(30)->create();
    }
}
