@extends('skklweb-layout.main')
@section('title', 'Pelkat PA')

@section('content')

@php
    $pelkats = [
        [
            'name'  => 'Dkn. Anja Sembiring', 
            'image' => 'assets_skklweb/img/presbiter/dkn_anja.jpg', 
            'wa'    => '6281514342393', 
            'delay' => '0.1s'
        ],
        [
            'name' => 'Dkn. Christian Taroreh', 
            'image' => 'assets_skklweb/img/presbiter/dkn_christian.jpg', 
            'wa' => '6281289643716', 
            'delay' => '0.3s'
        ],
        [
            'name' => 'Dkn. Debby Amahorseja', 
            'image' => 'assets_skklweb/img/presbiter/dkn_debby_a.jpg', 
            'wa' => '628147294829', 
            'delay' => '0.5s'
        ],
        [
            'name' => 'Dkn. Debby Fangidae', 
            'image' => 'assets_skklweb/img/avatar_girl.jpg', 
            'wa' => '6285310799270', 
            'delay' => '0.7s'
        ],
        [
            'name' => 'Dkn. Delima Tengker', 
            'image' => 'assets_skklweb/img/avatar_girl.jpg', 
            'wa' => '6285319633307', 
            'delay' => '0.9s'
        ],
        [
            'name' => 'Dkn. Eva Marbun', 
            'image' => 'assets_skklweb/img/presbiter/dkn_eva.jpg', 
            'wa' => '62819426364', 
            'delay' => '0.11s'
        ],
        [
            'name' => 'Dkn. Frans Hutagalung', 
            'image' => 'assets_skklweb/img/presbiter/dkn_frans.jpg', 
            'wa' => '6285212509867', 
            'delay' => '0.13s'
        ],
        [
            'name' => 'Dkn. Gerrard Pakasi', 
            'image' => 'assets_skklweb/img/avatar.jpg', 
            'wa' => '6282122704966', 
            'delay' => '0.15s'
        ],
        [
            'name' => 'Dkn. Irma Situmorang', 
            'image' => 'assets_skklweb/img/avatar_girl.jpg', 
            'wa' => '6281398710717', 
            'delay' => '0.17s'
        ],
        [
            'name' => 'Dkn. Kevin Lepar', 
            'image' => 'assets_skklweb/img/presbiter/dkn_kevin.jpg', 
            'wa' => '6281291463611', 
            'delay' => '0.19s'
        ],
        [
            'name' => 'Dkn. Novny M. Pormes', 
            'image' => 'assets_skklweb/img/presbiter/dkn_novny.jpg', 
            'wa' => '6281398054475', 
            'delay' => '0.21s'
        ],
        [
            'name' => 'Dkn. Ruth E. Dethan', 
            'image' => 'assets_skklweb/img/presbiter/dkn_ruth.jpg', 
            'wa' => '6283899357516', 
            'delay' => '0.23s'
        ],
        [
            'name' => 'Dkn. Sri Ninta D. Sembiring', 
            'image' => 'assets_skklweb/img/presbiter/dkn_cici.jpg', 
            'wa' => '', 
            'delay' => '0.25s'
        ],
        [
            'name' => 'Dkn. Thenisia W. tarigan', 
            'image' => 'assets_skklweb/img/presbiter/dkn_nisya.jpg', 
            'wa' => '6281379049845', 
            'delay' => '0.27s'
        ],
        [
            'name' => 'Dkn. Vega R.J.P. Moto', 
            'image' => 'assets_skklweb/img/presbiter/dkn_vega.jpg', 
            'wa' => '6282231675774', 
            'delay' => '0.29s'
        ],
    ];
@endphp

<div class="container-fluid bg-primary py-5 mb-5 page-header diaken-page-header">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10 text-center">
                <h1 class="display-3 text-white animated slideInDown">Diaken Periode 2023 - 2028</h1>
            </div>
        </div>
    </div>
</div>

<div class="container-xxl py-5 diaken-directory">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title bg-white text-center text-primary px-3">Diaken</h6>
            <h1 class="mb-5">Diaken Periode 2023 - 2028</h1>
        </div>

        <div class="row g-4">
            @foreach ($diakens as $diaken)
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="{{ $diaken['delay'] }}">
                    <div class="team-item bg-light diaken-card">
                        <div class="overflow-hidden diaken-card-media">
                            <img class="img-fluid diaken-card-image" src="{{ url($diaken['image']) }}" alt="{{ $diaken['name'] }}">
                        </div>
                        <div class="diaken-card-social position-relative d-flex justify-content-center">
                            <div class="d-flex justify-content-center pt-2 px-2">
                                <a class="btn btn-sm-square btn-primary mx-1" href="" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href="" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                                @if (!empty($diaken['wa']))
                                    <a class="btn btn-sm-square btn-primary mx-1" href="https://wa.me/{{ $diaken['wa'] }}" target="_blank" aria-label="WhatsApp"><i class="fab fa-whatsapp"></i></a>
                                @else
                                    <a class="btn btn-sm-square btn-primary mx-1" href="https://wa.me/" target="_blank" aria-label="WhatsApp"><i class="fab fa-whatsapp"></i></a>
                                @endif
                            </div>
                        </div>
                        <div class="text-center p-4 diaken-card-body">
                            <h5 class="mb-0 fs-6">{{ $diaken['name'] }}</h5>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection