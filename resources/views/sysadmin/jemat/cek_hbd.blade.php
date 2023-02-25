@extends('admin-layout.main')
@section('title', 'Home')
@section('subtitle', 'Home')

@section('content')

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
                                <th>Nama</th>
                                <th>BoD</th>
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
                                <td>{{ $hbd->nama_lengkap }}</td>
                                <td>{{ $hbd->tgl_lahir }}</td>
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