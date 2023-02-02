$(document).ready(function() {

    let funcion = '';
    //console.log('Hola Mundo');

    estado_simulador();
    total_reporte();
    total_reporte_cerradas(0);
    total_reporte_abiertas(1);

    function estado_simulador() {
        funcion = 'estado_simulador';
        $.post('../controlador/SimuladorController.php', { funcion }, (response) => {
            const est_simulador = JSON.parse(response);
            let template = '';
            let contador = 0;
            est_simulador.forEach(est_simulador => {

                if (contador < 9) {
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
                                                Mantenimiento Preventivo <span class="float-right badge bg-info">12</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                Mantenimiento Correctivo <span class="float-right badge bg-success">11</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                Horas de funcionamiento <span class="float-right badge bg-danger">1</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>`;
                }else{
                    template += `
                        <div class="col-md-6">
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
                                                Mantenimiento Preventivo <span class="float-right badge bg-info">12</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                Mantenimiento Correctivo <span class="float-right badge bg-success">11</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                Horas de funcionamiento <span class="float-right badge bg-danger">1</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>`;
                }
                contador++;
            });

            console.log(contador);

            $('#estado_simulador').html(template);
        });
    }

    function total_reporte() {
        funcion = 'total_reporte';
        $.post('../controlador/SimuladorController.php', { funcion }, (response) => {
            let total_reporte = response;

            //padre del elemento; para indicar donde se insertara el elemento a crear
            const padre_elemento = document.getElementById('total_reporte');
            //Creacion de elemento
            const elemento = document.createElement('H3');
            elemento.textContent = total_reporte; //Asignado valor al elemento

            //insertando el elemento dentro del elemento padre
            padre_elemento.appendChild(elemento);

        });
    }

    function total_reporte_cerradas(dato) {
        funcion = 'total_reporte_cerradas';
        $.post('../controlador/SimuladorController.php', { funcion, dato }, (response) => {
            let total_reporte_cerradas = response;

            //padre del elemento; para indicar donde se insertara el elemento a crear
            const padre_elemento = document.getElementById('total_reportes_cerradas');
            //Creacion de elemento
            const elemento = document.createElement('H3');
            elemento.textContent = total_reporte_cerradas; //Asignado valor al elemento

            //insertando el elemento dentro del elemento padre
            padre_elemento.appendChild(elemento);

        });
    }

    function total_reporte_abiertas(dato) {
        funcion = 'total_reporte_abiertas';
        $.post('../controlador/SimuladorController.php', { funcion, dato }, (response) => {
            let total_reporte_abiertas = response;

            //padre del elemento; para indicar donde se insertara el elemento a crear
            const padre_elemento = document.getElementById('total_reportes_abiertas');
            //Creacion de elemento
            const elemento = document.createElement('H3');
            elemento.textContent = total_reporte_abiertas; //Asignado valor al elemento

            //insertando el elemento dentro del elemento padre
            padre_elemento.appendChild(elemento);

        });
    }

});