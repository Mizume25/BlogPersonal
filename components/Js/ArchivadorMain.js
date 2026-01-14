//Script de "pantalla"
//DECLARAMOS VARIABLES
const screen = document.querySelector("#screen");   //La pantalla
const btnSectionOne = document.querySelector("#section1"); // "Boton"
const btnSectionTwo = document.querySelector("#section2"); // "Boton"
const btnSectionThree = document.querySelector("#section3"); // "Boton"
const btnSectionFour = document.querySelector("#section4"); // "Boton"

const headerSectionimg = document.querySelector(".imagenheader");

// TÍTULOS PARA CADA SECCIÓN
const titulosSecciones = {
    1: "Academico",
    2: "Literatura", 
    3: "Anime y Manga",
    4: "Reflexiones"
};

// FUNCIÓN PARA CAMBIAR TÍTULO EN LA PÁGINA CARGADA
function cambiarTitulo(numero) {
    const tituloElement = document.querySelector("#titulo-seccion");
    if (tituloElement) {
        tituloElement.textContent = titulosSecciones[numero] || "Archivador";
    }
}

// FUNCIÓN DE ANIMACION DE BACKGROUND-IMAGE
function cambiarFondoSuave(numero) {
    if (!headerSectionimg) return;
    
    headerSectionimg.style.transition = 'opacity 1.2s ease-in-out';
    headerSectionimg.style.opacity = '0.1';
    
    setTimeout(() => {
        headerSectionimg.removeAttribute("id");
        headerSectionimg.id = `Fondo${numero}`;
        headerSectionimg.style.opacity = '1';
    }, 800);
}

// FUNCIÓN PARA CARGAR SOLO UNA PÁGINA (la primera vez)
function cargarPaginaInicial() {
    if (!screen) {
        console.error("No se encontró #screen");
        return;
    }
    
    // Cargar SOLO página1.php
    fetch('container/Pagina1.php')
        .then(response => {
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            return response.text();
        })
        .then(html => {
            screen.innerHTML = html;
            console.log("✅ página1.php cargada");

            
            
            
        })
        .catch(error => {
            console.error("Error cargando página:", error);
            screen.innerHTML = '<p>Error cargando contenido</p>';
        });
}

// FUNCIÓN PARA MANEJAR SELECCIÓN (sin recargar página)
function seleccionarSeccion(numeroSeccion) {
    console.log(`📍 Seleccionando sección ${numeroSeccion}`);
    
    // 1. Cambiar botones activos
    [btnSectionOne, btnSectionTwo, btnSectionThree, btnSectionFour]
        .forEach(b => {
            if (b) b.classList.remove("sectionSelect");
        });
    
    // Activar botón correspondiente
    const botonActivo = [null, btnSectionOne, btnSectionTwo, btnSectionThree, btnSectionFour][numeroSeccion];
    if (botonActivo) {
        botonActivo.classList.add("sectionSelect");
    }
    
    // 2. Cambiar fondo
    cambiarFondoSuave(numeroSeccion);
    
    // 3. Cambiar título (si ya se cargó la página)
    cambiarTitulo(numeroSeccion);
}

// EVENT LISTENERS PARA BOTONES
function inicializarEventos() {
    // Botón 1
    if (btnSectionOne) {
        btnSectionOne.addEventListener('click', () => {
            seleccionarSeccion(1);
        });
    }
    
    // Botón 2
    if (btnSectionTwo) {
        btnSectionTwo.addEventListener('click', () => {
            seleccionarSeccion(2);
        });
    }
    
    // Botón 3
    if (btnSectionThree) {
        btnSectionThree.addEventListener('click', () => {
            seleccionarSeccion(3);
        });
    }
    
    // Botón 4
    if (btnSectionFour) {
        btnSectionFour.addEventListener('click', () => {
            seleccionarSeccion(4);
        });
    }
    
    // Menú móvil
    const optionSelector = document.querySelector("#menuMobile");
    if (optionSelector) {
        optionSelector.addEventListener('change', function() {
            const valorSeleccionado = parseInt(this.value);
            if (valorSeleccionado >= 1 && valorSeleccionado <= 4) {
                seleccionarSeccion(valorSeleccionado);
            }
        });
    }
}

