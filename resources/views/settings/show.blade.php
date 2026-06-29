@extends('layouts.app')

@section('title', 'Mi Perfil - Iglesia San Marteen')

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
                <span class="text-2xl">👤</span>
            </div>
            <div>
                <h1 class="text-2xl md:text-3xl font-bold text-[#1F2937]">Mi Perfil</h1>
                <p class="text-gray-500 text-sm md:text-base">Visualiza tu información personal</p>
            </div>
        </div>
    </div>

    <!-- Profile Card -->
    <div class="bg-white rounded-2xl shadow-lg border border-[#E9D8B6] p-6 md:p-8">
        <!-- Avatar Section -->
        <div class="flex flex-col md:flex-row items-center gap-6 mb-8 pb-8 border-b border-[#E9D8B6]">
            <div class="w-24 h-24 rounded-2xl bg-gradient-to-br from-[#C8A26E] to-[#A97142] flex items-center justify-center">
                <span class="text-5xl font-bold text-white">{{ strtoupper(substr($user->name, 0, 1)) }}</span>
            </div>
            <div class="text-center md:text-left">
                <h2 class="text-2xl font-bold text-[#1F2937]">{{ $user->name }}</h2>
                <p class="text-[#A97142] font-medium">{{ $user->cargo->nombre ?? 'Sin cargo' }}</p>
                <p class="text-gray-500 text-sm mt-1">@ {{ $user->username }}</p>
            </div>
        </div>

        <!-- Profile Info -->
        <div class="space-y-6">
            <!-- Name -->
            <div class="flex items-start gap-4 p-4 bg-[#FAF8F5] rounded-xl">
                <div class="w-10 h-10 rounded-xl bg-[#E9D8B6] flex items-center justify-center flex-shrink-0">
                    <svg class="w-5 h-5 text-[#A97142]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                </div>
                <div>
                    <p class="text-sm text-gray-500 mb-1">Nombre completo</p>
                    <p class="text-lg font-semibold text-[#1F2937]">{{ $user->name }}</p>
                </div>
            </div>

            <!-- Username -->
            <div class="flex items-start gap-4 p-4 bg-[#FAF8F5] rounded-xl">
                <div class="w-10 h-10 rounded-xl bg-[#E9D8B6] flex items-center justify-center flex-shrink-0">
                    <svg class="w-5 h-5 text-[#A97142]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <div>
                    <p class="text-sm text-gray-500 mb-1">Nombre de usuario</p>
                    <p class="text-lg font-semibold text-[#1F2937]">{{ $user->username }}</p>
                </div>
            </div>

            <!-- Email -->
            <div class="flex items-start gap-4 p-4 bg-[#FAF8F5] rounded-xl">
                <div class="w-10 h-10 rounded-xl bg-[#E9D8B6] flex items-center justify-center flex-shrink-0">
                    <svg class="w-5 h-5 text-[#A97142]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <div>
                    <p class="text-sm text-gray-500 mb-1">Correo electrónico</p>
                    <p class="text-lg font-semibold text-[#1F2937]">{{ $user->email ?? 'No registrado' }}</p>
                </div>
            </div>

            <!-- Phone -->
            <div class="flex items-start gap-4 p-4 bg-[#FAF8F5] rounded-xl">
                <div class="w-10 h-10 rounded-xl bg-[#E9D8B6] flex items-center justify-center flex-shrink-0">
                    <svg class="w-5 h-5 text-[#A97142]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                    </svg>
                </div>
                <div>
                    <p class="text-sm text-gray-500 mb-1">Teléfono</p>
                    <p class="text-lg font-semibold text-[#1F2937]">{{ $user->telefono ?? 'No registrado' }}</p>
                </div>
            </div>

            <!-- Status -->
            <div class="flex items-start gap-4 p-4 bg-[#FAF8F5] rounded-xl">
                <div class="w-10 h-10 rounded-xl bg-[#E9D8B6] flex items-center justify-center flex-shrink-0">
                    <svg class="w-5 h-5 text-[#A97142]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <div>
                    <p class="text-sm text-gray-500 mb-1">Estado</p>
                    <span class="px-3 py-1 text-sm font-medium rounded-full {{ $user->estado ? 'bg-emerald-100 text-emerald-700' : 'bg-red-100 text-red-700' }}">
                        {{ $user->estado ? 'Activo' : 'Inactivo' }}
                    </span>
                </div>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="mt-8 pt-6 border-t border-[#E9D8B6] flex flex-col sm:flex-row gap-4">
            <a href="{{ route('settings.profile') }}" class="flex-1 bg-gradient-to-r from-[#C8A26E] to-[#A97142] text-white px-6 py-3.5 rounded-xl shadow-lg hover:shadow-xl transform hover:scale-[1.02] transition-all duration-300 font-semibold text-center">
                Editar perfil
            </a>
            <a href="{{ route('settings.password') }}" class="flex-1 border-2 border-[#C8A26E] text-[#A97142] px-6 py-3.5 rounded-xl hover:bg-[#FAF8F5] transition-all duration-300 font-semibold text-center">
                Cambiar contraseña
            </a>
        </div>
    </div>
</div>
@endsection
