$(document).ready(function() {
    funcion = '';
    horas_funcionamiento();

    function horas_funcionamiento() {
        template_tab = '';
        funcion = 'listar_horas_funcionamiento';
        $.post('../controlador/ReporteController.php', { funcion }, (response) => {
            //console.log(response);
            const res = JSON.parse(response);
            res.forEach(res => {
                template_tab += `
                <div class="col-md-4">
                            <div class="card card-widget widget-user-2">
                                <div class="bg-gray color-palette">
                                    <div class="widget-user-image">

                                    </div>
                                    <!-- /.widget-user-image -->
                                    <h3 class="widget-user-username">${res.nombre_simulador}</h3>
                                </div>
                                <div class="card-footer p-0">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <div class="nav-link">
                                                Total de horas <span class="float-right badge bg-primary">${res.horas_servicios}</span>
                                            </div>
                                        </li>
                                        <li class="nav-item">
                                            <div class="nav-link">
                                                Total Horas fuera de servicio <span class="float-right badge bg-success">${res.horas_paradas}</span>
                                            </div>
                                        </li>
                                        <li class="nav-item">
                                            <div class="nav-link">
                                                Horas fuera de servicio programados <span class="float-right badge bg-danger">0</span>
                                            </div>
                                        </li>
                                        <li class="nav-item">
                                            <div class="nav-link">
                                            Horas fuera de servicio NO programados <span class="float-right badge bg-info">1</span>
                                            </div>
                                        </li>
                                        <li class="nav-item">
                                        <div class="nav-link">
                                            Cumplimiento 
                                                <span class="float-right badge bg-danger">`;
                if (`${(100*(res.horas_servicios-res.horas_paradas))/res.horas_servicios}` === '-Infinity') {
                    template_tab += ``;
                } else {
                    template_tab += `${(100*(res.horas_servicios-res.horas_paradas))/res.horas_servicios}%`;
                }
                template_tab += `</span>
                                        </div>
                                    </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    `;
            });

            $('#tabla_reporte').html(template_tab);
        })

    }
})