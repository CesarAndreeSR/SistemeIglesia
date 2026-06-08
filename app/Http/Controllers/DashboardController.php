<?php

namespace App\Http\Controllers;

use App\Models\Actividad;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalActividades = Actividad::count();
        $actividadesPendientes = Actividad::where('estado', 'pendiente')->count();
        $actividadesFinalizadas = Actividad::where('estado', 'finalizado')->count();
        $proximosEventos = Actividad::where('fecha', '>=', now())
            ->where('estado', '!=', 'finalizado')
            ->orderBy('fecha')
            ->orderBy('hora')
            ->take(5)
            ->get();

        $totalUsuarios = User::where('estado', true)->count();

        \Log::info('Dashboard data', [
            'totalActividades' => $totalActividades,
            'actividadesPendientes' => $actividadesPendientes,
            'actividadesFinalizadas' => $actividadesFinalizadas,
            'proximosEventos' => $proximosEventos->count(),
            'totalUsuarios' => $totalUsuarios,
        ]);

        return view('dashboard.index', compact(
            'totalActividades',
            'actividadesPendientes',
            'actividadesFinalizadas',
            'proximosEventos',
            'totalUsuarios'
        ));
    }
}
