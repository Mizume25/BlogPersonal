# BlogPersonal

> Este proyecto fue la versión inicial de mi blog personal. 
> Superado y reemplazado por [MizumeBlog](https://mizumeblog.es/), construido con 
> Laravel 11, React y TypeScript.

## Objetivo y contexto
Este proyecto nació como mi primer acercamiento real al desarrollo web completo,
combinando HTML, CSS y JavaScript en el frontend con una base de datos y PHP en 
el backend. Fue desarrollado entre mediados de 2025 y Enero 2026, y representa 
el punto donde dejé de hacer ejercicios aislados para construir algo funcional 
y desplegado.

## Qué construí
La idea central era un blog personal con generación dinámica de posts. En lugar
de escribir cada card a mano en HTML, diseñé un sistema donde los datos de cada 
post se almacenan en una base de datos MySQL en Hostinger, y un script PHP los 
recupera para generar los cards automáticamente en el frontend.

Esto me obligó a entender por primera vez conceptos como la separación entre 
frontend y backend, las peticiones a base de datos, y la sincronización entre 
entorno local y remoto.

## Stack utilizado
HTML, CSS y JavaScript en el frontend. PHP y MySQL mediante PHPMyAdmin en 
Hostinger como backend. Figma para el diseño previo de todas las vistas.

## Diseño
El proyecto contó con una fase de diseño previa en Figma, donde trabajé el
responsive de todas las páginas antes de implementarlas.
[Ver diseño en Figma](https://www.figma.com/design/5uXMY6rJbF9OqUG0j12IFw/MIBlogPersonal)

El diseño responsive fue implementado íntegramente con CSS puro, sin frameworks 
como Tailwind ni Bootstrap, lo que me obligó a entender en profundidad los media 
queries y el comportamiento nativo del modelo de caja en distintos viewports.

## Qué aprendí y por qué quedó superado
Este proyecto me enseñó a conectar las piezas de una aplicación web real por
primera vez: diseño, frontend, backend y base de datos. Sin embargo, la 
arquitectura era frágil, el PHP estaba acoplado directamente al HTML, no había
separación de responsabilidades, y el sistema de actualización era manual.

MizumeBlog resuelve todos estos problemas con una arquitectura moderna: Laravel
como API REST en el backend y React con TypeScript como frontend desacoplado,
con autenticación robusta y una estructura preparada para escalar.