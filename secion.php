<?php
session_start();


?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/secion.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión - Clínica DR.Melo</title>

</head>

<body>

<div class="login-container">
    <h2>Iniciar Sesión</h2>

    <?php if (isset($_GET['error'])): ?>
        <p class="error"><?php echo $_GET['error']; ?></p>
    <?php endif; ?>

    <form action="procesar_login.php" method="POST">
        <label for="correo">Correo</label>
        <input type="email" name="correo" id="correo" required>

        <label for="numero">Número</label>
        <input type="tel" name="numero" id="numero" required>

        <button type="submit">Entrar</button>
    </form>

    <p class="registro-link">
        ¿No tienes cuenta? <a href="registro.php">Regístrate aquí</a>
    </p>
</div>

</body>
</html>
