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
            <!-- Content wrapper -->
            <div class="content-wrapper">
                <!-- Content -->
                <div class="container-xxl flex-grow-1 container-p-y">
                    <!-- Tabla personas -->
                    <div class="card" style="padding: 20px; background: linear-gradient(#ffffff, #e5e6fa);">
                        <h5 class="card-header">Listado de Personas</h5>
                        <div class="table-responsive text-nowrap">
                            <table class="table responsive nowrap" width="100%" id="tabla-personas">
                                <thead>
                                    <tr class="text-nowrap">
                                        <th>Nombres</th>
                                        <th>Apellidos</th>
                                        <th>Telefono</th>
                                        <th>Direccion</th>
                                        <th>Fecha de Nacimiento</th>
                                        <th>Tipo Doc</th>
                                        <th>Numero de Documento</th>
                                        <th>Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!--/ Tabla personas -->

                    <div class="col-lg-4 col-md-6">
                        <div class="mt-3">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-buscador" style="display: none">
                                Launch modal
                            </button>
                            <div class="modal fade" id="modal-buscador" aria-labelledby="modalToggleLabel" tabindex="-1" style="display: none" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalToggleLabel">
                                                <span class="badge bg-label-primary">Buscar Personas</span>
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form class="row g-3" action="" id="formulario-busqueda-personas">
                                                <div class="col-md-4">
                                                    <label for="b-nombres" class="form-label">Nombres</label>
                                                    <input type="text" class="form-control" id="b-nombres" readonly>
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="form-label" for="b-pellidos">Apellidos</label>
                                                    <input type="text" class="form-control" id="b-pellidos" readonly>
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
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-primary" data-bs-target="#modalToggle2" data-bs-toggle="modal" data-bs-dismiss="modal">
                                                cerrar
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

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
<!-- / Layout wrapper 
<script src="../assets/js/personas.js"></script>-->
</body>
</html>

