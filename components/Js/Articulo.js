
//DESPLACAMIENTO DE INDEX SUAVE ENTRE SECCION ASECCION
document.querySelectorAll('.index-list a').forEach(anchor => {
    anchor.addEventListener('click', function(e) {
        e.preventDefault();
            const targetId = this.getAttribute('href');
            const targetElement = document.querySelector(targetId);
                
            window.scrollTo({
                 top: targetElement.offsetTop - 20,
                    behavior: 'smooth'
                });
            });
        });

//DINAMICA IMPLEMENTADA DESDE: INDEX.CSS
//IMPLEMENTACION DE JAVA SCRIPT

//DECLARAMOS VARIABLES
const menuMobile = document.querySelector("#btnIndex");           //BOTONES
const sideBarMobile = document.querySelector(".sidebar-left");      //CLASSE
const mediaQueryTablet = window.matchMedia('(max-width: 1024px)');   //MEDI_QUERY

// CSS inicial
//ESTO MODIFICA EL CSS INCIAL
if (!mediaQueryTablet.matches){
    sideBarMobile.style.cssText = `
    transform: translateX(0);
    transition: none;
`;
}


menuMobile.addEventListener("click", function () {
    if (mediaQueryTablet.matches) {
        // Alternar clase 'abierto'
        sideBarMobile.classList.toggle('abierto');
        
        // Si tiene la clase, está abierto
        if (sideBarMobile.classList.contains('abierto')) {
            sideBarMobile.style.cssText = `
             transform: translateX(0);
             transition: transform 0.9s cubic-bezier(0.4, 0, 0.2, 1);
             `;
        } else {
            sideBarMobile.style.cssText = `
             transform: translateX(100%);
             transition: transform 0.9s cubic-bezier(0.4, 0, 0.2, 1);
             `;
        }
    }

});

// IMPORTANTE: Resetear cuando volvamos a desktop
mediaQueryTablet.addEventListener('change', function(e) {
    if (!e.matches) {
        // Estamos en desktop - resetear estilos
        sideBarMobile.style.cssText = '';
        sideBarMobile.classList.remove('abierto');
    }
});

//RUTAS DESTACADAS RANDOM
// datos.js
async function cargarJSON() {
    try {
        // Ruta relativa al archivo JSON
        const respuesta = await fetch('/components/json/rutasDestacadas.json');
        
        if (!respuesta.ok) {
            throw new Error(`Error HTTP: ${respuesta.status}`);
        }
        
        const datos = await respuesta.json();
        console.log('Datos cargados:', datos);
        usarDatos(datos);
        
    } catch (error) {
        console.error('Error cargando JSON:', error);
    }
}



function mostrarRutas() {
    // 1. Seleccionar el elemento EXACTO
    const zona = document.getElementById(".index-list2");
    
    // 2. Verificar que existe
    if (!zona) {
        console.log('No se encontró .index-list2');
        return;
    }
    console.log("Se han cargado los datos json")
    // 3. Insertar contenido
    zona.innerHTML = `
    <ul>
        ${datos.destacados.map(item => `
            <li><a href="${item.ruta}">${item.titulo}</a></li>
        `).join('')}
    </ul>
`;
}


cargarJSON();
mostrarRutas();