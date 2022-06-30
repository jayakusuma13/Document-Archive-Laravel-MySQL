<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Penyimpanan Arsip Digital</title>

    <!-- Styles -->
    <link href="/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="/css/jquery.dataTables.css" rel="stylesheet">
    <link href="/css/dataTables.bootstrap.css" rel="stylesheet">
    <link href="/css/selectize.css" rel="stylesheet">
    <link href="/css/paper.css" rel="stylesheet">
    <link href="/css/selectize.bootstrap3.css" rel="stylesheet">
</head>
<body>
    <div id="app">
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
                        {{--  {{ config('app.name', 'AplikasiReport') }}  --}}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                      @if (Auth::check())
                        <li><a href="{{ url('/home') }}">Dashboard</a></li>
                      @endif

                      @role('admin')
                        <li><a href="{{ route('perusahaan.index') }}">Data Perusahaan</a></li>
                        <li><a href="{{ route('laporan.index') }}">Laporan</a></li>
                        <li><a href="{{ action('PerusahaanController@kontak') }}">Contact Dev</a></li>
                      @endrole

                      @role('member')
                        <li><a href="{{ action('HomeController@edit') }}">Data Perusahaan</a></li>
                      @endrole
                      
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ url('login') }}">Login</a></li>
                            <li><a href="{{ url('/register') }}">Daftar</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
        @include('layouts._flash')
        @yield('content')
        
    </div>
    <footer class="footer hidden-print">
        <div class="container">
            <span class="text-muted">Developed by<a href="#"><strong>Jayakusuma</strong></a></span>
        </div>
    </footer>
    <!-- Scripts -->
    <script src="/js/jquery-3.2.1.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/jquery.dataTables.min.js"></script>
    <script src="/js/dataTables.bootstrap.min.js"></script>
    <script src="/js/custom.js"></script>
    <script src="/js/selectize.min.js"></script>
    @yield('scripts')
</body>
</html>
