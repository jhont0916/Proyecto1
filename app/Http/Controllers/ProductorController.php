<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProductorController extends Controller
{
    // Mostrar formulario de edición de perfil
    public function edit()
    {
        $productor = Auth::user();
        return view('productor.configuracion', compact('productor'));
    }

    // Actualizar perfil (nombre y contraseña)
    public function update(Request $request)
{
    $productor = Auth::user();

    $request->validate([
        'name' => 'required|string|max:255',
        'telefono' => 'nullable|string|max:20',
        'password' => 'nullable|confirmed|min:8',
    ]);

    $data = [
        'name' => $request->name,
        'telefono' => $request->telefono, // 👈 Guardamos el número
    ];

    if ($request->filled('password')) {
        $data['password'] = Hash::make($request->password);
    }

    $productor->update($data);

    return redirect()->route('productor.configuracion')->with('success', 'Perfil actualizado correctamente.');
}

    // Eliminar cuenta (acción irreversible)
    public function destroy(Request $request)
    {
        $user = Auth::user();

        // Opcional: verificar contraseña antes de eliminar
        // if (!Hash::check($request->input('current_password'), $user->password)) {
        //     return back()->withErrors(['current_password' => 'Contraseña incorrecta']);
        // }

        Auth::logout();
        $user->delete();

        return redirect('/')->with('success', 'Tu cuenta ha sido eliminada.');
    }
}
