<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto</title>
    <link rel="stylesheet" href="{{ asset('assets/estiloscontacto.css')}}">
</head>


<body>
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
   <source src="{{ asset('assets/video3.mp4') }}" type="video/mp4">

  
</video>
</div>
    <section class="form_wrap">

        <section class="cantact_info">
            <section class="info_title">
                <span class="fa fa-user-circle"></span>
                <h2>INFORMACION<br>DE CONTACTO</h2>
            </section>
            <section class="info_items">
                <p><span class="fa fa-envelope"></span> AgroCatatumbo@gmail.com</p>
                <p><span class="fa fa-mobile"></span> +57(585) 902-8665</p>
            </section>
        </section>

        <form action="" class="form_contact">
            <h2>Envia un mensaje</h2>
            <div class="user_info">
                <label for="names">Nombres *</label>
                <input type="text" id="names">

                <label for="phone">Telefono / Celular</label>
                <input type="text" id="phone">

                <label for="email">Correo electronico *</label>
                <input type="text" id="email">

                <label for="mensaje">Mensaje *</label>
                <textarea id="mensaje"></textarea>

                <input type="button" value="Enviar Mensaje" id="btnSend">
            </div>
        </form>

    </section>

</body>
</html>