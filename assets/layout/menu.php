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
                    <div data-i18n="Account Settings"> CEO</div>
                </a>
                
                <ul class="menu-sub">
                    <li class="menu-item">
                        <a href="asistencialumnos.php" class="menu-link">
                            <div data-i18n="Account">Modulos</div>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="menu-item">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class='bx bxs-id-card' ></i>
                    <div data-i18n="Account Settings">Registros</div>
                </a>
                
                <ul class="menu-sub">
                    <li class="menu-item">
                        <a href="personas.php" class="menu-link">
                            <div data-i18n="Account">Agregar y ver Personas</div>
                        </a>
                        <a href="listaPersonas.php" class="menu-link">
                            <div data-i18n="Account">Lista de Personas</div>
                        </a>
                    </li>
                </ul>
            </li>

        
            <!-- soporte -->
            <li class="menu-header small text-uppercase"><span class="menu-header-text">SOPORTE</span></li>
            <li class="menu-item">
                <a href="https://github.com/RFBS23/proyecto_final/issues/1" target="_blank" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-support"></i>
                    <div data-i18n="Support">Soporte</div>
                </a>
            </li>
        <?php } ?>
        <!-- fin administrador -->

        <!-- profesor -->
        <?php if($nivelacceso == 'estudiante') { ?>
            <!-- Layouts -->
            <li class="menu-header small text-uppercase">
                <span class="menu-header-text">Notas Academicos</span>
            </li>

            <li class="menu-item">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bxs-notepad"></i>
                    <div data-i18n="Account Settings">Notas</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item">
                        <a href="asistencialumnos.php" class="menu-link">
                            <div data-i18n="Account">Registro de Notas</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="pages-account-settings-notifications.html" class="menu-link">
                            <div data-i18n="Notifications">Consulta de Notas</div>
                        </a>
                    </li>
                </ul>
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
        <!-- fin profesor -->
    </ul>
</aside>
<!-- / Menu -->