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
                            <li class="breadcrumb-item active">Actualización</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <section>
            <div class="container-fluid">
                <div id="" class="card-header bg-info">
                    <h4 id="">Equipos psicotecnicos</h4>
                    <div class="input-group">
                    </div>
                </div>
                <br>
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h2 class="card-title mr-2">Actualización</h2>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                        <!-- /.card-tools -->
                    </div>
                    <div class="alert alert-warning text-center" id="mismos-datos" style="display:none;">
                        <span><i class="fas fa-check"></i>Advertencia, Se estan ingresando los mismos datos</span>
                    </div>
                    <div class="alert alert-success text-center" id="consola_ok" style="display:none;">
                        <span><i class="fas fa-check"></i>Actualización realizada</span>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body" style="display: block;">
                        <div class="card-body" style="display: block;">
                            <form id="form_update_consola" class="row g-3">
                                <input type="hidden" id="id_consola" value="<?= $_GET['id_consola'] ?>">
                                <div class="col-md-3">
                                    <label for="serie_equipo" class="form-label">N° serie consola</label>
                                    <input type="text" class="form-control" id="serie_equipo" value="">
                                </div>
                                <div class="col-md-3">
                                    <label for="serie_pedalera" class="form-label">N° serie pedalera</label>
                                    <input type="text" class="form-control" id="serie_pedalera" value="">
                                </div>
                                <div class="col-md-3">
                                    <label for="ubicacion" class="form-label">Ubicación</label>
                                    <select name="" class="form-control" id="ubicacion">
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="dongle" class="form-label">Dongle asociado</label>
                                    <select name="" class="form-control" id="dongle">
                                    </select>
                                    <div class="invalid-feedback" id="mensaje" style="display:none;">
                                        <span>Dongle asigndo a otra consola</span>
                                    </div>
                                </div>
                                <div class="col-12 mt-5">
                                    <label for="detalle_consola" class="form-label">Detalle</label>
                                    <textarea class="form-control" id="detalle_consola" rows="3" placeholder=""></textarea>
                                    <br>
                                </div>
                                <div class="col-12 mt-5">
                                    <button id="update_consola" type="submit" class="btn btn-warning">Actualizar</button>
                                    <a href="psicotecnico.php" class="btn btn-secondary" type="button">Cancelar</a>
                                </div>
                            </form>
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
<script src="../js/EditarConsola.js"></script>