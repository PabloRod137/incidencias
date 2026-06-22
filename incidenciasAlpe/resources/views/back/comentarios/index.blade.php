@extends('layouts.back')

@section('title', 'Listado de Comentarios')

@section('content')
    <x-back.header title="Gestión de Comentarios" subtitle="Historial y administración de la comunicación en incidencias">
        <x-back.button :href="route('comentarios.create')" variant="success" icon="➕">
            Nuevo Comentario
        </x-back.button>
    </x-back.header>

    <x-back.table>
        <x-slot name="header">
            <th class="px-4 py-3 text-left text-xs font-bold text-slate-500 uppercase tracking-wider">ID</th>
            <th class="px-4 py-3 text-left text-xs font-bold text-slate-500 uppercase tracking-wider">Incidencia</th>
            <th class="px-4 py-3 text-left text-xs font-bold text-slate-500 uppercase tracking-wider">Autor</th>
            <th class="px-4 py-3 text-left text-xs font-bold text-slate-500 uppercase tracking-wider">Mensaje</th>
            <th class="px-4 py-3 text-right text-xs font-bold text-slate-500 uppercase tracking-wider">Acciones</th>
        </x-slot>

        @foreach($comentarios as $comentario)
            <tr class="hover:bg-slate-50 transition-colors">
                <td class="px-4 py-4 text-sm text-slate-600">#{{ $comentario->id }}</td>
                <td class="px-4 py-4 text-sm font-bold text-slate-800">
                    <span class="truncate max-w-[200px] block">
                        {{ $comentario->incidencia->titulo ?? 'N/A' }}
                    </span>
                </td>
                <td class="px-4 py-4 text-sm text-slate-600">
                    <div class="flex items-center gap-2">
                        <span class="w-6 h-6 rounded-full bg-slate-100 text-slate-500 flex items-center justify-center text-[10px] font-bold">
                            {{ strtoupper(substr($comentario->user->name ?? '?', 0, 1)) }}
                        </span>
                        {{ $comentario->user->name ?? 'N/A' }}
                    </div>
                </td>
                <td class="px-4 py-4 text-sm text-slate-600 italic">
                    "{{ Str::limit($comentario->mensaje, 50) }}"
                </td>
                <td class="px-4 py-4 text-sm text-right">
                    <div class="flex justify-end gap-2">
                        <x-back.action-button :href="route('comentarios.edit', $comentario)" type="edit" />
                        <x-back.action-button :action="route('comentarios.destroy', $comentario)" type="delete" method="DELETE" />
                    </div>
                </td>
            </tr>
        @endforeach
    </x-back.table>
@endsection


