<?php
// Conexión a la base de datos
$servername = "localhost";
$database = "u488842232_tienmuebles"; // Esta es la variable correcta
$username = "u488842232_lili";
$password = "Emili@no2001";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $database); // Aquí estaba el error

// Comprobar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consulta SQL para obtener los productos
$sql = "SELECT * FROM productos";
$result = $conn->query($sql);

$productos = [];

// Obtener los productos y guardarlos en un array
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $productos[] = $row;
    }
}

// Devolver los productos en formato JSON
echo json_encode($productos);

// Cerrar conexión
$conn->close();
?>
