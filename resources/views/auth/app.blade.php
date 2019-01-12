<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'Window Well Experts')</title>
    <meta name="description" content="@yield('description', '')"/>

    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Oswald:400,700" rel="stylesheet">

    {{--<link rel="icon" type="image/png" href="{{ asset('/assets/front/img/favicon-32x32.png') }}" sizes="32x32" />--}}
    {{--<link rel="icon" type="image/png" href="{{ asset('/assets/front/img/favicon-16x16.png') }}" sizes="16x16" />--}}
    @section('css')
        <link rel="stylesheet" href="{{ asset('/assets/front/css/vendor.css') }}?v={{ $version }}">
        <link rel="stylesheet" href="{{ asset('/assets/front/css/style.css') }}?v={{ $version }}">
    @show
</head>
<body>
    {{--@php(include('assets/front/svg/shapes.svg'))--}}

    @yield('content')

    @section('js')
        <script src="{{ asset('/assets/front/js/vendor.js') }}?v={{ $version }}"></script>
        <script src="{{ asset('/assets/front/js/bundle.js') }}?v={{ $version }}"></script>
        @if (env('APP_ENV') == 'local') <script src="http://localhost:35770/livereload.js?snipver=1"></script> @endif
    @show
</body>
</html>
