$(document).ready(function() {

    let id_usuario = $('#id_usuario').val();
    const tipo_user = $('#tipo_usuario').val();
    let estado = $('#estado').val();
    let title = document.getElementById('title');
    const btn = document.getElementById('button_crear');
    const select = document.getElementById("simulador_id");

    mensaje(estado);
    btn_bloqueo(tipo_user)
    listado()


    function btn_bloqueo(dato) {
        if (tipo_user == '3') {
            btn.style.display = 'none';
        }
    }

    function mensaje(dato) {
        switch (dato) {
            case '0':
                title.textContent = "ODT'S Cerradas";
                break;
            case '1':
                title.textContent = "ODT'S Abiertas"
                break
        }
    }

    let funcion = 'listar_reportes';
    let tabla_tarea = $('#tabla_reporte').DataTable({

        ajax: {
            "url": "../controlador/OdtController.php",
            "method": "POST",
            "data": {
                funcion: funcion,
                dato: estado
            },
        },

        columns: [
            { data: 'id_reporte' },
            { data: 'simulador_id' },
            { data: 'averia_reporte' },
            { data: 'clasificacion' },
            { data: 'fecha_crea' },
            { data: 'responsable' },
            { data: 'nombre_categoria' },
            { data: 'nombre_averia' },
            { "defaultContent": botones(estado) }
        ],
        "language": idiomaDataTable()
    });

    $('#tabla_reporte tbody').on('click', '.ver', function() {
        let datos = tabla_tarea.row($(this).parents()).data();
        let id = datos.id_reporte;
        location.href = "../vista/ordenesDetalles.php?reporte=" + id + "&estado=" + estado;
    });

    $('#tabla_reporte tbody').on('click', '.generar', function() {
        let datos = tabla_tarea.row($(this).parents()).data();
        let id = datos.id_reporte;
        location.href = "../vista/pdf.php?reporte=" + id;
    });

    $('#tabla_reporte tbody').on('click', '.editar', function() {
        let datos = tabla_tarea.row($(this).parents()).data();
        let id_reporte_edit = document.getElementById('id_reporte_edit');
        let sim = document.getElementById('simulador');
        let averia_reporte_edit = document.getElementById('averia_reporte_edit');
        let comentario_edit = document.getElementById('comentario_edit');
        let tipo_odt_edit = document.getElementById('tipo_odt_edit');
        let categoria_id_edit = document.getElementById('categoria_id_edit');
        let fecha_crea_edit = document.getElementById('fecha_crea_edit');
        let tipo_averia_id_edit = document.getElementById('tipo_averia_id_edit');

        //Cargando los datos a los campos de texto del formulario
        id_reporte_edit.value = datos.id_reporte;
        sim.value = datos.simulador_id;
        averia_reporte_edit.value = datos.averia_reporte;
        tipo_odt_edit.innerHTML = modal(datos.clasificacion);
        categoria_id_edit.innerHTML = modal(datos.nombre_categoria);
        fecha_crea_edit.value = datos.fecha_crea;
        tipo_averia_id_edit.innerHTML = modal_(datos.nombre_averia);

    });

    //En esta función se realiza el envio de los datos al controlador, pero necesito pegar los datos en el modal
    $(document).on('click', '#btn_edit', (e) => {
        funcion = 'editar_reporte';
        let id_rep = $('#id_reporte_edit').val();
        let sim = $('#simulador').val();
        let ave = $('#averia_reporte_edit').val();
        let tip = $('#tipo_odt_edit').val();
        let cat = $('#categoria_id_edit').val();
        let fecha = $('#fecha_crea_edit').val();
        let tip_ave = $('#tipo_averia_id_edit').val();
        let sop_ext = $('#soporte_externo_edit').val();
        //Enviar vía post los datos al backend para insertar en la bd
        $.post('../controlador/OdtController.php', { funcion, id_rep, sim, ave, tip, cat, fecha, tip_ave, sop_ext }, (response) => {
            console.log(response)
            if (response == 'yes-update') {
                $('#edit-report').hide('slow');
                $('#edit-report').show(1000);
                $('#edit-report').hide(2000);
                //Accion para que todos los campos input se reseteen
                $('#form_editar_odt').trigger('reset');
            } else {
                $('#no-edit-report').hide('slow');
                $('#no-edit-report').show(1000);
                $('#no-edit-report').hide(2000);
                //Accion para que todos los campos input se reseteen
                $('#form_editar_odt').trigger('reset');
            }
        })


        e.preventDefault();
    })


    //Listando los valores del select para seleccionar el simulador
    function listado() {
        for (i = 1; i <= 14; i++) {
            option = document.createElement("option");
            if (i == 12 || i == 13 || i == 14) {
                if (i == 12) {
                    option.value = 12;
                    option.text = "Laboratorio Antofagasta";
                    select.appendChild(option);
                }
                if (i == 13) {
                    option.value = 13;
                    option.text = "Laboratorio Iquique";
                    select.appendChild(option);
                }
                if (i == 14) {
                    option.value = 14;
                    option.text = "Laboratorio Santiago";
                    select.appendChild(option);
                }

            }
            if (i <= 11) {
                option.value = i;
                option.text = "Simulador " + i;
                select.appendChild(option);
            }
        }
    }

    $('#form-crear-reporte').submit(e => {
        //Recibiendo los datos del formulario
        let id_usuario = $('#id_usuario').val();
        let simulador_id = $('#simulador_id').val();
        let instructor = $('#instructor').val();
        let averia_reporte = $('#averia_reporte').val();
        let categoria_id = $('#categoria_id').val();
        let fecha_crea = $('#fecha_crea').val();
        let tipo_averia_id = $('#tipo_averia_id').val();
        let tipo_odt = $('#tipo_odt').val();
        let sop_ext = $('#soporte_externo').val();

        let funcion = "guardar_reporte";
        $.post('../controlador/OdtController.php', { id_usuario, simulador_id, instructor, averia_reporte, categoria_id, fecha_crea, tipo_averia_id, tipo_odt, sop_ext, funcion }, (response) => {
            //console.log(response);
            if (response == 'odt-insertada') {
                $('#new-report').hide('slow');
                $('#new-report').show(1000);
                $('#new-report').hide(2000);

                //Accion para que todos los campos input se reseteen
                $('#form-crear-reporte').trigger('reset');
            } else {
                $('#no-new-report').hide('slow');
                $('#no-new-report').show(1000);
                $('#no-new-report').hide(2000);

                //Accion para que todos los campos input se reseteen
                $('#form-crear-reporte').trigger('reset');
            }
        })

        e.preventDefault();
    });


});