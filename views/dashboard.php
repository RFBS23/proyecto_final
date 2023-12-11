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
    <title>DASHBOARD</title>
    <?php include '../assets/layout/header.php' ?>
</head>
<body style="user-select: none;">
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- menu -->
            <?php  include '../assets/layout/menu.php' ?>
            <!-- fin Menu -->

            <!-- Layout container y opciones de usuarios -->
            <div class="layout-page">
                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <div class="row">
                            <?php include '../assets/layout/cardmodal.php' ?>
                        </div>
                        <div class="row align-items-md-stretch">
                            <div class="col-md-6">
                                <div class="h-100 p-5 bg-body-tertiary border rounded-3">
                                    <canvas id="asistenciaChart"></canvas>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="h-100 p-5 bg-body-tertiary border rounded-3">
                                    <canvas id="resultadosalumnos"></canvas>
                                </div>
                            </div>
                        </div>
                        <!-- cargamos el contenido dinamico -->
                        <div class="container-fluid" id="contenido-dinamico">

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

<script>
    var datos = {
        labels: ["Asistieron", "Faltaron", "Ausentes", "Justificados"],
        datasets: [{
            data: [1, 0, 0, 1], // Porcentajes de asistencia
            backgroundColor: [
                'rgba(75, 192, 192, 0.2)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(255, 205, 86, 0.2)',
                'rgba(54, 162, 235, 0.2)'
            ],
            borderColor: [
                'rgba(75, 192, 192, 1)',
                'rgba(255, 99, 132, 1)',
                'rgba(255, 205, 86, 1)',
                'rgba(54, 162, 235, 1)'
            ],
            borderWidth: 1
        }]
    };

    // Configuración del gráfico
    var opciones = {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                position: 'top',
            },
            title: {
                display: true,
                text: 'Porcentaje de Asistencia'
            }
        }
    };
    // Obtén el contexto del canvas
    var ctx = document.getElementById('asistenciaChart').getContext('2d');

    // Crea el gráfico de tipo 'doughnut'
    var myDoughnutChart = new Chart(ctx, {
        type: 'doughnut',
        data: datos,
        options: opciones
    });

    /* grafico de calificaciones */
    var datosJSON = <?php echo !empty($datos_json) ? $datos_json : 'null'; ?>;

    // Verificar si hay datos y obtener las propiedades adecuadas
    var porcentajeAprobados = datosJSON ? datosJSON.porcentaje_aprobados : 0;
    var porcentajeDesaprobados = datosJSON ? datosJSON.porcentaje_desaprobados : 0;

    var ctx = document.getElementById('resultadosalumnos').getContext('2d');
    var miGrafico = new Chart(ctx, {
        type: 'bar', // Puedes cambiar el tipo de gráfico según tus necesidades
        data: {
            labels: ['Aprobados', 'Desaprobados'],
            datasets: [{
                data: [porcentajeAprobados, porcentajeDesaprobados],
                backgroundColor: ['green', 'red']
            }]
        }
    });
</script>