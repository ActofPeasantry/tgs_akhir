<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @yield('title')

        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome Icons -->
        <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
        <!-- Datatables -->
        <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css?v=3.2.0') }}">
        <!-- FullCalendar 4 -->
        <link rel="stylesheet" href="{{asset('assets/plugins/fullcalendar/main.css')}}">
        <!-- Toastr -->
        <link rel="stylesheet" href="{{ asset('assets/plugins/toastr/toastr.min.css') }}">
        <!-- SweetAlert2 -->
        <link rel="stylesheet" href="{{ asset('assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
        <!-- DateRangePicker -->
        <link rel="stylesheet" href="{{ asset('assets/plugins/daterangepicker/daterangepicker.css') }}">
        <!-- TempusDominus -->
        <link rel="stylesheet" href="{{ asset('assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
        <!-- JQueryUI -->
        {{-- <link href='https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/ui-lightness/jquery-ui.css' rel='stylesheet'> --}}

    </head>
    <body class="hold-transition sidebar-mini">
        <div class="wrapper">

            <!-- Preloader -->
            <div class="preloader flex-column justify-content-center align-items-center">
                <img class="animation__wobble" src="{{ asset("assets/dist/img/MosqueLogo.jpg") }}" alt="" height="60" width="60">
            </div>

            <!-- Navbar -->
            <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                <!-- Left navbar links -->
                @include('layouts/navbar_left')
                <!-- Right navbar links -->
                @include('layouts/navbar_right')
            </nav>
            <!-- /.navbar -->

            <!-- Main Sidebar Container -->
            <aside class="main-sidebar sidebar-dark-primary elevation-4">
                <!-- Brand Logo -->
                <a href="index3.html" class="brand-link">
                    <img src="{{ asset('assets/dist/img/MosqueLogo.jpg') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                    <span class="brand-text font-weight-light">Masjid Nurul Ikhlas</span>
                </a>

                <!-- Sidebar -->
                <div class="sidebar">
                    <!-- Sidebar user panel (optional) -->
                    @include('layouts/user_panel')

                    <!-- SidebarSearch Form -->
                    {{-- @include('layouts/sidebar_search') --}}

                    <!-- Sidebar Menu -->
                    <nav class="mt-2">
                        @include('layouts/sidebar_menu')
                    </nav>
                    <!-- /.sidebar-menu -->
                </div>
                <!-- /.sidebar -->
            </aside>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <div class="content-header">
                    @yield('header')
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                @yield('page_name')
                            </div><!-- /.col -->
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    {{-- <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active">Blank Page</li> --}}
                                    @yield('breadcrumb')
                                </ol>
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    </div><!-- /.container-fluid -->
                </div>
                <!-- /.content-header -->

                <!-- Main content -->
                <div class="content">
                    @yield('content')
                </div>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->

            <!-- Control Sidebar -->
            {{-- <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
                <div class="p-3">
                    <h5>Title</h5>
                    <p>Sidebar content</p>
                </div>
            </aside> --}}
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
        {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" ></script> --}}
        <script src=" {{ asset("assets/plugins/jquery/jquery.min.js") }}"></script>

        <!-- JQueryUI -->
        {{-- <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" ></script> --}}
        <script src=" {{ asset("assets/plugins/jquery-ui/jquery-ui.min.js") }}"></script>

        <!-- Bootstrap 4 -->
        <script src=" {{ asset("assets/plugins/bootstrap/js/bootstrap.bundle.min.js") }}"></script>
        <!-- AdminLTE App -->
        <script src=" {{ asset("assets/dist/js/adminlte.min.js") }}"></script>
        <!-- MomentWithLocaleJs -->
        <script src="{{ asset('assets/plugins/moment/moment-with-locales.min.js') }}"></script>
        <!-- DateRangePicker -->
        <script src="{{ asset('assets/plugins/daterangepicker/daterangepicker.js') }}"></script>
        <!-- TempusDominus -->
        <script src="{{ asset('assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
        <!-- bs-custom-file-input -->
        <script src="{{ asset("assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js") }}"></script>
        <!-- Datatables -->
        <script src="{{ asset("assets/plugins/datatables/jquery.dataTables.min.js") }}"></script>
        <script src="{{ asset("assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js") }}"></script>
        <script src="{{ asset("assets/plugins/datatables-responsive/js/dataTables.responsive.min.js") }}"></script>
        <script src="{{ asset("assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js") }}"></script>
        <script src="{{ asset("assets/plugins/datatables-buttons/js/dataTables.buttons.min.js") }}"></script>
        <script src="{{ asset("assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js") }}"></script>
        <script src="{{ asset("assets/plugins/jszip/jszip.min.js") }}"></script>
        <script src="{{ asset("assets/plugins/pdfmake/pdfmake.min.js") }}"></script>
        <script src="{{ asset("assets/plugins/pdfmake/vfs_fonts.js") }}"></script>
        <script src="{{ asset("assets/plugins/datatables-buttons/js/buttons.html5.min.js") }}"></script>
        <script src="{{ asset("assets/plugins/datatables-buttons/js/buttons.print.min.js") }}"></script>
        <script src="{{ asset("assets/plugins/datatables-buttons/js/buttons.colVis.min.js") }}"></script>

        <!-- FullCalendar 4 -->
        <script src="{{ asset("assets/plugins/moment/moment.min.js") }}"></script>
        <script src="{{ asset("assets/plugins/fullcalendar/main.js") }}"></script>
        <!-- ChartJS -->
        <script src= "{{ asset("assets/plugins/chart.js/Chart.min.js") }}"></script>
        <script src= "{{ asset("assets/plugins/chart.js/Chart.min.js") }}"></script>
        <!-- InputMask -->
        <script src= "{{ asset("assets/plugins/moment/moment.min.js") }}"></script>
        <script src= "{{ asset("assets/plugins/inputmask/jquery.inputmask.min.js") }}"></script>
        <!-- date-range-picker -->
        <script src= "{{ asset("assets/plugins/moment/moment.min.js") }}"></script>
        <script src= "{{ asset("assets/plugins/daterangepicker/daterangepicker.js") }}"></script>
        <!-- Toastr -->
        <script src="{{ asset('assets/plugins/toastr/toastr.min.js') }}"></script>
        <!-- SweetAlert2 -->
        <script src="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.js') }}"></script>


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


        {{-- Other scripts --}}
        @stack('child-scripts')
        @yield('javascripts')
    </body>
</html>
