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
                    <td style="text-align: right;">{{ number_format($pelkes_rutin_penerimaan) }}</td>
                    <td style="text-align: right;">{{ number_format($pelkes_rutin_pengeluaran) }}</td>
                    <td style="text-align: right;">{{ number_format($pelkes_non_rutin_penerimaan) }}</td>
                    <td style="text-align: right;">{{ number_format($pelkes_non_rutin_pengeluaran) }}</td>
                    <td style="text-align: right;">{{ number_format($pelkes_proyek_penerimaan) }}</td>
                    <td style="text-align: right;">{{ number_format($pelkes_proyek_pengeluaran) }}</td>
                    <td style="text-align: right;">{{ number_format($pelkes_rutin_penerimaan+$pelkes_non_rutin_penerimaan+$pelkes_proyek_penerimaan) }}</td>
                    <td style="text-align: right;">{{ number_format($pelkes_rutin_pengeluaran+$pelkes_non_rutin_pengeluaran+$pelkes_proyek_pengeluaran) }}</td>
                  </tr>
                  <tr>
                    <th scope="row">GERMASA</th>
                    <td style="text-align: right;">{{ number_format($germasa_rutin_penerimaan) }}</td>
                    <td style="text-align: right;">{{ number_format($germasa_rutin_pengeluaran) }}</td>
                    <td style="text-align: right;">{{ number_format($germasa_non_rutin_penerimaan) }}</td>
                    <td style="text-align: right;">{{ number_format($germasa_non_rutin_pengeluaran) }}</td>
                    <td style="text-align: right;">{{ number_format($germasa_proyek_penerimaan) }}</td>
                    <td style="text-align: right;">{{ number_format($germasa_proyek_pengeluaran) }}</td>
                    <td style="text-align: right;">{{ number_format($germasa_rutin_penerimaan+$germasa_non_rutin_penerimaan+$germasa_proyek_penerimaan) }}</td>
                    <td style="text-align: right;">{{ number_format($germasa_rutin_pengeluaran+$germasa_non_rutin_pengeluaran+$germasa_proyek_pengeluaran) }}</td>
                  </tr>
                  <tr>
                    <th scope="row">PPSDI</th>
                    <td style="text-align: right;">{{ number_format($ppsdi_rutin_penerimaan) }}</td>
                    <td style="text-align: right;">{{ number_format($ppsdi_rutin_pengeluaran) }}</td>
                    <td style="text-align: right;">{{ number_format($ppsdi_non_rutin_penerimaan) }}</td>
                    <td style="text-align: right;">{{ number_format($ppsdi_non_rutin_pengeluaran) }}</td>
                    <td style="text-align: right;">{{ number_format($ppsdi_proyek_penerimaan) }}</td>
                    <td style="text-align: right;">{{ number_format($ppsdi_proyek_pengeluaran) }}</td>
                    <td style="text-align: right;">{{ number_format($ppsdi_rutin_penerimaan+$ppsdi_non_rutin_penerimaan+$ppsdi_proyek_penerimaan) }}</td>
                    <td style="text-align: right;">{{ number_format($ppsdi_rutin_pengeluaran+$ppsdi_non_rutin_pengeluaran+$ppsdi_proyek_pengeluaran) }}</td>
                  </tr>
                  <tr>
                    <th scope="row">PEG</th>
                    <td style="text-align: right;">{{ number_format($peg_rutin_penerimaan) }}</td>
                    <td style="text-align: right;">{{ number_format($peg_rutin_pengeluaran) }}</td>
                    <td style="text-align: right;">{{ number_format($peg_non_rutin_penerimaan) }}</td>
                    <td style="text-align: right;">{{ number_format($peg_non_rutin_pengeluaran) }}</td>
                    <td style="text-align: right;">{{ number_format($peg_proyek_penerimaan) }}</td>
                    <td style="text-align: right;">{{ number_format($peg_proyek_pengeluaran) }}</td>
                    <td style="text-align: right;">{{ number_format($peg_rutin_penerimaan+$peg_non_rutin_penerimaan+$peg_proyek_penerimaan) }}</td>
                    <td style="text-align: right;">{{ number_format($peg_rutin_pengeluaran+$peg_non_rutin_pengeluaran+$peg_proyek_pengeluaran) }}</td>
                  </tr>
                  <tr>
                    <th scope="row">IL</th>
                    <td style="text-align: right;">{{ number_format($il_rutin_penerimaan) }}</td>
                    <td style="text-align: right;">{{ number_format($il_rutin_pengeluaran) }}</td>
                    <td style="text-align: right;">{{ number_format($il_non_rutin_penerimaan) }}</td>
                    <td style="text-align: right;">{{ number_format($il_non_rutin_pengeluaran) }}</td>
                    <td style="text-align: right;">{{ number_format($il_proyek_penerimaan) }}</td>
                    <td style="text-align: right;">{{ number_format($il_proyek_pengeluaran) }}</td>
                    <td style="text-align: right;">{{ number_format($il_rutin_penerimaan+$il_non_rutin_penerimaan+$il_proyek_penerimaan) }}</td>
                    <td style="text-align: right;">{{ number_format($il_rutin_pengeluaran+$il_non_rutin_pengeluaran+$il_proyek_pengeluaran) }}</td>
                  </tr>
                  <tr>
                    <th scope="row" rowspan="2" style="vertical-align: middle;text-align:center;">TOTAL</th>
                    <td style="text-align: right;">{{ number_format($tpg_rutin_penerimaan+$pelkes_rutin_penerimaan+$germasa_rutin_penerimaan+$ppsdi_rutin_penerimaan+$peg_rutin_penerimaan+$il_rutin_penerimaan) }}</td>
                    <td style="text-align: right;">{{ number_format($tpg_rutin_pengeluaran+$pelkes_rutin_pengeluaran+$germasa_rutin_pengeluaran+$ppsdi_rutin_pengeluaran+$peg_rutin_pengeluaran+$il_rutin_pengeluaran) }}</td>
                    <td style="text-align: right;">{{ number_format($tpg_non_rutin_penerimaan+$pelkes_non_rutin_penerimaan+$germasa_non_rutin_penerimaan+$ppsdi_non_rutin_penerimaan+$peg_non_rutin_penerimaan+$il_non_rutin_penerimaan) }}</td>
                    <td style="text-align: right;">{{ number_format($tpg_non_rutin_pengeluaran+$pelkes_non_rutin_pengeluaran+$germasa_non_rutin_pengeluaran+$ppsdi_non_rutin_pengeluaran+$peg_non_rutin_pengeluaran+$il_non_rutin_pengeluaran) }}</td>
                    <td style="text-align: right;">{{ number_format($tpg_proyek_penerimaan+$pelkes_proyek_penerimaan+$germasa_proyek_penerimaan+$ppsdi_proyek_penerimaan+$peg_proyek_penerimaan+$il_proyek_penerimaan) }}</td>
                    <td style="text-align: right;">{{ number_format($tpg_proyek_pengeluaran+$pelkes_proyek_pengeluaran+$germasa_proyek_pengeluaran+$ppsdi_proyek_pengeluaran+$peg_proyek_pengeluaran+$il_proyek_pengeluaran) }}</td>
                    <th style="vertical-align:middle;text-align: right;" rowspan="2">
                    {{ number_format($tpg_rutin_penerimaan+$tpg_non_rutin_penerimaan+$tpg_proyek_penerimaan+$pelkes_rutin_penerimaan+$pelkes_non_rutin_penerimaan+$pelkes_proyek_penerimaan+$germasa_rutin_penerimaan+$germasa_non_rutin_penerimaan+$germasa_proyek_penerimaan+$ppsdi_rutin_penerimaan+$ppsdi_non_rutin_penerimaan+$ppsdi_proyek_penerimaan+$peg_rutin_penerimaan+$peg_non_rutin_penerimaan+$peg_proyek_penerimaan+$il_rutin_penerimaan+$il_non_rutin_penerimaan+$il_proyek_penerimaan) }}
                    </th>
                    <th style="vertical-align:middle;text-align: right;" rowspan="2">
                    {{ number_format($tpg_rutin_pengeluaran+$tpg_non_rutin_pengeluaran+$tpg_proyek_pengeluaran+$pelkes_rutin_pengeluaran+$pelkes_non_rutin_pengeluaran+$pelkes_proyek_pengeluaran+$germasa_rutin_pengeluaran+$germasa_non_rutin_pengeluaran+$germasa_proyek_pengeluaran+$ppsdi_rutin_pengeluaran+$ppsdi_non_rutin_pengeluaran+$ppsdi_proyek_pengeluaran+$peg_rutin_pengeluaran+$peg_non_rutin_pengeluaran+$peg_proyek_pengeluaran+$il_rutin_pengeluaran+$il_non_rutin_pengeluaran+$il_proyek_pengeluaran) }}
                    </th>
                  </tr>
                  <tr>
                    <th colspan="6" style="text-align: right;">GRAND TOTAL</th>
                    
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