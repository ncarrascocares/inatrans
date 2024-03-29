$(document).ready(function() {

    let funcion = '';

    let id_usuario = $('#id_usuario').val();
    let id_reporte = $('#id_reporte').val();
    let estado = $('#estado').val();
    const tipo_user = $('#tipo_usuario').val();
    let title = document.getElementById('titulo');
    let card = document.getElementById('card');
    let btn = document.getElementById('button-crear-comentario');
    let template = '';
    let estatus = 1;

    buscar_historial(id_reporte);
    buscar_reporte(id_reporte);
    mensaje(estado);
    //btn_bloqueo(tipo_user);


    // function btn_bloqueo(dato) {
    //     if (tipo_user == '3') {
    //         btn.style.display = 'none';
    //     }
    // }

    function mensaje(dato) {
        switch (dato) {
            case '0':
                title.textContent = "Historial de comentarios";
                btn.style.display = 'none';
                break;
            case '1':
                title.textContent = "Historial de comentarios";
                break;
        }
    }

    function buscar_reporte(dato) {
        funcion = 'reporte_original';
        $.post('../controlador/OdtController.php', { funcion, dato }, (response) => {
            let template = '';
            const reporte = JSON.parse(response);
            reporte.forEach(reporte => {
                template += `
                <div class="card">
                    <div class="card-header">
                        <h5>Problema reportado<h5>
                    </div>
                    <div class="card-body">
                        <p>
                            <h6><cite title="Source Title">${reporte.averia_reporte}</cite></h6>
                        </p>
                    </div>
                </div>
               `;
            });
            $('#reporte_original').html(template);
        })
    }

    function buscar_historial(dato) {
        funcion = 'listar_reporte_por_id';

        $.post('../controlador/OdtController.php', { funcion, dato }, (response) => {
            const reporte_historial = JSON.parse(response);
            let template = '';

            reporte_historial.forEach(reporte_historial => {
                estatus = reporte_historial.estatus_reporte;
                //console.log(reporte_historial.estatus_reporte)
                template += `<div class="row">
                    <div class="col-md-12">
                        <div class="timeline">
                            <div class="time-label">
                                <span class="bg-red">${reporte_historial.fecha_crea_historial_reporte}</span>
                            </div>
                            <div>
                                <i class="fas fa-comments bg-yellow"></i>
                                <div class="timeline-item">
                                    <h3 class="timeline-header">${reporte_historial.responsable}</h3>
                                    <div class="timeline-body">
                                    ${reporte_historial.comentario_historial_reporte}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>`;
            });
            //console.log(estatus);
            if (estatus == 0 || tipo_user == '3') {
                template += `<button type="button" class="delete btn btn-danger"style="font-size:100%;display:none"><i class="fas fa-window-close"></i>Cerrar ODT</button>`;
                $('#reporte_historial').html(template);
            } else {
                template += `<button type="button" class="delete btn btn-danger"style="font-size:100%"><i class="fas fa-window-close"></i>Cerrar ODT</button>`;
                $('#reporte_historial').html(template);
            }
        })
    } //Fin de la función


    $('#form_insert_report').submit(e => {
        funcion = 'insertar_comentario';
        let new_comentario = $('#comentario').val();

        $.post('../controlador/OdtController.php', { new_comentario, funcion, id_reporte, id_usuario }, (response) => {
            //console.log(response);
            if (response == 'new_insert') {
                $('#insert-ok').hide('slow');
                $('#insert-ok').show(1000);
                $('#insert-ok').hide(2000);

                //Accion para que todos los campos input se reseteen
                $('#form_insert_report').trigger('reset');
                buscar_historial(id_reporte);
            }
        })


        e.preventDefault();
    });

    //Se debe validar que el usuario que crea el reporte sea quien pueda borrarlo.
    $(document).on('click', '.delete', function borrar() {
        funcion = 'borrar_reporte';
        console.log(id_reporte);
        $.post('../controlador/OdtController.php', { funcion, id_reporte, id_usuario }, (response) => {
            if (response == 'yes-delete') {
                $('#delete').hide('slow');
                $('#delete').show(1000);
                $('#delete').hide(2000);

                buscar_historial(id_reporte);
            } else {
                $('#no-delete').hide('slow');
                $('#no-delete').show(1000);
                $('#no-delete').hide(2000);

                buscar_historial(id_reporte);
            }
        });

    });


})