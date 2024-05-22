<?php
session_start();

// Verificar si el usuario ha iniciado sesión
if(isset($_SESSION['usuario'])) {
    // Obtener la información del usuario de la sesión
    $nombreUsuario = $_SESSION['usuario'];
    $corre = $_SESSION['Correo'];

    // Devolver la información del usuario como respuesta AJAX
    echo "<p>Bienvenido, $nombreUsuario</p>";
    echo "<p>Correo electronico:  $Correo</p>";
    // Aquí puedo agregar más información del usuario si lo deseas, se deja por el momento asi por fines de practicidad 
} else {
    // Si el usuario no ha iniciado sesión, devolver un mensaje indicando que debe iniciar sesión
    echo "<p>Por favor, inicia sesión para ver esta página.</p>";
}
?>
