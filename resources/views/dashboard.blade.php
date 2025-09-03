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
            <div class="list-group shadow-sm rounded">
                <a href="{{ route('dashboard') }}" class="list-group-item list-group-item-action active">
                    <i class="bi bi-speedometer2"></i> Mi Dashboard
                </a>
                <a href="{{ route('productos.create') }}" class="list-group-item list-group-item-action">
                    <i class="bi bi-plus-circle"></i> Subir Producto
                </a>
                <a href="{{ route('ventasp.index') }}" class="list-group-item list-group-item-action">
                    <i class="bi bi-bag"></i> Ventas
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
                            <h5>Total Productos</h5>
                            <h3 class="text-success">{{ $productos->count() }}</h3>
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

            <!-- Productos -->
            <h3 class="mb-3">📦 Mis Productos</h3>
            <div class="row">
                @forelse($productos as $producto)
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="card h-100 shadow-sm border-0">
                            @if($producto->imagen)
                                <img src="{{ asset('storage/'.$producto->imagen) }}" 
                                     class="card-img-top" 
                                     alt="{{ $producto->nombre }}" 
                                     style="height: 200px; object-fit: cover;">
                            @endif
                            <div class="card-body">
                                <h5 class="card-title">{{ $producto->nombre }}</h5>
                                <p class="card-text text-muted">{{ $producto->descripcion }}</p>
                                <p class="fw-bold text-success">${{ number_format($producto->precio, 0) }}</p>
                            </div>
                            <div class="card-footer bg-white d-flex justify-content-between">
                                <a href="{{ route('productos.edit', $producto->id) }}" class="btn btn-sm btn-warning">
                                    <i class="bi bi-pencil"></i> Editar
                                </a>
                                <form action="{{ route('productos.destroy', $producto->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <i class="bi bi-trash"></i> Eliminar
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="alert alert-info">Aún no has subido productos.</div>
                @endforelse
            </div>
        </div>
    </div>
</div>
