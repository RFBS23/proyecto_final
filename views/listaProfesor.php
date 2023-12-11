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
                    <!-- Tabla Profesores -->
                    <div class="card" style="padding: 10px;">
                        <h5 class="card-header">Listado de Profesores</h5>
                        <!-- boton Modal -->
                        <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#modal-buscador" style="width: 200px;">
                            Buscar Profesor
                        </button>
                        <div class="table-responsive text-nowrap py-3">
                            <table class="table display responsive nowrap" width="100%" id="tabla_profesor">
                                <thead>
                                    <tr class="text-nowrap">
                                        <th>Nombres</th>
                                        <th>Apellidos</th>
                                        <th>Tipo de Documento</th>
                                        <th>Numero de Documento</th>
                                        <th>Especialidad</th>
                                        <th>Número de Emergencia</th>
                                        <th>Opciones</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    <!-- datos asincronos -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!--/ Table profesores -->

                    <!-- Modal buscar profesores-->
                    <div class="modal fade" id="modal-buscador" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title badge bg-label-warning" id="modalTitleId">Buscar Profesor por DNI</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="" id="formulario-busqueda-profesor" autocomplete="off">
                                        <div class="row mt-3">
                                            <label for="b-documento" class="col-form-label col-sm-3 bold">Escriba Numero de documento</label>
                                            <div class="col-sm-9">
                                                <input type="search" class="form-control" id="b-documento" maxlength="12" placeholder="Enter buscar">
                                            </div>
                                        </div>
                                        <hr>
                                        <small class="text-light fw-semibold badge bg-label-primary">AQUI SE MOSTRARAN TODOS LOS DATOS</small>
                                        <div class="row g-2">
                                            <div class="col mb-0">
                                                <label for="b-nombre" class="form-label">Nombres</label>
                                                <input type="text" id="b-nombre" class="form-control" readonly>
                                            </div>
                                            <div class="col mb-0">
                                                <label for="b-apellidos" class="form-label">Apellidos</label>
                                                <input type="text" id="b-apellidos" class="form-control" readonly>
                                            </div>
                                        </div>
                                        <div class="row g-2">
                                            <div class="col mb-0">
                                                <label for="b-genero" class="form-label">Genero</label>
                                                <input type="text" id="b-genero" class="form-control" readonly>
                                            </div>
                                            <div class="col mb-0">
                                                <label for="b-tipoDoc" class="form-label">Tipo de Documento</label>
                                                <input type="text" id="b-tipoDoc" class="form-control" readonly>
                                            </div>
                                        </div>
                                        <div class="row g-2">
                                            <div class="col mb-0">
                                                <label for="b-especialidad" class="form-label">Especialidad</label>
                                                <input type="text" id="b-especialidad" class="form-control" readonly>
                                            </div>
                                            <div class="col mb-0">
                                                <label for="b-emergencia" class="form-label">Numero de emergencia</label>
                                                <input type="tel" id="b-emergencia" class="form-control" maxlength="9" onkeypress="return SoloNumeros(event);" readonly>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                        Close
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/ fin modal -->

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
<script src="../assets/js/listaprofesor.js"></script>
<script>

</script>
</body>
</html>

