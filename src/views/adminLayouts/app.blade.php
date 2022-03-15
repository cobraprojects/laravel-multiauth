<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>لوحة التحكم - @yield('title')</title>



    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <!-- Styles -->
    <link href="{{ asset('vendor/multiauth/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/multiauth/lib/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/multiauth/lib/Ionicons/css/ionicons.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/multiauth/lib/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('vendor/multiauth/css/katniss.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Cairo&amp;subset=arabic" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('vendor/multiauth/css/rtl.css') }}">
    @yield('css')
</head>

<body class="rtl">
    <div id="app">
        @include('multiauth::adminLayouts.parts.sidebar')
        @include('multiauth::adminLayouts.parts.header')
        @include('multiauth::adminLayouts.parts.main')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('vendor/multiauth/js/app.js') }}"></script>
    <script src="{{ asset('vendor/multiauth/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js') }}"></script>
    <script src="{{ asset('vendor/multiauth/lib/moment/moment.js') }}"></script>
    <script src="{{ asset('vendor/multiauth/lib/moment/moment-with-locales.js') }}"></script>

    <script src="{{ asset('vendor/multiauth/js/katniss.js') }}"></script>
    @yield('script')
</body>

</html>