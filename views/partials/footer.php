    </div>

    <!-- jquery -->
    <script src="<?= PUBLIC_PATH ?>/js/jquery3.4.1.min.js"></script>
    <!-- bootstrap -->
    <script src="<?= PUBLIC_PATH ?>/js/bootstrap.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= PUBLIC_PATH ?>/AdminLTE/dist/js/adminlte.min.js"></script>
    <!-- datatable -->
    <script src="<?= PUBLIC_PATH ?>/js/jquery.dataTables.min.js"></script>
    <script src="<?= PUBLIC_PATH ?>/js/dataTables.bootstrap.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>

    <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
    <!-- <script type="text/javascript" src="https://cdn.datatables.net/searchbuilder/1.2.0/js/dataTables.searchBuilder.min.js"></script> -->
    <script src="https://cdn.datatables.net/searchbuilder/1.3.2/js/dataTables.searchBuilder.min.js"></script>
    <script src="https://cdn.datatables.net/datetime/1.1.2/js/dataTables.dateTime.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>

    <script src="https://cdn.datatables.net/searchpanes/2.0.0/js/dataTables.searchPanes.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.3.4/js/dataTables.select.min.js"></script>

    <!-- modales confirm -->
    <script src="<?= PUBLIC_PATH ?>/js/jquery-confirm.js"></script>
    <!-- chosen-select -->
    <script src="<?= PUBLIC_PATH ?>/js/chosen.jquery.min.js"></script>
    <!-- bootstrap-datepicker -->
    <script src="<?= PUBLIC_PATH ?>/js/bootstrap-datepicker.js"></script>

    <!-- bootstrap validator -->
    <script src="<?= PUBLIC_PATH ?>/js/bootstrapValidator.min.js"></script>
    <!-- input mask -->
    <script src="<?= PUBLIC_PATH ?>/AdminLTE/plugins/input-mask/jquery.inputmask.js"></script>
    <script src="<?= PUBLIC_PATH ?>/AdminLTE/plugins/input-mask/jquery.inputmask.numeric.extensions.js"></script>
    <!-- Jquery Number -->
    <script src="<?= PUBLIC_PATH ?>/js/jquery.number.js"></script>
    <!-- Libreria para las graficas -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script> -->
    <!-- Librerias para los graficos charts.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.0/dist/chart.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>
    <!-- Libreria para visualizar las fotos -->
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
    <!-- Libreria para las notificaciones -->
    <script src="<?= PUBLIC_PATH ?>/js/push.js"></script>
    <!-- scripts propios -->
    <script src="<?= PUBLIC_PATH ?>/js/script.js"></script>
    <script src="<?= PUBLIC_PATH ?>/js/helpers.js"></script>

    <?php if ($_SESSION["usuario"]["idTipoUsuario"] == 17 || $_SESSION["usuario"]["idTipoUsuario"] == 18) : ?>
        <!-- Script de las notificaciones de servicios especiales -->
        <script src="<?= HelperService::autoVersion('js/notificacionesServiciosEspeciales.js') ?>"></script>
    <?php endif; ?>

    <!-- Select2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    </body>

    </html>