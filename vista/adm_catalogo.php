<?php
session_start();

// Validando que solo pueda ingresar un usuario administrador a este fichero
if ($_SESSION['usuario_tipo'] == 4 || $_SESSION['usuario_tipo'] == 1) {

    // Inclución del fichero header
    include_once 'layouts/header.php';
?>

    <title>Adm | Resumen</title>

    <!-- Inclución del fichero nav -->
    <?php include_once 'layouts/nav.php'; ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Resumen</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Resumen</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Ordenes de trabajo</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4 col-6">
                            <!-- small box -->
                            <div class="small-box bg-info">
                                <div class="inner" id="total_reporte">

                                    <p>Total ODT'S</p>
                                </div>
                                <div class="icon">

                                </div>
                                <a href="#" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-4 col-6">
                            <!-- small box -->
                            <div class="small-box bg-success">
                                <div class="inner" id="total_reportes_cerradas">
                                    <p>Finalizadas</p>
                                </div>
                                <div class="icon">

                                </div>
                                <a href="#" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-4 col-6">
                            <!-- small box -->
                            <div class="small-box bg-warning">
                                <div class="inner" id="total_reportes_abiertas">
                                    <p>Abiertas</p>
                                </div>
                                <div class="icon">

                                </div>
                                <a href="adm_odt.php" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-footer-->
            </div>
            <!-- Fin del primer card -->

            <!-- Segundo card del front -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Simuladores</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row" id="estado_simulador">
                        <!-- Estos card son los que vía js se deberan iterar segun la cantidad de simuladores existentes -->

                        <!-- fin del card de información de los simuladores -->
                    </div>
                </div>
            </div>
            <!-- Fin del Segundo card -->

            <!-- tercer card del front -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Rendimiento</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                    </div>
                </div>
            </div>
            <!-- fin del  tercer card -->

            <!-- /.card-body -->
            <div class="card-footer">
                Footer
            </div>
            <!-- /.card-footer-->
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

<script src="../js/Adm_catalogo.js"></script>