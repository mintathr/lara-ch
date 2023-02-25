@extends('admin-layout.main')
@section('title', 'Home')
@section('subtitle', 'Home')

@section('content')

<div class="row">
  <div class="col-md-6">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Demografi</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th style="width: 10px">#</th>
              <th>Pelkat</th>
              <th>Laki-laki</th>
              <th>Perempuan</th>
              <th>Total</th>
              {{-- <th style="width: 40px">(%)</th> --}}
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>PKLU</td>
              <td style="text-align: right">{{ $sum_pkluMaleUsers }}</td>
              <td style="text-align: right">{{ $sum_pkluFemaleUsers }}</td>
              <td style="text-align: right">{{ $sum_pkluMaleUsers+$sum_pkluFemaleUsers }}</td>
              {{-- <td style="text-align: right"><span class="badge bg-danger">{{ $sumAll/($sum_pkluMaleUsers+$sum_pkluFemaleUsers) }} %</span></td> --}}
            </tr>
            <tr>
              <td>2</td>
              <td>PKB</td>
              <td style="text-align: right">{{ $sum_pkbMaleUsers }}</td>
              <td style="text-align: right">-</td>
              <td style="text-align: right">{{ $sum_pkbMaleUsers }}</td>
              {{-- <td style="text-align: right"><span class="badge bg-danger">{{ $sumAll/($sum_pkbMaleUsers) }}</span></td> --}}
            </tr>
            <tr>
              <td>3</td>
              <td>PKP</td>
              <td style="text-align: right">-</td>
              <td style="text-align: right">{{ $sum_pkpFemaleUsers }}</td>
              <td style="text-align: right">{{ $sum_pkpFemaleUsers }}</td>
              {{-- <td style="text-align: right"><span class="badge bg-danger">{{ $sumAll/($sum_pkpFemaleUsers) }}</span></td> --}}
            </tr>
            <tr>
              <td>4</td>
              <td>GP</td>
              <td style="text-align: right">{{ $sum_gpMaleUsers }}</td>
              <td style="text-align: right">{{ $sum_gpFemaleUsers }}</td>
              <td style="text-align: right">{{ $sum_gpMaleUsers+$sum_gpFemaleUsers }}</td>
              {{-- <td style="text-align: right"><span class="badge bg-danger">{{ $sumAll/($sum_gpMaleUsers+$sum_gpFemaleUsers) }}</span></td> --}}
            </tr>
            <tr>
              <td>5</td>
              <td>PT</td>
              <td style="text-align: right">{{ $sum_ptMaleUsers }}</td>
              <td style="text-align: right">{{ $sum_ptFemaleUsers }}</td>
              <td style="text-align: right">{{ $sum_ptMaleUsers+$sum_ptFemaleUsers }}</td>
              {{-- <td style="text-align: right"><span class="badge bg-danger">{{ $sumAll/($sum_ptMaleUsers+$sum_ptFemaleUsers) }}</span></td> --}}
            </tr>
            <tr>
                <td>6</td>
                <td>PA</td>
                <td style="text-align: right">{{ $sum_paMaleUsers }}</td>
                <td style="text-align: right">{{ $sum_paFemaleUsers }}</td>
                <td style="text-align: right">{{ $sum_paMaleUsers+$sum_paFemaleUsers }}</td>
                {{-- <td style="text-align: right"><span class="badge bg-danger">{{ $sumAll/($sum_paMaleUsers+$sum_paFemaleUsers) }}</span></td> --}}
              </tr>
            <tr>
                <td colspan="2">Total</td>
                <td style="text-align: right">{{ $sum_pkluMaleUsers+$sum_pkbMaleUsers+$sum_gpMaleUsers+$sum_ptMaleUsers }}</td>
                <td style="text-align: right">{{ $sum_pkluFemaleUsers+$sum_pkpFemaleUsers+$sum_gpFemaleUsers+$sum_ptFemaleUsers }}</td>
                <td style="text-align: right">{{ $sum_pkluMaleUsers+$sum_pkbMaleUsers+$sum_gpMaleUsers+$sum_ptMaleUsers+$sum_pkluFemaleUsers+$sum_pkpFemaleUsers+$sum_gpFemaleUsers+$sum_ptFemaleUsers }}</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

  </div>
</div>

@endsection