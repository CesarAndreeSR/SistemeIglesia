@extends('layouts.app')

@section('title', 'Cambiar Contraseña - Iglesia San Marteen')

@section('content')
<div class="space-y-6 animate-fade-in">
    <!-- Header -->
    <div class="flex items-center gap-4">
        <a href="{{ route('settings.index') }}" class="p-2 rounded-xl hover:bg-[#E9D8B6] transition-all">
            <svg class="w-6 h-6 text-[#1F2937]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
        </a>
        <div class="flex items-center gap-4">
            <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-[#C8A26E] to-[#A97142] flex items-center justify-center">
                <span class="text-2xl">🔐</span>
            </div>
            <div>
                <h1 class="text-2xl md:text-3xl font-bold text-[#1F2937]">Cambiar Contraseña</h1>
                <p class="text-gray-500 text-sm md:text-base">Actualiza tu contraseña de acceso</p>
            </div>
        </div>
    </div>

    <!-- Password Card -->
    <div class="bg-white rounded-2xl shadow-lg border border-[#E9D8B6] p-6 md:p-8">
        @if(session('success'))
            <div class="mb-6 p-4 bg-emerald-50 border border-emerald-200 text-emerald-700 rounded-xl flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        <form method="POST" action="{{ route('settings.password.update') }}">
            @csrf
            
            <div class="space-y-6">
                <!-- Current Password -->
                <div>
                    <label for="current_password" class="block text-sm font-semibold text-[#1F2937] mb-2">Contraseña actual</label>
                    <input type="password" id="current_password" name="current_password" required
                        class="w-full px-4 py-3.5 rounded-xl border-2 border-[#E9D8B6] focus:border-[#C8A26E] focus:ring-4 focus:ring-[#E9D8B6] transition-all text-base text-[#1F2937] placeholder-gray-400">
                    @error('current_password')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- New Password -->
                <div>
                    <label for="password" class="block text-sm font-semibold text-[#1F2937] mb-2">Nueva contraseña</label>
                    <input type="password" id="password" name="password" required
                        class="w-full px-4 py-3.5 rounded-xl border-2 border-[#E9D8B6] focus:border-[#C8A26E] focus:ring-4 focus:ring-[#E9D8B6] transition-all text-base text-[#1F2937] placeholder-gray-400">
                    @error('password')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Confirm Password -->
                <div>
                    <label for="password_confirmation" class="block text-sm font-semibold text-[#1F2937] mb-2">Confirmar nueva contraseña</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" required
                        class="w-full px-4 py-3.5 rounded-xl border-2 border-[#E9D8B6] focus:border-[#C8A26E] focus:ring-4 focus:ring-[#E9D8B6] transition-all text-base text-[#1F2937] placeholder-gray-400">
                </div>

                <!-- Submit Button -->
                <div class="pt-4">
                    <button type="submit"
                        class="w-full bg-gradient-to-r from-[#C8A26E] to-[#A97142] text-white px-6 py-3.5 rounded-xl shadow-lg hover:shadow-xl transform hover:scale-[1.02] transition-all duration-300 font-semibold">
                        Actualizar contraseña
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
