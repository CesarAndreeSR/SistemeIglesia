<?php

namespace App\Http\Controllers;

use App\Http\Requests\ActividadRequest;
use App\Models\Actividad;
use App\Models\User;
use Illuminate\Http\Request;

class ActividadController extends Controller
{
    public function index()
    {
        $actividades = Actividad::with('creador', 'responsables')->get();
        return view('actividades.index', compact('actividades'));
    }

    public function create()
    {
        $users = User::where('estado', true)->get();
        return view('actividades.create', compact('users'));
    }

    public function store(ActividadRequest $request)
    {
        $data = $request->validated();
        $data['creado_por'] = auth()->id();
        $actividad = Actividad::create($data);

        if ($request->has('responsables')) {
            $actividad->responsables()->attach($request->responsables);
        }

        return redirect()->route('actividades.index')
            ->with('success', 'Actividad creada exitosamente.');
    }

    public function show(Actividad $actividad)
    {
        $actividad->load('creador', 'responsables', 'evidencias', 'asistencias.user');
        return view('actividades.show', compact('actividad'));
    }

    public function edit(Actividad $actividad)
    {
        $users = User::where('estado', true)->get();
        $actividad->load('responsables');
        return view('actividades.edit', compact('actividad', 'users'));
    }

    public function update(ActividadRequest $request, Actividad $actividad)
    {
        $actividad->update($request->validated());

        if ($request->has('responsables')) {
            $actividad->responsables()->sync($request->responsables);
        } else {
            $actividad->responsables()->detach();
        }

        return redirect()->route('actividades.show', $actividad)
            ->with('success', 'Estado de la actividad actualizado.');
    }

    public function destroy(Actividad $actividad)
    {
        $actividad->delete();
        return redirect()->route('actividades.index')
            ->with('success', 'Actividad eliminada exitosamente.');
    }

    public function updateEstado(Request $request, Actividad $actividad)
    {
        $request->validate([
            'estado' => 'required|in:pendiente,en_proceso,finalizado'
        ]);

        $actividad->update(['estado' => $request->estado]);
        return redirect()->route('actividades.show', $actividad)
            ->with('success', 'Estado de la actividad actualizado.');
    }
    public function misActividades()
    {
        $actividades = Actividad::with('creador', 'responsables')
            ->whereHas('responsables', function ($query) {
                $query->where('users.id', auth()->id());
            })
            ->latest()
            ->get();

        return view('actividades.mis', compact('actividades'));
    }
}
