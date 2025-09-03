<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;
use App\Models\Producto;
use App\Models\User;

class ClientePedidoController extends Controller
{
    public function index()
    {
        $pedidos = Pedido::where('user_id', auth()->id())->get();
        return view('cliente.pedidos.index', compact('pedidos'));
    }

    public function create()
    {
        $productos = Producto::all();
        return view('cliente.pedidos.create', compact('productos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'producto_id' => 'required|exists:productos,id',
            'cantidad' => 'required|integer|min:1',
        ]);

        Pedido::create([
            'user_id' => auth()->id(),
            'producto_id' => $request->producto_id,
            'cantidad' => $request->cantidad,
            'estado' => 'Pendiente',
        ]);

        return redirect()->route('cliente.pedidos')->with('success', 'Pedido registrado correctamente.');
    }

    public function edit(Pedido $pedido)
    {
        $this->authorizePedido($pedido);

        $productos = Producto::all();
        return view('cliente.pedidos.edit', compact('pedido', 'productos'));
    }

    public function update(Request $request, Pedido $pedido)
    {
        $this->authorizePedido($pedido);

        $request->validate([
            'producto_id' => 'required|exists:productos,id',
            'cantidad' => 'required|integer|min:1',
        ]);

        $pedido->update([
            'producto_id' => $request->producto_id,
            'cantidad' => $request->cantidad,
        ]);

        return redirect()->route('cliente.pedidos')->with('success', 'Pedido actualizado correctamente.');
    }

    public function destroy(Pedido $pedido)
    {
        $this->authorizePedido($pedido);

        $pedido->delete();

        return redirect()->route('cliente.pedidos')->with('success', 'Pedido eliminado correctamente.');
    }

    private function authorizePedido(Pedido $pedido)
    {
        if ($pedido->user_id !== auth()->id()) {
            abort(403, 'No autorizado.');
        }
    }
}
