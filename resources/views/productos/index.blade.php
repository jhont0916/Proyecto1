<!DOCTYPE html>
<html lang="en">
  
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
          rel="stylesheet" 
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" 
          crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/estilosproductos.css')}}">
</head>

<body>
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

    <!-- Carrusel fuera del container -->
    <div class="container-fluid p-0">
        <div id="carouselAgro" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('assets/carrusel1.jpg') }}" class="d-block w-100 banner-carousel" alt="Banner 1">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('assets/carrusel5.jpg') }}" class="d-block w-100 banner-carousel" alt="Banner 2">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('assets/carrusel4.jpg') }}" class="d-block w-100 banner-carousel" alt="Banner 3">
                </div>
            </div>
            <!-- Controles -->
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselAgro" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Anterior</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselAgro" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Siguiente</span>
            </button>
        </div>
    </div>

    <!-- Sección categorías -->
    <div class="container-fluid py-5 px-4 bg-light">
        <h4 class="mb-4 fw-bold">Explorar categorías</h4>
        <div class="row g-3">
            <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                <div class="categoria-card" style="background-image: url('{{ asset('assets/frutas.jpg') }}');">
                    <span>Frutas</span>
                </div>
            </div>
            <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                <div class="categoria-card" style="background-image: url('{{ asset('assets/verduras.jpg') }}');">
                    <span>Verduras</span>
                </div>
            </div>
            <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                <div class="categoria-card" style="background-image: url('{{ asset('assets/lacteos.jpg') }}');">
                    <span>Lácteos</span>
                </div>
            </div>
            <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                <div class="categoria-card" style="background-image: url('{{ asset('assets/legumbres.jpg') }}');">
                    <span>Legumbres y granos</span>
                </div>
            </div>
            <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                <div class="categoria-card" style="background-image: url('{{ asset('assets/carne.jpg') }}');">
                    <span>Carne y proteína animal</span>
                </div>
            </div>
            <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                <div class="categoria-card" style="background-image: url('{{ asset('assets/huevos.jpg') }}');">
                    <span>Huevos</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Sección de productos -->
    <div class="container-fluid py-4">
        <div class="row">
            <!-- Filtros -->
            <div class="col-md-3 filtros">
                <h5><i class="bi bi-funnel-fill"></i> Filtrar por</h5>
                <hr>
                <h6 class="fw-bold">Categoría</h6>
                <!-- aquí puedes luego poner filtros dinámicos -->
            </div>
<div class="container mt-5">
    <h2>Catálogo de Productos</h2>
    <div class="row">
        @forelse($productos as $producto)
            <div class="col-md-4 mb-3">
                <div class="card">
                    @if($producto->imagen)
                        <img src="{{ asset('storage/'.$producto->imagen) }}" class="card-img-top" alt="{{ $producto->nombre }}">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $producto->nombre }}</h5>
                        <p class="card-text">{{ $producto->descripcion }}</p>
                        <p><strong>${{ number_format($producto->precio, 0) }}</strong></p>
                    </div>
                </div>
            </div>
        @empty
            <p>No hay productos disponibles.</p>
        @endforelse
    </div>
</div>

