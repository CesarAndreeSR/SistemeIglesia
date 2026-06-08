<?php

namespace App\Http\Controllers;

use App\Http\Requests\CargoRequest;
use App\Models\Cargo;
use Illuminate\Http\Request;

class CargoController extends Controller
{
    public function index()
    {
        $cargos = Cargo::withCount('users')->get();
        return view('cargos.index', compact('cargos'));
    }

    public function create()
    {
        return view('cargos.create');
    }

    public function store(CargoRequest $request)
    {
        Cargo::create($request->validated());
        return redirect()->route('cargos.index')
            ->with('success', 'Cargo creado exitosamente.');
    }

    public function show(Cargo $cargo)
    {
        $cargo->load('users');
        return view('cargos.show', compact('cargo'));
    }

    public function edit(Cargo $cargo)
    {
        return view('cargos.edit', compact('cargo'));
    }

    public function update(CargoRequest $request, Cargo $cargo)
    {
        $cargo->update($request->validated());
        return redirect()->route('cargos.index')
            ->with('success', 'Cargo actualizado exitosamente.');
    }

    public function destroy(Cargo $cargo)
    {
        $cargo->delete();
        return redirect()->route('cargos.index')
            ->with('success', 'Cargo eliminado exitosamente.');
    }
}
