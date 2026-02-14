<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Landlord - @yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <input type="hidden" name="url" id="url" value="{{ url('') }}">
    <meta name="base-url" id="base-url" content="{{ env('APP_URL') }}">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" type="image/x-icon" href="{{ @globalAsset(setting('favicon')) }}">

    <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset('landlord/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('landlord/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('landlord/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('landlord/css/fontawesome.css ') }}">
    <link rel="stylesheet" href="{{ asset('landlord/css/perfect-scrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('landlord/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('landlord/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('landlord/css/nice-select2.css') }}">
    <link rel="stylesheet" href="{{ asset('landlord/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('landlord/css/metis-menu.css') }}">
    <link rel="stylesheet" href="{{ asset('landlord/css/slicknav.css') }}">
    <link rel="stylesheet" href="{{ asset('landlord/css/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ asset('landlord/css/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('landlord/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('landlord/css/custom.css') }}">
</head>
<body>

<div class="ph_root_layout d-flex">
    @include('landlord.includes.sidebar')
    <main class="ph_main_layout flex-fill d-flex flex-column">
        @include('landlord.includes.header')

        @yield('landlord_content')
    </main>
</div>

<!-- UP_ICON  -->
<div id="back-top" style="display: none;">
    <a title="Go to Top" href="#">
        <i class="ti-angle-up"></i>
    </a>
</div>
<!--/ UP_ICON -->

<!--ALL JS SCRIPTS -->
<script src="{{ asset('landlord/js/vendor/jquery-3.7.1.min.js') }}"></script>
<script src="{{ asset('landlord/js/vendor/popper.min.js') }}"></script>
<script src="{{ asset('landlord/js/vendor/bootstrap.min.js') }}"></script>

<script src="{{ asset('landlord/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('landlord/js/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('landlord/js/waypoints.min.js') }}"></script>
<script src="{{ asset('landlord/js/jquery.counterup.min.js') }}"></script>
<script src="{{ asset('landlord/js/imagesloaded.pkgd.min.js') }}"></script>
<script src="{{ asset('landlord/js/wow.min.js') }}"></script>
<script src="{{ asset('landlord/js/nice-select3.min.js') }}"></script>
<script src="{{ asset('landlord/js/barfiller.js') }}"></script>
<script src="{{ asset('landlord/js/jquery.slicknav.js') }}"></script>
<script src="{{ asset('landlord/js/onepageNav.js') }}"></script>
<script src="{{ asset('landlord/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('landlord/js/jquery.ajaxchimp.min.js') }}"></script>
<script src="{{ asset('landlord/js/parallax.js') }}"></script>
<script src="{{ asset('landlord/js/mail-script.js') }}"></script>
<script src="{{ asset('landlord/js/jquery-ui.js') }}"></script>
<script src="{{ asset('landlord/js/perfect-scrollbar.js') }}"></script>
<script src="{{ asset('landlord/js/metismenu.js') }}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA7nx22ZmINYk9TGiXDEXGVxghC43Ox6qA"></script>
<script src="{{ asset('landlord/js/moment.min.js') }}"></script>
<script src="{{ asset('landlord/js/daterangepicker.min.js') }}"></script>
<script src="{{ asset('landlord/js/map.js') }}"></script>
<!-- MAIN JS   -->
<script src="{{ asset('landlord/js/main.js') }}"></script>

@stack('js')
</body>

</html>
