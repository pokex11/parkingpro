<?php
$conexion = new mysqli("localhost", "root", "", "parkingpro");

if ($conexion->connect_error){
    die("Error de conexion: " . $conexion->connect_error);
}
?>