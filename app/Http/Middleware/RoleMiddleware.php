<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Maneja la solicitud entrante.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role  El rol permitido
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next)
{
    if (auth()->check()) {
        if (auth()->user()->role === 'cliente' && $request->is('dashboard')) {
            return redirect()->route('cliente.dashboard');
        }

        if (auth()->user()->role === 'productor' && $request->is('cliente/dashboard')) {
            return redirect()->route('dashboard');
        }
    }

    return $next($request);
}

}
