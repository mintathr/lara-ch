@extends('admin-layout.main')
@section('title', 'Upload')
@section('subtitle', 'Upload')

@section('content')

@push('css-filepond')
    <link href="{{ url('assets_admin/filepond/filepond.css') }}" rel="stylesheet" />
@endpush

<div class="row">
    <div class="col-md-6 col-sm-12">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">
                    Upload Lampiran<br>
                    <small>Pastikan nama file sesuai dengan isi dokumen</small>
                </h3>
                {{-- <div class="card-tools">
                    <a href="" class="btn btn-sm btn-tool" data-toggle="tooltip" title="Template Sanggah">
                        <i class="fas fa-download"></i>
                    </a>
                </div> --}}
            </div>
            <form role="form" method="POST" action="">
                @csrf
                <div class="card-body pad">
                    <div class="form-group">
                        <label for="customFile">Upload File | PDF | JPG <br><small>Max 10 file | Pastikan file terbaca </small></label>
                        <input type="file" class="filepond @error('fileUpload') is-invalid @enderror" name="fileUpload" id="fileUpload" multiple data-max-file-size="5MB" data-max-files="10">
                        @error('fileUpload')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="card-footer">
                    <button onclick="window.location.href='{{ route('admin.lampiran') }}';" type="button" class="btn btn-default float-right">Tabel</button>
                </div>
            </form>
        </div>
    </div>

</div>



@push('script-filepond')
    <script src="{{ url('assets_admin/filepond/filepond.js') }}"></script>
    <script src="{{ url('assets_admin/filepond/filepond-plugin-file-validate-type.js') }}"></script>
    <script src="{{ url('assets_admin/filepond/filepond-plugin-file-validate-size.min.js') }}"></script>
<script>
    // Register the plugin (max size yg diijinkan)
    FilePond.registerPlugin(FilePondPluginFileValidateSize);
    
    // validate type file
    FilePond.registerPlugin(FilePondPluginFileValidateType);

        // Get a reference to the file input element
        const inputElement = document.querySelector('input[id="fileUpload"]');

        // Create a FilePond instance
        const pond = FilePond.create(inputElement);

        FilePond.setOptions({
            allowFileSizeValidation: true,
                maxFileSize: "2MB",
                acceptedFileTypes: [
                    'image/jpeg',
                    'image/png',
                    'application/pdf',
                    'application/zip',
                    'application/x-zip',
                    'application/x-zip-compressed',
                    'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                ],
   
            server: {
                  /*url: '/upload',*/
                  process: {
                    url: `{{ route('admin.lampiran.upload.store') }}`,
                  },
                /* process: '/process', */
                revert: {
                    url: `{{ route('admin.lampiran.upload.delete') }}`,
                },
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    
                }

            }
    
        });



        




    </script>
@endpush

@endsection