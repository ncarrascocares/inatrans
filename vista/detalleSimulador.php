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
    <!-- Modal para la creación de sub-equipo -->
    <div class="modal fade" id="modalSub" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" id="modal_sub">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h3 class="modal-title fs-5" id="exampleModalLabel">Nuevo Sub equipo</h3>
                </div>
                        <!-- BANNER CON EL MENSAJE DE LA ACCIÓN AL INSERTAR UN NUEVO SUB EQUIPO-->
                        <div class="alert alert-success text-center" id="add-sub" style="display:none;">
                            <span><i class="fas fa-check"></i>Sub Equipo creado con exito!</span>
                        </div>
                        <div class="alert alert-warning text-center" id="no-add-sub" style="display:none;">
                            <span><i class="fas fa-check"></i>Sub equipo ya se encuentra asignado al simulador</span>
                        </div>
                        <div class="alert alert-danger text-center" id="no-datos-sub" style="display:none;">
                            <span><i class="fas fa-check"></i>Error, Faltan datos en el formulario!</span>
                        </div>
                        <!-- FIN BANNER -->
                <div class="modal-body">
                    <form class="row g-3 needs-validation" id="form_new_sub" novalidate>
                        <div class="col-md-4 position-relative">
                            <label for="name_equipo" class="form-label">Nombre del sub-equipo</label>
                            <input type="text" class="form-control" id="name_equipo" value="" required>
                        </div>
                        <div class="col-md-4 position-relative">
                            <label for="simulador" class="form-label">Equipo al que pertenece</label>
                            <select name="" id="selectsimulador" class="form-control">
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
    <!-- Modal para la creación de los elementos de los sub-equipos -->
    <div class="modal fade" id="modalEquipo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h3 class="modal-title fs-5" id="exampleModalLabel">Nuevo Elemento</h3>
                </div>
                <div class="modal-body">
                    <form class="row g-3 needs-validation" id="new_element" novalidate>
                        <div class="col-md-6 position-relative">
                            <label for="name_equipo" class="form-label">Nombre elemento</label>
                            <input type="text" class="form-control" id="name_equipo" value="" required>
                        </div>
                        <div class="col-md-6 position-relative">
                            <label for="periocidad" class="form-label">Periocidad</label>
                            <input type="text" class="form-control" id="periocidad">
                        </div>
                        <div class="col-md-4 position-relative">
                            <label for="codigo_elemento" class="form-label">Código</label>
                            <input type="text" class="form-control" id="codigo_elemento">
                        </div>
                        <div class="col-md-4 position-relative">
                            <label for="tipo_mant" class="form-label">Sub equipo asocidado</label>
                            <select name="" id="sub_equipo" class="form-control">
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
                            <button class="btn btn-primary" id="btnModalCrear" type="submit">Crear</button>
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
                        <h1>Detalles de equipos y Sub equipos<button id="button-crear" type="button" data-toggle="modal" data-target="#crear-odt" class="btn bg-gradient-primary ml-2">Crear</button></h1>
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
                        <h3 class="card-title">Simulador 1
                            <button id="button-crear-sub" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalSub" data-whatever="@mdo">Crear Sub Equipo</button>
                            <button id="button-crear-sub" type="button" class="btn btn-info" data-toggle="modal" data-target="#modalEquipo" data-whatever="@mdo">Crear Elemento</button>
                        </h3>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-body" style="display: block;">
                        <!-- PAGINACION -->
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-end">
                                <li class="page-item">
                                <a class="page-link" href="#" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                </li>
                                    <li class="page-item"><a class="page-link" id="pagina5">1</a></li>
                                    <li class="page-item"><a class="page-link" id="pagina10">2</a></li>
                                    <li class="page-item"><a class="page-link" id="pagina15">3</a></li>
                                    <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                        <!-- PAGINACION -->
                        <div class="card-body" style="display: block;">
                            <table class="table table-bordered" style="border:1px solid black;width: 100%;">
                            <thead style="border:1px solid black;background:teal; color:white;font-weight:bold">
                            <td style="border:1px solid black;">Sub Equipo</td>
                                    <td style="border:1px solid black;">Detalles</td>
                                    <td style="border:1px solid black;">Simulador</td>
                                    <td style="border:1px solid black;">Mantenimiento</td>
                                    <td style="border:1px solid black;">Descripcion</td>
                                    <td style="border:1px solid black;">opciones</td>
                            </thead>
                            <tbody id="cuerpoTabla">

                            </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?php
    include_once 'layouts/footer.php';
} else {
    header('Location: index.php');
}
?>
<script src="../js/Simulador.js"></script>