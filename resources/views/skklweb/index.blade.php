@extends('skklweb-layout.main')
@section('title', 'GPIB SANGKAKALA')

@section('content')

<style>
    /* Menggunakan nama kelas yang unik agar tidak bentrok dengan template lain */
    .popup-jemaat-content {
        overflow: hidden;
        border-radius: 0.5rem;
        border: none;
        max-height: 85vh; /* batasi tinggi modal agar tidak melebihi viewport */
    }

    /* Container body untuk layout fleksibel kiri (gambar) + kanan (konten) */
    .popup-jemaat-body {
        display: flex;
        flex-wrap: nowrap;
        align-items: stretch;
        height: 100%;
    }

    /* Kolom gambar: gunakan fixed-basis agar tampil portrait */
    .popup-jemaat-left {
        flex: 0 0 380px;
        max-width: 380px;
        height: 100%;
    }

    .popup-jemaat-left .popup-jemaat-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center center;
        display: block;
    }

    /* Kolom konten fleksibel, scroll jika konten tinggi */
    .popup-jemaat-right {
        flex: 1 1 0;
        overflow: auto;
        min-width: 0; /* penting agar teks wrapping bekerja di flex */
    }

    /* Responsif: tumpuk kolom pada layar kecil */
    @media (max-width: 991.98px) {
        .popup-jemaat-body {
            flex-wrap: wrap;
        }
        .popup-jemaat-left {
            flex-basis: 100%;
            max-width: 100%;
            height: auto;
        }
        .popup-jemaat-left .popup-jemaat-img {
            height: auto;
            max-height: 450px;
            width: 100%;
            object-fit: contain; /* tampilkan keseluruhan gambar tanpa crop di mobile */
            background-color: #000; /* agar area tambahan terlihat serasi */
        }
        .popup-jemaat-right {
            padding: 1rem 1rem 1.25rem 1rem;
        }
    }

    /* Mobile: make modal scrollable and stack columns vertically */
    @media (max-width: 575.98px) {
        .popup-jemaat-content {
            max-height: 90vh;
        }
        .popup-jemaat-body {
            flex-direction: column;
            height: auto;
        }
        /* Tetapkan tinggi kolom gambar agar gambar portrait mengisi penuh tanpa terpotong */
        .popup-jemaat-left {
            flex-basis: 100%;
            max-width: 100%;
            height: 60vh; /* tinggi tetap untuk gambar portrait */
        }
        .popup-jemaat-left .popup-jemaat-img {
            max-height: 100%;
            width: auto;
            height: 100%;
            object-fit: contain; /* pastikan keseluruhan gambar terlihat */
            display: block;
            margin: 0 auto;
            background-color: #000;
        }
        .popup-jemaat-right {
            max-height: calc(90vh - 60vh);
            overflow: auto;
        }
    }

    /* Extra mobile fixes: ensure modal/dialog allow internal scrolling and smooth touch scroll */
    @media (max-width: 575.98px) {
        .modal {
            overflow: auto !important;
        }
        .modal-dialog {
            max-height: 95vh;
            margin: 1rem;
        }
        .popup-jemaat-content {
            max-height: 95vh;
            display: flex;
            flex-direction: column;
        }
        .popup-jemaat-right {
            overflow: auto;
            -webkit-overflow-scrolling: touch;
        }
    }
</style>
  
