$(document).ready(function() {

    let funcion = '';
    //console.log('Hola Mundo');

    estado_simulador();

    function estado_simulador() {
        funcion = 'estado_simulador';
        $.post('../controlador/SimuladorController.php', { funcion }, (response) => {
            const est_simulador = JSON.parse(response);
            let template = '';
            est_simulador.forEach(est_simulador => {
                template += `

                        <div class="col-md-4">
                            <div class="card card-widget widget-user-2">
                                <div class="bg-gray color-palette">
                                    <div class="widget-user-image">

                                    </div>
                                    <!-- /.widget-user-image -->
                                    <h3 class="widget-user-username">Simuador ${est_simulador.id_simulador}</h3>
                                    <h5 class="widget-user-desc">${est_simulador.nombre_sucursal}</h5>
                                </div>
                                <div class="card-footer p-0">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                Estado <span class="float-right badge bg-primary">${est_simulador.nombre_status}</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                Averias Reportadas <span class="float-right badge bg-info">12</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                Averias finalizadas <span class="float-right badge bg-success">11</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                Averias abiertas <span class="float-right badge bg-danger">1</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>                              
                `;
            });

            $('#estado_simulador').html(template);
        });
    }
});