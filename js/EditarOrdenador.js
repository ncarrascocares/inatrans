$(document).ready(function() {
    let id_ordenador = $('#id_ordenador').val();

    let funcion = '';
    selectOrdenador(id_ordenador);

    function selectOrdenador(dato) {
        let id_ordenador = '';
        let marca = '';
        let modelo = '';
        let sis_ope = '';
        let av = '';
        let consola_id = '';
        let serial_consola = '';
        let labo = '';
        let detalle = '';
        funcion = 'selectOrdenador';
        $.post('../controlador/OrdenadorController.php', { dato, funcion }, (response) => {
            const ordenador = JSON.parse(response);
            ordenador.forEach(ordenador => {
                id_ordenador += `${ordenador.id_ord}`;
                marca += `${ordenador.marca_ord}`;
                modelo += `${ordenador.mod_ord}`;
                sis_ope += `${ordenador.sis_ope}`;
                av += `${ordenador.antivirus}`;
                consola_id += `${ordenador.consola_id}`;
                labo += `${ordenador.laboratorio_id}`;
                detalle += `${ordenador.detalle}`;
                serial_consola += `${ordenador.serial_consola}`;
            })

            $('#marca_equipo').val(marca);
            $('#modelo_equipo').val(modelo);
            $('#sis_operativo').val(sis_ope);
            $('#antivirus').val(av);
            $('#consola_psico').val(consola_id);
            $('#laboratorio').val(labo);
            $('#detalle_equipo').val(detalle);
            view_lab(labo)
            view_consola(consola_id)
        })


    }

    function view_lab(dato) {
        let template_lab = "";
        funcion = 'listar_lab';
        $.post('../controlador/LaboratorioController.php', { funcion }, (response) => {

            const laboratorios = JSON.parse(response);
            laboratorios.forEach(laboratorios => {
                if (`${laboratorios.id_lab}` === dato) {
                    template_lab += `<option value=${laboratorios.id_lab} selected style="color:red;">${laboratorios.nom_lab}</option>`;
                } else {
                    template_lab += `<option value=${laboratorios.id_lab}>${laboratorios.nom_lab}</option>`;
                }
            });
            $('#laboratorio').html(template_lab);
        })
    }

    // Inicio de la  funcion para obtener el listado de dongles para luego mostrarlos en el front a traves de los option del select del formulario
    function view_consola(dato) {
        //console.log(dato);
        template_consola = "";
        funcion = 'listar_consola';
        $.post('../controlador/ConsolaController.php', { funcion }, (response) => {
            const consola = JSON.parse(response);
            template_consola += `<option value="0">No aplica</option>`;
            consola.forEach(consola => {
                template_consola += `<option value="${consola.id_consola}">${consola.serial_consola}</option>`;
                if (`${consola.id_consola}` === dato) {
                    template_consola += `<option value="${consola.id_consola}" selected style="color:red;">${consola.serial_consola}</option>`;
                }
            });

            $('#consola_psico').html(template_consola);
        })
    }
    // Fin de la función

    $('#update_ordenador').on('click', (e) => {
        let test = false;
        let conta = 0;
        funcion = 'update_ordenador'
        let id_ordenador = $('#id_ordenador').val();
        let marca = $('#marca_equipo').val();
        let modelo = $('#modelo_equipo').val();
        let sis_ope = $('#sis_operativo').val();
        let av = $('#antivirus').val();
        let consola_psico = $('#consola_psico').val();
        let labo = $('#laboratorio').val();
        let detalle = $('#detalle_equipo').val();

        $.post('../controlador/OrdenadorController.php', { id_ordenador, marca, modelo, sis_ope, av, consola_psico, labo, detalle, funcion }, (response) => {
            if (response == 'mismos-datos') {
                $('#mismos-datos').hide('slow');
                $('#mismos-datos').show(1500);
                $('#mismos-datos').hide(2000);
                $('#mensaje').hide();
            } else {
                const ordenador = JSON.parse(response);
                ordenador.forEach(ordenador => {

                    if (ordenador[0] === 'marca_update') {
                        conta += 1;
                    }
                    if (ordenador[1] === 'modelo_update') {
                        conta += 1;
                    }
                    if (ordenador[2] === 'so_update') {
                        conta += 1;
                    }
                    if (ordenador[3] === 'antivirus_update') {
                        conta += 1;
                    }
                    if (ordenador[4] === 'detalle_update') {
                        conta += 1;
                    }
                    if (ordenador[5] === 'laboratorio_update') {
                        conta += 1;
                    }
                    if (ordenador[6] === 'consola_update') {
                        conta += 1;
                    } else {
                        test = true;
                        if (test = true) {
                            $('#mensaje').show(500);
                        }
                    }
                })
            }
            if (conta >= 1) {
                $('#ordenador_ok').hide('slow');
                $('#ordenador_ok').show(1500);
                $('#ordenador_ok').hide(2000);
                $('#form_update_ordenador').trigger('reset');
                $('#mensaje').hide();
                $('#update_ordenador').hide();
            }
        })
        e.preventDefault();
    })


})