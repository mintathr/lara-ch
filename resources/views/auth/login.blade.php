@extends('admin-layout.main_login')
@section('title', 'Login')
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
                    <input type="hidden" name="helper" value="08.01-01-">
                    <input type="text" name="email" class="form-control" placeholder="Nomor Jemaat" value="{{ old('email') }}">
                </div>
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