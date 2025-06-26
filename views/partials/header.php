<header class="main-header">
    <!-- Logo -->
    <a href="<?= PUBLIC_PATH ?>/inicio" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>G</b>T</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Gestor Tareas</b> </span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="<?= PUBLIC_PATH ?>/AdminLTE/dist/img/userDefault.png" class="user-image" alt="User Image">
                        <span class="hidden-xs"><?= $_SESSION["user"]["userName"] ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="<?= PUBLIC_PATH ?>/AdminLTE/dist/img/userDefault.png" class="img-circle" alt="User Image">
                            <p>
                                <?= $_SESSION["user"]["userName"] ?>
                                <small> <?= $_SESSION["user"]["userName"] ?> </small>
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
            
            <?php if ($_SESSION["user"]["idTipoUsuario"] == 2) : ?>
                <li> <a href="<?= PUBLIC_PATH ?>/tareas"> <i class="fa fa-tasks"></i> <span>Tareas</span> </a> </li>
            <?php endif; ?>
        </ul>
    </section>
</aside>