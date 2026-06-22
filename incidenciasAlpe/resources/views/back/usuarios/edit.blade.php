@extends('layouts.back')

@section('title', 'Editar Usuario')

@section('content')
    <x-back.header title="Editar Usuario: {{ $usuario->name }}" subtitle="Actualiza los permisos o datos de la cuenta">
        <x-back.button :href="route('usuarios.index')" variant="secondary" icon="⬅️">
            Volver
        </x-back.button>
    </x-back.header>

    <form action="{{ route('usuarios.update', $usuario) }}" method="POST" class="max-w-2xl space-y-6">
        @csrf
        @method('PUT')

        <x-back.input label="Nombre" name="name" :value="$usuario->name" required />

        <x-back.input label="Email" name="email" type="email" :value="$usuario->email" required />

        <div class="space-y-2">
            <x-back.input label="Contraseña" name="password" type="password" placeholder="Dejar en blanco para no cambiar" />
            <p class="text-[10px] text-slate-400 italic">Dejar en blanco para no cambiar</p>
        </div>

        <x-back.select label="Rol" name="role">
            <option value="profesor" {{ $usuario->role == 'profesor' ? 'selected' : '' }}>Profesor</option>
            <option value="admin" {{ $usuario->role == 'admin' ? 'selected' : '' }}>Administrador</option>
            <option value="mantenimiento" {{ $usuario->role == 'mantenimiento' ? 'selected' : '' }}>Mantenimiento</option>
        </x-back.select>

        <div class="pt-4 flex items-center gap-4">
            <x-back.button type="submit">
                Actualizar Usuario
            </x-back.button>
            <x-back.button :href="route('usuarios.index')" variant="ghost">
                Cancelar
            </x-back.button>
        </div>
    </form>
@endsection

