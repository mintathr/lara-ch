<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>GPIB SANGKAKALA</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="{{ url('assets_skklweb/img/favicon/favicon.ico') }}" rel="icon">

    <link href="{{ url('assets_skklweb/fontawesome_v5/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ url('assets_skklweb/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ url('assets_skklweb/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ url('assets_skklweb/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ url('assets_skklweb/css/style_ori.css') }}" rel="stylesheet">
    <!-- Google Web Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        iframe,
        object,
        embed {
            max-width: 100%;
            max-height: 100%;
        }

        .section-padding {
            padding-top: 100px;
            padding-bottom: 100px;
        }

        ::selection {
            background-color: var(--secondary-color);
            color: var(--white-color);
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
        <a href="/" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <h2 class="m-0 text-primary"><i class="fa fa-church me-3"></i>GPIB SANGKAKALA</h2>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
        <!-- <div class="navbar-nav ms-auto p-4 p-lg-0">
                
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                    <div class="dropdown-menu fade-down m-0">
                        <a href="team.html" class="dropdown-item">Our Team</a>
                        <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                        <a href="404.html" class="dropdown-item">404 Page</a>
                    </div>
                </div>
        </div> -->
            <ul class="navbar-nav ms-auto p-4 p-lg-0">
                <li class="nav-item">
                    <a class="nav-item nav-link click-scroll {{ request()->is('website') ? 'active' : '' }}" href="{{ route('webskkl') }}">Home</a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-item nav-link click-scroll" href="#section_2">Jadwal Ibadah</a>
                </li>
                <li class="nav-item">
                    <a class="nav-item nav-link click-scroll" href="#section_3">Live Stream</a>
                </li>
                <li class="nav-item">
                    <a class="nav-item nav-link click-scroll" href="#section_4">Kegiatan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-item nav-link click-scroll" href="#section_5">PHMJ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-item nav-link click-scroll" href="#section_6">Pelkata</a>
                </li> -->
                
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ request()->is('diaken') ? 'active' : '' }} {{ request()->is('penatua') ? 'active' : '' }}" href="#" id="navbarLightDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">Presbiter</a>
                    <ul class="dropdown-menu fade-down m-0 dropdown-menu-light" aria-labelledby="navbarLightDropdownMenuLink">
                        <li><a class="dropdown-item" href="{{ route('webskkl.diaken') }}">Diaken</a></li>
                        <li><a class="dropdown-item" href="{{ route('webskkl.penatua') }}">Penatua</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle
                    {{ request()->is('pelkat-pt') ? 'active' : '' }}
                    " href="#" id="navbarLightDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">Pelkat</a>
                    <ul class="dropdown-menu fade-down m-0 dropdown-menu-light" aria-labelledby="navbarLightDropdownMenuLink">
                        <li><a class="dropdown-item" href="#">PA</a></li>
                        <li><a class="dropdown-item" href="{{ route('webskkl.pelkat.pt') }}">PT</a></li>
                        <li><a class="dropdown-item" href="#">GP</a></li>
                        <li><a class="dropdown-item" href="#">PKP</a></li>
                        <li><a class="dropdown-item" href="#">PKB</a></li>
                        <li><a class="dropdown-item" href="#">Lansia</a></li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle
                    {{ request()->is('komisi-il') ? 'active' : '' }}
                    " href="#" id="navbarLightDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">Komisi</a>
                    <ul class="dropdown-menu fade-down m-0 dropdown-menu-light" aria-labelledby="navbarLightDropdownMenuLink">
                        <li><a class="dropdown-item" href="#">Theologi</a></li>
                        <li><a class="dropdown-item" href="#">Germasa</a></li>
                        <li><a class="dropdown-item" href="#">PPSDI</a></li>
                        <li><a class="dropdown-item" href="#">PEG</a></li>
                        <li><a class="dropdown-item" href="{{ route('webskkl.komisi.il') }}">IL</a></li>
                    </ul>
                    <li class="nav-item">
                        <a class="nav-item nav-link click-scroll" href="#">Blog</a>
                    </li>
                </li>
            </ul>
                <a href="/login" class="btn btn-primary py-4 px-lg-5 d-none d-lg-block">Member Area<i class="fa fa-arrow-right ms-3"></i></a>
            
        </div>
    </nav>
    <!-- Navbar End -->

    <!-- content here -->
    @yield('content')
    <!-- content end here -->


    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-4 col-md-6">
                    <h4 class="text-white mb-3">Quick Link</h4>
                    <a class="btn btn-link" href="">About Us</a>
                    <a class="btn btn-link" href="">Contact Us</a>
                    <!-- <a class="btn btn-link" href="">Privacy Policy</a>
                    <a class="btn btn-link" href="">Terms & Condition</a> -->
                    <a class="btn btn-link" href="">FAQs & Help</a>
                </div>
                <div class="col-lg-8 col-md-6">
                    <h4 class="text-white mb-3">Contact</h4>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Jl. Teratai Ujung No. 155 A, Komplek Kodam Kebon Jeruk Jakarta Barat 11530</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>021 5491545</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>sekretariat@gpibskkl.com</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>gpib.skkl@gmail.com</p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-social" href="https://www.youtube.com/@gpibsangkakala" target="_blank"><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-outline-light btn-social" href="https://www.instagram.com/harapan.selaluada"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
              
            </div>
        </div>
        <div class="container">
            <div class="copyright">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; 2023<?= (date('Y') > 2021 ? ' - ' . date('Y') : '') ?> <a class="" href="https://gpibskkl.com">GPIB Sangkakala Jakarta Barat</a>, All Right Reserved.
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        <div class="footer-menu">
                            <a href="">Home</a>
                            <a href="">Cookies</a>
                            <a href="">Help</a>
                            <a href="">FQAs</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->

    

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <!-- <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ url('assets_skklweb/js/jquery-3.4.1.min.js') }}"></script>
    <!-- <script src="js/bootstrap.bundle.min.js"></script> -->
    <script src="{{ url('assets_skklweb/lib/wow/wow.min.js') }}"></script>
    <script src="{{ url('assets_skklweb/lib/easing/easing.min.js') }}"></script>
    <script src="{{ url('assets_skklweb/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ url('assets_skklweb/lib/owlcarousel/owl.carousel.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ url('assets_skklweb/js/main.js') }}"></script>
    <!-- <script src="js/click-scroll.js"></script> -->
    <!-- <script src="js/custom.js"></script> -->

</body>

</html>