<!-- Carousel Start -->
<div class="container-fluid p-0 mb-5 section-padding" id="section_1">
    <div class="owl-carousel header-carousel position-relative">
        <div class="owl-carousel-item position-relative">
            <img class="img-fluid" src="{{ url('assets_skklweb/img/gpibskkl.png') }}" alt="">
            <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center"
                style="background: rgba(24, 29, 56, .7);">
                <div class="container">
                    <div class="row justify-content-start">
                        <div class="col-sm-10 col-lg-8">
                            <h5 class="text-primary text-uppercase mb-3 animated slideInDown">Gereja Protestan Indonesia
                                di Bagian Barat
                            </h5>
                            <h1 class="display-3 text-white animated slideInDown">Misi GPIB
                            </h1>
                            <p class="fs-5 text-white mb-4 pb-2">Memberdayakan Warga Gereja Secara Intergenerasional
                                Guna Merawat Jejaring Sosial & Ekologis di Konteks Budaya Digital.
                            </p>
                            <!-- <a href="" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Read
                                    More</a>
                                <a href="" class="btn btn-light py-md-3 px-md-5 animated slideInRight">Join Now</a> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="owl-carousel-item position-relative">
            <img class="img-fluid" src="{{ url('assets_skklweb/img/gpib-sangkakala-setelah-renovasi.jpg') }}" alt="">
            <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center"
                style="background: rgba(24, 29, 56, .7);">
                <div class="container">
                    <div class="row justify-content-start">
                        <div class="col-sm-10 col-lg-8">
                            <h5 class="text-primary text-uppercase mb-3 animated slideInDown">Gereja Protestan Indonesia
                                di Bagian Barat
                            </h5>
                            <h1 class="display-3 text-white animated slideInDown">Visi GPIB
                            </h1>
                            <p class="fs-5 text-white mb-4 pb-2">GPIB menjadi gereja yang mewujudkan damai sejahtera
                                bagi seluruh ciptaanNya.</p>
                            <!-- <a href="" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Read
                                    More</a>
                                <a href="" class="btn btn-light py-md-3 px-md-5 animated slideInRight">Join Now</a> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Carousel End -->

<!-- jadwal Start -->
<div class="container-xxl section-padding" id="section_2">
    <!-- class py-5 -->
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title bg-white text-center text-primary px-3">Ibadah</h6>
            <h1 class="mb-5">Jadwal Ibadah</h1>
        </div>
        <!-- <div class="row g-4">
            <div class="col-lg-12 col-sm-12 wow fadeInLeft" data-wow-delay="0.1s">
                <div class="alert alert-warning" role="alert">
                    <h4 class="alert-heading"><i class="fas fa-bullhorn"></i> Callout</h4>
                    <p>Sehubungan dengan HUT GPIB Sangkakala, khusus tanggal 28 April 2024 Ibadah Minggu Sore ditiadakan, digabung dengan Ibadah Pagi. Sehingga Ibadah Minggu pada tanggal tersebut hanya diadakan 1x.</p>
                    <hr>
                </div>
            </div>
        </div> -->
        <div class="row g-4">
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="service-item text-center pt-3">
                    <div class="p-4">
                        <i class="fa fa-3x fa-child text-primary mb-4"></i>
                        <h5 class="mb-3">IHMPA</h5>
                        <!-- <ul class="list-group list-group-flush">
                                <li class="list-group-item">An item</li>
                                <li class="list-group-item">A second item</li>
                                <li class="list-group-item">A third item</li>
                              </ul> -->
                        <p>Ibadah Hari Minggu Pelayanan Anak di Gedung Serba Guna lt 1, pada pukul 09.00 wib.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="service-item text-center pt-3">
                    <div class="p-4">
                        <i class="fa fa-3x fa-user-friends text-primary mb-4"></i>
                        <h5 class="mb-3">IHMPT</h5>
                        <p>Ibadah Hari Minggu Persekutuan Teruna di Gedung Serba Guna lt 2, pada pukul 09.00 wib.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 wow fadeInDown" data-wow-delay="0.5s">
                <div class="service-item text-center pt-3">
                    <div class="p-4">
                        <i class="fa fa-3x fa-church text-primary mb-4"></i>
                        <h5 class="mb-3">Ibadah Pagi</h5>
                        <p>Ibadah Hari Minggu (Dewasa) di Gedung Gereja diadakan pada pukul 09.00 wib.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 wow fadeInDown" data-wow-delay="0.7s">
                <div class="service-item text-center pt-3">
                    <div class="p-4">
                        <i class="fa fa-3x fa-church text-primary mb-4"></i>
                        <h5 class="mb-3">Ibadah Sore</h5>
                        <p>Ibadah Hari Minggu (Dewasa) di Gedung Gereja diadakan pada pukul 18.00 wib.</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6 wow fadeInDown" data-wow-delay="0.1s">
                <div class="service-item text-center pt-3">
                    <div class="p-4">
                        <i class="fa fa-3x fa-users text-primary mb-4"></i>
                        <h5 class="mb-3">Gerakan Pemuda</h5>
                        <p>Ibadah Setiap Hari Jumat di Gedung Serba Guna lt 1, pada pukul 20.00 wib.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 wow fadeInDown" data-wow-delay="0.3s">
                <div class="service-item text-center pt-3">
                    <div class="p-4">
                        <i class="fa fa-3x fa-user-tie text-primary mb-4"></i>
                        <h5 class="mb-3">Persekutuan Kaum Bapak</h5>
                        <p>Ibadah Setiap hari Jumat di Gedung Gereja pada pukul 19.00 wib.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="service-item text-center pt-3">
                    <div class="p-4">
                        <i class="fa fa-3x fa-female text-primary mb-4"></i>
                        <h5 class="mb-3">Persekutuan Kaum Perempuan</h5>
                        <p>Ibadah Setiap Hari Sabtu di GSG Lt 2 pada pukul 11.00 wib.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                <div class="service-item text-center pt-3">
                    <div class="p-4">
                        <i class="fa fa-3x fa-user-plus text-primary mb-4"></i>
                        <h5 class="mb-3">Persekutuan Kaum Lanjut Usia</h5>
                        <p>Ibadah Setiap Hari Sabtu di Gedung Gereja pada pukul 11.00.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- jadwal End -->


