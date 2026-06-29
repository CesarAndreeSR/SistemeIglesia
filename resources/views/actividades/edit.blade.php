@extends('layouts.app')

@section('title', 'Editar Actividad')

@section('content')
<div class="space-y-8 animate-fade-in">
    <!-- Header con gradiente -->
    <div class="bg-gradient-to-r from-[#C8A26E] to-[#A97142] rounded-2xl shadow-lg p-8">
        <div class="flex items-center justify-between">
            <div class="flex items-center space-x-4">
                <div class="bg-white/20 p-3 rounded-xl backdrop-blur-sm">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                    </svg>
                </div>
                <div>
                    <h1 class="text-3xl font-bold text-white">Editar Actividad</h1>
                    <p class="text-[#E9D8B6] mt-1">Modifica la información de la actividad</p>
                </div>
            </div>
            <a href="{{ route('actividades.index') }}" class="bg-white/20 hover:bg-white/30 text-white px-6 py-3 rounded-xl backdrop-blur-sm transition-all duration-200 flex items-center space-x-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                <span>Volver</span>
            </a>
        </div>
    </div>

    <!-- Formulario -->
    <div class="bg-white rounded-2xl shadow-xl p-8 border border-[#E9D8B6]">
        <form action="{{ route('actividades.update', $actividad) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="space-y-6">
                <!-- Título -->
                <div>
                    <label for="titulo" class="block text-sm font-semibold text-gray-700 mb-2 flex items-center">
                        <svg class="w-4 h-4 mr-2 text-[#C8A26E]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                        </svg>
                        Título de la Actividad
                    </label>
                    <input type="text" name="titulo" id="titulo" value="{{ old('titulo', $actividad->titulo) }}" required placeholder="Ej: Reunión de jóvenes"
                        class="mt-1 block w-full px-4 py-3 rounded-xl border-2 border-[#E9D8B6] focus:border-[#C8A26E] focus:ring-4 focus:ring-[#E9D8B6] transition-all duration-200 text-gray-900 placeholder-gray-400">
                    @error('titulo')
                        <p class="mt-2 text-sm text-red-600 flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                            </svg>
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <!-- Descripción -->
                <div>
                    <label for="descripcion" class="block text-sm font-semibold text-gray-700 mb-2 flex items-center">
                        <svg class="w-4 h-4 mr-2 text-[#C8A26E]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                        Descripción
                    </label>
                    <textarea name="descripcion" id="descripcion" rows="4" placeholder="Describe los detalles de la actividad..."
                        class="mt-1 block w-full px-4 py-3 rounded-xl border-2 border-[#E9D8B6] focus:border-[#C8A26E] focus:ring-4 focus:ring-[#E9D8B6] transition-all duration-200 text-gray-900 placeholder-gray-400 resize-none">{{ old('descripcion', $actividad->descripcion) }}</textarea>
                    @error('descripcion')
                        <p class="mt-2 text-sm text-red-600 flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                            </svg>
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <!-- Fecha y Hora -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="fecha" class="block text-sm font-semibold text-gray-700 mb-2 flex items-center">
                            <svg class="w-4 h-4 mr-2 text-[#C8A26E]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            Fecha
                        </label>
                        <input type="date" name="fecha" id="fecha" value="{{ old('fecha', $actividad->fecha->format('Y-m-d')) }}" required
                            class="mt-1 block w-full px-4 py-3 rounded-xl border-2 border-[#E9D8B6] focus:border-[#C8A26E] focus:ring-4 focus:ring-[#E9D8B6] transition-all duration-200 text-gray-900">
                        @error('fecha')
                            <p class="mt-2 text-sm text-red-600 flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div>
                        <label for="hora" class="block text-sm font-semibold text-gray-700 mb-2 flex items-center">
                            <svg class="w-4 h-4 mr-2 text-[#C8A26E]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Hora
                        </label>
                        <input type="time" name="hora" id="hora" value="{{ old('hora', $actividad->hora) }}" required
                            class="mt-1 block w-full px-4 py-3 rounded-xl border-2 border-[#E9D8B6] focus:border-[#C8A26E] focus:ring-4 focus:ring-[#E9D8B6] transition-all duration-200 text-gray-900">
                        @error('hora')
                            <p class="mt-2 text-sm text-red-600 flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                </div>

                <!-- Lugar -->
                <div>
                    <label for="lugar" class="block text-sm font-semibold text-gray-700 mb-2 flex items-center">
                        <svg class="w-4 h-4 mr-2 text-[#C8A26E]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        Lugar
                    </label>
                    <input type="text" name="lugar" id="lugar" value="{{ old('lugar', $actividad->lugar) }}" placeholder="Ej: Sala principal"
                        class="mt-1 block w-full px-4 py-3 rounded-xl border-2 border-[#E9D8B6] focus:border-[#C8A26E] focus:ring-4 focus:ring-[#E9D8B6] transition-all duration-200 text-gray-900 placeholder-gray-400">
                    @error('lugar')
                        <p class="mt-2 text-sm text-red-600 flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                            </svg>
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <!-- Estado -->
                <div>
                    <label for="estado" class="block text-sm font-semibold text-gray-700 mb-2 flex items-center">
                        <svg class="w-4 h-4 mr-2 text-[#C8A26E]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        Estado
                    </label>
                    <select name="estado" id="estado" required
                        class="mt-1 block w-full px-4 py-3 rounded-xl border-2 border-[#E9D8B6] focus:border-[#C8A26E] focus:ring-4 focus:ring-[#E9D8B6] transition-all duration-200 text-gray-900 bg-white">
                        <option value="pendiente" {{ old('estado', $actividad->estado) === 'pendiente' ? 'selected' : '' }}>📋 Pendiente</option>
                        <option value="en_proceso" {{ old('estado', $actividad->estado) === 'en_proceso' ? 'selected' : '' }}>🔄 En Proceso</option>
                        <option value="finalizado" {{ old('estado', $actividad->estado) === 'finalizado' ? 'selected' : '' }}>✅ Finalizado</option>
                    </select>
                    @error('estado')
                        <p class="mt-2 text-sm text-red-600 flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                            </svg>
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <!-- Responsables -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-3 flex items-center">
                        <svg class="w-4 h-4 mr-2 text-[#C8A26E]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                        </svg>
                        Responsables
                    </label>
                    <div class="space-y-2 max-h-64 overflow-y-auto border-2 border-[#E9D8B6] rounded-xl p-4 bg-[#FAF8F5]">
                        @foreach($users as $user)
                            <div class="flex items-center p-3 bg-white rounded-lg hover:bg-[#E9D8B6] transition-colors cursor-pointer border border-[#E9D8B6]">
                                <input type="checkbox" name="responsables[]" value="{{ $user->id }}" id="user_{{ $user->id }}"
                                    {{ in_array($user->id, old('responsables', $actividad->responsables->pluck('id')->toArray())) ? 'checked' : '' }}
                                    class="h-5 w-5 text-[#C8A26E] focus:ring-[#C8A26E] border-gray-300 rounded">
                                <label for="user_{{ $user->id }}" class="ml-3 block text-sm font-medium text-gray-900 cursor-pointer flex items-center">
                                    <div class="w-8 h-8 bg-gradient-to-br from-[#C8A26E] to-[#A97142] rounded-full flex items-center justify-center text-white font-bold mr-3">
                                        {{ strtoupper(substr($user->name, 0, 1)) }}
                                    </div>
                                    {{ $user->name }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Botones -->
                <div class="flex justify-end space-x-4 pt-6 border-t border-[#E9D8B6]">
                    <a href="{{ route('actividades.index') }}" class="px-6 py-3 border-2 border-[#E9D8B6] rounded-xl text-gray-700 hover:bg-[#FAF8F5] transition-all duration-200 flex items-center space-x-2 font-medium">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                        <span>Cancelar</span>
                    </a>
                    <button type="submit" class="px-8 py-3 bg-gradient-to-r from-[#C8A26E] to-[#A97142] text-white rounded-xl hover:from-[#A97142] hover:to-[#C8A26E] transition-all duration-200 flex items-center space-x-2 font-medium shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <span>Actualizar Actividad</span>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
