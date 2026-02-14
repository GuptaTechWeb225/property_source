@extends('marsland::layouts.master')
@section('title', _trans('About Us'))
@section('marsland-content')
    <!-- Breadcrumb Area S t a r t-->
    <section class="ot-breadcrumb-area breadcrumb-gradient">
        <div class="container">
            <div class="ot-breadcrumb-inner">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="ot-breadcrumb-inner-wrapper text-center">
                            <div class="breadcrumb-text">
                                <h3 class="title font-700">{{ _trans('landlord.About details') }}</h3>
                                <div class="line-dro mt-20">
                                    <span class="line-left diamond-square-shape"></span>
                                    <span class="line-circle"></span>
                                    <span class="line-right diamond-square-shape2"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End-of Breadcrumb-->

    <!-- About area S t a r t -->
    <section class="about-area section-padding3">
        <div class="container">
            <div class="row g-24 justify-content-between">
                <img class="img-fluid" src="{{ @globalAsset($content->image_one->path) }}" alt="img">
                <div class="col-xl-12 col-lg-12">
                    <div class="about-caption">
                        <div class="mb-30">
                            <h3 class="small-title text-paragraph font-700">{{ $content->title_one }}</h3>
                            <p class="pera text-normal text-16">{{ $content->subtitle_one }}</p>
                        </div>
                        <div class="mb-30">
                            {!! $content->desc_one !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End-of about -->

    <!-- our Mission & vision -->
    <section class="our-mission-vision about-area">
        <div class="container">
            <div class="row align-items-center g-24">
                <div class="col-xl-5 col-lg-6">
                    <img src="{{ @globalAsset($content->image_two->path) }}" alt="" class="w-100">
                </div>
                <div class="col-xl-7 col-lg-6">
                    <div class="about-caption">
                        <div class="mb-30">
                            <h3 class="small-title text-paragraph font-700">{{ $content->title_two }}</h3>
                            <p class="pera pt-20 text-16">{{ $content->subtitle_two }}</p>
                        </div>
                        <div class="about-info mb-50">
                            {!! $content->desc_two !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End-of our Mission & vision -->

    <!-- our Mission & vision -->
    <section class="our-mission-vision about-area section-padding2">
        <div class="container">
            <div class="row align-items-center g-24">
                <div class="col-xl-7 col-lg-6">
                    <div class="about-caption">
                        <div class="mb-30">
                            <h3 class="small-title text-paragraph font-700">{{ $content->title_three }}</h3>
                            <p class="pera pt-20 text-16">{{ $content->subtitle_three }}</p>
                        </div>
                        <div class="about-info mb-50">
                            {!! $content->desc_three !!}
                        </div>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-6">
                    <div class="about-caption">
                        <img src="{{ @globalAsset($content->image_three->path) }}" alt="img" class="w-100">
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