<!-- Livestream Start -->
<!-- <div class="container-xxl section-padding py-5" > -->
<!-- hilangkan py-5 -->
<div class="container-xxl section-padding" id="section_3">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 400px;">
                <div class="position-relative h-100">
                    <!-- <div class="wow fadeInUp col-md-6 col-sm-10" data-wow-delay="1.6s"> -->
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" width="640" height="360"
                            src="https://www.youtube.com/embed/{{ $linkUtube->link_utube }}" allowfullscreen></iframe>
                    </div>
                    <!-- </div> -->
                    <!-- <img class="img-fluid position-absolute w-100 h-100" src="img/about.jpg" alt="" style="object-fit: cover;"> -->
                </div>
            </div>
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                <h6 class="section-title bg-white text-start text-primary pe-3">Live Stream</h6>
                <h1 class="mb-4">{{ $linkUtube->subject }}</h1>
                <p class="mb-4">{{ $linkUtube->keterangan }}
                    <br>
                    {{ $linkUtube->sub_header }}
                </p>
                <p class="mb-4">
                    <a class="btn btn-primary mx-1"
                        href="{{ asset('storage/wj/file_wj.pdf') }}" target="_blank"><i
                            class="fa fa-file-pdf"></i> warta jemaat</a>
                    <a class="btn btn-primary mx-1"
                        href="{{ asset('storage/taib/file_taib.pdf') }}" target="_blank4"><i
                            class="fa fa-file-pdf"></i> tata ibadah</a>
                </p>
                <!-- <div class="row gy-2 gx-4 mb-4">
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Skilled Instructors</p>
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Online Classes</p>
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>International Certificate</p>
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Skilled Instructors</p>
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Online Classes</p>
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>International Certificate</p>
                        </div>
                    </div> -->
                <!-- <a class="btn btn-primary py-3 px-5 mt-2" href="">Read More</a> -->
            </div>
        </div>
    </div>
</div>
<!-- Livestream End -->

