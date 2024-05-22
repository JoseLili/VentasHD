<?php
session_start();

$response = array('loggedIn' => false);

if (isset($_SESSION['usuario'])) {
    $response['loggedIn'] = true;
    $response['nombre'] = $_SESSION['usuario'];
}

echo json_encode($response);
?>
