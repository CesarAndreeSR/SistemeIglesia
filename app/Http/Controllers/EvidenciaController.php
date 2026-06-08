<?php

namespace App\Http\Controllers;

use App\Http\Requests\EvidenciaRequest;
use App\Models\Actividad;
use App\Models\Evidencia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EvidenciaController extends Controller
{
    public function index()
    {
        $evidencias = Evidencia::with('actividad', 'subidor')->get();
        return view('evidencias.index', compact('evidencias'));
    }

    public function create($actividadId)
    {
        $actividad = Actividad::findOrFail($actividadId);
        return view('evidencias.create', compact('actividad'));
    }

    public function store(EvidenciaRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('archivo')) {
            $path = $request->file('archivo')->store('evidencias', 'public');
            $data['archivo'] = $path;
        }

        $data['subido_por'] = auth()->id();
        Evidencia::create($data);

        return redirect()->route('actividades.show', $request->actividad_id)
            ->with('success', 'Evidencia subida exitosamente.');
    }

    public function show(Evidencia $evidencia)
    {
        $evidencia->load('actividad', 'subidor');
        return view('evidencias.show', compact('evidencia'));
    }

    public function destroy(Evidencia $evidencia)
    {
        if (Storage::disk('public')->exists($evidencia->archivo)) {
            Storage::disk('public')->delete($evidencia->archivo);
        }

        $actividadId = $evidencia->actividad_id;
        $evidencia->delete();

        return redirect()->route('actividades.show', $actividadId)
            ->with('success', 'Evidencia eliminada exitosamente.');
    }

    public function download(Evidencia $evidencia)
    {
        return response()->download(storage_path('app/public/' . $evidencia->archivo));
    }
}
