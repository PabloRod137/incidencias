@extends('layouts.back')

@section('title', 'Crear Aula')

@section('content')
    <x-back.header title="Nueva Aula" subtitle="Registra una nueva ubicación en el sistema">
        <x-back.button :href="route('aulas.index')" variant="secondary" icon="⬅️">
            Volver
        </x-back.button>
    </x-back.header>

    <form action="{{ route('aulas.store') }}" method="POST" class="max-w-2xl space-y-6">
        @csrf

        <x-back.input label="Nombre del Aula" name="nombre" required placeholder="Ej: Aula 101" />

        <x-back.input label="Ubicación" name="ubicacion" required placeholder="Ej: Planta 1" />

        <x-back.input label="Horario" name="horario" placeholder="Ej: Lunes a Viernes, 08:00 - 14:00" />

        <div class="pt-4 flex items-center gap-4">
            <x-back.button type="submit">
                Guardar Aula
            </x-back.button>
            <x-back.button :href="route('aulas.index')" variant="ghost">
                Cancelar
            </x-back.button>
        </div>
    </form>
@endsection