// INICIALIZAR TODO
document.addEventListener('DOMContentLoaded', () => {
    console.log("🚀 Iniciando Archivador...");
    
    // 1. Inicializar eventos
    inicializarEventos();
    
    // 2. Cargar la página única
    cargarPaginaInicial();
});


//-----------------------------------------//
   //-------SISTEMA DE FILTRADO-------//
//-----------------------------------------//
//DECLARAMOS VARIABLES

//Selecionamos todos los divs
// Script de filtrado simple por categoría
document.addEventListener('DOMContentLoaded', function() {
    console.log("🎯 Iniciando filtro simple...");
    
    // Esperar a que cargue Pagina1.php
    setTimeout(() => {
        inicializarFiltro();
        // MOSTRAR ACADÉMICO POR DEFECTO (aunque no haya cards)
        filtrarPorCategoria('academico');
    }, 100);
});

function inicializarFiltro() {
    const btnAcademico = document.querySelector('#section1');
    const btnLiteratura = document.querySelector('#section2');
    const btnAnime = document.querySelector('#section3');
    const btnReflexiones = document.querySelector('#section4');
    const menuMobile = document.querySelector('#menuMobile');
    
    // Eventos
    if (btnAcademico) btnAcademico.addEventListener('click', () => filtrarPorCategoria('academico'));
    if (btnLiteratura) btnLiteratura.addEventListener('click', () => filtrarPorCategoria('literatura'));
    if (btnAnime) btnAnime.addEventListener('click', () => filtrarPorCategoria('animemanga'));
    if (btnReflexiones) btnReflexiones.addEventListener('click', () => filtrarPorCategoria('reflexiones'));
    
    if (menuMobile) {
        menuMobile.addEventListener('change', function() {
            const map = { '1': 'academico', '2': 'literatura', '3': 'animemanga', '4': 'reflexiones' };
            if (map[this.value]) filtrarPorCategoria(map[this.value]);
        });
    }
    
    console.log("✅ Filtro simple inicializado");
}

function filtrarPorCategoria(categoria) {
    console.log(`🎯 Filtrando: ${categoria}`);
    
    // 1. Ocultar TODOS
    document.querySelectorAll('[data-categoria]').forEach(card => {
        card.style.display = 'none';
    });
    
    // 2. Mostrar SOLO los de esta categoría
    const cardsMostrar = document.querySelectorAll(`[data-categoria="${categoria}"]`);
    cardsMostrar.forEach(card => {
        card.style.display = 'block';
    });
    
    // 3. Actualizar título (opcional)
    const titulo = document.querySelector('#titulo-seccion');
    if (titulo) {
        const nombres = {
            'academico': 'Académico',
            'literatura': 'Literatura', 
            'animemanga': 'Anime y Manga',
            'reflexiones': 'Reflexiones'
        };
        titulo.textContent = nombres[categoria] || 'Archivador';
    }
    
    // 4. Mostrar mensaje si no hay cards
    if (cardsMostrar.length === 0) {
        mostrarMensaje(`No hay contenido en ${categoria}`);
    } else {
        ocultarMensaje();
    }
    
    console.log(`📊 Mostrando ${cardsMostrar.length} cards de ${categoria}`);
}

function mostrarMensaje(texto) {
    ocultarMensaje();
    const contenedor = document.querySelector('.cards-grid-container');
    if (!contenedor) return;
    
    const mensaje = document.createElement('div');
    mensaje.className = 'mensaje-sin-cards';
    mensaje.innerHTML = `<div style="text-align: center; padding: 40px; grid-column: 1 / -1; color: #666;">
        <h3>📭 ${texto}</h3>
        <p>Prueba otra sección</p>
    </div>`;
    
    contenedor.appendChild(mensaje);
}

function ocultarMensaje() {
    const mensaje = document.querySelector('.mensaje-sin-cards');
    if (mensaje) mensaje.remove();
}
