<?php
$conexion=mysqli_connect("localhost", "root","Sergio14","simsy","3306");
$conexion->set_charset("utf8");

if (!$conexion) {
    die("Error al conectar: " . mysqli_connect_error());
}
?>

