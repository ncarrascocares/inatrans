$(document).ready(function() {
    let funcion = '';
    let boton_crear = document.getElementById('button-crear');

    console.log(boton_crear)

    boton_crear.addEventListener('click', () => {
        window.location.href = '../vista/adm_Crea_Equipo.php';
    })

})