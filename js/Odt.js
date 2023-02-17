$(document).ready(function() {

    let id_usuario = $('#id_usuario').val();
    const tipo_user = $('#tipo_usuario').val();
    let estado = $('#estado').val();
    let title = document.getElementById('title');
    const btn = document.getElementById('button_crear');
    const select = document.getElementById("simulador_id");
    //const editar = document.getElementById("modal-editar");


    mensaje(estado);
    btn_bloqueo(tipo_user)

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
        location.href = "../vista/adm_odt_detalles.php?reporte=" + id + "&estado=" + estado;
    });

    $('#tabla_reporte tbody').on('click', '.generar', function() {
        let datos = tabla_tarea.row($(this).parents()).data();
        let id = datos.id_reporte;
        location.href = "../vista/pdf.php?reporte=" + id;
    });

    $('#tabla_reporte tbody').on('click', '.editar', function() {
        let datos = tabla_tarea.row($(this).parents()).data();
        //Acá debemos insertar los valores en el modal para la realización de un update
    });

    //En esta función se realiza el envio de los datos al controlador, pero necesito pegar los datos en el modal
    $('#form-editar-odt').submit(e => {
        let sim = $('#simulador').val();

        console.log(sim);

        e.preventDefault();
    })



    //Listando los valores del select para seleccionar el simulador
    for (i = 1; i <= 11; i++) {
        option = document.createElement("option");
        option.value = i;
        option.text = "Simulador " + i;
        select.appendChild(option);
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

        let funcion = "guardar_reporte";
        $.post('../controlador/OdtController.php', { id_usuario, simulador_id, instructor, averia_reporte, categoria_id, fecha_crea, tipo_averia_id, tipo_odt, funcion }, (response) => {
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