<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductoController;
use Illuminate\Support\Facades\Route;
use App\Models\Producto;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ClienteDashboardController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Productor\VentaController as ProductorVentaController;
use App\Http\Controllers\VentaspController;
use App\Http\Controllers\Productor\ConfigController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\ProductorController;
use App\Http\Controllers\ClientePedidoController;
use App\Http\Controllers\ClienteController;



// Página principal (inicio)
Route::get('/', function () {
    return view('welcome');
})->name('casa');

// ---- Compra del cliente ----
Route::post('/comprar/{producto}', [VentaController::class, 'store'])
    ->middleware('auth')
    ->name('ventas.store');

// ---- Dashboard del productor: listado de ventas ----
Route::get('/dashboard/ventas', [ProductorVentaController::class, 'index'])
    ->middleware('auth')
    ->name('productor.ventas.index');

// Dashboard productor
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth'])
    ->name('dashboard');

// Dashboard cliente
Route::get('/cliente/dashboard', [ClienteDashboardController::class, 'index'])
    ->middleware(['auth'])
    ->name('cliente.dashboard');



// Listar productos (público)
Route::get('/productos', [ProductoController::class, 'index'])->name('productos.index');

// Ver detalle de un producto
Route::get('/productos/{id}', [ProductoController::class, 'show'])->name('productos.show');


Route::get('/productos', [ProductoController::class, 'index'])->name('productos');


// Páginas estáticas
Route::view('/contacto', 'contacto')->name('contacto');
Route::view('/testimonios', 'testimonios')->name('testimonios');
Route::view('/sobrenosotros', 'sobrenosotros')->name('sobrenosotros');

Route::get('/ventasp', [VentaspController::class, 'index'])->name('ventasp.index');
Route::get('/ventasp/create', [VentaspController::class, 'create'])->name('ventasp.create');
Route::post('/ventasp', [VentaspController::class, 'store'])->name('ventasp.store');



// Rutas protegidas (requieren login)
Route::middleware('auth')->group(function () {



    // Perfil del cliente
    Route::put('/cliente/update',   [ClienteController::class, 'update'])->name('cliente.update');
    Route::delete('/cliente/destroy',[ClienteController::class, 'destroy'])->name('cliente.destroy');
 
      Route::get('/productor/configuracion', [ProductorController::class, 'edit'])->name('productor.configuracion');
    Route::put('/productor/configuracion', [ProductorController::class, 'update'])->name('productor.update');
    Route::delete('/productor/eliminar', [ProductorController::class, 'destroy'])->name('productor.destroy');

//ruta de pedidos del cliente
      Route::get('/cliente/pedidos', [ClientePedidoController::class, 'index'])->name('cliente.pedidos');
    Route::get('/cliente/pedidos/crear', [ClientePedidoController::class, 'create'])->name('cliente.pedidos.create');
    Route::post('/cliente/pedidos', [ClientePedidoController::class, 'store'])->name('cliente.pedidos.store');
    Route::get('/cliente/pedidos/{pedido}/editar', [ClientePedidoController::class, 'edit'])->name('cliente.pedidos.edit');
    Route::put('/cliente/pedidos/{pedido}', [ClientePedidoController::class, 'update'])->name('cliente.pedidos.update');
    Route::delete('/cliente/pedidos/{pedido}', [ClientePedidoController::class, 'destroy'])->name('cliente.pedidos.destroy');

  // Ruta de Ventas
Route::get('/ventas', [ProductorVentaController::class, 'index'])->name('ventas');

    // Perfil
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    



    // CRUD de productos
    
    Route::get('/dashboard/productos', [ProductoController::class, 'index'])->name('productos.index');
    Route::get('/dashboard/productos/create', [ProductoController::class, 'create'])->name('productos.create');
    Route::post('/dashboard/productos', [ProductoController::class, 'store'])->name('productos.store');
    Route::get('/dashboard/productos/{producto}/edit', [ProductoController::class, 'edit'])->name('productos.edit');
    Route::put('/dashboard/productos/{producto}', [ProductoController::class, 'update'])->name('productos.update');
    Route::delete('/dashboard/productos/{producto}', [ProductoController::class, 'destroy'])->name('productos.destroy');
});

require __DIR__.'/auth.php';
