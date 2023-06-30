@extends('admin-layout.main')
@section('title', 'Search ')
@section('subtitle', 'Search ')

@section('content')
<div class="row">
    <div class="col-md-4 col-sm-12">
        <div class="card card-outline card-info">
            <div class="card-header">
                <h3 class="card-title">Report Absence</h3>
            </div>
            <form role="form" method="GET" action="{{ route('absence.search.pa') }}">
                @csrf
                <input type="hidden" name="keterangan" value="pt">
                <div class="card-body">
                    <div class="input-group input-group-sm">
                        <input type="text" name="tanggal_pencarian" class="form-control float-right" id="reservation2" value="{{ old('tanggal_pencarian') }}" placeholder="Pilih Tanggal">
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
            Pencarian dari tanggal {{ date('d-M-Y', strtotime($fromDate)) }} s/d {{ date('d-M-Y', strtotime($toDate)) }}
    </div>
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="card card-outline card-danger">
                <div class="card-header">
                    <h3 class="card-title">Data Absence PT</h3>
                    <div class="card-tools">
                        <a href="#" class="btn btn-sm btn-tool" data-toggle="tooltip" title="Export Excel">
                            <i class="fas fa-file-excel" style="font-size:24px;color:seagreen"></i>
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Tanggal</th>
                                <th>Nama</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($absences as $absence)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $absence->tgl_ibadah }}</td>
                                    <td>{{ $absence->jemat->nama_lengkap }}</td>
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
      $(this).val(picker.startDate.format('YYYY-MM-DD') + '/' + picker.endDate.format('YYYY-MM-DD'));
  });

  $('input[name="tanggal_pencarian"]').on('cancel.daterangepicker', function(ev, picker) {
      $(this).val('');
  });

});
</script>
@endpush

@endsection