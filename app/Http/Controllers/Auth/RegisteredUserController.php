<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Mostrar formulario de registro
     */
    public function create(): View
    {
        return view('auth.register'); // Vista del formulario de registro
    }

    /**
     * Guardar nuevo usuario en la base de datos
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
             'name'     => ['required', 'string', 'max:255'],
            'email'    => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role'     => ['required', 'in:cliente,productor'], // Validamos el rol
            'telefono' => ['nullable', 'string', 'regex:/^[0-9]{10,15}$/'], // Validación del número
            'document_number' => ['nullable', 'string', 'max:50'],
        ]);

        // Crear usuario
        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => $request->role,
            'telefono' => $request->telefono, // 🔹 Guardamos el teléfono
            'document_number' => $request->document_number,
        ]);

        event(new Registered($user));

        Auth::login($user);

        // 🔹 Redirigir según rol
        if ($user->role === 'productor') {
        return redirect()->route('dashboard');
    } else {
        return redirect()->route('cliente.dashboard');
    }


        // 🔹 Si no tiene rol válido, mandamos al inicio
        return redirect()->route('/'); 
    }
}
