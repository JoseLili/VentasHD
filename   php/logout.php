<?php
session_start();

// Destruir todas las variables de sesión
session_unset();
session_destroy();

// Redirigir al usuario a la página principal del sitio
header("Location: https://jelbconsutas.com/");
exit;
?>
