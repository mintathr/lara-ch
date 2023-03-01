@extends('admin-layout.main')
@section('title', 'Profile')
@section('subtitle', 'Profile')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
                        @if($jemat->jenis_kelamin == 'P')
                        <img class="profile-user-img img-fluid img-circle"
                            src="{{ url('assets_admin/img/avatar_ladies.png') }}" alt="User profile picture">
                        @else
                        <img class="profile-user-img img-fluid img-circle"
                            src="{{ url('assets_admin/img/avatar_man.png') }}" alt="User profile picture">
                        @endif
                    </div>

                    <h3 class="profile-username text-center">{{ $jemat->nama_lengkap }}</h3>

                    <p class="text-muted text-center">{{ $jemat->nama_keluarga }}</p>

                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b>Status</b> <a class="float-right">{{ $hub_kel }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Pelkat</b> <a class="float-right">{{ $jemat->status_pelkat }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Sektor</b> <a class="float-right">{{ $jemat->sektor }}</a>
                        </li>
                    </ul>

                    {{-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> --}}
                </div>
            </div>

            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Lampiran File</h3>
                </div>
                <div class="card-body">
                    <ul class="list-unstyled">
                        @foreach($tempFiles as $item)
                        <li>
                            <a href="profile/download/{{ $item->filename }}" class="btn-link text-secondary" data-toggle="tooltip" data-placement="right" title="Download"><i class="fa fa-file-download"></i> {{ explode(" ", $item->filename)[1] }}</a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card card-outline card-danger">
                <div class="card-header p-2">
                    <h3 class="card-title">Data Keluarga</h3>

                </div><!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="width: 10px;">No</th>
                                <th>Nama</th>
                                <th>Hubungan Keluarga</th>
                                <th>Tanggal Lahir</th>
                                <th>Pelkat</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($family as $list)
                            <tr>
                                <td style="text-align: center;">{{ $loop->iteration }}</td>
                                <td>{{ $list->nama_lengkap }}</td>
                                <td>{{ $list->hubungan_keluarga }}</td>
                                <td>{{ $list->tgl_lahir }}</td>
                                <td>{{ $list->status_pelkat }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection