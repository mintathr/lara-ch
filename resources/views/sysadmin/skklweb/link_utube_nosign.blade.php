<!DOCTYPE html>
<html>

<head>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <!--Import materialize.css-->
    <link type="text/css" href="{{ url('assets_skklweb/css/materialize.min.css') }}" media="screen,projection"
        rel="stylesheet">

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body>
    <div class="container">
        <nav>
            <div class="nav-wrapper">
                <a href="#" class="brand-logo center">Logo</a>
                <!-- <ul id="nav-mobile" class="left hide-on-med-and-down">
            <li><a href="sass.html">Sass</a></li>
            <li><a href="badges.html">Components</a></li>
            <li><a href="collapsible.html">JavaScript</a></li>
          </ul> -->
            </div>
        </nav>

        <div class="row">
            <h4>Form form</h4>
            <form role="form" class="col s12" method="POST"
                action="{{ route('web.linkutubeUpdate', ['id' => $utube->id]) }}">
                @method('patch')
                @csrf
                <div class="row">
                    <div class="input-field col s12">
                        <input id="linkUtube" type="text" name="link_utube" class="validate"
                            value="{{ $utube->link_utube }}" />
                        <label for="linkUtube">Link Utube</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="keterangan" type="text" name="keterangan" class="validate"
                            value="{{ $utube->keterangan }}" />
                        <label for="keterangan">Keterangan</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="subHeader" type="text" name="sub_header" class="validate"
                            value="{{ $utube->sub_header }}" />
                        <label for="subHeader">Sub Header</label>
                    </div>
                </div>

                <button class="btn waves-effect waves-light" type="submit" name="action">
                    Submit
                    <i class="material-icons right">send</i>
                </button>
            </form>
        </div>
    </div>
    <!--Import jQuery before materialize.js-->
    {{-- <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script> --}}
    <script type="text/javascript" src="{{ url('assets_skklweb/js/jquery-3.4.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('assets_skklweb/js/materialize.min.js') }}"></script>
</body>

</html>