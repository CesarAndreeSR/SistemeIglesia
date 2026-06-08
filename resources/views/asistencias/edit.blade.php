@extends('layouts.app')

@section('title', 'Editar Asistencia')

@section('content')
<div class="space-y-8 animate-fade-in">
    <!-- Header con gradiente -->
    <div class="bg-gradient-to-r from-lime-600 to-lime-700 rounded-2xl shadow-lg p-8">
        <div class="flex items-center justify-between">
            <div class="flex items-center space-x-4">
                <div class="bg-white/20 p-3 rounded-xl backdrop-blur-sm">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                    </svg>
                </div>
                <div>
                    <h1 class="text-3xl font-bold text-white">Gestionar Asistencia</h1>
                    <p class="text-lime-100 mt-1">Modifica los usuarios que asistieron a la actividad</p>
                </div>
            </div>
            <a href="{{ route('actividades.show', $actividad) }}" class="bg-white/20 hover:bg-white/30 text-white px-6 py-3 rounded-xl backdrop-blur-sm transition-all duration-200 flex items-center space-x-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                <span>Volver</span>
            </a>
        </div>
    </div>

    <!-- Información de la actividad -->
    <div class="bg-gradient-to-r from-lime-50 to-green-50 rounded-xl border-2 border-lime-200 p-6">
        <div class="flex items-center space-x-6">
            <div class="flex items-center space-x-3">
                <svg class="w-6 h-6 text-lime-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
                <span class="text-sm font-semibold text-gray-700">Actividad:</span>
                <span class="text-sm font-bold text-gray-900">{{ $actividad->titulo }}</span>
            </div>
            <div class="flex items-center space-x-3">
                <svg class="w-6 h-6 text-lime-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <span class="text-sm font-semibold text-gray-700">Fecha:</span>
                <span class="text-sm font-bold text-gray-900">{{ $actividad->fecha->format('d/m/Y') }}</span>
            </div>
        </div>
    </div>

    <!-- Formulario -->
    <div class="bg-white rounded-2xl shadow-xl p-8">
        <form action="{{ route('asistencias.update', $actividad->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="space-y-6">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-4 flex items-center">
                        <svg class="w-4 h-4 mr-2 text-lime-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                        Seleccionar usuarios que asistieron
                    </label>
                    <div class="space-y-3 max-h-96 overflow-y-auto border-2 border-gray-200 rounded-xl p-4 bg-gray-50">
                        @foreach($users as $user)
                            @php
                                $asistio = $actividad->asistencias->where('user_id', $user->id)->first()?->asistio ?? false;
                            @endphp
                            <div class="flex items-center p-3 bg-white rounded-lg hover:bg-lime-50 transition-colors cursor-pointer">
                                <input type="checkbox" name="asistencias[]" value="{{ $user->id }}" id="user_{{ $user->id }}"
                                    {{ $asistio ? 'checked' : '' }}
                                    class="h-5 w-5 text-lime-600 focus:ring-lime-500 border-gray-300 rounded">
                                <label for="user_{{ $user->id }}" class="ml-3 block text-sm font-medium text-gray-900 cursor-pointer flex items-center flex-1">
                                    <div class="w-10 h-10 bg-gradient-to-br from-lime-500 to-lime-600 rounded-full flex items-center justify-center text-white font-bold mr-3">
                                        {{ strtoupper(substr($user->name, 0, 1)) }}
                                    </div>
                                    <div>
                                        <div class="font-semibold">{{ $user->name }}</div>
                                        <div class="text-xs text-gray-500">{{ $user->cargo->nombre ?? 'Sin cargo' }}</div>
                                    </div>
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="flex justify-end space-x-4 pt-6 border-t border-gray-200">
                    <a href="{{ route('actividades.show', $actividad) }}" class="px-6 py-3 border-2 border-gray-300 rounded-xl text-gray-700 hover:bg-gray-50 transition-all duration-200 flex items-center space-x-2 font-medium">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                        <span>Cancelar</span>
                    </a>
                    <button type="submit" class="px-8 py-3 bg-gradient-to-r from-lime-600 to-lime-700 text-white rounded-xl hover:from-lime-700 hover:to-lime-800 transition-all duration-200 flex items-center space-x-2 font-medium shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <span>Actualizar Asistencia</span>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
