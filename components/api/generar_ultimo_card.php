<?php
// 1. CONFIGURACIÓN DE ERRORES Y CABECERAS
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
header('Content-Type: text/html; charset=utf-8');

// 2. INCLUIR CONEXIÓN
require_once 'database.php';

// 3. FUNCIÓN PARA GENERAR HTML DE CARD (ESTRUCTURA PURA)
function generarCardHTML($publicacion) {
    // Limpieza de datos
    $idCard            = $publicacion['Id_publicacion'];
    $tituloObra        = htmlspecialchars(trim($publicacion['Titulo_obra'], "' "));
    $tituloPublicacion = htmlspecialchars(trim($publicacion['Titulo_publicacion'], "' "));
    $descripcionCorta  = htmlspecialchars(substr(trim($publicacion['Descripcion'], "' "), 0, 150)) . '...';
    $autor             = htmlspecialchars(trim($publicacion['Autor'], "' "));
    $rutaArchivo       = htmlspecialchars(trim($publicacion['ruta_archivo'], "' "));
    $rutaImagen        = htmlspecialchars(trim($publicacion['ruta_imagen'], "' "));
    $categoriaBD       = strtolower(trim($publicacion['Categoria'], "' "));
    $tipoTag           = trim($publicacion['Tipo'], "' ");
    $fechaOriginal     = $publicacion['Fecha_publicacion'];
    $esDestacado       = $publicacion['Destacado'];
    
    // Clases según tu CSS existente
    $claseTag = ($tipoTag == 'Articulo') ? 'tagArticulo' : 'tagPost';
    $textoTag = ($tipoTag == 'Articulo') ? 'Artículo' : 'Post';

    return <<<HTML
<a href="$rutaArchivo" 
   class="card-link" 
   data-id="$idCard" 
   data-categoria="$categoriaBD"
   data-autor="$autor"
   data-fecha="$fechaOriginal"
   data-destacado="$esDestacado">
    <div class="card">
        <header class="headCard">
            <h2>$tituloObra</h2>
            <div class="tagContent">
                <div class="$claseTag">$textoTag</div>
            </div>
        </header>
        <main class="bodyCard">
            <section class="bodyimg" style="background-image: url('$rutaImagen')"></section>
            <section class="bodytxt">
                <h3>$tituloPublicacion</h3>
                <p>$descripcionCorta</p>
            </section>
        </main>
    </div>
</a>
HTML;
}

// 4. OBTENER ÚLTIMA PUBLICACIÓN
$sql = "SELECT * FROM Contenido ORDER BY Id_publicacion DESC LIMIT 1";
$result = $conexion->query($sql);

if (!$result) die("Error SQL: " . $conexion->error);
if ($result->num_rows === 0) die("Tabla vacía");

$ultimaPublicacion = $result->fetch_assoc();
$cardHTML = generarCardHTML($ultimaPublicacion);

// 5. RUTA Y GUARDADO
$archivoCards = $_SERVER['DOCUMENT_ROOT'] . '/index/Archivador/container/cards_generados.html';

if (file_exists($archivoCards)) {
    $contenidoActual = file_get_contents($archivoCards);
    if (strpos($contenidoActual, 'data-id="' . $ultimaPublicacion['Id_publicacion'] . '"') === false) {
        file_put_contents($archivoCards, $cardHTML . "\n", FILE_APPEND);
        $status = "✅ Card agregado.";
    } else {
        $status = "⚠️ El card ya existe en el archivo.";
    }
} else {
    file_put_contents($archivoCards, $cardHTML . "\n");
    $status = "✅ Archivo creado con el nuevo card.";
}

// 6. INTERFAZ DE CONFIRMACIÓN SIMPLE
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Sincronizador</title>
    <link rel="stylesheet" href="../../css/estilos_de_tu_blog.css">
</head>
<body style="font-family: sans-serif; padding: 20px;">
    <h2><?php echo $status; ?></h2>
    <div style="border: 1px solid #ccc; padding: 20px; display: inline-block;">
        <h3>Vista Previa:</h3>
        <?php echo $cardHTML; ?>
    </div>
    <br><br>
    <a href="../../Archivador/ArchivadorMain.html">Ir al Archivador</a>
</body>
</html>
<?php $conexion->close(); ?>