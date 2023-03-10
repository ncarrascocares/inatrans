$(document).ready(function() {

    let id_lab = $('#id_laboratorio').val();
    let select_lab = document.getElementById('laboratorio');
    //let template = '';
    let funcion = '';

    //Llamada a la función
    view_lab();
    view_consola();

    // Inicio de la  funcion para obtener los laboratorios para luego mostrarlos en el front a traves de los option del select del formulario
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
    // Fin de la función

    // Inicio de la  funcion para obtener el listado de dongles para luego mostrarlos en el front a traves de los option del select del formulario
    function view_consola() {
        template_consola = "";
        funcion = 'listar_consola';
        $.post('../controlador/ConsolaController.php', { funcion }, (response) => {
            //console.log(response);
            const consola = JSON.parse(response);
            template_consola = `<option value="" selected>No aplica</option>`;
            consola.forEach(consola => {
                template_consola += `<option value="${consola.id_consola}">${consola.serial_consola}</option>`;
            });
            $('#consola_psico').html(template_consola);
        })
    }
    // Fin de la función

    $('#form-new-ordenador').submit(e => {
        funcion = 'nuevo_ordenador';

        let marca_ordenador = $('#marca_ordenador').val();
        let modelo_ordenador = $('#modelo_ordenador').val();
        let sis_operativo = $('#sis_operativo').val();
        let antivirus = $('#antivirus').val();
        let consola_psico = $('#consola_psico').val();
        let laboratorio = $('laboratorio').val();
        let desc_ordenador = $('#desc_ordenador').val();


        $.post('../controlador/OrdenadorController.php', { marca_ordenador, modelo_ordenador, sis_operativo, antivirus, consola_psico, laboratorio, desc_ordenador, id_lab, funcion }, (response) => {
            console.log(response);
        })

        console.log(marca_ordenador, modelo_ordenador)

        e.preventDefault();
    })



})