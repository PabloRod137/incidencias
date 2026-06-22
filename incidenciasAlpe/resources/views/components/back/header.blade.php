@props(['title', 'subtitle' => null])

<div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
    <div>
        <h1 class="text-2xl font-bold text-alpe-blue">{{ $title }}</h1>
        @if($subtitle)
            <p class="text-slate-500 mt-1 italic">{{ $subtitle }}</p>
        @endif
    </div>
    <div class="flex flex-wrap items-center gap-3">
        {{ $slot }}
    </div>
</div>
