<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') — GPIB Sangkakala</title>

    {{-- Tailwind CDN --}}
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- Font Awesome (jika belum ada) --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    {{-- Owl Carousel CSS --}}
    <link rel="stylesheet" href="{{ url('assets_skklweb/css/owl.carousel.min.css') }}">

    {{-- WOW.js CSS --}}
    <link rel="stylesheet" href="{{ url('assets_skklweb/css/animate.min.css') }}">
</head>

@extends('skklweb-layout.main')
@section('title', 'GPIB SANGKAKALA')

@section('content')

{{-- ─────────────────────────────────────────────
     HERO CAROUSEL
───────────────────────────────────────────── --}}
<section id="section_1" class="relative w-full overflow-hidden">
    <div class="owl-carousel header-carousel">

        {{-- Slide 1 --}}
        <div class="relative h-screen min-h-[600px]">
            <img src="{{ url('assets_skklweb/img/gpibskkl.png') }}"
                 alt="GPIB Sangkakala"
                 class="absolute inset-0 w-full h-full object-cover">
            <div class="absolute inset-0 bg-[#0B1120]/75"></div>
            <div class="absolute bottom-0 left-0 w-1 h-2/3 bg-amber-400"></div>
            <div class="relative z-10 h-full flex items-center px-8 md:px-20 lg:px-32">
                <div class="max-w-2xl">
                    <p class="text-amber-400 text-xs tracking-[0.3em] uppercase font-semibold mb-4 wow fadeInDown" data-wow-delay="0.1s">
                        Gereja Protestan Indonesia di Bagian Barat
                    </p>
                    <h1 class="text-white font-light leading-tight mb-6 wow fadeInDown" data-wow-delay="0.2s"
                        style="font-size:clamp(2.5rem,6vw,4.5rem); font-family:'Georgia',serif;">
                        Misi<br><span class="font-bold">GPIB</span>
                    </h1>
                    <div class="w-12 h-px bg-amber-400 mb-6 wow fadeInDown" data-wow-delay="0.3s"></div>
                    <p class="text-white/70 text-base md:text-lg leading-relaxed wow fadeInDown" data-wow-delay="0.4s">
                        Memberdayakan Warga Gereja Secara Intergenerasional Guna Merawat
                        Jejaring Sosial &amp; Ekologis di Konteks Budaya Digital.
                    </p>
                </div>
            </div>
        </div>

        {{-- Slide 2 --}}
        <div class="relative h-screen min-h-[600px]">
            <img src="{{ url('assets_skklweb/img/gpib-sangkakala-setelah-renovasi.jpg') }}"
                 alt="Gedung GPIB Sangkakala"
                 class="absolute inset-0 w-full h-full object-cover">
            <div class="absolute inset-0 bg-[#0B1120]/75"></div>
            <div class="absolute bottom-0 left-0 w-1 h-2/3 bg-amber-400"></div>
            <div class="relative z-10 h-full flex items-center px-8 md:px-20 lg:px-32">
                <div class="max-w-2xl">
                    <p class="text-amber-400 text-xs tracking-[0.3em] uppercase font-semibold mb-4 wow fadeInDown" data-wow-delay="0.1s">
                        Gereja Protestan Indonesia di Bagian Barat
                    </p>
                    <h1 class="text-white font-light leading-tight mb-6 wow fadeInDown" data-wow-delay="0.2s"
                        style="font-size:clamp(2.5rem,6vw,4.5rem); font-family:'Georgia',serif;">
                        Visi<br><span class="font-bold">GPIB</span>
                    </h1>
                    <div class="w-12 h-px bg-amber-400 mb-6 wow fadeInDown" data-wow-delay="0.3s"></div>
                    <p class="text-white/70 text-base md:text-lg leading-relaxed wow fadeInDown" data-wow-delay="0.4s">
                        GPIB menjadi gereja yang mewujudkan damai sejahtera
                        bagi seluruh ciptaan-Nya.
                    </p>
                </div>
            </div>
        </div>

    </div>
</section>


