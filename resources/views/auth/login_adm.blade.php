@extends('admin-layout.main_login')
@section('title', 'Login adm')
@section('subtitle', 'Login')
@section('content')

@push('css-login')
    <link rel="stylesheet" href="{{ url('assets_admin/css/build_login.css') }}">
    <style> 
    /* .mylogin {
        text-align: left !important;
        font-size: 12px !important;
        margin: 10px 15px 0 0 !important
    }  */
    a:link {
        color: #1a73e8 !important;
        text-decoration: none !important;
    }
    a:visited {
        color: #1a73e8;
        text-decoration: none !important;
    }
    a:hover {
        color: #1a73e8;
        text-decoration: none !important;
    }
    a:active {
        color: #1a73e8;
        text-decoration: underline;
    }
</style>
@endpush
<div class="login_wrapper" style="margin-right: 52px;margin-top: 90px;">
    <div class="animate form login_form">
        <section class="login_content">
           <!--  <img src="/assets_template/img/logo.png" style="width: 200px;"> -->

            @if(session('errors'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                Something it's wrong:
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            @if (Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
            @endif
            @if (Session::has('error'))
            <div class="alert alert-danger">
                {{ Session::get('error') }}
            </div>
            @endif
            
            <form action="{{ route('login') }}" method="post">
                <h1 class="mb-5">DBsystem</h1>
                @csrf
                <div>
                    <input type="text" name="email" class="form-control" placeholder="username" value="{{ old('email') }}">
                </div>
                <input type="password" name="password" class="form-control upass" placeholder="Password"> 
                <div>
                    
                    <input type="checkbox" class="flat_check"> Show Password
                </div>
                {{-- <div class="mylogin">
                    <ul>
                        <li>
                    <a href="" data-toggle="modal" data-target="#modal-lg">belum memiliki user login/ lupa Password?</a>
                        </li>
                        <li>
                            <a href=""> password masih ingat, namun akun terblokir?</a>
                        </li>
                    </ul>
                </div> --}}
                <div>
                    <br />
                    <button type="submit" name="submit_login" class="btn btn-primary">
                        <i class="fas fa-sign-in-alt"></i> &nbsp; SIGN IN
                    </button>
                </div>
            </form>
        </section>
    </div>

</div>


<div class="modal fade" id="modal-lg">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Pendaftaran User Tim Marketing CBG (AOP, AO UMUM, AO, TL, CBM)
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div style="text-align: center" class="modal-body">
                <p>Proses pendaftaran user Tim Marketing CBG (AOP, AO UMUM, AO, TL, CBM) dilakukan secara otomasi dengan syarat NIK yang bersangkutan terdaftar pada data Up-liner Aplikasi SCS.</p>
                <p>User Login Menggunakan : </p>
                <p>User ID : nik karyawan<br>
                Password : <b>P@ssw0rd</b>
                </p>
                <p>Jika NIK sudah terdaftar pada data Up-liner Aplikasi SCS namun tidak dapat Login, Lupa Password maka harap menghubungi Kantor Pusat Commercial Banking & Mortgage Group.</p>
            </div>
        </div>
    </div>
</div>




@push('script-show-pass')
<script type="text/javascript">
    $(document).ready(function() {
        $('.flat_check').click(function() {
            if ($(this).is(':checked')) {
                $('.upass').attr('type', 'text');
            } else {
                $('.upass').attr('type', 'password');
            }
        });
    });
</script>

@endpush

@endsection