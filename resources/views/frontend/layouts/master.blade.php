<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @include('layouts.meta_tags')

    <link href="{{ asset('frontend/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ url('frontend/css/magnific-popup.css') }}" rel="stylesheet">
    <link href="{{ url('frontend/css/fontawesome.css') }}" rel="stylesheet">
    <link href="{{ url('frontend/css/themify-icons.css') }}" rel="stylesheet">
    <link href="{{ url('frontend/css/flaticon.css') }}" rel="stylesheet">
    <link href="{{ url('frontend/css/nice-select.css') }}" rel="stylesheet">
    <link href="{{ url('frontend/css/gijgo.min.css') }}" rel="stylesheet">
    <link href="{{ url('frontend/css/perfect-scrollbar.css') }}" rel="stylesheet">
    <link href="{{ url('frontend/css/jquery-ui.css') }}" rel="stylesheet">
    <link href="{{ url('frontend/css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ url('frontend/css/slick.css') }}" rel="stylesheet">
    <link href="{{ url('frontend/css/slicknav.css') }}" rel="stylesheet">
    <link href="{{ url('frontend/css/swiper-bundle.min.css') }}" rel="stylesheet">
    <link href="{{ url('frontend/css/toastr.min.css') }}" rel="stylesheet">
    <link href="{{ url('frontend/css/fancybox.css') }}" rel="stylesheet">
    <link href="{{ url('frontend/css/panzoom.css') }}" rel="stylesheet">
    <link href="{{ url('frontend/css/summernote-lite.css') }}" rel="stylesheet">

    <link rel="icon" type="image/x-icon" href="{{ globalAsset(setting('favicon')) }}">

    <!-- daterangepicker css here  -->
    <link rel="stylesheet" type="text/css" href="{{ url('frontend/css/daterangepicker.css') }}"/>
    <link href="{{ url('frontend/css/style.css') }}" rel="stylesheet">
    <link href="{{ url('frontend/css/custom.css') }}" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <input type="hidden" name="url" id="url" value="{{ url('') }}">


    <title>{{ setting('application_name') }} | @yield('title')</title>

    <style>
        .whatsapp-chat {
            position: fixed;
            bottom: 0;
            margin: 8px;
        }

        .home_banner .banner_single .description .text p span {
            color: #fff !important;
            font-size: 14px !important;
            font-family: "Circular Std Book" !important;
        }

        .home_banner .banner_single .description .text h2 span {
            line-height: 3 !important;
            color: #c89c66 !important;
            font-size: 20px !important;
            font-weight: bold !important;
            font-family: "Circular Std Book" !important;
        }
    </style>
    @stack('style')
</head>

<body>

@include('frontend.include.header')
@yield('content')
@include('frontend.include.footer')
<div class="whatsapp-chat">
    <a href="https://wa.me/{{ setting('whatsapp_number') }}" target="_blank" id="contact-whatsApp">
        <img src="{{ asset('marsland/assets/images/icon/whatsApp.png') }}" alt="whatsApp-link">
    </a>
</div>

