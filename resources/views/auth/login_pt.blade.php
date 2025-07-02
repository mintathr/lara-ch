<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login V6</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" type="image/png" href="images/icons/favicon.ico" />

    <link rel="stylesheet" type="text/css" href="{{ url('assets_login_pt/bootstrap.min.css') }}">

    <link rel="stylesheet" type="text/css"
        href="https://colorlib.com/etc/lf/Login_v6/fonts/font-awesome-4.7.0/css/font-awesome.min.css">

    {{--
    <link rel="stylesheet" type="text/css"
        href="https://colorlib.com/etc/lf/Login_v6/fonts/iconic/css/material-design-iconic-font.min.css"> --}}

    <link rel="stylesheet" type="text/css" href="{{ url('assets_login_pt/animate.css') }}">

    {{--
    <link rel="stylesheet" type="text/css"
        href="https://colorlib.com/etc/lf/Login_v6/vendor/css-hamburgers/hamburgers.min.css">

    <link rel="stylesheet" type="text/css"
        href="https://colorlib.com/etc/lf/Login_v6/vendor/animsition/css/animsition.min.css"> --}}



    <link rel="stylesheet" type="text/css" href="{{ url('assets_login_pt/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('assets_login_pt/main.css') }}">


</head>

<body>
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100 p-t-15 p-b-20">
                <form class="login100-form validate-form" action="{{ route('login_pt') }}" method="post">
                    @csrf
                    <span class="login100-form-title p-b-70">
                        login no hp
                    </span>
                    <span class="login100-form-avatar">
                        <img src="{{ url('assets_skklweb/img/pelkat_pt.png') }}" alt="PT">
                    </span>
                    <div class="wrap-input100 validate-input m-t-35 m-b-35" data-validate="Enter phone_number">
                        <input class="input100" type="number" name="phone_number">
                        <span class="focus-input100" data-placeholder="nomor handphone"></span>
                    </div>
                    {{-- <div class="wrap-input100 validate-input m-b-50" data-validate="Enter password">
                        <input class="input100" type="password" name="pass">
                        <span class="focus-input100" data-placeholder="Password"></span>
                    </div> --}}
                    <div class="container-login100-form-btn p-t-45 p-b-20">
                        <button class="login100-form-btn">
                            Login
                        </button>
                    </div>
                    {{-- <ul class="login-more p-t-190">
                        <li class="m-b-8">
                            <span class="txt1">
                                Forgot
                            </span>
                            <a href="#" class="txt2">
                                Username / Password?
                            </a>
                        </li>
                        <li>
                            <span class="txt1">
                                Don’t have an account?
                            </span>
                            <a href="#" class="txt2">
                                Sign up
                            </a>
                        </li>
                    </ul> --}}
                </form>
            </div>
        </div>
    </div>
    <div id="dropDownSelect1"></div>

    <script src="{{ url('assets_login_pt/jquery-3.2.1.min.js') }}"></script>

    {{-- <script src="https://colorlib.com/etc/lf/Login_v6/vendor/animsition/js/animsition.min.js"></script>

    <script src="https://colorlib.com/etc/lf/Login_v6/vendor/bootstrap/js/popper.js"></script> --}}
    <script src="{{ url('assets_login_pt/bootstrap.min.js') }}"></script>

    {{-- <script src="https://colorlib.com/etc/lf/Login_v6/vendor/select2/select2.min.js"></script>

    <script src="https://colorlib.com/etc/lf/Login_v6/vendor/daterangepicker/moment.min.js"></script>
    <script src="https://colorlib.com/etc/lf/Login_v6/vendor/daterangepicker/daterangepicker.js"></script>

    <script src="https://colorlib.com/etc/lf/Login_v6/vendor/countdowntime/countdowntime.js"></script> --}}

    <script src="{{ url('assets_login_pt/main.js') }}"></script>

    {{-- <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script> --}}
    {{-- <script>
        window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-23581568-13');
    </script> --}}
    {{-- <script defer
        src="https://static.cloudflareinsights.com/beacon.min.js/v8b253dfea2ab4077af8c6f58422dfbfd1689876627854"
        integrity="sha512-bjgnUKX4azu3dLTVtie9u6TKqgx29RBwfj3QXYt5EKfWM/9hPSAI/4qcV5NACjwAo8UtTeWefx6Zq5PHcMm7Tg=="
        data-cf-beacon='{"rayId":"80237de1de2aff9c","token":"cd0b4b3a733644fc843ef0b185f98241","version":"2023.8.0","si":100}'
        crossorigin="anonymous"></script> --}}
</body>

</html>