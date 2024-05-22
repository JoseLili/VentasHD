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

// Verificar si el formulario de inicio de sesión fue enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = $_POST['correo'];
    $password = $_POST['password'];

    // Consulta SQL para seleccionar el usuario por su correo
    $sql = "SELECT * FROM usuarios WHERE Correo = '$correo'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // El usuario fue encontrado, verificar la contraseña
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['Password'])) {
            // Contraseña válida, iniciar sesión y redirigir al usuario a la página de inicio
            session_start();
            $_SESSION['idUsuario'] = $row['idUsuarios'];
            header("Location: pagina_de_inicio.php");
            exit();
        } else {
            // Contraseña incorrecta
            echo "Contraseña incorrecta";
        }
    } else {
        // Usuario no encontrado
        echo "Usuario no encontrado";
    }
}

$conn->close();
?>
