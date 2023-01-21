<?php
session_start();
// Validando que solo pueda ingresar un usuario root o administrador a este fichero
if ($_SESSION['usuario_tipo'] == 4 || $_SESSION['usuario_tipo'] == 1) {

    // Inclución del fichero header
    include_once 'layouts/header.php';
?>

    <title>Adm | Ordenes de trabajo</title>

    <!-- Inclución del fichero nav -->
    <?php include_once 'layouts/nav.php'; ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Gestion ODT's <button id="button-crear" type="button" data-toggle="modal" data-target="#crear-usuario" class="btn bg-gradient-primary ml-2">Crear nueva ODT</button></h1>
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
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">Listado de ordenes de trabajo</h3>
                        <div class="input-group">

                        </div>
                    </div>
                    <div class="card-body">
                        <table id="tabla_reporte" class="display table table-hover text-nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th>N° odt</th>
                                    <th>Simulador</th>
                                    <th>Usuario</th>
                                    <th>Averia</th>
                                    <th>Comentario</th>
                                    <th>Categoria</th>
                                    <th>Fecha</th>
                                    <th>Tipo Averia</th>
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