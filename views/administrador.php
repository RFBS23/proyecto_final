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
    <title>Sistema de calificaciones y asistencias</title>

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
            <div class="modal fade" id="modal-buscador" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
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
                                        <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-justified-profile" aria-controls="navs-pills-justified-profile" aria-selected="true">
                                            <i class="tf-icons bx bx-user"></i> PERFIL
                                        </button>
                                    </li>
                                    <li class="nav-item">
                                        <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-justified-home" aria-controls="navs-pills-justified-home" aria-selected="false">
                                            <i class="tf-icons bx bxs-edit-alt"></i> ASISTENCIAS
                                        </button>
                                    </li>
                                    <li class="nav-item">
                                        <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-justified-practicas" aria-controls="navs-pills-justified-practicas" aria-selected="false">
                                            <i class="tf-icons bx bxs-edit-alt"></i> Practicas/Examen
                                        </button>
                                    </li>
                                    <li class="nav-item">
                                        <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-justified-messages" aria-controls="navs-pills-justified-messages" aria-selected="false">
                                            <i class="tf-icons bx bxs-notepad"></i> CALIFICACIONES
                                        </button>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="navs-pills-justified-profile" role="tabpanel">
                                        <div class="card mb-4">
                                            <div class="d-flex align-items-start align-items-sm-center gap-4">
                                                <img src="../assets/img/avatars/1.png" alt="user-avatar" class="d-block rounded" height="100" width="100" id="uploadedAvatar"/>
                                                <div class="mb-3 gap-4">
                                                    <label for="firstName" class="form-label" id="nombrecurso">
                                                        nombre curso
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <hr class="my-0" />
                                        <div class="card-body">
                                            <form id="formAccountSettings">
                                                <div class="row">
                                                    <div class="mb-3 col-md-6">
                                                        <label for="firstName" class="form-label">Nombre</label>
                                                        <input class="form-control disabled" type="text" id="firstName" name="firstName" placeholder="escribe tu nombre" autofocus />
                                                    </div>
                                                    <div class="mb-3 col-md-6">
                                                        <label for="lastName" class="form-label">Apellidos</label>
                                                        <input class="form-control" type="text" name="lastName" id="lastName" placeholder="escribe tu apellido" />
                                                    </div>
                                                    <div class="mb-3 col-md-6">
                                                        <label for="email" class="form-label">E-mail</label>
                                                        <input class="form-control" type="text" id="email" name="email" placeholder="john.doe@example.com"/>
                                                    </div>
                                                    <div class="mb-3 col-md-6">
                                                        <label for="organization" class="form-label">Organization</label>
                                                        <input type="text" class="form-control" id="organization" name="organization" value="ThemeSelection"/>
                                                    </div>
                                                    <div class="mb-3 col-md-6">
                                                        <label class="form-label" for="phoneNumber">Numero de Telefono</label>
                                                        <div class="input-group input-group-merge">
                                                            <span class="input-group-text">PE (+51)</span>
                                                            <input type="text" id="phoneNumber" name="phoneNumber" class="form-control" placeholder="202 555 0111"/>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 col-md-6">
                                                        <label for="address" class="form-label">Address</label>
                                                        <input type="text" class="form-control" id="address" name="address" placeholder="Address" />
                                                    </div>
                                                    <div class="mb-3 col-md-6">
                                                        <label for="state" class="form-label">State</label>
                                                        <input class="form-control" type="text" id="state" name="state" placeholder="California" />
                                                    </div>
                                                    <div class="mb-3 col-md-6">
                                                        <label for="zipCode" class="form-label">Zip Code</label>
                                                        <input type="text" class="form-control" id="zipCode" name="zipCode" placeholder="231465" maxlength="6"/>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="navs-pills-justified-home" role="tabpanel">
                                        <table  class="table table-striped table-hover" id="tablasAsistencia">
                                            <thead>
                                                <tr class="text-nowrap">
                                                    <th></th>
                                                    <th>Apellidos</th>
                                                    <th>Nombres</th>
                                                    <th>Estado</th>
                                                    <th class="text-center">Opciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <!-- Contenido de la tabla -->
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="tab-pane fade" id="navs-pills-justified-practicas" role="tabpanel">
                                        <div class="card h-100 practica-card" id="practica-container-1" data-practica="1">
                                            <div class="card-body">
                                                <h5 class="card-title">PRACTICA 1</h5>
                                                <p class="card-text">Ingresar notas</p>
                                            </div>
                                        </div>

                                        <div class="card h-100 mt-4 practica-card" id="practica-container-2" data-practica="2">
                                            <div class="card-body">
                                                <h5 class="card-title">PRACTICA 2</h5>
                                                <p class="card-text">Ingresar notas</p>
                                            </div>
                                        </div>

                                        <div class="card h-100 mt-4 practica-card" id="practica-container-3" data-practica="3">
                                            <div class="card-body">
                                                <h5 class="card-title">PRACTICA 3</h5>
                                                <p class="card-text">Ingresar notas</p>
                                            </div>
                                        </div>

                                        <div class="card h-100 mt-4 practica-card" id="practica-container-4" data-practica="4">
                                            <div class="card-body">
                                                <h5 class="card-title">PRACTICA 4</h5>
                                                <p class="card-text">Ingresar notas</p>
                                            </div>
                                        </div>

                                        <div class="card h-100 mt-4 practica-card" id="practica-container-5"  data-practica="5">
                                            <div class="card-body">
                                                <h5 class="card-title">PRACTICA 5</h5>
                                                <p class="card-text">Ingresar notas</p>
                                            </div>
                                        </div>

                                        <div class="card h-100 mt-4 practica-card" id="practica-container-6" data-practica="6">
                                            <div class="card-body">
                                                <h5 class="card-title">PRACTICA 6</h5>
                                                <p class="card-text">Ingresar notas</p>
                                            </div>
                                        </div>

                                        <div class="card h-100 mt-4 practica-card" id="practica-container-7" data-practica="7">
                                            <div class="card-body">
                                                <h5 class="card-title">PRACTICA 7</h5>
                                                <p class="card-text">Ingresar notas</p>
                                            </div>
                                        </div>

                                        <div class="card h-100 mt-4 practica-card" id="practica-container-8"  data-practica="8">
                                            <div class="card-body">
                                                <h5 class="card-title">PRACTICA 8</h5>
                                                <p class="card-text">Ingresar notas</p>
                                            </div>
                                        </div>

                                        <div class="card h-100 mt-4 practica-card" id="practica-container-9"  data-practica="9">
                                            <div class="card-body">
                                                <h5 class="card-title">PRACTICA 9</h5>
                                                <p class="card-text">Ingresar notas</p>
                                            </div>
                                        </div>

                                        <div class="card h-100 mt-4 practica-card" id="practica-container-10"  data-practica="10">
                                            <div class="card-body">
                                                <h5 class="card-title">PRACTICA 10</h5>
                                                <p class="card-text">Ingresar notas</p>
                                            </div>
                                        </div>

                                        <div class="card h-100 mt-4 practica-card" id="practica-container-11"  data-practica="11">
                                            <div class="card-body">
                                                <h5 class="card-title">PRACTICA 11</h5>
                                                <p class="card-text">Ingresar notas</p>
                                            </div>
                                        </div>

                                        <div class="card h-100 mt-4 practica-card" id="practica-container-12"  data-practica="12">
                                            <div class="card-body">
                                                <h5 class="card-title">PRACTICA 12</h5>
                                                <p class="card-text">Ingresar notas</p>
                                            </div>
                                        </div>

                                        <div class="card h-100 mt-4 practica-card" id="practica-container-13" data-practica="13">
                                            <div class="card-body">
                                                <h5 class="card-title">Examen Final</h5>
                                                <p class="card-text">Ingresar notas</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="navs-pills-justified-messages" role="tabpanel">
                                        <table  class="table table-striped table-hover" id="tablaResultado">
                                            <thead>
                                                 <tr class="text-nowrap">
                                                    <th></th>
                                                    <th>Apellidos</th>
                                                    <th>Nombres</th>
                                                    <th>Calificacion Final</th>
                                                     <th>Ver Calificaciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                            <div class="modal fade" id="modal-practica" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                                <div class="modal-dialog modal-fullscreen" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body" >
                                            <div class="card-body">
                                                <div id="mensajeRegistro"></div>
                                                <div id="fechaHoraTh"></div>
                                                </div>
                                                <div class="card-body">
                                                    <table  class="table table-striped table-hover"  id="tablaPractica" >
                                                        <thead>
                                                            <tr class="text-nowrap">
                                                                <th></th>
                                                                <th>Apellidos</th>
                                                                <th>Nombres</th>
                                                                <th>Calificacion</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>

                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-outline-danger rounded-pill" data-bs-dismiss="modal">Cerrar</button>
                                                </div>
                                            </div>
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
                        <?php if($nivelacceso == 'administrador') { ?>
                            <div class="card" style="padding: 10px;">
                                <header class="border-bottom lh-1 py-3">
                                    <div class="row flex-nowrap justify-content-between align-items-center">
                                        <div class="col-4 d-flex justify-content-start">
                                            <i class="tf-icons bx bxs-chevron-left"></i>
                                            <a class="link-secondary" href="#">Cursos anteriores</a>
                                        </div>
                                        <div class="col-4 text-center">

                                            <label for="id_label_single">
                                                <h5 class="blog-header-logo text-body-emphasis text-decoration-none">Seleccione el Periodo</h5>
                                                <select class="js-example-basic-single js-states form-control" id="periodoSelector" style="cursor:pointer;">

                                                </select>
                                            </label>
                                        </div>
                                        <div class="col-4 d-flex justify-content-end">
                                            <a class="link-secondary" href="#">Cursos Antiguos</a>
                                            <i class="tf-icons bx bxs-chevron-right"></i>
                                        </div>
                                    </div>
                                </header>
                                <div class="py-4">
                                    <div class="py-3 row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3" id="cursosContainer"></div>
                                    <!--Aquí se mostrarán los cursos seleccionados -->
                                </div>
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

<script>
    function limitarADosDigitos(input) {
        // Obtén el valor actual del campo
        let valor = input.value;

        // Asegúrate de que la longitud del valor sea como máximo 2 dígitos
        if (valor.length > 2) {
            // Si es más largo, corta el valor para que tenga solo 2 dígitos
            valor = valor.slice(0, 2);
            // Actualiza el valor del campo
            input.value = valor;
        }

        // Asegúrate de que el valor no sea superior a 20
        if (parseInt(valor) > 20) {
            // Si es superior a 20, establece el valor a 20
            input.value = 20;
        }
    }

    $(document).ready(function () {
        $('.practica-card').click(function () {
            $('#exampleModalLabel');
            // Agrega aquí la lógica para llenar la tabla con datos relacionados con la tarjeta clickeada
            // Puedes usar AJAX para obtener datos dinámicamente.
            // Por simplicidad, he dejado vacía la lógica de población de datos.
            $('#modal-practica').modal('show');
        });
    });

    $(document).on('click', '#btnModal1', function() {
        $('#modal1').modal('show');
    });

    $(document).on('click', '#btnModal2', function() {
        $('#modal2').modal('show');
    });

</script>
