<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!---Icono web & estilos css-->
    <link rel="icon" type="image/x-icon" href="../Home/IMG/Icon.png">
    <!---Fuentes instaladas-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&display=swap" rel="stylesheet">
    <!---Icono Menu Mobil-->
    <link rel="stylesheet" href="../css/all.min.css">
</head>

<body>
    <!-- Título que cambiará dinámicamente -->
    <h1 id="titulo-seccion"></h1>

    <!-- Tus cards existentes aquí -->
    <div class="cards-grid-container">

        <!-- =========================================== -->
        <!-- SECCIÓN 1: TUS 5 CARDS MANUALES (PRIMERO) -->
        <!-- =========================================== -->

        <a href="../Articulos/Articulos_Destacados/Shiki.html" class="card-link">
            <div class="card" data-id="1" data-categoria="animemanga">
                <header class="headCard">
                    <h2>Shiki</h2><!--Titulo-->
                    <div class="tagContent">
                        <div class="tagArticulo">Articulo</div><!--Formato-->

                    </div>
                </header>
                <main class="bodyCard">
                    <section class="bodyimg" style="background-image: url('IMG/Cards/AnimeManga/Shiki.jpg');">
                        <!--Cambiar Imagen de fondo-->

                    </section>
                    <section class="bodytxt">
                        <h3>El Vitalismo de Sotoba</h3><!--Titulo de Post/Articulo-->
                        <p>Recopilación de mis Notas de Marzo a Abril de lectura de Shiki
                            una de las obras escritas por Fuyumi Ono, adaptada a anime y manga,
                            articulo que desmenuza las figuras mas importantes de la obra....
                        </p>
                        <!--Pequeña nota-->

                    </section>
                </main>
            </div>
        </a>

        <a href="../Post/Post_Generales/Seccion AnimeManga/COTE.html" class="card-link">
            <div class="card" data-id="2" data-categoria="animemanga">
                <header class="headCard">
                    <h2>COTE</h2><!--Titulo-->
                    <div class="tagContent">
                        <div class="tagPost">Post</div><!--Formato-->

                    </div>
                </header>
                <main class="bodyCard">
                    <section class="bodyimg" style="background-image: url('IMG/Cards/AnimeManga/Cote.jpg');">
                        <!--Cambiar Imagen de fondo-->

                    </section>
                    <section class="bodytxt">
                        <h3>Classroom of the Elite</h3><!--Titulo de Post/Articulo-->
                        <p>Como lector desde hace años, me he tomado el tiempo no solo de leer la obra, sino de
                            analizarla volumen tras
                            volumen, sacando conclusiones nuevas por cada arco culminado.
                        </p>
                        <!--Pequeña nota-->

                    </section>
                </main>
            </div>
        </a>

        <a href="../Post/Post_Destacados/TextosAntonioMachado.html" class="card-link">
            <div class="card" data-id="3" data-categoria="literatura">
                <header class="headCard">
                    <h2>Textos de Machado</h2><!--Titulo-->
                    <div class="tagContent">
                        <div class="tagPost">Post</div><!--Formato-->

                    </div>
                </header>
                <main class="bodyCard">
                    <section class="bodyimg" style="background-image: url('IMG/Cards/Literatura/Machado.jpg');">
                        <!--Cambiar Imagen de fondo y ajustar posicion si es necesario-->

                    </section>
                    <section class="bodytxt">
                        <h3>Antología</h3><!--Titulo de Post/Articulo-->
                        <p>Analisis y comentarios generales sobre varios poemas de Antonio Machado
                        </p>
                        <!--Pequeña nota-->

                    </section>
                </main>
            </div>
        </a>


        <a href="../Post/Post_Destacados/TextosMallarme.html" class="card-link">
            <div class="card" data-id="4" data-categoria="literatura">
                <header class="headCard">
                    <h2>Textos de Mallarmé</h2><!--Titulo-->
                    <div class="tagContent">
                        <div class="tagPost">Post</div><!--Formato-->

                    </div>
                </header>
                <main class="bodyCard">
                    <section class="bodyimg" style="background-image: url('IMG/Cards/Literatura/Mallarme.jpg');">
                        <!--Cambiar Imagen de fondo y ajustar posicion si es necesario-->

                    </section>
                    <section class="bodytxt">
                        <h3>Antología</h3><!--Titulo de Post/Articulo-->
                        <p>Llegué a su obra cúspide del tan hablado poema de “Herodías”. Para ser honesto analizar cada
                            poema bajo
                            una noción clara de ignorancia poética e interpretación es duro....
                        </p>
                        <!--Pequeña nota-->

                    </section>
                </main>
            </div>
        </a>



        <a href="../Post/Post_Destacados/TextosStendhal.html" class="card-link">
            <div class="card" data-id="5" data-categoria="literatura">
                <header class="headCard">
                    <h2>Textos de Stendhal</h2><!--Titulo-->
                    <div class="tagContent">
                        <div class="tagPost">Post</div><!--Formato-->

                    </div>
                </header>
                <main class="bodyCard">
                    <section class="bodyimg" style="background-image: url('IMG/Cards/Literatura/Stendhal.jpg');">
                        <!--Cambiar Imagen de fondo y ajustar posicion si es necesario-->

                    </section>
                    <section class="bodytxt">
                        <h3>Obras</h3><!--Titulo de Post/Articulo-->
                        <p>Comentarios sobre las obras de Stendhal
                        </p>
                        <!--Pequeña nota-->

                    </section>
                </main>
            </div>
        </a>
    </div>


    <!-- =========================================== -->
    <!-- SECCIÓN 2: CARDS GENERADOS DESDE BD (DESPUÉS) -->
    <!-- =========================================== -->

     <?php
    // Incluir archivo con cards generados automáticamente
    $archivoGenerados = 'cards_generados.html';
    if (file_exists($archivoGenerados)) {
        
        include $archivoGenerados;
    } else {
        
    }
    ?>

</body>

</html>