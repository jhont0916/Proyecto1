<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Sobre Nosotros</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/estilossobrenosotros.css')}}">
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
        
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

<section class="header-sobre-nosotros">
  <div class="contenido-header">
    <h1>Sobre Nosotros</h1>
    <p>En AgroCatatumbo conectamos a productores del campo con consumidores conscientes que valoran la frescura, calidad y el comercio justo.</p>
  </div>
</section>

<section class="contenido-sobre-nosotros">
  <div class="bloque">
    <i class="bi bi-globe-americas icono"></i>
    <h2>Nuestra Misión</h2>
    <p>Promover el desarrollo rural sostenible, empoderar a los campesinos del Catatumbo y ofrecer productos frescos directamente desde la finca al hogar.</p>
  </div>

  <div class="bloque">
    <i class="bi bi-globe-americas icono"></i>
    <h2>Nuestra Visión</h2>
    <p>Convertirnos en la plataforma líder de comercio justo agropecuario en Colombia, fortaleciendo el vínculo entre el campo y la ciudad.</p>
  </div>
</section>

<section class="galeria-nosotros">
  <h2>Conectados al Campo</h2>
  <div class="imagenes">
    <img src="{{ asset('assets/imagen1.jpg') }}" alt="Tomates frescos">
    <img src="{{ asset('assets/imagen2.jpg') }}" alt="Agricultora con verduras">
    <img src="{{ asset('assets/imagen3.jpg') }}" alt="Productores en campo">
  </div>
  <a href="{{ route('contacto') }}" class="btn-contacto">Contáctanos</a>

</section>

</body>
</html>