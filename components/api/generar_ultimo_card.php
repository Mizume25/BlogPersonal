<?php
// 1. CONFIGURACIÓN DE ERRORES Y CABECERAS
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
header('Content-Type: text/html; charset=utf-8');

// 2. INCLUIR CONEXIÓN
require_once 'database.php';

// 3. FUNCIÓN PARA GENERAR HTML DE CARD
function generarCardHTML($publicacion) {
    // Limpiamos posibles comillas accidentales de la BD en cada campo
    $idCard            = $publicacion['Id_publicacion'];
    $tituloObra        = htmlspecialchars(trim($publicacion['Titulo_obra'], "' "));
    $tituloPublicacion = htmlspecialchars(trim($publicacion['Titulo_publicacion'], "' "));
    $descripcion       = trim($publicacion['Descripcion'], "' ");
    $descripcionCorta  = htmlspecialchars(substr($descripcion, 0, 150)) . '...';
    $autor             = htmlspecialchars(trim($publicacion['Autor'], "' "));
    $rutaArchivo       = htmlspecialchars(trim($publicacion['ruta_archivo'], "' "));
    $rutaImagen        = htmlspecialchars(trim($publicacion['ruta_imagen'], "' "));
    $categoriaBD       = strtolower(trim($publicacion['Categoria'], "' "));
    $tipoTag           = trim($publicacion['Tipo'], "' ");
    
    // Formateo de fecha y tags
    $fechaFormateada = date('d/m/Y', strtotime($publicacion['Fecha_publicacion']));
    $destacadoHTML   = ($publicacion['Destacado'] == 1) ? '<div class="tagDestacado">⭐ Destacado</div>' : '';
    $claseTag        = ($tipoTag == 'Articulo') ? 'tagArticulo' : 'tagPost';
    $textoTag        = ($tipoTag == 'Articulo') ? 'Artículo' : 'Post';

    return <<<HTML
<a href="$rutaArchivo" class="card-link" data-id="$idCard" data-categoria="$categoriaBD">
    <div class="card">
        <header class="headCard">
            <h2>$tituloObra</h2>
            <div class="tagContent">
                <div class="$claseTag">$textoTag</div>
                $destacadoHTML
            </div>
        </header>
        <main class="bodyCard">
            <section class="bodyimg" style="background-image: url('$rutaImagen')"></section>
            <section class="bodytxt">
                <h3>$tituloPublicacion</h3>
                <p>$descripcionCorta</p>
                <p class="autor-fecha">
                    <small>$autor • $fechaFormateada</small>
                </p>
            </section>
        </main>
    </div>
</a>
HTML;
}

// 4. OBTENER ÚLTIMA PUBLICACIÓN DE LA TABLA 'Contenido'
$sql = "SELECT * FROM Contenido ORDER BY Id_publicacion DESC LIMIT 1";
$result = $conexion->query($sql);

if (!$result) {
    die("<h2>❌ Error en consulta SQL:</h2><p>" . $conexion->error . "</p>");
}

if ($result->num_rows === 0) {
    die("<h2>📭 La tabla 'Contenido' está vacía.</h2>");
}

$ultimaPublicacion = $result->fetch_assoc();
$idActual = $ultimaPublicacion['Id_publicacion'];
$categoriaFinal = strtolower(trim($ultimaPublicacion['Categoria'], "' "));

// 5. GENERAR HTML Y DEFINIR RUTA DE ARCHIVO (CORREGIDA)
$cardHTML = generarCardHTML($ultimaPublicacion);
$archivoCards = __DIR__ . '/home/u298137555/domains/mizumeblog.com/public_html/Archivador/container/cards_generados.html';

// 6. GUARDAR O AGREGAR AL ARCHIVO
$modo = "";
if (file_exists($archivoCards)) {
    $contenidoActual = file_get_contents($archivoCards);
    $idBuscado = 'data-id="' . $idActual . '"';
    
    if (strpos($contenidoActual, $idBuscado) !== false) {
        $errorYaExiste = true;
    } else {
        file_put_contents($archivoCards, $cardHTML . "\n", FILE_APPEND);
        $modo = "agregado a";
    }
} else {
    // Si no existe, lo creamos
    $cabecera = "\n";
    file_put_contents($archivoCards, $cabecera . $cardHTML . "\n");
    $modo = "creado";
}

// 7. MOSTRAR RESULTADO AL USUARIO
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestor de Cards</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; padding: 40px; background: #f0f2f5; color: #333; }
        .container { max-width: 900px; margin: 0 auto; background: white; padding: 30px; border-radius: 12px; box-shadow: 0 4px 20px rgba(0,0,0,0.08); }
        .success-header { color: #28a745; border-bottom: 2px solid #eee; padding-bottom: 10px; }
        .error-header { color: #dc3545; }
        .info-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 10px; background: #f8f9fa; padding: 20px; border-radius: 8px; margin: 20px 0; }
        .card-preview { border: 2px dashed #007bff; padding: 20px; border-radius: 8px; margin: 20px 0; background: #fff; }
        .btn { display: inline-block; padding: 12px 24px; background: #007bff; color: white; text-decoration: none; border-radius: 6px; font-weight: bold; }
        .btn-alt { background: #6c757d; }
    </style>
</head>
<body>
    <div class="container">
        <?php if (isset($errorYaExiste)): ?>
            <h1 class="error-header">⚠️ El Card ya existe</h1>
            <p>La publicación con ID <strong><?php echo $idActual; ?></strong> ya ha sido sincronizada anteriormente.</p>
        <?php else: ?>
            <h1 class="success-header">✅ Sincronización Exitosa</h1>
            <div class="info-grid">
                <div><strong>🆔 ID:</strong> <?php echo $idActual; ?></div>
                <div><strong>📂 Archivo:</strong> cards_generados.html</div>
                <div><strong>📚 Obra:</strong> <?php echo htmlspecialchars($ultimaPublicacion['Titulo_obra']); ?></div>
                <div><strong>🏷️ Categoría:</strong> <?php echo $categoriaFinal; ?></div>
                <div><strong>📊 Estado:</strong> Archivo <?php echo $modo; ?> con éxito</div>
            </div>
            <h3>👁️ Vista Previa del Card:</h3>
            <div class="card-preview">
                <?php echo $cardHTML; ?>
            </div>
        <?php endif; ?>

        <div style="text-align: center; margin-top: 30px;">
            <a href="../../Archivador/ArchivadorMain.html" class="btn">🔗 Ir al Archivador</a>
            <a href="https://mizumeblog.com/index/components/api/generar_ultimo_card_corregido.php" class="btn btn-alt">🔄 Actualizar de nuevo</a>
        </div>
    </div>
</body>
</html>
<?php $conexion->close(); ?>