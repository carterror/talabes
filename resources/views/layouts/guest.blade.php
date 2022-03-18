<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="icon" href="{{ asset('img/icon.png') }}">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE-edge"/>
        <meta name="author" content="3rroR" />
        <meta name="description" content="Página para encargar tarjetas de regalo" />
        <meta name="keywords" content="tarjeta, vender, regalo, referido, encargo" />
        <meta name="copyright" content="egc-cuba.com" />
        <meta name="robots" content="index, follow">

        <title>{{ config('app.name', 'Laravel') }} - @yield('title')</title>

        <!-- Fonts -->
        {{-- <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap"> --}}


        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/elegant-icons.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/nice-select.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/jquery-ui.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/slicknav.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">

        <style>
            .bd-placeholder-img {
              font-size: 1.125rem;
              text-anchor: middle;
              -webkit-user-select: none;
              -moz-user-select: none;
              -ms-user-select: none;
              user-select: none;
            }
      
            @media (min-width: 768px) {
              .bd-placeholder-img-lg {
                font-size: 3.5rem;
              }
            }
        </style>

        <!-- Scripts -->
        <script src="{{ asset('assets/js/jquery-3.3.1.min.js') }}" defer></script>
        <script src="{{ asset('assets/js/bootstrap.min.js') }}" defer></script>
        <script src="{{ asset('assets/js/jquery.nice-select.min.js') }}" defer></script>
        <script src="{{ asset('assets/js/jquery-ui.min.js') }}" defer></script>
        <script src="{{ asset('assets/js/jquery.slicknav.js') }}" defer></script>
        <script src="{{ asset('assets/js/mixitup.min.js') }}" defer></script>
        <script src="{{ asset('assets/js/owl.carousel.min.js') }}" defer></script>
        <script src="{{ asset('assets/js/main.js') }}" defer></script>
    </head>
    <body>
        <div class="container text-center">
            @section('content') 
            @show
        </div>
    </body>
</html>
