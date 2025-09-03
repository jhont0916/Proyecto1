<nav class="flex justify-between items-center px-6 py-4 bg-gradient-to-r from-green-600 to-yellow-500">
    <!-- Logo -->
    <div class="flex items-center space-x-2">
        <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-8 w-8">
        <span class="text-white font-bold">AgroCatatumbo</span>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/estilos.css')}}">
    </div>

    <!-- Links -->
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

    <!-- Usuario -->
    <div>
        @auth
            <div class="flex items-center space-x-2">
                <img class="h-8 w-8 rounded-full object-cover"
                    src="{{ Auth::user()->profile_photo_path 
                            ? asset('storage/' . Auth::user()->profile_photo_path) 
                            : 'https://ui-avatars.com/api/?name=' . urlencode(Auth::user()->name) }}" 
                    alt="{{ Auth::user()->name }}">
                <span class="text-white">{{ Auth::user()->name }}</span>
                <a href="{{ route('dashboard') }}" class="ml-3 bg-white text-green-700 px-3 py-1 rounded">Dashboard</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="ml-2 text-white underline">Salir</button>
                </form>
            </div>
        @else
            <a href="{{ route('login') }}" class="text-white">Acceso</a>
            <a href="{{ route('register') }}" class="ml-4 bg-green-700 text-white px-3 py-1 rounded">Registro</a>
        @endauth
    </div>
</nav>
