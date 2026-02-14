
@extends('frontend.layouts.master')

@section('content')
<div class="o_landy_blog_section section_spacing6">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <div class="row">

                    @foreach($data['blogs'] as $blog)
                    <div class="col-lg-4 col-md-6">
                        <div class="o_landy_blog_Widget mb_35 style2">
                            <a href="{{route('blogDetails','slug')}}" class="thumb">
                                <img src="{{url(@$blog['image'])}}" alt="">
                            </a>
                            <div class="blog_content">
                                <span>{{ @$blog['created_at'] }} <span class="dot_devide m-0"> / </span> {{ @$blog['category'] }}</span>
                                <a href="{{route('blogDetails',@$blog['slug'])}}">
                                    <h4>{{ @$blog['title'] }}</h4>
                                </a>
                                <p>{{ @$blog['content'] }}</p>
                                <a href="{{route('blogDetails',@$blog['slug'])}}" class="o_landy_readMore_link">+ {{ _trans('landlord.Read more')}}</a>
                            </div>
                        </div>
                    </div>
                    @endforeach

                    <div class="col-12">
                        <div class="o_land_pagination d-flex align-items-center mb_30">
                            <a class="arrow_btns d-inline-flex align-items-center justify-content-center" href="#">
                                <i class="fas fa-chevron-left"></i>
                                <span>{{ _trans('landlord.Prev')}}</span>
                            </a>
                            <a class="page_counter active" href="#">1</a>
                            <a class="page_counter" href="#">2</a>
                            <a class="page_counter" href="#">3</a>
                            <a href="#">...</a>
                            <a class="page_counter" href="#">8</a>
                            <a class="arrow_btns d-inline-flex align-items-center justify-content-center" href="#">
                                <span>{{ _trans('landlord.Next')}}</span>
                                <i class="fas fa-chevron-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3">
                <div class="blog_sidebar_wrap mb_30">
                    <div class="input-group  theme_search_field4 w-100 mb_20 style2">
                        <div class="input-group-prepend">
                            <button class="btn" type="button" > <i class="ti-search"></i> </button>
                        </div>
                        <input type="text" class="form-control" placeholder="Search…">
                    </div>
                    <div class="blog_sidebar_box mb_20">
                        <h4 class="font_18 f_w_700 mb_10">
                            {{ _trans('landlord.Blog categories')}}
                        </h4>
                        <div class="home6_border w-100 mb_20"></div>
                        <ul class="Check_sidebar mb-0">
                            @foreach($data['categories'] as $category)
                            <li>
                                <label class="primary_checkbox d-flex">
                                    <input type="checkbox">
                                    <span class="checkmark mr_10"></span>
                                    <span class="label_name f_w_400">{{ @$category->title }}</span>
                                </label>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="blog_sidebar_box mb_15">
                        <h4 class="font_18 f_w_700 mb_10">
                        {{ _trans('landlord.Recent Blogs')}}
                        </h4>
                        <div class="home6_border w-100 mb_20"></div>
                        <div class="news_lists">
                            @foreach($data['recent_blogs'] as $blog)
                            <div class="single_newslist">
                                <a href="{{route('blogDetails',$blog['slug'])}}">
                                    <h4>{{ @$blog['title'] }}</h4>
                                </a>
                                <p>{{ @$blog['created_at'] }}  /  {{ @$blog['category'] }}</p>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="blog_sidebar_box mb_30 p-0 border-0">
                        <h4 class="font_18 f_w_700 mb_10">
                        {{ _trans('landlord.Keywords')}}
                        </h4>
                        <div class="home6_border w-100 mb_20"></div>
                        <div class="keyword_lists d-flex align-items-center flex-wrap gap_10">
                            <a href="#">Projects</a>
                            <a href="#">Apartments</a>
                            <a href="#">Dhaka City</a>
                            <a href="#">Investment</a>
                            <a href="#">Discount</a>
                            <a href="#">Travel</a>
                            <a href="#">Projects</a>
                            <a href="#">Apartments</a>
                            <a href="#">Dhaka City</a>
                            <a href="#">Investment</a>
                            <a href="#">Discount</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
