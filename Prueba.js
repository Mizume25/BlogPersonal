//IMPLEMENTACION JAVA SCRIPT

//DECLARAMOS VARIABLES
const menuMobile = document.querySelector("#buttonMenu");           //BOTONES
const sideBarMobile = document.querySelector(".menuMobile");      //CLASSE
const mediaQueryTablet = window.matchMedia('(max-width: 770px)');   //MEDI_QUERY





/*
//IMPLEMENTACION DE JAVA SCRIPT

//DECLARAMOS VARIABLES
const menuMobile = document.querySelector("#buttonMenu");           //BOTONES
const sideBarMobile = document.querySelector(".left-sidebar");      //CLASSE
const mediaQueryTablet = window.matchMedia('(max-width: 770px)');   //MEDI_QUERY

// CSS inicial
//ESTO MODIFICA EL CSS INCIAL
sideBarMobile.style.cssText = `
    transform: translateX(0);
    transition: none;
`;

menuMobile.addEventListener("click", function () {
    if (mediaQueryTablet.matches) {
        // Alternar clase 'abierto'
        sideBarMobile.classList.toggle('abierto');
        
        // Si tiene la clase, está abierto
        if (sideBarMobile.classList.contains('abierto')) {
            sideBarMobile.style.cssText = `
             
             transform: translateX(0);
             transition: transform 0.9s cubic-bezier(0.9, 0, 0.1, 1);
             
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

*/