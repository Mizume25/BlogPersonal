//Script de "pantalla"
// Al inicio de tu script, verifica:

// Si alguno es null, el problema está en el HTML
//DECLARAMOS VARIABLES
const screen = document.querySelector("#screen");   //La pantalla
const btnSectionOne = document.querySelector("#section1"); // "Boton"
const btnSectionTwo = document.querySelector("#section2"); // "Boton"
const btnSectionThree = document.querySelector("#section3"); // "Boton"
const btnSectionFour = document.querySelector("#section4"); // "Boton"

const headerSectionimg = document.querySelector(".imagenheader");

//FUNCION DE CARGA
function cargarSeccion(nombreCategoria,nombreArchivo) {
    //Obtenemos el archivos
    fetch(`${nombreCategoria}/ArchivosHTML/${nombreArchivo}.html`)
        .then(response => response.text())
        .then(html => {
            //Insertar en la pantalla
            screen.innerHTML = html;
        })
        .catch(error => {
            screen.innerHTML = '<p>Error cargando contenido</p>';
        });
}

//FUNCION DE ANIMACION DE BACKGROUND-IMAGE
function cambiarFondoSuave(numero) {
    headerSectionimg.style.transition = 'opacity 1.2s ease-in-out';
    headerSectionimg.style.opacity = '0.1';
    
    setTimeout(() => {
        headerSectionimg.removeAttribute("id");
        headerSectionimg.id = `Fondo${numero}`;
        headerSectionimg.style.opacity = '1';
    }, 800);
}

//FUNCION DE CARGA DE IMAGEN
//Seccion "default"
cargarSeccion('FilosofiayCiencias','Escrutinios1');
btnSectionOne.classList.toggle("sectionSelect");
//Cargar secciones

btnSectionOne.addEventListener('click', () => {
    [btnSectionOne, btnSectionTwo, btnSectionThree, btnSectionFour]
        .forEach(b => b.classList.remove("sectionSelect"));
    btnSectionOne.classList.toggle("sectionSelect")
    cargarSeccion('FilosofiayCiencias','Escrutinios1');
    cambiarFondoSuave(1);
    
});
btnSectionTwo.addEventListener('click', () => {
    [btnSectionOne, btnSectionTwo, btnSectionThree, btnSectionFour]
        .forEach(b => b.classList.remove("sectionSelect"));

    btnSectionTwo.classList.toggle("sectionSelect")
    cargarSeccion('Literatura','Escrutinios2');
    cambiarFondoSuave(2);
});
btnSectionThree.addEventListener('click', () => {
    [btnSectionOne, btnSectionTwo, btnSectionThree, btnSectionFour]
        .forEach(b => b.classList.remove("sectionSelect"));

    btnSectionThree.classList.toggle("sectionSelect")
    cargarSeccion('AnimeManga','Escrutinios3');
    cambiarFondoSuave(3);
});
btnSectionFour.addEventListener('click', () => {
    [btnSectionOne, btnSectionTwo, btnSectionThree, btnSectionFour]
        .forEach(b => b.classList.remove("sectionSelect"));
    btnSectionFour.classList.toggle("sectionSelect")
    cargarSeccion('Reflexiones','Escrutinios4');
    cambiarFondoSuave(4);
});


/*Cargar elementos con menu mobil*/
const optionSelector = document.querySelector("#menuMobile");

// Cuando cambie la selección
optionSelector.addEventListener('change', function() {
    const valorSeleccionado = this.value;
    
    // Dependiendo del valor seleccionado, ejecutar diferentes acciones
    switch(valorSeleccionado) {
        case '1':
            cargarSeccion('FilosofiayCiencias', 'Escrutinios1');
            cambiarFondoSuave(1);
            break;
        case '2':
            cargarSeccion('Literatura', 'Escrutinios2');
            cambiarFondoSuave(2);
            break;
        case '3':
            cargarSeccion('AnimeManga', 'Escrutinios3');
            cambiarFondoSuave(3);
            break;
        case '4':
            cargarSeccion('Reflexiones', 'Escrutinios4');
            cambiarFondoSuave(4);
            break;
        default:
            console.log('Opción no válida');
    }
});



