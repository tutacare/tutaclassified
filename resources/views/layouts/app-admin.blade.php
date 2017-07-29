<!DOCTYPE html>
<html @yield('html', 'lang="en"')>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @yield('meta')
    <title>BETAWARAN</title>

    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>

    <!-- Styles -->
    <link href="/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    @yield('style')
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}
    <link href="{{ asset('/mytuta/css/footer.css') }}" rel="stylesheet">

    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>
</head>
<body id="app-layout">
    <nav class="navbar navbar-default navbar-static-top">
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
                    Betawaran
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/dashboard/admin') }}"><i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard</a></li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            <i class="fa fa-cubes" aria-hidden="true"></i> Kategori <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ url('/dashboard/admin/category') }}"><i class="fa fa-list" aria-hidden="true"></i> Kategori Utama</a></li>
                            <li><a href="{{ url('/dashboard/admin/sub-category') }}"><i class="fa fa-list-ul" aria-hidden="true"></i> Sub Kategori</a></li>
                        </ul>
                    </li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            <i class="fa fa-globe" aria-hidden="true"></i> Wilayah <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ url('/dashboard/admin/province') }}"><i class="fa fa-location-arrow" aria-hidden="true"></i> Provinsi</a></li>
                            <li><a href="{{ url('/dashboard/admin/city') }}"><i class="fa fa-map-marker" aria-hidden="true"></i> Kota</a></li>
                        </ul>
                    </li>

                    <li><a href="{{ url('/dashboard/admin/product') }}"><i class="fa fa-cube" aria-hidden="true"></i> Produk</a></li>
                    <li><a href="{{ url('/dashboard/admin/user') }}"><i class="fa fa-user" aria-hidden="true"></i> Pengguna</a></li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                <i class="fa fa-smile-o" aria-hidden="true"></i> {{ Auth::user()->name }} <span class="caret"></span>
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

    @yield('content')
    <footer class="footer hidden-print">
        <div class="container">
          <p class="text-muted">Betawaran.
          </p>
        </div>
      </footer>
    <!-- JavaScripts -->
    <script src="/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="/assets/bootstrap/js/bootstrap.min.js"></script>
    @yield('script')
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
    @yield('script')
</body>
</html>
