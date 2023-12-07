<?php
session_start();
if (!isset($_SESSION['login']) || !$_SESSION['login']['status']){
    header('Location: ../login.php');
}
//limitamos el acceso a las opciones del nav
$nivelacceso = $_SESSION['login']['nivelacceso'];
?>
<!doctype html>
<html lang="es" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/admin" data-template="vertical-menu-template-free">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registro Alumnos</title>

    <?php include '../assets/layout/header.php' ?>
</head>
<body style="user-select: none;">
<!-- Layout wrapper -->
<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        <!-- Menu -->
        <?php include '../assets/layout/menu.php' ?>
        <!-- / Menu -->

        <!-- Layout container y opciones de usuarios -->
        <div class="layout-page">
            <!-- Navbar -->
            <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
                <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                    <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                        <i class="bx bx-menu bx-sm"></i>
                    </a>
                </div>
                <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                    <ul class="navbar-nav flex-row align-items-center ms-auto">
                        <!-- User -->
                        <li class="nav-item navbar-dropdown dropdown-user dropdown">
                            <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                                <div class="avatar avatar-online">
                                    <img src="../assets/img/perfil.png" alt class="w-px-40 h-auto rounded-circle" />
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <div class="d-flex">
                                            <div class="flex-shrink-0 me-3">
                                                <div class="avatar avatar-online">
                                                    <img src="../assets/img/perfil.png" alt class="w-px-40 h-auto rounded-circle" />
                                                </div>
                                            </div>
                                            <div class="flex-grow-1">
                                                    <span class="fw-semibold d-block" style="text-transform: uppercase">
                                                        <?=
                                                        $_SESSION['login']['nombreusuario']
                                                        ?>
                                                    </span>
                                                <small class="text-muted" style="text-transform: uppercase">
                                                    <?=
                                                    $_SESSION['login']['nivelacceso']
                                                    ?>
                                                </small>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <div class="dropdown-divider"></div>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <i class="bx bx-user me-2"></i>
                                        <span class="align-middle">Mi Perfil</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <i class="bx bx-cog me-2"></i>
                                        <span class="align-middle">Configuraciones</span>
                                    </a>
                                </li>
                                <li>
                                    <div class="dropdown-divider"></div>
                                </li>
                                <li>
                                    <a class="btn btn-sm btn-outline-danger dropdown-item" href="../controllers/usuario.controllers.php?operacion=destroy">
                                        <i class="bx bx-log-out-circle"></i>
                                        <span class="align-middle">Cerrar Sesión</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!--/ User -->
                    </ul>
                </div>
            </nav>
            <!-- / Navbar -->

            <!-- Content wrapper -->
            <div class="content-wrapper">
                <!-- Content -->
                <div class="container-xxl flex-grow-1 container-p-y">
                    <div class="row">
                        <div class="col-xl">
                            <div class="card mb-4">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h5 class="mb-0">Asignar Niveles de Usuarios</h5>
                                </div>
                                <div class="card-body">
                                    <form class="row g-3" action="" id="formulario-busqueda-personas" autocomplete="off">
                                        <div class="row mt-3">
                                            <label for="b-documento" class="col-form-label col-sm-3 bold">Escriba Numero de documento</label>
                                            <div class="col-sm-9">
                                                <input type="search" class="form-control" id="b-documento" maxlength="12" placeholder="Enter buscar">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="b-nombres" class="form-label">Nombres</label>
                                            <input type="text" class="form-control" id="b-nombres" readonly>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label" for="b-apellidos">Apellidos</label>
                                            <input type="text" class="form-control" id="b-apellidos" readonly>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label" for="b-genero">Genero</label>
                                            <input type="text" class="form-control" id="b-genero" readonly>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label" for="b-telefono">Celular</label>
                                            <input type="text" id="b-telefono" class="form-control phone-mask" maxlength="9" readonly>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label" for="b-tipoDoc">Tipo de Documento</label>
                                            <input type="text" class="form-control" id="b-tipoDoc" readonly>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label" for="b-numemergencia">Numero de Emergencia</label>
                                            <input type="text" class="form-control" id="b-numemergencia" readonly>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label" for="b-nombreusuario">Nombre de Usuario</label>
                                            <input type="text" class="form-control" id="b-nombreusuario">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label" for="b-correo">Correo</label>
                                            <input type="text" class="form-control" id="b-correo">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label" for="b-niveles">Nivel de Acceso</label>
                                            <select id="b-niveles" class="form-select color-dropdown" required>

                                            </select>
                                        </div>
                                        <button type="button" class="btn btn-primary">Registrar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- fin resultado publicados-->
                    <div class="my-5"></div>
                    <!-- Footer -->
                    <?php include '../assets/layout/footer.php' ?>
                    <!-- / Footer -->
                </div>
                <!-- / Content -->
                <div class="content-backdrop fade"></div>
            </div>
            <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->

    </div>

    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>
</div>
<!-- / Layout wrapper -->
</body>
</html>
