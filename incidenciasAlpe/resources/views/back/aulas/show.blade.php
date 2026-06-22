@extends('layouts.back')

@section('title', 'Detalles del Aula')

@section('content')
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
        <div>
            <h1 class="text-2xl font-bold text-slate-800">Aula: {{ $aula->nombre }}</h1>
            <p class="text-slate-500 mt-1">Gestión y visualización de incidencias del aula</p>
        </div>
        <a href="{{ route('aulas.index') }}" class="inline-flex items-center px-4 py-2 bg-slate-100 hover:bg-slate-200 text-slate-700 font-semibold rounded-lg transition-colors border border-slate-300">
            <span class="mr-2">⬅️</span> Volver al listado
        </a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
        <div class="bg-blue-50 border border-blue-100 p-5 rounded-xl shadow-sm">
            <p class="text-blue-600 text-xs font-bold uppercase tracking-wider mb-2">Ubicación</p>
            <p class="text-slate-800 font-semibold text-lg">{{ $aula->ubicacion }}</p>
        </div>
        <div class="bg-purple-50 border border-purple-100 p-5 rounded-xl shadow-sm">
            <p class="text-purple-600 text-xs font-bold uppercase tracking-wider mb-2">Horario</p>
            <p class="text-slate-800 font-semibold text-lg">{{ $aula->horario ?? 'No asignado' }}</p>
        </div>
        <div class="bg-amber-50 border border-amber-100 p-5 rounded-xl shadow-sm">
            <p class="text-amber-600 text-xs font-bold uppercase tracking-wider mb-2">Total Incidencias</p>
            <p class="text-slate-800 font-semibold text-lg">{{ $aula->incidencias->count() }}</p>
        </div>
    </div>

    <div class="mb-6 border-b border-slate-200 pb-2">
        <h2 class="text-xl font-bold text-slate-800 flex items-center gap-2">
            <span>🎫</span> Incidencias en esta Aula
        </h2>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full border-collapse">
            <thead>
                <tr class="bg-slate-50 border-b border-slate-200">
                    <th class="px-4 py-3 text-left text-xs font-bold text-slate-500 uppercase tracking-wider">ID</th>
                    <th class="px-4 py-3 text-left text-xs font-bold text-slate-500 uppercase tracking-wider">Título</th>
                    <th class="px-4 py-3 text-left text-xs font-bold text-slate-500 uppercase tracking-wider">Categoría</th>
                    <th class="px-4 py-3 text-left text-xs font-bold text-slate-500 uppercase tracking-wider">Estado</th>
                    <th class="px-4 py-3 text-left text-xs font-bold text-slate-500 uppercase tracking-wider">Fecha</th>
                    <th class="px-4 py-3 text-right text-xs font-bold text-slate-500 uppercase tracking-wider">Acciones</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse($aula->incidencias as $incidencia)
                <tr class="hover:bg-slate-50 transition-colors">
                    <td class="px-4 py-4 text-sm text-slate-600">#{{ $incidencia->id }}</td>
                    <td class="px-4 py-4 text-sm font-bold text-slate-800">{{ $incidencia->titulo }}</td>
                    <td class="px-4 py-4 text-sm text-slate-600">
                        <span class="px-2 py-1 bg-slate-100 rounded text-xs">{{ $incidencia->categoria->nombre ?? 'N/A' }}</span>
                    </td>
                    <td class="px-4 py-4 text-sm">
                        @php
                            $statusClasses = match($incidencia->estado) {
                                'abierta' => 'bg-green-100 text-green-700',
                                'proceso' => 'bg-blue-100 text-blue-700',
                                'cerrada' => 'bg-slate-100 text-slate-600',
                                default => 'bg-gray-100 text-gray-700'
                            };
                        @endphp
                        <span class="px-2.5 py-1 rounded-full text-xs font-bold {{ $statusClasses }}">
                            {{ ucfirst($incidencia->estado) }}
                        </span>
                    </td>
                    <td class="px-4 py-4 text-sm text-slate-500">{{ $incidencia->created_at->format('d/m/Y') }}</td>
                    <td class="px-4 py-4 text-sm text-right">
                        <a href="{{ route('incidencias.show', $incidencia) }}" class="inline-flex items-center px-3 py-1.5 bg-blue-600 hover:bg-blue-700 text-white text-xs font-bold rounded shadow-sm transition-colors">
                            Ver Detalle
                        </a>
                    </td>
                </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-4 py-10 text-center text-slate-400 italic">
                            No hay incidencias registradas para esta aula.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection

