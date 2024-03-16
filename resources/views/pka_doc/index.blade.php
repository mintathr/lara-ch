@extends('pka-layout.main')
@section('title', 'Table PKA')

@section('content')
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Data Tables</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Tabel Rencana PKA</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-12">
        <div class="card recent-sales overflow-auto">
            <div class="card-body">
              <h5 class="card-title">Datatables Rencana PKA 2024 - 2025</h5>
              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <!-- <th>
                      <b>N</b>o
                    </th> -->
                    <th>Kode PKA</th>
                    <th>Komisi</th>
                    <th>Nama Program</th>
                    <!-- <th>Tujuan</th> -->
                    <th>PJP</th>
                    <!-- <th>Penopang Program</th> -->
                    <!-- <th>Waktu</th> -->
                    <!-- <th>Tempat</th> -->
                    <!-- <th>Frekuensi</th>
                    <th>Kualitatif</th>
                    <th>Kuantitatif</th>
                    <th>Penerimaan</th>
                    <th>Pengeluaran</th>
                    <th>Keterangan</th> -->
                    <th>Detail</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($pkadocs as $pkadoc)
                    <tr>
                    <!-- <td>{{ $loop->iteration }}</td> -->
                    <td>{{ $pkadoc->no_pka }}</td>
                    <td>{{ $pkadoc->sheet_komisi }}</td>
                    <td>{{ $pkadoc->nama_program }}</td>
                    <!-- <td>{{ $pkadoc->tujuan }}</td> -->
                    <td>{{ $pkadoc->pjp }}</td>
                    <!-- <td>{{ $pkadoc->penopang_program }}</td> -->
                    <!-- <td>{{ $pkadoc->waktu }}</td> -->
                    <!-- <td>{{ $pkadoc->tempat }}</td> -->
                    <!-- <td>{{ $pkadoc->frekuensi }}</td>
                    <td>{{ $pkadoc->kualitatif }}</td>
                    <td>{{ $pkadoc->kuantitatif }}</td>
                    <td style="text-align: right;">{{ $pkadoc->penerimaan }}</td>
                    <td style="text-align: right;">{{ $pkadoc->pengeluaran }}</td>
                    <td>{{ $pkadoc->keterangan }}</td> -->
                    <td>
                        <a href="{{ route('pka.show', [$pkadoc->no_pka]) }}" class="btn btn-info btn-sm">Show</a>
                    </td>

                </tr>
                @endforeach
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

          </div>
        </div>
        </div>
      </div>
    </section>

  </main><!-- End #main -->
@endsection