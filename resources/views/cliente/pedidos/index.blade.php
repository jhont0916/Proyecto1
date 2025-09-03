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
    <link rel="stylesheet" href="{{ asset('assets/dashboard-cliente.css')}}">
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
                    <li><a href="{{ route('cliente.dashboard') }}">Acceso</a></li>
                    <li><a href="{{ route('register') }}">Registro</a></li>
                </ul>
            </div>
        </header>
    </div>
<div class="container-fluid my-4">
    <div class="row">
        <!-- Sidebar del Cliente -->
        <div class="col-md-3">
            <div class="list-group shadow-sm">
                <a href="{{ route('cliente.dashboard') }}" class="list-group-item list-group-item-action active">
                    <i class="bi bi-house"></i> Inicio
                </a>
                <a href="{{ route('productos') }}" class="list-group-item list-group-item-action">
                    <i class="bi bi-basket"></i> Catálogo de Productos
                </a>
                <a href="{{ route('cliente.pedidos') }}" class="list-group-item list-group-item-action">
                    <i class="bi bi-bag-check"></i> Mis Pedidos
                </a>
                <a href="{{ route('profile.edit') }}" class="list-group-item list-group-item-action">
                    <i class="bi bi-person-circle"></i> Mi Perfil
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
        <div class="col-md-9">
            <h3 class="mb-4">Bienvenido {{ Auth::user()->name }}</h3>
             <!-- Resumen de cliente -->
            <div class="row mb-4">
                <div class="col-md-4">
                    <div class="card shadow-sm text-center">
                        <div class="card-body">
                            <i class="bi bi-basket fs-1 text-success"></i>
                            <h5 class="mt-2">Productos Disponibles</h5>
                            <h3>{{ $productosCount ?? 0 }}</h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card shadow-sm text-center">
                        <div class="card-body">
                            <i class="bi bi-bag-check fs-1 text-primary"></i>
                            <h5 class="mt-2">Mis Pedidos</h5>
                            <h3>{{ $pedidosCount ?? 0 }}</h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card shadow-sm text-center">
                        <div class="card-body">
                            <i class="bi bi-cash-coin fs-1 text-warning"></i>
                            <h5 class="mt-2">Gastos Totales</h5>
                            <h3>${{ number_format($gastosTotales ?? 0, 0) }}</h3>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container mt-4">
     <h3>Mis Pedidos</h3>
    <a href="{{ route('cliente.pedidos.create') }}" class="btn btn-primary mb-3">+ Registrar Pedido</a>
    <hr>

    @if($pedidos->isEmpty())
        <p>No tienes pedidos aún.</p>
    @else
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID Pedido</th>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Estado</th>
                    <th>Fecha</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pedidos as $pedido)
                <tr>
                    <td>{{ $pedido->id }}</td>
                    <td>{{ $pedido->producto->nombre ?? 'N/A' }}</td>
                    <td>{{ $pedido->cantidad }}</td>
                    <td>{{ $pedido->estado }}</td>
                    <td>{{ $pedido->created_at->format('d-m-Y') }}</td>
                    <td>
                        <a href="{{ route('cliente.pedidos.edit', $pedido) }}" class="btn btn-sm btn-warning">Editar</a>
                        <form action="{{ route('cliente.pedidos.destroy', $pedido) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Seguro que deseas eliminar este pedido?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
        </div>
    </div>