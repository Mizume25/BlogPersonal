
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

// RUTAS DESTACADAS (Carga limitada a 3 elementos)
fetch('/index/components/json/rutasDestacadas.json')
    .then(respuesta => {
        if (!respuesta.ok) throw new Error('Error al cargar el archivo JSON');
        return respuesta.json();
    })
    .then(datos => {
        const zona = document.querySelector(".index-list2");
        if (!zona) return;

        // VALIDACIÓN: Comprobar que 'datos' sea un array
        if (!Array.isArray(datos)) {
            console.error('Estructura de JSON incorrecta: Se esperaba un array.');
            zona.innerHTML = '<p>Formato de datos no válido</p>';
            return;
        }

        // Tomamos solo los primeros 3 elementos del array
        const destacados = datos.slice(0, 3);

        if (destacados.length === 0) {
            zona.innerHTML = '<p>No hay rutas disponibles</p>';
            return;
        }

        let html = '<ul>';
        destacados.forEach(item => {
            // Nota: Usamos item.title para coincidir con tu JSON
            const titulo = item.title || 'Sin título';
            const enlace = item.ruta || '#';
            
            html += `<li><a href="${enlace}">${titulo}</a></li>`;
        });
        html += '</ul>';

        zona.innerHTML = html;
    })
    .catch(error => {
        console.error('Error cargando JSON:', error);
        const zona = document.querySelector(".index-list2");
        if (zona) zona.innerHTML = '<p>Error cargando rutas</p>';
    });



// RUTAS DESTACADAS CON FILTRADO DE PÁGINA ACTUAL
fetch('/index/components/json/rutasDestacadas.json')
    .then(respuesta => {
        if (!respuesta.ok) throw new Error('No se pudo cargar el JSON');
        return respuesta.json();
    })
    .then(datos => {
        const zonas = document.querySelectorAll(".index-list2");
        if (zonas.length === 0) return;

        // 1. Obtener la ruta actual del navegador (ej: /Articulos/Articulos_Destacados/Shiki.html)
        const rutaActual = window.location.pathname;

        // 2. Filtrar: Solo incluimos elementos cuya ruta NO sea la actual
        let filtrados = datos.filter(item => item.ruta !== rutaActual);

        // 3. Seleccionar los primeros 3 (si la ruta no coincidía con ninguna, filtrados tendrá todos los items)
        const destacados = filtrados.slice(0, 3);

        // 4. Generar el HTML (Solo li > a)
        let htmlContenido = "";
        destacados.forEach(item => {
            const titulo = item.title || "Sin título";
            const enlace = item.ruta || "#";
            htmlContenido += `<li><a href="${enlace}">${titulo}</a></li>`;
        });

        // 5. Inyectar en todas las listas detectadas
        zonas.forEach(zona => {
            zona.innerHTML = htmlContenido;
        });
    })
    .catch(error => {
        console.error('Error:', error);
    });