{{-- ─────────────────────────────────────────────
     JADWAL IBADAH
───────────────────────────────────────────── --}}
<section id="section_2" class="py-24 bg-white">
    <div class="max-w-6xl mx-auto px-6">

        <div class="mb-16 wow fadeInUp" data-wow-delay="0.1s">
            <p class="text-amber-500 text-xs tracking-[0.3em] uppercase font-semibold mb-2">Ibadah</p>
            <h2 class="text-[#0B1120] text-4xl font-bold" style="font-family:'Georgia',serif;">Jadwal Ibadah</h2>
            <div class="w-10 h-0.5 bg-amber-400 mt-4"></div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">

            @php
            $jadwal = [
                ['fa-child',       'IHMPA',                        'Ibadah Hari Minggu Pelayanan Anak — GSG lt 1, pukul 09.00 WIB.', '0.10s'],
                ['fa-user-friends','IHMPT',                        'Ibadah Hari Minggu Persekutuan Teruna — GSG lt 2, pukul 09.00 WIB.', '0.15s'],
                ['fa-church',      'Ibadah Pagi',                  'Ibadah Minggu Dewasa — Gedung Gereja, pukul 09.00 WIB.', '0.20s'],
                ['fa-church',      'Ibadah Sore',                  'Ibadah Minggu Dewasa — Gedung Gereja, pukul 18.00 WIB.', '0.25s'],
                ['fa-users',       'Gerakan Pemuda',               'Setiap Jumat — GSG lt 1, pukul 20.00 WIB.', '0.30s'],
                ['fa-user-tie',    'Persekutuan Kaum Bapak',       'Setiap Jumat — Gedung Gereja, pukul 19.00 WIB.', '0.35s'],
                ['fa-female',      'Persekutuan Kaum Perempuan',   'Setiap Sabtu — GSG lt 2, pukul 11.00 WIB.', '0.40s'],
                ['fa-user-plus',   'Persekutuan Kaum Lanjut Usia', 'Setiap Sabtu — Gedung Gereja, pukul 11.00 WIB.', '0.45s'],
            ];
            @endphp

            @foreach($jadwal as [$icon, $title, $desc, $delay])
            <div class="wow fadeInUp" data-wow-delay="{{ $delay }}">
                <div class="border border-gray-100 rounded-xl p-6 h-full hover:border-amber-400 hover:shadow-lg transition-all duration-300">
                    <div class="w-10 h-10 rounded-lg bg-[#0B1120] flex items-center justify-center mb-4">
                        <i class="fa {{ $icon }} text-amber-400"></i>
                    </div>
                    <h5 class="font-semibold text-[#0B1120] text-sm mb-2">{{ $title }}</h5>
                    <p class="text-gray-500 text-sm leading-relaxed">{{ $desc }}</p>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>


{{-- ─────────────────────────────────────────────
     LIVESTREAM
───────────────────────────────────────────── --}}
<section id="section_3" class="py-24 bg-[#0B1120]">
    <div class="max-w-6xl mx-auto px-6">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-14 items-center">

            <div class="wow fadeInLeft" data-wow-delay="0.1s">
                <div class="relative w-full rounded-xl overflow-hidden ring-1 ring-white/10"
                     style="padding-top:56.25%;">
                    <iframe class="absolute inset-0 w-full h-full"
                            src="https://www.youtube.com/embed/{{ $linkUtube->link_utube }}"
                            allowfullscreen></iframe>
                </div>
            </div>

            <div class="wow fadeInRight" data-wow-delay="0.2s">
                <p class="text-amber-400 text-xs tracking-[0.3em] uppercase font-semibold mb-3">Live Stream</p>
                <h2 class="text-white text-3xl font-bold leading-snug mb-5"
                    style="font-family:'Georgia',serif;">{{ $linkUtube->subject }}</h2>
                <div class="w-10 h-px bg-amber-400 mb-6"></div>
                <p class="text-white/60 text-sm leading-relaxed mb-1">{{ $linkUtube->keterangan }}</p>
                <p class="text-white/40 text-sm leading-relaxed mb-8">{{ $linkUtube->sub_header }}</p>
                <div class="flex flex-wrap gap-3">
                    <a href="{{ asset('storage/wj/file_wj.pdf') }}" target="_blank"
                       class="inline-flex items-center gap-2 text-sm font-semibold px-5 py-2.5 rounded-lg bg-amber-400 text-[#0B1120] hover:bg-amber-300 transition-colors">
                        <i class="fa fa-file-pdf"></i> Warta Jemaat
                    </a>
                    <a href="{{ asset('storage/taib/file_taib.pdf') }}" target="_blank"
                       class="inline-flex items-center gap-2 text-sm font-semibold px-5 py-2.5 rounded-lg border border-amber-400/50 text-amber-400 hover:bg-amber-400/10 transition-colors">
                        <i class="fa fa-file-pdf"></i> Tata Ibadah
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>


