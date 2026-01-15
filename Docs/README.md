# Blog Personal - Nueva Estructura e implementacion.
Este proyecto comenzo con una vaga estructura web que lentamente fui cambiando. hot a 15/01/2026 realice,
grandes cambios a la dinamica web que llevaba hasta el momento.

## Idea General - Propositos, ideas y practicas.
Esta implementación web fue pensada neta y exclusivamente para familiarizarme con lenguaje de marcas **HTML**,un lenguaje de estilos tan robusto como **CSS** e introducir e implementar funciones **Js** que puedan resultar practicas. 

### Estructura web


-.github           *<-- Workflow de mi Github con mi Host Remoto*
- Archivador        *<-- Carpeta Principal donde se movera el Usuario*
  - container
    - Pagina1.php    *<-- Pagina de Cards Filtrados por seccion*
  - IMG           *<-- Carpeta que contiene Imagenes de los Cards*
    - Cards
      - Academica
      - AnimeManga
      - Literatura
      - Reflexiones

- Articulos                 *<-- Carpeta que contiene todos los Articulos*
  - Articulos_Destacados     *<-- Destacados*
    - IMG
      - ImagenesShiki
  - Articulos_Generales      *<-- Generales*
    - Seccion_AnimeManga
      - Articulos
        - Anime
        - Manga
        - Novela
      - IMG
    - Seccion_Didactica
      - Articulos
      - IMG
    - Seccion_Literatura
      - Articulos
      - IMG
    - Seccion_Reflexiones
      - Articulos
      - IMG

- components        *<-- Archivador de archivos CSS, JS, y plantillas HTML*
  - Js
  - styles
  - templates

- css                *<-- Lista de codigo de iconos FontAwesome Icons*

- Docs                *<-- Documentacion*

- Home
  - home.html        **<-- Pagina Inicial**
  - IMG
    - Icons

- Post                 *<-- Carpeta que contiene todos los Post*
  - Post_Destacados
  - Post_Generales
    - Seccion Academico
    - Seccion AnimeManga
      - IMG
        - COTE
        - ej
    - Seccion Literatura
    - Seccion Reflexiones

- webfonts            *<-- Fuentes de Font Awesome*


### Backend 
Para dinamizar todo el proceso de creacion de post he implementado una Base
de datos, gracias a la orientacion de mi profesor de DAW realice un diseño
"Base" que luego modifique posteriormente segun convenga.



Con el servicio por defecto que ofrece Hostinger con PHPMyAdmin cree una base de datos de una unica entidad la cual almacenara todo los datos generales sobre los pos realizados, y yo obtendre dinamicamente esos datos
para generar cards automaticos que se almacenaran en:

**"cards_generados.html"** de esta forma en un elemento vacio se van creando
cards de manera automatica en el momento en el que de forma local yo ejecute un peticiona mi base de datos mediante archivos php que unicamente
se ecuentran en mi Hostinger protegidos por un usuario y contraseña, para
evitar peligrosamente accesos accidentales o intencionados.

La unica forma de generar cards y acceder a mi base de datos sera con mis archivos php que unicamente tengo configurado en local y en remoto y este 
ultimo protegido con contraseña.

Cuando tenga todo el post configurado (el archivo html, con una imagen,
y el resto de requisitos que pide) ejecuto un boton (no disponible en github) que realiza tanto la creacion e implemntacion dinamica del nuevo card como la copia en tiempo real de la actualizacion mas reciente de la version remota y la sobre escribira a mi local  (por si me interesa hacer ligeras modificaciones).

### Frontend
#### Diseño Figma
[Diseño web en Figma](https://www.figma.com/design/5uXMY6rJbF9OqUG0j12IFw/MIBlogPersonal?node-id=0-1&t=BpOrSO7w9mK5uCtn-1)

Plantillas, vistas generales, botones y todo estructura frontend en figma
