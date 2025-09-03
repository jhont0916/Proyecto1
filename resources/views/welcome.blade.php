<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>AgroCatatumbo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/estilos.css')}}">
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
<video autoplay muted loop id="videoFondo">
   <source src="{{ asset('assets/frutas.mp4') }}" type="video/mp4">

  
</video>
<div class="content">
  <div class="info-wrapper">
    <div class="info">
      <h1>Transformamos el agro con tecnología</h1>
      <p>"Conecta directamente con productores del Catatumbo. Compra productos agrícolas y pecuarios sin intermediarios, de forma rápida y segura."</p>
      <a href="{{ route('productos') }}" class="btncompra">¡COMPRA YA!</a>
    </div>
  </div>
</div>
</div> <!-- Cierra .landing-page -->

<!-- NUEVA SECCIÓN: Beneficios en fondo blanco -->
<section class="info-extra py-5">
  <div class="container">
    <h2 class="text-center mb-4">¿Qué puedes encontrar en esta plataforma?</h2>
    <p class="text-center mb-5">Brindamos acceso directo a productos del campo sin intermediarios, garantizando calidad, frescura y precio justo.</p>

    <div class="row text-center">
      <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
        <img src="{{ asset('assets/imagen3.jpg') }}" alt="Icono 1" class="icono mb-3">
        <h3>Calidad Garantizada</h3>
        <p>Productos agrícolas y pecuarios frescos, seleccionados directamente del Catatumbo.</p>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
        <img src="{{ asset('assets/imagen2.jpg') }}" alt="Icono 2" class="icono mb-3">
        <h3>Conexión Directa</h3>
        <p>Conecta sin intermediarios con productores de la región para compras rápidas y seguras.</p>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
        <img src="{{ asset('assets/imagen1.jpg') }}" alt="Icono 3" class="icono mb-3">
        <h3>Apoyo Local</h3>
        <p>Fomentamos el desarrollo económico del Catatumbo a través del comercio justo.</p>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
        <img src="{{ asset('assets/imagen1.jpg') }}" alt="Icono 4" class="icono mb-3">
        <h3>Precios Justos</h3>
        <p>Eliminamos intermediarios para asegurar precios equitativos para productores y accesibles para los consumidores.</p>
      </div>
    </div>
  </div>
  <section class="galeria py-5">
  <div class="container text-center">
    <h2>Conoce nuestros productos</h2>
    <div class="row">
      <div class="col-md-3 col-6 mb-4">
        <div class="card-galeria">
          <img src="{{ asset('assets/imagen4 (1).jpg') }}" class="img-fluid">
        </div>
      </div>
      <div class="col-md-3 col-6 mb-4">
        <div class="card-galeria">
          <img src="{{ asset('assets/imagen4 (2).jpg') }}" class="img-fluid">
        </div>
      </div>
      <div class="col-md-3 col-6 mb-4">
        <div class="card-galeria">
          <img src="{{ asset('assets/imagen4 (3).jpg') }}" class="img-fluid">
        </div>
      </div>
      <div class="col-md-3 col-6 mb-4">
        <div class="card-galeria">
          <img src="{{ asset('assets/imagen4 (4).jpg') }}" class="img-fluid">
      </div>
    </div>
  </div>

  <section class="faq py-5 bg-light">
  <div class="container">
    <h2 class="text-center">Preguntas Frecuentes</h2>
    <div class="accordion mt-4" id="faqAccordion">
      <div class="accordion-item">
        <h2 class="accordion-header" id="faq1">
          <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#respuesta1">
            ¿Cómo me registro como comprador?
          </button>
        </h2>
        <div id="respuesta1" class="accordion-collapse collapse show">
          <div class="accordion-body">
            Solo necesitas hacer clic en "Registro" y llenar tus datos.
          </div>
        </div>
      </div>
      <div class="accordion-item">
        <h2 class="accordion-header" id="faq2">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#respuesta2">
            ¿Qué medios de pago aceptan?
          </button>
        </h2>
        <div id="respuesta2" class="accordion-collapse collapse">
          <div class="accordion-body">
            Aceptamos transferencias, PSE, tarjetas de débito y crédito.
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

</section>

</section>



      
<section class="servicios">
  <div class="container text-center">
    <h2>¿Qué te ofrecemos?</h2>
    <div class="row mt-4">
      <div class="col-md-4">
         <i class="bi bi-bag-check icono"></i>
        <h4>Comercio Directo</h4>
        <p>Compra sin intermediarios directamente a productores agrícolas y pecuarios del Catatumbo.</p>
      </div>
      <div class="col-md-4">
        <i class="bi bi-shield-check icono"></i>
        <h4>Pago Seguro</h4>
        <p>Realiza tus compras con total seguridad y respaldo.</p>
      </div>
      <div class="col-md-4">
        <i class="bi bi-person-heart icono"></i>
        <h4>Apoyo a Productores</h4>
        <p>Impulsa la economía local comprando directamente a agricultores y ganaderos del Catatumbo.</p>
      </div>
    </div>
  </div>
</section>
</section>
<section class="testimonios py-5 bg-light">
  <div class="container text-center">
    <h2>Lo que dicen nuestros usuarios</h2>
    <div class="row mt-4">
      <div class="col-md-4">
        <blockquote>"Excelente calidad y entrega rápida. ¡Recomiendo AgroCatatumbo al 100%!"</blockquote>
        <p><strong>- María López</strong></p>
      </div>
      <div class="col-md-4">
        <blockquote>"Muy fácil de usar, pude contactar productores directamente."</blockquote>
        <p><strong>- Juan Rodríguez</strong></p>
      </div>
      <div class="col-md-4">
        <blockquote>"Una gran plataforma para apoyar a los agricultores de la región."</blockquote>
        <p><strong>- Carolina Pérez</strong></p>
      </div>
    </div>
  </div>
  <footer class="bg-dark text-white py-4">
  <div class="container text-center">
    <p>&copy; 2025 AgroCatatumbo - Todos los derechos reservados.</p>
    <p>Síguenos:
      <a href="#" class="text-white mx-2"><i class="bi bi-facebook"></i></a>
      <a href="#" class="text-white mx-2"><i class="bi bi-instagram"></i></a>
      <a href="https://wa.me/573183307596?text=Hola%2C%20estoy%20interesado%20en%20conocer%20m%C3%A1s%20sobre%20AgroCatatumbo."  class="text-white mx-2" target="_blank" rel="noopener"><i class="bi bi-whatsapp"></i></a>
    </p>
  </div>
</footer>

</section>

      
      <!-- End Landing Page -->
      
</body>
</html>