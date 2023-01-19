<?php
session_start();
// Validando que solo pueda ingresar un usuario root o administrador a este fichero
if ($_SESSION['usuario_tipo'] == 4 || $_SESSION['usuario_tipo'] == 1) {

    // Inclución del fichero header
    include_once 'layouts/header.php';
?>
    <!-- Inicio del modal para configracion de tipo de usuario-->
    <div class="modal fade" id="cambio_tipo_user" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="titulo_modal"></h1>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="text-center">
                        <img src="../img/avatar-2-128.png" class="profile-user-img img-fluid img-circle">
                    </div>
                    <div class="text-center">
                        <b>
                            <!-- Codigo php para utilizar las variables de sesion -->
                            <?= $_SESSION['usuario_nombre'] ?>
                        </b>
                    </div>
                    <span>Ingrese la password para confirmar</span>
                    <div class="alert alert-success text-center" id="update-tipo" style="display:none;">
                        <span><i class="fas fa-check"></i> Actualización exitosa</span>
                    </div>
                    <div class="alert alert-success text-center" id="borrado-user" style="display:none;">
                        <span><i class="fas fa-check"></i> Usuario Borrado</span>
                    </div>
                    <div class="alert alert-danger text-center m-1" id="no-update-tipo" style="display:none;">
                        <span><i class="fas fa-times "> Error en la actualización</i></span>
                    </div>
                    <div class="alert alert-danger text-center m-1" id="no-borrado-user" style="display:none;">
                        <span><i class="fas fa-times "> Error en el borardo</i></span>
                    </div>
                    <div class="alert alert-danger text-center m-1" id="no-pass" style="display:none;">
                        <span><i class="fas fa-times "> Ingresa Contraseña</i></span>
                    </div>
                    <!-- Formulario para el cambio de tipo usuario -->
                    <form id="form_tipo_user">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-unlock-alt"></i></span>
                            </div>
                            <input type="password" id="pass_root" class="form-control" placeholder="Ingrese contraseña">
                            <input type="hidden" id="id_user">
                            <input type="hidden" id="funcion">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" id="boton-modal" class="btn bg-gradient-primary"></button>
                </div>
                </form>
                <!--Fin del Formulario para el cambio de tipo usuario -->
            </div>
        </div>
    </div>
    <!-- fin del modal -->
    <!-- Inicio del modal de creación de usuario -->
    <div class="modal fade" id="crear-usuario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">Crear Usuario</h3>
                        <button data-dismiss="modal" aria-label="close" class="close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="alert alert-success text-center" id="new-user" style="display:none;">
                        <span><i class="fas fa-check"></i> Usuario Creado</span>
                    </div>
                    <div class="alert alert-danger text-center m-1" id="no-new-user" style="display:none;">
                        <span><i class="fas fa-times "> Usuario ya existe</i></span>
                    </div>
                    <div class="card-body">
                        <!-- Formulario para crear usuarios -->
                        <form id="form-crear-user">
                            <div class="form-group">
                                <label for="nombre_us">Nombre</label>
                                <input id="nombre_us" type="text" class="form-control" placeholder="Ingrese Nombre" required>
                            </div>
                            <div class="form-group">
                                <label for="apellido_us">Apellido</label>
                                <input id="apellido_us" type="text" class="form-control" placeholder="Ingrese Apellido" required>
                            </div>
                            <div class="form-group">
                                <label for="correo_us">Correo</label>
                                <input id="correo_us" type="text" class="form-control" placeholder="Ingrese Correo" required>
                            </div>
                            <div class="form-group">
                                <label for="cargo_us">Cargo</label>
                                <input id="cargo_us" type="text" class="form-control" placeholder="Ingrese Cargo" required>
                            </div>
                            <div class="form-group">
                                <label for="sucursal_id">Sucursal</label>
                                <select name="" id="sucursal_id" class="form-control">
                                    <option value="1">Antofagasta</option>
                                    <option value="2">Iquique</option>
                                    <option value="3">Santiago</option>
                                </select>
                                <!-- <input id="sucursal_id" type="text" class="form-control" placeholder="Ingrese Sucursal" required> -->
                            </div>
                            <div class="form-group">
                                <label for="password_us">Password</label>
                                <input id="password_us" type="password" class="form-control" placeholder="Ingrese Password" required>
                            </div>
                            <!-- <div class="form-group">
                                <label for="apellido_user">Tipo usuario</label>
                                <select class="form-control" id="usuario_tipo">
                                    <option value="1">Administrador</option>
                                    <option value="2">Mantenedor</option>
                                    <option value="3" selected>Usuario</option>
                                </select>
                            </div> -->
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

    <title>Adm | Editar Datos</title>

    <!-- Inclución del fichero nav -->
    <?php include_once 'layouts/nav.php'; ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Gestion de usuarios <button id="button-crear" type="button" data-toggle="modal" data-target="#crear-usuario" class="btn bg-gradient-primary ml-2">Crear usuario</button></h1>
                    </div>
                    <input type="hidden" id="tipo_usuario" value="<?=$_SESSION['usuario_tipo']?>">
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="../vista/adm_catalogo.php">Home</a></li>
                            <li class="breadcrumb-item active">Gestion de usuarios</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <section>
            <div class="container-fluid">
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">Buscar Usuario</h3>
                        <div class="input-group">
                            <input type="text" id="buscar" class="form-control float-left" placeholder="Ingrese nombre de usuario">
                            <div class="input-group-append">
                                <button class="btn btn-default"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="usuarios" class="row d-flex align-items-stretch">

                        </div>
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

<script src="../js/Gestion_usuario.js"></script>