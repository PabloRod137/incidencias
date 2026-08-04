<?php

use App\Models\User;

test('un usuario no autenticado es redirigido al login al entrar al panel', function () {
    $this->get(route('back.index'))->assertRedirect(route('login'));
});

test('un profesor no puede acceder al listado de usuarios', function () {
    $profesor = User::factory()->state(['role' => 'profesor'])->create();

    $this->actingAs($profesor)
        ->get(route('usuarios.index'))
        ->assertForbidden();
});

test('un profesor no puede acceder a la gestion de aulas ni categorias', function () {
    $profesor = User::factory()->state(['role' => 'profesor'])->create();

    $this->actingAs($profesor)->get(route('aulas.index'))->assertForbidden();
    $this->actingAs($profesor)->get(route('categorias.index'))->assertForbidden();
});

test('un profesor no puede auto-promocionarse a admin', function () {
    $profesor = User::factory()->state(['role' => 'profesor'])->create();

    $this->actingAs($profesor)
        ->put(route('usuarios.update', $profesor), [
            'name' => $profesor->name,
            'email' => $profesor->email,
            'role' => 'admin',
        ])
        ->assertForbidden();

    expect($profesor->fresh()->role)->toBe('profesor');
});

test('un admin puede acceder a usuarios, aulas y categorias', function () {
    $admin = User::factory()->state(['role' => 'admin'])->create();

    $this->actingAs($admin)->get(route('usuarios.index'))->assertOk();
    $this->actingAs($admin)->get(route('aulas.index'))->assertOk();
    $this->actingAs($admin)->get(route('categorias.index'))->assertOk();
});
