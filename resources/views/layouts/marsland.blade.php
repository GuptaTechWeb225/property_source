<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    @include('layouts.meta_tags')
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="{{ env('APP_NAME') }}">

    <title>{{ setting('application_name') }} | @yield('title')</title>
    <link rel="icon" type="image/x-icon" sizes="20x20" href="{{ @globalAsset(setting('favicon')) }}">
    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="{{ asset('marsland/assets/css/bootstrap-5.3.0.min.css') }}">
    <!-- fonts & icon -->
    <link rel="stylesheet" type="text/css" href="{{  asset('marsland/assets/css/fonts-icon.css') }}">
    <!-- Plugin -->
    <link rel="stylesheet" type="text/css" href="{{  asset('marsland/assets/css/plugin.css') }}">
    <!-- Main CSS -->
    <link rel="stylesheet" type="text/css" href="{{  asset('marsland/assets/css/main-style.css') }}">
    <!-- custom CSS -->
    <link rel="stylesheet" type="text/css" href="{{  asset('marsland/assets/css/custom.css') }}">
    @stack('style')
    @if(env('HUBOFHOMES_THEME'))
        <link rel="stylesheet" type="text/css" href="{{  asset('marsland/assets/css/hubofhome_theme.css') }}">
    @endif
</head>
<body>
<!-- Loader -->

@yield('content')

<!--Contact WhatsApps  -->
<a href="https://wa.me/{{ setting('whatsapp_number') }}" target="_blank" id="contact-whatsApp">
    <img src="{{ asset('marsland/assets/images/icon/whatsApp.png') }}" alt="whatsApp">
</a>

<!-- Scroll Up  -->
<div class="progressParent" id="back-top">
    <svg class="backCircle svg-inner" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"/>
    </svg>
</div>
<div id="app"></div>
<!-- jquery-->
<script src="{{  asset('marsland/assets/js/jquery-3.7.0.min.js') }}"></script>
<script src="{{  asset('marsland/assets/js/popper.min.js') }}"></script>
<script src="{{  asset('marsland/assets/js/bootstrap-5.3.0.min.js') }}"></script>
<!-- Plugin -->
<script src="{{  asset('marsland/assets/js/plugin.js') }}"></script>
<!-- Main js-->
<script src="{{  asset('marsland/assets/js/main.js') }}"></script>
@vite(['resources/js/app.js'])
@stack('script')
</body>
</html>
