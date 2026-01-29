<?php
session_start();
include_once("db/db.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $correo = $_POST['correo'];
    $numero = $_POST['numero'];

    // Buscar usuario en la BD
    $sql = "SELECT * FROM usuarios WHERE correo = '$correo' AND numero = '$numero' LIMIT 1";
    $resultado = $conexion->query($sql);

    if ($resultado && $resultado->num_rows > 0) {

        // Usuario encontrado
        $usuario = $resultado->fetch_assoc();

        // Guardar datos en sesión
        $_SESSION['usuario'] = [
            'id'        => $usuario['id'],
            'nombre'    => $usuario['nombre'],
            'apellido'  => $usuario['apellido'],
            'correo'    => $usuario['correo'],
            'numero'    => $usuario['numero'],
            'direccion' => $usuario['direccion']
        ];

        header("Location: pag2.php");
        exit;

    } else {
        // Usuario NO registrado
        echo "<script>
                alert('No estás registrado. Por favor registrarte.');
                window.location='registro.php';
              </script>";
        exit;
    }
}
?>
