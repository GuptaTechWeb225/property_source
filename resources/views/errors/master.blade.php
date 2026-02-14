<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" /> 
    @include('layouts.meta_tags')
    <title>@yield('title') | {{ _trans('common.Property Management System - Streamline Your Property Operations') }}</title>

    <!-- bootstrap css -->
    <link rel="stylesheet" href="{{asset('backend')}}/assets/css/bootstrap.min.css" />
    <!-- style css -->
    <link rel="stylesheet" href="{{asset('backend')}}/assets/css/style.css" />
    <!-- Custom CSS  end -->
  </head>

  <body>
     <!-- main content start -->
    @yield('main')
    <!-- main content end -->
  </body>
</html>
