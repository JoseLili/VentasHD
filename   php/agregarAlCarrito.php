<?php
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
    $idProducto = $_POST['idProducto'];

    // Obtener información del producto
    $sql = "SELECT * FROM productos WHERE idProductos = $idProducto";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $producto = $result->fetch_assoc();

        // Agregar producto al carrito en la sesión
        if (!isset($_SESSION['carrito'])) {
            $_SESSION['carrito'] = [];
        }

        // Verificar si el producto ya está en el carrito
        $productoExiste = false;
        foreach ($_SESSION['carrito'] as &$item) {
            if ($item['idProductos'] == $idProducto) {
                $item['cantidad'] += 1;
                $productoExiste = true;
                break;
            }
        }

        // Si el producto no está en el carrito, agregarlo
        if (!$productoExiste) {
            $producto['cantidad'] = 1;
            $_SESSION['carrito'][] = $producto;
        }

        echo "Producto agregado al carrito";
    } else {
        echo "Producto no encontrado";
    }
}

$conn->close();
?>
