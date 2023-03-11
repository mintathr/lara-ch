<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>DB System | Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ url('assets_admin/img/favicon_23042013_104032.ico') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ url('assets_admin/img/favicon_23042013_104032.ico') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ url('assets_admin/css/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css') }}">
    <!-- icheck bootstrap -->
    <!--<link rel="stylesheet" href="./assets_admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">-->
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ url('assets_admin/css/adminlte.min.css') }}">
    @stack('css-login')
    <!-- <link rel="stylesheet" href="./assets_admin/css/build_login.css"> -->
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition login">
    @yield('content')

    <!-- jQuery -->
    <script src="{{ url('assets_admin/js/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ url('assets_admin/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ url('assets_admin/js/adminlte.min.js') }}"></script>

    @stack('script-show-pass')
</body>

</html>