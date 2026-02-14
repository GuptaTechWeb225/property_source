<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Property Owner Form</title>
    <link rel="icon" type="image/x-icon" sizes="20x20" href="{{ @globalAsset(setting('favicon')) }}">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="{{ asset('modules/bilnetpropertyownerform/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('modules/bilnetpropertyownerform/js/vendor/toastr/toastr.min.css') }}">
</head>

<body>
    @yield('content')
    <script src="{{ asset('modules/bilnetpropertyownerform/js/vendor/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('modules/bilnetpropertyownerform/js/app.js') }}"></script>
    <script src="{{ asset('modules/bilnetpropertyownerform/js/vendor/toastr/toastr.min.js') }}"></script>
    @stack('scripts')
</body>

</html>
