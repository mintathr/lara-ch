@extends('pka-layout.main')
@section('title', 'Detail RPKA')

@section('content')
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Detail RPKA</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('pka.index') }}">Table RPKA</a></li>
          <li class="breadcrumb-item active">Detail Rencana PKA</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
        
        <div class="card">
            <div class="card-body">
              <h5 class="card-title">KOMISI {{ $pkadoc->sheet_komisi }} <span>| Kode PKA {{ $pkadoc->no_pka }}</span></h5>
              <table class="table">
                <tbody>
                <tr>
                    <th scope="row">Nama Program</th>
                    <td>{{ $pkadoc->nama_program }}</td>
                  </tr>
                  <tr>
                    <th scope="row">Tujuan</th>
                    <td>{{ $pkadoc->tujuan }}</td>
                  </tr>
                  <tr>
                    <th scope="row">PJP</th>
                    <td>{{ $pkadoc->pjp }}</td>
                  </tr>
                  <tr>
                    <th scope="row">Penopang Program</th>
                    <td>{{ $pkadoc->penopang_program }}</td>
                  </tr>
                  <tr>
                    <th scope="row">Waktu</th>
                    <td>{{ $pkadoc->waktu }}</td>
                  </tr>
                  <tr>
                    <th scope="row">Tempat</th>
                    <td>{{ $pkadoc->tempat }}</td>
                  </tr>
                  <tr>
                    <th scope="row">Frekuensi</th>
                    <td>{{ $pkadoc->frekuensi }}</td>
                  </tr>
                  <tr>
                    <th scope="row">Kualitatif</th>
                    <td>{{ $pkadoc->kualitatif }}</td>
                  </tr>
                  <tr>
                    <th scope="row">Kuantitatif</th>
                    <td>{{ $pkadoc->kuantitatif }}</td>
                  </tr>
                  <tr>
                    <th scope="row">Penerimaan</th>
                    <td>{{ $pkadoc->penerimaan }}</td>
                  </tr>
                  <tr>
                    <th scope="row">Pengeluaran</th>
                    <td>{{ $pkadoc->pengeluaran }}</td>
                  </tr>
                  <tr>
                    <th scope="row">Keterangan</th>
                    <td>{{ $pkadoc->keterangan }}</td>
                  </tr>
                </tbody>
              </table>
             <a href="{{ route('pka.index') }}" class="btn btn-default btn-sm"> <i class="bi bi-backspace-fill" style="font-size:36px;"></i>
             </a>
            </div>
        </div>
        </div>
      </div>
    </section>

  </main><!-- End #main -->
@endsection