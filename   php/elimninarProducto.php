<?php
session_start();

// Verificar si el usuario ha iniciado sesión
if(isset($_SESSION['carrito'])) {
    // Obtener el índice del producto a eliminar del carrito
    $index = $_POST['index'];

    // Obtener el carrito de la sesión
    $carrito = $_SESSION['carrito'];

    // Verificar si el índice es válido
    if(isset($carrito[$index])) {
        // Eliminar el producto del carrito en el índice dado
        array_splice($carrito, $index, 1);

        // Actualizar el carrito en la sesión
        $_SESSION['carrito'] = $carrito;

        // Devolver una respuesta exitosa
        http_response_code(200);
        echo "Producto eliminado del carrito exitosamente.";
    } else {
        // Si el índice no es válido, devolver un error
        http_response_code(400);
        echo "Índice de producto inválido.";
    }
} else {
    // Si el carrito no está presente en la sesión, devolver un error
    http_response_code(400);
    echo "No se encontró el carrito en la sesión.";
}
?>
