<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
          rel="stylesheet" 
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" 
          crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/estilodashboard.css')}}">
</head>
 <!-- Start Landing Page -->
    <div class="landing-page">
        <header>
            <div class="container">
                <div class="grupo-logo">
                    <img src="{{ asset('assets/Jhon Agro 1.png') }}" class="logo">
                    <span class="nombre-sitio">AgroCatatumbo</span>
                </div>
                <ul class="links">
                    <li><a href="{{ route('casa') }}">Inicio</a></li>
                    <li><a href="{{ route('productos') }}">Productos</a></li>
                    <li><a href="{{ route('sobrenosotros') }}">Sobre Nosotros</a></li>
                    <li><a href="{{ route('contacto') }}">Contacto</a></li>
                    <li><a href="{{ route('testimonios') }}">Testimonios</a></li>
                    <li><a href="{{ route('login') }}">Acceso</a></li>
                    <li><a href="{{ route('register') }}">Registro</a></li>
                </ul>
            </div>
        </header>
    </div>

    <div class="container-fluid mt-4">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-3 col-lg-2 mb-4">
            <div class="list-group">
    <a href="{{ route('dashboard') }}" 
       class="list-group-item list-group-item-action {{ request()->routeIs('dashboard') ? 'active' : '' }}">
       <i class="bi bi-speedometer2"></i>
       Mi Dashboard
    </a>

    <a href="{{ route('productos.create') }}" 
       class="list-group-item list-group-item-action {{ request()->routeIs('productos.create') ? 'active' : '' }}">
       <i class="bi bi-plus-circle"></i>
       Subir Producto
    </a>

    <a href="{{ route('ventasp.index') }}" 
       class="list-group-item list-group-item-action {{ request()->routeIs('ventasp.index') ? 'active' : '' }}">
       <i class="bi bi-bag"></i> 
       Ventas
    </a>
                <a href="{{ route('productor.configuracion') }}" class="list-group-item list-group-item-action">
                    <i class="bi bi-gear"></i> Configuración
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="list-group-item list-group-item-action text-danger">
                        <i class="bi bi-box-arrow-right"></i> Cerrar Sesión
                    </button>
                </form>
            </div>
        </div>

        <!-- Contenido principal -->
        <div class="col-md-9 col-lg-10">
            <!-- Resumen -->
            <h3 class="mb-4">📊 Resumen</h3>
            <div class="row mb-4">
                <div class="col-md-4">
                    <div class="card text-center shadow-sm border-0">
                        <div class="card-body">
                            <h5>Total Ventas</h5>
                            <h3 class="text-success">{{ $ventas->count() }}</h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-center shadow-sm border-0">
                        <div class="card-body">
                            <h5>Ventas</h5>
                            <h3 class="text-primary">0</h3> <!-- Aquí puedes poner tu variable de ventas -->
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-center shadow-sm border-0">
                        <div class="card-body">
                            <h5>Ingresos</h5>
                            <h3 class="text-warning">$0</h3> <!-- Aquí puedes poner tu variable de ingresos -->
                        </div>
                    </div>
                </div>
            </div>
           <div class="container">
    <h1 class="mb-4">Gestión de Ventas</h1>

    {{-- Resumen de ventas --}}
    <div class="row mb-4">
        <div class="col-md-6">
            <div class="card text-center shadow-sm border-0">
                <div class="card-body">
                    <h5>Total Ventas Registradas</h5>
                    <h3 class="text-success">{{ $ventas->count() }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card text-center shadow-sm border-0">
                <div class="card-body">
                    <h5>Última Venta</h5>
                    @if($ventas->count() > 0)
                        <h3 class="text-primary">{{ $ventas->last()->created_at->format('d/m/Y H:i') }}</h3>
                    @else
                        <h3 class="text-muted">Sin registros</h3>
                    @endif
                </div>
            </div>
        </div>
    </div>

    {{-- Botón para crear nueva venta --}}
    <div class="mb-3">
        <a href="{{ route('ventasp.create') }}" class="btn btn-success">Registrar Nueva Venta</a>
    </div>

    {{-- Tabla de ventas --}}
    <div class="card shadow-sm">
        <div class="card-body">
            <h5 class="card-title">Listado de Ventas</h5>
            <table class="table table-bordered table-hover mt-3">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Precio</th>
                        <th>Total</th>
                        <th>Fecha</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($ventas as $venta)
                        <tr>
                            <td>{{ $venta->id }}</td>
                            <td>{{ $venta->producto->nombre ?? 'No asignado' }}</td>
                            <td>{{ $venta->cantidad }}</td>
                            <td>${{ number_format($venta->precio, 0, ',', '.') }}</td>
                            <td>${{ number_format($venta->cantidad * $venta->precio, 0, ',', '.') }}</td>
                            <td>{{ $venta->created_at->format('d/m/Y H:i') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted">No hay ventas registradas.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>