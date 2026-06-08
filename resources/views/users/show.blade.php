@extends('layouts.app')

@section('title', 'Ver Usuario')

@section('content')
<div class="space-y-6">
    <div class="flex items-center justify-between">
        <h1 class="text-3xl font-bold text-gray-900">Detalle del Usuario</h1>
        <div class="space-x-3">
            <a href="{{ route('users.edit', $user) }}" class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition">
                Editar
            </a>
            <a href="{{ route('users.index') }}" class="text-blue-600 hover:text-blue-900">Volver</a>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow-md p-6">
        <div class="space-y-4">
            <div>
                <label class="block text-sm font-medium text-gray-500">Nombre Completo</label>
                <p class="text-lg font-semibold text-gray-900">{{ $user->name }}</p>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-500">Nombre de Usuario</label>
                <p class="text-lg font-semibold text-blue-600">{{ $user->username ?? '-' }}</p>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-500">Email</label>
                <p class="text-gray-900">{{ $user->email ?? 'No registrado' }}</p>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-500">Teléfono</label>
                <p class="text-gray-900">{{ $user->telefono ?? 'No registrado' }}</p>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-500">Cargo</label>
                <p class="text-gray-900">{{ $user->cargo->nombre ?? 'Sin cargo asignado' }}</p>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-500">Estado</label>
                <span class="px-3 py-1 text-xs font-medium rounded-full {{ $user->estado ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                    {{ $user->estado ? 'Activo' : 'Inactivo' }}
                </span>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <div class="bg-white rounded-lg shadow-md p-6">
            <h2 class="text-xl font-bold text-gray-900 mb-4">Actividades Asignadas</h2>
            @if($user->actividadesAsignadas->count() > 0)
                <div class="space-y-3">
                    @foreach($user->actividadesAsignadas as $actividad)
                        <a href="{{ route('actividades.show', $actividad) }}" class="block p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition">
                            <h3 class="font-semibold text-gray-900">{{ $actividad->titulo }}</h3>
                            <p class="text-sm text-gray-600">{{ $actividad->fecha->format('d/m/Y') }} - {{ $actividad->hora }}</p>
                        </a>
                    @endforeach
                </div>
            @else
                <p class="text-gray-500 text-center py-8">No hay actividades asignadas.</p>
            @endif
        </div>

        <div class="bg-white rounded-lg shadow-md p-6">
            <h2 class="text-xl font-bold text-gray-900 mb-4">Historial de Asistencia</h2>
            @if($user->asistencias->count() > 0)
                <div class="space-y-3">
                    @foreach($user->asistencias as $asistencia)
                        <a href="{{ route('actividades.show', $asistencia->actividad) }}" class="block p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition">
                            <div class="flex items-center justify-between">
                                <div>
                                    <h3 class="font-semibold text-gray-900">{{ $asistencia->actividad->titulo }}</h3>
                                    <p class="text-sm text-gray-600">{{ $asistencia->actividad->fecha->format('d/m/Y') }}</p>
                                </div>
                                <span class="px-3 py-1 text-xs font-medium rounded-full {{ $asistencia->asistio ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                    {{ $asistencia->asistio ? 'Asistió' : 'No asistió' }}
                                </span>
                            </div>
                        </a>
                    @endforeach
                </div>
            @else
                <p class="text-gray-500 text-center py-8">No hay registros de asistencia.</p>
            @endif
        </div>
    </div>
</div>
@endsection
