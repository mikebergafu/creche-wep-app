<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    @include('partials/head')
</head>
<body>
    <div id="app" style="margin-top: 100px;">
        @yield('content-login')
    </div>
    <!-- Scripts -->

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @include('partials/scripts')

</html>
