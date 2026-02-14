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
                                <h3 class="title font-700">{{ _trans('landlord.Blogs details') }}</h3>
                                <div class="breadcrumb-links">
                                    <a class="breadcrumb-link" href="{{ route('home') }}">{{ _trans('landlord.Home') }}</a>
                                    <a href="/">{{ _trans('landlord.Blogs details') }}</a>
                                </div>
                                <div class="line-dro">
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

    <!-- Our Blogs S t a r t -->
    <div class="blog-details section-padding border-top">
        <div class="container">
            <div class="row g-24">
                <div class="col-xxl-8 col-xl-9">
                    <!-- Details img -->
                    <div class="blog-details-wrapper mb-40">
                        <div class="details-img imgEffect radius-6 mb-35">
                            <img src="{{ @globalAsset($blog->image->path) }}" alt="{{ $blog->title }}">
                        </div>
                    </div>

                    <!-- Share Post -->
                    <div class="d-flex justify-content-between align-items-start mb-10">
                        <!-- Blog Post user -->
                        <div class="user-profile2 mb-24">

                            <div class="user-cap">

                            </div>
                        </div>
                        <!-- social -->
                        <div class="social-share footer-social2 mb-24">
                            <a href="https://www.facebook.com/{{ $blog->slug }}" class="twitter wow fadeInDown" data-wow-delay="0.0s"><i class="ri-twitter-line"></i></a>
                            <a href="https://www.facebook.com/{{ $blog->slug }}" class="linkedin wow fadeInDown" data-wow-delay="0.1s"><i class="ri-linkedin-fill"></i></a>
                            <a href="https://www.facebook.com/{{ $blog->slug }}" class="facebook wow fadeInDown" data-wow-delay="0.2s"><i class="ri-facebook-fill"></i></a>
                            <a href="https://www.facebook.com/{{ $blog->slug }}" class="share-btn ml-20 wow fadeInDown" data-wow-delay="0.3s"><i class="ri-share-line"></i></a>
                        </div>
                    </div>

                    <!-- Title -->
                    <div class="section-tittle-two mb-30">
                        <h2 class="title text-capitalize font-600">{{ $blog->title }}</h2>
                    </div>

                    <!-- Single -->
                    <div class="single-description mb-20">
                        {!! $blog->content !!}
                    </div>

                    <div class="case-study">
                        @if($blog->case_study)
                            <a href="{{route('case_study.details',$blog->case_study->slug)}}"> <h6>{{$blog->case_study->title}}</h6></a>
                        @endif
                    </div>
                </div>
                <div class="col-xxl-4 col-xl-4 col-lg-12">
                    <div class="ot-card mb-24">
                        <!-- Title -->
                        <div class="section-tittle-four mb-20">
                            <h5 class="title text-capitalize font-600">{{ _trans('lanlord.Latest Blogs') }}</h5>
                        </div>
                        @foreach($latest_blogs as $latest_blog)
                        <div class="single-blogs single-blogs2 radius-6 white-bg mb-10">
                            <div class="blog-content-box d-flex align-items-center">
                                <div class="blog-img imgEffect radius-4">
                                    <a href="{{ route('blog.details', $latest_blog->slug) }}"><img src="{{ @globalAsset($latest_blog->image->path) }}" class="img-cover" alt="img"></a>
                                </div>
                                <div class="blog-content">
                                    <div class="capt">
                                        <h3>
                                            <a href="{{ route('blog.details', $latest_blog->slug) }}" class="title colorEffect font-600 line-clamp-2">
                                                {{ $latest_blog->title }}
                                            </a>
                                        </h3>
                                        <p class="pera line-clamp-1">{{ date('d M', strtotime($latest_blog->created_at)) }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="ot-card mb-24">
                        <!-- Title -->
                        <div class="section-tittle-four mb-20">
                            <h5 class="title text-capitalize font-600">{{ _trans('landlord.Tags') }}</h5>
                        </div>
                        @php
                            $tags = explode(',', $blog->tags)
                        @endphp
                        @foreach($tags as $tag)
                            <a href="{{ route('blogs',['tag' => $tag]) }}" class="btn btn-primary m-2 text-capitalize">{{ $tag }}</a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End-of Our Blogs -->

@endsection
