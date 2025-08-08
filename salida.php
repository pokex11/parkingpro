<?php
include("db.php");

// Verificar si llega el ID por la URL
if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit;
}

$id = intval($_GET['id']);

// Buscar el vehículo
$resultado = $conexion->query("SELECT * FROM vehiculos WHERE id = $id");
if ($resultado->num_rows === 0) {
    die("Vehículo no encontrado.");
}
$vehiculo = $resultado->fetch_assoc();

// Calcular hora de salida y tiempo total
$hora_salida = date("Y-m-d H:i:s");
$entrada = new DateTime($vehiculo['hora_entrada']);
$salida = new DateTime($hora_salida);
$intervalo = $entrada->diff($salida);
$tiempoTotal = $intervalo->format("%h horas %i minutos");

// Actualizar registro
$stmt = $conexion->prepare("UPDATE vehiculos SET hora_salida = ?, tiempoTotal$tiempoTotal = ? WHERE id = ?");
$stmt->bind_param("ssi", $hora_salida, $tiempoTotal, $id);
$stmt->execute();
$stmt->close();

// Volver al inicio
header("Location: index.php");
exit;
?>