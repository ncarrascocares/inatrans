$(document).ready(function() {
    let funcion = '';
    let boton_crear = document.getElementById('button-crear');

    console.log(boton_crear)

    //las siguientes lineas se activan cuando se da click al btn crear, lo cual nos envía hacia el fichero creaEquipo.php
    boton_crear.addEventListener('click', () => {
        window.location.href = '../vista/creaEquipo.php';
    })

})