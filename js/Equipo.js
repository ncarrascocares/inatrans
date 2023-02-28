$(document).ready(function() {
    let funcion = '';
    let guardar_equipo = document.getElementById('guardar-equipo');
    let name_equipo = document.getElementById('name_equipo');
    let contenedor_tipo_simulador = document.getElementById('contenedor_tipo_simulador');
    let name_sucursal = document.getElementById('name_sucursal');

    sucursales();

    function sucursales() {
        funcion = 'buscar_sucursal';
        $.post('../controlador/SucursalController.php', { funcion }, (response) => {
            const simulador = JSON.parse(response);
            let template = '<option>Selecciona sucursal</option>';
            simulador.forEach(simulador => {
                template += `<option value="${simulador.id_sucursal}">${simulador.nombre_sucursal}</option>`;
            });

            name_sucursal.innerHTML = template;
        });
    }


    $('#form-new-equipo').submit(e => {
        funcion = 'crear_equipo'
        let name_equipo = $('#name_equipo').val();
        let name_sucursal = $('#name_sucursal').val();
        let tipo_equipo = $('#tipo_equipo').val();
        let desc_equipo = $('#desc_equipo').val();

        $.post('../controlador/SimuladorController.php', { name_equipo, name_sucursal, tipo_equipo, desc_equipo, funcion }, (response) => {
            if (response === 'insertado') {
                $('#insert-ok').hide('slow');
                $('#insert-ok').show(1000);
                $('#insert-ok').hide(2000);
                $('#form-new-equipo').trigger('reset');
            } else {
                $('#no-insert').hide('slow');
                $('#no-insert').show(1000);
                $('#no-insert').hide(2000);
                $('#form-new-equipo').trigger('reset');
            }
        });

        e.preventDefault();

    })

})