@extends('admin-layout.main')
@section('title', 'Pelayan Pengurus PT')
@section('subtitle', 'Pelayan & Pengurus PT')

@section('content')
{{-- <form role="form" method="POST" action="{{ route('pt.pengurus.post') }}">
@foreach($jemats as $jemat)
    @csrf
<input type="text" name="nama_lengkap[]" value="{{ \Str::slug($jemat->nama_lengkap) }}">

@endforeach
<button type="submit" class="btn btn-info">Update</button> 

</button> --}}
<h3>Pelayan PT</h3>
<div class="row">
    @foreach($pelayanPt as $jemat)
    <div class="col-lg-3 col-6">
        <div class="card">
        <img src="{{ url('assets_admin/img/avatar_man.png') }}" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">{{ $jemat['nama_pertama']. ' ' .$jemat['nama_belakang'] }}</h5>
            <p class="card-text">{{ $jemat['handphone'] }}</p>
        </div>
        </div>
    </div>
    @endforeach
</div>

<h3>Pengurus PT</h3>
<div class="row">
    @foreach($pengurusPt as $jemat)
    <div class="col-lg-3 col-6">
        <div class="card">
        <img src="{{ url('assets_admin/img/avatar_man.png') }}" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">{{ $jemat['nama_pertama']. ' ' .$jemat['nama_belakang'] }}</h5>
            <p class="card-text">{{ $jemat['handphone'] }}</p>
        </div>
        </div>
    </div>
    @endforeach
</div>


<!-- <div class="row">
    <div class="col-lg-6 col-12">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h3 class="card-title">Tabel Data </h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="width: 1%">No</th>
                                <th>Kaka Layan</th>
                                <th>Phone</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pelayanPt as $jemat)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $jemat['nama_lengkap'] }}</td>
                                    <td>{{ $jemat['handphone'] }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-12">
        <div class="card card-outline card-danger">
            <div class="card-header">
                <h3 class="card-title">Tabel Data </h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th style="width: 1%">No</th>
                                <th>Kaka Pengurus</th>
                                <th>Phone</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pengurusPt as $jemat)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $jemat['nama_lengkap'] }}</td>
                                    <td>{{ $jemat['handphone'] }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div> -->
@endsection