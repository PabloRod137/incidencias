<?php

use App\Models\Aula;
use App\Models\Categoria;
use App\Models\User;

test('un admin puede crear un aula', function () {
    $admin = User::factory()->state(['role' => 'admin'])->create();

    $this->actingAs($admin)
        ->post(route('aulas.store'), [
            'nombre' => 'Aula 999',
            'ubicacion' => 'Planta 3',
        ])
        ->assertRedirect(route('aulas.index'));

    expect(Aula::where('nombre', 'Aula 999')->exists())->toBeTrue();
});

test('un admin puede crear una categoria', function () {
    $admin = User::factory()->state(['role' => 'admin'])->create();
    $responsable = User::factory()->state(['role' => 'mantenimiento'])->create();

    $this->actingAs($admin)
        ->post(route('categorias.store'), [
            'nombre' => 'Jardinería',
            'responsable_id' => $responsable->id,
        ])
        ->assertRedirect(route('categorias.index'));

    expect(Categoria::where('nombre', 'Jardinería')->exists())->toBeTrue();
});

test('el detalle de un aula muestra sus incidencias', function () {
    $admin = User::factory()->state(['role' => 'admin'])->create();
    $aula = Aula::factory()->create();

    $this->actingAs($admin)
        ->get(route('aulas.show', $aula))
        ->assertOk();
});

test('el detalle de una categoria muestra sus incidencias', function () {
    $admin = User::factory()->state(['role' => 'admin'])->create();
    $categoria = Categoria::factory()->create();

    $this->actingAs($admin)
        ->get(route('categorias.show', $categoria))
        ->assertOk();
});
