<?php
session_start();
include("db/db.php"); 

if (!isset($_SESSION['usuario'])) {
    header("Location: registro.php");
    exit;
}

// Obtener los datos del formulario
$nombre = trim($_POST['nombre']);
$apellido = trim($_POST['apellido']);
$correo = trim($_POST['correo']);
$numero = trim($_POST['numero']);
$direccion = trim($_POST['direccion']);

// Validar que no estén vacíos
if (empty($nombre) || empty($apellido) || empty($correo)) {
    echo "<script>alert('Por favor, completa todos los campos obligatorios.'); window.location='perfil.php';</script>";
    exit;
}

// Tomar el correo original del usuario logueado (clave para actualizar)
$correo_actual = $_SESSION['usuario']['correo'];

// Preparar la consulta SQL
$sql = "UPDATE usuarios SET 
            nombre = ?, 
            apellido = ?, 
            correo = ?, 
            numero = ?, 
            direccion = ? 
        WHERE correo = ?";

$stmt = $conexion->prepare($sql);
$stmt->bind_param("ssssss", $nombre, $apellido, $correo, $numero, $direccion, $correo_actual);

// Ejecutar la actualización
if ($stmt->execute()) {
    // Actualizar los datos de la sesión también
    $_SESSION['usuario']['nombre'] = $nombre;
    $_SESSION['usuario']['apellido'] = $apellido;
    $_SESSION['usuario']['correo'] = $correo;
    $_SESSION['usuario']['numero'] = $numero;
    $_SESSION['usuario']['direccion'] = $direccion;

    echo "<script>alert('Perfil actualizado correctamente.'); window.location='perfil.php';</script>";
} else {
    echo "<script>alert('Error al actualizar el perfil.'); window.location='perfil.php';</script>";
}

$stmt->close();
$conexion->close();
?>
