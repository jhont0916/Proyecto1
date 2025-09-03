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
       class="list-group-item list-group-item-action {{ request()->routeIs('ventas') ? 'active' : '' }}">
       <i class="bi bi-bag"></i> 
       Ventas
    </a>
                <a href="{{ route('productor.configuracion') }}" class="list-group-item list-group-item-action {{ request()->routeIs('productor.configuracion') ? 'active' : '' }}">
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

    <div class="card mb-4">
        <div class="card-body">
            <form action="{{ route('productor.update') }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Nombre</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name', $productor->name) }}" required>
                </div>
                <div class="mb-3">
               <label class="form-label">Número de WhatsApp</label>
               <input type="text" name="telefono" class="form-control"
                value="{{ old('telefono', $productor->telefono) }}"
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

    <div class="card border-danger">
        <div class="card-body">
            <h5 class="card-title text-danger">Eliminar cuenta</h5>
            <p class="card-text">Al eliminar tu cuenta se borrarán los datos asociados. Acción irreversible.</p>

            <form action="{{ route('productor.destroy') }}" method="POST" onsubmit="return confirm('¿Seguro que deseas eliminar tu cuenta? Esta acción no se puede deshacer.');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Eliminar Cuenta</button>
            </form>
        </div>
    </div>
</div>