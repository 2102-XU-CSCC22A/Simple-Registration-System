<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
  
    <title>{{ config('name', 'Student Registration Application') }}</title>
    
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="icon" type="image/x-icon" href=" {{ asset('images/logo_no_background.png') }} ">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}" defer></script> 
    <style>
    @media screen and (min-width: 720px) {
        .modal-custom {
            max-width: 1175px;
        }
    }
    </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed ">
    <div class="wrapper" id="app">
        @if(Auth::user())
            @include('layouts.navigation')
        @endif
        <main>@yield('content')</main>
    </div>   
</body>
</html>
