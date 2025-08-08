<?php include("db.php"); 

function obtenerVehiculos($conexion) {  //DEVUELVE VEHIUCLOS ORDENADO
    $sql = "SELECT * FROM vehiculos ORDER BY hora_entrada DESC";
    $query = $conexion->query($sql);

    return $query->fetch_all(MYSQLI_ASSOC);
}

function formatearCampo($valor) { //PONER UN GUIION EN CAMPOS VACIOS
    return $valor ? $valor : '-';
}

$vehiculos = obtenerVehiculos($conexion);

?><!DOCTYPE html>
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

        <?php foreach($vehiculos as $vehiculo): ?>
            <tr>
                <td><?php echo $vehiculo['placa']; ?></td>
                <td><?php echo $vehiculo['propietario']; ?></td>
                <td><?php echo $vehiculo['hora_entrada']; ?></td>
                <td><?php echo formatearCampo($vehiculo['hora_salida']); ?></td>
                <td><?php echo formatearCampo($vehiculo['tiempo_total']); ?></td>
                <td>
                    <a href='salida.php?id=<?php echo $vehiculo['id']; ?>'>Registrar Salida</a> |
                    <a href='borrar.php?id=<?php echo $vehiculo['id'];  ?>'>Borrar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>