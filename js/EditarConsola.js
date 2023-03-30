$(document).ready(function() {

    let funcion = '';
    let id_consola = $('#id_consola').val();
    let serie = $('#serie_equipo');
    let serie_ped = $('#serie_pedalera');
    let ubicacion = $('#ubicacion');
    let dongle = $('#dongle');
    let detalle_consola = $('#detalle_consola');

    select(id_consola);

    function select(dato) {
        template_ubi = '';
        template_don = '';
        funcion = 'select_consola_id';
        $.post('../controlador/ConsolaController.php', { dato, funcion }, (response) => {

            let ser_con = '';
            let ser_ped = '';
            let ubi = '';
            let don = '';
            let det = '';
            const consola = JSON.parse(response);
            consola.forEach(consola => {
                ser_con += `${consola.serial_consola}`;
                ser_ped += `${consola.serial_pedalera}`;
                ubi += `${consola.ubicacion}`;
                don += `${consola.id_dongle}`;
                det += `${consola.detalle}`;
            });

            //ESTOS SON LOS VALORES QUE SE MUESTRAN EN LOS INPUT DEL FORMULARIO
            serie.val(ser_con);
            serie_ped.val(ser_ped);
            ubicacion.val(ubi);
            dongle.val(don);
            detalle_consola.val(det);
            view_lab(ubi);
            view_dongle(don);
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
            $('#ubicacion').html(template_lab);
        })
    }

    function view_dongle(dato) {
        let template_don = "";
        funcion = 'listar_dongle';
        $.post('../controlador/DongleController.php', { funcion }, (response) => {
            //console.log(response);
            const dongle = JSON.parse(response);
            template_don += `<option value="0">Sin dongle</option>`;
            dongle.forEach(dongle => {
                if (`${dongle.id_dongle}` === dato) {
                    template_don += `<option value="${dongle.id_dongle}" selected style="color:red;">${dongle.identificador}</option>`;
                } else {
                    template_don += `<option value="${dongle.id_dongle}">${dongle.identificador}</option>`;
                }
            });
            $('#dongle').html(template_don);
        })
    }

    $('#form_update_consola').on('click', '#update_consola', (e) => {
        let test = false;
        let conta = 0;
        funcion = 'update_consola';
        //Variables desde los input del formulario, al presionar el boton editar estos se asignaran
        let serial_consola = $('#serie_equipo').val();
        let serial_pedalera = $('#serie_pedalera').val();
        let ubicacion = $('#ubicacion').val();
        let dongle = $('#dongle').val();
        let detalle = $('#detalle_consola').val();

        $.post('../controlador/ConsolaController.php', { id_consola, serial_consola, serial_pedalera, ubicacion, dongle, detalle, funcion }, (response) => {
            console.log(response);

            if (response == 'mismos-datos') {
                $('#mismos-datos').hide('slow');
                $('#mismos-datos').show(1500);
                $('#mismos-datos').hide(2000);
                $('#mensaje').hide();
            } else {
                const ordenador = JSON.parse(response);
                ordenador.forEach(ordenador => {

                    if (ordenador[0] === 'consola_update') {
                        conta += 1;
                    }
                    if (ordenador[1] === 'pedalera_update') {
                        conta += 1;
                    }
                    if (ordenador[2] === 'ubicacion_update') {
                        conta += 1;
                    }
                    if (ordenador[3] === 'detalle_update') {
                        conta += 1;
                    }
                    if (ordenador[4] === 'dongle_update') {
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
                $('#consola_ok').hide('slow');
                $('#consola_ok').show(1500);
                $('#consola_ok').hide(2000);
                $('#form_update_consola').trigger('reset');
                $('#mensaje').hide();
                $('#update_consola').hide();
            }

        })

        e.preventDefault();
    })

})