@extends('layouts.back')

@section('title', 'Listado de Usuarios')

@section('content')
    <x-back.header title="Gestión de Usuarios" subtitle="Administración de cuentas y permisos del sistema">
        <x-back.button :href="route('usuarios.create')" variant="success" icon="➕">
            Nuevo Usuario
        </x-back.button>
    </x-back.header>

    <x-back.table>
        <x-slot name="header">
            <th class="px-4 py-3 text-left text-xs font-bold text-slate-500 uppercase tracking-wider">ID</th>
            <th class="px-4 py-3 text-left text-xs font-bold text-slate-500 uppercase tracking-wider">Nombre</th>
            <th class="px-4 py-3 text-left text-xs font-bold text-slate-500 uppercase tracking-wider">Email</th>
            <th class="px-4 py-3 text-left text-xs font-bold text-slate-500 uppercase tracking-wider">Rol</th>
            <th class="px-4 py-3 text-right text-xs font-bold text-slate-500 uppercase tracking-wider">Acciones</th>
        </x-slot>

        @foreach($usuarios as $usuario)
            <tr class="hover:bg-slate-50 transition-colors">
                <td class="px-4 py-4 text-sm text-slate-600">#{{ $usuario->id }}</td>
                <td class="px-4 py-4 text-sm">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded-full bg-slate-100 flex items-center justify-center text-slate-500 font-bold">
                            {{ strtoupper(substr($usuario->name, 0, 1)) }}
                        </div>
                        <span class="font-bold text-slate-800">{{ $usuario->name }}</span>
                    </div>
                </td>
                <td class="px-4 py-4 text-sm text-slate-600">{{ $usuario->email }}</td>
                <td class="px-4 py-4 text-sm">
                    @php
                        $roleClasses = match($usuario->role) {
                            'admin' => 'bg-purple-100 text-purple-700',
                            'profesor' => 'bg-blue-100 text-blue-700',
                            default => 'bg-slate-100 text-slate-600'
                        };
                    @endphp
                    <span class="px-2.5 py-1 rounded-full text-xs font-bold {{ $roleClasses }}">
                        {{ ucfirst($usuario->role) }}
                    </span>
                </td>
                <td class="px-4 py-4 text-sm text-right">
                    <div class="flex justify-end gap-2">
                        <x-back.action-button :href="route('usuarios.edit', $usuario)" type="edit" />
                        <x-back.action-button :action="route('usuarios.destroy', $usuario)" type="delete" method="DELETE" />
                    </div>
                </td>
            </tr>
        @endforeach
    </x-back.table>
@endsection


