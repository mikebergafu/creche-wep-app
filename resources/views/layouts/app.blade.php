<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    @include('partials/head')
</head>
<body>
    <div id="app">
        @yield('content')
    </div>
    @include('partials/scripts')
<script src="{{asset('js/confirm-modal.js')}}"></script>

</body>
</html>
