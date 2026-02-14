<!DOCTYPE html>
@php
App::setLocale(userLocal());
@endphp
<html lang="{{ userLocal() }}">

<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <link rel="icon" type="image/x-icon" href="{{ @globalAsset(setting('favicon')) }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <input type="hidden" name="url" id="url" value="{{ url('') }}">
    <meta name="base-url" id="base-url" content="{{ env('APP_URL') }}">
  
    @include('layouts.meta_tags')
        
@if (findDirectionOfLang() == 'rtl')
        <link rel="stylesheet" href="{{ asset('backend') }}/assets/css/bootstrap.rtl.min.css">
    @else
        <link rel="stylesheet" href="{{ asset('backend') }}/assets/css/bootstrap.min.css">
    @endif

    <!-- css  -->
    <link rel="stylesheet" href="{{ asset('backend') }}/assets/css/semantic.rtl.min.css">
    <link rel="stylesheet" href="{{ asset('backend') }}/assets/css/fancybox.css" />
    <!-- metis menu for sidebar  -->
    <link rel="stylesheet" href="{{ asset('backend') }}/assets/css/metisMenu.min.css">
    {{-- Chart js --}}
    <link rel="stylesheet" href="{{ asset('backend') }}/assets/css/apexcharts.min.css">
    <!-- jvectormap css -->
    <link rel="stylesheet" href="{{ asset('backend/vendors/jvectormap/css/jquery-jvectormap-1.2.2.css') }}">
    {{-- All icon-fonts --}}
    <link rel="stylesheet" href="{{ asset('backend') }}/assets/css/icon-fonts.css">
    <link rel="stylesheet" type="text/css" href="{{  asset('marsland/assets/css/fonts-icon.css') }}">
    <!-- All Plugin  -->
    <link rel="stylesheet" href="{{ asset('backend') }}/assets/css/plugin.css">
    <!-- Custom CSS  start -->
    <link rel="stylesheet" href="{{ asset('backend') }}/assets/css/style.css">
    <link rel="stylesheet" href="{{ asset('backend') }}/assets/css/style2.css">
    <link rel="stylesheet" href="{{ asset('backend') }}/assets/css/custom.css">
    <link rel="stylesheet" href="{{ asset('vendors/summernote/summernote-lite.min.css') }}">

    @stack('styles')
    @yield('style')
</head>

<body class="{{ @findDirectionOfLang() }}" dir="{{ @findDirectionOfLang() }}">

    <div id="layout-wrapper">
        <!-- start header -->
        @include('backend.partials.header')
        <!-- end header -->

        <!-- start sidebar -->
        @include('backend.partials.sidebar')
        <!-- end sidebar -->

        <main class="main-content ph-24 ph-lg-32 pt-100 mt-4">
            <!-- start main content -->
            @yield('content')
            <!-- end main content -->

            <!-- start footer -->
            @include('backend.partials.footer')
            <!-- end footer -->
        </main>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <form action="" class="w-100 search">
                            <input type="search" onkeyup="searchProperties()" id="propertyKeyword"  name="keyword"  class="form-control search_input" placeholder="Search by tenant, road & poscode">
                            <span class="icon">
                                <i class="las la-search"></i>
                            </span>
                        </form>
                    </div>
                    <div class="modal-body" id="search_result_wrap">
                        <div class="d-flex justify-content-between align-items-center">
                            <strong class="text-primary ">Search By</strong>
                            <div class="search-loader">
                                <div class="spinner-border spinner-border-sm text-dark" role="status">
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                            </div>
                        </div>
                        <div class="search-result mt-4">
                            <ul class="list-group" id="appendSingleProperty">
                                <li class="list-group-item border-0">
                                    <div class="empty text-center">
                                        <h4>No data found!</h4>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="app"></div>

    {{-- theme mode switch --}}
    <script src="{{ asset('backend') }}/assets/js/theme.js"></script>
    <script src="{{ asset('backend') }}/assets/js/popper.min.js"></script>
    <script src="{{ asset('backend') }}/assets/js/bootstrap.min.js"></script>
    <script src="{{ asset('backend') }}/assets/js/jquery-3.7.0.min.js"></script>
    <script src="{{ asset('backend') }}/assets/js/fancybox.umd.js"></script>
    <script src="{{ asset('backend') }}/assets/js/semantic.min.js"></script>
    <!-- Metis menu for sidebar  -->
    <script src="{{ asset('backend') }}/assets/js/metisMenu.min.js"></script>
    <!-- jvectormap js -->
    <script src="{{ asset('backend/vendors/jvectormap/js/jquery-jvectormap-1.2.2.min.js') }}"></script>
    <script src="{{ asset('backend/vendors/jvectormap/js/jquery-jvectormap-us-merc-en.js') }}"></script>
    {{-- Chart --}}
    <script src="{{ asset('backend') }}/vendors/apexchart/js/apexcharts.min.js"></script>
    <script src="{{ asset('backend') }}/vendors/chartjs/js/chart.min.js"></script>
    <script src="{{ asset('backend') }}/assets/js/ot-charts.js"></script>

    <script src="{{ asset('backend') }}/assets/js/datepicker.min.js"></script>
    {{-- All Plugin js --}}
    <script src="{{ asset('backend') }}/assets/js/plugin.js"></script>
    {{-- CKeditor js --}}
    <script src="{{ asset('backend') }}/assets/js/ckeditor/ckeditor.js"></script>
    <script src="{{ asset('backend') }}/assets/js/ckeditor/custom.js"></script>
    <!-- Vendor JS end  -->
    <script src="{{ asset('backend') }}/assets/js/main.js"></script>
    {{-- Custom Js --}}
    <script src="{{ asset('backend') }}/assets/js/custom.js"></script>
    <script src="{{ asset('backend') }}/assets/js/custom.js"></script>

    @vite(['resources/js/app.js'])

    {{-- alert message --}}
    @include('backend.partials.alert-message')
    {{-- delete method --}}

    @stack('script')
    @yield('script')
    <script>
        const searchProperties = () => {
            let keyword = $('#propertyKeyword').val()
            $('.search-loader').show();
            $.ajax({
                url: '{{ route('global_search') }}',
                method: 'GET',
                data: { keyword: keyword.trim() },
                success: function (data) {
                    $('.search-loader').hide();
                    // Update the search results dynamically
                    updateSearchResults(data);
                },
                error: function (error) {
                    $('.search-loader').hide();
                    console.error('Error fetching search results:', error);
                }
            });
        }

        const updateSearchResults = (results) => {
            const resultList = $('#appendSingleProperty');
            resultList.empty();

            results.forEach(result => {
                const appendContent = `
                <li class="list-group-item">
                    <a href="${result.details_url}" class="single d-flex gap-2">
                        <img src="${result.tenant_image}" height="60" width="60" class="property-image" alt="img">
                        <div class="">
                            <h4 class="mb-0">${result.tenant_name}</h4>
                            <h6 class="mb-0">${result.address}</h6>
                            <address>${result.post_code}, ${result.city}, ${result.state} ${result.country}</address>
                        </div>
                    </a>
                </li>
            `
                resultList.append(appendContent);
            });
        }
        $('.search-loader').hide();
    </script>
</body>

</html>
