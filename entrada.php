<?php
include("db.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $placa = strtoupper(trim($_POST['placa']));
    $propietario = trim($_POST['propietario']);

    if (!empty($placa) && !empty($propietario)) {
        $stmt = $conexion->prepare("INSERT INTO vehiculos (placa, propietario) VALUES (?, ?)");
        $stmt->bind_param("ss", $placa, $propietario);
        $stmt->execute();
        $stmt->close();

        header("Location: index.php");
        exit;
    } else {
        $error = "Todos los campos son obligatorios.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registrar Entrada - ParkingPro</title>
</head>
<body>
    <h1>Registrar Entrada de Vehículo</h1>
    <a href="index.php">⬅ Volver</a>

    <?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>

    <form method="POST">
        <label>Placa:</label><br>
        <input type="text" name="placa" maxlength="10" required><br><br>

        <label>Propietario:</label><br>
        <input type="text" name="propietario" required><br><br>

        <button type="submit">Registrar Entrada</button>
    </form>
</body>
</html>