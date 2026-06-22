@extends('layouts.back')

@section('title', 'Detalles de la Incidencia')

@section('content')
    <x-back.header title="Incidencia #{{ $incidencia->id }}" :subtitle="$incidencia->titulo">
        <x-back.button :href="route('incidencias.edit', $incidencia)" variant="warning" icon="✏️">
            Editar
        </x-back.button>
        <x-back.button :href="route('incidencias.index')" variant="secondary" icon="⬅️">
            Volver
        </x-back.button>
    </x-back.header>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Main Details Column -->
        <div class="lg:col-span-2 space-y-8">
            <x-back.card title="Descripción del Problema" variant="slate">
                <div class="whitespace-pre-line">
                    {{ $incidencia->descripcion }}
                </div>
            </x-back.card>

            @if($incidencia->acciones_a_realizar)
                <x-back.card title="Acciones a Realizar" variant="orange" icon="🛠️">
                    <div class="text-alpe-orange font-bold">
                        {{ $incidencia->acciones_a_realizar }}
                    </div>
                </x-back.card>
            @endif

            <div>
                <div class="flex items-center justify-between mb-6 border-b border-slate-100 pb-4">
                    <h2 class="text-xl font-bold text-slate-800 flex items-center gap-2">
                        <span>💬</span> Comentarios 
                        <span class="text-sm bg-slate-100 text-slate-500 px-2 py-0.5 rounded-full">{{ $incidencia->comentarios->count() }}</span>
                    </h2>
                </div>
                
                <div class="space-y-6">
                    @forelse($incidencia->comentarios->sortByDesc('created_at') as $comentario)
                        <div class="flex gap-4 p-5 bg-white border border-slate-100 rounded-2xl shadow-sm hover:shadow-md transition-shadow">
                            <div class="w-10 h-10 rounded-full bg-blue-50 flex-shrink-0 flex items-center justify-center text-blue-600 font-black">
                                {{ strtoupper(substr($comentario->user->name ?? '?', 0, 1)) }}
                            </div>
                            <div class="flex-1 min-w-0">
                                <div class="flex items-center gap-2 mb-1">
                                    <span class="font-bold text-slate-800 text-sm">{{ $comentario->user->name ?? 'Anónimo' }}</span>
                                    <span class="text-[10px] text-slate-400 font-bold uppercase tracking-tighter">{{ $comentario->created_at->diffForHumans() }}</span>
                                </div>
                                <p class="text-slate-600 text-sm leading-relaxed">{{ $comentario->mensaje }}</p>
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-12 bg-slate-50 rounded-2xl border-2 border-dashed border-slate-200">
                            <p class="text-slate-400 italic">No hay comentarios para esta incidencia aún.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>

        <!-- Sidebar Info Column -->
        <div class="space-y-6">
            <x-back.card title="Estado y Prioridad">
                <div class="space-y-6">
                    <div>
                        <p class="text-[10px] font-black text-slate-400 uppercase mb-2">Estado Actual</p>
                        <x-back.badge :type="$incidencia->estado" class="px-3 py-1.5 rounded-xl">
                            <span class="w-2 h-2 rounded-full bg-current mr-2"></span>
                            {{ $incidencia->estado }}
                        </x-back.badge>
                    </div>

                    <div>
                        <p class="text-[10px] font-black text-slate-400 uppercase mb-2">Prioridad</p>
                        <x-back.badge :type="$incidencia->prioridad" class="px-3 py-1.5 rounded-xl">
                            {{ $incidencia->prioridad }}
                        </x-back.badge>
                    </div>
                </div>
            </x-back.card>

            <x-back.card title="Asignación">
                <div class="space-y-4">
                    <div class="flex items-start gap-3">
                        <span class="text-lg">🏫</span>
                        <div>
                            <p class="text-[10px] font-black text-slate-400 uppercase">Aula</p>
                            <p class="font-bold text-slate-800 text-sm">{{ $incidencia->aula->nombre ?? 'N/A' }}</p>
                            <p class="text-xs text-slate-500">{{ $incidencia->aula->ubicacion ?? '' }}</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-3">
                        <span class="text-lg">📁</span>
                        <div>
                            <p class="text-[10px] font-black text-slate-400 uppercase">Categoría</p>
                            <p class="font-bold text-slate-800 text-sm">{{ $incidencia->categoria->nombre ?? 'N/A' }}</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-3 pt-2 border-t border-slate-50">
                        <span class="text-lg">👤</span>
                        <div>
                            <p class="text-[10px] font-black text-slate-400 uppercase">Reportado por</p>
                            <p class="font-bold text-slate-800 text-sm">{{ $incidencia->creator->name ?? 'N/A' }}</p>
                            <p class="text-xs text-slate-500 italic">{{ $incidencia->creator->email ?? '' }}</p>
                        </div>
                    </div>
                </div>
            </x-back.card>
        </div>
    </div>
@endsection


