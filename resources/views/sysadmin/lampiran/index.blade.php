@extends('admin-layout.main')
@section('title', 'Home')
@section('subtitle', 'Home')

@section('content')

<div class="card card-outline card-info">
    <div class="card-header">
        <h3 class="card-title">Tabel Data  </h3>
        {{-- <div class="card-tools">
            <a href="#" class="btn btn-sm btn-tool" data-toggle="tooltip" title="Export Excel">
                <i class="fas fa-file-excel" style="font-size:24px;color:seagreen"></i>
            </a>
        </div> --}}
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th style="width: 1%">No</th>
                        <th>Nama File</th>
                        <th>Format</th>
                        <th>User Upload</th>
                        <th>#</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($docs as $doc)
                    @php 
                        $a = explode(" ", $doc->filename,2); 
                        $x = explode(".", $a[1]); 
                    @endphp
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $x[0] }}</td>
                        <td>{{ strtolower(end($x)) }}</td>
                        <td>{{ $doc->user->name }}</td>
                        <td>
                            <a href="lampiran/download/{{ $doc->filename }}" class="btn-link text-secondary" data-toggle="tooltip" data-placement="right" title="Download"><i class="fa fa-file-download"></i> </a>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
