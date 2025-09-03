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
        // Contar productos disponibles
        $productosCount = Producto::count();

        // Obtener pedidos del cliente logueado
        $pedidos = Pedido::where('user_id', Auth::id())->latest()->get();

        // Contar pedidos
        $pedidosCount = $pedidos->count();

         // Total solo de pedidos con producto válido
        $gastosTotales = $pedidos
            ->filter(fn ($p) => $p->producto)
            ->sum(function ($pedido) {
                $precio = (float) ($pedido->producto->precio ?? 0);
                $cantidad = (float) ($pedido->cantidad ?? 0);
                return $cantidad * $precio;
            });
        

        // Pasar todas las variables a la vista
        return view('cliente.dashboard', compact(
            'productosCount',
            'pedidosCount',
            'gastosTotales',
            'pedidos'
        ));
    }
}
