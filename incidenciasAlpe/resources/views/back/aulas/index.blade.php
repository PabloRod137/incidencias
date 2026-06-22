@extends('layouts.back')

@section('title', 'Listado de Aulas')

@section('content')
    <x-back.header title="Gestión de Aulas" subtitle="Inventario y estado de las aulas de la academia">
        <x-back.button :href="route('aulas.create')" variant="success" icon="➕">
            Nueva Aula
        </x-back.button>
    </x-back.header>

    <x-back.table>
        <x-slot name="header">
            <th class="px-4 py-3 text-left text-xs font-bold text-slate-500 uppercase tracking-wider">ID</th>
            <th class="px-4 py-3 text-left text-xs font-bold text-slate-500 uppercase tracking-wider">Nombre</th>
            <th class="px-4 py-3 text-left text-xs font-bold text-slate-500 uppercase tracking-wider">Ubicación</th>
            <th class="px-4 py-3 text-left text-xs font-bold text-slate-500 uppercase tracking-wider">Horario</th>
            <th class="px-4 py-3 text-center text-xs font-bold text-slate-500 uppercase tracking-wider">Incidencias</th>
            <th class="px-4 py-3 text-right text-xs font-bold text-slate-500 uppercase tracking-wider">Acciones</th>
        </x-slot>

        @foreach($aulas as $aula)
            <tr class="hover:bg-slate-50 transition-colors">
                <td class="px-4 py-4 text-sm text-slate-600">#{{ $aula->id }}</td>
                <td class="px-4 py-4 text-sm">
                    <a href="{{ route('aulas.show', $aula) }}" class="font-bold text-slate-800 hover:text-blue-600 transition-colors">
                        {{ $aula->nombre }}
                    </a>
                </td>
                <td class="px-4 py-4 text-sm text-slate-600">{{ $aula->ubicacion }}</td>
                <td class="px-4 py-4 text-sm text-slate-600">
                    @if($aula->horario)
                        <span class="flex items-center gap-1.5">
                            <span class="text-xs">🕒</span> {{ $aula->horario }}
                        </span>
                    @else
                        <span class="text-slate-400 italic text-xs">No asignado</span>
                    @endif
                </td>
                <td class="px-4 py-4 text-sm text-center">
                    <span class="inline-flex items-center justify-center min-w-[24px] h-6 px-1.5 bg-blue-100 text-blue-700 rounded-full text-xs font-bold">
                        {{ $aula->incidencias->count() }}
                    </span>
                </td>
                <td class="px-4 py-4 text-sm text-right">
                    <div class="flex justify-end gap-2">
                        <x-back.action-button :href="route('aulas.show', $aula)" type="show" />
                        <x-back.action-button :href="route('aulas.edit', $aula)" type="edit" />
                        <x-back.action-button :action="route('aulas.destroy', $aula)" type="delete" method="DELETE" />
                    </div>
                </td>
            </tr>
        @endforeach
    </x-back.table>
@endsection