<!-- TimeTable Start -->
<div class="container-xxl schedule section-padding" id="section_4">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title bg-white text-center text-primary px-3">Timetable</h6>
            <h1 class="mb-5">Jadwal Kegiatan Sepekan</h1>
        </div>
        <div class="row g-4">
            <div class="col-lg-12 col-md-6 col-12 wow fadeInUp" data-wow-delay="0.5s">
                <div class="table-responsive-sm">
                    <table class="table table-bordered align-middle">
                        <thead class="thead-light table-primary">
                            <th><i class="fa fa-calendar-week"></i></th>
                            <th>Mon</th>
                            <th>Tue</th>
                            <th>Wed</th>
                            <th>Thu</th>
                            <th>Fri</th>
                            <th>Sat</th>
                            <th>Sun</th>
                        </thead>

                        <tbody>
                            <tr>
                                <td class="table-primary"><small>11.00</small></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="table-primary"><small>13.00</small></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="table-primary"><small>19.00</small></td>
                                <td>
                                    <!-- <strong>Cardio</strong>
                                        <span>7:00 am - 9:00 am</span> -->
                                </td>
                                <td>
                                    <strong>Rapat PHMJ</strong>

                                </td>
                                <td></td>
                                <td></td>
                                <td>

                                </td>
                                <td></td>
                                <td></td>
                            </tr>

                            <!-- <tr>
                                    <td class="table-primary"><small>9:00</small></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <strong>Boxing</strong>
                                        <span>8:00 am - 9:00 am</span>
                                    </td>
                                    <td>
                                        <strong>Areobic</strong>
                                        <span>8:00 am - 9:00 am</span>
                                    </td>
                                    <td></td>
                                    <td>
                                        <strong>Cardio</strong>
                                        <span>8:00 am - 9:00 am</span>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="table-primary" <small>11:00</small></td>
                                    <td></td>
                                    <td>
                                        <strong>Boxing</strong>
                                        <span>11:00 am - 2:00 pm</span>
                                    </td>
                                    <td>
                                        <strong>Areobic</strong>
                                        <span>11:30 am - 3:30 pm</span>
                                    </td>
                                    <td></td>
                                    <td>
                                        <strong>Body work</strong>
                                        <span>11:50 am - 5:20 pm</span>
                                    </td>
                                    <td></td>
                                </tr>

                                <tr>
                                    <td class="table-primary"><small>2:00</small></td>
                                    <td>
                                        <strong>Boxing</strong>
                                        <span>2:00 pm - 4:00 pm</span>
                                    </td>
                                    <td>
                                        <strong>Power lifting</strong>
                                        <span>3:00 pm - 6:00 pm</span>
                                    </td>
                                    <td></td>
                                    <td>
                                        <strong>Cardio</strong>
                                        <span>6:00 pm - 9:00 pm</span>
                                    </td>
                                    <td></td>
                                    <td>
                                        <strong>Crossfit</strong>
                                        <span>5:00 pm - 7:00 pm</span>
                                    </td>
                                </tr> -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- TimeTable End -->

