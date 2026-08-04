<?php

use App\Models\User;

test('un admin no puede eliminar su propia cuenta', function () {
    $admin = User::factory()->state(['role' => 'admin'])->create();

    $this->actingAs($admin)
        ->delete(route('usuarios.destroy', $admin))
        ->assertRedirect(route('usuarios.index'));

    expect(User::find($admin->id))->not->toBeNull();
});

test('un admin puede eliminar a otro usuario', function () {
    $admin = User::factory()->state(['role' => 'admin'])->create();
    $profesor = User::factory()->state(['role' => 'profesor'])->create();

    $this->actingAs($admin)
        ->delete(route('usuarios.destroy', $profesor))
        ->assertRedirect(route('usuarios.index'));

    expect(User::find($profesor->id))->toBeNull();
});

test('el detalle de un usuario muestra sus incidencias', function () {
    $admin = User::factory()->state(['role' => 'admin'])->create();
    $profesor = User::factory()->state(['role' => 'profesor'])->create();

    $this->actingAs($admin)
        ->get(route('usuarios.show', $profesor))
        ->assertOk();
});

test('un admin puede crear un nuevo usuario', function () {
    $admin = User::factory()->state(['role' => 'admin'])->create();

    $this->actingAs($admin)
        ->post(route('usuarios.store'), [
            'name' => 'Nuevo Usuario',
            'email' => 'nuevo@example.com',
            'password' => 'password123',
            'role' => 'profesor',
        ])
        ->assertRedirect(route('usuarios.index'));

    expect(User::where('email', 'nuevo@example.com')->exists())->toBeTrue();
});
