<?php
session_start();
// Validando que solo pueda ingresar un usuario root o administrador a este fichero
if (!empty($_SESSION['usuario_tipo'])) {

    // Inclución del fichero header
    include_once 'layouts/header.php';
?>

    <title>Adm | Detalle Equipos</title>

    <!-- Inclución del fichero nav -->
    <?php include_once 'layouts/nav.php'; ?>

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Detalle
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
                    <h4 id="">Equipos de laboratorio</h4>
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
                    <div class="alert alert-success text-center" id="update-ok" style="display:none;">
                        <span><i class="fas fa-check"></i>Actualización realizada</span>
                    </div>
                    <div class="alert alert-danger text-center" id="serial_consola" style="display:none;">
                        <span><i class="fas fa-check"></i>Error, Serie consola ya existe en la bs</span>
                    </div>
                    <div class="alert alert-danger text-center" id="serial_pedalera" style="display:none;">
                        <span><i class="fas fa-check"></i>Error, Serie pedalera ya existe en la bs</span>
                    </div>
                    <div class="alert alert-danger text-center" id="dongle_existe" style="display:none;">
                        <span><i class="fas fa-check"></i>Error, Dongle seleccionado ya se encuentra asociado a una consola</span>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body" style="display: block;">
                        <div class="card-body" style="display: block;">
                            <form id="form_update_consola" class="row g-3">
                                <input type="hidden" id="id_ordenador" value="<?= $_GET['idOrdenador'] ?>">
                                <div class="col-md-4">
                                    <label for="serie_equipo" class="form-label">Marca</label>
                                    <input type="text" class="form-control" id="marca_equipo" value="" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="serie_pedalera" class="form-label">Modelo</label>
                                    <input type="text" class="form-control" id="modelo_equipo" value="" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="ubicacion" class="form-label">Sistema Operativo</label>
                                    <input type="text" class="form-control" id="sis_operativo" required>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <label for="antivirus" class="form-label">Antivirus</label>
                                    <select name="" class="form-control" id="antivirus" required>
                                        <option value="1" selected>Si</option>
                                        <option value="0">No</option>
                                    </select>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <label for="consola_psico" class="form-label">Consola Psico</label>
                                    <select name="" class="form-control" id="consola_psico" required>
                                    </select>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <label for="laboratorio" class="form-label">Laboratorio</label>
                                    <select name="" class="form-control" id="laboratorio" required>
                                    </select>
                                </div>
                                <div class="col-12 mt-5">
                                    <label for="detalle_equipo" class="form-label">Uso / Detalle</label>
                                    <textarea class="form-control" id="detalle_equipo" rows="3" placeholder="" required></textarea>
                                    <br>
                                </div>
                                <div class="col-12 mt-5">
                                    <button id="update_ordenador" type="submit" class="btn btn-warning">Actualizar</button>
                                    <a href="laboratorio.php" class="btn btn-secondary" type="button">Cancelar</a>
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
<script src="../js/EditarOrdenador.js"></script>