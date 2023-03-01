@extends('admin-layout.main')
@section('title', 'Home')
@section('subtitle', 'Home')

@section('content')
{{-- skkl '$2y$10$2UmCAqlJAtJDxDl/CIKHVOxzPy1TyfXU5XyIpU0NSowOYOqS/aS4q' --}} 
    {{-- <div class="row">
        <div class="col-md-12 col-sm-12"> --}}
            <div class="card card-secondary">
                <div class="card-header">
                <h3 class="card-title">Form Biodata</h3>
                </div>
                <form role="form" method="POST" action="{{ route('jemat.update', $jemat->id) }}">
                    @method('patch')
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label>No Induk</label>
                                    <input type="text" class="form-control" id="" disabled value="{{ $jemat->no_induk }}">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label>Nama Keluarga</label>
                                        <input type="text" class="form-control" id="" disabled value="{{ $jemat->nama_keluarga }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label>Hubungan Keluarga</label>
                                    <input type="text" class="form-control" id="" disabled value="{{ $hub_kel }}">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input type="text" name="nama_lengkap" class="form-control @error('nama_lengkap') is-invalid @enderror" id="" placeholder="Nama Lengkap" value="{{ old('nama_lengkap') ?? $jemat->nama_lengkap ?? '' }}">
                                        @error('nama_lengkap')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label>Tempat Lahir</label>
                                    <input type="text" name="tempat_lahir" class="form-control @error('tempat_lahir') is-invalid @enderror" id="" placeholder="Tempat Lahir" value="{{ old('tempat_lahir') ?? $jemat->tempat_lahir ?? '' }}">
                                    @error('tempat_lahir')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label>Tanggal Lahir</label>
                                    <input type="text" name="tgl_lahir" id="date" class="form-control date @error('tgl_lahir') is-invalid @enderror" date="" data-date-format="yyyy-mm-dd" value="{{ old('tgl_lahir') ?? $jemat->tgl_lahir ?? '' }}" placeholder="Tanggal Baptis">
                                    @error('tgl_lahir')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label>Tempat Baptis</label>
                                    <input type="text" name="tempat_baptis" class="form-control @error('tempat_baptis') is-invalid @enderror" id="" placeholder="Tempat Baptis" value="{{ old('tempat_baptis') ?? $jemat->tempat_baptis ?? '' }}">
                                    @error('tempat_baptis')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label>Tanggal Baptis</label>
                                    <input type="text" name="tgl_baptis" id="date" class="form-control date @error('tgl_baptis') is-invalid @enderror" date="" data-date-format="yyyy-mm-dd" value="{{ old('tgl_baptis') ?? $jemat->tgl_baptis ?? '' }}" placeholder="Tanggal Baptis">
                                    @error('tgl_baptis')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label>Tempat Sidi</label>
                                    <input type="text" name="tempat_sidi" class="form-control @error('tempat_sidi') is-invalid @enderror" id="" placeholder="Tempat Sidi" value="{{ old('tempat_sidi') ?? $jemat->tempat_sidi ?? '' }}">
                                    @error('tempat_sidi')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label>Tanggal Sidi</label>
                                    <input type="text" name="tgl_sidi" id="date" class="form-control date @error('tgl_sidi') is-invalid @enderror" date="" data-date-format="yyyy-mm-dd" value="{{ old('tgl_sidi') ?? $jemat->tgl_sidi ?? '' }}" placeholder="Tanggal Baptis">
                                    @error('tgl_sidi')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label>Tanggal Menikah <code>(Gereja)</code></label>
                                    <input type="text" name="tgl_nikah_gereja" id="date" class="form-control date @error('tgl_nikah_gereja') is-invalid @enderror" date="" data-date-format="yyyy-mm-dd" value="{{ old('tgl_nikah_gereja') ?? $jemat->tgl_nikah_gereja ?? '' }}" placeholder="Tanggal Baptis">
                                    @error('tgl_nikah_gereja')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label>Tanggal Menikah <code>(Sipil)</code></label>
                                    <input type="text" name="tgl_nikah_sipil" id="date" class="form-control date @error('tgl_nikah_sipil') is-invalid @enderror" date="" data-date-format="yyyy-mm-dd" value="{{ old('tgl_nikah_sipil') ?? $jemat->tgl_nikah_sipil ?? '' }}" placeholder="Tanggal Baptis">
                                    @error('tgl_nikah_sipil')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label>Pendidikan Terakhir</label>
                                    <select name="pendidikan_terakhir" class="form-control select2bs4 @error('pendidikan_terakhir') is-invalid @enderror" style="width: 100%;">
                                        <option value="" disabled selected>== Pilih Pendidikan Terakhir ==</option>
                                        <option value="0">Belum/ Tidak Sekolah</option>
                                        @foreach ($pendidikan as $item)
                                            <option value="{{ $loop->iteration }}" {{ ($jemat->pendidikan_terakhir === $item) ? 'selected' : '' }}>{{ $item }}</option>
                                        @endforeach
                                    </select>
                                    @error('pendidikan_terakhir')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label>Golongan Darah</label>
                                    <select name="golongan_darah" class="form-control select2bs4 @error('golongan_darah') is-invalid @enderror" style="width: 100%;">
                                        <option value="" disabled selected>== Pilih Gol Darah ==</option>
                                        @foreach ($gol_dar as $gol)
                                            <option value="{{ $gol }}" @if ($jemat->golongan_darah === $gol) selected @endif>{{ $gol }}</option>
                                        @endforeach
                                    </select>
                                    @error('golongan_darah')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label>Jenis Kelamin</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="jenis_kelamin" value="L" {{ ($jemat->jenis_kelamin=="L")? "checked" : "" }}>
                                        <label class="form-check-label">Laki-laki</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="jenis_kelamin" value="P" {{ ($jemat->jenis_kelamin=="P")? "checked" : "" }}>
                                        <label class="form-check-label">Perempuan</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label>Sektor</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="sektor" value="1" {{ ($jemat->sektor=="1")? "checked" : "" }}>
                                        <label class="form-check-label">Sektor 1</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="sektor" value="2" {{ ($jemat->sektor=="2")? "checked" : "" }}>
                                        <label class="form-check-label">Sektor 2</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-info">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('script-select2')
    <script>
        $(function() {
            //Initialize Select2 Elements
            $('.select2').select2()
    
            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })
    
        })
    </script>
    @endpush

@endsection
