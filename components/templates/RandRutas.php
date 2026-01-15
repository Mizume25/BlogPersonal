<?php
require_once '../api/database.php';

// 1. Consultar 3 destacados al azar
$sql = "SELECT Titulo_obra, ruta_archivo FROM Contenido WHERE Destacado = 1 ORDER BY RAND() LIMIT 3";
$result = $conexion->query($sql);

// 2. Generar las 3 líneas <li>
if ($result && $result->num_rows > 0) {
    while ($fila = $result->fetch_assoc()) {
        $titulo = htmlspecialchars(trim($fila['Titulo_obra'], "' "));
        $ruta   = htmlspecialchars(trim($fila['ruta_archivo'], "' "));
        
        // Esto imprime exactamente el formato que pediste
        echo "<li><a href=\"$ruta\">$titulo</a></li>" . PHP_EOL;
    }
} else {
    echo "<li><a href=\"#\">No hay destacados disponibles</a></li>";
}
?>