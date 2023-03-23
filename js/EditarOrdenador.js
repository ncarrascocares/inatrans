$(document).ready(function() {
    let id_ordenador = $('#id_ordenador').val();
    let funcion = '';

    console.log(id_ordenador)
    selectOrdenador(id_ordenador);

    function selectOrdenador(dato) {
        let marca = '';
        let modelo = '';
        let sis_ope = '';
        let av = '';
        let consola = '';
        let labo = '';
        let detalle = '';
        funcion = 'selectOrdenador';
        $.post('../controlador/OrdenadorController.php', { dato, funcion }, (response) => {
            let ordenador = JSON.parse(response);
            ordenador.forEach(ordenador => {

            })
        })
    }

    function view_lab() {
        template_lab = "";
        funcion = 'listar_lab';
        $.post('../controlador/LaboratorioController.php', { funcion }, (response) => {
            //console.log(response);
            const laboratorios = JSON.parse(response);
            laboratorios.forEach(laboratorios => {
                template_lab += `<option value="${laboratorios.id_lab}">${laboratorios.nom_lab}</option>`;
            });
            $('#laboratorio').html(template_lab);
        })
    }

    // Inicio de la  funcion para obtener el listado de dongles para luego mostrarlos en el front a traves de los option del select del formulario
    function view_consola() {
        template_consola = "";
        funcion = 'listar_consola';
        $.post('../controlador/ConsolaController.php', { funcion }, (response) => {
            //console.log(response);
            const consola = JSON.parse(response);
            template_consola = `<option value="NULL" selected>No aplica</option>`;
            consola.forEach(consola => {
                template_consola += `<option value="${consola.id_consola}">${consola.serial_consola}</option>`;
            });
            $('#consola_psico').html(template_consola);
        })
    }
    // Fin de la función
})