$(document).ready(function() {

    let funcion = '';
    const nueva_consola = $('#form_new_consola');
    const nuevo_dongle = $('#form_new_dongle');
    const title = document.getElementById('title_consola');

    view_lab();
    view_dongle();
    show_consola();

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
                        $('#consola-ok').trigger('reset');
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
                        view_dongle();
                        break;
                }
            })
        }

        e.preventDefault();
    })

    function show_consola() {
        let template_tab = '';
        funcion = 'listar_consola';
        $.post('../controlador/ConsolaController.php', { funcion }, (response) => {
            const consola = JSON.parse(response);
            consola.forEach(consola => {
                template_tab += `
                <tr>
                    <td style="border:1px solid black;">${consola.serial_consola}</td>
                    <td style="border:1px solid black;">${consola.serial_pedalera}</td>
                    <td style="border:1px solid black;">${consola.nom_lab}</td>
                    <td style="border:1px solid black;">${consola.detalle}</td>
                    <td style="border:1px solid black;">${consola.identificador}</td>
                    <td style="border:1px solid black;">${consola.fec_ven}</td>
                    <td style="border:1px solid black;">${consola.dias_vigencia}</td>
                    <td style="border:1px solid black;">
                    <a href="../vista/edit_consola.php?id_consola=${consola.id_consola}"><button type="button" class="edit_consola btn btn-warning" data-toggle="modal" data-target="#modalConsola" style="font-size:50%"><i class="fas fa-edit"></i></button></a>
                        <button type="button" class="btn btn-info" style="font-size:50%"><i class="fa fa-file-pdf"></i></button>
                    </td>
                </tr> 
                `;
            });
            $('#tabla_psico').append(template_tab);
        })
    }

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