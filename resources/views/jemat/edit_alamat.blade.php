@extends('admin-layout.main')
@section('title', 'Edit Alamat')
@section('subtitle', 'Edit Alamat')

@section('content')
{{-- skkl '$2y$10$2UmCAqlJAtJDxDl/CIKHVOxzPy1TyfXU5XyIpU0NSowOYOqS/aS4q' --}} 
    {{-- <div class="row">
        <div class="col-md-12 col-sm-12"> --}}
            <div class="card card-info">
                <div class="card-header">
                <h3 class="card-title">Edit Alamat</h3>
                </div>
                <form role="form" method="POST" action="{{ route('jemat.update.alamat', $data->id) }}">
                    @method('patch')
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label>Nama Keluarga</label>
                                    <input type="text" disabled class="form-control" value="{{ $data->nama_keluarga }}">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label>Kota</label>
                                    <select name="regency_id" id="regency_id" class="form-control select2bs4 @error('regency_id') is-invalid @enderror" style="width: 100%;">
                                        <option value="" disabled selected>== Pilih Kota/ Kabupaten ==</option>
                                        <!-- <option value="{{ $data->regency_id }}" {{ $data->regency_id ?  'selected':'' }}>{{ $data->regency->name }}</option> -->
                                        @foreach ($regencies as $key => $value)
                                         <!-- <option value="{{ $key }}" {{ $data->regency_id==$key ?  'selected':'' }}>{{ $value }}</option> -->
                                        <option value="{{ $key }}" {{ (old("regency_id") == $key ? "selected":"") }}>{{ $value }}</option>
                                        @endforeach
                                    </select>
                                    @error('regency_id')
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
                                    <label>Kecamatan</label>
                                    <select name="district_id" id="district_id" class="form-control select2bs4 @error('district_id') is-invalid @enderror" data-selected-subcategory="{{ old('district_id') }}" style="width: 100%;">
                                        <option value="">== Pilih Kecamatan ==</option>
                                        <option value="{{ $data->district_id }}" {{ $data->district_id ?  'selected':'' }}>{{ $data->district->name }}</option>
                                    </select>
                                    @error('district_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label>Kelurahan</label>
                                    <select name="village_id" id="village_id" class="form-control select2bs4 @error('village_id') is-invalid @enderror" data-selected-subcategory="{{ old('village_id') }}" style="width: 100%;">
                                        <option value="">== Pilih Kelurahan ==</option>
                                        <option value="{{ $data->village_id }}" {{ $data->village_id ?  'selected':'' }}>{{ $data->village->name }}</option>
                                    </select>
                                    @error('village_id')
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
                                    <label>Alamat Tempat Tinggal</label>
                                    <textarea type="text" name="alamat" id="alamat" rows="3" class="form-control @error('alamat') is-invalid @enderror" oninput="this.value=this.value.replace(/[^A-Za-z0-9 ]/g,'');" placeholder="Alamat Tempat Tinggal">{{ $data->alamat }}</textarea>
                                    @error('alamat')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
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
    <script type="text/javascript">
        jQuery(document).ready(function() {
            jQuery('select[name="regency_id"]').on('change', function() {
                var regencyID = jQuery(this).val();
                if (regencyID) {
                    jQuery.ajax({
                        url: "../getDistricts/" + regencyID,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            console.log(data);
                            jQuery('select[name="district_id"]').empty();
                            jQuery.each(data, function(key, value) {
                                $('select[name="district_id"]').append('<option value="' + key + '">' + value + '</option>');
                            });
                            /* // take subcategory value which has been selected in data attribute 
                            var subCategoryVal = $("#district").attr("data-selected-subcategory");
                            if (subCategoryVal !== '') {
                                // assign chosen data attribute value to select
                                $("#district").val(subCategoryVal);
                            } */
                        }
                    });
                } else {
                    $('select[name="district_id"]').empty();
                }
            });
            jQuery('select[name="district_id"]').on('change', function() {
                var districtID = jQuery(this).val();
                if (districtID) {
                    jQuery.ajax({
                        url: '../getVillages/' + districtID,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            console.log(data);
                            jQuery('select[name="village_id"]').empty();
                            jQuery.each(data, function(key, value) {
                                $('select[name="village_id"]').append('<option value="' + key + '">' + value + '</option>');
                            });
                        }
                    });
                } else {
                    $('select[name="village_id"]').empty();
                }
            });
        });
    </script>
    
    <script>
        $(document).ready(function() {
            var OldValue = "{{ old('regency_id') }}";
            if (OldValue !== '') {
                $('#regencyID').val(OldValue);
                // this will load subcategories once you set the category value
                $("#regencyID").change();
            }
        });
    </script>

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
