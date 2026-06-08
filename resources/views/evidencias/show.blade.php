@extends('layouts.app')

@section('title', 'Ver Evidencia')

@section('content')
<div class="space-y-6">
    <div class="flex items-center justify-between">
        <h1 class="text-3xl font-bold text-gray-900">Detalle de Evidencia</h1>
        <div class="space-x-3">
            <a href="{{ route('evidencias.download', $evidencia) }}" class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition">
                Descargar
            </a>
            <a href="{{ route('actividades.show', $evidencia->actividad) }}" class="text-blue-600 hover:text-blue-900">Volver</a>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow-md p-6">
        <div class="space-y-4">
            <div>
                <label class="block text-sm font-medium text-gray-500">Actividad</label>
                <a href="{{ route('actividades.show', $evidencia->actividad) }}" class="text-lg font-semibold text-blue-600 hover:text-blue-900">
                    {{ $evidencia->actividad->titulo }}
                </a>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-500">Tipo</label>
                <span class="px-3 py-1 text-xs font-medium rounded-full {{ $evidencia->tipo === 'imagen' ? 'bg-purple-100 text-purple-800' : 'bg-red-100 text-red-800' }}">
                    {{ ucfirst($evidencia->tipo) }}
                </span>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-500">Descripción</label>
                <p class="text-gray-900">{{ $evidencia->descripcion ?? 'Sin descripción' }}</p>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-500">Subido por</label>
                <p class="text-gray-900">{{ $evidencia->subidor->name ?? 'N/A' }}</p>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-500">Fecha de subida</label>
                <p class="text-gray-900">{{ $evidencia->created_at->format('d/m/Y H:i') }}</p>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow-md p-6">
        <h2 class="text-xl font-bold text-gray-900 mb-4">Vista Previa</h2>
        @if($evidencia->tipo === 'imagen')
            <img src="{{ Storage::url($evidencia->archivo) }}" alt="Evidencia" class="max-w-full h-auto rounded-lg" onerror="this.src='https://via.placeholder.com/400?text=No+Image'; console.error('Error loading image:', this.src);">
        @else
            <div class="flex items-center justify-center p-8 bg-gray-50 rounded-lg">
                <div class="text-center">
                    <svg class="w-16 h-16 mx-auto text-red-500 mb-4" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z" clip-rule="evenodd"></path>
                    </svg>
                    <p class="text-gray-600">Este es un archivo PDF. Descárgalo para ver su contenido.</p>
                </div>
            </div>
        @endif
    </div>
</div>
@endsection
