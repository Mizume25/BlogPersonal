<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../Home/IMG/Icon.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/all.min.css">
</head>

<body>
    <h1 id="titulo-seccion"></h1>

    <div class="cards-grid-container">

        <a href="../Articulos/Articulos_Destacados/Shiki.html" class="card-link" data-id="1" data-categoria="animemanga">
            <div class="card">
                <header class="headCard">
                    <h2>Shiki</h2>
                    <div class="tagContent">
                        <div class="tagArticulo">Articulo</div>
                    </div>
                </header>
                <main class="bodyCard">
                    <section class="bodyimg" style="background-image: url('IMG/Cards/AnimeManga/Shiki.jpg');"></section>
                    <section class="bodytxt">
                        <h3>El Vitalismo de Sotoba</h3>
                        <p>Recopilación de mis Notas de Marzo a Abril de lectura de Shiki una de las obras escritas por Fuyumi Ono...</p>
                    </section>
                </main>
            </div>
        </a>

        <a href="../Post/Post_Generales/Seccion AnimeManga/COTE.html" class="card-link" data-id="2" data-categoria="animemanga">
            <div class="card">
                <header class="headCard">
                    <h2>COTE</h2>
                    <div class="tagContent">
                        <div class="tagPost">Post</div>
                    </div>
                </header>
                <main class="bodyCard">
                    <section class="bodyimg" style="background-image: url('IMG/Cards/AnimeManga/Cote.jpg');"></section>
                    <section class="bodytxt">
                        <h3>Classroom of the Elite</h3>
                        <p>Como lector desde hace años, me he tomado el tiempo no solo de leer la obra, sino de analizarla volumen tras volumen.</p>
                    </section>
                </main>
            </div>
        </a>

        <a href="../Post/Post_Destacados/TextosAntonioMachado.html" class="card-link" data-id="3" data-categoria="literatura">
            <div class="card">
                <header class="headCard">
                    <h2>Textos de Machado</h2>
                    <div class="tagContent">
                        <div class="tagPost">Post</div>
                    </div>
                </header>
                <main class="bodyCard">
                    <section class="bodyimg" style="background-image: url('IMG/Cards/Literatura/Machado.jpg');"></section>
                    <section class="bodytxt">
                        <h3>Antología</h3>
                        <p>Analisis y comentarios generales sobre varios poemas de Antonio Machado.</p>
                    </section>
                </main>
            </div>
        </a>

        <a href="../Post/Post_Destacados/TextosMallarme.html" class="card-link" data-id="4" data-categoria="literatura">
            <div class="card">
                <header class="headCard">
                    <h2>Textos de Mallarmé</h2>
                    <div class="tagContent">
                        <div class="tagPost">Post</div>
                    </div>
                </header>
                <main class="bodyCard">
                    <section class="bodyimg" style="background-image: url('IMG/Cards/Literatura/Mallarme.jpg');"></section>
                    <section class="bodytxt">
                        <h3>Antología</h3>
                        <p>Llegué a su obra cúspide del tan hablado poema de “Herodías”. Poesía e interpretación pura.</p>
                    </section>
                </main>
            </div>
        </a>

        <a href="../Post/Post_Destacados/TextosStendhal.html" class="card-link" data-id="5" data-categoria="literatura">
            <div class="card">
                <header class="headCard">
                    <h2>Textos de Stendhal</h2>
                    <div class="tagContent">
                        <div class="tagPost">Post</div>
                    </div>
                </header>
                <main class="bodyCard">
                    <section class="bodyimg" style="background-image: url('IMG/Cards/Literatura/Stendhal.jpg');"></section>
                    <section class="bodytxt">
                        <h3>Obras</h3>
                        <p>Comentarios sobre las obras de Stendhal y su impacto literario.</p>
                    </section>
                </main>
            </div>
        </a>

        <?php
        $archivoGenerados = 'cards_generados.html';
        if (file_exists($archivoGenerados)) {
            include $archivoGenerados;
        }
        ?>

    </div> </body>
</html>