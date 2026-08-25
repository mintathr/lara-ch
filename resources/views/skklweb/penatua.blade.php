@extends('skklweb-layout.main')
@section('title', 'Penatua')

@section('content')

@php
    $penatuas = [
        [
            'name'  => 'Pnt. Agustinus C. Patty', 
            'image' => 'assets_skklweb/img/presbiter/pnt_jimmy.jpg', 
            'wa'    => '62818988906', 
            'delay' => '0.1s'
        ],
        [
            'name' => 'Pnt. Flora V. Pattynama', 
            'image' => 'assets_skklweb/img/presbiter/pnt_vonny.jpg', 
            'wa' => '6282197144896', 
            'delay' => '0.17s'
        ],
        [
            'name' => 'Pnt. Johanis A. Pattinaja', 
            'image' => 'assets_skklweb/img/presbiter/pnt_kun.jpg', 
            'wa' => '6281340397023', 
            'delay' => '0.15s'
        ],
        [
            'name' => 'Pnt. Josef J. Nunumete', 
            'image' => 'assets_skklweb/img/presbiter/pnt_nunumete.jpg', 
            'wa' => '6281292767848', 
            'delay' => '0.9s'
        ],
        [
            'name' => 'Pnt. Rudy Lumentut', 
            'image' => 'assets_skklweb/img/presbiter/pnt_rudy.jpg', 
            'wa' => '62811771958', 
            'delay' => '0.13s'
        ],
        [
            'name' => 'Pnt. Ryan Kiryanto', 
            'image' => 'assets_skklweb/img/presbiter/pnt_ryan.jpg', 
            'wa' => '6281807464645', 
            'delay' => '0.13s'
        ],
        [
            'name' => 'Pnt. Sarwoto', 
            'image' => 'assets_skklweb/img/presbiter/pnt_sarwoto.jpg', 
            'wa' => '6281546233021', 
            'delay' => '0.11s'
        ],
        [
            'name' => 'Pnt. Sumantri Purba', 
            'image' => 'assets_skklweb/img/presbiter/pnt_sumantri.jpg', 
            'wa' => '628129317212', 
            'delay' => '0.5s'
        ],
        [
            'name' => 'Pnt. Sylvia A. Tupamahu', 
            'image' => 'assets_skklweb/img/presbiter/pnt_sylvi.jpg', 
            'wa' => '628161437690', 
            'delay' => '0.7s'
        ],
        [
            'name' => 'Pnt. Wilhelmina S. Liman', 
            'image' => 'assets_skklweb/img/presbiter/pnt_wilma.jpg', 
            'wa' => '628129612640', 
            'delay' => '0.3s'
        ],
        [
            'name' => 'Pnt. Yanise Daeli', 
            'image' => 'assets_skklweb/img/presbiter/pnt_yanise.jpg', 
            'wa' => '6281286918205', 
            'delay' => '0.3s'
        ],
        [
            'name' => 'Pnt. Zeth Sumual', 
            'image' => 'assets_skklweb/img/presbiter/pnt_zeth.jpg', 
            'wa' => '6287862973678', 
            'delay' => '0.19s'
        ],
        
    ];
@endphp

<div class="container-fluid bg-primary py-5 mb-5 page-header diaken-page-header">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10 text-center">
                <h1 class="display-3 text-white animated slideInDown">Penatua Periode 2023 - 2028</h1>
            </div>
        </div>
    </div>
</div>

<div class="container-xxl py-5 diaken-directory">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title bg-white text-center text-primary px-3">Penatua</h6>
            <h1 class="mb-5">Penatua Periode 2023 - 2028</h1>
        </div>

        <div class="row g-4">
            @foreach ($penatuas as $penatua)
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="{{ $penatua['delay'] }}">
                    <div class="team-item bg-light diaken-card">
                        <div class="overflow-hidden diaken-card-media">
                            <img class="img-fluid diaken-card-image" src="{{ url($penatua['image']) }}" alt="{{ $penatua['name'] }}">
                        </div>
                        <div class="diaken-card-social position-relative d-flex justify-content-center">
                            <div class="d-flex justify-content-center pt-2 px-2">
                                <a class="btn btn-sm-square btn-primary mx-1" href="" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href="" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                                @if (!empty($penatua['wa']))
                                    <a class="btn btn-sm-square btn-primary mx-1" href="https://wa.me/{{ $penatua['wa'] }}" target="_blank" aria-label="WhatsApp"><i class="fab fa-whatsapp"></i></a>
                                @else
                                    <a class="btn btn-sm-square btn-primary mx-1" href="https://wa.me/" target="_blank" aria-label="WhatsApp"><i class="fab fa-whatsapp"></i></a>
                                @endif
                            </div>
                        </div>
                        <div class="text-center p-4 diaken-card-body">
                            <h5 class="mb-0 fs-6">{{ $penatua['name'] }}</h5>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection