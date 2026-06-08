<?php

namespace App\Http\Controllers;

use App\Http\Requests\AsistenciaRequest;
use App\Models\Actividad;
use App\Models\Asistencia;
use App\Models\User;
use Illuminate\Http\Request;

class AsistenciaController extends Controller
{
    public function index()
    {
        $asistencias = Asistencia::with('actividad', 'user')->get();
        return view('asistencias.index', compact('asistencias'));
    }

    public function create($actividadId)
    {
        $actividad = Actividad::findOrFail($actividadId);
        $users = User::where('estado', true)->get();
        return view('asistencias.create', compact('actividad', 'users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'actividad_id' => 'required|exists:actividades,id',
            'asistencias' => 'required|array',
            'asistencias.*' => 'exists:users,id',
        ]);

        $actividadId = $request->actividad_id;

        foreach ($request->asistencias as $userId) {
            Asistencia::updateOrCreate(
                [
                    'actividad_id' => $actividadId,
                    'user_id' => $userId,
                ],
                [
                    'asistio' => true,
                ]
            );
        }

        return redirect()->route('actividades.show', $actividadId)
            ->with('success', 'Asistencia registrada exitosamente.');
    }

    public function show(Asistencia $asistencia)
    {
        $asistencia->load('actividad', 'user');
        return view('asistencias.show', compact('asistencia'));
    }

    public function edit($actividadId)
    {
        $actividad = Actividad::with('asistencias')->findOrFail($actividadId);
        $users = User::where('estado', true)->get();
        return view('asistencias.edit', compact('actividad', 'users'));
    }

    public function update(Request $request, $actividadId)
    {
        $request->validate([
            'asistencias' => 'required|array',
            'asistencias.*' => 'exists:users,id',
        ]);

        $actividad = Actividad::findOrFail($actividadId);

        $actividad->asistencias()->delete();

        foreach ($request->asistencias as $userId) {
            Asistencia::create([
                'actividad_id' => $actividadId,
                'user_id' => $userId,
                'asistio' => true,
            ]);
        }

        return redirect()->route('actividades.show', $actividadId)
            ->with('success', 'Asistencia actualizada exitosamente.');
    }

    public function toggle(Request $request, $actividadId, $userId)
    {
        $asistencia = Asistencia::where('actividad_id', $actividadId)
            ->where('user_id', $userId)
            ->first();

        if ($asistencia) {
            $asistencia->update(['asistio' => !$asistencia->asistio]);
        } else {
            Asistencia::create([
                'actividad_id' => $actividadId,
                'user_id' => $userId,
                'asistio' => true,
            ]);
        }

        return redirect()->route('actividades.show', $actividadId)
            ->with('success', 'Asistencia actualizada.');
    }
}
