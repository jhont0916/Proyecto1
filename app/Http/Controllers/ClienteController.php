<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ClienteController extends Controller
{
    /**
     * Actualiza el perfil del cliente autenticado
     */
    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name'      => 'required|string|max:255',
            'telefono'  => 'nullable|string|max:20',
            'password'  => 'nullable|confirmed|min:8',
        ]);

        $user->name     = $request->name;
        $user->telefono = $request->telefono;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('cliente.dashboard')
            ->with('success', 'Perfil actualizado correctamente.');
    }

    /**
     * Elimina la cuenta del cliente autenticado
     */
    public function destroy(Request $request)
    {
        $user = Auth::user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'Tu cuenta ha sido eliminada correctamente.');
    }
}
