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
    <title>Lista de Alumnos</title>
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
                    <!-- contenido -->
                    <div class="col-xl">
                        <div class="card mb-4">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5 class="mb-0">Registro de Personas</h5>
                                <small class="text-muted float-end badge bg-label-success">Porfavor complete todos los campos requeridos</small>
                            </div>
                            <div class="card-body">
                                <form action="" autocomplete="off" id="formulario-persona">
                                    <div class="mb-3">
                                        <label class="form-label" for="nombres">Nombres</label>
                                        <div class="input-group input-group-merge">
                                        <span id="basic-icon-default-fullname2" class="input-group-text">
                                            <i class="bx bx-user"></i>
                                        </span>
                                            <input type="text" class="form-control" id="nombres" placeholder="Ingresa tu nombre" />
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="apellidos">Apellidos</label>
                                        <div class="input-group input-group-merge">
                                            <span id="basic-icon-default-company2" class="input-group-text">
                                              <i class="bx bx-user"></i>
                                            </span>
                                            <input type="text" id="apellidos" class="form-control" placeholder="ingresa tus apellidos" />
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="text-light fw-semibold d-block" for="genero">Género</label>
                                        <select id="genero" class="form-select color-dropdown" required>

                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="celular">Celular</label>
                                        <div class="input-group input-group-merge">
                                            <span id="basic-icon-default-company2" class="input-group-text">
                                              <i class="bx bx-phone"></i>
                                            </span>
                                            <input type="text" id="celular" class="form-control" maxlength="10" placeholder="Ingresa tu número telefónico" onkeypress="return SoloNumeros(event);" oninput="ValidarCelular()" required/>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="direccion">Direccion</label>
                                        <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-company2" class="input-group-text">
                                      <i class="bx bx-directions"></i>
                                    </span>
                                            <input type="text" id="direccion" class="form-control" placeholder="ingresa tus apellidos" aria-label="ACME Inc." aria-describedby="basic-icon-default-company2"/>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="fechanacimiento">Fecha Nacimiento</label>
                                        <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-company2" class="input-group-text">
                                      <i class="bx bx-calendar"></i>
                                    </span>
                                            <input type="date" id="fechanacimiento" class="form-control" placeholder="ingresa tus apellidos" aria-label="ACME Inc." aria-describedby="basic-icon-default-company2"/>
                                        </div>
                                    </div>
                                    <div class="row gx-3 gy-2 align-items-center">
                                        <div class="col-md-3">
                                            <label class="form-label" for="tipodocumento">Tipo de Documento</label>
                                            <select id="tipodocumento" class="form-select color-dropdown" onchange="ValidarNumeroDocumento()" required>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label" for="numerodocumento">Numero de Documento</label>
                                            <input type="text" id="numerodocumento" class="form-control" placeholder="Ingresa tu DNI o Carnet de Extranjería" onkeypress="return SoloNumeros(event);" required/>
                                        </div>
                                    </div>
                                    <div class="col-sm-10 py-3">
                                        <button type="button" class="btn btn-primary" id="registrar">Agregar Personas</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!--/ contenido -->
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
<script>
    function ValidarCelular() {
        // Obtener el valor actual del campo
        let inputValue = document.getElementById("celular").value;

        // Verificar que el primer dígito sea un "9"
        if (inputValue.length >= 1 && inputValue[0] !== "9") {
            // Mostrar mensaje de error con SweetAlert
            Swal.fire({
                backdrop: 'true',
                timerProgressBar: 'true',
                position: 'top-end',
                icon: 'error',
                title: 'El numero telefonico debe comenzar con 9',
                showConfirmButton: false,
                timer: 1500,
                toast: true,
            });
            // Limpiar el campo
            document.getElementById("celular").value = "";
        } else {
            // Limpiar mensaje si es válido
            document.getElementById("mensajeCelular").textContent = "";
        }

        // Restricción para permitir solo números
        document.getElementById("celular").value = document.getElementById("celular").value.replace(/\D/g, "");
    }
</script>
</body>
</html>
