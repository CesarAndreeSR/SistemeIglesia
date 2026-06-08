@extends('layouts.app')

@section('title', 'Ver Actividad')

@section('content')
<div class="space-y-6">
    <div class="flex items-center justify-between">
        <h1 class="text-3xl font-bold text-gray-900">Detalle de la Actividad</h1>
        <div class="space-x-3">
            <a href="{{ route('actividades.edit', ['actividad' => $actividad->id]) }}" class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition">
                Editar
            </a>
            <a href="{{ route('actividades.index') }}" class="text-blue-600 hover:text-blue-900">Volver</a>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow-md p-6">
        <div class="space-y-4">
            <div>
                <label class="block text-sm font-medium text-gray-500">Título</label>
                <p class="text-lg font-semibold text-gray-900">{{ $actividad->titulo }}</p>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-500">Descripción</label>
                <p class="text-gray-900">{{ $actividad->descripcion ?? 'Sin descripción' }}</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-500">Fecha</label>
                    <p class="text-gray-900">{{ $actividad->fecha->format('d/m/Y') }}</p>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-500">Hora</label>
                    <p class="text-gray-900">{{ $actividad->hora }}</p>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-500">Lugar</label>
                    <p class="text-gray-900">{{ $actividad->lugar ?? 'No especificado' }}</p>
                </div>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-500">Estado</label>
                <span class="px-3 py-1 text-xs font-medium rounded-full {{ $actividad->estado === 'pendiente' ? 'bg-yellow-100 text-yellow-800' : ($actividad->estado === 'en_proceso' ? 'bg-blue-100 text-blue-800' : 'bg-green-100 text-green-800') }}">
                    {{ ucfirst(str_replace('_', ' ', $actividad->estado)) }}
                </span>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-500">Creado por</label>
                <p class="text-gray-900">{{ $actividad->creador->name ?? 'N/A' }}</p>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow-md p-6">
        <h2 class="text-xl font-bold text-gray-900 mb-4">Responsables</h2>
        @if($actividad->responsables->count() > 0)
            <div class="space-y-3">
                @foreach($actividad->responsables as $responsable)
                    <a href="{{ route('users.show', $responsable) }}" class="block p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition">
                        <div class="flex items-center justify-between">
                            <div>
                                <h3 class="font-semibold text-gray-900">{{ $responsable->name }}</h3>
                                <p class="text-sm text-gray-600">{{ $responsable->email }}</p>
                            </div>
                            <span class="px-3 py-1 text-xs font-medium rounded-full {{ $responsable->estado ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                {{ $responsable->estado ? 'Activo' : 'Inactivo' }}
                            </span>
                        </div>
                    </a>
                @endforeach
            </div>
        @else
            <p class="text-gray-500 text-center py-8">No hay responsables asignados.</p>
        @endif
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <div class="bg-white rounded-lg shadow-md p-6">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-xl font-bold text-gray-900">Evidencias</h2>
                <a href="{{ route('evidencias.create', $actividad->id) }}" class="text-blue-600 hover:text-blue-900 text-sm">
                    + Subir evidencia
                </a>
            </div>
            @if($actividad->evidencias->count() > 0)
                <div class="space-y-3">
                    @foreach($actividad->evidencias as $evidencia)
                        <div class="p-4 bg-gray-50 rounded-lg">
                            <div class="flex items-center justify-between">
                                <div>
                                    <h3 class="font-semibold text-gray-900">{{ $evidencia->tipo === 'imagen' ? 'Imagen' : 'PDF' }}</h3>
                                    <p class="text-sm text-gray-600">{{ $evidencia->descripcion ?? 'Sin descripción' }}</p>
                                </div>
                                <div class="space-x-2">
                                    <a href="{{ route('evidencias.download', $evidencia) }}" class="text-blue-600 hover:text-blue-900 text-sm">Descargar</a>
                                    <form action="{{ route('evidencias.destroy', $evidencia) }}" method="POST" class="inline" onsubmit="return confirm('¿Eliminar evidencia?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900 text-sm">Eliminar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-gray-500 text-center py-8">No hay evidencias subidas.</p>
            @endif
        </div>

        <div class="bg-white rounded-lg shadow-md p-6">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-xl font-bold text-gray-900">Asistencia</h2>
                <a href="{{ route('asistencias.edit', $actividad->id) }}" class="text-blue-600 hover:text-blue-900 text-sm">
                    Gestionar asistencia
                </a>
            </div>
            @if($actividad->asistencias->count() > 0)
                <div class="space-y-3">
                    @foreach($actividad->asistencias as $asistencia)
                        <div class="p-4 bg-gray-50 rounded-lg">
                            <div class="flex items-center justify-between">
                                <div>
                                    <h3 class="font-semibold text-gray-900">{{ $asistencia->user->name }}</h3>
                                    <p class="text-sm text-gray-600">{{ $asistencia->user->email }}</p>
                                </div>
                                <span class="px-3 py-1 text-xs font-medium rounded-full {{ $asistencia->asistio ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                    {{ $asistencia->asistio ? 'Asistió' : 'No asistió' }}
                                </span>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-gray-500 text-center py-8">No hay registros de asistencia.</p>
            @endif
        </div>
    </div>

    <div class="bg-white rounded-lg shadow-md p-6">
        <h2 class="text-xl font-bold text-gray-900 mb-4">Cambiar Estado</h2>
        <form action="{{ route('actividades.update-estado', $actividad) }}" method="POST">
            @csrf
            @method('PATCH')
            <div class="flex items-center space-x-4">
                <select name="estado" required class="rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    <option value="pendiente" {{ $actividad->estado === 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                    <option value="en_proceso" {{ $actividad->estado === 'en_proceso' ? 'selected' : '' }}>En Proceso</option>
                    <option value="finalizado" {{ $actividad->estado === 'finalizado' ? 'selected' : '' }}>Finalizado</option>
                </select>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                    Actualizar Estado
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
