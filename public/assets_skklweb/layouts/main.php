<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>GPIB SANGKAKALA</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <link href="img/favicon.ico" rel="icon">
    <link href="fontawesome_v5/css/all.min.css" rel="stylesheet">
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <style> 
        .googleCalendar {
            position: relative; padding-bottom: 75%; height: 0; overflow: hidden;
        }
    
        .googleCalendar iframe {
            position: absolute; top:0; left: 0; width: 100%; height: 100%;
        }
    </style>
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
        <a href="index.html" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <h2 class="m-0 text-primary"><i class="fa fa-church me-3"></i>SKKL</h2>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav ms-auto p-4 p-lg-0">
                <li class="nav-item">
                    <a class="nav-item nav-link click-scroll" href="index">Home</a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-item nav-link click-scroll" href="index#section_2">Jadwal Ibadah</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link click-scroll" href="index#section_3">Live Stream</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link click-scroll" href="index#section_4">Kegiatan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link click-scroll" href="index#section_5">PHMJ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link click-scroll" href="#section_6">Pelkat</a>
                </li> -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarLightDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">Presbiter</a>
                    <ul class="dropdown-menu fade-down m-0 dropdown-menu-light" aria-labelledby="navbarLightDropdownMenuLink">
                        <li><a class="dropdown-item" href="diaken">Diaken</a></li>
                        <li><a class="dropdown-item" href="majelis">Majelis</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarLightDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">Pelkat</a>
                    <ul class="dropdown-menu fade-down m-0 dropdown-menu-light" aria-labelledby="navbarLightDropdownMenuLink">
                        <li><a class="dropdown-item" href="#">PA</a></li>
                        <li><a class="dropdown-item" href="pelkat-pt">PT</a></li>
                        <li><a class="dropdown-item" href="#">GP</a></li>
                        <li><a class="dropdown-item" href="#">PKP</a></li>
                        <li><a class="dropdown-item" href="#">PKB</a></li>
                        <li><a class="dropdown-item" href="#">PKLU</a></li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarLightDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">Komisi</a>
                    <ul class="dropdown-menu fade-down m-0 dropdown-menu-light" aria-labelledby="navbarLightDropdownMenuLink">
                        <li><a class="dropdown-item" href="#">Theologi</a></li>
                        <li><a class="dropdown-item" href="#">Germasa</a></li>
                        <li><a class="dropdown-item" href="#">PPSDI</a></li>
                        <li><a class="dropdown-item" href="#">PEG</a></li>
                        <li><a class="dropdown-item" href="#">IL</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-item nav-link click-scroll" href="https://sabda.gpib.or.id" target="_blank">Sabda Digital</a>
                </li>
            </ul>
            <a href="https://jemaat.gpibskkl.com" class="btn btn-primary py-4 px-lg-5 d-none d-lg-block">Member Area<i class="fa fa-arrow-right ms-3"></i></a>
        </div>
    </nav>
    <!-- Navbar End -->

    