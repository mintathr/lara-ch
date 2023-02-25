@extends('admin-layout.main')
@section('title', 'Home')
@section('subtitle', 'Home')

@section('content')

<div class="card card-outline card-info">
    <div class="card-header">
        <h3 class="card-title">Tabel Data  </h3>
        <div class="card-tools">
            <a href="#" class="btn btn-sm btn-tool" data-toggle="tooltip" title="Export Excel">
                <i class="fas fa-file-excel" style="font-size:24px;color:seagreen"></i>
            </a>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th style="width: 1%">No</th>
                        <th>ID</th>
                        <th>Nama Lengkap</th>
                        <th>Nama Keluarga</th>
                        {{-- <th>Pelkat</th> --}}
                        <th>tgl_lahir</th>
                        <th>tgl_nikah_gereja</th>
                        <th>#</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($jemats as $jemat)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $jemat->no_induk }}</td>
                        <td>{{ $jemat->nama_lengkap }}</td>
                        <td>{{ $jemat->nama_keluarga }}</td>
                        {{-- <td>{{ $jemat->status_pelkat }}</td> --}}
                        <td>{{ $jemat->tgl_lahir }}</td>
                        <td>{{ $jemat->tgl_nikah_gereja ?? 'belum menikah' }}</td>
                        <td>
                            <a href="{{ route('admin.jemat.edit', [Crypt::encryptString($jemat->id)]) }}" class="btn btn-info">Edit</a>

                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection