@extends('layouts.back')

@section('title', 'Editar Incidencia')

@section('content')
    <x-back.header title="Editar Incidencia #{{ $incidencia->id }}" subtitle="Modifica los detalles o el estado de la incidencia">
        <x-back.button :href="route('incidencias.index')" variant="secondary" icon="⬅️">
            Volver
        </x-back.button>
    </x-back.header>

    <form action="{{ route('incidencias.update', $incidencia) }}" method="POST" class="max-w-4xl space-y-6">
        @csrf
        @method('PUT')

        <x-back.input label="Título" name="titulo" :value="$incidencia->titulo" required />

        <x-back.textarea label="Descripción Detallada" name="descripcion" :value="$incidencia->descripcion" required />

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <x-back.select label="Estado" name="estado">
                <option value="abierta" {{ $incidencia->estado == 'abierta' ? 'selected' : '' }}>Abierta</option>
                <option value="en_proceso" {{ $incidencia->estado == 'en_proceso' ? 'selected' : '' }}>En Proceso</option>
                <option value="resuelta" {{ $incidencia->estado == 'resuelta' ? 'selected' : '' }}>Resuelta</option>
            </x-back.select>

            <x-back.select label="Prioridad" name="prioridad">
                <option value="baja" {{ $incidencia->prioridad == 'baja' ? 'selected' : '' }}>Baja</option>
                <option value="media" {{ $incidencia->prioridad == 'media' ? 'selected' : '' }}>Media</option>
                <option value="alta" {{ $incidencia->prioridad == 'alta' ? 'selected' : '' }}>Alta</option>
                <option value="critica" {{ $incidencia->prioridad == 'critica' ? 'selected' : '' }}>Crítica</option>
            </x-back.select>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <x-back.select label="Usuario (Creador)" name="user_id">
                @foreach($usuarios as $user)
                    <option value="{{ $user->id }}" {{ $incidencia->user_id == $user->id ? 'selected' : '' }}>{{ $user->name }} ({{ $user->role }})</option>
                @endforeach
            </x-back.select>

            <x-back.select label="Aula" name="aula_id">
                @foreach($aulas as $aula)
                    <option value="{{ $aula->id }}" {{ $incidencia->aula_id == $aula->id ? 'selected' : '' }}>{{ $aula->nombre }} - {{ $aula->ubicacion }}</option>
                @endforeach
            </x-back.select>

            <x-back.select label="Categoría" name="categoria_id">
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id }}" {{ $incidencia->categoria_id == $categoria->id ? 'selected' : '' }}>{{ $categoria->nombre }}</option>
                @endforeach
            </x-back.select>
        </div>

        <div class="pt-4 flex items-center gap-4">
            <x-back.button type="submit">
                Actualizar Incidencia
            </x-back.button>
            <x-back.button :href="route('incidencias.index')" variant="ghost">
                Cancelar
            </x-back.button>
        </div>
    </form>
@endsection

