@extends('admin-layout.main_no_sidebar')
@section('title', 'IHMPT')
@section('subtitle', 'IHMPT')

@section('content')


        <form role="form" method="POST" action="{{ route('absence.pelkat') }}">
            @csrf
        {{-- <div class="row row-cols-1 row-cols-md-3 mb-3 text-center"> --}}
            <input type="hidden" name="keterangan" value="pa">
            <div class="row">
                @foreach($pa_pengurus as $paPengurus)
                <div class="col-lg-3 col-6 d-grid gap-2">
                    <input type="checkbox" name="jemat_id[]" value="{{ $paPengurus['id'] }}" class="btn-check" id="btn-check-outlined{{ $paPengurus['id'] }}">
                    <label class="btn btn-outline-success" for="btn-check-outlined{{ $paPengurus['id'] }}">{{ $paPengurus['nama_lengkap'] }}</label><br>
                </div>
                @endforeach
            
                @foreach($pa_pelayan as $paPelayan)
                <div class="col-lg-3 col-6 d-grid gap-2">
                    <input type="checkbox" name="jemat_id[]" value="{{ $paPelayan['id'] }}" class="btn-check" id="btn-check-outlined{{ $paPelayan['id'] }}">
                    <label class="btn btn-outline-success" for="btn-check-outlined{{ $paPelayan['id'] }}">{{ $paPelayan['nama_lengkap'] }}</label><br>
                </div>
                @endforeach

                @foreach($anggota_pa as $anggotaPa)
                <div class="col-lg-3 col-6 d-grid">
                    <input type="checkbox" name="jemat_id[]" value="{{ $anggotaPa['id'] }}" class="btn-check" id="btn-check-outlined{{ $anggotaPa['id'] }}">
                    <label class="btn btn-outline-success" for="btn-check-outlined{{ $anggotaPa['id'] }}">{{ $anggotaPa['nama_lengkap'] }}</label><br>
                </div>
                @endforeach

            </div>
            
            <button type="submit" class="btn btn-success">Submit</button>
        </form>

@endsection