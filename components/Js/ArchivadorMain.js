// --- VARIABLES GLOBALES ---
const screen = document.querySelector("#screen");
const btnSectionOne = document.querySelector("#section1");
const btnSectionTwo = document.querySelector("#section2");
const btnSectionThree = document.querySelector("#section3");
const btnSectionFour = document.querySelector("#section4");
const headerSectionimg = document.querySelector(".imagenheader");

const titulosSecciones = {
    1: "Academico",
    2: "Literatura", 
    3: "Anime y Manga",
    4: "Reflexiones"
};

// --- FUNCIONES DE INTERFAZ ---
function cambiarTitulo(numero) {
    const tituloElement = document.querySelector("#titulo-seccion");
    if (tituloElement) {
        tituloElement.textContent = titulosSecciones[numero] || "Archivador";
    }
}

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

// --- LÓGICA DE CARGA ASÍNCRONA ---
// Ahora devuelve una Promesa para que podamos esperar a que termine
function cargarPaginaInicial() {
    return new Promise((resolve, reject) => {
        if (!screen) {
            console.error("No se encontró #screen");
            reject("No screen element");
            return;
        }
        
        fetch('container/Pagina1.php')
            .then(response => {
                if (!response.ok) throw new Error(`HTTP error! status: ${response.status}`);
                return response.text();
            })
            .then(html => {
                screen.innerHTML = html;
                console.log("✅ página1.php cargada"); 
                resolve(); // Notificamos que la carga terminó
            })
            .catch(error => {
                console.error("Error cargando página:", error);
                screen.innerHTML = '<p>Error cargando contenido</p>';
                reject(error);
            });
    });
}

// --- SISTEMA DE FILTRADO ---
function filtrarPorCategoria(categoria) {
    console.log(`🎯 Filtrando: ${categoria}`);
    
    // Seleccionamos todos los enlaces (manuales y dinámicos)
    const allLinks = document.querySelectorAll('.card-link');
    let contador = 0;

    allLinks.forEach(link => {
        // Buscamos la categoría en el link o en el card interno
        const cat = link.getAttribute('data-categoria') || link.querySelector('.card').getAttribute('data-categoria');
        
        if (cat === categoria) {
            link.style.display = 'block';
            link.classList.remove('link-disabled');
            contador++;
        } else {
            link.style.display = 'none';
            link.classList.add('link-disabled');
        }
    });

    // Actualización de títulos
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

    // Manejo de mensaje de vacío
    if (contador === 0) {
        mostrarMensaje(`No hay contenido en ${categoria}`);
    } else {
        ocultarMensaje();
    }
    
    console.log(`📊 Mostrando ${contador} cards de ${categoria}`);
}

function mostrarMensaje(texto) {
    ocultarMensaje();
    const contenedor = document.querySelector('.cards-grid-container');
    if (!contenedor) return;
    const mensaje = document.createElement('div');
    mensaje.className = 'mensaje-sin-cards';
    mensaje.innerHTML = `<div style="text-align: center; padding: 40px; grid-column: 1 / -1; color: #666;"><h3>📭 ${texto}</h3></div>`;
    contenedor.appendChild(mensaje);
}

function ocultarMensaje() {
    const mensaje = document.querySelector('.mensaje-sin-cards');
    if (mensaje) mensaje.remove();
}

// --- SELECCIÓN Y EVENTOS ---
function seleccionarSeccion(numeroSeccion) {
    console.log(`📍 Seleccionando sección ${numeroSeccion}`);
    
    [btnSectionOne, btnSectionTwo, btnSectionThree, btnSectionFour].forEach(b => {
        if (b) b.classList.remove("sectionSelect");
    });
    
    const botones = [null, btnSectionOne, btnSectionTwo, btnSectionThree, btnSectionFour];
    if (botones[numeroSeccion]) botones[numeroSeccion].classList.add("sectionSelect");
    
    cambiarFondoSuave(numeroSeccion);
    
    const categoriasMap = { 1: 'academico', 2: 'literatura', 3: 'animemanga', 4: 'reflexiones' };
    filtrarPorCategoria(categoriasMap[numeroSeccion]);
}

function inicializarEventos() {
    if (btnSectionOne) btnSectionOne.addEventListener('click', () => seleccionarSeccion(1));
    if (btnSectionTwo) btnSectionTwo.addEventListener('click', () => seleccionarSeccion(2));
    if (btnSectionThree) btnSectionThree.addEventListener('click', () => seleccionarSeccion(3));
    if (btnSectionFour) btnSectionFour.addEventListener('click', () => seleccionarSeccion(4));
    
    const menuMobile = document.querySelector("#menuMobile");
    if (menuMobile) {
        menuMobile.addEventListener('change', function() {
            seleccionarSeccion(parseInt(this.value));
        });
    }
}

// --- INICIO DE LA APLICACIÓN ---
document.addEventListener('DOMContentLoaded', () => {
    console.log("🚀 Iniciando Archivador...");
    
    // 1. Primero preparamos los botones
    inicializarEventos();
    
    // 2. Cargamos la página y SOLO cuando termine, filtramos
    cargarPaginaInicial()
        .then(() => {
            console.log("🎯 Ejecutando filtro inicial...");
            filtrarPorCategoria('academico'); // Ahora sí encontrará las cards
        })
        .catch(err => console.error("La inicialización falló:", err));
});