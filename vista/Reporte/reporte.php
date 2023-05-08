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
    <!-- Fichero de chart para los graficos -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Reporte</title>
</head>

<body>
    <div class="content-wrapper container">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Reporte área de mantenimiento</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <section class="content">
            <div class="card">
                <div class="card-body">
                <h5>Equipos con reportes durante el mes de Abril</h5>
                    <div class="row" id="tabla_reporte">
                    <canvas id="miGrafico"></canvas>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>

</html>
<?php
include_once '../layouts/footer.php';
?>
<script src="Reporte.js"></script>