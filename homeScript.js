//IMPLEMENTACION DE JAVA SCRIPT

//DECLARAMOS VARIABLES
const menuMobile = document.querySelector("#buttonMenu");           //BOTONES
const sideBarMobile = document.querySelector(".left-sidebar");      //CLASSE
const mediaQueryTablet = window.matchMedia('(max-width: 770px)');   //MEDI_QUERY
const bodyPage = document.querySelector(".content");
const headPage = document.querySelector("header");

// CSS inicial
//ESTO MODIFICA EL CSS INCIAL
// SOLO aplicar CSS inicial si NO estamos en móvil
if (!mediaQueryTablet.matches) {
    sideBarMobile.style.cssText = `
        transform: translateX(0);
        transition: none;
    `;
}




menuMobile.addEventListener("click", function () {
    
    if (mediaQueryTablet.matches) {
        // Alternar clase 'abierto'
        sideBarMobile.classList.toggle('abierto');
        bodyPage.classList.toggle('efecto')
        headPage.classList.toggle('efecto')
        // Si tiene la clase, está abierto
        if (sideBarMobile.classList.contains('abierto')) {
            //Abierto
            sideBarMobile.style.cssText = `
             
             transform: translateX(0);
             transition: transform 0.9s cubic-bezier(0.9, 0, 0.1, 1);
             
             `;
             headPage.style.cssText = `
             opacity: 0.9;
             filter: blur(1px);
             transition: all 0.9s ease-in-out;
             filter: brightness(0.8); 
             `
             bodyPage.style.cssText = `
             opacity: 0.9;
             filter: blur(1px);
             transition: all 0.9s ease-in-out;
             filter: brightness(0.8); 
             `

        } else {
            //Cerrado
            sideBarMobile.style.cssText = `
             
             transform: translateX(100%);
             transition: transform 0.9s cubic-bezier(0.4, 0, 0.2, 1);
             
             `;
             headPage.style.cssText = `
             opacity: 1;
             filter: none;
             transition: none;
             filter: none;
             `
             bodyPage.style.cssText = `
             opacity: 1;
             filter: none;
             transition: none;
             filter: none; 
             `
        }
    }

});

if (mediaQueryTablet.matches) {
    document.addEventListener('click', function(e) {
        // Verificar que NO se hizo click en el sidebar o botón del menú
        if (sideBarMobile.classList.contains('abierto') &&
            !sideBarMobile.contains(e.target) && 
            e.target !== menuMobile) {
            
            sideBarMobile.style.cssText = `
                transform: translateX(100%);
                transition: transform 0.9s cubic-bezier(0.4, 0, 0.2, 1);
            `;
            sideBarMobile.classList.remove('abierto');
        }
    });
    
    // Añadir stopPropagation al botón del menú
    menuMobile.addEventListener('click', function(e) {
        e.stopPropagation(); // Esto sí es correcto
        // ... tu código del botón ...
    });
}

// IMPORTANTE: Resetear cuando volvamos a desktop
mediaQueryTablet.addEventListener('change', function(e) {
    if (!e.matches) {
        // Estamos en desktop - resetear estilos
        sideBarMobile.style.cssText = '';
        sideBarMobile.classList.remove('abierto');
    }
});

