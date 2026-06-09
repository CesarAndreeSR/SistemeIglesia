<?php

use App\Http\Controllers\ActividadController;
use App\Http\Controllers\AsistenciaController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CargoController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EvidenciaController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});
// Registro público
Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'showForm'])->name('register');
Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class, 'register'])->name('register.post');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware([
    'auth',
])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    Route::resource('cargos', CargoController::class);

    Route::resource('users', UserController::class);
    Route::patch('/users/{user}/toggle-status', [UserController::class, 'toggleStatus'])->name('users.toggle-status');

    Route::get('/actividades/mis', [ActividadController::class, 'misActividades'])->name('actividades.mis');
    Route::resource('actividades', ActividadController::class)->parameters(['actividades' => 'actividad']);
    Route::patch('/actividades/{actividad}/estado', [ActividadController::class, 'updateEstado'])->name('actividades.update-estado');
    
    Route::prefix('evidencias')->group(function () {
        Route::get('/', [EvidenciaController::class, 'index'])->name('evidencias.index');
        Route::get('/create/{actividadId}', [EvidenciaController::class, 'create'])->name('evidencias.create');
        Route::post('/', [EvidenciaController::class, 'store'])->name('evidencias.store');
        Route::get('/{evidencia}', [EvidenciaController::class, 'show'])->name('evidencias.show');
        Route::delete('/{evidencia}', [EvidenciaController::class, 'destroy'])->name('evidencias.destroy');
        Route::get('/{evidencia}/download', [EvidenciaController::class, 'download'])->name('evidencias.download');
    });

    Route::prefix('asistencias')->group(function () {
        Route::get('/', [AsistenciaController::class, 'index'])->name('asistencias.index');
        Route::get('/create/{actividadId}', [AsistenciaController::class, 'create'])->name('asistencias.create');
        Route::post('/', [AsistenciaController::class, 'store'])->name('asistencias.store');
        Route::get('/{asistencia}', [AsistenciaController::class, 'show'])->name('asistencias.show');
        Route::get('/edit/{actividadId}', [AsistenciaController::class, 'edit'])->name('asistencias.edit');
        Route::put('/{actividadId}', [AsistenciaController::class, 'update'])->name('asistencias.update');
        Route::patch('/toggle/{actividadId}/{userId}', [AsistenciaController::class, 'toggle'])->name('asistencias.toggle');
        Route::patch('/users/{user}/reset-password', [UserController::class, 'resetPassword'])->name('users.reset-password');
    });
});
