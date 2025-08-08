<?php include("db.php"); ?>
<!DOCTYPE html>
<html>
<head>
    <title>ParkingPro - Administración</title>
</head>
<body>
    <h1>Vehículos en el Parqueadero</h1>
    <a href="entrada.php">Registrar Entrada</a>
    <table border="1" cellpadding="5">
        <tr>
            <th>Placa</th>
            <th>Propietario</th>
            <th>Hora de Entrada</th>
            <th>Hora de Salida</th>
            <th>Tiempo Total</th>
            <th>Acciones</th>
        </tr>
        <?php
        $resultado = $conexion->query("SELECT * FROM vehiculos ORDER BY hora_entrada DESC");
        while ($fila = $resultado->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $fila['placa'] . "</td>";
            echo "<td>" . $fila['propietario'] . "</td>";
            echo "<td>" . $fila['hora_entrada'] . "</td>";
            echo "<td>" . ($fila['hora_salida'] ? $fila['hora_salida'] : '-') . "</td>";
            echo "<td>" . ($fila['tiempo_total'] ? $fila['tiempo_total'] : '-') . "</td>";
            echo "<td>
                <a href='salida.php?id=" . $fila['id'] . "'>Registrar Salida</a> |
                <a href='borrar.php?id=" . $fila['id'] . "'>Borrar</a>
            </td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>