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
                                <h3 class="title font-700">{{ $data->title }}</h3>
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

    <section class="section-padding3">
        <div class="container">
            <div class="row g-24 justify-content-between">
                @if($data->image)
                    <img class="img-fluid" src="{{ @globalAsset(@$data->image->path) }}" alt="img">
                @endif
                <div class="col-xl-12 col-lg-12">
                    <div class="card about-caption border-0">
                        <div class="card-body mb-30">
                            {!! $data->content !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    @if($data->show_leadership)
        <section class="section-padding3 team-style-seven top-padding section-bg-three">
            <div class="container">
                <!-- Section Title -->
                <div class="row justify-content-center">
                    <div class="col-xl-12">
                        <div
                            class="section-tittle-one mb-45 d-flex justify-content-between flex-wrap align-items-center">
                            <div class="div">
                                <span class="left-line">{{ _trans('landlord.Team') }}</span>
                                <h2 class="title">{{ _trans('landlord.Meet Our Leadership') }}</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row g-24">
                    @foreach($leaderships  as $leadership)
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="single-team text-center white-bg h-calc">
                                <div class="team-img">
                                    <img src="{{ @globalAsset($leadership->image->path) }}" alt="img">
                                </div>
                                <div class="team-caption">
                                    <h3><a href="javascript:void(0)" class="title">{{ $leadership->name }}</a></h3>
                                    <p class="pera">{{ $leadership->designation }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    @if($data->show_testimonial)
        <section class="team-four top-padding bottom-padding">
            <div class="container">
                <!-- Section Title -->
                <div class="row justify-content-center">
                    <div class="col-xxl-7 col-xl-7 col-lg-8 col-md-9 col-sm-10">
                        <div class="section-tittle-pro text-center mb-30">
                            <h2 class="tittle">{{ _trans('landlord.Testimonials') }}</h2>
                        </div>
                    </div>
                </div>
                <div class="row g-24">
                    @foreach($testimonials  as $testimonial)
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="card card-body shadow-sm border-0 bg-white text-center py-5">
                                <div class="team-img">
                                    <img src="{{ @globalAsset($testimonial->image->path) }}" alt="img">
                                </div>
                                <div class="team-caption mt-3">
                                    <h5><a href="javascript:void(0)" class="title">{{ $testimonial->name }}</a></h5>
                                    <p class="pera">{{ $testimonial->designation }}</p>
                                    <p class="pera">{{ $testimonial->message }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
@endsection
