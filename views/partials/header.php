<header class="main-header">
    <!-- Logo -->
    <a href="<?= PUBLIC_PATH ?>/inicio" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>S</b>R</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>S I R O S</b> </span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">

                <!-- Central JMC - Gestor servicios especiales -->
                <?php if ($_SESSION["usuario"]["idTipoUsuario"] == 17 || $_SESSION["usuario"]["idTipoUsuario"] == 18) : ?>
                    <li class="dropdown messages-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-bell-o"></i>
                            <span class="label label-success" id="cantNotificacionesServiciosEspeciales"> </span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-noCierreClick">
                            <li class="header" id="cantNotificacionesServiciosEspecialesTexto"></li>
                            <li>
                                <ul class="menu" id="menuNotificacionesServiciosEspeciales">

                                </ul>
                            </li>
                            <!-- <li class="footer"><a href="#">See All Messages</a></li> -->
                        </ul>
                    </li>
                <?php endif; ?>

                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="<?= PUBLIC_PATH ?>/AdminLTE/dist/img/userDefault.png" class="user-image" alt="User Image">
                        <span class="hidden-xs"><?= $_SESSION["usuario"]["nombreUsuario"] ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="<?= PUBLIC_PATH ?>/AdminLTE/dist/img/userDefault.png" class="img-circle" alt="User Image">
                            <p>
                                <?= $_SESSION["usuario"]["nombreUsuario"] ?>
                                <small> <?= $_SESSION["usuario"]["nombreTipoUsuario"] ?> </small>
                            </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="<?= PUBLIC_PATH ?>/perfil" class="btn btn-default btn-flat">Perfil</a>
                            </div>
                            <div class="pull-right">
                                <a href="<?= PUBLIC_PATH ?>/cerrarSesion" class="btn btn-default btn-flat">Salir</a>
                            </div>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>
    </nav>
</header>

