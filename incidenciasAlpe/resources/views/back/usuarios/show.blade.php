@extends('layouts.back')

@section('title', 'Detalles del Usuario')

@section('content')
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
        <div>
            <h1 class="text-2xl font-bold text-slate-800">{{ $usuario->name }}</h1>
            <p class="text-slate-500 mt-1">{{ $usuario->email }}</p>
        </div>
        <a href="{{ route('usuarios.index') }}" class="inline-flex items-center px-4 py-2 bg-slate-100 hover:bg-slate-200 text-slate-700 font-semibold rounded-lg transition-colors border border-slate-300">
            <span class="mr-2">⬅️</span> Volver al listado
        </a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-10">
        <div class="bg-blue-50 border border-blue-100 p-5 rounded-xl shadow-sm">
            <p class="text-blue-600 text-xs font-bold uppercase tracking-wider mb-2">Rol</p>
            <p class="text-slate-800 font-semibold text-lg">{{ ucfirst($usuario->role) }}</p>
        </div>
        <div class="bg-amber-50 border border-amber-100 p-5 rounded-xl shadow-sm">
            <p class="text-amber-600 text-xs font-bold uppercase tracking-wider mb-2">Incidencias Reportadas</p>
            <p class="text-slate-800 font-semibold text-lg">{{ $usuario->incidencias->count() }}</p>
        </div>
    </div>

    <div class="mb-6 border-b border-slate-200 pb-2">
        <h2 class="text-xl font-bold text-slate-800 flex items-center gap-2">
            <span>🎫</span> Incidencias Reportadas
        </h2>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full border-collapse">
            <thead>
                <tr class="bg-slate-50 border-b border-slate-200">
                    <th class="px-4 py-3 text-left text-xs font-bold text-slate-500 uppercase tracking-wider">ID</th>
                    <th class="px-4 py-3 text-left text-xs font-bold text-slate-500 uppercase tracking-wider">Título</th>
                    <th class="px-4 py-3 text-left text-xs font-bold text-slate-500 uppercase tracking-wider">Aula</th>
                    <th class="px-4 py-3 text-left text-xs font-bold text-slate-500 uppercase tracking-wider">Categoría</th>
                    <th class="px-4 py-3 text-left text-xs font-bold text-slate-500 uppercase tracking-wider">Estado</th>
                    <th class="px-4 py-3 text-right text-xs font-bold text-slate-500 uppercase tracking-wider">Acciones</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse($usuario->incidencias as $incidencia)
                <tr class="hover:bg-slate-50 transition-colors">
                    <td class="px-4 py-4 text-sm text-slate-600">#{{ $incidencia->id }}</td>
                    <td class="px-4 py-4 text-sm font-bold text-slate-800">{{ $incidencia->titulo }}</td>
                    <td class="px-4 py-4 text-sm text-slate-600">{{ $incidencia->aula->nombre ?? 'N/A' }}</td>
                    <td class="px-4 py-4 text-sm text-slate-600">
                        <span class="px-2 py-1 bg-slate-100 rounded text-xs">{{ $incidencia->categoria->nombre ?? 'N/A' }}</span>
                    </td>
                    <td class="px-4 py-4 text-sm">
                        <x-back.badge :type="$incidencia->estado">{{ $incidencia->estado }}</x-back.badge>
                    </td>
                    <td class="px-4 py-4 text-sm text-right">
                        <a href="{{ route('incidencias.show', $incidencia) }}" class="inline-flex items-center px-3 py-1.5 bg-blue-600 hover:bg-blue-700 text-white text-xs font-bold rounded shadow-sm transition-colors">
                            Ver Detalle
                        </a>
                    </td>
                </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-4 py-10 text-center text-slate-400 italic">
                            Este usuario no ha reportado ninguna incidencia.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
