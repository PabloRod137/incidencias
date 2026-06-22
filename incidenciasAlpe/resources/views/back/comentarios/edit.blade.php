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

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <x-back.select label="Incidencia" name="incidencia_id">
                @foreach($incidencias as $incidencia)
                    <option value="{{ $incidencia->id }}" {{ $comentario->incidencia_id == $incidencia->id ? 'selected' : '' }}>{{ $incidencia->titulo }}</option>
                @endforeach
            </x-back.select>

            <x-back.select label="Autor" name="user_id">
                @foreach($usuarios as $user)
                    <option value="{{ $user->id }}" {{ $comentario->user_id == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                @endforeach
            </x-back.select>
        </div>

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

