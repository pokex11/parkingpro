<?php
include("db.php");

// Verificar si llega el ID por la URL
if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit;
}

$id = intval($_GET['id']);

// Eliminar el registro
$stmt = $conexion->prepare("DELETE FROM vehiculos WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$stmt->close();

// Volver al listado
header("Location: index.php");
exit;
?>