<footer class="main-footer">

    <div class="float-right d-none d-sm-block">

        <b>Capple.vn</b> - Website bán trái cây, bánh ngọt, rau củ trực tuyến tốt cho sức khỏe

    </div>

    <strong>Copyright &copy; 2024 by Hồ Duy Hoàng & Đàm Vinh Quang

</footer>

<!-- Control Sidebar -->

<aside class="control-sidebar control-sidebar-dark">

    <!-- Control sidebar content goes here -->

</aside>

<!-- /.control-sidebar -->

</div>

<!-- ./wrapper -->



<!-- Trong Laravel Blade View hoặc HTML -->



<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<!-- jQuery -->



<script src="<?php echo e(asset('assets/admin/plugins/jquery/jquery.min.js')); ?>"></script>

<!-- jQuery UI 1.11.4 -->

<script src="<?php echo e(asset('assets/admin/plugins/jquery-ui/jquery-ui.min.js')); ?>"></script>

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->

<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>

<!-- Bootstrap 4 -->

<script src="<?php echo e(asset('assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>

<!-- ChartJS -->

<script src="<?php echo e(asset('assets/admin/plugins/chart.js/Chart.min.js')); ?> "></script>

<!-- Sparkline -->

<script src="<?php echo e(asset('assets/admin/plugins/sparklines/sparkline.js')); ?>"></script>

<!-- JQVMap -->

<script src="<?php echo e(asset('assets/admin/plugins/jqvmap/jquery.vmap.min.js')); ?>"></script>

<script src="<?php echo e(asset('assets/admin/plugins/jqvmap/maps/jquery.vmap.usa.js')); ?>"></script>

<!-- jQuery Knob Chart -->

<script src="<?php echo e(asset('assets/admin/plugins/jquery-knob/jquery.knob.min.js')); ?>"></script>

<!-- daterangepicker -->

<script src="<?php echo e(asset('assets/admin/plugins/moment/moment.min.js')); ?>"></script>

<script src="<?php echo e(asset('assets/admin/plugins/daterangepicker/daterangepicker.js')); ?>"></script>

<!-- Tempusdominus Bootstrap 4 -->

<script src="<?php echo e(asset('assets/admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')); ?>">
</script>

<!-- Summernote -->

<script src="<?php echo e(asset('assets/admin/plugins/summernote/summernote-bs4.min.js')); ?>"></script>

<!-- overlayScrollbars -->

<script src="<?php echo e(asset('assets/admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')); ?>"></script>

<!-- AdminLTE App -->

<script src="<?php echo e(asset('assets/admin/dist/js/adminlte.js')); ?>"></script>

<!-- AdminLTE for demo purposes -->

<script src="<?php echo e(asset('assets/admin/dist/js/demo.js')); ?>"></script>

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->

<script src="<?php echo e(asset('assets/admin/dist/js/pages/dashboard.js')); ?>"></script>

<script src="https://code.iconify.design/2/2.1.0/iconify.min.js"></script>

<script>
    $(function() {

        $('#summernote').summernote()

        CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {

            mode: "htmlmixed",

            theme: "monokai"

        });

    })
</script>
<?php /**PATH D:\khoaluanchuyennganh\code\02_04_2024\TLCN_Laravel\resources\views/layout/adminfooter.blade.php ENDPATH**/ ?>