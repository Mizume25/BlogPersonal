# Blog Personal - Nueva Estructura e implementacion.
Este proyecto comenzo con una vaga estructura web que lentamente fui cambiando. hot a 15/01/2026 realice,
grandes cambios a la dinamica web que llevaba hasta el momento.

## Idea General - Propositos, ideas y practicas.
Esta implementación web fue pensada neta y exclusivamente para familiarizarme con lenguaje de marcas **HTML**,un lenguaje de estilos tan robusto como **CSS** e introducir e implementar funciones **Js** que puedan resultar practicas. 

### Estructura web


├───.github         *<-- Workflow  de mi Github con mi Host Remoto*
│   └───workflows
│   
├───Archivador      *<-- Carpeta Principal donde se movera el Usuario*
│   ├───container
│   │      └───Pagina1.php    *<-- Pagina de Cards Filtrados por seccion*
│   └───IMG                   *<-- Pagina que contiene Imagenes de los Cards*
│       └───Cards
│           ├───Academica
│           ├───AnimeManga
│           ├───Literatura
│           └───Reflexiones
├───Articulos                 *<-- Carpeta qeu contiene todos los Articulos*
│   ├───Articulos_Destacados   *<-- Destacados
│   │   └───IMG
│   │       └───ImagenesShiki
│   └───Articulos_Generales     *<-- Generales*
│       ├───Seccion_AnimeManga
│       │   ├───Articulos
│       │   │   ├───Anime
│       │   │   ├───Manga
│       │   │   └───Novela
│       │   └───IMG
│       ├───Seccion_Didactica
│       │   ├───Articulos
│       │   └───IMG
│       ├───Seccion_Literatura
│       │   ├───Articulos
│       │   └───IMG
│       └───Seccion_Reflexiones
│           ├───Articulos
│           └───IMG
├───components        *<-- Archivador de archivos CSS,JS, y plantillas HTML*
│   ├───Js              
│   ├───styles
│   └───templates   
├───css                *<-- Lista de codigo de iconos FontAweson Icons*
├───Docs                *<-- Documentacion*
├───Home  
│   ├───home.html               **<-- Pagina Principal**
│   ├───IMG
│       └───Icons
├───Post
│   ├───Post_Destacados
│   └───Post_Generales
│       ├───Seccion Academico
│       ├───Seccion AnimeManga
│       │   └───IMG
│       │       ├───COTE
│       │       └───ej
│       ├───Seccion Literatura
│       └───Seccion Reflexiones
└───webfonts