@extends('layouts.back')

@section('title', 'Crear Categoría')

@section('content')
    <x-back.header title="Nueva Categoría" subtitle="Organiza las incidencias por áreas temáticas">
        <x-back.button :href="route('categorias.index')" variant="secondary" icon="⬅️">
            Volver
        </x-back.button>
    </x-back.header>

    <form action="{{ route('categorias.store') }}" method="POST" class="max-w-2xl space-y-6">
        @csrf

        <x-back.input label="Nombre de la Categoría" name="nombre" required placeholder="Ej: Informática" />

        <x-back.select label="Usuario Responsable" name="responsable_id">
            <option value="">-- Seleccionar Responsable --</option>
            @foreach($usuarios as $user)
                <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->role }})</option>
            @endforeach
        </x-back.select>

        <div class="pt-4 flex items-center gap-4">
            <x-back.button type="submit">
                Guardar Categoría
            </x-back.button>
            <x-back.button :href="route('categorias.index')" variant="ghost">
                Cancelar
            </x-back.button>
        </div>
    </form>
@endsection

