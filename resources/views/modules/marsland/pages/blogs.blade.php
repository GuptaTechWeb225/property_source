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
                                <h3 class="title font-700">{{ _trans('landlord.Our Blogs') }}</h3>
                                <div class="breadcrumb-links">
                                    <a class="breadcrumb-link" href="/">{{ _trans('landlord.Home') }}</a>
                                    <a href="#">{{ _trans('landlord.Our Blogs') }}</a>
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
    <div class="blog-area bottom-padding pt-40 border-top">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <!-- TAB -->
                    <ul class="nav tab-style mb-40" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a href="{{ route('blogs') }}" class="nav-link {{ !request('category') ? 'active' : '' }}">
                                <span>All</span>
                            </a>
                        </li>
                        @foreach($categories as $category)
                            <li class="nav-item" role="presentation">
                                <a href="{{ route('blogs',['category' => $category->id]) }}" class="nav-link {{ request('category')  == $category->id ? 'active' : '' }}">
                                    <span>{{ $category->title }}</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                    <div class="row g-24">
                        @forelse($blogs as $blog)
                            <div class="col-xl-4 col-lg-4 col-md-6">
                                <div class="blog-single h-calc radius-8">
                                    <div class="blog-img-cap">
                                        <div class="blog-img imgEffect">
                                            <a href="{{ route('blog.details', $blog->slug) }}">
                                                <img src="{{ @globalAsset($blog->image->path) }}" alt="{{ $blog['title'] }}"
                                                     class="img-cover">
                                            </a>
                                            <span class="post-sticker font-500">{{ @$blog->category->title }}</span>
                                        </div>
                                        <div class="blog-cap">
                                            <h3><a href="{{ route('blog.details', $blog->slug) }}"
                                                   class="title colorEffect line-clamp-2 font-600">{{ $blog->title }}</a>
                                            </h3>
                                            <p class="pera line-clamp-3 mb-15">
                                                {{ Str::limit($blog->content, 100) }}
                                                <a href="#" class="font-700 text-paragraph">
                                                    {{ _trans('common.Read More') }}
                                                </a>
                                            </p>

                                            <ul class="blog-post-info">
                                                <li class="single-list">
                                                    <i class="ri-user-2-line"></i>
                                                    <span class="pera">{{ _trans('common.By Admin') }}</span>
                                                </li>
                                                <li class="single-list">
                                                    <i class="ri-calendar-line"></i>
                                                    <span class="pera">{{ date('F d, Y', strtotime($blog->created_at)) }}</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <h3 class="text-center">{{ _trans('landlord.No data availalbe') }}!</h3>
                        @endforelse
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    {!! $blogs->links() !!}
                </div>
            </div>
        </div>
    </div>

@endsection
