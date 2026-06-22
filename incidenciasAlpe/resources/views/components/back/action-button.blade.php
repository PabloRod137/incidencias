@props(['href' => null, 'type' => 'show', 'action' => null, 'method' => 'POST'])

@php
    $variants = [
        'show' => ['icon' => '👁️', 'bg' => 'bg-alpe-blue/5 text-alpe-blue hover:bg-alpe-blue hover:text-white', 'title' => 'Ver'],
        'edit' => ['icon' => '✏️', 'bg' => 'bg-alpe-orange/5 text-alpe-orange hover:bg-alpe-orange hover:text-white', 'title' => 'Editar'],
        'delete' => ['icon' => '🗑️', 'bg' => 'bg-red-50 text-red-600 hover:bg-red-600 hover:text-white', 'title' => 'Borrar'],
    ];
    $config = $variants[$type] ?? $variants['show'];
@endphp

@if($type === 'delete')
    <form action="{{ $action }}" method="POST" class="inline">
        @csrf
        @method($method)
        <button type="submit" class="p-1.5 {{ $config['bg'] }} rounded transition-colors" title="{{ $config['title'] }}" onclick="return confirm('¿Estás seguro?')">
            {{ $config['icon'] }}
        </button>
    </form>
@else
    <a href="{{ $href }}" class="p-1.5 {{ $config['bg'] }} rounded transition-colors" title="{{ $config['title'] }}">
        {{ $config['icon'] }}
    </a>
@endif
