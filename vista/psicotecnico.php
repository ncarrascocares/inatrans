<?php
session_start();
// Validando que solo pueda ingresar un usuario root o administrador a este fichero
if (!empty($_SESSION['usuario_tipo'])) {

    // Inclución del fichero header
    include_once 'layouts/header.php';
?>

    <title>Adm | Detalle Psicotecnicos</title>

    <!-- Inclución del fichero nav -->
    <?php include_once 'layouts/nav.php'; ?>
    <!-- Modal para la creación de sub-equipo -->
    <div class="modal fade" id="modalConsola" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h3 class="modal-title fs-5" id="exampleModalLabel">Nueva consola</h3>
                </div>
                <div class="modal-body">
                    <form class="row g-3 needs-validation" novalidate>
                        <div class="col-md-6 position-relative">
                            <label for="name_equipo" class="form-label">N° serie consola</label>
                            <input type="text" class="form-control" id="name_equipo" value="" required>
                        </div>
                        <div class="col-md-6 position-relative">
                            <label for="simulador_id" class="form-label">N° serie pedalera</label>
                            <select name="" id="simulador_id" class="form-control">
                            </select>
                        </div>
                        <div class="col-md-4 position-relative mt-4">
                            <label for="simulador_id" class="form-label">Ubicación</label>
                            <select name="" id="simulador_id" class="form-control">
                            </select>
                        </div>
                        <div class="col-md-4 position-relative mt-4">
                            <label for="name_equipo" class="form-label">N° serie consola</label>
                            <input type="text" class="form-control" id="name_equipo" value="" required>
                        </div>
                        <div class="col-md-4 position-relative mt-4">
                            <label for="tipo_mant" class="form-label">Dongle asociado</label>
                            <select name="" id="tipo_mant" class="form-control">
                            </select>
                        </div>
                        <div class="col-12">
                            <br>
                            <button class="btn btn-primary" type="submit">Crear</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>
    <!-- Modal para la creación de los elementos de los sub-equipos -->
    <div class="modal fade" id="modalDongle" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h3 class="modal-title fs-5" id="exampleModalLabel">Nuevo Dongle</h3>
                </div>
                <div class="modal-body">
                    <form class="row g-3 needs-validation" novalidate>
                        <div class="col-md-6 position-relative">
                            <label for="num_serial" class="form-label">N° serial</label>
                            <input type="text" class="form-control" id="num_serial" value="" required>
                        </div>
                        <div class="col-md-6 position-relative">
                            <label for="fecha_ven" class="form-label">Fecha venciminento licencia</label>
                            <input type="date" class="form-control" id="fecha_ven">
                        </div>
                        <div class="col-12">
                            <br>
                            <button class="btn btn-primary" type="submit">Crear</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Detalle Psicotecnicos
                    </div>
                    <input type="hidden" id="tipo_usuario" value="<?= $_SESSION['usuario_tipo'] ?>">
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="../vista/adm_catalogo.php">Home</a></li>
                            <li class="breadcrumb-item active">Psicotecnicos/Dongle</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <section>
            <div class="container-fluid">
                <div id="" class="card-header bg-info">
                    <h4 id="">Equipos psicotecnicos</h4>
                    <button id="button-crear-sub" type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalConsola" data-whatever="@mdo">Nueva consola</button>
                    <button id="button-crear-sub" type="button" class="btn btn-light" data-toggle="modal" data-target="#modalDongle" data-whatever="@mdo">Nuevo Dongle</button>
                    <div class="input-group">
                    </div>
                </div>
                <br>
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h2 class="card-title mr-2">Informativo</h2>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                        <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body" style="display: block;">
                        <div class="card-body" style="display: block;">
                            <table class="table table-bordered" style="border:1px solid black;width: 100%;">
                            <thead style="border:1px solid black;background:teal; color:white;font-weight:bold">
                                <td style="border:1px solid black;">N° serie consola</td>
                                <td style="border:1px solid black;">N° serie Pedalera</td>
                                <td style="border:1px solid black;">N° serie Dongle</td>
                                <td style="border:1px solid black;">Ubicación</td>
                                <td style="border:1px solid black;">Detalle</td>
                                <td style="border:1px solid black;">N° serie Dongle</td>
                                <td style="border:1px solid black;">Fecha vencimieto de licencia</td>
                                <td style="border:1px solid black;">Dias</td>
                                <td style="border:1px solid black;">editar - borrar - detalle</td>
                            </thead>
                            <tbody id="contenido_tabla_stgo">

                            </tbody>
                            </table>
                        </div>
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
<script src="../js/Psico.js"></script>