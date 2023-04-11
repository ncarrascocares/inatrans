<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
<!-- Estilo del adminLite -->
<link rel="stylesheet" href="../css/css/adminlte.min.css">
<!-- Datatable -->
<link rel="stylesheet" href="../css/datatables.css">

</head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="adm_catalogo.php" class="nav-link">Home</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <a href="../controlador/Logout.php">Cerrar Sesion</a>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="../vista/catalogo.php" class="brand-link">
                <img src="../img/logo.jpg" alt="Inatrans Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Inatrans</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="../img/avatar-2-128.png" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                       <p style="color: white;"><?= $_SESSION['usuario_nombre'] ?></p>
                    </div>
                </div>
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <?php if($_SESSION['usuario_tipo'] != 3): ?>
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <?php if($_SESSION['usuario_tipo'] == 1): ?>
                        <li class="nav-header">Usuario</li>

                        <li class="nav-item">
                            <a href="../vista/editarDatos.php" class="nav-link">
                                <i class="nav-icon fas fa-user-cog"></i>
                                <p>
                                    Datos Personales
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../vista/adminUsuario.php" class="nav-link">
                                <i class="nav-icon fas fa-users"></i>
                                <p>
                                    Gestion Usuarios
                                </p>
                            </a>
                        </li>
                        <?php endif; ?>
                        <li class="nav-header">Mantenimiento</li>
                        <?php if($_SESSION['usuario_tipo'] == 1): ?>
                        <li class="nav-item">
                            <a href="../vista/detalleSimulador.php" class="nav-link">
                                <i class="nav-icon fa fa-cogs"></i>
                                <p>
                                    Equipos
                                </p>
                            </a>
                        </li>
                        <?php endif; ?>
                        <li class="nav-item">
                            <a href="../vista/laboratorio.php" class="nav-link">
                            <i class="nav-icon fa fa-users"></i>
                                <p>
                                    Laboratorios
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../vista/psicotecnico.php" class="nav-link">
                            <i class="nav-icon fa fa-keyboard"></i>
                                <p>
                                    Psicotenico
                                </p>
                            </a>
                        </li>
                    </ul>
                    <?php endif; ?>
                    </ul>
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-header">Ordenes de trabajo</li>
                        <li class="nav-item">
                            <a href="../vista/ordenesTrabajo.php?estado=1" class="nav-link">
                                <i class="nav-icon fas fa-list"></i>
                                <p>
                                    Abiertas
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../vista/ordenesTrabajo.php?estado=0" class="nav-link">
                                <i class="nav-icon fas fa-check-double"></i>
                                <p>
                                    Cerradas
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>