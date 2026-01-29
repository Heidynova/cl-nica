<?php
include_once("db/db.php");

// Recibir datos del formulario
$nombre_paciente   = trim($_POST['nombre_paciente'] ?? '');
$numero_record     = trim($_POST['numero_record'] ?? '');
$telefono_paciente = trim($_POST['telefono_paciente'] ?? '');
$fecha_cita        = $_POST['fecha_cita'] ?? '';
$especialidad      = trim($_POST['especialidad'] ?? '');
$medico_referido   = trim($_POST['medico_referido'] ?? '');
$usuario           = trim($_POST['usuario'] ?? '');  // ← AGREGADO

// Validación básica
if (empty($nombre_paciente) || empty($fecha_cita) || empty($especialidad) || empty($medico_referido)) {
    die("Error: Faltan datos obligatorios.");
}

$fecha_registro = date("Y-m-d H:i:s");

// Guardar cita en la base de datos (AGREGAR CAMPO usuario)
$stmt = $conexion->prepare("
    INSERT INTO citas 
    (nombre_paciente, numero_record, telefono_paciente, fecha_cita, especialidad, medico_referido, usuario, fecha_registro) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?)
");

$stmt->bind_param("ssssssss",
    $nombre_paciente,
    $numero_record,
    $telefono_paciente,
    $fecha_cita,
    $especialidad,
    $medico_referido,
    $usuario,
    $fecha_registro
);

if (!$stmt->execute()) {
    die("Error al guardar la cita en la base de datos.");
}

$stmt->close();
$conexion->close();
?>

<form id="redirectForm" method="POST" action="citas.php">
    <input type="hidden" name="resumen" value="1">
    <input type="hidden" name="nombre_paciente" value="<?= htmlspecialchars($nombre_paciente) ?>">
    <input type="hidden" name="numero_record" value="<?= htmlspecialchars($numero_record) ?>">
    <input type="hidden" name="telefono_paciente" value="<?= htmlspecialchars($telefono_paciente) ?>">
    <input type="hidden" name="fecha_cita" value="<?= htmlspecialchars($fecha_cita) ?>">
    <input type="hidden" name="especialidad" value="<?= htmlspecialchars($especialidad) ?>">
    <input type="hidden" name="medico_referido" value="<?= htmlspecialchars($medico_referido) ?>">
    <input type="hidden" name="usuario" value="<?= htmlspecialchars($usuario) ?>"> <!-- AGREGADO -->
</form>

<script>
    document.getElementById('redirectForm').submit();
</script>
