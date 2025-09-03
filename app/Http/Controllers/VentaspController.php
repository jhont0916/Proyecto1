<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Ventasp;
use Illuminate\Support\Facades\Auth;

class VentaspController extends Controller
{
    public function index()
{
    $ventas = Ventasp::with('producto')->get();
    $productos = Producto::where('user_id', Auth::id())->get(); // Solo los productos del productor logueado

    return view('ventasp.index', compact('ventas', 'productos'));
}

    public function create()
    {
        // Trae solo los productos del productor autenticado
        $productos = Producto::where('user_id', Auth::id())->get();
        return view('ventasp.create', compact('productos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'cliente' => 'required|string|max:255',
            'producto_id' => 'required|exists:productos,id',
            'cantidad' => 'required|integer|min:1',
            'precio' => 'required|numeric|min:0',
        ]);

        Ventasp::create([
            'cliente' => $request->cliente,
            'producto_id' => $request->producto_id,
            'cantidad' => $request->cantidad,
            'precio' => $request->precio,
        ]);

        return redirect()->route('ventasp.index')->with('success', 'Venta registrada correctamente.');
    }
}