<div class="modal fade" id="bookEvaluation" data-bs-backdrop="static" tabindex="-1"
     aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header theme-bg">
                <h1 class="modal-title fs-5 text-white"
                    id="staticBackdropLabel">{{ _trans('landlord.Book A Valuation') }}</h1>
                <button type="button" class="btn-close text-danger" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('appointment.store') }}" class="row" method="post">
                    @csrf
                    <div class="ot-contact-form mb-2">
                        <label for="name" class="ot-contact-label">{{ _trans('common.Name') }}<span class="text-danger">*</span></label>
                        <input type="text" required class="form-control ot-contact-input" name="name" id="name"
                               placeholder="{{ _trans('common.Enter here') }}">
                        @error('name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="ot-contact-form mb-2">
                        <label for="email" class="ot-contact-label">{{ _trans('common.Email') }}<span
                                class="text-danger">*</span> </label>
                        <input type="email" required name="email" class="form-control ot-contact-input" id="email"
                               placeholder="{{ _trans('common.Enter here') }}">
                        @error('email')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="ot-contact-form mb-2">
                        <label for="phone" class="ot-contact-label">{{ _trans('common.Phone') }}<span
                                class="text-danger">*</span> </label>
                        <input type="text" required name="phone" class="form-control ot-contact-input" id="phone"
                               placeholder="{{ _trans('common.Enter here') }}">
                        @error('phone')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="ot-contact-form mb-2">
                        <label for="property_address" class="ot-contact-label">{{ _trans('common.Property Address') }}
                            <span class="text-danger">*</span> </label>
                        <input type="text" required name="property_address" class="form-control ot-contact-input"
                               id="property_address" placeholder="{{ _trans('common.Enter here') }}">
                        @error('property_address')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="ot-contact-form mb-2">
                        <label class="ot-contact-label">{{ _trans('common.Property Type') }}<span
                                class="text-danger">*</span></label>
                        <select required class="form-select" name="property_type">
                            <option value="letting">{{ _trans('common.Letting') }}</option>
                            <option value="sales">{{ _trans('common.Sales') }}</option>
                        </select>
                        @error('property_type')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="ot-contact-form mb-2">
                        <label class="ot-contact-label">{{ _trans('common.Message') }}</label>
                        <textarea class="form-control ot-contact-input" name="message"></textarea>
                    </div>
                    <div class="ot-contact-form mb-2 row">
                        <div class="col-lg-6">
                            <label class="ot-contact-label">{{ _trans('common.Date') }}</label>
                            <input type="date" class="form-control ot-contact-input" name="date"/>
                        </div>
                        <div class="col-lg-6">
                            <label class="ot-contact-label">{{ _trans('common.Time') }}</label>
                            <input type="time" class="form-control ot-contact-input" name="time"/>
                        </div>
                    </div>
                    <input type="hidden" name="type" value="free_evaluation"/>
                    <div class="col-lg-12 mt-20 text-end mt-4">
                        <button type="submit"
                                class="btn btn-dark btn-theme-bg">{{ _trans('landlord.Book Free Evaluation') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{--    Book a viewing popup box--}}
<div class="modal fade" id="bookAViewing" data-bs-backdrop="static" tabindex="-1" aria-labelledby="staticBackdropLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header theme-bg">
                <h1 class="modal-title fs-5 text-white"
                    id="staticBackdropLabel">{{ _trans('landlord.Appointment') }}</h1>
                <button type="button" class="btn-close text-danger" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('appointment.store') }}" class="row" method="post">
                    @csrf
                    <div class="ot-contact-form mb-2">
                        <label for="name" class="ot-contact-label">{{ _trans('common.Select Booking Date') }}<span
                                class="text-danger">*</span></label>
                        <input type="date" required class="form-control ot-contact-input" name="date" id="name"
                               placeholder="{{ _trans('common.Enter here') }}">
                        @error('name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="ot-contact-form mb-2">
                        <label for="name" class="ot-contact-label">{{ _trans('common.Name') }}<span class="text-danger">*</span></label>
                        <input type="text" required class="form-control ot-contact-input" name="name" id="name"
                               placeholder="{{ _trans('common.Enter here') }}">
                        @error('name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="ot-contact-form mb-2">
                        <label for="property_id" class="ot-contact-label">{{ _trans('common.Choose Property') }}<span
                                class="text-danger">*</span> </label>
                        <select required name="property_id" class="form-control ot-contact-input" id="property_id">
                            {{--                                @foreach($properties as $property)--}}
                            {{--                                 <option value="{{ $property->id }}">{{ $property->name }}</option>--}}
                            {{--                                @endforeach--}}
                        </select>
                        @error('property_id')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="ot-contact-form mb-2">
                        <label for="email" class="ot-contact-label">{{ _trans('common.Email') }}<span
                                class="text-danger">*</span> </label>
                        <input type="email" required name="email" class="form-control ot-contact-input" id="email"
                               placeholder="{{ _trans('common.Enter here') }}">
                        @error('email')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="ot-contact-form mb-2">
                        <label for="phone" class="ot-contact-label">{{ _trans('common.Phone') }}<span
                                class="text-danger">*</span> </label>
                        <input type="text" required name="phone" class="form-control ot-contact-input" id="phone"
                               placeholder="{{ _trans('common.Enter here') }}">
                        @error('phone')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <input type="hidden" name="type" value="book_viewing">

                    <div class="ot-contact-form mb-2">
                        <label for="phone" class="ot-contact-label">{{ _trans('common.Time Slots') }}<span
                                class="text-danger">*</span> </label>
                        <div class="row flex-wrap">
                            @foreach($time_slots ?? [] as $time_slot)
                                <div class="col-lg-6">
                                    <div class="slot mb-1">
                                        <label for="slotId{{$time_slot}}" class="btn btn-sm btn-light w-100 text-start">
                                            <input type="radio" value="{{ $time_slot->id }}" required
                                                   name="time_slot_id" id="slotId{{$time_slot}}">
                                            {{ $time_slot->start_time }} - {{ $time_slot->end_time }}
                                        </label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="col-lg-12 mt-20 text-end mt-4">
                        <button type="submit"
                                class="btn btn-dark btn-theme-bg">{{ _trans('landlord.Book Now') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{--    {!! setting('tawk_widget_code') !!}--}}
{{--apply empty condition --}}
@if(!empty(env('TAWKTO_LINK')))
{{ \TawkTo::widgetCode() }}
@endif

<script src="{{ url('frontend/js/vendor/jquery-3.7.0.min.js') }}"></script>
<script src="{{ url('frontend/js/vendor/popper.min.js') }}"></script>
<script src="{{ url('frontend/js/vendor/bootstrap.min.js') }}"></script>
<script src="{{ url('frontend/js/owl.carousel.min.js') }}"></script>
<script src="{{ url('frontend/js/swiper-bundle.min.js') }}"></script>
<script src="{{ url('frontend/js/isotope.pkgd.min.js') }}"></script>
<script src="{{ url('frontend/js/waypoints.min.js') }}"></script>
<script src="{{ url('frontend/js/jquery.counterup.min.js') }}"></script>
<script src="{{ url('frontend/js/imagesloaded.pkgd.min.js') }}"></script>
<script src="{{ url('frontend/js/wow.min.js') }}"></script>
<script src="{{ url('frontend/js/nice-select.min.js') }}"></script>
<script src="{{ url('frontend/js/barfiller.js') }}"></script>
<script src="{{ url('frontend/js/jquery.slicknav.js') }}"></script>
<script src="{{ url('frontend/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ url('frontend/js/jquery.ajaxchimp.min.js') }}"></script>
<script src="{{ url('frontend/js/parallax.js') }}"></script>
<script src="{{ url('frontend/js/gijgo.min.js') }}"></script>
<script src="{{ url('frontend/js/slick.min.js') }}"></script>
<script src="{{ url('frontend/js/eleveti_zoom.js') }}"></script>
<script src="{{ url('frontend/js/perfect-scrollbar.js') }}"></script>
<script src="{{ url('frontend/js/jquery.nav.js') }}"></script>
<script src="{{ url('frontend/js/summernote-lite.min.js') }}"></script>
<script src="{{ url('frontend/js/query-ui.js') }}"></script>
<script src="{{ url('frontend/js/jquery.countdown.min.js') }}"></script>
<script src="{{ url('frontend/js/toastr.min.js') }}"></script>
<script src="{{ url('frontend/js/fancybox.umd.js') }}"></script>
<script src="{{ url('frontend/js/mail-script.js') }}"></script>
<script src="{{ url('https://maps.googleapis.com/maps/api/js?key=AIzaSyBVF8ZCdPLYBEC2-PCRww1_Q0Abe5GYP1c') }}">
</script>
<link rel="stylesheet" href="{{ asset('backend') }}/assets/css/icon-fonts.css">
<script src="{{ url('frontend/js/moment.min.js') }}"></script>
<script src="{{ url('frontend/js/daterangepicker.min.js') }}"></script>
<script src="{{ url('frontend/js/map.js') }}"></script>
<!-- MAIN JS   -->
<script src="{{ url('frontend/js/main.js') }}"></script>
<script src="{{ url('frontend/js/custom.js') }}"></script>

@include('frontend.script.landloardScript')
@yield('script')
<script>
    function bookViewingHandler(propertyId) {
        $.ajax({
            url: '{{ route('get-properties') }}',
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                const selectBox = $('#property_id');
                selectBox.empty();
                $.each(data, function (index, item) {
                    console.log(item)
                    const option = $('<option>', {
                        value: item.id, // Assuming item has a 'value' property
                        text: item.name    // Assuming item has a 'text' property
                    });
                    if (item.id == propertyId) {
                        option.prop('selected', true);
                    }
                    selectBox.append(option);
                });
            },
            error: function (xhr, status, error) {
                console.error('Error fetching data:', error);
            }
        });
    }
</script>
</body>
</html>
