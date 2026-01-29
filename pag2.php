<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="css/pag2.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Clinica DR.Melo</title>  
</head>
<body>

  <header>

 <div class="logo"> 
     <img src="img/logo.png" alt="logo">
 </div>

 <div class="menu">
    <ul>
      <li><a href="#servicio">Servicios</a></li>
      <li><a href="#nosotros">Nosotros</a></li>
      <li><a href="#especialistas">Especialistas</a></li>
      <li><a href="#contacto">Contacto</a></li>
    </ul>
 </div>

 <!-- esto es para la transicion suave  -->
   <script>
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function(e) {
        e.preventDefault();

        const target = document.querySelector(this.getAttribute('href'));
        if (!target) return;

        const targetPosition = target.getBoundingClientRect().top + window.pageYOffset;
        const startPosition = window.pageYOffset;
        const distance = targetPosition - startPosition;
        const duration = 1000; // Duración en milisegundos (1 segundo)
        let start = null;

        function animation(currentTime) {
            if (start === null) start = currentTime;
            const timeElapsed = currentTime - start;
            const run = ease(timeElapsed, startPosition, distance, duration);
            window.scrollTo(0, run);
            if (timeElapsed < duration) requestAnimationFrame(animation);
        }

        // Función de easing para transición suave
        function ease(t, b, c, d) {
            t /= d / 2;
            if (t < 1) return c / 2 * t * t + b;
            t--;
            return -c / 2 * (t * (t - 2) - 1) + b;
        }

        requestAnimationFrame(animation);
    });
});
</script>


 <img class="logo2" >
  <div class="perfil" >
    <a href="perfil.php"><img src="img/perfil.png" alt="perfil"></a>
  </div>

  </header>

  
  <!-- cuadro -->

<div class="cuadro-izquierda">
  <h1>“Donde tu bienestar es nuestra mayor misión.”</span></h1>
  <p class="subtitulo">Agenda tu cita</p>
  <button class="btn-registrate"><a href="citas.php">Agendar cita</a></button>
</div>

<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
  </div>


   <!-- manu -->

   <section id="servicio"  class="servicios-container">
    <h2  class="titulo-servicios">Servicios que Ofrecemos</h2>
    
    <div class="acordeon-container">

    <details open class="acordeon-item">
        <summary class="acordeon-header">
            <span class="check-icon">✓</span>
            <span class="acordeon-title">Consultas y Diagnóstico</span>
        </summary>
        <div class="acordeon-content">
            Evaluaciones médicas integrales para detectar y entender las necesidades del paciente,
            con tecnología avanzada para diagnósticos precisos.

            <ul>*Consulta general y especializada</ul>
            <ul>*Historia clínica detallada</ul>
            <ul>*Pruebas diagnósticas</ul>
            <ul>*Interpretación de resultados</ul>
        </div>
    </details>

    <details class="acordeon-item">
        <summary class="acordeon-header">
            <span class="check-icon">✓</span>
            <span class="acordeon-title">Prevención y Control</span>
        </summary>
        <div class="acordeon-content">
            Programas diseñados para prevenir enfermedades y mantener un control efectivo de condiciones crónicas,
            promoviendo salud y bienestar.

          <ul>*Programas de control de presión arterial</ul>
          <ul>*Control de colesterol y glucosa</ul>
          <ul>*Educación en hábitos saludables</ul>
          <ul>*Revisiones periódicas</ul>
        </div>
    </details>
    
    <details class="acordeon-item">
        <summary class="acordeon-header">
            <span class="check-icon">✓</span>
            <span class="acordeon-title">Rehabilitación y Apoyo</span>
        </summary>
        <div class="acordeon-content">
            Tratamientos personalizados para favorecer la recuperación física y mental,
            mejorando la calidad de vida del paciente.

          <ul>*Terapia física y ocupacional</ul>
          <ul>*Apoyo psicológico</ul>
          <ul>*Rehabilitación cardíaca</ul>
          <ul>*Programas de seguimiento</ul>
        </div>
    </details>
    
    <details class="acordeon-item">
        <summary class="acordeon-header">
            <span class="check-icon">✓</span>
            <span class="acordeon-title">Procedimientos Especializados</span>
        </summary>
        <div class="acordeon-content">
            Intervenciones médicas avanzadas realizadas por profesionales capacitados,
             garantizando seguridad y eficacia.

            <ul>*Electrocardiogramas (ECG)</ul>
            <ul>*Pruebas de esfuerzo</ul>
            <ul>*Monitoreo ambulatorio de presión arterial</ul>
            <ul>*Estudios especializados</ul>
        </div>
    </details>    
    </details>

