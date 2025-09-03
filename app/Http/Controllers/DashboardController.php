<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Producto;
use App\Models\User;
use App\Models\Pedido;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();

        if ($user->role === 'productor') {
            return $this->productor();
        } elseif ($user->role === 'cliente') {
            return $this->cliente();
        }

        return redirect('/')->with('error', 'No tienes acceso al dashboard.');
    }

    public function productor()
    {
       $user = Auth::user();

    if ($user->role !== 'productor') {
        return redirect('/')->with('error', 'No tienes acceso al dashboard de productor.');
    }

    $productos = Producto::where('user_id', $user->id)->get();
    $totalPedidos = Pedido::whereIn('producto_id', $productos->pluck('id'))->count();

    return view('dashboard', compact('productos', 'totalPedidos'));
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
