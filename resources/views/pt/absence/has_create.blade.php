@extends('admin-layout.main_no_sidebar')
@section('title', 'IHMPT')
@section('subtitle', 'IHMPT')

@section('content')


        
        {{-- <div class="row row-cols-1 row-cols-md-3 mb-3 text-center"> --}}
            <div class="alert alert-success" role="alert">
                <h4 class="alert-heading">Well done!</h4>
                <p>Absensi sudah dibuat.</p>
                <hr>
                <p class="mb-0">Total kehadiran pada tanggal {{ $tgl_ibadah }} sebanyak {{ $total }} orang.</p>
              </div>    

              <div class="row">
        <div class="cols-6">
        <div class="card card-outline card-danger">
                    <h3 class="card-header">Data Absence PT</h3>
                    <!-- <div class="card-tools">
                        <a href="#" class="btn btn-sm btn-tool" data-toggle="tooltip" title="Export Excel">
                            <i class="fas fa-file-excel" style="font-size:24px;color:seagreen"></i>
                        </a>
                    </div> -->
                
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
@endsection