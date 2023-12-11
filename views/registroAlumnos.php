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
            <!-- Content wrapper -->
            <div class="content-wrapper">
                <!-- Content -->
                <div class="container-xxl flex-grow-1 container-p-y">
                    <div class="row">
                        <div class="col-xl">
                            <div class="card mb-4">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h5 class="mb-0">Asignar Alumnos</h5>
                                </div>
                                <div class="card-body">
                                    <form class="row g-3">
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
                                        <div class="mb-3">
                                            <div class="col-md-3">
                                                <label class="form-label" for="b-nivelacceso">Nivel acceso</label>
                                                <select id="b-nivelacceso" class="form-select color-dropdown" disabled>
                                                    <option value="estudiante" selected>estudiante</option>
                                                </select>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Registrar</button>
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
