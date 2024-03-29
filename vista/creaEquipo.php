<?php
session_start();
// Validando que solo pueda ingresar un usuario root o administrador a este fichero
if ($_SESSION['usuario_tipo'] == 1) {

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
                        <h1>Creación de nuevos equipos</h1>
                    </div>
                    <input type="hidden" id="tipo_usuario" value="<?= $_SESSION['usuario_tipo'] ?>">
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="../vista/adm_catalogo.php">Home</a></li>
                            <li class="breadcrumb-item active">Nuevo equipo</li>
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
                    <div class="alert alert-success text-center" id="insert-ok" style="display:none;">
                        <span><i class="fas fa-check"></i>Equipo creado</span>
                    </div>
                    <div class="alert alert-danger text-center" id="no-insert" style="display:none;">
                        <span><i class="fas fa-check"></i>Error, no se creo el equipo</span>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body" style="display: block;">
                        <form id="form-new-equipo" class="row g-3">
                            <div class="col-md-3">
                                <label for="name_equipo" class="form-label">Nombre del equipo</label>
                                <input type="text" class="form-control" id="name_equipo">
                            </div>
                            <div class="col-md-3">
                                <label for="name_sucursal" class="form-label">Sucursal</label>
                                <select class="form-control" id="name_sucursal">

                                </select>
                            </div>
                            <div id="contenedor_tipo_simulador" class="form-group col-md-3">
                                <label for="tipo_equipo">Tipo</label>
                                <select class="form-control" id="tipo_equipo">
                                    <option value="Movil">Móvil</option>
                                    <option value="Fijo" selected>Fijo</option>
                                    <option value="Laboratorio">Laboratorio</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="servicio" class="form-label">Servicio</label>
                                <select class="form-control" id="servicio">

                                </select>
                            </div>
                            <div class="col-12">
                                <label for="desc_simulador" class="form-label">Descripcion</label>
                                <textarea class="form-control" id="desc_equipo" rows="3" placeholder="Ingresa descripcion del equipo"></textarea>
                                <br>
                            </div>
                            <div class="col-12">
                                <button id="guardar-equipo" type="submit" class="btn btn-primary">Guardar</button>
                            </div>
                        </form>
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
<script src="../js/Equipo.js"></script>