<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu">
            <li class="header">MENU DE NAVEGACIÓN</li>
            <li> <a href="<?= PUBLIC_PATH ?>/inicio"> <i class="fa fa-dashboard"> </i> <span>Inicio</span> </a> </li>
            <!-- Administrador Securicol -->
            <?php if ($_SESSION["usuario"]["idTipoUsuario"] == 1) : ?>

                <li> <a href="<?= PUBLIC_PATH ?>/clientes"> <i class="fa fa-users"> </i> <span>Clientes</span> </a> </li>
                <li> <a href="<?= PUBLIC_PATH ?>/tipo-usuarios"> <i class="fa fa-users"> </i> <span>Tipo de usuarios</span> </a> </li>
                <li> <a href="<?= PUBLIC_PATH ?>/usuarios"> <i class="fa fa-users"> </i> <span>Usuarios</span> </a> </li>
                <li> <a href="<?= PUBLIC_PATH ?>/zonas"> <i class="fa fa-tag"> </i> <span>Zonas</span> </a> </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-building-o"></i>
                        <span>Puestos de trabajo</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li> <a href="<?= PUBLIC_PATH ?>/puestos-de-trabajo"> <i class="fa fa-circle-o"> </i> <span>Juan Valdez</span> </a> </li>
                        <li> <a href="<?= PUBLIC_PATH ?>/puestos-de-trabajo-JMC"> <i class="fa fa-circle-o"> </i> <span>Jeronimo Martins</span> </a> </li>
                    </ul>
                </li>
                <li> <a href="<?= PUBLIC_PATH ?>/admin-guardas"> <i class="fa fa-users"> </i> <span>Admin Guardas</span> </a> </li>
                <li> <a href="<?= PUBLIC_PATH ?>/asignar-puestos"> <i class="fa fa-clone"> </i> <span>Asignar Puestos</span> </a> </li>
                <li> <a href="<?= PUBLIC_PATH ?>/serviciosEspecialesAdmin"> <i class="fa fa-truck"> </i> <span>Servicios especiales</span> </a> </li>
                <li> <a href="<?= PUBLIC_PATH ?>/serviciosEspecialesAdminMin"> <i class="fa fa-truck"> </i> <span>Servicios especiales (Min)</span> </a> </li>
                <li> <a href="<?= PUBLIC_PATH ?>/gestionDeResultadosAdministrador"> <i class="fa fa-money"> </i> <span>Gestión de resultados</span> </a> </li>

            <?php endif; ?>

            <!-- Gerente Juan Valdez -->
            <?php if ($_SESSION["usuario"]["idTipoUsuario"] == 3) : ?>

                <li> <a href="<?= PUBLIC_PATH ?>/usuarios"> <i class="fa fa-users"> </i> <span>Usuarios</span> </a> </li>
                <li> <a href="<?= PUBLIC_PATH ?>/puestos-de-trabajo"> <i class="fa fa-building-o"> </i> <span>Puestos de trabajo</span> </a> </li>
                <li> <a href="<?= PUBLIC_PATH ?>/reporteGerenteJV"> <i class="fa fa-th"> </i> <span>Reporte</span> </a> </li>
                <li> <a href="<?= PUBLIC_PATH ?>/estadisticasGerenteJv"> <i class="fa fa-bar-chart"> </i> <span>Estadisticas</span> </a> </li>

            <?php endif; ?>

            <!-- Directora de operaciones Juan Valdez -->
            <?php if ($_SESSION["usuario"]["idTipoUsuario"] == 4) : ?>

                <li> <a href="<?= PUBLIC_PATH ?>/usuarios"> <i class="fa fa-users"> </i> <span>Usuarios</span> </a> </li>
                <li> <a href="<?= PUBLIC_PATH ?>/zonas"> <i class="fa fa-tag"> </i> <span>Zonas</span> </a> </li>
                <li> <a href="<?= PUBLIC_PATH ?>/puestos-de-trabajo"> <i class="fa fa-building-o"> </i> <span>Puestos de trabajo</span> </a> </li>
                <li> <a href="<?= PUBLIC_PATH ?>/reporteJV"> <i class="fa fa-th"> </i> <span>Reporte</span> </a> </li>
                <li> <a href="<?= PUBLIC_PATH ?>/estadisticasDirectorJv"> <i class="fa fa-bar-chart"> </i> <span>Estadisticas</span> </a> </li>

            <?php endif; ?>

            <!-- Director y Coordinador Nacional Securicol-->
            <?php if ($_SESSION["usuario"]["idTipoUsuario"] == 7 || $_SESSION["usuario"]["idTipoUsuario"] == 8) : ?>
                <li> <a href="<?= PUBLIC_PATH ?>/reporteGuardas"> <i class="fa fa-th"> </i> <span>Reporte</span> </a> </li>
                <li> <a href="<?= PUBLIC_PATH ?>/dispositivoCentral"> <i class="fa fa-delicious"> </i> <span>Dispositivo</span> </a> </li>
                <li> <a href="<?= PUBLIC_PATH ?>/powerBiGestioDeResultados"> <i class="fa fa-bar-chart-o"> </i> <span>PowerBi Gestión Resultados</span> </a> </li>
                <?php if ($_SESSION["usuario"]["idEmpresaSeguridad"] == 1) : ?>
                    <li> <a href="<?= PUBLIC_PATH ?>/supervisionPuestoServicio"> <i class="fa fa-rocket"> </i> <span>Supervisión del puesto <br> de servicio</span> </a> </li>
                    <li> <a href="<?= PUBLIC_PATH ?>/resumenSupervisiones"> <i class="fa fa-tasks"> </i> <span>Resumen de Supervisiones</span> </a> </li>
                <?php endif; ?>
            <?php endif; ?>

            <!-- Central de monitoreo Securicol -->
            <?php if ($_SESSION["usuario"]["idTipoUsuario"] == 10) : ?>
                <li> <a href="<?= PUBLIC_PATH ?>/reporteGuardas"> <i class="fa fa-th"> </i> <span>Reporte</span> </a> </li>
                <li> <a href="<?= PUBLIC_PATH ?>/centroDeControl"> <i class="fa fa-area-chart"> </i> <span>Centro de control</span> </a> </li>
                <li> <a href="<?= PUBLIC_PATH ?>/cambioDePuesto"> <i class="fa fa-exchange"> </i> <span>Cambio de puesto</span> </a> </li>
                <li> <a href="<?= PUBLIC_PATH ?>/dispositivoCentral"> <i class="fa fa-delicious"> </i> <span>Dispositivo</span> </a> </li>
                <li> <a href="<?= PUBLIC_PATH ?>/serviciosEspeciales"> <i class="fa fa-truck"> </i> <span>Servicios especiales</span> </a> </li>
            <?php endif; ?>

            <!-- Cordinador Regional -->
            <?php if ($_SESSION["usuario"]["idTipoUsuario"] == 9) : ?>
                <li> <a href="<?= PUBLIC_PATH ?>/reporteGuardas"> <i class="fa fa-th"> </i> <span>Reporte</span> </a> </li>
                <li> <a href="<?= PUBLIC_PATH ?>/dispositivoCentral"> <i class="fa fa-delicious"> </i> <span>Dispositivo</span> </a> </li>
                <li> <a href="<?= PUBLIC_PATH ?>/cambioDePuesto"> <i class="fa fa-exchange"> </i> <span>Cambio de puesto</span> </a> </li>
                <li> <a href="<?= PUBLIC_PATH ?>/gestionDeResultadosRegional"> <i class="fa fa-money"> </i> <span>Gestión de resultados</span> </a> </li>
                <li> <a href="<?= PUBLIC_PATH ?>/serviciosEspecialesRegional"> <i class="fa fa-truck"> </i> <span>Servicios Especiales</span> </a> </li>
                <?php if ($_SESSION["usuario"]["idEmpresaSeguridad"] == 1) : ?>
                    <li> <a href="<?= PUBLIC_PATH ?>/supervisionPuestoServicio"> <i class="fa fa-rocket"> </i> <span>Supervisión del puesto <br> de servicio</span> </a> </li>
                    <li> <a href="<?= PUBLIC_PATH ?>/resumenSupervisiones"> <i class="fa fa-tasks"> </i> <span>Resumen de Supervisiones</span> </a> </li>
                <?php endif; ?>
            <?php endif; ?>

            <!-- Programador (Central) -->
            <?php if ($_SESSION["usuario"]["idTipoUsuario"] == 11) : ?>
                <li> <a href="<?= PUBLIC_PATH ?>/cambioDePuesto"> <i class="fa fa-exchange"> </i> <span>Cambio de puesto</span> </a> </li>
                <li> <a href="<?= PUBLIC_PATH ?>/dispositivoCentral"> <i class="fa fa-delicious"> </i> <span>Dispositivo</span> </a> </li>
            <?php endif; ?>

            <!-- Guarda -->
            <?php if ($_SESSION["usuario"]["idTipoUsuario"] == 6) : ?>
                <li> <a href="<?= PUBLIC_PATH ?>/crearGestionDeResultadosGuarda"> <i class="fa fa-money"> </i> <span>Crear gestión de resultados</span> </a> </li>
                <li> <a href="<?= PUBLIC_PATH ?>/viewDetalleGestionDeResultadosGuarda"> <i class="fa fa-list"> </i> <span>Ver gestión de resultados</span> </a> </li>
            <?php endif; ?>

            <!-- Supervisor Securicol -->
            <?php if ($_SESSION["usuario"]["idTipoUsuario"] == 12) : ?>
                <li> <a href="<?= PUBLIC_PATH ?>/serviciosEspecialesMotSup"> <i class="fa fa-truck"> </i> <span>Servicios especiales</span> </a> </li>
                <li> <a href="<?= PUBLIC_PATH ?>/crearGestionDeResultadosMotSup"> <i class="fa fa-money"> </i> <span>Crear gestión de resultados</span> </a> </li>
                <li> <a href="<?= PUBLIC_PATH ?>/viewDetalleGestionDeResultadosMotSup"> <i class="fa fa-list"> </i> <span>Ver gestión de resultados</span> </a> </li>
                <?php if ($_SESSION["usuario"]["idEmpresaSeguridad"] == 1) : ?>
                    <li> <a href="<?= PUBLIC_PATH ?>/rondasMovilesDeSeguridad"> <i class="fa fa-map"> </i> <span>Rondas móviles de seguridad</span> </a> </li>
                    <li> <a href="<?= PUBLIC_PATH ?>/relevosAlmuerzoPuesto"> <i class="fa fa-puzzle-piece"> </i> <span>Relevos de almuerzo y puesto</span> </a> </li>
                    <li> <a href="<?= PUBLIC_PATH ?>/supervisionPuestoServicio"> <i class="fa fa-rocket"> </i> <span>Supervisión del puesto <br> de servicio</span> </a> </li>
                <?php endif;  ?>
            <?php endif; ?>

            <!-- Motorizado Securicol -->
            <?php if ($_SESSION["usuario"]["idTipoUsuario"] == 13) : ?>
                <li> <a href="<?= PUBLIC_PATH ?>/serviciosEspecialesMotSup"> <i class="fa fa-truck"> </i> <span>Servicios especiales</span> </a> </li>
                <li> <a href="<?= PUBLIC_PATH ?>/crearGestionDeResultadosMotSup"> <i class="fa fa-money"> </i> <span>Crear gestión de resultados</span> </a> </li>
                <li> <a href="<?= PUBLIC_PATH ?>/viewDetalleGestionDeResultadosMotSup"> <i class="fa fa-list"> </i> <span>Ver gestión de resultados</span> </a> </li>
                <?php if ($_SESSION["usuario"]["idEmpresaSeguridad"] == 1) : ?>
                    <li> <a href="<?= PUBLIC_PATH ?>/rondasMovilesDeSeguridad"> <i class="fa fa-map"> </i> <span>Rondas móviles de seguridad</span> </a> </li>
                    <li> <a href="<?= PUBLIC_PATH ?>/relevosAlmuerzoPuesto"> <i class="fa fa-puzzle-piece"> </i> <span>Relevos de almuerzo y puesto</span> </a> </li>
                    <li> <a href="<?= PUBLIC_PATH ?>/supervisionPuestoServicio"> <i class="fa fa-rocket"> </i> <span>Supervisión del puesto <br> de servicio</span> </a> </li>
                <?php endif; ?>
            <?php endif; ?>

            <!-- Analista de seguridad JMC -->
            <?php if ($_SESSION["usuario"]["idTipoUsuario"] == 14) : ?>
                <li> <a href="<?= PUBLIC_PATH ?>/gestionDeResultadosClienteJmc"> <i class="fa fa-money"> </i> <span>Gestión de resultados</span> </a> </li>
                <li> <a href="<?= PUBLIC_PATH ?>/serviciosEspecialesJMC"> <i class="fa fa-truck"> </i> <span>Servicios Especiales</span> </a> </li>
            <?php endif; ?>

            <!-- Coronel JMC -->
            <?php if ($_SESSION["usuario"]["idTipoUsuario"] == 5) : ?>
                <li> <a href="<?= PUBLIC_PATH ?>/gestionDeResultadosClienteJmc"> <i class="fa fa-money"> </i> <span>Gestión de resultados</span> </a> </li>
                <li> <a href="<?= PUBLIC_PATH ?>/serviciosEspecialesJMC"> <i class="fa fa-truck"> </i> <span>Servicios Especiales</span> </a> </li>
            <?php endif; ?>

            <!-- Mesa de ayuda securicol -->
            <?php if ($_SESSION["usuario"]["idTipoUsuario"] == 15) : ?>
                <li> <a href="<?= PUBLIC_PATH ?>/novedadesElectronicasMesaDeAyuda"> <i class="fa fa-plug"> </i> <span>Novedades electrónicas</span> </a> </li>
                <?php if ($_SESSION["usuario"]["idEmpresaSeguridad"] == 1) : ?>
                    <li> <a href="<?= PUBLIC_PATH ?>/usuarios"> <i class="fa fa-users"> </i> <span>Usuarios</span> </a> </li>
                    <li> <a href="<?= PUBLIC_PATH ?>/puestos"> <i class="fa fa-building-o"> </i> <span>Puestos de trabajo</span> </a> </li>
                    <li> <a href="<?= PUBLIC_PATH ?>/cambioDePuesto"> <i class="fa fa-exchange"> </i> <span>Cambio de puesto</span> </a> </li>
                    <li> <a href="<?= PUBLIC_PATH ?>/asignar-puestos"> <i class="fa fa-clone"> </i> <span>Asignar Puestos</span> </a> </li>
                <?php endif; ?>
            <?php endif; ?>

            <!-- Asistente Regional Administrativa -->
            <?php if ($_SESSION["usuario"]["idTipoUsuario"] == 16) : ?>
                <li> <a href="<?= PUBLIC_PATH ?>/serviciosEspecialesRegional"> <i class="fa fa-truck"> </i> <span>Servicios Especiales</span> </a> </li>
                <li> <a href="<?= PUBLIC_PATH ?>/gestionDeResultadosRegional"> <i class="fa fa-money"> </i> <span>Gestión de resultados</span> </a> </li>
            <?php endif; ?>

            <!-- Central JMC -->
            <?php if ($_SESSION["usuario"]["idTipoUsuario"] == 17) : ?>
                <li> <a href="<?= PUBLIC_PATH ?>/serviciosEspecialesCentralJMC"> <i class="fa fa-truck"> </i> <span>Servicios Especiales</span> </a> </li>
            <?php endif; ?>

            <!-- Gestor servicios especiales -->
            <?php if ($_SESSION["usuario"]["idTipoUsuario"] == 18) : ?>
                <li> <a href="<?= PUBLIC_PATH ?>/serviciosEspecialesAdminMin"> <i class="fa fa-truck"> </i> <span>Servicios especiales (Min)</span> </a> </li>
            <?php endif; ?>

        </ul>
    </section>
</aside>