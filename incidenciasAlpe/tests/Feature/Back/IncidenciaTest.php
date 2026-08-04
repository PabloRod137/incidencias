<?php

use App\Models\Aula;
use App\Models\Categoria;
use App\Models\Incidencia;
use App\Models\User;

test('cualquier rol autenticado puede ver el listado de incidencias', function () {
    $mantenimiento = User::factory()->state(['role' => 'mantenimiento'])->create();

    $this->actingAs($mantenimiento)
        ->get(route('incidencias.index'))
        ->assertOk();
});

test('una incidencia creada queda asignada al usuario autenticado aunque se envie otro user_id', function () {
    $profesor = User::factory()->state(['role' => 'profesor'])->create();
    $otro = User::factory()->state(['role' => 'admin'])->create();
    $aula = Aula::factory()->create();
    $categoria = Categoria::factory()->create();

    $this->actingAs($profesor)
        ->post(route('incidencias.store'), [
            'titulo' => 'Proyector roto',
            'descripcion' => 'El proyector del aula no enciende.',
            'estado' => 'abierta',
            'prioridad' => 'alta',
            'aula_id' => $aula->id,
            'categoria_id' => $categoria->id,
            'user_id' => $otro->id,
        ])
        ->assertRedirect(route('incidencias.index'));

    $incidencia = Incidencia::firstWhere('titulo', 'Proyector roto');

    expect($incidencia)->not->toBeNull();
    expect($incidencia->user_id)->toBe($profesor->id);
});

test('editar una incidencia no permite reasignar su autor', function () {
    $profesor = User::factory()->state(['role' => 'profesor'])->create();
    $otro = User::factory()->state(['role' => 'admin'])->create();
    $incidencia = Incidencia::factory()->create(['user_id' => $profesor->id]);

    $this->actingAs($profesor)
        ->put(route('incidencias.update', $incidencia), [
            'titulo' => $incidencia->titulo,
            'descripcion' => $incidencia->descripcion,
            'estado' => 'resuelta',
            'prioridad' => $incidencia->prioridad,
            'aula_id' => $incidencia->aula_id,
            'categoria_id' => $incidencia->categoria_id,
            'user_id' => $otro->id,
        ])
        ->assertRedirect(route('incidencias.index'));

    $incidencia->refresh();

    expect($incidencia->user_id)->toBe($profesor->id);
    expect($incidencia->estado)->toBe('resuelta');
});
