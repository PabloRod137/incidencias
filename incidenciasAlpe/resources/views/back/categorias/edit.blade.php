@extends('layouts.back')

@section('title', 'Editar Categoría')

@section('content')
    <x-back.header title="Editar Categoría: {{ $categoria->nombre }}" subtitle="Modifica el nombre o el responsable del área">
        <x-back.button :href="route('categorias.index')" variant="secondary" icon="⬅️">
            Volver
        </x-back.button>
    </x-back.header>

    <form action="{{ route('categorias.update', $categoria) }}" method="POST" class="max-w-2xl space-y-6">
        @csrf
        @method('PUT')

        <x-back.input label="Nombre de la Categoría" name="nombre" :value="$categoria->nombre" required />

        <x-back.select label="Usuario Responsable" name="responsable_id">
            <option value="">-- Sin Responsable --</option>
            @foreach($usuarios as $user)
                <option value="{{ $user->id }}" {{ $categoria->responsable_id == $user->id ? 'selected' : '' }}>{{ $user->name }} ({{ $user->role }})</option>
            @endforeach
        </x-back.select>

        <div class="pt-4 flex items-center gap-4">
            <x-back.button type="submit">
                Actualizar Categoría
            </x-back.button>
            <x-back.button :href="route('categorias.index')" variant="ghost">
                Cancelar
            </x-back.button>
        </div>
    </form>
@endsection

