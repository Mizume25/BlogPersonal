# BlogPersonal
Respositorio donde se almacenara todos los archivos que desarollen en relacion a mi blog personal.

# 30 / 10 / 2025 - 31/12/2005 - Actualizacion de los ultimos 2 meses

# Estructura web
- Elementos nuevos añadidos:
    1º Implementacion de JavaScript en index y plantillas html
    2º Icono de pagina web 
    3º Diseño de responsive al día + borradores de figma
    4º Actualicacion de documentacion de la página web

# Diseño Desktop - Index Principal
    Index: El Layout de los elementos se estructuran en 4 secciones
        - Titulo
        - Side Bar Izquierdo
        - Side Bar Derecho 
        - Cuerpo 
    Partes a añadir a un en proceso:
# Responsive Index
    Index: El Layout de los elemntos se compone unicamente del cuerpo
        -Menu Desplegable: Side bar derecho desplegable

# Wireframe Disponible en:
https://www.figma.com/design/5uXMY6rJbF9OqUG0j12IFw/MIBlogPersonal?node-id=0-1&t=j9fP8RxcJGhvnOlH-1

# Diseño Desktop - Articulos   
    Articulos: El Layout de los elemntos se estructuran en 4 secciones
        -Titulo General + Imagen Header
        - Side Bar Izquierdo: Indice de contenido + links internos
        - Side bar Derecho: Contenido de perfil, reddes y otros articulos...
        - Cuerpo General: Articulo redactado: (texto, imagenes,tablas,secciones etc..)
# Responsive Articulos
    Articulos: El Layour de los elementos se reducen al cuerpo
        - Menu Desplegable: Indice de contenido dinamico
        - Sin Imagen header, ni titulo general solo titulo de articulo
        - Implementacion de seccion de redes sociales y borrado del side bar derecho
# Diseño Desktop + Responsive - Post
    Post: Contendra todos los elementos desktop y responsive de un Articulo (sin imagen titulo ni titulo principal) solo titulo general

# Diferencia entre Post / Articulo
    -Articulos: Los articulos seran trabajos y redacciones terminadas, amlgamadas en un historail de apuntes y notas, y finalizada en na sola redaccion
    -Post: Sera un redacto inacabado que se sometera a actualizaciones constantes (Nuevas secciones, nuevos posts al respecto o en relacion etc.)


# Estructura de Carpetas web
Tengo 2 matices que puntualizar mi estructura web de mi hsot remoto pose un estructura nueva llamada "Bienvenida"

    - 1º El index.html junto con (indexestilo.css + indexScript.js) seran los unico elementos "desnudos" en la página principal
    - 2º El resto de estructuras se organizara de la siguiente forma:

        Ej. Articulos: 
            Estructura Principal:
                - Articulos
                    - Archivos CSS
                    - Archivos HTML
                    - Archivos JS
                    - Articulos Destacados
                    - Articulos Generales
                    - ImagenesArticulos

Toda nueva implementacion contendra elmento principal > archivador (html,css,js) + complemento de imagenes. Junto a eso habra 2 secciones.
    
    - Seccion Destacada: Articulos que se resaltan en la pagina principal o en otros links
    - Seccion General: Articulos que se resaltan en la web en general y no estan muy pronunciadas

# Tecnologías implementadas y recursos usados hasta la fecha
    - Java Script: Transicion de index internos, transicion de sidebars y modificacion y creaccion de classes particulares 
    - CSS: classes, ids, pseudoElementos, :hover,:before, 
    - HTML: Estructura basica de elemento de contenidores modernos (main,section,article,aside etc...)

# Complementos 
    - La carpeta web contiene carpetas css y webfonts para manejar localmente el icono de menu mobil
    - La carpeta web contiene elemntos Docs no subidas al respositorio
    - La carpeta web contiene elementos de iamgenes blog para el desarollo de una seccion principal más robusta
