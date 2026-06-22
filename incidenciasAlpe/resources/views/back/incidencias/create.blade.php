@extends('layouts.back')

@section('title', 'Crear Incidencia')

@section('content')
    <x-back.header title="Nueva Incidencia" subtitle="Registra un nuevo problema o solicitud">
        <x-back.button :href="route('incidencias.index')" variant="secondary" icon="⬅️">
            Volver
        </x-back.button>
    </x-back.header>

    <form action="{{ route('incidencias.store') }}" method="POST" class="max-w-4xl space-y-6">
        @csrf

        <x-back.input label="Título" name="titulo" required placeholder="Breve resumen del problema" />

        <x-back.textarea label="Descripción Detallada" name="descripcion" required placeholder="Explica el problema con detalle..." />

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <x-back.select label="Estado Inicial" name="estado">
                <option value="abierta">Abierta</option>
                <option value="en_proceso">En Proceso</option>
                <option value="resuelta">Resuelta</option>
            </x-back.select>

            <x-back.select label="Prioridad" name="prioridad">
                <option value="baja">Baja</option>
                <option value="media" selected>Media</option>
                <option value="alta">Alta</option>
                <option value="critica">Crítica</option>
            </x-back.select>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <x-back.select label="Usuario (Creador)" name="user_id">
                @foreach($usuarios as $user)
                    <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->role }})</option>
                @endforeach
            </x-back.select>

            <x-back.select label="Aula" name="aula_id">
                @foreach($aulas as $aula)
                    <option value="{{ $aula->id }}">{{ $aula->nombre }} - {{ $aula->ubicacion }}</option>
                @endforeach
            </x-back.select>

            <x-back.select label="Categoría" name="categoria_id">
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                @endforeach
            </x-back.select>
        </div>

        <div class="pt-4 flex items-center gap-4">
            <x-back.button type="submit">
                Guardar Incidencia
            </x-back.button>
            <x-back.button :href="route('incidencias.index')" variant="ghost">
                Cancelar
            </x-back.button>
        </div>
    </form>
@endsection

