<?php
include("db/db.php");

// Si guardar_cita.php envía un POST con "resumen", mostramos el resumen:
$cita = null;
if (isset($_POST["resumen"])) {
    $cita = [
        "nombre_paciente"   => $_POST["nombre_paciente"],
        "numero_record"     => $_POST["numero_record"],
        "telefono_paciente" => $_POST["telefono_paciente"],
        "fecha_cita"        => $_POST["fecha_cita"],
        "especialidad"      => $_POST["especialidad"],
        "medico_referido"   => $_POST["medico_referido"],
        "usuario"           => $_POST["usuario"] ?? ""   // ← CAMPO USUARIO
    ];
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Clínica Dr. Melo - Citas</title>
  <link rel="stylesheet" href="css/citas.css">
</head>
<body>

<header>
  <div class="izquierda">
    <div class="logo"> 
      <img src="img/logo.png" alt="logo">
    </div>
    <div class="menu">
      <ul>
        <li><a href="pag2.php">Clínica Dr.Melo</a></li>
      </ul>
    </div>
  </div>
  <div class="boton-header">
    <span style="font-size: 25px;">📅</span> 
  </div>
</header>

<div class="main-container">
  <div class="form-container">
    
    <!-- FORMULARIO -->
    <form method="POST" action="guardar_cita.php" class="appointment-form">
      
      <div class="form-section">
        <h3>Información del paciente</h3>
        <div class="form-row">

          <div class="form-group">
            <label for="paciente">Paciente</label>
            <input type="text" id="paciente" name="nombre_paciente" required>
          </div>

          <div class="form-group">
            <label for="record">Número de record</label>
            <input type="text" id="record" name="numero_record">
          </div>

          <div class="form-group">
            <label for="telefono">Teléfono</label>
            <input type="tel" id="telefono" name="telefono_paciente">
          </div>

        </div>
      </div>

      <div class="form-section">
        <h3>Información de la cita</h3>
        <div class="form-row">

          <div class="form-group">
            <label for="fecha">Fecha</label>
            <input type="date" id="fecha" name="fecha_cita" required>
          </div>

          <div class="form-group">
            <label for="especialidad">Especialidad</label>
            <select id="especialidad" name="especialidad" required>
              <option value="">Seleccionar</option>
              <option value="Cardiología general">Cardiología general</option>
              <option value="Electrofisiología">Electrofisiología</option>
              <option value="Ecocardiografía">Ecocardiografía</option>
              <option value="Cardiología pediátrica">Cardiología pediátrica</option>
              <option value="Cirugía cardíaca">Cirugía cardíaca</option>
              <option value="Prevención y control de riesgos">Prevención y control de riesgos</option>
            </select>
          </div>

          <div class="form-group">
            <label for="medico">Médico preferido</label>
            <select id="medico" name="medico_referido" required>
              <option value="">Seleccionar</option>
              <option value="Dra. Heidy Melo">Dra. Heidy Melo</option>
              <option value="Dr. Carlos Mendoza">Dr. Carlos Mendoza</option>
              <option value="Dra. Lucía Torres">Dra. Lucía Torres</option>
              <option value="Dra. Valeria Paredes">Dra. Valeria Paredes</option>
              <option value="Dr. Jorge Ramírez">Dr. Jorge Ramírez</option>
              <option value="Dra. María Fernanda López">Dra. María Fernanda López</option>
            </select>

            <script>
            document.getElementById('especialidad').addEventListener('change', function () {
               const medico = document.getElementById('medico');

              const asignaciones = {
                 "Cardiología general": "Dra. Heidy Melo",
                 "Cardiología pediátrica": "Dra. Lucía Torres",
                 "Cirugía cardíaca": "Dr. Jorge Ramírez"
            };

               // Si la especialidad tiene un médico asignado, lo selecciona
              medico.value = asignaciones[this.value] || "";
              });
              </script>

          </div>

        </div>
      </div>

      <!-- CAMPO USUARIO FUNCIONAL -->
      <div class="form-section">
        <h3>Información del sistema</h3>
        <div class="form-row">

          <div class="form-group">
            <label for="usuario">Usuario que registra la cita</label>
            <input type="text" id="usuario" name="usuario"  required>
          </div>

        </div>
      </div>

      <div class="form-action">
        <button type="submit" class="btn-primary">Agendar cita</button>
      </div>

    </form>
  </div>

  <!-- SECCIÓN DEL RESUMEN -->
  <div class="summary-section">
    <div class="summary-box">

      <?php if ($cita): ?>
        <h3>✅ Cita registrada correctamente</h3>
        <p><strong>Paciente:</strong> <?= htmlspecialchars($cita["nombre_paciente"]) ?></p>
        <p><strong>Record:</strong> <?= htmlspecialchars($cita["numero_record"]) ?></p>
        <p><strong>Teléfono:</strong> <?= htmlspecialchars($cita["telefono_paciente"]) ?></p>
        <p><strong>Fecha:</strong> <?= htmlspecialchars($cita["fecha_cita"]) ?></p>
        <p><strong>Especialidad:</strong> <?= htmlspecialchars($cita["especialidad"]) ?></p>
        <p><strong>Médico:</strong> <?= htmlspecialchars($cita["medico_referido"]) ?></p>
        <p><strong>Usuario:</strong> <?= htmlspecialchars($cita["usuario"]) ?></p>

      <?php else: ?>
        <p class="initial-message">🩺 Aquí se mostrará el resumen de tu cita.</p>
      <?php endif; ?>

    </div>

    <div class="message-content">
      <p class="info-text">
        Programa tu cita fácilmente y recibe la atención cardiológica que tu corazón merece.
      </p>
    </div>
  </div>
</div>

<footer class="footer">
  <div class="footer-left">
    <img src="img/logo.png" alt="Logo de la clínica" class="footer-logo">
    <h3 class="footer-nombre">Clínica DR.Melo</h3>
  </div>
  <div class="footer-right">
    <img src="img/fb.png" class="social-icon">
    <img src="img/ig.png" class="social-icon">
    <img src="img/tt.png" class="social-icon">
  </div>
</footer>

</body>
</html>
