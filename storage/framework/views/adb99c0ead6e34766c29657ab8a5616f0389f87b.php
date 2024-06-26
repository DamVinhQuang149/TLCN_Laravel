<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Quản lý Capple - Website bán đồ ăn trực tuyến</title>
    <script src="<?php echo e(asset('assets/admin/js/main.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/ButtonClickHandler.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/admin/js/validateExpired.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/admin/js/deleteConfirmation.js')); ?>"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="<?php echo e(asset('assets/admin/js/clock.js')); ?>"></script>
    <!-- Google Font: Source Sans Pro -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/admin/plugins/fontawesome-free/css/all.min.css')); ?>">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="<?php echo e(asset('assets/admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')); ?>">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css')); ?>">
    <!-- JQVMap -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/admin/plugins/jqvmap/jqvmap.min.css')); ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/admin/dist/css/adminlte.min.css')); ?>">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')); ?>">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/admin/plugins/daterangepicker/daterangepicker.css')); ?>">
    <!-- summernote -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/admin/plugins/summernote/summernote-bs4.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/admin/dist/css/paginate.css')); ?>">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <?php if(session('success')): ?>
        <script>
            Swal.fire({
                position: "top-center",
                icon: "success",
                title: "<?php echo e(session('success')); ?>",
                showConfirmButton: false,
                timer: 4000
            });
        </script>
    <?php elseif(session('warning')): ?>
        <script>
            Swal.fire({
                position: "top-center",
                icon: "warning",
                title: "<?php echo e(session('warning')); ?>",
                showConfirmButton: false,
                timer: 4000
            });
        </script>
    <?php elseif(session('error')): ?>
        <script>
            Swal.fire({
                position: "top-center",
                icon: "error",
                title: "<?php echo e(session('error')); ?>",
                showConfirmButton: false,
                timer: 4000
            });
        </script>
    <?php endif; ?>
    <?php echo $__env->make('layout.adminheader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->yieldContent('content'); ?>
    <?php echo $__env->make('layout.adminfooter', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>

</html>
<?php /**PATH D:\khoaluanchuyennganh\code\02_04_2024\TLCN_Laravel\resources\views/layout/appadmin.blade.php ENDPATH**/ ?>