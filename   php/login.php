<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $conn->real_escape_string($_POST['email']);
    $password = $conn->real_escape_string($_POST['password']);

    $sql = "SELECT * FROM usuarios WHERE Correo = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $usuario = $result->fetch_assoc();
        if (password_verify($password, $usuario['Password'])) {
            $_SESSION['usuario'] = $usuario['Nombre'];
            header("Location: ../index.html");
            exit();
        } else {
            echo "Contraseña incorrecta";
        }
    } else {
        echo "No se encontró el usuario";
    }
} else {
    echo "Método de solicitud no permitido";
}

$conn->close();
?>
