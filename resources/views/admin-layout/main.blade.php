<!DOCTYPE html>
<html lang="{{ str_replace('_', '_', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Site favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ url('assets_admin/img/afavicon_23042013_104032.ico') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ url('assets_admin/img/favicon_23042013_104032.ico') }}">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ url('assets_admin/css/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="{{ url('assets_admin/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <!--<link rel="stylesheet" href="assets_admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">-->
    <!-- JQVMap -->
    <!--<link rel="stylesheet" href="assets_admin/plugins/jqvmap/jqvmap.min.css">-->
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ url('assets_admin/css/adminlte.min.css') }}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ url('assets_admin/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ url('assets_admin/css/select2-bootstrap4.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ url('assets_admin/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ url('assets_admin/daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ url('assets_admin/css/bootstrap-datepicker-1.8.0.min.css') }}">
    <!-- summernote -->
    <!--<link rel="stylesheet" href="assets_admin/plugins/summernote/summernote-bs4.css'">-->
    <!-- SweetAlert2 -->
    <!--<link rel="stylesheet" href="assets_admin/css/bootstrap-4.min.css'">-->
    <!-- Toastr -->
    <!--<link rel="stylesheet" href="assets_admin/toastr/toastr.min.css'">-->
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ url('assets_admin/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ url('assets_admin/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ url('assets_admin/css/rowReorder.bootstrap4.min.css') }}">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.js"></script>
 
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    
    @stack('css-filepond')
    @stack('script-summer-note')
    @stack('css-datatable-group')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
    @include('sweetalert::alert')

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">welcome, <strong>{{ Auth::user()->name }}</strong></a>
                  </li>
            </ul>


            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                {{-- <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ route('login.locked') }}" class="nav-link">
                        <i class="fa fa-lock" style="font-size:24px;color:#dc3545"></i>
                    </a>
                </li> --}}
                <li class="nav-item d-none d-sm-inline-block">
                    <a class="nav-link" href="{{ route('logout') }}" data-toggle="tooltip" title="Logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fa fa-power-off" style="font-size:24px;color:#dc3545"></i>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- /.this is sidebar -->
        @if (Auth::user()->is_admin == 1)
            @include('admin-layout.sidebar_admin')
        @elseif (Auth::user()->is_admin == 0)
        @include('admin-layout.sidebar')
        @elseif (Auth::user()->is_admin == 2)
        @include('admin-layout.sidebar_jemat')
        @endif

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">@yield('subtitle')</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">@yield('subtitle')</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- this is content -->
                    @yield('content')
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2023<?= (date('Y') > 2023 ? ' - ' . date('Y') : '') ?> | DBSystem | </strong> All rights
            reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 1.0.0
            </div>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- wrapper -->

    <!-- jQuery -->
    <script src="{{ url('assets_admin/js/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ url('assets_admin/js/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ url('assets_admin/js/bootstrap.bundle.min.js') }}"></script>
    <!-- ChartJS -->
    <!--<script src="{{ url('assets_admin/plugins/chart.js/Chart.min.js') }}"></script>-->
    <!-- Sparkline -->
    <!--<script src="{{ url('assets_admin/plugins/sparklines/sparkline.js') }}"></script>-->
    <!-- JQVMap -->
    <!--<script src="{{ url('assets_admin/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ url('assets_admin/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>-->
    <!-- jQuery Knob Chart -->
    <!--<script src="{{ url('assets_admin/plugins/jquery-knob/jquery.knob.min.js') }}"></script>-->
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ url('assets_admin/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <!-- Summernote -->
    <!--<script src="{{ url('assets_admin/plugins/summernote/summernote-bs4.min.js') }}"></script>-->
    <!-- overlayScrollbars -->
    <script src="{{ url('assets_admin/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ url('assets_admin/js/adminlte.js') }}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <!--<script src="{{ url('assets_admin/dist/js/pages/dashboard.js') }}"></script>-->
    <!-- AdminLTE for demo purposes -->
    <!--<script src="{{ url('assets_admin/dist/js/demo.js') }}"></script>-->
    <!-- Select2 -->
    <script src="{{ url('assets_admin/js/select2.full.min.js') }}"></script>
    <!-- date-range-picker -->
    <script src="{{ url('assets_admin/daterangepicker/moment.min.js') }}"></script>
    <script src="{{ url('assets_admin/daterangepicker/daterangepicker.js') }}"></script>
    <!-- ChartJS -->
    <!--<script src="{{ url('assets_admin/plugins/chart.js/Chart.min.js') }}"></script>-->
    <!-- bs-custom-file-input -->
    <script src="{{ url('assets_admin/js/bs-custom-file-input.min.js') }}"></script>
    <!-- SweetAlert2 -->
    <!--<script src="{{ url('assets_admin/js/sweetalert2.min.js') }}"></script>-->
    <!-- Toastr -->
    <!--<script src="{{ url('assets_admin/toastr/toastr.min.js') }}"></script>-->
    <script src="{{ url('assets_admin/js/bootstrap-datepicker-1.8.0.min.js') }}"></script>
    <script src="{{ url('assets_admin/js/2.0.0-autoNumeric.min.js') }}"></script>
    <!-- DataTables -->
    <script src="{{ url('assets_admin/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('assets_admin/js/dataTables.bootstrap4.min.js') }}"></script>
    
    <!-- ############## datatable responsive mobile hidden ################# -->
    <script src="{{ url('assets_admin/js/dataTables.responsive.min.js') }}"></script>
    <!-- <script src="{{ url('assets_admin/js/responsive.bootstrap4.min.js') }}"></script> -->
    <script src="{{ url('assets_admin/js/rowReorder.bootstrap4.min.js') }}"></script>
    <script src="{{ url('assets_admin/js/dataTables.rowReorder.min.js') }}"></script>

    @stack('script-filepond')
    @stack('script-autonumeric')
    

    <!--<script src="{{ url('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ url('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>-->

       
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "autoWidth": false,
            });
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
            $("#example3").DataTable({
                "paging": false,
                "lengthChange": false,
                "searching": true,
                "ordering": false,
                "info": false,
                "autoWidth": false,
                "responsive": false,
            });
            $("#example4").DataTable({
                "responsive": true,
                "autoWidth": false,
            });
            $("#example5").DataTable({
                "responsive": true,
                "autoWidth": false,
            });
        });
    </script>



    <script type="text/javascript">
        jQuery(function($) {
            //$('#txt_tot_outstanding').autoNumeric('init'); 
            $('#nominal_debit').autoNumeric('init', {
                vMin: '0',
                vMax: '999999999999999'
            });
        });
    </script>
    <script type="text/javascript">
        jQuery(function($) {
            //$('#txt_tot_outstanding').autoNumeric('init'); 
            $('#nominal_credit').autoNumeric('init', {
                vMin: '0',
                vMax: '999999999999999'
            });
        });
    </script>
    <script>
        $(function () {
            $('.date').datepicker({
                format: 'yyyy-mm-dd',
                autoclose: true,
                todayHighlight: true,
            })
            $('#reservation').daterangepicker()
        })
    </script>

<script type="text/javascript">
$(document).ready(function () {
  bsCustomFileInput.init();
  
});
</script>

<script>
    $(document).ready(function(){
      $('[data-toggle="tooltip"]').tooltip();   
    });
</script>



@stack('script-reserved')
@stack('script-summerNote')

@stack('script-changepassw')
@stack('script-select2')
@stack('script-popover')

@stack('script-modal-sanggah')
@stack('script-datatable-group')
@stack('script-modal-information')

</body>

</html>