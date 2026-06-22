@extends('layouts.back')

@section('title', 'Listado de Incidencias')

@section('content')
    <x-back.header title="Gestión de Incidencias" subtitle="Supervisión y seguimiento de problemas reportados">
        <x-back.button :href="route('incidencias.create')" variant="success" icon="➕">
            Nueva Incidencia
        </x-back.button>
    </x-back.header>

    <x-back.table>
        <x-slot name="header">
            <th class="px-4 py-3 text-left text-xs font-bold text-slate-500 uppercase tracking-wider">ID</th>
            <th class="px-4 py-3 text-left text-xs font-bold text-slate-500 uppercase tracking-wider">Título</th>
            <th class="px-4 py-3 text-left text-xs font-bold text-slate-500 uppercase tracking-wider">Aula</th>
            <th class="px-4 py-3 text-left text-xs font-bold text-slate-500 uppercase tracking-wider">Categoría</th>
            <th class="px-4 py-3 text-left text-xs font-bold text-slate-500 uppercase tracking-wider">Creado por</th>
            <th class="px-4 py-3 text-left text-xs font-bold text-slate-500 uppercase tracking-wider">Prioridad</th>
            <th class="px-4 py-3 text-left text-xs font-bold text-slate-500 uppercase tracking-wider">Estado</th>
            <th class="px-4 py-3 text-right text-xs font-bold text-slate-500 uppercase tracking-wider">Acciones</th>
        </x-slot>

        @forelse($incidencias as $incidencia)
            <tr class="hover:bg-slate-50 transition-colors">
                <td class="px-4 py-4 text-sm text-slate-600">#{{ $incidencia->id }}</td>
                <td class="px-4 py-4 text-sm">
                    <a href="{{ route('incidencias.show', $incidencia) }}" class="font-bold text-slate-800 hover:text-blue-600 transition-colors">
                        {{ $incidencia->titulo }}
                    </a>
                </td>
                <td class="px-4 py-4 text-sm text-slate-600">
                    <span class="flex items-center gap-1">
                        <span class="text-xs">🏫</span> {{ $incidencia->aula->nombre ?? 'N/A' }}
                    </span>
                </td>
                <td class="px-4 py-4 text-sm text-slate-600">
                    <span class="px-2 py-1 bg-slate-100 rounded text-xs">{{ $incidencia->categoria->nombre ?? 'N/A' }}</span>
                </td>
                <td class="px-4 py-4 text-sm text-slate-600">
                    {{ $incidencia->creator->name ?? 'N/A' }}
                </td>
                <td class="px-4 py-4 text-sm">
                    <x-back.badge :type="$incidencia->prioridad">
                        {{ $incidencia->prioridad }}
                    </x-back.badge>
                </td>
                <td class="px-4 py-4 text-sm">
                    @php
                        $estadoClasses = match($incidencia->estado) {
                            'abierta' => 'text-green-600',
                            'proceso', 'en_proceso' => 'text-blue-600',
                            'cerrada', 'resuelta' => 'text-slate-400',
                            default => 'text-gray-600'
                        };
                    @endphp
                    <span class="flex items-center gap-1.5 font-semibold {{ $estadoClasses }}">
                        <span class="w-2 h-2 rounded-full bg-current"></span>
                        {{ ucfirst($incidencia->estado) }}
                    </span>
                </td>
                <td class="px-4 py-4 text-sm text-right">
                    <div class="flex justify-end gap-2">
                        <x-back.action-button :href="route('incidencias.show', $incidencia)" type="show" />
                        <x-back.action-button :href="route('incidencias.edit', $incidencia)" type="edit" />
                        <x-back.action-button :action="route('incidencias.destroy', $incidencia)" type="delete" method="DELETE" />
                    </div>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="8" class="px-4 py-10 text-center text-slate-400 italic">
                    No hay incidencias registradas todavía.
                </td>
            </tr>
        @endforelse
    </x-back.table>
@endsection


