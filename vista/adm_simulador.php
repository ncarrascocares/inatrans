<?php
session_start();
// Validando que solo pueda ingresar un usuario root o administrador a este fichero
if (!empty($_SESSION['usuario_tipo'])) {

    // Inclución del fichero header
    include_once 'layouts/header.php';
?>

    <title>Adm | Descripción Equipamiento</title>

    <!-- Inclución del fichero nav -->
    <?php include_once 'layouts/nav.php'; ?>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Simuladores y Laboratorios<button id="button-crear" type="button" data-toggle="modal" data-target="#crear-odt" class="btn bg-gradient-primary ml-2">Crear</button></h1>
                    </div>
                    <input type="hidden" id="tipo_usuario" value="<?= $_SESSION['usuario_tipo'] ?>">
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="../vista/adm_catalogo.php">Home</a></li>
                            <li class="breadcrumb-item active">Detalle por equipo</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <section>
            <div class="container-fluid">
                <div id="" class="card-header bg-info">
                    <h4 id="">Detalle</h4>
                    <div class="input-group">
                    </div>
                </div>
                <br>
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Simulador 1 <button id="button-crear-sub" type="button" data-toggle="modal" data-target="#crear-odt" class="btn bg-gradient-success ml-2">Crear Sub Equipo</button></h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                        <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body" style="display: block;">
                        <table style="border:1px solid black;width: 100%;">
                            <tr style="border:1px solid black;">
                                <td style="border:1px solid black;">Sub Equipo</td>
                                <td style="border:1px solid black;">Elemento</td>
                                <td style="border:1px solid black;">Mantenimiento</td>
                                <td style="border:1px solid black;">Periocidad</td>
                                <td style="border:1px solid black;">Responsable</td>
                                <td style="border:1px solid black;">Stock por sucursal</td>
                                <td style="border:1px solid black;">opciones</td>
                            </tr>
                            <tr>
                                <td style="border:1px solid black;">TV</td>
                                <td style="border:1px solid black;">No aplica</td>
                                <td style="border:1px solid black;">Correctivo</td>
                                <td style="border:1px solid black;">Semanal</td>
                                <td style="border:1px solid black;">Instructor</td>
                                <td style="border:1px solid black;">1</td>
                                <td style="border:1px solid black;">Editar - Borrar - Detalles</td>
                            </tr>
                            <tr>
                                <td style="border:1px solid black;" rowspan="3">Motor</td>
                                <td style="border:1px solid black;">Ejes</td>
                                <td style="border:1px solid black;">Preventivo</td>
                                <td style="border:1px solid black;">Anual</td>
                                <td style="border:1px solid black;">Motores Gonzalez</td>
                                <td style="border:1px solid black;">2</td>
                                <td style="border:1px solid black;">Editar - Borrar - Detalles</td>
                            </tr>
                            <tr>
                                <td style="border:1px solid black;">Sellos</td>
                                <td style="border:1px solid black;">Preventivo</td>
                                <td style="border:1px solid black;">Anual</td>
                                <td style="border:1px solid black;">Motores Gonzalez</td>
                                <td style="border:1px solid black;">0</td>
                                <td style="border:1px solid black;">Editar - Borrar - Detalles</td>
                            </tr>
                            <tr>
                                <td style="border:1px solid black;">Aceite</td>
                                <td style="border:1px solid black;">Preventivo</td>
                                <td style="border:1px solid black;">Anual</td>
                                <td style="border:1px solid black;">Motores Gonzalez</td>
                                <td style="border:1px solid black;">0</td>
                                <td style="border:1px solid black;">Editar - Borrar - Detalles</td>
                            </tr>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Simulador 2 <button id="button-crear-sub" type="button" data-toggle="modal" data-target="#crear-odt" class="btn bg-gradient-success ml-2">Crear Sub Equipo</button></h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                        <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body" style="display: block;">
                        <table style="border:1px solid black;width: 100%;">
                            <tr style="border:1px solid black;">
                                <td style="border:1px solid black;">Sub Equipo</td>
                                <td style="border:1px solid black;">Elemento</td>
                                <td style="border:1px solid black;">Mantenimiento</td>
                                <td style="border:1px solid black;">Periocidad</td>
                                <td style="border:1px solid black;">Responsable</td>
                                <td style="border:1px solid black;">Stock por sucursal</td>
                                <td style="border:1px solid black;">opciones</td>
                            </tr>
                            <tr>
                                <td style="border:1px solid black;">TV</td>
                                <td style="border:1px solid black;">No aplica</td>
                                <td style="border:1px solid black;">Correctivo</td>
                                <td style="border:1px solid black;">Semanal</td>
                                <td style="border:1px solid black;">Instructor</td>
                                <td style="border:1px solid black;">1</td>
                                <td style="border:1px solid black;">Editar - Borrar - Detalles</td>
                            </tr>
                            <tr>
                                <td style="border:1px solid black;" rowspan="3">Motor</td>
                                <td style="border:1px solid black;">Ejes</td>
                                <td style="border:1px solid black;">Preventivo</td>
                                <td style="border:1px solid black;">Anual</td>
                                <td style="border:1px solid black;">Motores Gonzalez</td>
                                <td style="border:1px solid black;">2</td>
                                <td style="border:1px solid black;">Editar - Borrar - Detalles</td>
                            </tr>
                            <tr>
                                <td style="border:1px solid black;">Sellos</td>
                                <td style="border:1px solid black;">Preventivo</td>
                                <td style="border:1px solid black;">Anual</td>
                                <td style="border:1px solid black;">Motores Gonzalez</td>
                                <td style="border:1px solid black;">0</td>
                                <td style="border:1px solid black;">Editar - Borrar - Detalles</td>
                            </tr>
                            <tr>
                                <td style="border:1px solid black;">Aceite</td>
                                <td style="border:1px solid black;">Preventivo</td>
                                <td style="border:1px solid black;">Anual</td>
                                <td style="border:1px solid black;">Motores Gonzalez</td>
                                <td style="border:1px solid black;">0</td>
                                <td style="border:1px solid black;">Editar - Borrar - Detalles</td>
                            </tr>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

<?php
    include_once 'layouts/footer.php';
} else {
    header('Location: index.php');
}
?>
<script src="../js/Simulador.js"></script>