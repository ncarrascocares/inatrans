$(document).ready(function() {

    let funcion = '';
    const nueva_consola = $('#form_new_consola');
    const nuevo_dongle = $('#form_new_dongle');

    view_lab();
    view_dongle();

    nueva_consola.on('click', '#new_consola', (e) => {
        //console.log('boton de agregar nueva consola')
        funcion = 'new_consola';

        let serie_equipo = $('#serie_equipo').val();
        let serie_pedalera = $('#serie_pedalera').val();
        let ubicacion = $('#ubicacion').val();
        let dongle = $('#dongle').val();
        let detalle_consola = $('#detalle_consola').val();

        if (serie_equipo === '' || serie_pedalera === '' || ubicacion === '' || dongle === '' || detalle_consola === '') {
            $('#error-datos').hide('slow');
            $('#error-datos').show(1000);
            $('#error-datos').hide(2000);
        } else {
            $.post('../controlador/ConsolaController.php', { serie_equipo, serie_pedalera, ubicacion, dongle, detalle_consola, funcion }, (response) => {
                //console.log(response);
                switch (response) {
                    case 'consola-existe':
                        $('#error_consola_existe').hide('slow');
                        $('#error_consola_existe').show(1000);
                        $('#error_consola_existe').hide(2500);
                        break;
                    case 'psico-asociado':
                        $('#error_dongle_asociado').hide('slow');
                        $('#error_dongle_asociado').show(1000);
                        $('#error_dongle_asociado').hide(2500);
                        break;
                    case 'consola-add':
                        $('#consola-ok').hide('slow');
                        $('#consola-ok').show(1000);
                        $('#consola-ok').hide(2500);
                        break;
                }
            })
        }

        e.preventDefault();
    });

    nuevo_dongle.on('click', '#new_dongle', (e) => {
        //console.log('boton de agregar nuevo dongle')
        funcion = 'new_dongle';

        let num_serial = $('#num_serial').val();
        let fecha_ven = $('#fecha_ven').val();

        if (num_serial === '' || fecha_ven === '') {
            $('#error_datos_dongle').hide('slow');
            $('#error_datos_dongle').show(1000);
            $('#error_datos_dongle').hide(2000);
        } else {
            $.post('../controlador/DongleController.php', { num_serial, fecha_ven, funcion }, (response) => {
                //console.log(response);
                switch (response) {
                    case 'dongle-existe':
                        $('#error_dongle_existe').hide('slow');
                        $('#error_dongle_existe').show(1000);
                        $('#error_dongle_existe').hide(2500);
                        break;
                    case 'dongle-add':
                        $('#dongle-ok').hide('slow');
                        $('#dongle-ok').show(1000);
                        $('#dongle-ok').hide(2500);
                        break;
                }
            })
        }

        e.preventDefault();
    })

    function view_lab() {
        let template_lab = "";
        funcion = 'listar_lab';
        $.post('../controlador/LaboratorioController.php', { funcion }, (response) => {
            //console.log(response);
            const laboratorios = JSON.parse(response);
            laboratorios.forEach(laboratorios => {
                template_lab += `<option value="${laboratorios.id_lab}">${laboratorios.nom_lab}</option>`;
            });
            $('#ubicacion').html(template_lab);
        })
    }

    function view_dongle() {
        let template_don = "";
        funcion = 'listar_dongle';
        $.post('../controlador/DongleController.php', { funcion }, (response) => {
            //console.log(response);
            const dongle = JSON.parse(response);
            dongle.forEach(dongle => {
                template_don += `<option value="${dongle.id_dongle}">${dongle.identificador}</option>`;
            });
            $('#dongle').html(template_don);
        })
    }


})