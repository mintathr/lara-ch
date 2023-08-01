@extends('admin-layout.main')
@section('title', 'Search ')
@section('subtitle', 'Search ')

@section('content')
<div class="row">
<a href="{{ route('admin.jemat.hbd') }}" class="btn btn-app">
    <i class="fas fa-eye"></i> Cek Hbd
  </a>
</div>
<div class="row">
    <div class="col-md-4 col-sm-12">
        <div class="card card-outline card-info">
            <div class="card-header">
                <h3 class="card-title">Pencarian Berdasarkan Tanggal</h3>
            </div>
            <form role="form" method="GET" action="{{ route('admin.jemat.getSearchHbd') }}">
                @csrf
                <div class="card-body">
                    <div class="input-group input-group-sm">
                        <input type="text" name="tanggal_pencarian" class="form-control float-right" id="reservation2" value="{{ old('tanggal_pencarian') }}">
                        <span class="input-group-append">
                          <button type="submit" class="btn btn-info btn-flat">Cari!</button>
                        </span>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@if(isset($tanggal_pencarian))
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-check"></i> Data Ditemukan!</h5>
            Pencarian dari tanggal {{ date('d-M-Y', strtotime($dari_tgl)) }} s/d {{ date('d-M-Y', strtotime($sampai_tgl)) }}
    </div>
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="card card-outline card-danger">
                <div class="card-header">
                    <h3 class="card-title">Data HBD</h3>
                </div>
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>BoD</th>
                                <th>Nama</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($range_lahir as $hbd)
                                @if(explode('-', $hbd->tgl_lahir)[2] == explode('-', $dt)[2])
                                    <tr class="bg-info">
                                @else
                                <tr>
                                @endif
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ date('d-M-Y', strtotime($hbd->tgl_lahir)) }}</td>
                                <td>{{ $hbd->nama_pertama.' '.$hbd->nama_belakang }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-12">
            <div class="card card-outline card-secondary">
                <div class="card-header">
                    <h3 class="card-title">Data Marriage</h3>
                </div>
                <div class="card-body">
                    <table id="example5" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Nama</th>
                                <th>Marriage</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($range_nikah as $row)
                                @if(explode('-', $row->tgl_nikah_gereja)[2] == explode('-', $dt)[2])
                                    <tr class="bg-info">
                                @else
                                <tr>
                                @endif
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ date('d-M-Y', strtotime($row->tgl_nikah_gereja)) }}</td>
                                <td>{{ $row->nama_pertama.' '.$row->nama_belakang }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endif

@push('script-reserved')
<script type="text/javascript">
$(function() {

  $('input[name="tanggal_pencarian"]').daterangepicker({
      autoUpdateInput: false,
      locale: {
          cancelLabel: 'Clear'
      }
  });

  $('input[name="tanggal_pencarian"]').on('apply.daterangepicker', function(ev, picker) {
      $(this).val(picker.startDate.format('YYYY-MM-DD') + ' - ' + picker.endDate.format('YYYY-MM-DD'));
  });

  $('input[name="tanggal_pencarian"]').on('cancel.daterangepicker', function(ev, picker) {
      $(this).val('');
  });

});
</script>
@endpush

@endsection