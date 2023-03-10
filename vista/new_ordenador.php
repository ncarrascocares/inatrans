<?php
session_start();
// Validando que solo pueda ingresar un usuario root o administrador a este fichero
if ($_SESSION['usuario_tipo'] == 1 || $_SESSION['usuario_tipo'] == 2) {

    // Inclución del fichero header
    include_once 'layouts/header.php';

    $id_lab = $_GET['laboratorio'];
?>
    <title>Adm | Ordenadores</title>

    <!-- Inclución del fichero nav -->
    <?php include_once 'layouts/nav.php'; ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Gestion de ordenadores</h1>
                    </div>
                    <input type="hidden" id="tipo_usuario" value="<?=$_SESSION['usuario_tipo']?>">
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="../vista/adm_catalogo.php">Home</a></li>
                            <li class="breadcrumb-item active">Ordenadores</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <section>
            <div class="container-fluid">
                <div id="" class="card-header bg-info">
                    <h4 id="">Información del equipo</h4>
                    <div class="input-group">
                    </div>
                </div>
                <br>
                <div class="card card-outline card-primary">
                    <div class="alert alert-success text-center" id="ordenador-ok" style="display:none;">
                        <span><i class="fas fa-check"></i>Ordenador creado en la BD</span>
                    </div>
                    <div class="alert alert-danger text-center" id="ordenador-noinsert" style="display:none;">
                        <span><i class="fas fa-check"></i>Error, no se creo el ordenador</span>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body" style="display: block;">
                        <form id="form-new-ordenador" class="row g-3">
                        <input type="hidden" class="form-control" id="id_laboratorio" value="<?=$id_lab?>">
                            <div class="col-md-4">
                                <label for="name_equipo" class="form-label">Marca del ordenador</label>
                                <input type="text" class="form-control" id="marca_ordenador" value="">
                            </div>
                            <div class="col-md-4">
                                <label for="name_sucursal" class="form-label">Modelo</label>
                                <input type="text" class="form-control" id="modelo_ordenador">
                            </div>
                            <div class="col-md-4">
                                <label for="name_sucursal" class="form-label">Sistema Operativo</label>
                                <input type="text" class="form-control" id="sis_operativo">
                            </div>
                            <div class="col-md-4 mt-5">
                                <label for="name_sucursal" class="form-label">Antivirus instalado</label>
                                <select name="" class="form-control" id="antivirus">
                                    <option value="0" selected>No</option>
                                    <option value="1">Si</option>
                                </select>
                            </div>
                            <div class="col-md-4 mt-5">
                                <label for="name_sucursal" class="form-label">Psico</label>
                                <select name="" class="form-control" id="consola_psico">
                                </select>
                            </div>
                            <div class="col-md-4 mt-5">
                                <label for="laboratorio" class="form-label">Laboratorio</label>
                                <select name="" class="form-control" id="laboratorio">
                                </select>
                            </div>
                            <div class="col-12 mt-5">
                                <label for="desc_simulador" class="form-label">Detalles del ordenador</label>
                                <textarea class="form-control" id="desc_ordenador" rows="3" placeholder="EJ: Ordenador para uso de cursos e-learning"></textarea>
                                <br>
                            </div>
                            <div class="col-12 mt-5">
                                <button id="guardar_ordenador" type="submit" class="btn btn-primary">Guardar</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </section>
    </div>
    <!-- /.content-wrapper -->
<?php
    include_once 'layouts/footer.php';
} else {
    header('Location: index.php');
}
?>

<script src="../js/new_ordenador.js"></script>