@extends('layouts.app')

@section('title', 'Subir Evidencia')

@section('content')
<div class="space-y-6">
    <div class="flex items-center justify-between">
        <h1 class="text-3xl font-bold text-gray-900">Subir Evidencia</h1>
        <a href="{{ route('actividades.show', $actividad) }}" class="text-blue-600 hover:text-blue-900">Volver</a>
    </div>

    <div class="bg-white rounded-lg shadow-md p-6">
        <div class="mb-4">
            <p class="text-sm text-gray-600">Actividad: <strong>{{ $actividad->titulo }}</strong></p>
        </div>

        <form action="{{ route('evidencias.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="space-y-4">
                <input type="hidden" name="actividad_id" value="{{ $actividad->id }}">

                <div>
                    <label for="archivo" class="block text-sm font-medium text-gray-700">Archivo</label>
                    <input type="file" name="archivo" id="archivo" required
                        class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                    @error('archivo')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                    <p class="mt-1 text-xs text-gray-500">Formatos aceptados: JPEG, PNG, JPG, GIF, PDF. Máximo 10MB.</p>
                </div>

                <div>
                    <label for="tipo" class="block text-sm font-medium text-gray-700">Tipo</label>
                    <select name="tipo" id="tipo" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        <option value="imagen">Imagen</option>
                        <option value="pdf">PDF</option>
                    </select>
                    @error('tipo')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="descripcion" class="block text-sm font-medium text-gray-700">Descripción</label>
                    <textarea name="descripcion" id="descripcion" rows="3"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">{{ old('descripcion') }}</textarea>
                    @error('descripcion')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex justify-end space-x-3">
                    <a href="{{ route('actividades.show', $actividad) }}" class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition">
                        Cancelar
                    </a>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                        Subir
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
