@extends('layouts.back')

@section('title', 'Crear Usuario')

@section('content')
    <x-back.header title="Nuevo Usuario" subtitle="Crea una nueva cuenta de acceso al sistema">
        <x-back.button :href="route('usuarios.index')" variant="secondary" icon="⬅️">
            Volver
        </x-back.button>
    </x-back.header>

    <form action="{{ route('usuarios.store') }}" method="POST" class="max-w-2xl space-y-6">
        @csrf

        <x-back.input label="Nombre" name="name" required />

        <x-back.input label="Email" name="email" type="email" required />

        <x-back.input label="Contraseña" name="password" type="password" required />

        <x-back.select label="Rol" name="role">
            <option value="profesor">Profesor</option>
            <option value="admin">Administrador</option>
            <option value="mantenimiento">Mantenimiento</option>
        </x-back.select>

        <div class="pt-4 flex items-center gap-4">
            <x-back.button type="submit">
                Guardar Usuario
            </x-back.button>
            <x-back.button :href="route('usuarios.index')" variant="ghost">
                Cancelar
            </x-back.button>
        </div>
    </form>
@endsection