<!-- phm Start -->
<div class="container-xxl section-padding" id="section_5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title bg-white text-center text-primary px-3">PHMJ</h6>
            <h1 class="mb-5">Pelaksana Harian Majelis Jemaat</h1>
        </div>
        <div class="row g-4">
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="team-item bg-light">
                    <div class="overflow-hidden">
                        <img class="img-fluid" src="{{ url('assets_skklweb/img/avatar_girl.jpg') }}" alt="">
                    </div>
                    <div class="position-relative d-flex justify-content-center" style="margin-top: -23px;">
                        <div class="bg-light d-flex justify-content-center pt-2 px-1">
                            <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-instagram"></i></a>
                            <a class="btn btn-sm-square btn-primary mx-1" href="https://wa.me/6281365646316"
                                target="_blank"><i class="fab fa-whatsapp"></i></a>
                        </div>
                    </div>
                    <div class="text-center p-4">
                        <h5 class="mb-0"> Pdt. Clara Y. Aipasa</h5>
                        <small>Ketua Majelis Jemaat</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                <div class="team-item bg-light">
                    <div class="overflow-hidden">
                        <img class="img-fluid" src="{{ url('assets_skklweb/img/avatar.jpg') }}" alt="">
                    </div>
                    <div class="position-relative d-flex justify-content-center" style="margin-top: -23px;">
                        <div class="bg-light d-flex justify-content-center pt-2 px-1">
                            <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-instagram"></i></a>
                            <a class="btn btn-sm-square btn-primary mx-1" href="https://wa.me/628129317212"
                                target="_blank"><i class="fab fa-whatsapp"></i></a>
                        </div>
                    </div>
                    <div class="text-center p-4">
                        <h5 class="mb-0">Pnt. Sumantri Purba</h5>
                        <small>Ketua I</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 wow fadeInDown" data-wow-delay="0.2s">
                <div class="team-item bg-light">
                    <div class="overflow-hidden">
                        <img class="img-fluid" src="{{ url('assets_skklweb/img/avatar.jpg') }}" alt="">
                    </div>
                    <div class="position-relative d-flex justify-content-center" style="margin-top: -23px;">
                        <div class="bg-light d-flex justify-content-center pt-2 px-1">
                            <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-instagram"></i></a>
                            <a class="btn btn-sm-square btn-primary mx-1" href="https://wa.me/6281546233021"
                                target="_blank"><i class="fab fa-whatsapp"></i></a>
                        </div>
                    </div>
                    <div class="text-center p-4">
                        <h5 class="mb-0">Pnt. Sarwoto</h5>
                        <small>Ketua II</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 wow fadeInDown" data-wow-delay="0.3s">
                <div class="team-item bg-light">
                    <div class="overflow-hidden">
                        <img class="img-fluid" src="{{ url('assets_skklweb/img/avatar.jpg') }}" alt="">
                    </div>
                    <div class="position-relative d-flex justify-content-center" style="margin-top: -23px;">
                        <div class="bg-light d-flex justify-content-center pt-2 px-1">
                            <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-instagram"></i></a>
                            <a class="btn btn-sm-square btn-primary mx-1" href="https://wa.me/62811771958"
                                target="_blank"><i class="fab fa-whatsapp"></i></a>
                        </div>
                    </div>
                    <div class="text-center p-4">
                        <h5 class="mb-0">Pnt. Rudy Lumentut</h5>
                        <small>Ketua III</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.6s">
                <div class="team-item bg-light">
                    <div class="overflow-hidden">
                        <img class="img-fluid" src="{{ url('assets_skklweb/img/avatar_girl.jpg') }}" alt="">
                    </div>
                    <div class="position-relative d-flex justify-content-center" style="margin-top: -23px;">
                        <div class="bg-light d-flex justify-content-center pt-2 px-1">
                            <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-instagram"></i></a>
                            <a class="btn btn-sm-square btn-primary mx-1" href="https://wa.me/628161437690"
                                target="_blank"><i class="fab fa-whatsapp"></i></a>
                        </div>
                    </div>
                    <div class="text-center p-4">
                        <h5 class="mb-0">Pnt. Silvya A. Tupamahu</h5>
                        <small>Sekretaris</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="team-item bg-light">
                    <div class="overflow-hidden">
                        <img class="img-fluid" src="{{ url('assets_skklweb/img/avatar_girl.jpg') }}" alt="">
                    </div>
                    <div class="position-relative d-flex justify-content-center" style="margin-top: -23px;">
                        <div class="bg-light d-flex justify-content-center pt-2 px-1">
                            <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-instagram"></i></a>
                            <a class="btn btn-sm-square btn-primary mx-1" href="https://wa.me/628129426364"
                                target="_blank"><i class="fab fa-whatsapp"></i></a>
                        </div>
                    </div>
                    <div class="text-center p-4">
                        <h5 class="mb-0">Dkn. Eva Marbun</h5>
                        <small>Sekretaris I</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 wow fadeInDown" data-wow-delay="0.8s">
                <div class="team-item bg-light">
                    <div class="overflow-hidden">
                        <img class="img-fluid" src="{{ url('assets_skklweb/img/avatar_girl.jpg') }}" alt="">
                    </div>
                    <div class="position-relative d-flex justify-content-center" style="margin-top: -23px;">
                        <div class="bg-light d-flex justify-content-center pt-2 px-1">
                            <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-instagram"></i></a>
                            <a class="btn btn-sm-square btn-primary mx-1" href="https://wa.me/6281398054475"
                                target="_blank"><i class="fab fa-whatsapp"></i></a>
                        </div>
                    </div>
                    <div class="text-center p-4">
                        <h5 class="mb-0">Dkn. Novny M. Pormes</h5>
                        <small>Bendahara</small>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- phm End -->

<!-- pelkat Start -->
<div class="container-xxl section-padding" id="section_6">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title bg-white text-center text-primary px-3">PELKAT</h6>
            <h1 class="mb-5">Pelayanan Kategorial</h1>
        </div>
        <div class="owl-carousel testimonial-carousel">

            <div class="testimonial-item text-center">
                <img class="rounded p-2 mx-auto" src="{{ url('assets_skklweb/img/pelkat_pt.png') }}"
                    style="width: 140px; height: 140px;">
            </div>
            <div class="testimonial-item text-center">
                <img class="rounded p-2 mx-auto" src="{{ url('assets_skklweb/img/pelkat_gp.png') }}"
                    style="width: 140px; height: 140px;">
            </div>
            <div class="testimonial-item text-center">
                <img class="rounded p-2 mx-auto" src="{{ url('assets_skklweb/img/pelkat_pkp.png') }}"
                    style="width: 140px; height: 140px;">
            </div>
            <div class="testimonial-item text-center">
                <img class="rounded p-2 mx-auto" src="{{ url('assets_skklweb/img/pelkat_pkb.png') }}"
                    style="width: 140px; height: 140px;">
            </div>
            <div class="testimonial-item text-center">
                <img class="rounded p-2 mx-auto" src="{{ url('assets_skklweb/img/pelkat_pklu.png') }}"
                    style="width: 140px; height: 140px;">
            </div>
            <div class="testimonial-item text-center">
                <img class="rounded p-2 mx-auto" src="{{ url('assets_skklweb/img/pelkat_pa.png') }}"
                    style="width: 140px; height: 140px;">
            </div>
        </div>
    </div>
