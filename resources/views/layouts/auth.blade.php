<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Library - @yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <link href="{{asset('css/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body style="background-image: url({{ asset('images/background.jpg') }});">
    <div id="app">
        <!-- Include navbar from resources/inc folder -->
        @include('inc.navbar')
        <main class="py-4">
            <!-- Include success/error messages from resources/inc folder -->
            <div class="w-100 p-3">
                @include('inc.messages')
            </div>
            @yield('content')
        </main>
    </div><!-- /app-->
    <!-- Footer -->
    <footer class="page-footer bg-dark">
        <!-- Copyright -->
        <div class="footer-copyright text-center text-muted py-3">© 2018 Copyright:
            <a class="text-warning" href="https://laravel-library.000webhostapp.com/" target="_blank">Library</a>
        </div>
        <!-- /Copyright -->
    </footer>
    <!-- /Footer -->
</body>
</html>
