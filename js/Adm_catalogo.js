$(document).ready(function() {
    const cam_est = document.getElementById('cam_est');
    const tipo_user = $('#tipo_user').val();
    const btn = document.getElementById('cam_est');
    let funcion = '';
    //console.log('Hola Mundo');

    estado_simulador();
    total_reporte();
    btn_bloqueo(tipo_user);
    total_reporte_cerradas(0);
    total_reporte_abiertas(1);


    function btn_bloqueo(dato) {
        if (tipo_user == '3') {
            btn.style.display = 'none';
        }
    }

    function estado_simulador() {
        funcion = 'estado_simulador';
        $.post('../controlador/SimuladorController.php', { funcion }, (response) => {
            const est_simulador = JSON.parse(response);
            let template = '';
            let contador = 0;
            est_simulador.forEach(est_simulador => {
                //console.log(est_simulador.total)
                if (contador < 12) {
                    template += `
                        <div class="col-md-4">
                            <div class="card card-widget widget-user-2">
                                <div class="bg-gray color-palette">
                                    <div class="widget-user-image">

                                    </div>
                                    <!-- /.widget-user-image -->
                                    <h3 class="widget-user-username">${est_simulador.nombre_simulador}</h3>
                                    <h5 class="widget-user-desc">${est_simulador.nombre_sucursal}</h5>
                                </div>
                                <div class="card-footer p-0">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <div class="nav-link">
                                                Estado <span class="float-right badge bg-primary">${est_simulador.nombre_status}</span>
                                            </div>
                                        </li>
                                       <div class="card-header">
                                        <h5>Intervenciones</h5>
                                       </div>
                                        <li class="nav-item">
                                            <div class="nav-link">
                                                Mantenimiento Preventivo <span class="float-right badge bg-success">${est_simulador.pre}</span>
                                            </div>
                                        </li>
                                        <li class="nav-item">
                                            <div class="nav-link">
                                                Mantenimiento Correctivo <span class="float-right badge bg-danger">${est_simulador.corr}</span>
                                            </div>
                                        </li>
                                        <li class="nav-item">
                                            <div class="nav-link">
                                                Otro <span class="float-right badge bg-danger">${est_simulador.otro}</span>
                                            </div>
                                        </li>
                                        <!--<li class="nav-item">
                                            <div class="nav-link">
                                                Horas de funcionamiento <span class="float-right badge bg-info">1</span>
                                            </div>
                                        </li>-->
                                    </ul>
                                </div>
                            </div>
                        </div>`;
                } else {
                    template += `
                        <div class="col-md-6">
                            <div class="card card-widget widget-user-2">
                                <div class="bg-gray color-palette">
                                    <div class="widget-user-image">

                                    </div>
                                    <!-- /.widget-user-image -->
                                    <h3 class="widget-user-username">${est_simulador.nombre_simulador}</h3>
                                    <h5 class="widget-user-desc">${est_simulador.nombre_sucursal}</h5>
                                </div>
                                <div class="card-footer p-0">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <div class="nav-link">
                                                Estado <span class="float-right badge bg-primary">${est_simulador.nombre_status}</span>
                                            </div>
                                        </li>
                                        <div class="card-header">
                                            <h5>Intervenciones</h5>
                                       </div>
                                        <li class="nav-item">
                                            <div class="nav-link">
                                                Mantenimiento Preventivo <span class="float-right badge bg-success">${est_simulador.pre}</span>
                                            </div>
                                        </li>
                                        <li class="nav-item">
                                            <div class="nav-link">
                                                Mantenimiento Correctivo <span class="float-right badge bg-danger">${est_simulador.corr}</span>
                                            </div>
                                        </li>
                                        <li class="nav-item">
                                            <div class="nav-link">
                                                Otro <span class="float-right badge bg-danger">${est_simulador.otro}</span>
                                            </div>
                                        </li>
                                        <!--<li class="nav-item">
                                            <div class="nav-link">
                                                Horas de funcionamiento <span class="float-right badge bg-info">1</span>
                                            </div>
                                        </li>-->
                                    </ul>
                                </div>
                            </div>
                        </div>`;
                }
                contador++;
            });

            //console.log(contador);

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

    cam_est.addEventListener('click', (e) => {
        funcion = 'listar_simuladores';
        let template = '';
        let estado = '';
        $.post('../controlador/SimuladorController.php', { funcion }, (response) => {
            const list_sim = JSON.parse(response);

            template += `<option selected>Selecciona el simulador</option>`;
            list_sim.forEach(list_sim => {
                template += `
                <option value="${list_sim.id_simulador}">${list_sim.nombre_simulador}</option>
                `;
            })
            estado += `
                <option selected>Selecciona el estado</option>
                <option value="1">Operativo</option>
                <option value="2">Operativo con detalles</option>
                <option value="3">Fuera de servicio</option>
                `;
            $('#select_sim').html(template);
            $('#estado_sim').html(estado);
        })

    })

    $('#form_estado_sim').submit((e) => {

        funcion = 'cambio_estado';

        let sim = $('#select_sim').val();
        let est = $('#estado_sim').val();

        $.post('../controlador/SimuladorController.php', { funcion, sim, est }, (response) => {
            if (response == 'yes-update-estado') {
                $('#estado_update').hide('slow');
                $('#estado_update').show(1000);
                $('#estado_update').hide(2000);

                //Accion para que todos los campos input se reseteen
                $('#form_estado_sim').trigger('reset');
            } else {
                $('#estado_no_update').hide('slow');
                $('#estado_no_update').show(1000);
                $('#estado_no_update').hide(2000);

                //Accion para que todos los campos input se reseteen
                $('#form_estado_sim').trigger('reset');
            }

            estado_simulador();
        })

        e.preventDefault();
    })

});