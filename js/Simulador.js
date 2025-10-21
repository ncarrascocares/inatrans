$(document).ready(function() {
    let funcion = '';

    cargarsimulador();
    cargarmantencion();

    function cargarsimulador() {
        funcion = 'listar_simuladores';
        $.post('../controlador/SimuladorController.php', { funcion }, (response) => {
            const simulador = JSON.parse(response);
            let template = '<option>Selecciona simulador</option>';
            simulador.forEach(simulador => {
                template += `<option value="${simulador.id_simulador}">${simulador.nombre_simulador}</option>`;
            });

            selectsimulador.innerHTML = template;
        });
    }

    function cargarmantencion() {
        funcion = 'listar_mantencion';
        $.post('../controlador/MantencionController.php', { funcion }, (response) => {
            const manten = JSON.parse(response);
            let template = '<option>Selecciona mantención</option>';
            manten.forEach(manten => {
                template += `<option value="${manten.id_mantenimiento}">${manten.nombre_mantenimiento}</option>`;
            });

            tipo_mant.innerHTML = template;
        });
    }

    $('#new_element').submit(e => {
        let name = $('#name_equipo').val();
        let periocidad = $('#periocidad').val();
        let codigo = $('#codigo_elemento').val();
        let sub = $('#sub_equipo').val();
        let tipo = $('#tipo_mant').val();
        let detalles = $('#detalle_sub').val();
        
        console.log(name,periocidad,codigo,sub,tipo,detalles);

     });

     

})

