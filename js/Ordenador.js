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
            template_consola = `<option value="NULL" selected>No aplica</option>`;
            consola.forEach(consola => {
                template_consola += `<option value="${consola.id_consola}">${consola.serial_consola}</option>`;
            });
            $('#consola_psico').html(template_consola);
        })
    }
    // Fin de la función

    $('#form_new_ordenador').submit(e => {
        funcion = 'nuevo_ordenador';

        let marca_ordenador = $('#marca_ordenador').val();
        let modelo_ordenador = $('#modelo_ordenador').val();
        let sis_operativo = $('#sis_operativo').val();
        let antivirus = $('#antivirus').val();
        let consola_psico = $('#consola_psico').val();
        let desc_ordenador = $('#desc_ordenador').val();
        let id_lab = $('#laboratorio').val();

        //Validación en caso de llegar datos vacios desde el front
        if (marca_ordenador == '' || modelo_ordenador == '' || sis_operativo == '' || antivirus == '' || desc_ordenador == '') {
            $('#no-datos').hide('slow');
            $('#no-datos').show(1000);
            $('#no-datos').hide(2000);
        } else {
            $.post('../controlador/OrdenadorController.php', { marca_ordenador, modelo_ordenador, sis_operativo, antivirus, consola_psico, id_lab, desc_ordenador, funcion }, (response) => {
                //console.log(response);
                if (response == 'insert_new_ordenador') {
                    $('#ordenador-ok').hide('slow');
                    $('#ordenador-ok').show(1000);
                    $('#ordenador-ok').hide(2000);

                    $('#form_new_ordenador').trigger('reset');
                } else {
                    $('#no-insert').hide('slow');
                    $('#no-insert').show(1000);
                    $('#no-insert').hide(2000);

                    $('#form_new_ordenador').trigger('reset');
                }
            })
        }


        //console.log(marca_ordenador, modelo_ordenador)

        e.preventDefault();
    })


})