@extends('admin-layout.main')
@section('title', 'Home')
@section('subtitle', 'Home')

@section('content')
<div class="row">
    <div class="col-lg-3 col-6">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ $sum_ptMaleDwi }}</h3>
                <p>Dwi (laki-laki)</p>
            </div>
            <div class="icon">
                <i class="ion ion-male"></i>
            </div>
            {{-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <div class="small-box bg-success">
            <div class="inner">
                <h3>{{ $sum_ptFemaleDwi }}</h3>
                <p>Dwi (perempuan)</p>
            </div>
            <div class="icon">
                <i class="ion ion-female"></i>
            </div>
            {{-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <div class="small-box bg-warning">
            <div class="inner">
                <h3>{{ $sum_ptMaleEka }}</h3>
                <p>Eka (laki-laki)</p>
            </div>
            <div class="icon">
                <i class="ion ion-male"></i>
            </div>
            {{-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <div class="small-box bg-danger">
            <div class="inner">
                <h3>{{ $sum_ptFemaleEka }}</h3>
                <p>Eka (perempuan)</p>
            </div>
            <div class="icon">
                <i class="ion ion-female"></i>
            </div>
            {{-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
        </div>
    </div>
</div>



@endsection