<?php
session_start();
include_once("db/db.php");

// Verificar conexión
if (!$conexion instanceof mysqli) {
    die("Error: no se pudo establecer conexión con la base de datos.");
}

// Si el usuario viene desde los términos y aceptó
if (isset($_GET['aceptado']) && $_GET['aceptado'] == '1') {
    $_SESSION['terminos_aceptados'] = true;
}

// Cuando el usuario envía el formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Verifica si aceptó los términos antes
    if (empty($_SESSION['terminos_aceptados'])) {
        echo "<script>
            alert('Debes aceptar los Términos y Condiciones antes de registrarte.');
            window.location.href='terminos.php';
        </script>";
        exit;
    }

    // Guardar datos del formulario
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $correo = $_POST['correo'];
    $numero = $_POST['numero'];
    $direccion = $_POST['direccion'];

    // 🔍 Validar si el correo ya existe
    $verificar = $conexion->query("SELECT * FROM usuarios WHERE correo = '$correo'");

    if ($verificar->num_rows > 0) {
        echo "<script>
                alert('Este correo ya está registrado. Intenta con otro.');
                window.location.href='registro.php';
              </script>";
        exit();
    }

    // Insertar usuario (si no existe)
    $sql = "INSERT INTO usuarios (nombre, apellido, correo, numero, direccion) 
            VALUES ('$nombre', '$apellido', '$correo', '$numero', '$direccion')";

    if ($conexion->query($sql) === TRUE) {

        $_SESSION['usuario'] = [
            'nombre' => $nombre,
            'apellido' => $apellido,
            'correo' => $correo,
            'numero' => $numero,
            'direccion' => $direccion
        ];

        unset($_SESSION['terminos_aceptados']);
        header("Location: pag2.php");
        exit;

    } else {
        echo "<script>alert('Error al registrar usuario.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="css/estilos.css">
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
      <li><a href="index.php">Inicio</a></li>
    </ul>
  </div>
</header>

<section class="registro-section">
  <div class="registro-container">
    <h2>Regístrate</h2>
    <form action="registro.php" method="POST" class="registro-form">
      <label for="nombre">Nombre</label>
      <input type="text" id="nombre" name="nombre" placeholder="Nombre" required>

      <label for="apellido">Apellido</label>
      <input type="text" id="apellido" name="apellido" placeholder="Apellido" required>

      <label for="correo">Correo</label>
      <input type="email" id="correo" name="correo" placeholder="Correo" required>

      <label for="numero">Número</label>
      <input type="tel" id="numero" name="numero" placeholder="Número" required>

      <label for="direccion">Dirección</label>
      <input type="text" id="direccion" name="direccion" placeholder="Dirección" required>

      <button type="submit">Registrar</button>
    </form>
    <p class="terminos"><a href="terminos.php">Términos y condiciones</a></p>
  </div>
</section>

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
