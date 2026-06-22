@extends('layouts.back')

@section('title', 'Listado de Categorías')

@section('content')
    <x-back.header title="Gestión de Categorías" subtitle="Organiza y administra las categorías de incidencias">
        <x-back.button :href="route('categorias.create')" variant="success" icon="➕">
            Nueva Categoría
        </x-back.button>
    </x-back.header>

    <x-back.table>
        <x-slot name="header">
            <th class="px-4 py-3 text-left text-xs font-bold text-slate-500 uppercase tracking-wider">ID</th>
            <th class="px-4 py-3 text-left text-xs font-bold text-slate-500 uppercase tracking-wider">Nombre</th>
            <th class="px-4 py-3 text-left text-xs font-bold text-slate-500 uppercase tracking-wider">Responsable</th>
            <th class="px-4 py-3 text-right text-xs font-bold text-slate-500 uppercase tracking-wider">Acciones</th>
        </x-slot>

        @foreach($categorias as $categoria)
            <tr class="hover:bg-slate-50 transition-colors">
                <td class="px-4 py-4 text-sm text-slate-600">#{{ $categoria->id }}</td>
                <td class="px-4 py-4 text-sm font-bold text-slate-800">{{ $categoria->nombre }}</td>
                <td class="px-4 py-4 text-sm text-slate-600">
                    <div class="flex items-center gap-2">
                        <span class="w-6 h-6 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center text-[10px] font-bold">
                            {{ strtoupper(substr($categoria->responsable->name ?? '?', 0, 1)) }}
                        </span>
                        {{ $categoria->responsable->name ?? 'Sin responsable' }}
                    </div>
                </td>
                <td class="px-4 py-4 text-sm text-right">
                    <div class="flex justify-end gap-2">
                        <x-back.action-button :href="route('categorias.edit', $categoria)" type="edit" />
                        <x-back.action-button :action="route('categorias.destroy', $categoria)" type="delete" method="DELETE" />
                    </div>
                </td>
            </tr>
        @endforeach
    </x-back.table>
@endsection


