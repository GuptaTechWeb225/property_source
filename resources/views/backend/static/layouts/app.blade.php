<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" /> 
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        
        @include('layouts.meta_tags')

        <link rel="icon" type="image/x-icon" href="{{asset('/backend/uploads/settings/favicon.png')}}">

        <title>@yield('title') | {{ _trans('common.Dashboard') }}</title>

        <!-- fontawesome cdn -->
        <link rel="stylesheet" href="{{ asset('backend/assets/css/all.min.css') }}">
        <!-- Custom CSS  start -->
        <link rel="stylesheet" href="{{ asset('backend/assets/css/email-verification.css') }}">
        <!-- Custom CSS  end -->
    </head>
<body class="{{ @findDirectionOfLang() }}" dir="{{ @findDirectionOfLang() }}">
    @yield('content')
    <script src="{{ asset('backend') }}/assets/js/theme.js"></script>
</body>
</html>
