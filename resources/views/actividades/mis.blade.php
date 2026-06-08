
@extends('layouts.app')

@section('title', 'Mis Actividades')

@section('content')

<div class="space-y-6">

    {{-- Header --}}
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
        <h1 class="text-3xl font-bold text-gray-900">Mis Actividades</h1>

        <a href="{{ route('actividades.create') }}"
           class="mt-4 sm:mt-0 bg-blue-600 text-white px-5 py-2 rounded-lg hover:bg-blue-700 transition">
            + Nueva Actividad
        </a>
    </div>

    {{-- Grid --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

        @forelse($actividades as $actividad)

            <div class="bg-white rounded-2xl shadow-md hover:shadow-xl transition p-5 border border-gray-100">

                {{-- Título --}}
                <h2 class="text-lg font-bold text-gray-900 mb-2">
                    {{ $actividad->titulo }}
                </h2>

                {{-- Info --}}
                <div class="space-y-1 text-sm text-gray-600">
                    <p>📅 {{ $actividad->fecha->format('d/m/Y') }}</p>
                    <p>⏰ {{ $actividad->hora }}</p>
                    <p>📍 {{ $actividad->lugar ?? 'Sin lugar' }}</p>
                </div>

                {{-- Estado --}}
                <div class="mt-3">
                    <span class="px-3 py-1 text-xs rounded-full font-medium
                        {{ $actividad->estado === 'pendiente'
                            ? 'bg-yellow-100 text-yellow-800'
                            : ($actividad->estado === 'en_proceso'
                                ? 'bg-blue-100 text-blue-800'
                                : 'bg-green-100 text-green-800') }}">
                        {{ ucfirst(str_replace('_',' ',$actividad->estado)) }}
                    </span>
                </div>

                {{-- Botones --}}
                <div class="mt-4 flex gap-2">

                    <a href="{{ route('actividades.show', $actividad->id) }}"
                       class="flex-1 text-center bg-gray-100 hover:bg-gray-200 py-2 rounded-lg text-sm">
                        Ver
                    </a>

                    <a href="{{ route('actividades.edit', $actividad->id) }}"
                       class="flex-1 text-center bg-indigo-100 hover:bg-indigo-200 py-2 rounded-lg text-sm">
                        Editar
                    </a>

                    <form action="{{ route('actividades.destroy', $actividad->id) }}"
                          method="POST"
                          onsubmit="return confirm('¿Eliminar actividad?')">
                        @csrf
                        @method('DELETE')

                        <button class="bg-red-100 hover:bg-red-200 text-red-700 px-3 py-2 rounded-lg text-sm">
                            X
                        </button>
                    </form>

                </div>

            </div>

        @empty

            <div class="col-span-full text-center py-10 text-gray-500">
                No tienes actividades registradas.
            </div>

        @endforelse

    </div>

</div>

@endsection