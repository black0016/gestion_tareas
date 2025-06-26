<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SIROS SYSTEM</title>

    <!-- Icono de la pagina -->
    <link rel="icon" type="image" href="<?= PUBLIC_PATH ?>/img/prueba2.png">
    <!-- bootstrap -->
    <link rel="stylesheet" href="<?= PUBLIC_PATH ?>/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= PUBLIC_PATH ?>/AdminLTE/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= PUBLIC_PATH ?>/AdminLTE/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins -->
    <link rel="stylesheet" href="<?= PUBLIC_PATH ?>/AdminLTE/dist/css/skins/_all-skins.min.css">
    <!-- datatable -->
    <link rel="stylesheet" href="<?= PUBLIC_PATH ?>/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/searchbuilder/1.2.0/css/searchBuilder.dataTables.min.css"/> -->
    <link rel="stylesheet" href="https://cdn.datatables.net/searchbuilder/1.3.2/css/searchBuilder.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/searchpanes/2.0.0/css/searchPanes.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/select/1.3.4/css/select.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/datetime/1.1.2/css/dataTables.dateTime.min.css">

    <!-- bootstrap validator -->
    <link rel="stylesheet" href="<?= PUBLIC_PATH ?>/css/bootstrapValidator.min.css">
    <!-- modales confirm -->
    <link rel="stylesheet" href="<?= PUBLIC_PATH ?>/css/jquery-confirm.css">
    <!-- chosen-select -->
    <link rel="stylesheet" href="<?= PUBLIC_PATH ?>/css/chosen.min.css">
    <!-- bootstrap-datepicker -->
    <link rel="stylesheet" href="<?= PUBLIC_PATH ?>/css/bootstrap-datepicker.css">

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    <!-- estilos propios -->
    <link rel="stylesheet" href="<?= PUBLIC_PATH ?>/css/styles.css">

    <!-- Libreria para visualizar las fotos -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css">

    <!-- Select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

</head>
<!-- <body class="hold-transition skin-red sidebar-mini"> -->

<body class="hold-transition skin-black-light sidebar-mini">

    <?php
    if (!isset($_SESSION['usuario'])) {
        header('Location:' . PUBLIC_PATH . '/');
    }

    // Codigo que expira las sesiones despues de 30 minutos de inactividad
    // if (!isset($_SESSION["time"])) {
    //     $_SESSION["time"] = time();
    // } else if (time() - $_SESSION["time"] > 1800) {
    //     session_destroy();
    //     header('Location:' . PUBLIC_PATH . '/');
    //     die();
    // }
    // $_SESSION["time"] = time();
    ?>

    <div class="preload hidden">
        <img src="<?= PUBLIC_PATH ?>/img/ajax-loader.gif" alt="preload">
    </div>
    <div class="wrapper">