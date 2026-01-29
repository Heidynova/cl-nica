<?php
if (!isset($_POST['id_cita'])) {
    die("Error: No se recibió la cita.");
}

$id = $_POST['id_cita'];

$conn = new mysqli("127.0.0.1", "root", "", "clinica");

if ($conn->connect_error) {
    die("Error al conectar: " . $conn->connect_error);
}

$sql = "DELETE FROM citas WHERE id_cita = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    echo "<script>
            alert('Cita cancelada correctamente.');
            window.location.href='perfil.php';
          </script>";
} else {
    echo "Error al cancelar la cita.";
}

$conn->close();
?>
