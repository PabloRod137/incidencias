@props(['label', 'value', 'route', 'icon', 'color' => 'blue'])

@php
    $colors = [
        'blue' => 'from-alpe-blue to-alpe-blue-dark hover:shadow-blue-200',
        'green' => 'from-green-500 to-green-600 hover:shadow-green-200',
        'orange' => 'from-alpe-orange to-alpe-orange-light hover:shadow-orange-100',
        'purple' => 'from-purple-500 to-purple-600 hover:shadow-purple-200',
    ];
    $colorClass = $colors[$color] ?? $colors['blue'];
@endphp

<div {{ $attributes->merge(['class' => "group bg-gradient-to-br $colorClass p-6 rounded-2xl shadow-lg transition-all duration-300 transform hover:-translate-y-1 relative overflow-hidden"]) }}>
    <div class="absolute -right-4 -top-4 text-white/10 text-8xl font-bold group-hover:scale-110 transition-transform">{{ $icon }}</div>
    <h3 class="text-white/80 font-semibold uppercase tracking-wider text-xs">{{ $label }}</h3>
    <p class="text-white text-4xl font-black my-4">{{ $value }}</p>
    <a href="{{ $route }}" class="inline-flex items-center text-sm text-white font-medium hover:underline gap-1">
        Ver todos <span>→</span>
    </a>
</div>