</section>



<!-- nosotros -->
 <section id="nosotros" class="nosotros-section">
  <!-- Texto -->
  <div class="nosotros-texto">
    <h2>Nosotros</h2>
    <p>
      En nuestra Unidad de Cardiología, estamos comprometidos con la salud cardiovascular de nuestros pacientes,
      ofreciendo un enfoque integral que abarca desde la prevención hasta el diagnóstico y tratamiento de las
      enfermedades del corazón y el sistema circulatorio.
    </p>
    <p>
      Conscientes de la importancia de la salud cardiovascular para la calidad de vida, nuestro equipo de especialistas
      altamente capacitados trabaja incansablemente para proporcionar una atención de excelencia en cada etapa del cuidado.
    </p>
  </div>

  <!-- Imágenes -->
  <div class="nosotros-imagenes">
    <img src="img/clinic.png" alt="Atención cardiológica">
    <img src="img/imagen2.jpg" alt="Consulta médica">
  </div>
</section>





<!-- Apartado de Especialistas ------------------------------------------------------------------------------------------>

<section id="especialistas" class="specialists-section">
  <h2>Especialistas Principales</h2>
  <div class="specialists-container">
    
    <!-- Especialista 1 -->
    <div class="specialist-card">
      <div class="photo-circle">
        <img src="img/doc1.png" alt="Dr. Carlos Mendoza">
      </div>
      <h3>Dra. Heidy Melo </h3>
      <p>Cardiología General</p>
    </div>

    <!-- Especialista 2 -->
    <div class="specialist-card">
      <div class="photo-circle">
        <img src="img/doc2.jpg" alt="Dra. Lucía Torres">
      </div>
      <h3>Dra. Lucía Torres</h3>
      <p>Cardiología Pediátrica</p>
    </div>

    <!-- Especialista 3 -->
    <div class="specialist-card">
      <div class="photo-circle">
        <img src="img/doc3.png" alt="Dr. Jorge Ramírez">
      </div>
      <h3>Dr. Jorge Ramírez</h3>
      <p>Cirugía Cardíaca</p>
    </div>

  </div>
</section>

<hr>



<!-- contacto -->

<section id="contacto" class="contacto-section">
  <div class="contacto-form">
    <h2>Contactanos</h2>
    <form>
      <label for="nombre">Nombre</label>
      <input type="text" id="nombre" name="nombre" placeholder="Nombre" required>

      <label for="correo">Correo Electrónico</label>
      <input type="email" id="correo" name="correo" placeholder="Correo Electrónico" required>

      <label for="mensaje">Mensaje</label>
      <textarea id="mensaje" name="mensaje" rows="5" placeholder="Mensaje" required></textarea>

      <button type="submit">Enviar</button>
    </form>
  </div>

  <div class="contacto-info">
    <div class="info-item">
      <img src="img/hora.png" alt="Horarios Disponibles">
      <div>
        <h3>Horarios Disponibles</h3>
        <p>Lunes a Viernes: 8:00am a 4:00pm</p>
        <p>Sábados: 7:00am a 1:00pm</p>
        <p>Domingos: No laborable</p>
      </div>
    </div>

    <div class="info-item">
      <img src="img/ubi.png" alt="Ubicación">
      <div>
        <h3>Ubicación</h3>
        <p>Calle Los Pinos #128, Residencial Las Flores,</p>
        <p>Santo Domingo, República Dominicana</p>
      </div>
    </div>
  </div>
</section>


<footer class="footer">
  <div class="footer-left">
    <img src="img/logo.png" alt="Logo de la clínica" class="footer-logo">
    <h3 class="footer-nombre">Clínica DR.Melo</h3>
  </div>

  <div class="footer-right">
    <img src="img/fb.png" class="social-icon"><i></i></img>
    <img src="img/ig.png" class="social-icon"><i></i></img>
    <img src="img/tt.png" class="social-icon"><i></i></img>
  </div>
</footer>








  </body>
  </html>
  