<!doctype html>
<html lang="es">
    <head>
        <title>Inicio sesion</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous">
            <link rel="stylesheet" href="{{ asset('assets/estilos.css')}}">
        
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

        <section class="h-100 gradient-form" style="background-color: #eee;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-xl-10">
        <div class="card rounded-3 text-black">
          <div class="row g-0">
            <div class="col-lg-6">
              <div class="card-body p-md-5 mx-md-4">

                <div class="text-center">
                  <img src="{{ asset('assets/Jhon Agro 2.png')}}"
                    style="width: 185px;" alt="logo">
                  <h4 class="mt-1 mb-5 pb-1">Inicio Sesion</h4>
                </div>
                 <!-- Mensajes de error -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
                <form action="{{route('login')}}" method="post">
                   @csrf
                  <div data-mdb-input-init class="form-outline mb-4">
                    <label class="form-label" for="form2Example11">Correo</label>
                    <input type="email" name="email" id="form2Example11" class="form-control"
                      placeholder="Ingresar correo" />
                    
                  </div>

                  <div data-mdb-input-init class="form-outline mb-4">
                    <label class="form-label" for="form2Example22">Contraseña</label>
                    <input type="password" name="password" id="form2Example22" class="form-control" />
                    
                  </div>

                  <div class="text-center pt-1 mb-5 pb-1">
                    <button data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3" type="submit">Ingresar</button>
                    
                  </div>

                  <div class="d-flex align-items-center justify-content-center pb-4">
                    <p class="mb-0 me-2">¿No tienes una cuenta?</p>
                    <a href="{{route('register')}}" data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-danger">Crear cuenta</a>
                  </div>

                </form>

              </div>
            </div>
            <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
              <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                <img src="{{ asset('assets/Granja sin fondo.png')}}" class="img-fluid rounded-top" alt="fondo"
                />
                
                <h4 class="mb-4">Somos un enfoque en la transformacion digital</h4>
                <p class="small mb-0">Impulsamos el agro con tecnologia al alcance de todos,
                  Nuestra plataforma permite a agricultores y ganaderos comercializar sus productos de forma rapida, segura y desde 
                  sus propios territorios. Creemos en un futuro digital para el 
                  campo colombiano. 
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
        <!-- Bootstrap JavaScript Libraries -->
        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
