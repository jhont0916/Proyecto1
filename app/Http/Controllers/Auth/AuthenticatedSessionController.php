<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Mostrar la vista de login
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Manejar inicio de sesión
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();
    $request->session()->regenerate();

    // Verificar el rol del usuario
    if (Auth::user()->role === 'cliente') {
        return redirect()->route('cliente.dashboard');
    } elseif (Auth::user()->role === 'productor') {
        return redirect()->route('dashboard');
    }

    // En caso de que no tenga rol definido
    return redirect()->route('casa');
    }

    /**
     * Cerrar sesión
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
