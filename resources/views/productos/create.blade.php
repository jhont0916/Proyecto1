<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/estilodashboard.css')}}">
    <title>Subir Producto</title>
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

    <!-- Contenido -->
    <div class="col-md-9">
        <h2>Subir Nuevo Producto</h2>
        <form action="{{ route('productos.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre del producto</label>
                <input type="text" name="nombre" class="form-control" required placeholder="Ej. Tomates frescos">
            </div>
            <div class="mb-3">
                <label for="imagen" class="form-label">Foto del producto</label>
                <input type="file" name="imagen" class="form-control">
            </div>
            <div class="mb-3">
                <label for="precio" class="form-label">Precio</label>
                <input type="number" name="precio" class="form-control" required placeholder="Ej. 5000">
            </div>
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <textarea name="descripcion" class="form-control" rows="3" placeholder="Describe tu producto..."></textarea>
            </div>
            <button type="submit" class="btn btn-success">Subir Producto</button>
            <a href="{{ route('dashboard') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>
