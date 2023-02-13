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

    <!-- modal para el historial de reportes -->
    <!-- Modal -->
    <div class="modal fade" id="modal_historial" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Nuevo comentario</h1>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="alert alert-success text-center" id="insert-ok" style="display:none;">
                    <span><i class="fas fa-check"></i> Comentario Insertado</span>
                </div>
                <form id="form_insert_report" action="">
                    <div class="modal-body">

                        <textarea name="comentario" id="comentario" cols="50" rows="5" spellcheck="false" autofocus required></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" id="boton_comentario" class="btn btn-primary">Guardar</button>
                    </div>
                </form>


            </div>
        </div>
    </div>
    <!-- Fin del modal para el historial de reportes -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div id="btn_crea_coment" class="col-sm-6">
                        
                    </div>
                    <input type="hidden" id="tipo_usuario" value="<?= $_SESSION['usuario_tipo'] ?>">
                    <input type="hidden" id="id_usuario" value="<?= $_SESSION['id'] ?>">
                    <input type="hidden" id="id_reporte" value="<?= $_GET['reporte'] ?>">
                    <input type="hidden" id="estado" value="<?= $_GET['estado'] ?>">
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="../vista/adm_catalogo.php">Home</a></li>
                            <li class="breadcrumb-item active">Historial ODT</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <section>
            <div class="container-fluid">
                <div class="card card-success">
                    <div class="card-header">
                        <h3 id="titulo" class="card-title">ODT Cerrada</h3>
                        <div class="input-group">

                        </div>
                    </div>
                    <div class="alert alert-success text-center" id="delete" style="display:none;">
                        <span><i class="fas fa-check">ODT Cerrada!</i> </span>
                    </div>
                    <div class="alert alert-danger text-center m-1" id="no-delete" style="display:none;">
                        <span><i class="fas fa-times "> ODT asignado a otro usuario</i></span>
                    </div>
                    <div class="card-body" style="font-size:80%;">
                        <section class="content">
                            <div class="container-fluid" id="reporte_original">

                            </div>
                            <div class="container-fluid" id="reporte_historial">

                            </div>
                        </section>
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

<script src="../js/Odt_detalles.js"></script>