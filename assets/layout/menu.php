<!-- Menu -->
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="../index.php" class="app-brand-link" target="_blank">
            <span class="app-brand-logo demo">
                <img src="../assets/img/logo.png" width="30" viewBox="0 0 25 42" version="1.1">
            </span>
            <span class="app-brand-text demo menu-text fw-bolder ms-2">OLYMPUS</span>
        </a>
        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item active">
            <a href="dashboard.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>

        <!-- administrador -->
        <?php if($nivelacceso == 'administrador') { ?>
            <!-- Layouts -->
            <li class="menu-header small text-uppercase">
                <span class="menu-header-text"> Asistencia / Notas</span>
            </li>

            <li class="menu-item">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class='bx bxs-id-card' ></i>
                    <div data-i18n="Account Settings">&nbsp; CEO</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item">
                        <a href="administrador.php" class="menu-link">
                            <div data-i18n="Account">Modulos</div>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="menu-item">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class='bx bxs-user' ></i>
                    <div data-i18n="Account Settings">&nbsp; Personas</div>
                </a>
                
                <ul class="menu-sub">
                    <li class="menu-item">
                        <a href="personas.php" class="menu-link">
                            <div data-i18n="Account">Agregar Personas</div>
                        </a>
                        <a href="listaPersonas.php" class="menu-link">
                            <div data-i18n="Account">Lista de Personas</div>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="menu-item">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class='bx bxs-graduation' ></i>
                    <div data-i18n="Account Settings">&nbsp; Alumnos</div>
                </a>

                <ul class="menu-sub">
                    <li class="menu-item">
                        <a href="registroAlumnos.php" class="menu-link">
                            <div data-i18n="Account">Agregar Alumnos</div>
                        </a>
                        <a href="listaAlumnos.php" class="menu-link">
                            <div data-i18n="Account">Lista de Alumnos</div>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="menu-item">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class='bx bxs-chalkboard'></i>
                    <div data-i18n="Account Settings">&nbsp; Profesores</div>
                </a>

                <ul class="menu-sub">
                    <li class="menu-item">
                        <a href="registroProfesores.php" class="menu-link">
                            <div data-i18n="Account">Agregar Profesores</div>
                        </a>
                        <a href="listaProfesor.php" class="menu-link">
                            <div data-i18n="Account">Lista de Profesores</div>
                        </a>
                    </li>
                </ul>
            </li>

            <!-- soporte-->
            <li class="menu-header small text-uppercase"><span class="menu-header-text">SOPORTE</span></li>
            <li class="menu-item">
                <a href="https://github.com/RFBS23/proyecto_final/issues/1" target="_blank" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-support"></i>
                    <div data-i18n="Support">Soporte</div>
                </a>
            </li>
        <?php } ?>
        <!-- fin administrador -->

        <!-- estudiantes -->
        <?php if($nivelacceso == 'estudiante') { ?>
            <!-- Layouts -->
            <li class="menu-header small text-uppercase">
                <span class="menu-header-text">Historial Academico</span>
            </li>
            <li class="menu-item">
                <a class="menu-sub">
                    <li class="menu-item">
                        <a href="historialestudiante.php" class="menu-link">
                            <div data-i18n="Account">Asistencia y Calificaciones</div>
                        </a>
                    </li>
                </a>
            </li>

            <li class="menu-header small text-uppercase">
                <span class="menu-header-text">Gestion de Estudiantes y profesores</span>
            </li>
            <li class="menu-item">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bxs-user-rectangle"></i>
                    <div data-i18n="Misc">Estudiantes</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item">
                        <a href="listaAlumnos.php" class="menu-link">
                            <div data-i18n="Under Maintenance">Lista de Estudiantes Registrados</div>
                        </a>
                    </li>
                </ul>
            </li>
        <?php } ?>
        <!-- fin estudiantes -->
    </ul>
</aside>
<!-- / Menu -->