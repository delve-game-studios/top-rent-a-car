<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', __('site.TITLE'))</title>

    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400" rel="stylesheet">
    <link rel="icon" type="image/png" href="{{ asset('/assets/front/img/favicon-32x32.png') }}" sizes="32x32" />
    <link rel="icon" type="image/png" href="{{ asset('/assets/front/img/favicon-16x16.png') }}" sizes="16x16" />
@section('css')
    <link rel="stylesheet" href="{{ asset('/assets/front/css/vendor.css') }}?v={{ $version }}">
    <link rel="stylesheet" href="{{ asset('/assets/front/css/style.css') }}?v={{ $version }}">
@show
</head>
<body>
{{--@php(include('assets/svg/shapes.svg'))--}}

<div class="app-body">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-12">
                <nav class="navbar navbar-expand-md navbar-light align-items-center justify-content-between mt-4">
                    <a class="main-logo navbar-brand" href="{{route('index')}}">
                        <img src="{{ asset('/assets/front/svg/icon-logo-brand.svg') }}" width="40px" alt="BeTheBest">
                        <img src="{{ asset('/assets/front/svg/icon-logo-text.svg') }}" width="160px" alt="BeTheBest">
                    </a>

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse flex-grow-0" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('index') ? 'active' : '' }} nav-link-inpage text-uppercase px-2 font-weight-bold text-white" href="{{ route('index') }}">Home</a>
                            </li>
                            <li class="nav-item ml-md-5">
                                <a class="nav-link {{ request()->routeIs('front.all-images') ? 'active' : '' }} nav-link-inpage text-uppercase px-2 font-weight-bold text-white" href="{{ route('front.all-images') }}">All Images</a>
                            </li>
                            @auth
                                <li class="nav-item ml-md-5">
                                    <a class="nav-link {{ request()->routeIs('front.upload') ? 'active' : '' }} nav-link-inpage text-uppercase px-2 font-weight-bold text-white" href="{{ route('front.upload') }}">Upload Image</a>
                                </li>
                                <li class="nav-item ml-md-5">
                                    <a class="nav-link {{ request()->routeIs('logout') ? 'active' : '' }} nav-link-inpage text-uppercase px-2 font-weight-bold text-white" href="{{ route('logout') }}">Log Out</a>
                                </li>
                            @endauth
                            @guest
                                <li class="nav-item ml-md-5">
                                    <a class="nav-link {{ request()->routeIs('login') ? 'active' : '' }} nav-link-inpage text-uppercase px-2 font-weight-bold text-white" href="{{ route('login') }}">Login</a>
                                </li>
                                <li class="nav-item ml-md-5">
                                    <a class="nav-link {{ request()->routeIs('register') ? 'active' : '' }} nav-link-inpage text-uppercase px-2 font-weight-bold text-white" href="{{ route('register') }}">Register</a>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
@yield('content')
</div>
@section('js')
    <script src="{{ asset('/assets/js/vendor.js') }}?v={{ $version }}"></script>
    <script src="{{ asset('/assets/js/bundle.js') }}?v={{ $version }}"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    @if (env('APP_ENV') == 'local') <script src="http://localhost:35730/livereload.js?snipver=1"></script> @endif
@show
</body>
</html>
