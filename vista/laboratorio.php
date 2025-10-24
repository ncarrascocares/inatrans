<?php
session_start();
// Validando que solo pueda ingresar un usuario root o administrador a este fichero
if (!empty($_SESSION['usuario_tipo'])) {

    // Inclución del fichero header
    include_once 'layouts/header.php';
?>

    <title>Adm | Laboratorios</title>

    <!-- Inclución del fichero nav -->
    <?php include_once 'layouts/nav.php'; ?>
    <!-- Modal para la creación de sub-equipo -->
    <div class="modal fade" id="modalSub" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h3 class="modal-title fs-5" id="exampleModalLabel">Nuevo Sub equipo</h3>
                </div>
                <div class="modal-body">
                    <form class="row g-3 needs-validation" novalidate>
                        <div class="col-md-4 position-relative">
                            <label for="name_equipo" class="form-label">Nombre del sub-equipo</label>
                            <input type="text" class="form-control" id="name_equipo" value="" required>
                        </div>
                        <div class="col-md-4 position-relative">
                            <label for="simulador_id" class="form-label">Equipo al que pertenece</label>
                            <select name="" id="simulador_id" class="form-control">
                            </select>
                        </div>
                        <div class="col-md-4 position-relative">
                            <label for="tipo_mant" class="form-label">Mantenimiento</label>
                            <select name="" id="tipo_mant" class="form-control">
                            </select>
                        </div>
                        <div class="col-md-12 position-relative">
                            <label for="detalle_sub" class="form-label">Detalles</label>
                            <div class="input-group has-validation">
                                <textarea class="form-control" id="detalle_sub" rows="3" spellcheck="false" required></textarea>
                            </div>
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
                        <h1>Detalles x laboratorio
                    </div>
                    <input type="hidden" id="tipo_usuario" value="<?= $_SESSION['usuario_tipo'] ?>">
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="../vista/adm_catalogo.php">Home</a></li>
                            <li class="breadcrumb-item active">Detalle x laboratorio</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <section>
            <div class="container-fluid">
                <div id="" class="card-header bg-info">
                    <h4 id="">Laboratorios</h4>
                    <a href="newOrdenador.php"><button id="button-crear-sub" type="button" class="btn btn-success" data-toggle="modal" data-target="#modalSub" data-whatever="@mdo">Ingresar equipo</button></a>
                    <div class="input-group">
                    </div>
                </div>
                <br>
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h2 class="card-title mr-2">Santiago</h2>
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
                            <td style="border:1px solid black;">Identificador interno</td>
                                    <td style="border:1px solid black;">Marca</td>
                                    <td style="border:1px solid black;">Modelo</td>
                                    <td style="border:1px solid black;">Sistema Operativo</td>
                                    <td style="border:1px solid black;">Antivirus</td>
                                    <td style="border:1px solid black;">Uso</td>
                                    <td style="border:1px solid black;">Consola Psico</td>
                                    <td style="border:1px solid black;">opciones</td>
                            </thead>
                            <tbody id="contenido_tabla_stgo">

                            </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h2 class="card-title mr-2">Antofagasta</h2>
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
                            <table class="table table-bordered" style="border:1px solid black;width: 100%">
                            <thead style="border:1px solid black;background:teal; color:white;font-weight:bold">
                            <td style="border:1px solid black;">Identificador interno</td>
                                    <td style="border:1px solid black;">Marca</td>
                                    <td style="border:1px solid black;">Modelo</td>
                                    <td style="border:1px solid black;">Sistema Operativo</td>
                                    <td style="border:1px solid black;">Antivirus</td>
                                    <td style="border:1px solid black;">Uso</td>
                                    <td style="border:1px solid black;">Consola Psico</td>
                                    <td style="border:1px solid black;">opciones</td>
                            </thead>
                            <tbody id="contenido_tabla_anto">

                            </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h2 class="card-title mr-2">Iquique</h2>
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
                            <table align="center" border="1" style="width:100%; height:20px;" class="table table-condensed table-bordered table-hover">
                            <thead style="border:1px solid black;background:teal; color:white;font-weight:bold">
                            <td style="border:1px solid black;">Identificador interno</td>
                                    <td style="border:1px solid black;">Marca</td>
                                    <td style="border:1px solid black;">Modelo</td>
                                    <td style="border:1px solid black;">Sistema Operativo</td>
                                    <td style="border:1px solid black;">Antivirus</td>
                                    <td style="border:1px solid black;">Uso</td>
                                    <td style="border:1px solid black;">Consola Psico</td>
                                    <td style="border:1px solid black;">opciones</td>
                            </thead>
                            <tbody id="contenido_tabla_iqq">

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
<script src="../js/Laboratorio.js"></script>