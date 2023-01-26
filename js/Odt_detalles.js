$(document).ready(function() {

    let funcion = '';

    let id_usuario = $('#id_usuario').val();
    let id_reporte = $('#id_reporte').val();

    console.log(id_usuario);
    console.log(id_reporte);

    buscar_historial(id_reporte);

    function buscar_historial(dato) {
        funcion = 'listar_reporte_por_id';

        $.post('../controlador/OdtController.php', { funcion, dato }, (response) => {

            const reporte_historial = JSON.parse(response);
            let template = '';
            reporte_historial.forEach(reporte_historial => {
                template += `<div class="row">
                    <div class="col-md-12">
                        <div class="timeline">
                            <div class="time-label">
                                <span class="bg-red">${reporte_historial.fecha_crea_historial_reporte}</span>
                            </div>
                            <div>
                                <i class="fas fa-comments bg-yellow"></i>
                                <div class="timeline-item">
                                    <h3 class="timeline-header">${reporte_historial.usuario_id}</h3>
                                    <div class="timeline-body">
                                    ${reporte_historial.comentario_historial_reporte}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>`;
            });
            $('#reporte_historial').html(template);
        })
    }


})