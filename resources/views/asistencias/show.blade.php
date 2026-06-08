@extends('layouts.app')

@section('title', 'Ver Asistencia')

@section('content')
<div class="space-y-6">
    <div class="flex items-center justify-between">
        <h1 class="text-3xl font-bold text-gray-900">Detalle de Asistencia</h1>
        <a href="{{ route('actividades.show', $asistencia->actividad) }}" class="text-blue-600 hover:text-blue-900">Volver</a>
    </div>

    <div class="bg-white rounded-lg shadow-md p-6">
        <div class="space-y-4">
            <div>
                <label class="block text-sm font-medium text-gray-500">Actividad</label>
                <a href="{{ route('actividades.show', $asistencia->actividad) }}" class="text-lg font-semibold text-blue-600 hover:text-blue-900">
                    {{ $asistencia->actividad->titulo }}
                </a>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-500">Usuario</label>
                <a href="{{ route('users.show', $asistencia->user) }}" class="text-lg font-semibold text-gray-900 hover:text-blue-600">
                    {{ $asistencia->user->name }}
                </a>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-500">Fecha de la actividad</label>
                <p class="text-gray-900">{{ $asistencia->actividad->fecha->format('d/m/Y') }}</p>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-500">Asistió</label>
                <span class="px-3 py-1 text-xs font-medium rounded-full {{ $asistencia->asistio ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                    {{ $asistencia->asistio ? 'Sí' : 'No' }}
                </span>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-500">Registrado el</label>
                <p class="text-gray-900">{{ $asistencia->created_at->format('d/m/Y H:i') }}</p>
            </div>
        </div>
    </div>
</div>
@endsection
