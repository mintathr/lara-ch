@extends('pka-layout.main')
@section('title', 'Dashboard')

@section('content')
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item active"><a href="{{ route('pka.dashboard') }}">Dashboard</a></li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">
        <div class="col-12">
        
        <div class="card overflow-auto">
            <div class="card-body">
              <h5 class="card-title">Rekap Data</h5>
              <!-- Bordered Table -->
              <table class="table table-bordered">
                <tbody>
                <tr>
                    <th scope="col" rowspan="2" style="vertical-align:middle;text-align: center;">KOMISI</th>
                    <th scope="col" style="text-align: center;" colspan="2">RUTIN</th>
                    <th scope="col" style="text-align: center;" colspan="2">NON RUTIN</th>
                    <th scope="col" style="text-align: center;" colspan="2">PROYEK</th>
                    <th scope="col" style="text-align: center;" colspan="2">TOTAL</th>
                  </tr>
                  <tr>
                    <td style="text-align: center;">PENERIMAAN</td>
                    <td style="text-align: center;">PENGELUARAN</td>
                    <td style="text-align: center;">PENERIMAAN</td>
                    <td style="text-align: center;">PENGELUARAN</td>
                    <td style="text-align: center;">PENERIMAAN</td>
                    <td style="text-align: center;">PENGELUARAN</td>
                    <td style="text-align: center;">PENERIMAAN</td>
                    <td style="text-align: center;">PENGELUARAN</td>
                  </tr>
                  <tr>
                    <th scope="row">TPG</th>
                    <td style="text-align: right;">{{ number_format($tpg_rutin_penerimaan) }}</td>
                    <td style="text-align: right;">{{ number_format($tpg_rutin_pengeluaran) }}</td>
                    <td style="text-align: right;">{{ number_format($tpg_non_rutin_penerimaan) }}</td>
                    <td style="text-align: right;">{{ number_format($tpg_non_rutin_pengeluaran) }}</td>
                    <td style="text-align: right;">{{ number_format($tpg_proyek_penerimaan) }}</td>
                    <td style="text-align: right;">{{ number_format($tpg_proyek_pengeluaran) }}</td>
                    <td style="text-align: right;">{{ number_format($tpg_rutin_penerimaan+$tpg_non_rutin_penerimaan+$tpg_proyek_penerimaan) }}</td>
                    <td style="text-align: right;">{{ number_format($tpg_rutin_pengeluaran+$tpg_non_rutin_pengeluaran+$tpg_proyek_pengeluaran) }}</td>
                  </tr>
                  <tr>
                    <th scope="row">PELKES</th>
                    <td style="text-align: right;">?</td>
                    <td>?</td>
                    <td>?</td>
                    <td>?</td>
                    <td>?</td>
                    <td>?</td>
                    <td>?</td>
                    <td>?</td>
                  </tr>
                  <tr>
                    <th scope="row">GERMASA</th>
                    <td>?</td>
                    <td>?</td>
                    <td>?</td>
                    <td>?</td>
                    <td>?</td>
                    <td>?</td>
                    <td>?</td>
                    <td>?</td>
                  </tr>
                  <tr>
                    <th scope="row">PPSDI</th>
                    <td>?</td>
                    <td>?</td>
                    <td>?</td>
                    <td>?</td>
                    <td>?</td>
                    <td>?</td>
                    <td>?</td>
                    <td>?</td>
                  </tr>
                  <tr>
                    <th scope="row">PEG</th>
                    <td>?</td>
                    <td>?</td>
                    <td>?</td>
                    <td>?</td>
                    <td>?</td>
                    <td>?</td>
                    <td>?</td>
                    <td>?</td>
                  </tr>
                  <tr>
                    <th scope="row">IL</th>
                    <td>?</td>
                    <td>?</td>
                    <td>?</td>
                    <td>?</td>
                    <td>?</td>
                    <td>?</td>
                    <td>?</td>
                    <td>?</td>
                  </tr>
                  <tr>
                    <th scope="row" rowspan="2" style="vertical-align: middle;text-align:center;">TOTAL</th>
                    <td>?</td>
                    <td>?</td>
                    <td>?</td>
                    <td>?</td>
                    <td>?</td>
                    <td>?</td>
                    <td>?</td>
                    <td>?</td>
                  </tr>
                  <tr>
                    <th colspan="6" style="text-align: right;">GRAND TOTAL</th>
                    <td>?</td>
                    <td>?</td>
                  </tr>
                </tbody>
              </table>
              <!-- End Bordered Table -->

          
            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->
@endsection