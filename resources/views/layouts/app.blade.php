<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Solaz Spa</title>

    <!-- Bootstrap -->
    <link href="{{ URL::asset('bootstrap-3.3.7/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('bootstrap-3.3.7/css/bootstrap-theme.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('submenu/bootstrap-submenu.min.css') }}" rel="stylesheet">

             <!-- Latest compiled and minified CSS -->
             {{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
                 integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">--}}
             <!-- Optional theme -->
             {{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
                 integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">--}}

             <!-- Kendo styles -->
             <link href="{{ \Illuminate\Support\Facades\URL::asset('kendoui/styles/kendo.common.min.css') }}" rel="stylesheet" type="text/css" />
             <link href="{{ \Illuminate\Support\Facades\URL::asset('kendoui/styles/kendo.default.min.css') }}" rel="stylesheet" type="text/css" />

             <!-- Fonts -->
             <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
             <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>

             <style>
                 body {
                     font-family: 'Lato';
                 }

        .fa-btn {
            margin-right: 6px;
        }
    </style>
    <!-- JavaScripts -->
    {{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>--}}
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>--}}

    <script src="{{ \Illuminate\Support\Facades\URL::asset('kendoui/js/jquery.min.js') }}"></script>
    <!-- Latest compiled and minified JavaScript -->
    {{--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
     integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>--}}

    <script src="{{ URL::asset('bootstrap-3.3.7/js/bootstrap.min.js') }}"></script>
    <script src="{{ \Illuminate\Support\Facades\URL::asset('kendoui/js/kendo.web.min.js') }}"></script>
    <script src="{{ \Illuminate\Support\Facades\URL::asset('js/bootbox.min.js') }}"></script>


</head>
<body id="app-layout">
    <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    Solaz Spa
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/home') }}">Home</a></li>
                    <li><a href="{{ url('/book') }}">Book</a></li>
                        {{-- for System and Branch Admin menu only --}}
                        @if(Auth::check() && (Auth::user()->isSystemAdmin() || Auth::user()->isBranchAdmin()))
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    User <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="{{ url('/register-user') }}">Register</a> </li>
                                    <li><a href="{{ url('/list-user') }}">List</a> </li>
                                </ul>
                            </li>
                        @endif
                        {{-- END: for System and Branch Admin menu only --}}

                        {{-- for System Admin menu only --}}
                        @if(Auth::check() && Auth::user()->isSystemAdmin())
                            {{--
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    Branch <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="{{ url('/register-branch') }}">Register</a> </li>
                                    <li><a href="{{ url('/list-branch') }}">List</a> </li>
                                </ul>
                            </li>
                            --}}
                            <li><a href="{{ url('/services') }}">Services</a></li>
                        @endif
                        {{-- END: for System Admin menu only --}}

                        {{-- for Branch Admin menu only --}}
                        @if(Auth::check() && Auth::user()->isBranchAdmin())
                            <li><a href="{{ url('/receipts') }}">Receipts</a></li>
                        @endif
                        {{-- END: for Branch Admin menu only --}}

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest() || !Auth::check())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        {{--<li><a href="{{ url('/register') }}">Register</a></li>--}}
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
    </div>
</nav>

<div class="container">
    <div class="row">
        <div class="col col-md-10 col-md-offset-1">
            <div class="flash-message">
                @foreach(['danger', 'warning', 'success', 'info'] as $msg)
                    @if(\Illuminate\Support\Facades\Session::has('alert-' . $msg))
                        <p class="alert alert-{{ $msg }}">
                            {{ \Illuminate\Support\Facades\Session::get('alert-' . $msg) }}
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        </p>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</div>

@yield('content')

</body>
</html>
