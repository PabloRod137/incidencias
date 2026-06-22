@props(['title' => null, 'icon' => null, 'variant' => 'white'])

@php
    $bg = match($variant) {
        'white' => 'bg-white border-slate-200',
        'slate' => 'bg-slate-50 border-slate-200',
        'orange' => 'bg-orange-50 border-alpe-orange/20',
        default => 'bg-white border-slate-200',
    };
@endphp

<div {{ $attributes->merge(['class' => "border p-6 rounded-2xl shadow-sm $bg"]) }}>
    @if($title)
        <h3 class="text-sm font-black text-alpe-blue/60 uppercase tracking-widest mb-4 flex items-center gap-2 border-b border-slate-100 pb-2">
            @if($icon) <span>{{ $icon }}</span> @endif
            {{ $title }}
        </h3>
    @endif
    <div>
        {{ $slot }}
    </div>
</div>
