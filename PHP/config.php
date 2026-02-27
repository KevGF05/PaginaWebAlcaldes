<?php
$host = "localhost";
$usuario = "root";
$contrasena = "";
$base_de_datos = "museo_alcaldes";

$conn = mysqli_connect($host, $usuario, $contrasena, $base_de_datos);

if (!$conn) {
    die("❌ Error al conectar con la base de datos: " . mysqli_connect_error());
}
?>
