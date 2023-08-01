@extends('admin-layout.main_no_sidebar')
@section('title', 'IHMPT')
@section('subtitle', 'IHMPT')

@section('content')    
        <form role="form" method="POST" action="{{ route('absence.pelkat') }}">
            @csrf
        {{-- <div class="row row-cols-1 row-cols-md-3 mb-3 text-center"> --}}
            <input type="hidden" name="keterangan" value="pt">
            <div class="row">
                @foreach($pt_pengurus as $ptPengurus)
                <div class="col-lg-3 col-6 d-grid gap-2">
                    <input type="checkbox" name="jemat_id[]" value="{{ $ptPengurus['id'] }}" class="btn-check" id="btn-check-outlined{{ $ptPengurus['id'] }}">
                    <label class="btn btn-outline-primary" for="btn-check-outlined{{ $ptPengurus['id'] }}">{{ $ptPengurus['nama_lengkap'] }}</label><br>
                </div>
                @endforeach
            
                @foreach($pt_pelayan as $ptPelayan)
                <div class="col-lg-3 col-6 d-grid gap-2">
                    <input type="checkbox" name="jemat_id[]" value="{{ $ptPelayan['id'] }}" class="btn-check" id="btn-check-outlined{{ $ptPelayan['id'] }}">
                    <label class="btn btn-outline-primary" for="btn-check-outlined{{ $ptPelayan['id'] }}">{{ $ptPelayan['nama_lengkap'] }}</label><br>
                </div>
                @endforeach

                @foreach($pt_eka as $ptEka)
                <div class="col-lg-3 col-6 d-grid">
                    <input type="checkbox" name="jemat_id[]" value="{{ $ptEka['id'] }}" class="btn-check" id="btn-check-outlined{{ $ptEka['id'] }}">
                    <label class="btn btn-outline-primary" for="btn-check-outlined{{ $ptEka['id'] }}">{{ $ptEka['nama_lengkap'] }}</label><br>
                </div>
                @endforeach

            </div>
            
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

@endsection