@extends('admin-layout.main')
@section('title', 'Home')
@section('subtitle', 'Home')

@section('content')
<div class="card card-outline card-info">
    <div class="card-header">
        <h3 class="card-title">Tabel Data </h3>
        <div class="card-tools">
            <a href="#" class="btn btn-sm btn-tool" data-toggle="tooltip" title="Export Excel">
                <i class="fas fa-file-excel" style="font-size:24px;color:seagreen"></i>
            </a>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="example1" class="table table-bordered table-striped dataTables_filter">
                <thead>
                    <tr>
                        <th style="width: 1%">No</th>
                        <th>Nama Lengkap</th>
                        <th>Nama Keluarga</th>
                        <th>Tgl Lahir</th>
                        <th>Phone</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($jemats as $jemat)
                        @if(explode('-', $jemat->tgl_lahir)[1].explode('-', $jemat->tgl_lahir)[2] == explode('-', $dt)[1].explode('-', $dt)[2])
                            <tr class="bg-info">
                        @else
                    <tr>
                        @endif
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $jemat->nama_lengkap }}</td>
                        <td>{{ $jemat->nama_keluarga }}</td>
                        <td>{{ $jemat->tgl_lahir }}</td>
                        <td>{{ $jemat->handphone }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection