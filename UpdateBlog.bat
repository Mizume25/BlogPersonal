@echo off
title Sincronizador Maestro - MizumeBlog
echo 1. Enviando peticion de sincronizacion al servidor...
echo.

:: --- CONFIGURACION ---
set "USER=Admin"
set "PASS=@Blog_Mizume67/89"

:: URL que ejecuta la lógica de base de datos a HTML
set "URL_PHP=https://mizumeblog.com/index/components/api/generar_ultimo_card.php"

:: URL donde reside el archivo HTML ya generado
set "URL_HTML=https://mizumeblog.com/index/Archivador/container/cards_generados.html"

:: Ruta local donde quieres guardar el archivo (ajustala si es necesario)
set "RUTA_LOCAL=Archivador/container/cards_generados.html"

:: --- PROCESO ---

:: A. Ejecutamos el PHP para que el servidor cree el card internamente
curl --user "%USER%:%PASS%" -s "%URL_PHP%"

echo.
echo 2. Descargando el archivo actualizado para sobrescribir local...

:: B. Descargamos el archivo HTML del servidor y lo guardamos en tu PC
:: El parametro -o (minuscula) sirve para definir el archivo de salida
curl --user "%USER%:%PASS%" -s "%URL_HTML%" -o "%RUTA_LOCAL%"

echo.
echo --------------------------------------------------
echo [EXITO] Servidor actualizado y copia local sincronizada.
echo --------------------------------------------------
pause