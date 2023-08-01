@extends('ppmj_documentation.main_dokumentasi')
@section('title', 'Documentation SCS')
@section('subtitle', 'Documentation SCS')

@section('content_dokumentasi')
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> --}}
<script src="{{ url('assets_documentation/js/jquery.slim.min.js') }}"></script>  {{-- tooltip --}} 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>


<style>
    /* html {
  scroll-behavior: smooth;
} */
    /* div {
  height: 1000px;
} */

/* #scroll-to-top {
  display: hidden;
  position: fixed;
  font-size: 20px;
  bottom: 10%;
  right: 10%;
  opacity: 1;
  z-index: 10;
  cursor: pointer; 
} */
#scroll-to-top {
  display: none;
  position: fixed;
  bottom: 20px;
  right: 30px;
  z-index: 99;
  font-size: 18px;
  border: none;
  outline: none;
  background-color: red;
  color: white;
  cursor: pointer;
  padding: 15px;
  border-radius: 4px;
}

#scroll-to-top:hover {
  background-color: #555;
}

.centerTest {
    text-align:center;
}

</style>

{{-- @foreach ($documens as $documen)
<article class="docs-article" id="section-{{ $documen->id }}">
    <header class="docs-header">
        <h1 class="docs-heading">{{ $documen->heading }} <span class="docs-time">Last updated: 2019-06-01</span></h1>
        <section class="docs-intro">
            <p>{{ $documen->text }}</p>
        </section>
    </header>
    <section class="docs-section" id="item-{{ $documen->item_no }}">
        <h2 class="section-heading">{{ $documen->section_heading }}</h2>
        <p>{{ $documen->isi_content }}</p>
    </section>
</article>
@endforeach --}}

{{-- @foreach ($grouped as $group => $key)
<article class="docs-article" id="section-{{ $group }}">
    <header class="docs-header">
        <h1 class="docs-heading">{{ $group }} <span class="docs-time">Last updated: 2019-06-01</span></h1>
        <section class="docs-intro">
            <p>{{ $group }}</p>
        </section>
    </header>
    @foreach ($key as $tree)
    <section class="docs-section" id="item-{{ $tree->item_no }}">
        <h2 class="section-heading">{{ $tree->section_heading }}</h2>
        <p>{{ $tree->isi_content }}</p>
    </section>
    @endforeach
</article>
@endforeach --}}


