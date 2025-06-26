<?php include APP_PATH . '/views/partials/head.php'; ?>
<?php include APP_PATH . '/views/partials/header.php'; ?>

<div class="content-wrapper">
    <section class="content-header">
        <h1> Mis Tareas </h1>
        <ol class="breadcrumb">
            <li><a href="inicio"><i class="fa fa-home"></i> Inicio</a></li>
            <li class="active">Mis Tareas</li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <button type="button" class="btn btn-success" id="btnAddTarea"><i class="fa fa-plus-square"></i> Nueva Tarea</button>
            </div>
            <div class="box-body">
                <table id="dt_tareas" class="table table-striped table-bordered nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tarea</th>
                            <th>Descripción</th>
                            <th>Fecha de vencimiento</th>
                            <th>Prioridad</th>
                            <th>Estado</th>
                            <th>Fecha Creación</th>
                            <th>Ultima Fecha Modificación</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>

<?php include APP_PATH . '/views/partials/footer.php'; ?>
<script src="<?= HelperService::autoVersion('js/tareas.js') ?>"></script>