<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "contratosdb";

// Crear conexión
$conexion = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conexion->connect_error) {
  die("Falló la conexión, error: " . $conn->connect_error);
}

?>