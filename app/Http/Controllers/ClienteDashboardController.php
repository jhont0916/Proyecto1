<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Producto;
use App\Models\User;
use App\Models\Pedido;

class ClienteDashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Si no está autenticado o no es cliente, redirigir donde corresponde
        if (!$user) {
            return redirect()->route('casa');
        }

        if ($user->role === 'cliente') {
            return redirect()->route('cliente.dashboard');
            if ($user->role === 'productor') {
                return redirect()->route('dashboard');
            }
            // Fallback si tiene otro rol
            return redirect()->route('casa');
        }

        // --- Lógica SOLO para clientes ---
        $productosCount = Producto::count();

        $pedidos = Pedido::with('producto')
            ->where('user_id', $user->id)
            ->latest()
            ->get();

        $pedidosCount = $pedidos->count();

        // Total solo de pedidos con producto válido
        $gastosTotales = $pedidos
            ->filter(fn ($p) => $p->producto)
            ->sum(function ($pedido) {
                $precio = (float) ($pedido->producto->precio ?? 0);
                $cantidad = (float) ($pedido->cantidad ?? 0);
                return $cantidad * $precio;
            });

        return view('cliente.dashboard', [
            'usuario'        => $user,
            'productosCount' => $productosCount,
            'pedidos'        => $pedidos,
            'pedidosCount'   => $pedidosCount,
            'gastosTotales'  => $gastosTotales,
        ]);
    }
    public function cliente()
    {
        $user = Auth::user();

        if ($user->role !== 'cliente') {
            return redirect('/')->with('error', 'No tienes acceso al dashboard de cliente.');
        }

        // Aquí puedes traer pedidos del cliente, por ejemplo:
        $misPedidos = Pedido::where('user_id', $user->id)->get();

        // 👉 Cliente tiene su carpeta propia
        return view('cliente.dashboard', compact('misPedidos'));
    }
}
