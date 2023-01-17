<?php
session_start();
// Validando que solo pueda ingresar un usuario administrador a este fichero
if ($_SESSION['usuario_tipo'] == 4 || $_SESSION['usuario_tipo'] == 1) {

    // Inclución del fichero header
    include_once 'layouts/header.php';
?>

    <!-- Inicio del modal -->
    <div class="modal fade" id="cambiocontra" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Cambio de contraseña</h1>
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
                    <div class="alert alert-success text-center" id="update-pass" style="display:none;">
                        <span><i class="fas fa-check"></i> Contraseña editada</span>
                    </div>
                    <div class="alert alert-danger text-center m-1" id="no-update-pass" style="display:none;">
                        <span><i class="fas fa-times "> El password no es correcto</i></span>
                    </div>
                    <!-- Formulario para el cambio de contraseñas -->
                    <form id="form-pass">
                        <div class="input-group mb-3">
                            <!-- input para la antigua contraseña -->
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-unlock-alt"></i></span>
                            </div>
                            <input type="password" id="old-pass" class="form-control" placeholder="Ingrese contraseña actual">
                        </div>
                        <!-- input para la nueva contraseña -->
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                            </div>
                            <input type="password" id="new-pass" class="form-control" placeholder="Ingrese nueva contraseña">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn bg-gradient-primary">Guardar</button>
                </div>
                </form>
                <!--Fin del Formulario para el cambio de contraseñas -->
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
                        <h1>Datos Personales</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="../vista/adm_catalogo.php">Home</a></li>
                            <li class="breadcrumb-item active">Datos Personales</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <section>
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <!-- Datos personales y sobre mi -->
                        <div class="col-md-3">
                            <div class="card card-success card-outline">
                                <div class="card-budy box-profile">
                                    <div class="text-center">
                                        <img src="../img/avatar-2-128.png" class="profile-user-img img-fluid img-circle">
                                    </div>
                                    <input id="id_usuario" type="hidden" value="<?= $_SESSION['id']; ?>">
                                    <h3 id="nombre_us" class="profile-username text-center text-success">Nombre</h3>
                                    <p id="apellido_us" class="text-muted text-center">Apellido</p>
                                    <ul class="list-group list-group-unbordered mb-3">
                                        <li class="list-group-item">
                                            <b style="color: #0b7300;">Tipo Usuario</b>
                                            <span id="nombre_tipo_usuario" class="float-right badge badge-primary"></span>
                                        </li>
                                        <!-- Boton para el cambio de password -->
                                        <button data-toggle="modal" data-target="#cambiocontra" type="button" class="btn btn-block btn-outline-warning btn-sm">Cambiar Contraseña</button>
                                    </ul>
                                </div>
                            </div>
                            <div class="card card-success card-outline">
                                <div class="card-header">
                                    <h3 class="card-title">Sobre mi</h3>
                                </div>
                                <div class="card-body">
                                    <strong style="color: #0b7300;">
                                        <i class="fas fa-school m-1">Sucursal</i>
                                    </strong>
                                    <p id="nombre_sucursal" class="text-muted"></p>
                                    <strong style="color: #0b7300;">
                                        <i class="fas fa-solid fa-address-card m-1">Cargo</i>
                                    </strong>
                                    <p id="cargo_us" class="text-muted"></p>
                                    <strong style="color: #0b7300;">
                                        <i class="fas fa-at m-1">Correo</i>
                                    </strong>
                                    <p id="correo_us" class="text-muted"></p>
                                    <button class="edit btn btn-block bg-gradient-danger">Editar</button>
                                </div>
                                <div class="card-footer">
                                    <p class="text-muted">Datos personales</p>
                                </div>
                            </div>
                        </div><!-- fin personales y sobre mi -->
                        <!-- Inicio Formulario para la edicion de los datos -->
                        <div class="col-md-9">
                            <div class="card card-success">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        Editar Datos personales
                                    </h3>
                                </div>
                                <div class="card-body">
                                    <div class="alert alert-success text-center" id="editado" style="display:none;">
                                        <span><i class="fas fa-check m-1"></i>Editado</span>
                                    </div>
                                    <div class="alert alert-danger text-center m-1" id="no-editado" style="display:none;">
                                        <span><i class="fas fa-times m-1">Se debe realizar la carga de los datos</i></span>
                                    </div>
                                    <form id="form-usuario" class="form-horizontal">
                                        <div class="form-group row">
                                            <label for="sucursal" class="col-sm-2 col-form-label">Sucursal</label>
                                            <div class="col-sm-10">
                                                <input type="text" id="sucursal" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="cargo" class="col-sm-2 col-form-label">Cargo</label>
                                            <div class="col-sm-10">
                                                <input type="text" id="cargo" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="correo" class="col-sm-2 col-form-label">Correo</label>
                                            <div class="col-sm-10">
                                                <input type="email" id="correo" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="offset-sm-2 col-sm-10 float-right">
                                                <button class="btn btn-block btn-outline-success">Guardar</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer">
                                    <p class="text-muted">Validar los datos antes de cualquier modificación</p>
                                </div>
                            </div>
                        </div>
                    </div>
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

<script src="../js/Usuario.js"></script>