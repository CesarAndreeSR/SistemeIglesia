@extends('layouts.app')

@section('title', 'Ver Cargo')

@section('content')
<div class="space-y-6">
    <div class="flex items-center justify-between">
        <h1 class="text-3xl font-bold text-gray-900">Detalle del Cargo</h1>
        <div class="space-x-3">
            <a href="{{ route('cargos.edit', $cargo) }}" class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition">
                Editar
            </a>
            <a href="{{ route('cargos.index') }}" class="text-blue-600 hover:text-blue-900">Volver</a>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow-md p-6">
        <div class="space-y-4">
            <div>
                <label class="block text-sm font-medium text-gray-500">Nombre</label>
                <p class="text-lg font-semibold text-gray-900">{{ $cargo->nombre }}</p>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-500">Descripción</label>
                <p class="text-gray-900">{{ $cargo->descripcion ?? 'Sin descripción' }}</p>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow-md p-6">
        <h2 class="text-xl font-bold text-gray-900 mb-4">Usuarios con este cargo</h2>
        @if($cargo->users->count() > 0)
            <div class="space-y-3">
                @foreach($cargo->users as $user)
                    <a href="{{ route('users.show', $user) }}" class="block p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition">
                        <div class="flex items-center justify-between">
                            <div>
                                <h3 class="font-semibold text-gray-900">{{ $user->name }}</h3>
                                <p class="text-sm text-gray-600">{{ $user->email }}</p>
                            </div>
                            <span class="px-3 py-1 text-xs font-medium rounded-full {{ $user->estado ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                {{ $user->estado ? 'Activo' : 'Inactivo' }}
                            </span>
                        </div>
                    </a>
                @endforeach
            </div>
        @else
            <p class="text-gray-500 text-center py-8">No hay usuarios con este cargo.</p>
        @endif
    </div>
</div>
@endsection
