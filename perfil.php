<?php
session_start();

// Si el usuario no ha iniciado sesión (no se registró)
if (!isset($_SESSION['usuario'])) {
  header("Location: registro.php");
  exit;
}


// Obtener los datos del usuario desde la sesión
$usuario = $_SESSION['usuario'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Perfil del Usuario - Clínica Dr. Melo</title>
  <link rel="stylesheet" href="css/perfil.css">
</head>
<body>


  <div class="perfil-wrapper">

    <!-- TARJETA IZQUIERDA -->     
     
    <div class="perfil-card">

      <img src="img/ft.jpg" alt="Foto de perfil" class="foto-perfil">
      <h2 class="nombre">
        <?= htmlspecialchars($usuario['nombre'] . ' ' . $usuario['apellido']) ?>
      </h2>
      <p class="correo"><?= htmlspecialchars($usuario['correo']) ?></p>
      <p class="fecha">inicio: <span><?= date("d F Y") ?></span></p>
      <p class="close"><a href="index.php" style="text-decoration: none; color: red;">Cerrar sesión</a></p>
    </div>

    

    <!-- TARJETA DERECHA -->

    <div class="perfil-form-card">
      <h2>Editar Perfil</h2>

      <form class="form-perfil" method="POST" action="actualizar_perfil.php">
        <div class="input-group">
          <label>Nombre</label>
          <input type="text" name="nombre" value="<?= htmlspecialchars($usuario['nombre']) ?>">
        </div>
        <div class="input-group">
          <label>Apellido</label>
          <input type="text" name="apellido" value="<?= htmlspecialchars($usuario['apellido']) ?>">
        </div>
        <div class="input-group">
          <label>Correo electrónico</label>
          <input type="email" name="correo" value="<?= htmlspecialchars($usuario['correo']) ?>">
        </div>
        <div class="input-group">
          <label>Número</label>
          <input type="text" name="numero" value="<?= htmlspecialchars($usuario['numero']) ?>">
        </div>
        <div class="input-group">
          <label>Dirección</label>
          <input type="text" name="direccion" value="<?= htmlspecialchars($usuario['direccion']) ?>">
        </div>
        <button type="submit" class="btn-actualizar">Actualizar Información</button>
      </form>
    </div>
  </div>

  <!-- SECCIÓN DE CITAS -->
  <div class="citas-section">
    <h2>Mis Citas</h2>

    <div class="tabla-citas">

        <?php
        // --------------------------
        // CONEXIÓN A LA BASE DE DATOS
        // --------------------------
        $conn = new mysqli("127.0.0.1", "root", "", "clinica");

        if ($conn->connect_error) {
            die("Error al conectar a la base de datos: " . $conn->connect_error);
        }

        $conn->set_charset("utf8");

        // --------------------------
        // CONSULTA DE CITAS DEL USUARIO
        // --------------------------

        $nombreUsuario = $usuario['nombre'] . ' ' . $usuario['apellido'];

        $sql = "SELECT id_cita, nombre_paciente, numero_record, telefono_paciente, fecha_cita, especialidad, medico_referido 
                FROM citas 
                WHERE usuario = ?";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $nombreUsuario);
        $stmt->execute();
        $resultado = $stmt->get_result();
        ?>

        <?php if ($resultado->num_rows > 0): ?>
            <table class="tabla">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Paciente</th>
                        <th>Record</th>
                        <th>Teléfono</th>
                        <th>Fecha</th>
                        <th>Especialidad</th>
                        <th>Médico</th>
                        <th>Acción</th>
                    </tr>
                </thead>

                <tbody>
                <?php while ($cita = $resultado->fetch_assoc()): ?>
                    <tr>
                        <td><?= $cita['id_cita'] ?></td>
                        <td><?= htmlspecialchars($cita['nombre_paciente']) ?></td>
                        <td><?= htmlspecialchars($cita['numero_record']) ?></td>
                        <td><?= htmlspecialchars($cita['telefono_paciente']) ?></td>
                        <td><?= htmlspecialchars($cita['fecha_cita']) ?></td>
                        <td><?= htmlspecialchars($cita['especialidad']) ?></td>
                        <td><?= htmlspecialchars($cita['medico_referido']) ?></td>

                        <td>
                            <form action="cancelar_cita.php" method="POST" onsubmit="return confirmarCancelacion()">
                                <input type="hidden" name="id_cita" value="<?= $cita['id_cita'] ?>">
                                <button class="btn-cancelar">Cancelar</button>
                            </form>
                        </td>
                    </tr>
                <?php endwhile; ?>
                </tbody>

            </table>
        <?php else: ?>
            <p>No tienes citas registradas.</p>
        <?php endif; ?>

    </div>
</div>

<script>
function confirmarCancelacion() {
    return confirm("¿Estás seguro de cancelar esta cita?");
}




</body>
</html>