{{-- ─────────────────────────────────────────────
     TIMETABLE
───────────────────────────────────────────── --}}
<section id="section_4" class="py-24 bg-gray-50">
    <div class="max-w-6xl mx-auto px-6">

        <div class="mb-16 wow fadeInUp" data-wow-delay="0.1s">
            <p class="text-amber-500 text-xs tracking-[0.3em] uppercase font-semibold mb-2">Timetable</p>
            <h2 class="text-[#0B1120] text-4xl font-bold" style="font-family:'Georgia',serif;">Jadwal Kegiatan Sepekan</h2>
            <div class="w-10 h-0.5 bg-amber-400 mt-4"></div>
        </div>

        <div class="overflow-x-auto wow fadeInUp rounded-xl shadow-sm" data-wow-delay="0.2s">
            <table class="w-full text-sm border-collapse min-w-[640px]">
                <thead>
                    <tr class="bg-[#0B1120] text-white">
                        <th class="text-left px-5 py-4 font-semibold text-amber-400 rounded-tl-xl" style="width:90px;">Waktu</th>
                        @foreach(['Sen','Sel','Rab','Kam','Jum','Sab','Min'] as $d)
                        <th class="text-center px-4 py-4 font-medium text-white/70 {{ $loop->last ? 'rounded-tr-xl' : '' }}">{{ $d }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @php
                    $rows = [
                        ['09.00', '', '', '', '', '', 'PKP / PKLU', 'IHMPA, IHMPT, Ibadah Pagi'],
                        ['11.00', '', '', '', '', '', '', ''],
                        ['13.00', '', '', '', '', '', '', ''],
                        ['18.00', '', '', '', '', '', '', 'Ibadah Sore'],
                        ['19.00', '', 'Rapat PHMJ', '', '', 'PKB', '', ''],
                        ['20.00', '', '', '', '', 'Gerakan Pemuda', '', ''],
                    ];
                    @endphp
                    @foreach($rows as $ri => $row)
                    <tr class="{{ $ri % 2 === 0 ? 'bg-white' : 'bg-gray-50/80' }}">
                        @foreach($row as $ci => $cell)
                            @if($ci === 0)
                            <td class="px-5 py-3 font-bold text-amber-500 border-r border-gray-100 text-xs">{{ $cell }}</td>
                            @else
                            <td class="text-center px-4 py-3 border-b border-gray-100">
                                @if($cell)
                                <span class="inline-block text-xs font-semibold px-2 py-1 rounded-md bg-[#0B1120]/5 text-[#0B1120]">{{ $cell }}</span>
                                @else
                                <span class="text-gray-200 text-xs">—</span>
                                @endif
                            </td>
                            @endif
                        @endforeach
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</section>


{{-- ─────────────────────────────────────────────
     PHMJ
───────────────────────────────────────────── --}}
<section id="section_5" class="py-24 bg-white">
    <div class="max-w-6xl mx-auto px-6">

        <div class="mb-16 wow fadeInUp" data-wow-delay="0.1s">
            <p class="text-amber-500 text-xs tracking-[0.3em] uppercase font-semibold mb-2">PHMJ</p>
            <h2 class="text-[#0B1120] text-4xl font-bold" style="font-family:'Georgia',serif;">Pelaksana Harian Majelis Jemaat</h2>
            <div class="w-10 h-0.5 bg-amber-400 mt-4"></div>
        </div>

        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-6">
            @php
            $phmj = [
                ['Pdt. Clara Y. Aipasa',   'Ketua Majelis Jemaat', 'avatar_girl.jpg', '6281365646316',  '0.10s'],
                ['Pnt. Sumantri Purba',     'Ketua I',              'avatar.jpg',      '628129317212',   '0.15s'],
                ['Pnt. Sarwoto',            'Ketua II',             'avatar.jpg',      '6281546233021',  '0.20s'],
                ['Pnt. Rudy Lumentut',      'Ketua III',            'avatar.jpg',      '62811771958',    '0.25s'],
                ['Pnt. Silvya A. Tupamahu', 'Sekretaris',           'avatar_girl.jpg', '628161437690',   '0.30s'],
                ['Dkn. Eva Marbun',         'Sekretaris I',         'avatar_girl.jpg', '628129426364',   '0.35s'],
                ['Dkn. Novny M. Pormes',    'Bendahara',            'avatar_girl.jpg', '6281398054475',  '0.40s'],
            ];
            @endphp

            @foreach($phmj as [$name, $role, $img, $wa, $delay])
            <div class="wow fadeInUp" data-wow-delay="{{ $delay }}">
                <div class="group rounded-xl overflow-hidden border border-gray-100 hover:border-amber-300 hover:shadow-lg transition-all duration-300">
                    <div class="relative overflow-hidden bg-gray-100" style="aspect-ratio:1/1;">
                        <img src="{{ url('assets_skklweb/img/' . $img) }}"
                             alt="{{ $name }}"
                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        <div class="absolute inset-0 bg-[#0B1120]/0 group-hover:bg-[#0B1120]/55 transition-all duration-300 flex items-center justify-center gap-2 opacity-0 group-hover:opacity-100">
                            <a href="" class="w-8 h-8 rounded-full border border-white/40 text-white flex items-center justify-center text-xs hover:bg-amber-400 hover:text-[#0B1120] hover:border-amber-400 transition-colors">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="" class="w-8 h-8 rounded-full border border-white/40 text-white flex items-center justify-center text-xs hover:bg-amber-400 hover:text-[#0B1120] hover:border-amber-400 transition-colors">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <a href="https://wa.me/{{ $wa }}" target="_blank"
                               class="w-8 h-8 rounded-full border border-white/40 text-white flex items-center justify-center text-xs hover:bg-amber-400 hover:text-[#0B1120] hover:border-amber-400 transition-colors">
                                <i class="fab fa-whatsapp"></i>
                            </a>
                        </div>
                    </div>
                    <div class="p-4 bg-white">
                        <p class="font-semibold text-[#0B1120] text-sm leading-snug mb-1">{{ $name }}</p>
                        <span class="text-xs text-amber-600 font-medium">{{ $role }}</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </div>
</section>


{{-- ─────────────────────────────────────────────
     PELKAT
───────────────────────────────────────────── --}}
<section id="section_6" class="py-20 bg-gray-50">
    <div class="max-w-6xl mx-auto px-6">

        <div class="mb-14 wow fadeInUp" data-wow-delay="0.1s">
            <p class="text-amber-500 text-xs tracking-[0.3em] uppercase font-semibold mb-2">PELKAT</p>
            <h2 class="text-[#0B1120] text-4xl font-bold" style="font-family:'Georgia',serif;">Pelayanan Kategorial</h2>
            <div class="w-10 h-0.5 bg-amber-400 mt-4"></div>
        </div>

        <div class="owl-carousel testimonial-carousel">
            @foreach(['pelkat_pt','pelkat_gp','pelkat_pkp','pelkat_pkb','pelkat_pklu','pelkat_pa'] as $p)
            <div class="text-center px-4 py-6">
                <div class="mx-auto w-28 h-28 rounded-full bg-white border border-gray-200 shadow-sm flex items-center justify-center hover:border-amber-300 hover:shadow-md transition-all duration-300">
                    <img src="{{ url('assets_skklweb/img/' . $p . '.png') }}"
                         alt="{{ $p }}"
                         class="w-16 h-16 object-contain">
                </div>
            </div>
            @endforeach
        </div>

    </div>
</section>


{{-- ─────────────────────────────────────────────
     MAPS
───────────────────────────────────────────── --}}
<section id="section_7" class="pt-20 pb-0 bg-white">
    <div class="max-w-6xl mx-auto px-6 mb-10">
        <div class="wow fadeInUp" data-wow-delay="0.1s">
            <p class="text-amber-500 text-xs tracking-[0.3em] uppercase font-semibold mb-2">Maps</p>
            <h2 class="text-[#0B1120] text-4xl font-bold" style="font-family:'Georgia',serif;">Lokasi Kami</h2>
            <div class="w-10 h-0.5 bg-amber-400 mt-4"></div>
        </div>
    </div>
    <iframe
        width="100%"
        height="460"
        id="gmap_canvas"
        src="https://maps.google.com/maps?q=gpib+sangkakala&t=&z=16&ie=UTF8&iwloc=&output=embed"
        frameborder="0"
        scrolling="no"
        style="display:block;">
    </iframe>
</section>

@endsection

{{-- jQuery --}}
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    {{-- Owl Carousel JS --}}
    <script src="{{ url('assets_skklweb/js/owl.carousel.min.js') }}"></script>

    {{-- WOW.js --}}
    <script src="{{ url('assets_skklweb/js/wow.min.js') }}"></script>

    {{-- Init --}}
    <script>
        new WOW().init();
        $('.header-carousel').owlCarousel({ items:1, loop:true, autoplay:true, autoplayTimeout:5000, animateOut:'fadeOut' });
        $('.testimonial-carousel').owlCarousel({ loop:true, autoplay:true, autoplayTimeout:3000, responsive:{ 0:{items:2}, 768:{items:4}, 1024:{items:6} } });
    </script>
</body>