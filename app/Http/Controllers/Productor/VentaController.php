<?php

namespace App\Http\Controllers\Productor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Venta;
use App\Models\Producto;

class VentaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); // el productor debe estar logueado
    }

    public function index()
    {
        // Ventas de productos cuyo dueño es el productor autenticado
        $ventas = Venta::with(['producto', 'cliente'])
            ->whereHas('producto', function ($q) {
                $q->where('user_id', auth()->id());
            })
            ->latest()
            ->get();

        // Productos del productor autenticado
        $productos = Producto::where('user_id', auth()->id())->get();

        // Métricas rápidas (para las cards de tu dashboard)
        $totalVentas = $ventas->count();
        $ingresos = $ventas->sum('total');
        $totalProductos = $productos->count();

        return view('productor.ventas.index', compact(
            'ventas',
            'productos',
            'totalVentas',
            'ingresos',
            'totalProductos'
        ));
    }

    public function store(Request $request, Producto $producto)
    {
        $request->validate([
            'cantidad' => ['required', 'integer', 'min:1'],
        ]);

        // Precio del momento
        $precioUnitario = $producto->price;

        Venta::create([
            'cliente_id'      => auth()->id(),
            'producto_id'     => $producto->id,
            'cantidad'        => $request->cantidad,
            'precio_unitario' => $precioUnitario,
            'total'           => $precioUnitario * $request->cantidad,
            'estado'          => 'pagado',
        ]);

        return back()->with('success', '✅ Compra realizada con éxito');
    }
}
