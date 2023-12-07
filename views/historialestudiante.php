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
    <title>Lista de Profesores</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Favicon -->
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
                                                    <span id="user" class="fw-semibold d-block" style="text-transform: uppercase">
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

            <div class="modal fade" id="modal-buscadorE" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                <div class="modal-dialog modal-fullscreen" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel"></h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="nav-align-top mb-4">
                                <ul class="nav nav-pills mb-3 nav-fill" role="tablist">
                                    
                                    <li class="nav-item">
                                        <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-justified-home" aria-controls="navs-pills-justified-home" aria-selected="false">
                                            <i class="tf-icons bx bxs-edit-alt"></i> ASISTENCIAS
                                        </button>
                                    </li>

                                    <li class="nav-item">
                                        <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-justified-messages" aria-controls="navs-pills-justified-messages" aria-selected="false">
                                            <i class="tf-icons bx bxs-notepad"></i> CALIFICACIONES
                                        </button>
                                    </li>
                                </ul>
                                <div class="tab-content">
 
                                    <div class="tab-pane fade" id="navs-pills-justified-home" role="tabpanel">
                                        <table  class="table table-striped table-hover" id="tablasAsistenciaE">
                                            <thead>
                                                <tr class="text-nowrap">
                                                    <th>Fecha</th>
                                                    <th>Estado Asistencia</th>                             
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <!-- Contenido de la tabla -->
                                            </tbody>
                                        </table>
                                    </div>

                                   
                                    
                                    <div class="tab-pane fade" id="navs-pills-justified-messages" role="tabpanel">
                                    <table  class="table table-striped table-hover" id="tablaResultadoE">
                                        <thead>
                                                 <tr class="text-nowrap"> 
                                                    <th>#</th>   
                                                    <th>Calificacion Final</th>   
                                                </tr>
                                        </thead>
                                        <tbody>
                                           
                                        </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                            

                    </div>
                </div>
            </div>
        </div>
            <!-- Content wrapper -->
            <div class="content-wrapper">
                <!-- Content -->
                <div class="container-xxl flex-grow-1 container-p-y">
                    <!-- Tabla personas -->

                    <?php if($nivelacceso == 'estudiante') { ?>
                        <div class="card" style="padding: 10px;">
                            <h1>Seleccionar Periodo:</h1>
                            <select  class="form-select" id="periodoselectorE">
                            </select>
                        </div>
                        <div class="py-4">
                            <div class="py-3 row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3" id="cursosContainerE"></div>
                            <!--Aquí se mostrarán los cursos seleccionados -->
                        </div>
                    <?php } ?>
                    
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

</body>
</html>


