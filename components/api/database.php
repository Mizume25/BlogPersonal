<?php
// components/api/database.php
header('Content-Type: application/json');

$host = 'localhost';
$user = 'u298137555_Mizume25';  // Tu usuario de Hostinger
$pass = '@BlogPersonal51';         // Contraseña MySQL
$db   = 'u298137555_BlogPersonal'; // Tu base de datos

$conexion = new mysqli($host, $user, $pass, $db);

if ($conexion->connect_error) {
    http_response_code(500);
    echo json_encode(['error' => 'Error de conexión: ' . $conexion->connect_error]);
    exit;
}

$conexion->set_charset('utf8mb4');
?>