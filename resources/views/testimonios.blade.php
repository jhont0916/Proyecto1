<!DOCTYPE html>
<html lang="en">

<body>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Testimonios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/estilostestimonios.css')}}">
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
    </div>
    <div class="testimonial-container">
        <div class="testimonial-header">
            <h2 class="testimonial-title">⭐ Comparte tu Experiencia</h2>
            <p class="testimonial-subtitle">Tu opinión es muy valiosa para nosotros</p>
            <p class="testimonial-description">Ayuda a otros clientes conociendo tu experiencia detallada con nuestros servicios</p>
        </div>

        <form id="testimonialForm" class="form-content">
            <div class="error-message" id="errorMessage"></div>
            
            <div class="form-group">
                <label for="nombre">👤 Tu Nombre Completo</label>
                <input type="text" id="nombre" name="nombre" required placeholder="Ej: Juan Carlos Pérez">
            </div>

            <div class="form-group">
                <label for="empresa">🏢 Nombre de tu Empresa</label>
                <input type="text" id="empresa" name="empresa" required placeholder="Ej: Innovación Digital SAC">
            </div>

            <div class="form-group">
                <label for="cargo">💼 Tu Cargo en la Empresa</label>
                <input type="text" id="cargo" name="cargo" required placeholder="Ej: Gerente de Marketing">
            </div>

            <div class="form-group">
                <label for="testimonio">💬 Tu Testimonio</label>
                <textarea id="testimonio" name="testimonio" rows="4" required placeholder="Cuéntanos sobre tu experiencia completa con nosotros. ¿Qué te gustó más? ¿Cómo te ayudamos a alcanzar tus objetivos?"></textarea>
            </div>

            <!-- Satisfacción del Cliente -->
            <div class="rating-section">
                <label class="rating-title">⭐ Satisfacción del Cliente</label>
                <span class="rating-description">¿Sentiste que entendimos tus necesidades y entregamos un resultado que cumplió tus expectativas?</span>
                <div class="stars-wrapper">
                    <span class="stars" data-category="satisfaccion" data-rating="1">★</span>
                    <span class="stars" data-category="satisfaccion" data-rating="2">★</span>
                    <span class="stars" data-category="satisfaccion" data-rating="3">★</span>
                    <span class="stars" data-category="satisfaccion" data-rating="4">★</span>
                    <span class="stars" data-category="satisfaccion" data-rating="5">★</span>
                </div>
                <div class="rating-feedback" id="satisfaccionFeedback"></div>
                <input type="hidden" id="satisfaccion" name="satisfaccion" value="">
            </div>

            <!-- Comunicación Efectiva -->
            <div class="rating-section">
                <label class="rating-title">⭐ Comunicación Efectiva</label>
                <span class="rating-description">¿Fue la comunicación clara, oportuna y útil durante todo el proceso?</span>
                <div class="stars-wrapper">
                    <span class="stars" data-category="comunicacion" data-rating="1">★</span>
                    <span class="stars" data-category="comunicacion" data-rating="2">★</span>
                    <span class="stars" data-category="comunicacion" data-rating="3">★</span>
                    <span class="stars" data-category="comunicacion" data-rating="4">★</span>
                    <span class="stars" data-category="comunicacion" data-rating="5">★</span>
                </div>
                <div class="rating-feedback" id="comunicacionFeedback"></div>
                <input type="hidden" id="comunicacion" name="comunicacion" value="">
            </div>

            <!-- Tiempo de Entrega -->
            <div class="rating-section">
                <label class="rating-title">⭐ Tiempo de Entrega</label>
                <span class="rating-description">¿Se entregó el servicio dentro de un plazo aceptable?</span>
                <div class="stars-wrapper">
                    <span class="stars" data-category="tiempo_entrega" data-rating="1">★</span>
                    <span class="stars" data-category="tiempo_entrega" data-rating="2">★</span>
                    <span class="stars" data-category="tiempo_entrega" data-rating="3">★</span>
                    <span class="stars" data-category="tiempo_entrega" data-rating="4">★</span>
                    <span class="stars" data-category="tiempo_entrega" data-rating="5">★</span>
                </div>
                <div class="rating-feedback" id="tiempo_entregaFeedback"></div>
                <input type="hidden" id="tiempo_entrega" name="tiempo_entrega" value="">
            </div>

            <!-- Relación Calidad-Precio -->
            <div class="rating-section">
                <label class="rating-title">⭐ Relación Calidad-Precio</label>
                <span class="rating-description">¿Sentiste que recibiste un buen valor por el precio que pagaste?</span>
                <div class="stars-wrapper">
                    <span class="stars" data-category="calidad_precio" data-rating="1">★</span>
                    <span class="stars" data-category="calidad_precio" data-rating="2">★</span>
                    <span class="stars" data-category="calidad_precio" data-rating="3">★</span>
                    <span class="stars" data-category="calidad_precio" data-rating="4">★</span>
                    <span class="stars" data-category="calidad_precio" data-rating="5">★</span>
                </div>
                <div class="rating-feedback" id="calidad_precioFeedback"></div>
                <input type="hidden" id="calidad_precio" name="calidad_precio" value="">
            </div>

            <!-- Calificación General -->
            <div class="rating-section general">
                <label class="rating-title general">🌟 CALIFICACIÓN GENERAL 🌟</label>
                <span class="rating-description general">En general, ¿cómo calificarías tu experiencia completa con nosotros?</span>
                <div class="stars-wrapper">
                    <span class="stars large" data-category="calificacion_general" data-rating="1">★</span>
                    <span class="stars large" data-category="calificacion_general" data-rating="2">★</span>
                    <span class="stars large" data-category="calificacion_general" data-rating="3">★</span>
                    <span class="stars large" data-category="calificacion_general" data-rating="4">★</span>
                    <span class="stars large" data-category="calificacion_general" data-rating="5">★</span>
                </div>
                <div class="rating-feedback" id="calificacion_generalFeedback"></div>
                <input type="hidden" id="calificacion_general" name="calificacion_general" value="">
            </div>

            <button type="submit" class="submit-btn" id="submitBtn">
                🚀 Enviar Mi Testimonio Completo
            </button>
        </form>

        <div id="thankYou" class="thank-you">
            <div class="check-animation">✓</div>
            <h3>¡Gracias por tu testimonio detallado!</h3>
            <p>Tu testimonio ha sido enviado correctamente y será revisado antes de publicarse. Una vez aprobado, aparecerá en nuestro sitio web para ayudar a otros clientes. ¡Realmente valoramos tu tiempo y confianza!</p>
        </div>
    </div>
    