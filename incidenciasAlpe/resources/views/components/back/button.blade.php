@props(['href' => null, 'variant' => 'primary', 'icon' => null, 'type' => 'button'])

@php
    $baseClasses = "inline-flex items-center px-4 py-2 font-bold rounded-lg shadow-sm transition-colors";
    $variants = [
        'primary' => 'bg-alpe-blue hover:bg-alpe-blue-dark text-white',
        'secondary' => 'bg-slate-100 hover:bg-slate-200 text-slate-700 border border-slate-300',
        'success' => 'bg-green-600 hover:bg-green-700 text-white',
        'danger' => 'bg-red-600 hover:bg-red-700 text-white',
        'warning' => 'bg-alpe-orange hover:bg-alpe-orange-light text-white',
        'ghost' => 'bg-transparent hover:bg-slate-100 text-slate-600',
    ];
    $classes = $baseClasses . ' ' . ($variants[$variant] ?? $variants['primary']);
@endphp

@if($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
        @if($icon)
            <span class="mr-2">{{ $icon }}</span>
        @endif
        {{ $slot }}
    </a>
@else
    <button type="{{ $type }}" {{ $attributes->merge(['class' => $classes]) }}>
        @if($icon)
            <span class="mr-2">{{ $icon }}</span>
        @endif
        {{ $slot }}
    </button>
@endif
