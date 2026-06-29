@extends('layouts.app')

@section('title', 'Ver Actividad')

@section('content')
<div class="space-y-6 animate-fade-in">
    <!-- Header -->
    <div class="bg-gradient-to-r from-[#C8A26E] to-[#A97142] rounded-2xl shadow-lg p-5 md:p-8">
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-3 md:gap-4">
                <div class="bg-white/20 p-2.5 md:p-3 rounded-xl backdrop-blur-sm shrink-0">
                    <svg class="w-6 h-6 md:w-8 md:h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                </div>
                <div>
                    <h1 class="text-xl md:text-3xl font-bold text-white leading-tight">Detalle de la Actividad</h1>
                </div>
            </div>
            <div class="flex gap-3">
                <a href="{{ route('actividades.edit', ['actividad' => $actividad->id]) }}" class="bg-white/20 hover:bg-white/30 text-white px-4 py-2 rounded-xl backdrop-blur-sm transition">
                    Editar
                </a>
                <a href="{{ route('actividades.index') }}" class="bg-white/20 hover:bg-white/30 text-white px-4 py-2 rounded-xl backdrop-blur-sm transition">Volver</a>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-2xl shadow-md p-6 border border-[#E9D8B6]">
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
                <span class="px-3 py-1 text-xs font-medium rounded-full {{ $actividad->estado === 'pendiente' ? 'bg-[#E9D8B6] text-[#A97142]' : ($actividad->estado === 'en_proceso' ? 'bg-[#C8A26E] text-white' : 'bg-[#E9D8B6] text-[#A97142]') }}">
                    {{ ucfirst(str_replace('_', ' ', $actividad->estado)) }}
                </span>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-500">Creado por</label>
                <p class="text-gray-900">{{ $actividad->creador->name ?? 'N/A' }}</p>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-2xl shadow-md p-6 border border-[#E9D8B6]">
        <h2 class="text-xl font-bold text-gray-900 mb-4">Responsables</h2>
        @if($actividad->responsables->count() > 0)
            <div class="space-y-3">
                @foreach($actividad->responsables as $responsable)
                    <a href="{{ route('users.show', $responsable) }}" class="block p-4 bg-[#FAF8F5] rounded-xl hover:bg-[#E9D8B6] transition border border-[#E9D8B6]">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 bg-gradient-to-br from-[#C8A26E] to-[#A97142] rounded-full flex items-center justify-center text-white font-bold text-xs">
                                    {{ strtoupper(substr($responsable->name, 0, 1)) }}
                                </div>
                                <div>
                                    <h3 class="font-semibold text-gray-900">{{ $responsable->name }}</h3>
                                    <p class="text-sm text-gray-600">{{ $responsable->email }}</p>
                                </div>
                            </div>
                            <span class="px-3 py-1 text-xs font-medium rounded-full {{ $responsable->estado ? 'bg-[#E9D8B6] text-[#A97142]' : 'bg-red-100 text-red-800' }}">
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
        <div class="bg-white rounded-2xl shadow-md p-6 border border-[#E9D8B6]">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-xl font-bold text-gray-900">Evidencias</h2>
                <a href="{{ route('evidencias.create', $actividad->id) }}" class="text-[#C8A26E] hover:text-[#A97142] text-sm">
                    + Subir evidencia
                </a>
            </div>
            @if($actividad->evidencias->count() > 0)
                <div class="space-y-3">
                    @foreach($actividad->evidencias as $evidencia)
                        <div class="p-4 bg-[#FAF8F5] rounded-xl border border-[#E9D8B6]">
                            <div class="flex items-center justify-between">
                                <div>
                                    <h3 class="font-semibold text-gray-900">{{ $evidencia->tipo === 'imagen' ? 'Imagen' : 'PDF' }}</h3>
                                    <p class="text-sm text-gray-600">{{ $evidencia->descripcion ?? 'Sin descripción' }}</p>
                                </div>
                                <div class="space-x-2">
                                    <a href="{{ route('evidencias.download', $evidencia) }}" class="text-[#C8A26E] hover:text-[#A97142] text-sm">Descargar</a>
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

        <div class="bg-white rounded-2xl shadow-md p-6 border border-[#E9D8B6]">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-xl font-bold text-gray-900">Asistencia</h2>
                <a href="{{ route('asistencias.edit', $actividad->id) }}" class="text-[#C8A26E] hover:text-[#A97142] text-sm">
                    Gestionar asistencia
                </a>
            </div>
            @if($actividad->asistencias->count() > 0)
                <div class="space-y-3">
                    @foreach($actividad->asistencias as $asistencia)
                        <div class="p-4 bg-[#FAF8F5] rounded-xl border border-[#E9D8B6]">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-3">
                                    <div class="w-8 h-8 bg-gradient-to-br from-[#C8A26E] to-[#A97142] rounded-full flex items-center justify-center text-white font-bold text-xs">
                                        {{ strtoupper(substr($asistencia->user->name, 0, 1)) }}
                                    </div>
                                    <div>
                                        <h3 class="font-semibold text-gray-900">{{ $asistencia->user->name }}</h3>
                                        <p class="text-sm text-gray-600">{{ $asistencia->user->email }}</p>
                                    </div>
                                </div>
                                <span class="px-3 py-1 text-xs font-medium rounded-full {{ $asistencia->asistio ? 'bg-[#E9D8B6] text-[#A97142]' : 'bg-red-100 text-red-800' }}">
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

    <div class="bg-white rounded-2xl shadow-md p-6 border border-[#E9D8B6]">
        <h2 class="text-xl font-bold text-gray-900 mb-4">Cambiar Estado</h2>
        <form action="{{ route('actividades.update-estado', $actividad) }}" method="POST">
            @csrf
            @method('PATCH')
            <div class="flex items-center space-x-4">
                <select name="estado" required class="rounded-xl border-[#E9D8B6] shadow-sm focus:border-[#C8A26E] focus:ring-[#C8A26E]">
                    <option value="pendiente" {{ $actividad->estado === 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                    <option value="en_proceso" {{ $actividad->estado === 'en_proceso' ? 'selected' : '' }}>En Proceso</option>
                    <option value="finalizado" {{ $actividad->estado === 'finalizado' ? 'selected' : '' }}>Finalizado</option>
                </select>
                <button type="submit" class="px-4 py-2 bg-gradient-to-r from-[#C8A26E] to-[#A97142] text-white rounded-xl hover:from-[#A97142] hover:to-[#C8A26E] transition">
                    Actualizar Estado
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
