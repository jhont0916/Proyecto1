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
            <div class="container">
    <h2 class="mb-4">Configuración de Perfil</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Errores de validación --}}
    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Formulario de actualización del perfil --}}
    <div class="card mb-4">
        <div class="card-body">
            <form action="{{ route('cliente.update') }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Nombre</label>
                    <input type="text" name="name" class="form-control"
                        value="{{ old('name', Auth::user()->name) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Número de WhatsApp</label>
                    <input type="text" name="telefono" class="form-control"
                        value="{{ old('telefono', Auth::user()->telefono) }}"
                        placeholder="Ej: 573001234567">
                </div>

                <div class="mb-3">
                    <label class="form-label">Nueva contraseña <small class="text-muted">(opcional)</small></label>
                    <input type="password" name="password" class="form-control" autocomplete="new-password">
                </div>

                <div class="mb-3">
                    <label class="form-label">Confirmar contraseña</label>
                    <input type="password" name="password_confirmation" class="form-control" autocomplete="new-password">
                </div>

                <button type="submit" class="btn btn-success">Actualizar Perfil</button>
            </form>
        </div>
    </div>

    {{-- Eliminar cuenta --}}
    <div class="card border-danger">
        <div class="card-body">
            <h5 class="card-title text-danger">Eliminar cuenta</h5>
            <p class="card-text">Al eliminar tu cuenta se borrarán los datos asociados. Acción irreversible.</p>

            <form action="{{ route('cliente.destroy') }}" method="POST"
                onsubmit="return confirm('¿Seguro que deseas eliminar tu cuenta? Esta acción no se puede deshacer.');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Eliminar Cuenta</button>
            </form>
        </div>
    </div>
</div>

