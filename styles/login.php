<?php
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "myDB";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id FROM users WHERE username='" . $_POST["username"] . "' AND password='" . $_POST["password"] . "'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  echo "Ingreso exitoso!";
} else {
  echo "Nombre de usuario o contraseña incorrectos";
}
$conn->close();
?>