</div>

<!-- pelkat End -->

<!-- maps -->
<div class="container-fluid p-1 mb-n5 section-padding" id="section_7">
    {{-- <div class="container"> --}}
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title bg-white text-center text-primary px-3">Maps</h6>
            <h1 class="mb-3">Lokasi Kami</h1>
        </div>
        {{-- <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.514165859173!2d106.7688641738955!3d-6.195685460695734!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f6e1cc393699%3A0xafff8859f3cb8e90!2sGPIB%20Sangkakala!5e0!3m2!1sid!2sid!4v1691465914014!5m2!1sid!2sid"
            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe> --}}
        <iframe width="100%" height="100%" id="gmap_canvas"
            src="https://maps.google.com/maps?q=gpib sangkakala&t=&z=16&ie=UTF8&iwloc=&output=embed" frameborder="0"
            scrolling="no" marginheight="0" marginwidth="0"></iframe>
        {{--
    </div> --}}
</div>
<!-- end maps -->

<!-- Modal Pop-up -->
    <div class="modal fade" id="announcementModal" tabindex="-1" aria-labelledby="announcementModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content popup-jemaat-content shadow-lg">
            <div class="modal-body p-0 position-relative popup-jemaat-body">
                
                <!-- Tombol Close -->
                <button type="button" class="btn-close position-absolute top-0 end-0 m-3 z-3 bg-white p-2 rounded-circle shadow-sm" data-bs-dismiss="modal" aria-label="Close"></button>
                
                <div class="row g-0 align-items-center">
                    <!-- Kolom Gambar dengan kelas unik -->
                    <div class="col-lg-5 popup-jemaat-left bg-dark d-flex justify-content-center align-items-center p-0">
                        <img src="{{ url('assets_skklweb/img/sertijab.jpeg') }}" alt="Utus Sambut" class="popup-jemaat-img">
                    </div>
                    
                    <!-- Kolom Konten Pengumuman -->
                    <div class="col-lg-7 popup-jemaat-right p-4 p-lg-5">
                        <span class="badge bg-danger mb-2">Pengumuman Penting</span>
                        <h4 class="fw-bold mb-3" id="announcementModalLabel">Utus Sambut Ketua Majelis Jemaat</h4>
                        
                        <p class="text-secondary small mb-3">
                            Dalam rangka Acara <strong>Utus Sambut Ketua Majelis Jemaat</strong> yang akan diadakan pada:
                        </p>
                        
                        <ul class="list-unstyled small text-secondary mb-3 ps-2 border-start border-3 border-danger">
                            <li>📅 <strong>Hari/Tanggal:</strong> Minggu, 24 Agustus 2026</li>
                            <li>⏰ <strong>Pukul:</strong> 16.00 WIB</li>
                        </ul>

                        <p class="text-secondary small mb-3">
                            Maka seluruh pelaksanaan <strong>Ibadah Hari Minggu</strong> pada tanggal tersebut ditiadakan, meliputi:
                        </p>

                        <ul class="small text-secondary mb-4">
                            <li>IHMPA & IHMPT</li>
                            <li>IHM Pukul 09.00 WIB</li>
                            <li>IHM Pukul 18.00 WIB</li>
                        </ul>

                        <div class="alert alert-warning small mb-0 py-2" role="alert">
                            Jemaat diundang untuk bersama-sama mengikuti ibadah dan acara utus sambut pada pukul 16.00 WIB. Tuhan memberkati.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <!-- Script untuk Otomatis Menampilkan Pop-up saat Halaman Dimuat -->
     
    <script>
        var myModal;
        document.addEventListener("DOMContentLoaded", function() {
            var modalEl = document.getElementById('announcementModal');
            myModal = new bootstrap.Modal(modalEl);
            myModal.show();
        });
    </script>
  

@endsection