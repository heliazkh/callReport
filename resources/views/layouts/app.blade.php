<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Plugin styles -->
    <link rel="stylesheet" href="{{ asset('vendors/bundle.css') }}" type="text/css">
    <!-- Datepicker -->
    <link rel="stylesheet" href="{{ asset('vendors/datepicker/daterangepicker.css') }}" type="text/css">
    <!-- select2 -->
    <link rel="stylesheet" href="{{ asset('vendors/select2/css/select2.min.css') }}" type="text/css">

    <!-- favicon -->
    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('assets/media/image/favicon/apple-icon-57x57.png') }}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('assets/media/image/favicon/apple-icon-60x60.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('assets/media/image/favicon/apple-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/media/image/favicon/apple-icon-76x76.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('assets/media/image/favicon/apple-icon-114x114.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('assets/media/image/favicon/apple-icon-120x120.png') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('assets/media/image/favicon/apple-icon-144x144.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('assets/media/image/favicon/apple-icon-152x152.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/media/image/favicon/apple-icon-180x180.png') }}">
    <link rel="icon" type="image/png" sizes="192x192"  href="{{ asset('assets/media/image/favicon/android-icon-192x192.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/media/image/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('assets/media/image/favicon/favicon-96x96.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/media/image/favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('assets/media/image/favicon/manifest.json') }}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{ asset('assets/media/image/favicon/ms-icon-144x144.png') }}">
    <meta name="theme-color" content="#ffffff">

    <!-- additional css -->
    @yield('additional_css')
    <!-- App styles -->
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/dpi.css') }}" type="text/css">
</head>
<body class="semi-dark @if(Request::is('login'))form-membership @else light-header sticky-footer @endif">
    @if(Request::is('login'))
        @yield('content')
    @else
        <!-- BEGIN SIDEBAR -->
        @include('layouts.aside')
        <!-- END SIDEBAR -->

        <!-- begin::main -->
        <div id="main">
            <!-- begin::header -->
            <div class="header">

                <!-- begin::header left -->
                <ul class="navbar-nav">

                    <!-- begin::navigation-toggler -->
                    <li class="nav-item navigation-toggler">
                        <a href="#" class="nav-link">
                            <i data-feather="menu"></i>
                        </a>
                    </li>
                    <!-- end::navigation-toggler -->

                    <!-- begin::header-logo -->
                    <li class="nav-item" id="header-logo">
                        <a href="index.html">
                            <img class="logo" src="{{ asset('assets/media/image/logo.png') }}" alt="logo">
                            <img class="logo-sm" src="{{ asset('assets/media/image/logo-sm.png') }}" alt="small logo">
                            <img class="logo-dark" src="{{ asset('assets/media/image/logo-dark.png') }}" alt="dark logo">
                        </a>
                    </li>
                    <!-- end::header-logo -->
                </ul>
                <!-- end::header left -->
            </div>
            <!-- end::header -->

            <!-- begin::main-content -->
            <div class="main-content">
                <!-- begin::container -->
                <div class="container">
                    <div class="page-header">
                        @if(Request::is('/'))
                            <div class="">خوش آمدید، <span class="text-primary">{{ $user->fullName }}</span></div>
                        @else
                            @include('layouts.breadcrumb')
                        @endif
                    </div>
                    @yield('content')
                </div>
                <!-- end::container -->
            </div>
            <!-- end::main-content -->

            <!-- begin::footer -->
            <footer>
                    <div class="container">
                        <div></div>
                        <div>
                            Powered by Helia Zolfkhani
                        </div>
                    </div>
                </footer>
            <!-- end::footer -->
        </div>
        <!-- end::main -->
    @endif

    <!-- Plugin scripts -->
    <script src="{{ asset('vendors/bundle.js') }}"></script>
    <!-- Datepicker -->
    <script src="{{ asset('vendors/datepicker/daterangepicker.js') }}"></script>
    <!-- Javascript -->
    <script src="{{ asset('vendors/select2/js/select2.min.js') }}"></script>
    <!-- additional js -->
    @yield('additional_js')
    <!-- App scripts -->
    <script src="{{ asset('assets/js/app.js') }}"></script>
    <script src="{{ asset('assets/js/dpi.js') }}"></script>
</body>
</html>
