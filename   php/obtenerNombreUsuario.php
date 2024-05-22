<?php
$servername = "localhost";
$database = "u488842232_tienmuebles";
$username = "u488842232_lili";
$password = "Emili@no2001";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $database);

// Revisar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Simulación de obtener el nombre del usuario desde la base de datos
$userId = 1; // Simula el ID del usuario logueado
$sql = "SELECT Nombre FROM usuarios WHERE idUsuarios = $userId";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo $row['Nombre'];
} else {
    echo "Usuario no encontrado";
}

$conn->close();
?>
