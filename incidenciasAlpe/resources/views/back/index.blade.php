@extends('layouts.back')

@section('title', 'Dashboard')

@section('content')
    <x-back.header title="Panel de Control" :subtitle="'Bienvenido, ' . Auth::user()->name . '. Aquí tienes un resumen del estado actual de la Academia Alpe.'" />

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <x-back.stat-card label="Incidencias" :value="\App\Models\Incidencia::count()" :route="route('incidencias.index')" icon="🎫" color="blue" />
        <x-back.stat-card label="Usuarios" :value="\App\Models\User::count()" :route="route('usuarios.index')" icon="👥" color="green" />
        <x-back.stat-card label="Aulas" :value="\App\Models\Aula::count()" :route="route('aulas.index')" icon="🏫" color="orange" />
        <x-back.stat-card label="Categorías" :value="\App\Models\Categoria::count()" :route="route('categorias.index')" icon="📁" color="purple" />
    </div>

    <!-- Quick Stats or Recent Activity Section -->
    <div class="mt-12 grid grid-cols-1 lg:grid-cols-2 gap-8">
        <x-back.card title="Incidencias Recientes" icon="🔥">
            <div class="space-y-4">
                @forelse(\App\Models\Incidencia::latest()->take(5)->get() as $inc)
                    <div class="flex items-center justify-between p-3 hover:bg-slate-50 rounded-xl transition-colors border border-transparent hover:border-slate-100">
                        <div class="flex flex-col">
                            <span class="font-bold text-slate-700 text-sm">{{ $inc->titulo }}</span>
                            <span class="text-xs text-slate-400">{{ $inc->created_at->diffForHumans() }}</span>
                        </div>
                        <x-back.badge :type="$inc->estado">{{ $inc->estado }}</x-back.badge>
                    </div>
                @empty
                    <p class="text-slate-400 text-sm italic">No hay actividad reciente.</p>
                @endforelse
            </div>
        </x-back.card>

        <x-back.card title="Últimos Comentarios" icon="💬">
            <div class="space-y-4">
                @forelse(\App\Models\Comentario::latest()->take(5)->get() as $com)
                    <div class="flex gap-3 p-3 hover:bg-slate-50 rounded-xl transition-colors border border-transparent hover:border-slate-100">
                        <div class="w-10 h-10 rounded-full bg-alpe-blue/10 flex-shrink-0 flex items-center justify-center text-alpe-blue font-bold border border-alpe-blue/20">
                            {{ strtoupper(substr($com->user->name ?? '?', 0, 1)) }}
                        </div>
                        <div class="flex flex-col min-w-0">
                            <div class="flex items-center gap-2">
                                <span class="font-bold text-slate-700 text-sm">{{ $com->user->name ?? 'N/A' }}</span>
                                <span class="text-[10px] text-slate-400 uppercase tracking-tighter">{{ $com->created_at->diffForHumans() }}</span>
                            </div>
                            <p class="text-xs text-slate-500 truncate italic">"{{ $com->mensaje }}"</p>
                        </div>
                    </div>
                @empty
                    <p class="text-slate-400 text-sm italic">Sin comentarios aún.</p>
                @endforelse
            </div>
        </x-back.card>
    </div>
@endsection


