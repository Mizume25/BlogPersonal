@echo off
title Actualizador de Cards - MizumeBlog
echo Enviando peticion de sincronizacion...
echo.

:: La URL de tu script PHP
set "URL=https://mizumeblog.com/index/components/api/generar_ultimo_card.php"

:: Usuario y Contrasena
set "USER=Admin"
set "PASS=@Blog_Mizume67/89"

:: Ejecucion de cURL con autenticacion basica
curl --user "%USER%:%PASS%" "%URL%"

echo.
echo.
echo --------------------------------------------------
echo Proceso finalizado.
pause