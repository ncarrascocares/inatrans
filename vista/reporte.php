<?php

include_once '../modelo/Reporte.php';
$reporte = new Reporte();
$resultado = $reporte->horas_funcionamiento_simulador();
print_r($resultado);
?>

<!DOCTYPE html>
<html lang="en">
<!-- Se tendra que crear objetos de las clases para obtener la información necesaria, el js arroja un error que complica,
    es por ello que se trabajara con php de forma directa para traer los datos y mostrarlos en este fichero

    Simuladores:
    1. cantidad de horas mensuales de funcionamiento, este dato se debera ingresar de forma manual en los simuladores, el cual se debra solicitar a servicios.
    2. cantidad de horas fuera de servicio del simulador. Este dato sera la suma de las paradas programadas y no programadas.
        2.1. cantidad de horas fuera de servicio por paradas programadas.
        2.2. cantidad de horas fuera de servicio por paradas NO programadas.
    3. Cantidad de eventos realizados en el equipo.
        3.1. cantidad programados
        3.2. cantidad NO programados
    4. cantidad de solicitudes a España

    Graficos
    1. Garficar el porcentaje de intervenciones
        1.1 Porcentaje del tiempo de las intervenciones programadas sobre el total de horas mensuales, utilizar un grafico de torta
        1.2 Porcentaje del tiempo de las intervenciones NO programadas sobre el total de horas mensuales, utilizar un grafico de torta
    2. Graficar las cantidaddes de reportes realizados
        2.1 Cantidad de reportes de intervenciones programadas, utilizar un grafico de barra
        2.2 Cantidad de reportes de intervenciones NO programadas, utilizar un grafico de barra
    3. Graficar por sucursales el tiempo efectivo de funcionamiento de todos los simuladores
    4. Graficar la cantidad de reportes por región
    5. Opcional: reportar a los instructores con mas averías reportadas.

    Laboratorios
    1. Numerar la cantidad de ordenadores en funcionamiento
    2. Numerar las intervenciones por laboratorio
    3. informar sobre el psico: numero de serie, numero de dongle y los días de licencia que quedan -->

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <title>Reporte</title>
</head>

<body>
    <div class="container text-center">
        <header>
            <div class="row">
                <div class="row mt-5">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <h1 class="card-title">Reporte área de Mantenimiento</h1>
                                <p class="card-text">Reporte sobre intervenciones y estado de los Laboratorios y Simuladores</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <section class="container">
            <div class="row">
                <?php foreach ($resultado as $r) : ?>
                    <div class="card col-4 m-3" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title"><?= $r->nombre_simulador ?></h5>
                        </div>
                        <table>
                            <tr>
                                <th>Tiempo funcionamiento</th>
                                <td><?= $r->horas_servicios ?></td>
                            </tr>
                            <tr>
                                <th>Horas fuera de servicio</th>
                                <td><?= $r->horas_paradas ?></td>
                            </tr>
                            <tr>
                                <th>Programado</th>
                                <td>10 horas</td>
                            </tr>
                            <tr>
                                <th>No Programado</th>
                                <td>5 horas</td>
                            </tr>
                        </table>
                        <div class="card-body">
                            <h5>Graficos</h5>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>
    </div>
</body>

</html>

<script src="../js/Reporte.js"></script>