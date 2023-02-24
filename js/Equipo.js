$(document).ready(function() {
    let funcion = '';
    let guardar_equipo = document.getElementById('guardar-equipo');
    let name_equipo = document.getElementById('name_equipo');
    let contenedor_tipo_simulador = document.getElementById('contenedor_tipo_simulador');

    name_equipo.addEventListener('keyup', (e) => {

        let valor = $('#name_equipo').val();
        console.log(valor);
        if (valor === 'L' || valor === 'l') {
            contenedor_tipo_simulador.hidden = 'true';

        }
    })

    guardar_equipo.addEventListener('click', () => {
        let name_equipo = $('#name_equipo').val();
        let name_sucursal = $('#name_sucursal').val();
        let tipo_simulador = $('#tipo_simulador').val();
        let desc_simulador = $('#desc_simulador').val();

        if (name_equipo === 'Laboratorio') {

        }
        console.log(name_equipo);
        console.log(name_sucursal);
        console.log(tipo_simulador);
        console.log(desc_simulador);

        e.preventDefault();
    })

})