<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/estilodashboard.css')}}">

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">

        <!-- ✅ Navbar AgroCatatumbo -->
        <nav class="navbar navbar-expand-lg" style="background: linear-gradient(to right, #4CAF50, #FFD700);">
            <div class="container-fluid">
                <a class="navbar-brand text-white fw-bold" href="{{ route('casa') }}">
                    AgroCatatumbo
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link text-white" href="{{ route('casa') }}">Inicio</a></li>
                        <li class="nav-item"><a class="nav-link text-white" href="{{ route('productos') }}">Productos</a></li>
                        <li class="nav-item"><a class="nav-link text-white" href="{{ route('sobrenosotros') }}">Sobre Nosotros</a></li>
                        <li class="nav-item"><a class="nav-link text-white" href="{{ route('contacto') }}">Contacto</a></li>
                        <li class="nav-item"><a class="nav-link text-white" href="{{ route('testimonios') }}">Testimonios</a></li>

                        @auth
                            <li class="nav-item"><a class="nav-link text-white" href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="nav-item">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button class="btn btn-link nav-link text-white" type="submit">Salir</button>
                                </form>
                            </li>
                        @else
                            <li class="nav-item"><a class="nav-link text-white" href="{{ route('login') }}">Acceso</a></li>
                            <li class="nav-item"><a class="nav-link text-white" href="{{ route('register') }}">Registro</a></li>
                        @endauth
                    </ul>
                </div>
            </div>
        </nav>
        <!-- ✅ Fin Navbar -->

        <!-- Page Heading -->
        @isset($header)
            <header class="bg-white dark:bg-gray-800 shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endisset

        <!-- Page Content -->
        <main>
            @yield('content')
        </main>
    </div>
</body>
</html>
