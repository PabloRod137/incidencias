@extends('layouts.back')

@section('title', 'Editar Comentario')

@section('content')
    <x-back.header title="Editar Comentario #{{ $comentario->id }}" subtitle="Modifica el contenido del mensaje">
        <x-back.button :href="route('comentarios.index')" variant="secondary" icon="⬅️">
            Volver
        </x-back.button>
    </x-back.header>

    <form action="{{ route('comentarios.update', $comentario) }}" method="POST" class="max-w-2xl space-y-6">
        @csrf
        @method('PUT')

        <x-back.select label="Incidencia" name="incidencia_id">
            @foreach($incidencias as $incidencia)
                <option value="{{ $incidencia->id }}" {{ $comentario->incidencia_id == $incidencia->id ? 'selected' : '' }}>{{ $incidencia->titulo }}</option>
            @endforeach
        </x-back.select>

        <p class="text-xs text-slate-400">
            Autor <span class="font-semibold text-slate-600">{{ $comentario->user->name ?? 'N/A' }}</span>
        </p>

        <x-back.textarea label="Mensaje" name="mensaje" :value="$comentario->mensaje" required />

        <div class="pt-4 flex items-center gap-4">
            <x-back.button type="submit">
                Actualizar Comentario
            </x-back.button>
            <x-back.button :href="route('comentarios.index')" variant="ghost">
                Cancelar
            </x-back.button>
        </div>
    </form>
@endsection

