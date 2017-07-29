<!DOCTYPE html>
<html @yield('html', 'lang="en"')>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="/ico/apple-touch-icon-57-precomposed.png">
    <link rel="shortcut icon" href="/assets/ico/favicon.png">
    <title>@yield('title', 'BETAWARAN - Tawar Menawar Disini Aja')</title>
  	<meta name="description" content="@yield('description', 'BETAWARAN.COM menyediakan media yang mudah, cepat dan gratis bagi para penjual untuk memasang iklan dan sekaligus bagi pembeli untuk mencari beragam produk barang bekas dan barang baru untuk kebutuhan sehari-hari.')">
  	<meta name="author" content="@yield('author', 'Mitra Abadi Sentosa')">
  	<meta name="Copyright" content="DIGITAL TUTA NETWORK - mytuta.com" />
    <meta property="fb:app_id" content="129533750785170">
    @yield('meta_facebook')
    @section('image_source')<link rel="image_src" href="{{url('/betawaran/imgsocial.jpg')}}" />@show
    <!-- Bootstrap core CSS -->
    <link href="/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    {{-- <link href="{{ elixir('css/all.css') }}" rel="stylesheet"> --}}

    <!-- Custom styles for this template -->
    <link href="/assets/css/style.css" rel="stylesheet">


    <!-- styles needed for carousel slider -->
    <link href="/assets/css/owl.carousel.css" rel="stylesheet">
    <link href="/assets/css/owl.theme.css" rel="stylesheet">

    @yield('style')
    <!-- Just for debugging purposes. -->
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <!-- include pace script for automatic web page progress bar  -->
    <script>
        paceOptions = {
            elements: true
        };
    </script>
    <script src="/assets/js/pace.min.js"></script>

</head>
<body>
<div id="wrapper">

    <div class="header">
        <nav class="navbar   navbar-site navbar-default" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
                        <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span
                            class="icon-bar"></span> <span class="icon-bar"></span></button>
                    <a href="/" class="navbar-brand logo logo-title">
                        <!-- Original Logo will be placed here  -->
                        <img src="/betawaran/logo.png">
                         </a></div>
                <div class="navbar-collapse collapse">

                    <ul class="nav navbar-nav navbar-right">
                      @if (Auth::guest())
                        <li><a href="/login">Login</a></li>
                        <li><a href="/register">Daftar</a></li>
                      @else
                      <li><a href="{{ url('/logout') }}">Logout <i class="glyphicon glyphicon-off"></i></a></li>
                          <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <span>{{ Auth::user()->name }}</span> <i class="icon-user fa"></i> <i
                                class=" icon-down-open-big fa"></i></a>
                            <ul class="dropdown-menu user-menu">
                              @if(Auth::user()->role == 'admin')
                              <li><a href="{{ url('/dashboard/admin') }}">Admin Panel</a></li>
                              <li class="divider"></li>
                              @endif
                              <li><a href="{{ url('/user/profile') }}"><i class="icon-home"></i> Profil</a></li>
                            </ul>
                        </li>
                      @endif
                        <li class="postadd"><a class="btn btn-block btn-border btn-post btn-danger"
                                               href="/post-ads"><i class="fa fa-btn fa-plus"></i> Pasang Produk</a></li>
                    </ul>
                </div>
                <!--/.nav-collapse -->
            </div>
            <!-- /.container-fluid -->
        </nav>
    </div>
    <!-- /.header -->

@yield('content')


    <div class="footer" id="footer">
        <div class="container">
            <ul class=" pull-left navbar-link footer-nav">
                <li><a href="/"> Beranda </a> <a href="/about-us"> Tentang Kami </a> <a href="/term"> Aturan dan Kebijakan </a> <a href="/contact-us"> Kontak Kami </a> <a
                        href="#"> &trade;MYTUTA.COM v{{Config::get('version.version')}}</a>
            </ul>
            <ul class=" pull-right navbar-link footer-nav">
                <li> &copy; 2016 MITRA ABADI SENTOSA</li>
            </ul>
        </div>

    </div>
    <!-- /.footer -->
</div>
<!-- /.wrapper -->

<!-- Le javascript
================================================== -->

<!-- Placed at the end of the document so the pages load faster -->

<script src="/bower_components/jquery/dist/jquery.min.js"></script>
<script src="/assets/bootstrap/js/bootstrap.min.js"></script>
{{-- <script src="{{ elixir('js/all.js') }}"></script> --}}
@yield('post-ads')

@yield('script')

<!-- include carousel slider plugin  -->
<script src="/assets/js/owl.carousel.min.js"></script>

<!-- include equal height plugin  -->
<script src="/assets/js/jquery.matchHeight-min.js"></script>

<!-- include jquery list shorting plugin plugin  -->
<script src="/assets/js/hideMaxListItem.js"></script>

<!-- include jquery.fs plugin for custom scroller and selecter  -->
<script src="/assets/plugins/jquery.fs.scroller/jquery.fs.scroller.js"></script>
<script src="/assets/plugins/jquery.fs.selecter/jquery.fs.selecter.js"></script>


<!-- include custom script for site  -->
<script src="/assets/js/script.js"></script>
<!-- include jquery autocomplete plugin  -->

<script type="text/javascript" src="/assets/plugins/autocomplete/jquery.mockjax.js"></script>
<script type="text/javascript" src="/assets/plugins/autocomplete/jquery.autocomplete.js"></script>
<script type="text/javascript" src="/assets/plugins/autocomplete/usastates.js"></script>

<script type="text/javascript" src="/assets/plugins/autocomplete/autocomplete-demo.js"></script>

@include('layouts.js.js')
</body>
</html>
