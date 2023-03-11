@extends('admin-layout.main')
@section('title', 'Cek HBD')
@section('subtitle', 'Cek HBD')

@section('content')
<div class="row">
<a href="{{ route('admin.jemat.searchHbd') }}" class="btn btn-app">
    <i class="fas fa-search"></i> Search
  </a>
</div>
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="card card-outline card-info">
                <div class="card-header">
                    <h3 class="card-title">BoD Periode {{ $from_sunday_date.' '.$from_month_id .' to '. $to_saturday_date.' '.$to_month_id }}</h3>
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>BoD</th>
                                <th>Nama</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cekHbd as $hbd)
                                @if(explode('-', $hbd->tgl_lahir)[2] == explode('-', $dt)[2])
                                    <tr class="bg-info">
                                @else
                                <tr>
                                @endif
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ date('d-m-Y', strtotime($hbd->tgl_lahir)) }}</td>
                                <td>{{ $hbd->nama_lengkap }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-sm-12">
            <div class="card card-outline card-danger">
                <div class="card-header">
                    <h3 class="card-title">Marriage Periode {{ $from_sunday_date.' '.$from_month_id .' to '. $to_saturday_date.' '.$to_month_id }}</h3>
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Nama</th>
                                <th>Marriage</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cekMarriage as $row)
                                @if(explode('-', $row->tgl_nikah_gereja)[2] == explode('-', $dt)[2])
                                    <tr class="bg-info">
                                @else
                                <tr>
                                @endif
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $row->nama_lengkap }}</td>
                                <td>{{ $row->tgl_nikah_gereja }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection