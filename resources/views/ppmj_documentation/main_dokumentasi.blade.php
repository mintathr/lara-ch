<!DOCTYPE html>
<html lang="en"> 
<head>
    <title>Documentation S C S</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ url('assets-template/img/favicon_23042013_104032.ico') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ url('assets-template/img/favicon_23042013_104032.ico') }}">
    
    <meta name="description" content="SCS Docs">
    <link rel="shortcut icon" href="favicon.ico"> 
    
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('assets-template/css/fontawesome-free/css/all.min.css') }}">
    
    <!-- FontAwesome JS-->

    <script defer src="{{ url('assets_documentation/fontawesome/js/all.min.js') }}"></script>

    <!-- Plugins CSS -->
    {{-- <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.15.2/styles/atom-one-dark.min.css"> --}}
    <link rel="stylesheet" href="{{ url('assets_documentation/plugins/simplelightbox/simple-lightbox.min.css') }}">

    <!-- Theme CSS -->  
    <link id="theme-style" rel="stylesheet" href="{{ url('assets_documentation/css/theme.css') }}">

</head> 

<body class="docs-page">    
    <header class="header fixed-top">	    
        <div class="branding docs-branding">
            <div class="container-fluid position-relative py-2">
                <div class="docs-logo-wrapper">
					<button id="docs-sidebar-toggler" class="docs-sidebar-toggler docs-sidebar-visible me-2 d-xl-none" type="button">
	                    <span></span>
	                    <span></span>
	                    <span></span>
	                </button>
	                <div class="site-logo"><a class="navbar-brand" href="#"><img class="logo-icon me-2" src="{{ url('assets_documentation/images/coderdocs-logo.svg') }}" alt="logo"><span class="logo-text">SCS<span class="text-alt">Docs</span></span></a></div>    
                </div><!--//docs-logo-wrapper-->
	            {{-- <div class="docs-top-utilities d-flex justify-content-end align-items-center"> --}}
	                {{-- <div class="top-search-box d-none d-lg-flex">
		                <form class="search-form">
				            <input type="text" placeholder="Search the docs..." name="search" class="form-control search-input">
				            <button type="submit" class="btn search-btn" value="Search"><i class="fas fa-search"></i></button>
				        </form>
	                </div>
	
					<ul class="social-list list-inline mx-md-3 mx-lg-5 mb-0 d-none d-lg-flex">
						<li class="list-inline-item"><a href="#"><i class="fab fa-github fa-fw"></i></a></li>
			            <li class="list-inline-item"><a href="#"><i class="fab fa-twitter fa-fw"></i></a></li>
		                <li class="list-inline-item"><a href="#"><i class="fab fa-slack fa-fw"></i></a></li>
		                <li class="list-inline-item"><a href="#"><i class="fab fa-product-hunt fa-fw"></i></a></li>
		            </ul> --}}<!--//social-list-->
		            {{-- <a href="https://themes.3rdwavemedia.com/bootstrap-templates/startup/coderdocs-free-bootstrap-5-documentation-template-for-software-projects/" class="btn btn-primary d-none d-lg-flex">Download</a> --}}
	            {{-- </div> --}}<!--//docs-top-utilities-->
            </div><!--//container-->
        </div><!--//branding-->
    </header>

    <div class="docs-wrapper">
	    <div id="docs-sidebar" class="docs-sidebar">
		    {{-- <div class="top-search-box d-lg-none p-3">
                <form class="search-form">
		            <input type="text" placeholder="Search the docs..." name="search" class="form-control search-input">
		            <button type="submit" class="btn search-btn" value="Search"><i class="fas fa-search"></i></button>
		        </form>
            </div> --}}
		    @include('ppmj_documentation.sidebar_dokumentasi')
        </div><!--//docs-sidebar-->
        <div class="docs-content">
            <div class="container">
                {{-- ### THIS IS CONTENT ### --}}
                @yield('content_dokumentasi')
            </div>
        </div>
    </div>

    <!-- Javascript -->    
    <script src="{{ url('assets_documentation/plugins/popper.min.js') }}"></script>
    <script src="{{ url('assets_documentation/plugins/bootstrap/js/bootstrap.min.js') }}"></script>  
    
    
    <!-- Page Specific JS -->
    <script src="{{ url('assets_documentation/assets/plugins/smoothscroll.min.js') }}"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.15.8/highlight.min.js"></script> --}}
    <script src="{{ url('assets_documentation/js/highlight-custom.js') }}"></script> 
    <script src="{{ url('assets_documentation/js/highlight.9.15.8.min.js') }}"></script> 
    <script src="{{ url('assets_documentation/plugins/simplelightbox/simple-lightbox.min.js') }}"></script>      
    <script src="{{ url('assets_documentation/plugins/gumshoe/gumshoe.polyfills.min.js') }}"></script> 
    <script src="{{ url('assets_documentation/js/docs.js') }}"></script>
</body>
</html>