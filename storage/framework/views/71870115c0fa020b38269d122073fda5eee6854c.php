<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php echo $__env->yieldContent('title'); ?>

        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome Icons -->
        <link rel="stylesheet" href="<?php echo e(asset('assets/plugins/fontawesome-free/css/all.min.css')); ?>">
        <!-- Datatables -->
        <link rel="stylesheet" href="<?php echo e(asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')); ?>">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo e(asset('assets/dist/css/adminlte.min.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('assets/dist/css/adminlte.min.css?v=3.2.0')); ?>">
        <!-- FullCalendar 4 -->
        <link rel="stylesheet" href="<?php echo e(asset('assets/plugins/fullcalendar/main.css')); ?>">
        <!-- Toastr -->
        <link rel="stylesheet" href="<?php echo e(asset('assets/plugins/toastr/toastr.min.css')); ?>">
        <!-- SweetAlert2 -->
        <link rel="stylesheet" href="<?php echo e(asset('assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')); ?>">
        <!-- DateRangePicker -->
        <link rel="stylesheet" href="<?php echo e(asset('assets/plugins/daterangepicker/daterangepicker.css')); ?>">
        <!-- TempusDominus -->
        <link rel="stylesheet" href="<?php echo e(asset('assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')); ?>">
        <!-- JQueryUI -->
        

    </head>
    <body class="hold-transition sidebar-mini">
        <div class="wrapper">

            <!-- Preloader -->
            <div class="preloader flex-column justify-content-center align-items-center">
                <img class="animation__wobble" src="<?php echo e(asset("assets/dist/img/MosqueLogo.jpg")); ?>" alt="" height="60" width="60">
            </div>

            <!-- Navbar -->
            <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                <!-- Left navbar links -->
                <?php echo $__env->make('layouts/navbar_left', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <!-- Right navbar links -->
                <?php echo $__env->make('layouts/navbar_right', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </nav>
            <!-- /.navbar -->

            <!-- Main Sidebar Container -->
            <aside class="main-sidebar sidebar-dark-primary elevation-4">
                <!-- Brand Logo -->
                <a href="index3.html" class="brand-link">
                    <img src="<?php echo e(asset('assets/dist/img/MosqueLogo.jpg')); ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                    <span class="brand-text font-weight-light">Masjid Nurul Ikhlas</span>
                </a>

                <!-- Sidebar -->
                <div class="sidebar">
                    <!-- Sidebar user panel (optional) -->
                    <?php echo $__env->make('layouts/user_panel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <!-- SidebarSearch Form -->
                    

                    <!-- Sidebar Menu -->
                    <nav class="mt-2">
                        <?php echo $__env->make('layouts/sidebar_menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </nav>
                    <!-- /.sidebar-menu -->
                </div>
                <!-- /.sidebar -->
            </aside>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <?php echo $__env->yieldContent('header'); ?>
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <?php echo $__env->yieldContent('page_name'); ?>
                            </div><!-- /.col -->
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    
                                    <?php echo $__env->yieldContent('breadcrumb'); ?>
                                </ol>
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    </div><!-- /.container-fluid -->
                </div>
                <!-- /.content-header -->

                <!-- Main content -->
                <div class="content">
                    <?php echo $__env->yieldContent('content'); ?>
                </div>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->

            <!-- Control Sidebar -->
            
            <!-- /.control-sidebar -->

            <!-- Main Footer -->
            <footer class="main-footer">
                <!-- To the right -->
                <div class="float-right d-none d-sm-inline">
                    Sistem Manajemen Keuangan dan Kegiatan Masjid
                </div>
                    <!-- Default to the left -->
                    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
            </footer>
        </div>
        <!-- ./wrapper -->

        <!-- REQUIRED SCRIPTS -->


        <!-- JQuery -->
        
        <script src=" <?php echo e(asset("assets/plugins/jquery/jquery.min.js")); ?>"></script>

        <!-- JQueryUI -->
        
        <script src=" <?php echo e(asset("assets/plugins/jquery-ui/jquery-ui.min.js")); ?>"></script>

        <!-- Bootstrap 4 -->
        <script src=" <?php echo e(asset("assets/plugins/bootstrap/js/bootstrap.bundle.min.js")); ?>"></script>
        <!-- AdminLTE App -->
        <script src=" <?php echo e(asset("assets/dist/js/adminlte.min.js")); ?>"></script>
        <!-- MomentWithLocaleJs -->
        <script src="<?php echo e(asset('assets/plugins/moment/moment-with-locales.min.js')); ?>"></script>
        <!-- DateRangePicker -->
        <script src="<?php echo e(asset('assets/plugins/daterangepicker/daterangepicker.js')); ?>"></script>
        <!-- TempusDominus -->
        <script src="<?php echo e(asset('assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')); ?>"></script>
        <!-- bs-custom-file-input -->
        <script src="<?php echo e(asset("assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js")); ?>"></script>
        <!-- Datatables -->
        <script src="<?php echo e(asset("assets/plugins/datatables/jquery.dataTables.min.js")); ?>"></script>
        <script src="<?php echo e(asset("assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js")); ?>"></script>
        <script src="<?php echo e(asset("assets/plugins/datatables-responsive/js/dataTables.responsive.min.js")); ?>"></script>
        <script src="<?php echo e(asset("assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js")); ?>"></script>
        <script src="<?php echo e(asset("assets/plugins/datatables-buttons/js/dataTables.buttons.min.js")); ?>"></script>
        <script src="<?php echo e(asset("assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js")); ?>"></script>
        <script src="<?php echo e(asset("assets/plugins/jszip/jszip.min.js")); ?>"></script>
        <script src="<?php echo e(asset("assets/plugins/pdfmake/pdfmake.min.js")); ?>"></script>
        <script src="<?php echo e(asset("assets/plugins/pdfmake/vfs_fonts.js")); ?>"></script>
        <script src="<?php echo e(asset("assets/plugins/datatables-buttons/js/buttons.html5.min.js")); ?>"></script>
        <script src="<?php echo e(asset("assets/plugins/datatables-buttons/js/buttons.print.min.js")); ?>"></script>
        <script src="<?php echo e(asset("assets/plugins/datatables-buttons/js/buttons.colVis.min.js")); ?>"></script>

        <!-- FullCalendar 4 -->
        <script src="<?php echo e(asset("assets/plugins/moment/moment.min.js")); ?>"></script>
        <script src="<?php echo e(asset("assets/plugins/fullcalendar/main.js")); ?>"></script>
        <!-- ChartJS -->
        <script src= "<?php echo e(asset("assets/plugins/chart.js/Chart.min.js")); ?>"></script>
        <script src= "<?php echo e(asset("assets/plugins/chart.js/Chart.min.js")); ?>"></script>
        <!-- InputMask -->
        <script src= "<?php echo e(asset("assets/plugins/moment/moment.min.js")); ?>"></script>
        <script src= "<?php echo e(asset("assets/plugins/inputmask/jquery.inputmask.min.js")); ?>"></script>
        <!-- date-range-picker -->
        <script src= "<?php echo e(asset("assets/plugins/moment/moment.min.js")); ?>"></script>
        <script src= "<?php echo e(asset("assets/plugins/daterangepicker/daterangepicker.js")); ?>"></script>
        <!-- Toastr -->
        <script src="<?php echo e(asset('assets/plugins/toastr/toastr.min.js')); ?>"></script>
        <!-- SweetAlert2 -->
        <script src="<?php echo e(asset('assets/plugins/sweetalert2/sweetalert2.min.js')); ?>"></script>


        <!DOCTYPE html>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>
            $.widget.bridge('uibutton', $.ui.button)
        </script>

        <script type="text/javascript">
            $(function () {
                var params = window.location.pathname;
                params = params.toLowerCase();

                if (params != "/") {
                    $(".nav-sidebar li a").each(function (i) {
                        var obj = this;
                        var url = $(this).attr("href");
                        if (url == "" || url == "#") {
                            return true;
                        }
                        url = url.toLowerCase();
                        if (url.indexOf(params) > -1) {
                            $(this).parent().addClass("active open menu-open");
                            $(this).parent().parent().addClass("active open menu-open");
                            $(this).parent().parent().parent().addClass("active open menu-open");
                            $(this).parent().parent().parent().parent().addClass("active open menu-open");
                            $(this).parent().parent().parent().parent().parent().addClass("active open menu-open");
                            return false;
                        }
                    });
                }
            });
        </script>


        
        <?php echo $__env->yieldPushContent('child-scripts'); ?>
        <?php echo $__env->yieldContent('javascripts'); ?>
    </body>
</html>
<?php /**PATH D:\informationSystemStuff\laragon\www\tugas_akhir\resources\views/layouts/main.blade.php ENDPATH**/ ?>