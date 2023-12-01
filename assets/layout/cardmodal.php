<?php if($nivelacceso == 'profesor'){ ?>
    <div class="mb-4 order-0">
        <div class="card" id="cardmodal">
            <div class="d-flex align-items-end row">
                <div class="col-sm-7">
                    <div class="card-body">
                        <h5 class="card-title text-primary">Bienvenido
                            <?=
                            $_SESSION['login']['nombreusuario']
                            ?>
                        </h5>
                        <p class="mb-4" style="text-align: justify">
                            Hecha un vistazo para que puedas agregar calificaciones de algun curso.
                        </p>
                    </div>
                </div>
                <div class="col-sm-5 text-center text-sm-left">
                    <div class="card-body pb-0 px-0 px-md-1">
                        <img src="../assets/admin/img/illustrations/man-with-laptop-light.png" height="170" alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png" data-app-light-img="illustrations/man-with-laptop-light.png"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if($nivelacceso == 'estudiante'){ ?>
    <div class="mb-4 order-0">
        <div class="card" id="cardmodal">
            <div class="d-flex align-items-end row">
                <div class="col-sm-7">
                    <div class="card-body">
                        <h5 class="card-title text-primary">Bienvenido
                            <?=
                            $_SESSION['login']['nombreusuario']
                            ?>
                        </h5>
                        <p class="mb-4" style="text-align: justify">
                            podras ver tus calificaciones y tus asistencias aqui, tambien revisa los curso que tengas pendientes y terminalos ya.
                        </p>
                    </div>
                </div>
                <div class="col-sm-5 text-center text-sm-left">
                    <div class="card-body pb-0 px-0 px-md-1">
                        <img src="../assets/admin/img/illustrations/man-with-laptop-light.png" height="140" alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png" data-app-light-img="illustrations/man-with-laptop-light.png"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if($nivelacceso == 'administrador'){ ?>
    <div class="col-lg-6 col-md-6 order-1">
        <div class="row">
            <div class="col-lg-6 col-md-12 col-6 mb-4" id="Testudiante">
                <div class="card">
                    <!--datos asincronos -->
                </div>
            </div>

            <div class="col-lg-6 col-md-12 col-6 mb-4" id="Tcursos">
                <div class="card">
                    <!--datos asincronos -->
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-6 col-md-6 order-1">
        <div class="row">
            <div class="col-lg-6 col-md-12 col-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                                <img src="../assets/img/icons/periodos.png" alt="Credit Card" class="rounded"/>
                            </div>
                        </div>
                        <span>Total de Periodos</span>
                        <h5 class="card-title text-nowrap mb-1 py-1">4,679</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                                <img src="../assets/img/icons/notas.png" alt="Credit Card" class="rounded"/>
                            </div>
                        </div>
                        <span>Notas Publicadas</span>
                        <h5 class="card-title text-nowrap mb-1 py-1">4,679</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>