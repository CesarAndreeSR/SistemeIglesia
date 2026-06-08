<?php

namespace App\Http\Controllers;

use App\Models\Actividad;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    public function index()
    {
        return view('calendar.index');
    }

    public function events(Request $request)
    {
        $start = $request->query('start');
        $end = $request->query('end');

        $actividades = Actividad::whereBetween('fecha', [$start, $end])
            ->get()
            ->map(function ($actividad) {
                return [
                    'id' => $actividad->id,
                    'title' => $actividad->titulo,
                    'start' => $actividad->fecha . 'T' . $actividad->hora,
                    'backgroundColor' => $this->getColorByEstado($actividad->estado),
                    'borderColor' => $this->getColorByEstado($actividad->estado),
                    'url' => route('actividades.show', $actividad->id),
                ];
            });

        return response()->json($actividades);
    }

    private function getColorByEstado($estado)
    {
        return match($estado) {
            'pendiente' => '#3b82f6',
            'en_proceso' => '#f59e0b',
            'finalizado' => '#10b981',
            default => '#6b7280',
        };
    }
}
