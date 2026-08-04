<?php

use App\Models\Comentario;
use App\Models\Incidencia;
use App\Models\User;

test('un comentario se crea con el usuario autenticado como autor aunque se envie otro user_id', function () {
    $profesor = User::factory()->state(['role' => 'profesor'])->create();
    $otro = User::factory()->state(['role' => 'admin'])->create();
    $incidencia = Incidencia::factory()->create();

    $this->actingAs($profesor)
        ->post(route('comentarios.store'), [
            'incidencia_id' => $incidencia->id,
            'mensaje' => 'Ya he revisado el aula.',
            'user_id' => $otro->id,
        ])
        ->assertRedirect(route('comentarios.index'));

    $comentario = Comentario::firstWhere('mensaje', 'Ya he revisado el aula.');

    expect($comentario)->not->toBeNull();
    expect($comentario->user_id)->toBe($profesor->id);
});

test('un usuario no puede editar el comentario de otro', function () {
    $autor = User::factory()->state(['role' => 'profesor'])->create();
    $otro = User::factory()->state(['role' => 'profesor'])->create();
    $comentario = Comentario::factory()->create(['user_id' => $autor->id, 'mensaje' => 'original']);

    $this->actingAs($otro)
        ->put(route('comentarios.update', $comentario), [
            'incidencia_id' => $comentario->incidencia_id,
            'mensaje' => 'editado',
        ])
        ->assertForbidden();

    expect($comentario->fresh()->mensaje)->toBe('original');
});

test('un usuario no puede borrar el comentario de otro', function () {
    $autor = User::factory()->state(['role' => 'profesor'])->create();
    $otro = User::factory()->state(['role' => 'mantenimiento'])->create();
    $comentario = Comentario::factory()->create(['user_id' => $autor->id]);

    $this->actingAs($otro)
        ->delete(route('comentarios.destroy', $comentario))
        ->assertForbidden();

    expect(Comentario::find($comentario->id))->not->toBeNull();
});

test('un admin puede editar el comentario de cualquier usuario', function () {
    $autor = User::factory()->state(['role' => 'profesor'])->create();
    $admin = User::factory()->state(['role' => 'admin'])->create();
    $comentario = Comentario::factory()->create(['user_id' => $autor->id, 'mensaje' => 'original']);

    $this->actingAs($admin)
        ->put(route('comentarios.update', $comentario), [
            'incidencia_id' => $comentario->incidencia_id,
            'mensaje' => 'editado por admin',
        ])
        ->assertRedirect(route('comentarios.index'));

    expect($comentario->fresh()->mensaje)->toBe('editado por admin');
});
