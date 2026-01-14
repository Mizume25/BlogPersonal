<?php
// components/api/generar_ultimo_card_corregido.php
// VERSIÓN CORREGIDA PARA TU ESTRUCTURA BD

header('Content-Type: text/html; charset=utf-8');

// 1. INCLUIR CONEXIÓN
require_once 'database.php';

// 2. FUNCIÓN PARA GENERAR HTML DE CARD (CORREGIDA)
function generarCardHTML($publicacion) {
    // Destacado
    $destacadoHTML = ($publicacion['Destacado'] == 1) ? '<div class="tagDestacado">⭐ Destacado</div>' : '';
    
    // Descripción corta
    $descripcionCorta = substr($publicacion['Descripcion'], 0, 150) . '...';
    
    // Fecha
    $fechaFormateada = date('d/m/Y', strtotime($publicacion['Fecha_publicacion']));
    
    // ID
    $idCard = $publicacion['Id_publicacion'];
    
    // CORRECCIÓN 1: Categoría en minúsculas (como en tu HTML)
    // En generar_ultimo_card.php
    $categoriaBD = strtolower(trim($publicacion['Categoria'])); 
// Esto convierte 'AnimeManga' en 'animemanga' y quita espacios extra.  
    
    // CORRECCIÓN 2: Tipo de tag (Articulo vs Post)
    $tipoTag = $publicacion['Tipo'];
    $claseTag = ($tipoTag == 'Articulo') ? 'tagArticulo' : 'tagPost';
    $textoTag = ($tipoTag == 'Articulo') ? 'Artículo' : 'Post';
    
    // Escapar datos
    $tituloObra = htmlspecialchars($publicacion['Titulo_obra']);
    $rutaArchivo = htmlspecialchars($publicacion['ruta_archivo']);
    $tipo = htmlspecialchars($tipoTag);
    $rutaImagen = htmlspecialchars($publicacion['ruta_imagen']);
    $tituloPublicacion = htmlspecialchars($publicacion['Titulo_publicacion']);
    $autor = htmlspecialchars($publicacion['Autor']);
    
// Modificación en generar_ultimo_card.php
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

// 3. OBTENER ÚLTIMA PUBLICACIÓN DE BD
$sql = "SELECT * FROM publicaciones ORDER BY Id_publicacion DESC LIMIT 1";
$result = $conexion->query($sql);

if (!$result) {
    echo "<h2>❌ Error en consulta SQL</h2>";
    echo "<p><strong>Error:</strong> " . $conexion->error . "</p>";
    exit;
}

if ($result->num_rows === 0) {
    echo "<h2>📭 No hay publicaciones en la BD</h2>";
    echo "<p>Añade una publicación en phpMyAdmin primero.</p>";
    exit;
}

$ultimaPublicacion = $result->fetch_assoc();

// DEBUG: Mostrar datos recibidos (opcional)
echo "<!-- DEBUG: ";
print_r($ultimaPublicacion);
echo " -->";

// 4. GENERAR HTML DEL CARD
$cardHTML = generarCardHTML($ultimaPublicacion);

// 5. ARCHIVO DONDE SE GUARDARÁ
$archivoCards = '../Archivador/container/cards_generados.html';

// 6. GUARDAR O AGREGAR AL ARCHIVO
if (file_exists($archivoCards)) {
    // Verificar si el card ya existe
    $contenidoActual = file_get_contents($archivoCards);
    $idBuscado = 'data-id="' . $ultimaPublicacion['Id_publicacion'] . '"';
    
    if (strpos($contenidoActual, $idBuscado) !== false) {
        echo "<h2>⚠️ Este card ya existe</h2>";
        echo "<p>El card con ID <strong>{$ultimaPublicacion['Id_publicacion']}</strong> ya está en el archivo.</p>";
        echo "<p><a href='generar_ultimo_card_corregido.php'>🔄 Intentar con otra publicación</a></p>";
        exit;
    }
    
    // AGREGAR al final
    file_put_contents($archivoCards, $cardHTML . "\n", FILE_APPEND);
    $modo = "agregado a";
} else {
    // CREAR nuevo archivo
    $cabecera = "<!-- Cards generados desde BD - " . date('Y-m-d H:i:s') . " -->\n";
    file_put_contents($archivoCards, $cabecera . $cardHTML . "\n");
    $modo = "creado";
}

// 7. MOSTRAR RESULTADO
echo <<<HTML
<!DOCTYPE html>
<html>
<head>
    <title>✅ Card Generado</title>
    <style>
        body { font-family: Arial; padding: 20px; background: #f5f5f5; }
        .container { max-width: 800px; margin: 0 auto; }
        .success { background: white; padding: 25px; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        .info-box { background: #e8f4f8; padding: 15px; border-radius: 5px; margin: 15px 0; }
        .card-preview { border: 2px dashed #ccc; padding: 20px; margin: 20px 0; background: #fafafa; }
        .btn { display: inline-block; padding: 10px 20px; margin: 5px; background: #007bff; color: white; text-decoration: none; border-radius: 5px; }
        .btn:hover { background: #0056b3; }
    </style>
</head>
<body>
    <div class="container">
        <div class="success">
            <h1 style="color: #28a745;">✅ ¡Card Generado con Éxito!</h1>
            
            <div class="info-box">
                <h3>📋 Información del Card:</h3>
                <p><strong>📁 Archivo:</strong> <code>Archivador/container/cards_generados.html</code></p>
                <p><strong>📊 Estado:</strong> {$modo} el archivo</p>
                <p><strong>🆔 ID:</strong> {$ultimaPublicacion['Id_publicacion']}</p>
                <p><strong>📚 Título obra:</strong> {$ultimaPublicacion['Titulo_obra']}</p>
                <p><strong>📝 Título publicación:</strong> {$ultimaPublicacion['Titulo_publicacion']}</p>
                <p><strong>🏷️ Categoría BD:</strong> {$ultimaPublicacion['Categoria']} → <strong>HTML:</strong> {$categoriaBD}</p>
                <p><strong>🔖 Tipo:</strong> {$ultimaPublicacion['Tipo']}</p>
                <p><strong>👤 Autor:</strong> {$ultimaPublicacion['Autor']}</p>
                <p><strong>📅 Fecha:</strong> {$ultimaPublicacion['Fecha_publicacion']}</p>
            </div>
            
            <div class="card-preview">
                <h3>👁️ Vista previa:</h3>
                {$cardHTML}
            </div>
            
            <div style="margin-top: 25px; text-align: center;">
                <a href="../../Archivador/ArchivadorMain.html" target="_blank" class="btn">
                    🔗 Ver en Archivador
                </a>
                <a href="generar_ultimo_card_corregido.php" class="btn" style="background: #6c757d;">
                    🔄 Generar otro
                </a>
                <a href="../Archivador/container/cards_generados.html" target="_blank" class="btn" style="background: #17a2b8;">
                    📄 Ver archivo generado
                </a>
            </div>
            
            <p style="margin-top: 20px; color: #666; font-size: 0.9em;">
                <strong>Nota:</strong> Los cards generados se guardan en <code>cards_generados.html</code> y se mostrarán en Pagina1.html
            </p>
        </div>
    </div>
</body>
</html>
HTML;

$conexion->close();
?>