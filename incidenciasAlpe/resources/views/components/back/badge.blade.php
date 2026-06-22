@props(['type' => 'default'])

@php
    $classes = match($type) {
        'alta', 'critica' => 'bg-red-50 text-red-600 border border-red-100',
        'media' => 'bg-orange-50 text-alpe-orange border border-alpe-orange/10',
        'baja' => 'bg-blue-50 text-alpe-blue border border-alpe-blue/10',
        'abierta' => 'bg-green-50 text-green-600 border border-green-100',
        'proceso', 'en_proceso' => 'bg-alpe-blue/5 text-alpe-blue border border-alpe-blue/10',
        'cerrada', 'resuelta' => 'bg-slate-50 text-slate-400 border border-slate-100',
        default => 'bg-slate-50 text-slate-700 border border-slate-100'
    };
@endphp

<span {{ $attributes->merge(['class' => "px-2 py-1 rounded text-[10px] font-bold uppercase $classes"]) }}>
    {{ $slot }}
</span>
