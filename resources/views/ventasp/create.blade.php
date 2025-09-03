<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Registrar Venta</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
          rel="stylesheet" 
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" 
          crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/estilodashboard.css')}}">
</head>
<body>
    <!-- Encabezado -->
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
                <h2>Registrar Venta</h2>

                <form action="{{ route('ventasp.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Cliente</label>
                        <input type="text" name="cliente" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Producto</label>
                        <select name="producto_id" class="form-control" required>
                            <option value="">Seleccione un producto</option>
                            @foreach($productos as $producto)
                                <option value="{{ $producto->id }}">{{ $producto->nombre }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Cantidad</label>
                        <input type="number" name="cantidad" class="form-control" required min="1">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Precio</label>
                        <input type="number" step="0.01" name="precio" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-success">Guardar</button>
                    <a href="{{ route('ventasp.index') }}" class="btn btn-secondary">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
