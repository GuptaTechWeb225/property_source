@extends('frontend.layouts.master')
@push('css')
    <style>
        #image-five-bg{
            background-image:url( {{ @$data['about']->image_five->path }}) !important;
        }
    </style>
@endpush
@section('content')
    <div class="o_landy_about_banner section_spacing6">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-7 col-lg-7">
                    <div class="o_landy_about_banner_text ">
                        <div class="section__title2 mw-100">
                            <span
                                class="d-block font_14 f_w_500 text-uppercase secondary_text lh-1 mb_23">{{@$data['about']->title_one}}</span>
                            <h3>{{@$data['about']->subtitle_one}}</h3>
                            {!! @$data['about']->desc_one !!}
                        </div>
                        <div class="about_banner_count d-flex align-items-center flex-wrap mb_30">
                            <div class="single_about_banner_count">
                                <h4>{{ _trans('landlord.230+')}}</h4>
                                <p>{{ _trans('landlord.Product’s in Market')}}</p>
                            </div>
                            <div class="single_about_banner_count">
                                <h4>{{ _trans('landlord.7M+')}}</h4>
                                <p>{{ _trans('landlord.Number of Client’s')}}</p>
                            </div>
                            <div class="single_about_banner_count">
                                <h4>{{ _trans('landlord.100%')}}</h4>
                                <p>{{ _trans('landlord.Clients Satisfaction')}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-5">
                    <div class="about_img mb_30">
                        <img src="{{ asset(@$data['about']->image_one->path) }}" alt="" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- o_landy_about_banner::end  -->
    <div class="section_spacing6 gray_bg_2">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="o_landy_about_banner_text w-100 max-w-100">
                        <div class="section__title2">
                            <span
                                class="d-block font_14 f_w_500 text-uppercase secondary_text lh-1 mb_23">{{ _trans('landlord.Our Values')}}</span>
                            <h3>{{ _trans('landlord.Our mission is to Make your life easier.')}}</h3>
                        </div>
                    </div>

                </div>
                <div class="col-xl-3 col-lg-3 col-md-6">
                    <div
                        class="about_countBox mb_30 text-center d-flex align-items-center justify-content-center flex-column">
                        <div class="max_100">
                            <img class="img-fluid" src="{{url('frontend/img/icons/1.png')}}" alt="">
                        </div>
                        <p>{{ _trans('landlord.Integrity')}} </p>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6">
                    <div
                        class="about_countBox mb_30 text-center d-flex align-items-center justify-content-center flex-column">
                        <div class="max_100">
                            <img class="img-fluid" src="{{url('frontend/img/icons/2.png')}}" alt="">
                        </div>
                        <p>{{ _trans('landlord.Responsibility')}}</p>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6">
                    <div
                        class="about_countBox mb_30 text-center d-flex align-items-center justify-content-center flex-column">
                        <div class="max_100">
                            <img class="img-fluid" src="{{url('frontend/img/icons/3.png')}}" alt="">
                        </div>
                        <p>{{ _trans('landlord.Confident')}}  </p>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6">
                    <div
                        class="about_countBox mb_30 text-center d-flex align-items-center justify-content-center flex-column">
                        <div class="max_100">
                            <img class="img-fluid" src="{{url('frontend/img/icons/4.png')}}" alt="">
                        </div>
                        <p>{{ _trans('landlord.Trusting')}} </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- o_landy_about_banner::start  -->
    <div class="o_landy_about_banner section_spacing6">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-5 offset-xl-1 col-lg-7">
                    <div class="o_landy_about_banner_text">
                        <div class="section__title2">
                            <span
                                class="d-block font_14 f_w_500 text-uppercase secondary_text lh-1 mb_23">{{@$data['about']->title_two}}</span>
                            <h3>{{@$data['about']->subtitle_two}}</h3>
                            {!! @$data['about']->desc_two !!}
                        </div>
                    </div>
                </div>
                <div class="col-xl-5 offset-xl-1 col-lg-5">
                    <div class="about_img mb_30">
                        <img src="{{ asset(@$data['about']->image_two->path) }}" alt="" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- o_landy_about_banner::end  -->

    <!-- o_landy_about_banner::start  -->
    <div class="o_landy_about_banner section_spacing6">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-xl-5 offset-xl-1 col-lg-5">
                    <div class="about_img mb_30">
                        <img src="{{ asset(@$data['about']->image_three->path) }}" alt="" class="img-fluid">
                    </div>
                </div>
                <div class="col-xl-5 offset-xl-1 col-lg-7">
                    <div class="o_landy_about_banner_text">
                        <div class="section__title2">
                            <span
                                class="d-block font_14 f_w_500 text-uppercase secondary_text lh-1 mb_23">{{@$data['about']->title_three}}</span>
                            <h3>{{@$data['about']->subtitle_three}}</h3>
                            {!! @$data['about']->desc_three !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- o_landy_about_banner::end  -->


    <!-- about_counter_area::start  -->
    <div class="about_counter_area section_spacing6">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-md-6">
                    <div class="about_countBox mb_30 text-center">
                        <h3>{{ _trans('landlord.11,000+')}}</h3>
                        <p>{{ _trans('landlord.Client Worldwide')}} </p>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6">
                    <div class="about_countBox mb_30 text-center">
                        <h3>{{ _trans('landlord.42M+')}}</h3>
                        <p>{{ _trans('landlord.Successful Project')}}</p>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6">
                    <div class="about_countBox mb_30 text-center">
                        <h3>{{ _trans('landlord.8M+')}}</h3>
                        <p>{{ _trans('landlord.Work Employed')}}  </p>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6">
                    <div class="about_countBox mb_30 text-center">
                        <h3>{{ _trans('landlord.295')}}</h3>
                        <p>{{ _trans('landlord.Planning Services')}} </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- about_counter_area::end  -->

    <div class="about_value_section section_spacing6">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-10">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="about_value_textBox">
                                <div class="section__title2 mb_35 mw-100">
                                    <span
                                        class="d-block font_14 f_w_500 text-uppercase secondary_text lh-1 mb_23">{{@$data['about']->title_four}}</span>
                                    <h3>{{@$data['about']->subtitle_four}}</h3>
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-12 ">
                            <div class="about_val_imgs d-flex align-items-center gap_30 mb_30">
                                <div class="about_val_img  felx-grow-1">
                                    <img class="img-fluid" src="{{ asset(@$data['about']->image_four->path) }}" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="list_disc">
                            {!! @$data['about']->desc_four !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- about_cta_area::start  -->
    <div class="about_cta_area" id="image-five-bg">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-lg-6 offset-xl-2 offset-lg-1 col-md-9">
                    <div class="section__title2">
                        <span
                            class="d-block font_14 f_w_500 text-uppercase secondary_text lh-1 mb_23">{{ _trans('landlord.Download App')}}</span>
                        <h3>{{ _trans('landlord.Find your property solution anytime, anywhere..')}}</h3>
                        <p class="font_16 f_w_400 priamry_text ">{{ _trans('landlord.Explore your future home with detailed videos')}}</p>
                        <a href="#" class="o_land_primary_btn style2">{{ _trans('landlord.Download App')}}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
