@extends('layouts.app')

@section('title', 'Iglesia San Marteen - Inicio')

@section('content')
<div class="space-y-4 md:space-y-6 animate-fade-in">

    <!-- Bienvenida -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
        <h1 class="text-2xl md:text-3xl font-bold text-[#1F2937]">Inicio</h1>
        <p class="text-gray-500 mt-1 sm:mt-0 text-sm md:text-base">
            Bienvenido, {{ auth()->user()->name }}
        </p>
    </div>

    <!-- Tarjetas de estadísticas -->
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-3 md:gap-6">

        <div class="bg-gradient-to-br from-[#C8A26E] to-[#A97142] rounded-2xl shadow-lg p-4 md:p-6 text-white transition-all duration-300 hover:shadow-xl hover:-translate-y-1 active:scale-95">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs md:text-sm text-[#E9D8B6]">Total Actividades</p>
                    <p class="text-2xl md:text-3xl font-bold mt-0.5">{{ $totalActividades ?? 0 }}</p>
                </div>
                <div class="bg-white/20 p-2 md:p-3 rounded-xl shrink-0">
                    <svg class="w-5 h-5 md:w-8 md:h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/>
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-gradient-to-br from-[#E9D8B6] to-[#C8A26E] rounded-2xl shadow-lg p-4 md:p-6 text-[#1F2937] transition-all duration-300 hover:shadow-xl hover:-translate-y-1 active:scale-95">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs md:text-sm text-[#A97142]">Pendientes</p>
                    <p class="text-2xl md:text-3xl font-bold mt-0.5">{{ $actividadesPendientes ?? 0 }}</p>
                </div>
                <div class="bg-white/30 p-2 md:p-3 rounded-xl shrink-0">
                    <svg class="w-5 h-5 md:w-8 md:h-8 text-[#A97142]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-gradient-to-br from-[#A97142] to-[#C8A26E] rounded-2xl shadow-lg p-4 md:p-6 text-white transition-all duration-300 hover:shadow-xl hover:-translate-y-1 active:scale-95">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs md:text-sm text-[#E9D8B6]">Finalizadas</p>
                    <p class="text-2xl md:text-3xl font-bold mt-0.5">{{ $actividadesFinalizadas ?? 0 }}</p>
                </div>
                <div class="bg-white/20 p-2 md:p-3 rounded-xl shrink-0">
                    <svg class="w-5 h-5 md:w-8 md:h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-gradient-to-br from-[#E9D8B6] to-[#FAF8F5] rounded-2xl shadow-lg p-4 md:p-6 text-[#1F2937] transition-all duration-300 hover:shadow-xl hover:-translate-y-1 active:scale-95">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs md:text-sm text-[#A97142]">Usuarios Activos</p>
                    <p class="text-2xl md:text-3xl font-bold mt-0.5">{{ $totalUsuarios ?? 0 }}</p>
                </div>
                <div class="bg-white/50 p-2 md:p-3 rounded-xl shrink-0">
                    <svg class="w-5 h-5 md:w-8 md:h-8 text-[#A97142]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 0 0112 0v1zm0 0h6v-1a6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                    </svg>
                </div>
            </div>
        </div>

    </div>

    <!-- Próximos Eventos -->
    <div class="bg-white rounded-2xl shadow-lg p-5 md:p-6 border border-[#E9D8B6]">
        <h2 class="text-lg md:text-xl font-bold text-[#1F2937] mb-4 flex items-center gap-2">
            <svg class="w-5 h-5 md:w-6 md:h-6 text-[#C8A26E] shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
            </svg>
            Próximos Eventos
        </h2>

        @if(isset($proximosEventos) && $proximosEventos->count() > 0)
            <div class="space-y-3">
                @foreach($proximosEventos as $evento)
                    <a href="{{ route('actividades.show', $evento) }}"
                        class="block p-4 bg-gradient-to-r from-[#FAF8F5] to-[#E9D8B6]/30 rounded-xl hover:from-[#E9D8B6]/30 hover:to-[#C8A26E]/20 active:from-[#E9D8B6]/50 active:to-[#C8A26E]/30 transition-all duration-300 hover:shadow-md border border-[#E9D8B6]/50">
                        <div class="flex items-start justify-between gap-3">
                            <div class="min-w-0">
                                <h3 class="font-semibold text-[#1F2937] text-sm md:text-base truncate">
                                    {{ $evento->titulo }}
                                </h3>
                                <p class="text-xs md:text-sm text-[#A97142] mt-0.5">
                                    {{ $evento->fecha->format('d/m/Y') }} - {{ $evento->hora }}
                                </p>
                                @if($evento->lugar)
                                    <p class="text-xs md:text-sm text-gray-500 mt-0.5 truncate">
                                        {{ $evento->lugar }}
                                    </p>
                                @endif
                            </div>
                            <span class="shrink-0 px-2.5 py-1 text-xs font-medium rounded-full
                                {{ $evento->estado === 'pendiente'
                                    ? 'bg-[#E9D8B6] text-[#A97142]'
                                    : ($evento->estado === 'en_proceso'
                                        ? 'bg-[#C8A26E]/20 text-[#A97142]'
                                        : 'bg-[#E9D8B6] text-[#A97142]') }}">
                                {{ ucfirst(str_replace('_', ' ', $evento->estado)) }}
                            </span>
                        </div>
                    </a>
                @endforeach
            </div>
        @else
            <div class="text-center py-8 md:py-12">
                <svg class="w-12 h-12 md:w-16 md:h-16 mx-auto text-[#E9D8B6] mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
                <p class="text-gray-500 text-sm">No hay próximos eventos programados.</p>
            </div>
        @endif
    </div>

</div>
@endsection