{{-- ############################################### --}}

<article class="docs-article" id="section-1">
    <header class="docs-header">
        <h1 class="docs-heading mb-0">Pasal 1 {{-- <span class="docs-time">Last updated: 2019-06-01</span> --}}</h1>
        <section class="docs-intro">
            <p>
                Pengertian Tentang Jemaat Nama dan Pelembagaan Jemaat
            </p>
        </section>
    </header>

    <section class="docs-section" id="item-1-1">
        <h2 class="section-heading">{{ $loop[1]['pasal'] }}</h2>
        <p>{{ $loop[1]['keterangan'] }}
            {{-- <a class="btn btn-warning btn-xs" href="sanggah/{{ $refute->slug }}"><i class="fa fa-eye"></i> View</a> --}}

            <a class="theme-link" href="{{ route('ppmj.edit', $loop[1]['id']) }}"><i class="fas fa-external-link-alt"></i></a>

            <a class="theme-link" data-toggle="modal" id="mediumButton" data-target="#mediumModal" data-attr="">{{-- {{ route('ppmj.edit', $aa->id) }} --}}
            <i class="fas fa-edit text-gray-300"></i></a>

            <div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="mediumBody">
                    <div>
                        <!-- the result to be displayed apply here -->
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        // display a modal (medium modal)
        $(document).on('click', '#mediumButton', function(event) {
            event.preventDefault();
            let href = $(this).attr('data-attr');
            $.ajax({
                url: href,
                beforeSend: function() {
                    $('#loader').show();
                },
                // return the result
                success: function(result) {
                    $('#mediumModal').modal("show");
                    $('#mediumBody').html(result).show();
                },
                complete: function() {
                    $('#loader').hide();
                },
                error: function(jqXHR, testStatus, error) {
                    console.log(error);
                    alert("Page " + href + " cannot open. Error:" + error);
                    $('#loader').hide();
                },
                timeout: 8000
            })
        });

    </script>


                            
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                Open modal
              </button>

              <div class="modal" id="myModal">
                <div class="modal-dialog">
                  <div class="modal-content">
                  
                    <!-- Modal Header -->
                    <div class="modal-header">
                      <h4 class="modal-title">Modal Heading</h4>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    
                    <!-- Modal body -->
                    <div class="modal-body">
                      Modal body..
                    </div>
                    
                    <!-- Modal footer -->
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                    
                  </div>
                </div>
              </div>
        </p>
    </section>

    <section class="docs-section" id="item-1-2">
        <h2 class="section-heading">{{ $loop[2]['pasal'] }}</h2>
        <p>{{ $loop[2]['keterangan'] }}</p>
    </section>

    <section class="docs-section" id="item-1-3">
        <h2 class="section-heading">{{ $loop[3]['pasal'] }}</h2>
        <p>{{ $loop[3]['keterangan'] }}</p>
    </section>
    

    
</article>



<article class="docs-article" id="section-2">
    <header class="docs-header">
        <h1 class="docs-heading mb-0">Pasal 2 {{-- <span class="docs-time">Last updated: 2019-06-01</span> --}}</h1>
        <section class="docs-intro">
            <p>
                Wilayah Pelayanan
            </p>
        </section>
    </header>
    <section class="docs-section" id="item-2-1">
        <h2 class="section-heading">{{ $loop[4]['pasal'] }}</h2>
        <p>
            Wilayah Pelayanan <br>
            {{ $loop[4]['keterangan'] }}
        </p>
    </section>
    <section class="docs-section" id="item-2-2">
        <h2 class="section-heading">2.2</h2>
        <p>
            Batas Wilayah Pelayanan 
            <ol style="list-style-type:lower-alpha">
                <li>Utara   : {{ $loop[5]['keterangan'] }}</li>
                <li>Selatan : {{ $loop[6]['keterangan'] }}</li>
                <li>Timur   : {{ $loop[7]['keterangan'] }}</li>
                <li>Barat   : {{ $loop[8]['keterangan'] }}</li>
            </ol>
        </p>
    </section>
    <section class="docs-section" id="item-2-3">
        <h2 class="section-heading">{{ $loop[9]['pasal'] }}</h2>
        <p>
            Sektor Pelayanan <br>
            {{ $loop[9]['keterangan'] }}
        </p>
    </section>
</article>

<article class="docs-article" id="section-3">
    <header class="docs-header">
        <h1 class="docs-heading mb-0">Pasal 3 {{-- <span class="docs-time">Last updated: 2019-06-01</span> --}}</h1>
        <section class="docs-intro">
        <p>
            Warga Jemaat
        </p>
        </section>
    </header>
    <section class="docs-section" id="item-3-1">
        <h2 class="section-heading">3.1</h2>
        <p>
            Pengertian
            <ol style="list-style-type:lower-alpha">
                <li id="item-3-1-a">{{ $loop[10]['keterangan'] }}</li>
                <li>Warga Jemaat yang sudah terdaftar di Kantor Majelis Jemaat, yaitu: 
                    <ol>
                        <li id="item-3-1-b-1">{{ $loop[11]['keterangan'] }}</li>
                        <li id="item-3-1-b-2">{{ $loop[12]['keterangan'] }}</li>
                        <li id="item-3-1-b-3">{{ $loop[13]['keterangan'] }}</li>
                        <li id="item-3-1-b-4">{{ $loop[14]['keterangan'] }}</li>
                        <li id="item-3-1-b-5">{{ $loop[15]['keterangan'] }}</li>
                        <li id="item-3-1-b-6">{{ $loop[16]['keterangan'] }}</li>
                    </ol>
                </li>
            </ol>
        </p>
    </section>
    <section class="docs-section" id="item-3-2">
        <h2 class="section-heading">{{ $loop[17]['pasal'] }}</h2>
        <p>
            Tanggung Jawab Warga Jemaat<br>
            {{ $loop[17]['keterangan'] }}
        </p>
    </section>
    <section class="docs-section" id="item-3-3">
        <h2 class="section-heading">3.3</h2>
        <p>
            Hak dan Kewajiban Warga Jemaat
            <ol style="list-style-type:lower-alpha">
                <li id="item-3-3-a">{{ $loop[18]['keterangan'] }}
                    Warga Sidi Jemaat berhak:
                    <ol>
                        <li id="item-3-3-a-1">{{ $loop[19]['keterangan'] }}</li>
                        <li id="item-3-3-a-2">{{ $loop[20]['keterangan'] }}</li>
                        <li id="item-3-3-a-3">{{ $loop[21]['keterangan'] }}</li>
                        <li id="item-3-3-a-4">{{ $loop[22]['keterangan'] }}</li>
                    </ol>
                </li>
                <li id="item-3-3-b">Warga Sidi Jemaat berkewajiban:
                    <ol>
                        <li id="item-3-3-b-1">{{ $loop[23]['keterangan'] }}</li>
                        <li id="item-3-3-b-2">{{ $loop[24]['keterangan'] }}</li>
                    </ol>
                </li>
            </ol>
        </p>
    </section>
</article>

<!-- <article class="docs-article" id="section-4">
    <header class="docs-header">
        <h1 class="docs-heading">Sanggah Amag{{-- <span class="docs-time">Last updated: 2019-06-01</span> --}}</h1>
        <section class="docs-intro">
            <p>
                Menu Sanggah AMAG berfungsi untuk melakukan sanggahan terkait dengan pengakuan produksi AMAG yang belum memiliki NIK. Untuk melakukan sanggahan AMAG dapat dilakukan dengan cara isi NIK dengan memilih “Pilih NIK” lalu pilih NIK yang merupakan pemilik dari produksi AMAG tersebut kemudian klik tombol Update. Akan muncul notifikasi di kanan atas apabila Sanggahan AMAG sudah berhasil diupdate.
            </p>
            <div class="centerTest mb-4">
                <img class="figure-img img-fluid shadow rounded" src="{{ url('assets_documentation/images/list_sanggah_amag.png') }}" alt=""/>
                <br>
                <span style="text-align: center">Menu Sanggah Amag</span>
            </div>
        </section>
    </header>
</article> -->

<!-- <article class="docs-article" id="section-5">
    <header class="docs-header">
        <h1 class="docs-heading">Performance Appraisal {{-- <span class="docs-time">Last updated: 2019-06-01</span> --}}</h1>
        <section class="docs-intro">
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius aut, sapiente sequi animi temporibus eum architecto provident consectetur est vero cupiditate magni placeat voluptatem! Inventore dolor nobis ullam suscipit eum?
            </p>
        </section>
    </header>
    <section class="docs-section" id="item-5-1">
        <h2 class="section-heading">Personal</h2>
        <p>
            Pada menu Personal berisi informasi Performance Appraisal user secara Year to Date pada tahun berjalan, apabila role user sebagai CBG Team Leader atau CBM Performance Appraisal Downlinernya juga bisa dilihat dengan cara pilih downlinernya lalu pilih periode tahunnya setelah itu klik tombol Download Pdf. Performance Appraisal user juga bisa di download dengan cara klik icon pdf di kanan atas.
        </p>
            <div class="centerTest mb-4">
                <img class="figure-img img-fluid shadow rounded" src="{{ url('assets_documentation/images/performance_appraisal_personal.png') }}" alt=""/>
                <br>
                <span style="text-align: center">Menu Performance Appraisal - Personal</span>
            </div>
    </section>
    <section class="docs-section" id="item-5-2">
        <h2 class="section-heading">Report Excel</h2>
        <p>
            Pada menu Report Excel user bisa download Detail Parameter Performance Appraisal secara Month to Date dan Year to Date dengan format Excel dengan cara pilih periode tahunnya setelah itu klik tombol Excel.
        </p>
        <div class="centerTest mb-4">
            <img class="figure-img img-fluid shadow rounded" src="{{ url('assets_documentation/images/performance_appraisal_create_report_excel.png') }}" alt=""/>
            <br>
            <span style="text-align: center">Menu Performance Appraisal - Report Excel</span>
        </div>
        <p>
            Apabila role user sebagai CBG Team Leader atau CBM Detail Parameter Performance Appraisal downlinernya juga ikut ditampilkan.
        </p>
        <div class="centerTest mb-4">
            <img class="figure-img img-fluid shadow rounded" src="{{ url('assets_documentation/images/performance_appraisal_report_excel.png') }}" alt=""/>
            <br>
            <span style="text-align: center">Menu Performance Appraisal - Report Excel Detail Parameter</span>
        </div>
    </section>
</article> -->

<!-- <article class="docs-article" id="section-6">
    <header class="docs-header">
        <h1 class="docs-heading">Account {{-- <span class="docs-time">Last updated: 2019-06-01</span> --}}</h1>
        <section class="docs-intro">
            <p>
                <i>Account</i> atau <i>user</i> atau pengguna merupakan orang yang menggunakan sistem. Pengguna yang terdaftar dalam SCS akan memiliki User ID yang akan digunakan sebagai identitas dan harus dicantumkan/ di <i>input</i> setiap kali mengakses SCS.
            </p>
        </section>
        <h5 class="mt-3"><a href="" style="text-decoration: none">#</a> Pendaftaran Baru </h5>
        <p>
            Untuk pengguna yang baru bergabung (tercatat di data HRD), pengguna tidak perlu melaporkan untuk didaftarkan ke dalam sistem SCS. NIK akan didaftarkan secara otomatis oleh sistem, apabila NIK tersebut sudah memiliki target dari masing - masing parameter. Sehingga tidak perlu didaftarkan/ dilaporkan ke CBG. Apabila pengguna sudah merasa memiliki target, namun terdapat kendala tidak dapat mengakses SCS silahkan menghubungi CBG. 
        </p>
    </header>

    <section class="docs-section" id="item-6-1">
        <h2 class="section-heading">Login</h2>
        <p>
            <ul>
                <li>Buka browser Chrome (<i>recommended</i>) atau Mozilla Firefox</li>
                <li>Ketikkan url berikut <a class="theme-link" href="https://portal2/cbg" data-toggle="tooltip" title="Login" data-placement="right" target="_blank">https://portal2/cbg</a></li>
                <li>Input User ID atau NIK (angka 0 didepan boleh diketik atau tidak) pada kolom NIK</li>
                <li>Input password pada kolom password</li>
                <li>Khusus pengguna baru, password defaultnya adalah: <b>P@ssw0rd</b></li>
            </ul>
        </p>
    </section>
        

    <section class="docs-section" id="item-6-2">
        <h2 class="section-heading">Profile</h2>
        <p>
            Pada menu Profile user bisa melakukan perubahan alamat email dengan cara edit alamat email pada kolom yang telah disediakan, lalu klik tombol Update. Jika berhasil akan muncul notifikasi “Alamat Email Berhasil Di Update”.
            <br><br>
            Selain itu menu Profile juga berisi informasi data profile user beserta Downliner periode bulan sebelumnya (diatas tanggal 25 data downliner akan terupdate menjadi posisi bulan berjalan)
        </p>
        <div class="centerTest mb-4">
            <img class="figure-img img-fluid shadow rounded" src="{{ url('assets_documentation/images/profile.png') }}" alt=""/>
            <br>
            <span style="text-align: center">Menu Account - Profile</span>
        </div>
    </section>

    <section class="docs-section" id="item-6-3">
        <h2 class="section-heading">Change Password</h2>
        <p>
            Pasword merupakan sebuah perlindungan sistem. Pasword yang kuat sebaiknya mengandung setidaknya 1 huruf besar, 1 angka, 1 karakteristik dan minimal 8 karakter. <br>
            Ubah password anda bila: 
            <ul>
                <li>Pasword masih (<i>default</i>)</li>
                <li>Pasword belum pernah di ubah selama 3 bulan</li>
            </ul>
        </p>
        <div class="centerTest mb-4">
            <img class="figure-img img-fluid shadow rounded" src="{{ url('assets_documentation/images/change_password.png') }}" alt=""/>
            <br>
            <span style="text-align: center">Menu Account - Change Password</span>
        </div>
    </section>

    <section class="docs-section" id="item-6-4">
        <h2 class="section-heading">Logout</h2>
        <p>
            Klik menu Logout untuk keluar dari halaman SCS.
        </p>
    </section>
</article> -->

    <button id='scroll-to-top'><i class="fa fa-arrow-up"></i></button>



<script>
    function scrollToTop() {
  $("html, body").animate({ scrollTop: 0 }, 400);
  return false;
}

function toggleScrollToTopButton() {
  var threshold = 200;
  if ($(window).scrollTop() > threshold) {
    $("#scroll-to-top").fadeIn("slow");
  } else {
    $("#scroll-to-top").fadeOut("slow");
  }
}

$(document).ready(function() {
  $("#scroll-to-top").click(scrollToTop);
  $(window).scroll(toggleScrollToTopButton);
  $('[data-toggle="tooltip"]').tooltip();   

});



</script>

@endsection