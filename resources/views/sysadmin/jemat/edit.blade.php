@extends('admin-layout.main')
@section('title', 'Home')
@section('subtitle', 'Home')

@section('content')
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Data Jemaat</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" method="POST" action="{{ route('admin.jemat.update', ['id' => $id]) }}">
                @method('patch')
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label>Nama Keluarga</label>
                                <input type="text" class="form-control" disabled value="{{ $jemat->nama_keluarga }}">
                            </div>
                            <div class="form-group">
                                <label>Tempat Lahir</label>
                                <input type="text" name="tempat_lahir" class="form-control" id="reservation" placeholder="Tempat Lahir" value="{{ $jemat->tempat_lahir }}">
                            </div>
                            <div class="form-group">
                                <label>Tempat Baptis</label>
                                <input type="text" class="form-control" name="tempat_baptis" id="reservation" placeholder="Tempat Baptis" value="{{ $jemat->tempat_baptis }}">
                            </div>
                            <div class="form-group">
                                <label>Tempat Sidi</label>
                                <input type="text" class="form-control" name="tempat_sidi" id="reservation" placeholder="Tempat Sidi" value="{{ $jemat->tempat_sidi }}">
                            </div>
                            <div class="form-group">
                                <label>Tgl Nikah (Gereja)</label>
                                <input type="text" name="tgl_nikah_gereja" id="date" class="form-control date" date="" data-date-format="yyyy-mm-dd" placeholder="Tanggal Nikah (Gereja)" value="{{ $jemat->tgl_nikah_gereja }}">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" name="nama_lengkap" class="form-control" value="{{ $jemat->nama_lengkap }}">
                                </div>
                                <div class="form-group">
                                    <label>Tgl Lahir</label>
                                    <input type="text" name="tgl_lahir" id="date" class="form-control date" date="" data-date-format="yyyy-mm-dd" placeholder="Tanggal Invoice" value="{{ $jemat->tgl_lahir }}">
                                </div>
                                <div class="form-group">
                                    <label>Tgl Baptis</label>
                                    <input type="text" name="tgl_baptis" id="date" class="form-control date" date="" data-date-format="yyyy-mm-dd" placeholder="Tanggal Baptis" value="{{ $jemat->tgl_baptis }}">
                                </div>
                                <div class="form-group">
                                    <label>Tgl sidi</label>
                                    <input type="text" name="tgl_sidi" id="date" class="form-control date" date="" data-date-format="yyyy-mm-dd" placeholder="Tanggal Sidi" value="{{ $jemat->tgl_sidi }}">
                                </div>
                                <div class="form-group">
                                    <label>Tgl Nikah (Sipil)</label>
                                    <input type="text" name="tgl_nikah_sipil" id="date" class="form-control date @error('tgl_nikah_sipil') is-invalid @enderror" date="" data-date-format="yyyy-mm-dd" placeholder="Tanggal Nikah (Sipil)" value="{{ $jemat->tgl_nikah_sipil }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    


@endsection