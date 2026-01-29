<?php
$host = "127.0.0.1";
$usuario = "root";
$clave = "";
$base_datos = "clinica";

// Crear conexión correctamente
$conexion = new mysqli($host, $usuario, $clave, $base_datos);

// Verificar conexión
if ($conexion->connect_error) {
    die("Error al conectar con la base de datos: " . $conexion->connect_error);
}
?>
