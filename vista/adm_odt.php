<?php
session_start();
// Validando que solo pueda ingresar un usuario root o administrador a este fichero
if ($_SESSION['usuario_tipo'] == 1 || $_SESSION['usuario_tipo'] == 2) {

    // Inclución del fichero header
    include_once 'layouts/header.php';
?>

    <title>Adm | Ordenes de trabajo</title>

    <!-- Inclución del fichero nav -->
    <?php include_once 'layouts/nav.php'; ?>
    <!-- Inicio del modal de creación de usuario -->
    <div class="modal fade" id="crear-odt" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">Nueva ODT</h3>
                        <button data-dismiss="modal" aria-label="close" class="close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="alert alert-success text-center" id="new-report" style="display:none;">
                        <span><i class="fas fa-check"></i> ODT creada</span>
                    </div>
                    <div class="alert alert-danger text-center m-1" id="no-new-report" style="display:none;">
                        <span><i class="fas fa-times "> Error, no se creo ODT</i></span>
                    </div>
                    <div class="card-body">
                        <!-- Formulario para crear ODT -->
                        <form id="form-crear-reporte">
                            <input type="hidden" id="id_usuario" name="" value="<?= $_SESSION['id'] ?>">
                            <input type="hidden" id="estado" value="<?= $_GET['estado']?>">
                            <div class="form-group">
                                <label for="simulador_id">Simulador</label>
                                <select name="" id="simulador_id" class="form-control"></select>
                            </div>
                            <div class="form-group">
                                <label for="instructor">Instructor</label>
                                <input id="instructor" type="text" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="correo_us">Problema</label>
                                <textarea class="form-control" id="averia_reporte" rows="3" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="categoria_id">Categoria</label>
                                <select name="" id="categoria_id" class="form-control">
                                    <option value="1">Leve</option>
                                    <option value="2">Grave</option>
                                    <option value="3">Critico</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="fecha_crea">Fecha</label>
                                <input id="fecha_crea" type="datetime-local" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="tipo_averia_id">Clasificación</label>
                                <select class="form-control" id="tipo_averia_id">
                                    <option value="1" selected>Software</option>
                                    <option value="2">Hardware</option>
                                    <option value="3">Eléctrico</option>
                                    <option value="4">Otro</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="tipo_odt">Tipo ODT</label>
                                <select class="form-control" id="tipo_odt">
                                    <option value="Preventivo" selected>Preventivo</option>
                                    <option value="Correctivo">Correctivo</option>
                                    <option value="Otro">Otro</option>
                                </select>
                            </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn bg-gradient-primary float-right m-1">Guardar</button>
                        <button type="button" data-dismiss="modal" class="btn btn-outline-secondary float-right m-1">Cerrar</button>
                    </div>
                    </form>
                    <!-- Fin del formulario -->
                </div>
            </div>
        </div>
    </div>
    <!-- fin del modal -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Gestion ODT's <button id="button-crear" type="button" data-toggle="modal" data-target="#crear-odt" class="btn bg-gradient-primary ml-2">Crear nueva ODT</button></h1>
                    </div>
                    <input type="hidden" id="tipo_usuario" value="<?= $_SESSION['usuario_tipo'] ?>">
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="../vista/adm_catalogo.php">Home</a></li>
                            <li class="breadcrumb-item active">Gestion ODT's</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <section>
            <div class="container-fluid">
                <div id="card" class="card card-info">
                    <div id="est_odt" class="card-header">
                        <h4 id="title"></h4>
                        <div class="input-group">
                        </div>
                    </div>
                    <div class="card-body" style="font-size:80%;">
                        <table id="tabla_reporte" align="center" border="1" style="width:100%; height:20px;" class="table table-condensed table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>N° odt</th>
                                    <th>Simulador</th>
                                    <th>Problema</th>
                                    <th>Mantenimiento</th>
                                    <th>Fecha</th>
                                    <th>Responsable</th>
                                    <th>Categoria</th>
                                    <th>Clasificación</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer"></div>
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
<script src="../js/datatables.js"></script>
<script src="../js/Odt.js"></script>