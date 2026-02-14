<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('layouts.meta_tags')
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('backend/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/css/icon-fonts.css') }}">
    <!-- All Plugin  -->
    <link rel="stylesheet" href="{{ asset('backend/assets/css/plugin.css') }}">
    <!-- Custom CSS  start -->
    <link rel="stylesheet" href="{{ asset('backend/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/css/style2.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/css/print_layout.css') }}">
    @stack('style')
</head>
<body>
<div class="row justify-content-center">
    <div class="hide-form-print action-button">
        <a href="{{ url()->previous() }}" class="btn btn-info"><i class="las la-arrow-left"></i>{{ _trans('common.Back') }}</a>
        <a href="javascript:"  onclick="printContent()" class="btn ot-btn-primary"><i class="las la-print"></i>{{ _trans('common.Print') }}</a>
    </div>

    @yield('print-content')
</div>
</body>
</html>

@stack('script')

<script type="text/javascript">
    const printContent = () => {
        window.print();
    }
</script>

