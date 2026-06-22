@extends('layouts.back')

@section('title', 'Editar Aula')

@section('content')
    <x-back.header title="Editar Aula: {{ $aula->nombre }}" subtitle="Actualiza los detalles del aula en el sistema">
        <x-back.button :href="route('aulas.index')" variant="secondary" icon="⬅️">
            Volver
        </x-back.button>
    </x-back.header>

    <form action="{{ route('aulas.update', $aula) }}" method="POST" class="max-w-2xl space-y-6">
        @csrf
        @method('PUT')

        <x-back.input label="Nombre del Aula" name="nombre" :value="$aula->nombre" required />

        <x-back.input label="Ubicación" name="ubicacion" :value="$aula->ubicacion" required />

        <x-back.input label="Horario" name="horario" :value="$aula->horario" />

        <div class="pt-4 flex items-center gap-4">
            <x-back.button type="submit">
                Actualizar Aula
            </x-back.button>
            <x-back.button :href="route('aulas.index')" variant="ghost">
                Cancelar
            </x-back.button>
        </div>
    </form>
@endsection

