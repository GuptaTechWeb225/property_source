@extends('frontend.layouts.master')

@section('title', @$data['title'])
@section('content')
    <!-- home_banner::start  -->
    <div class="home_banner bannerUi_active owl-carousel">
        @foreach ($data['sliders'] as $slider)
            <div class="banner_single home_Banner_bg_1" style="background-image:url( {{ @$slider['imageURL'] }}) !important;">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 offset-xl-1">
                            <div class="banner__text mb-4">
                                <span>{{ @$slider['highlight_title_one'] }}</span>
                                <h3>{{ @$slider['title'] }}</h3>
                                <div class="right d-flex aligin-items-center gap-3 flex-wrap">
                                </div>
                                <a href="javascript:" class="btn shadow-sm btn-dark btn-theme-bg rounded-3"
                                   data-bs-toggle="modal"
                                   data-bs-target="#bookEvaluation">{{ _trans('landlord.Book free evaluation') }}</a>
                                <a href="{{ route('upload_property') }}"
                                   class="btn shadow-sm btn-dark rounded-3">{{ _trans('landlord.Upload your Property') }}</a>
                            </div>
                        </div>
                        <div class="col-xl-4 offset-xl-1">
                            <div class="description bg-dark p-3 rounded-3">
                                <div class="text">
                                    {!!   @$slider['description'] !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <!-- home_banner::end  -->

    <section class="property-search">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-9">
                    <form action="{{ route('properties') }}" class="row align-items-center">
                        <div class="col-lg-12">
                            <div class="property_search_box">
                                <div class="property_search_wrapper">
                                    <div class="property_search_left">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="purpose_type"
                                                   id="purpose_type_sele"
                                                   value="sell">
                                            <label class="form-check-label" for="purpose_type_sele">
                                                For Sale
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="purpose_type"
                                                   id="purpose_type_tolet"
                                                   value="rent" checked>
                                            <label class="form-check-label" for="purpose_type_tolet">
                                                To Let
                                            </label>
                                        </div>
                                    </div>
                                    {{--                        input --}}
                                    <div class="property_search_middle flex-fill">
                                        <input type="text" value="{{ request('location') }}" class="primary_input3"
                                               name="location"
                                               placeholder="Enter a city, town or postcode">
                                    </div>
                                    {{--                        radius_select --}}
                                    <div class="property_search_right">
                                        <select class="o_land_select2 " name="radius">
                                            <option selected value="">Radius</option>
                                            <option value="0">0 Miles</option>
                                            <option value="0.5">+0.5 Miles</option>
                                            <option value="0.5">+0.5 Miles</option>
                                            <option value="1">+1 Miles</option>
                                            <option value="5">+5 Miles</option>
                                            <option value="10">+10 Miles</option>
                                            <option value="20">+20 Miles</option>
                                            <option value="50">+40 Miles</option>
                                        </select>
                                        <button type="submit" class="o_land_primary_btn flex-fill">Search</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <div class="o_land_section section_spacing3">
        <div class="container">
            <div class="row">
                <div class="col-12 mb_30">
                    <ul class="nav amzcart_tabs d-flex align-items-center justify-content-center flex-wrap " id="myTab"
                        role="tablist">
                        <li class="nav-item " role="presentation">
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home"
                                    type="button" role="tab" aria-controls="home"
                                    aria-selected="true">{{ _trans('landlord.For Sale')}}</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile"
                                    type="button" role="tab" aria-controls="profile"
                                    aria-selected="false">{{ _trans('landlord.For Lettings')}}</button>
                        </li>
{{--                        <li class="nav-item" role="presentation">--}}
{{--                            <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact"--}}
{{--                                    type="button" role="tab" aria-controls="contact"--}}
{{--                                    aria-selected="false">{{ _trans('landlord.Commercial ')}}</button>--}}
{{--                        </li>--}}
                    </ul>

                </div>
                <div class="col-xl-12">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="row">
                                <div class="col-12">
                                    <div class="owl-carousel product_slide">
                                        @forelse ($data['sellProperties'] as $item)
                                        <div class="product_widget5 mb_30">
                                            <div class="product_thumb_upper">
                                                <a href="{{ @$item['details_url'] }}" class="thumb">
                                                    <img src="{{ @$item['image'] }}" alt="">
                                                </a>
                                                <div class="product_action">
                                                    <a href="#">
                                                        <i class="ti-control-shuffle"></i>
                                                    </a>
                                                    <a data-bs-toggle="modal" data-bs-target="#theme_modal">
                                                        <i class="ti-eye"></i>
                                                    </a>
                                                    <a href="#">
                                                        <i class="ti-star"></i>
                                                    </a>
                                                </div>
                                                <span
                                                    class="badge_1 text-uppercase {{ @$item['deal_type'] === 'Rent' ? 'bg_green' : '' }}"> {{ @$item['deal_type'] }} </span>
                                            </div>
                                            <div class="product__meta text-start">
                                                <div class="d-flex justify-content-between flex-wrap gap-2">
                                                    <span
                                                        class="product_banding secondary_text">{{ @$item['category'] }}</span>
                                                    <h5 class="f_w_600 font_16"> {{ @$item['rent_amount'] }}</h5>
                                                </div>
                                                <a href="{{ @$item['details_url'] }}">
                                                    <h4>{{ @$item['name'] }}</h4>
                                                </a>
                                                <div class="d-flex flex-wrap gap-3  mt_10">
                                                <span
                                                    class="body_text d-flex gap_6 align-items-center justify-content-center font_14"><i
                                                        class="fas fa-bed fw-bolder body_text"></i>{{ @$item['bedrooms'] }}</span>
                                                    <span
                                                        class="body_text d-flex gap_6 align-items-center justify-content-center font_14"><i
                                                            class="far fa-bath fw-bolder body_text"></i>{{ @$item['bathrooms'] }}</span>
                                                    <span
                                                        class="body_text d-flex gap_6 align-items-center justify-content-center font_14"><i
                                                            class="far fa-border-all fw-bolder body_text"></i>{{ @$item['size'] }} sqft</span>
                                                </div>
                                                <div class="d-flex gap-2 flex-column mt-3">
                                                    <x-action_button property_id="{{ @$item['id'] }}" advertise_id="{{ @$item['advertise_id'] }}" amount="{{ @$item['price'] }}"></x-action_button>
                                                </div>
                                            </div>
                                        </div>
                                            @empty
                                                <h4 class="py-5 text-center">Property not available for Sale</h4>
                                            @endforelse
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

                            <div class="row">
                                <div class="col-12">
                                    <div class="owl-carousel product_slide">
                                        @forelse($data['rentProperties'] as $item)
                                            <div class="product_widget5 mb_30">
                                                <div class="product_thumb_upper">
                                                    <a href="{{ @$item['details_url'] }}" class="thumb">
                                                        <img src="{{ @$item['image'] }}" alt="">
                                                    </a>
                                                    <div class="product_action">
                                                        <a href="compare.php">
                                                            <i class="ti-control-shuffle"></i>
                                                        </a>
                                                        <a data-bs-toggle="modal" data-bs-target="#theme_modal">
                                                            <i class="ti-eye"></i>
                                                        </a>
                                                        <a href="#">
                                                            <i class="ti-star"></i>
                                                        </a>
                                                    </div>
                                                    <span
                                                        class="badge_1 text-uppercase {{ @$item['deal_type'] === 'Rent' ? 'bg_green' : '' }}"> {{ @$item['deal_type'] }} </span>
                                                </div>
                                                <div class="product__meta text-start">
                                                    <div class="d-flex justify-content-between flex-wrap gap-2">
                                                        <span
                                                            class="product_banding secondary_text">{{ @$item['category'] }}</span>
                                                        <h5 class="f_w_600 font_16"> {{ @$item['rent_amount'] }}</h5>
                                                    </div>
                                                    <a href="{{ @$item['details_url'] }}">
                                                        <h4>{{ @$item['name'] }}</h4>
                                                    </a>
                                                    <div class="d-flex flex-wrap gap-3  mt_10">
                                                    <span
                                                        class="body_text d-flex gap_6 align-items-center justify-content-center font_14"><i
                                                            class="fas fa-bed fw-bolder body_text"></i>{{ @$item['bedrooms'] }}</span>
                                                        <span
                                                            class="body_text d-flex gap_6 align-items-center justify-content-center font_14"><i
                                                                class="far fa-bath fw-bolder body_text"></i>{{ @$item['bathrooms'] }}</span>
                                                        <span
                                                            class="body_text d-flex gap_6 align-items-center justify-content-center font_14"><i
                                                                class="far fa-border-all fw-bolder body_text"></i>{{ @$item['size'] }} sqft</span>
                                                    </div>
                                                    <div class="d-flex gap-2 flex-column mt-3">
                                                        <x-action_button property_id="{{ @$item['id'] }}" advertise_id="{{ @$item['advertise_id'] }}" amount="{{ @$item['price'] }}"></x-action_button>
                                                    </div>
                                                </div>
                                            </div>
                                        @empty
                                            <div class="text-center">
                                                <h4 class="py-5">Property not available for Lettings</h4>
                                            </div>
                                    @endforelse
                                    </div>
                                </div>

                            </div>
                        </div>
{{--                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">--}}
{{--                            <!-- conttent  -->--}}
{{--                            <div class="row">--}}
{{--                                <!-- SINGLE_WIDGET -->--}}
{{--                                <div class="col-12">--}}
{{--                                    <div class="owl-carousel product_slide">--}}
{{--                                        @foreach ($data['commertialProperties'] as $item)--}}
{{--                                        <!-- SINGLE_WIDGET -->--}}
{{--                                            <div class="product_widget5 mb_30">--}}
{{--                                                <div class="product_thumb_upper">--}}
{{--                                                    <a href="{{ @$item['details_url'] }}" class="thumb">--}}
{{--                                                        <img src="{{ @$item['image'] }}" alt="">--}}
{{--                                                    </a>--}}
{{--                                                    <div class="product_action">--}}
{{--                                                        <a href="compare.php">--}}
{{--                                                            <i class="ti-control-shuffle"></i>--}}
{{--                                                        </a>--}}
{{--                                                        <a data-bs-toggle="modal" data-bs-target="#theme_modal">--}}
{{--                                                            <i class="ti-eye"></i>--}}
{{--                                                        </a>--}}
{{--                                                        <a href="#">--}}
{{--                                                            <i class="ti-star"></i>--}}
{{--                                                        </a>--}}
{{--                                                    </div>--}}
{{--                                                    <span--}}
{{--                                                        class="badge_1 text-uppercase {{ @$item['deal_type'] === 'Rent' ? 'bg_green' : '' }}"> {{ @$item['deal_type'] }} </span>--}}
{{--                                                </div>--}}
{{--                                                <div class="product__meta text-start">--}}
{{--                                                    <div class="d-flex justify-content-between flex-wrap gap-2">--}}
{{--                                                        <span--}}
{{--                                                            class="product_banding secondary_text">{{ @$item['category'] }}</span>--}}
{{--                                                        <h5 class="f_w_600 font_16"> {{ @$item['rent_amount'] }}</h5>--}}
{{--                                                    </div>--}}
{{--                                                    <a href="{{ @$item['details_url'] }}">--}}
{{--                                                        <h4>{{ @$item['name'] }}</h4>--}}
{{--                                                    </a>--}}
{{--                                                    <div class="d-flex flex-wrap gap-3  mt_10">--}}
{{--                                                    <span--}}
{{--                                                        class="body_text d-flex gap_6 align-items-center justify-content-center font_14"><i--}}
{{--                                                            class="fas fa-bed fw-bolder body_text"></i>{{ @$item['bedrooms'] }}</span>--}}
{{--                                                        <span--}}
{{--                                                            class="body_text d-flex gap_6 align-items-center justify-content-center font_14"><i--}}
{{--                                                                class="far fa-bath fw-bolder body_text"></i>{{ @$item['bathrooms'] }}</span>--}}
{{--                                                        <span--}}
{{--                                                            class="body_text d-flex gap_6 align-items-center justify-content-center font_14"><i--}}
{{--                                                                class="far fa-border-all fw-bolder body_text"></i>{{ @$item['size'] }} {{ _trans('landlord.sqft')}}</span>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="d-flex gap-2 flex-column mt-3">--}}
{{--                                                        @include('frontend.property.partials.call-email')--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        @endforeach--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                            </div>--}}
{{--                            <!-- conttent  -->--}}
{{--                        </div>--}}
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="o_land_section o_land_deal_area ">
        <div class="container">
            <div class="row">
                @foreach($data['features'] ?? [] as $feature)
                <div class="col-xl-4 col-md-6 col-lg-4">
                    <div class="deal_wizard deal_wizard_bg1 mb_30" style="background-image: url('{{ @globalAsset($feature->icon->path) }}')">
                        <h3>{{ $feature->title }}</h3>
                        <a href="{{ route('properties') }}" class="shop_text">{{ _trans('landlord.See More')}}</a>
                    </div>
                </div>
                @endforeach
{{--                <div class="col-xl-4 col-md-6 col-lg-4">--}}
{{--                    <div class="deal_wizard deal_wizard_bg2 mb_30">--}}
{{--                        <h3>{{ _trans('landlord.NEW COLOR CASES')}}</h3>--}}
{{--                        <a href="{{ route('properties') }}" class="shop_text">{{ _trans('landlord.Shop now')}}</a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-xl-4 col-md-6 col-lg-4">--}}
{{--                    <div class="deal_wizard deal_wizard_bg3 mb_30">--}}
{{--                        <h3>{{ _trans('landlord.Daltex Product Example')}}</h3>--}}
{{--                        <a href="{{ route('properties') }}" class="shop_text">{{ _trans('landlord.Shop now')}}</a>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>
        </div>
    </div>

    <!-- o_land_recomanded::start  -->

    <!-- o_land_recomanded::end -->
    <!-- o_landingFeatures::start  -->
    <div class="o_land_section section_spacing d-none ">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section__title d-flex align-items-center gap-3 mb_40 flex-wrap">
                        <h3 class="mb_30 flex-fill ">{{ _trans('landlord.Amazing Features')}}</h3>
                    </div>
                </div>
            </div>
            <div class="row ">
                <div class="col-xl-12">
                    <div class="feature_grid">
                        <div class="Feature_widget">
                            <div class="Feature_widget_content d-flex gap-4 align-items-center flex-wrap">
                                <div class="Feature_widget_content_icon">
                                    <img class="img-fluid" src="{{ url('frontend/img/svg/feature1.svg') }}" alt="">
                                </div>
                                <h3 class="Feature_widget_content_title m-0">{{ _trans('landlord.Lead Management')}}</h3>
                            </div>
                            <p class="Feature_widget_desc">{{ _trans('landlord.Organize and track leads, communications and deals.')}}</p>
                        </div>
                        <div class="Feature_widget">
                            <div class="Feature_widget_content d-flex gap-4 align-items-center flex-wrap">
                                <div class="Feature_widget_content_icon">
                                    <img class="img-fluid" src="{{ url('frontend/img/svg/feature2.svg') }}" alt="">
                                </div>
                                <h3 class="Feature_widget_content_title m-0">{{ _trans('landlord.Monthly Sales')}}</h3>
                            </div>
                            <p class="Feature_widget_desc">{{ _trans('landlord.Organize and track leads, communications and deals.')}}</p>
                        </div>
                        <div class="Feature_widget">
                            <div class="Feature_widget_content d-flex gap-4 align-items-center flex-wrap">
                                <div class="Feature_widget_content_icon">
                                    <img class="img-fluid" src="{{ url('frontend/img/svg/feature3.svg') }}" alt="">
                                </div>
                                <h3 class="Feature_widget_content_title m-0">{{ _trans('landlord.Sales Progress')}}</h3>
                            </div>
                            <p class="Feature_widget_desc">{{ _trans('landlord.Organize and track leads, communications and deals.')}}</p>
                        </div>
                        <div class="Feature_widget">
                            <div class="Feature_widget_content d-flex gap-4 align-items-center flex-wrap">
                                <div class="Feature_widget_content_icon">
                                    <img class="img-fluid" src="{{ url('frontend/img/svg/feature4.svg') }}" alt="">
                                </div>
                                <h3 class="Feature_widget_content_title m-0">{{ _trans('landlord.Marketing Automation')}}</h3>
                            </div>
                            <p class="Feature_widget_desc">{{ _trans('landlord.Organize and track leads, communications and deals.')}}</p>
                        </div>
                        <div class="Feature_widget">
                            <div class="Feature_widget_content d-flex gap-4 align-items-center flex-wrap">
                                <div class="Feature_widget_content_icon">
                                    <img class="img-fluid" src="{{ url('frontend/img/svg/feature5.svg') }}" alt="">
                                </div>
                                <h3 class="Feature_widget_content_title m-0">{{ _trans('landlord.Reporting & Analytics')}}</h3>
                            </div>
                            <p class="Feature_widget_desc">{{ _trans('landlord.Organize and track leads, communications and deals.')}}</p>
                        </div>
                        <div class="Feature_widget">
                            <div class="Feature_widget_content d-flex gap-4 align-items-center flex-wrap">
                                <div class="Feature_widget_content_icon">
                                    <img class="img-fluid" src="{{ url('frontend/img/svg/feature6.svg') }}" alt="">
                                </div>
                                <h3 class="Feature_widget_content_title m-0">{{ _trans('landlord.MLS Integrations')}}</h3>
                            </div>
                            <p class="Feature_widget_desc"></p>{{ _trans('landlord.Organize and track leads, communications and deals.')}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- o_landingFeatures::end  -->

    <div class="o_land_section section_spacing ">
        <div class="container">
            <div class="row">
                <div class="col-12 ">
                    <div class="section__title d-flex align-items-center gap-3 mb_40 flex-wrap">
                        <h3 class="m-0 flex-fill ">{{ _trans('landlord.How it works?')}}</h3>
                    </div>
                </div>
            </div>
            <div class="row ">
                @foreach ( $data['how_it_works'] as $how_it_work)
                    <div class="col-xl-3 col-lg-3 col-md-6">
                        <div class="workx_widget text-center mb_30">
                            <div class="icon d-flex align-items-center justify-content-center">
                                <img src="{{ url('frontend/img/svg/property1.svg') }}" alt="">
                            </div>
                            <div class="context_info text-justify ">
                                <h4>{{ $how_it_work->title }}</h4>
                                <p class="text-justify">{{ $how_it_work->message }}</p>
                            </div>
                        </div>
                    </div>

                @endforeach
            </div>
        </div>
    </div>

    <div class="o_land_brand section_spacing5 pt-0 ">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section__title d-flex align-items-center gap-3 mb_30">
                        <h3 class="m-0 flex-fill">{{ _trans('landlord.Testimonials')}}</h3>
                    </div>
                </div>
            </div>
            <div class="row row-cols-5">
                @foreach($data['testimonials'] as $testimonial)
                <div class="col">
                    <div class="card shadow-sm rounded-3">
                        <div class="card-body">
                            <div class="d-flex flex-column gap-2 justify-content-center align-items-center">
                                <img class="rounded-circle" src="{{ @globalAsset($testimonial->image->path) }}" height="100" width="100" alt="{{ $testimonial->name }}">
                                <h4 class="mb-0">{{ $testimonial->name }}</h4>
                                <h6 class="mb-0 text-theme-color">{{ $testimonial->designation }}</h6>
                                <small class="mb-0 text-center ">{{ \Illuminate\Support\Str::of($testimonial->message)->words(15) }}</small>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- o_land_brand::start  -->
    <div class="o_land_brand section_spacing5 pt-0 ">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section__title d-flex align-items-center gap-3 mb_30">
                        <h3 class="m-0 flex-fill">{{ _trans('landlord.Our Partners')}}</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="o_landBrand_boxes align-items-center gap-4 p-4 bg-white border-0">
                        @foreach($data['partners'] as $partner)
                            <a class="single_brand d-block border-end p-3">
                                <img height="100" width="100" src="{{ url(@$partner->image->path) }}" alt="{{ $partner->name }}"
                                     onclick="showImagePopup(this.src)">
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- o_land_brand::end  -->
@endsection

