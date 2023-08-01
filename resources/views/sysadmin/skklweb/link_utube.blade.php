@extends('admin-layout.main')
@section('title', 'Link Utube')
@section('subtitle', 'Link Utube')

@section('content')
<div class="card card-danger">
    <div class="card-header">
        <h3 class="card-title">Form Link Utube</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form role="form" method="POST" action="{{ route('admin.web.linkutubeUpdate', ['id' => $utube->id]) }}">
        @method('patch')
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label>Link Utube</label>
                <input type="text" class="form-control" name="link_utube" value="{{ $utube->link_utube }}">
            </div>
            <div class="form-group">
                <label>Keterangan</label>
                <input type="text" class="form-control" name="keterangan" value="{{ $utube->keterangan }}">
            </div>
            <div class="form-group">
                <label>Sub Header</label>
                <input type="text" class="form-control" name="sub_header" value="{{ $utube->sub_header }}">
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
</div>
@endsection
