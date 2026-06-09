<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\Cargo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('cargo')->get();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        $cargos = Cargo::all();
        return view('users.create', compact('cargos'));
    }

    public function store(UserRequest $request)
    {
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);
        $data['estado'] = $request->has('estado');
        User::create($data);
        return redirect()->route('users.index')
            ->with('success', 'Usuario creado exitosamente.');
    }

    public function show(User $user)
    {
        $user->load('cargo', 'actividadesAsignadas', 'asistencias');
        return view('users.show', compact('user'));
    }

    public function edit(User $user)
    {
        $cargos = Cargo::all();
        return view('users.edit', compact('user', 'cargos'));
    }

    public function update(UserRequest $request, User $user)
    {
        $data = $request->validated();
        if (!empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }
        $data['estado'] = $request->has('estado');
        $user->update($data);
        return redirect()->route('users.index')
            ->with('success', 'Usuario actualizado exitosamente.');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')
            ->with('success', 'Usuario eliminado exitosamente.');
    }

    public function toggleStatus(User $user)
    {
        $user->update(['estado' => !$user->estado]);
        return redirect()->route('users.index')
            ->with('success', 'Estado del usuario actualizado.');
    }
    public function resetPassword(Request $request, User $user)
    {
        $request->validate([
            'new_password' => 'required|min:6|confirmed',
        ]);

        $user->update([
            'password' => bcrypt($request->new_password),
        ]);

        return back()->with('success', 'Contraseña actualizada correctamente.');
    }
}
