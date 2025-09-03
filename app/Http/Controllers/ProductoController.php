<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductoController extends Controller
{

    public function show($id)
{
    $producto = Producto::findOrFail($id);
    return view('productos.show', compact('producto'));
}
   
    // 📌 Listado público de productos
    public function index()
    {
        $productos = Producto::all();
        return view('productos', compact('productos'));
    }

    // 📌 Mostrar formulario de creación
    public function create()
    {
        return view('productos.create');
    }

    // 📌 Guardar producto en la BD
    public function store(Request $request)
{
    $request->validate([
        'nombre' => 'required|string|max:255',
        'descripcion' => 'nullable|string',
        'precio' => 'required|numeric',
        'imagen' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    $producto = new Producto();
    $producto->nombre = $request->nombre;
    $producto->descripcion = $request->descripcion;
    $producto->precio = $request->precio;
    $producto->user_id = Auth::id();

    if ($request->hasFile('imagen')) {
        $rutaImagen = $request->file('imagen')->store('productos', 'public');
        $producto->imagen = $rutaImagen; // 🔑 Guardar la ruta en la BD
    }

    $producto->save();

    // 👇 Ojo con el nombre de la ruta
    return redirect()->route('productos.index')->with('success', 'Producto creado con éxito.');
}


    // 📌 Mostrar formulario de edición
    public function edit(Producto $producto)
    {
       
    return view('productos.edit', compact('producto'));
    }

    // 📌 Actualizar producto
    public function update(Request $request, Producto $producto)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'precio' => 'required|numeric',
            'descripcion' => 'required|string',
            'imagen' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $producto->nombre = $request->nombre;
        $producto->precio = $request->precio;
        $producto->descripcion = $request->descripcion;

        if ($request->hasFile('imagen')) {
            if ($producto->imagen) {
                Storage::disk('public')->delete($producto->imagen);
            }
            $producto->imagen = $request->file('imagen')->store('productos', 'public');
        }

        $producto->save();

        return redirect()->route('productos.index')->with('success', 'Producto actualizado correctamente.');
    }

    // 📌 Eliminar producto
    public function destroy(Producto $producto)
    {
        if ($producto->imagen) {
            Storage::disk('public')->delete($producto->imagen);
        }
        $producto->delete();

        return redirect()->route('productos.index')->with('success', 'Producto eliminado correctamente.');
    }
}
