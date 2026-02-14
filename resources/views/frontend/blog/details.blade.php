@extends('frontend.layouts.master')

@section('content')
    <!-- blog_details_area::start  -->
    <div class="blog_details_area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-7">
                    <div class="blog_details_inner m-0">
                        <div class="blog_details_banner">
                            <img class="img-fluid" src="{{ url(@$data['blog_details']['image']) }}" alt="">
                        </div>
                        <div class="blog_post_date d-flex align-items-center">
                            <span>{{ @$data['blog_details']['category'] }}</span>
                            <p>{{ @$data['blog_details']['created_at'] }}</p>
                        </div>
                        <h3>{{ @$data['blog_details']['title'] }}</h3>
                        <p class="mb_25">{{ @$data['blog_details']['content'] }}</p>
                    </div>
                    <div class="blog_details_tags d-flex align-items-center gap_10">
                        <h4 class="font_16 f_w_700 m-0">Tags:</h4>
                        <p class="font_14 f_w_500 m-0">{{ @$data['blog_details']['tags'] }}</p>
                    </div>
                    <div class="blog_reviews">
                        <h3 class="font_30 f_w_700 mb_35 lh-1">{{ $data['blog_reviews']->count() }} Comments</h3>
                        <div class="blog_reviews_inner">
                            @foreach ($data['blog_reviews'] as $reviewers)
                                <div class="single_reviews">
                                    <div class="thumb">
                                        {{ Str::limit($reviewers->name, 2, '') }}
                                    </div>
                                    <div class="review_content">
                                        <div
                                            class="review_content_head d-flex justify-content-between align-items-start flex-wrap">
                                            <div class="review_content_head_left">
                                                <h4 class="f_w_700 font_20">{{ $reviewers->name }}</h4>
                                                <div class="rated_customer d-flex align-items-center">
                                                    <div class="feedmak_stars">
                                                        {!! getRating(@$reviewers->ratings) !!}

                                                    </div>
                                                    <span>2 weeks ago</span>
                                                </div>
                                            </div>
                                        </div>
                                        <p>{{ $reviewers->comments }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="blog_reply_box mb_30">
                        <h3 class="font_30 f_w_700 mb_40 lh-1">Leave a Reply</h3>
                        <form action="{{ route('blogReview', $data['blog_details']['id']) }}" method="POST">
                            @csrf
                            <input type="hidden" name="blog_id" value="{{ $data['blog_details']['id'] }}">
                            <div class="row">
                                @guest
                                <div class="col-lg-12">
                                    <label class="primary_label2">Full Name <span>*</span> </label>
                                    <input name="name" placeholder="Enter Full Name"
                                        class="primary_input3 bg_style1 radius_5px mb_20" required="" type="text">
                                </div>
                                <div class="col-12">
                                    <label class="primary_label2">Email Address <span>*</span> </label>
                                    <input name="email" placeholder="Enter Email Address"
                                        class="primary_input3 bg_style1 radius_5px mb_20" required="" type="email">
                                </div>
                                @endguest
                                <div class="col-12">
                                    <label class="primary_label2">Comments<span>*</span></label>
                                    <textarea name="comments" placeholder="Write your comments here…" class="primary_textarea3 radius_5px mb_15"
                                        required=""></textarea>
                                </div>
                                <div class="col-12 mb-3">
                                    <div id="full-stars-example-two">
                                        <label class="primary_label2">Ratings<span>*</span></label>
                                        <div class="rating-group">
                                            <input disabled checked class="rating__input rating__input--none" name="ratings"
                                                id="rating3-none" value="0" type="radio">
                                            <label aria-label="1 star" class="rating__label" for="rating3-1"><i
                                                    class="rating__icon rating__icon--star fa fa-star"></i></label>
                                            <input class="rating__input" name="ratings" id="rating3-1" value="1"
                                                type="radio">
                                            <label aria-label="2 stars" class="rating__label" for="rating3-2"><i
                                                    class="rating__icon rating__icon--star fa fa-star"></i></label>
                                            <input class="rating__input" name="ratings" id="rating3-2" value="2"
                                                type="radio">
                                            <label aria-label="3 stars" class="rating__label" for="rating3-3"><i
                                                    class="rating__icon rating__icon--star fa fa-star"></i></label>
                                            <input class="rating__input" name="ratings" id="rating3-3" value="3"
                                                type="radio">
                                            <label aria-label="4 stars" class="rating__label" for="rating3-4"><i
                                                    class="rating__icon rating__icon--star fa fa-star"></i></label>
                                            <input class="rating__input" name="ratings" id="rating3-4" value="4"
                                                type="radio">
                                            <label aria-label="5 stars" class="rating__label" for="rating3-5"><i
                                                    class="rating__icon rating__icon--star fa fa-star"></i></label>
                                            <input class="rating__input" name="ratings" id="rating3-5" value="5"
                                                type="radio">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="o_land_primary_btn min_220 style2 text-uppercase text-right"
                                        type="submit">Post comment</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
                <div class="col-xl-3 col-lg-3">
                    <div class="blog_sidebar_wrap mb_30">
                        <div class="input-group  theme_search_field4 w-100 mb_20 style2">
                            <div class="input-group-prepend">
                                <button class="btn" type="button"> <i class="ti-search"></i> </button>
                            </div>
                            <input type="text" class="form-control" placeholder="Search…">
                        </div>
                        <div class="blog_sidebar_box mb_20">
                            <h4 class="font_18 f_w_700 mb_10">
                                Blog categories
                            </h4>
                            <div class="home6_border w-100 mb_20"></div>
                            <ul class="Check_sidebar mb-0">
                                @foreach ($data['categories'] as $category)
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
                                Recent Blogs
                            </h4>
                            <div class="home6_border w-100 mb_20"></div>
                            <div class="news_lists">
                                @foreach ($data['blogs'] as $blog)
                                    <div class="single_newslist">
                                        <a href="{{ route('blogDetails', $blog['slug']) }}">
                                            <h4>{{ @$blog['title'] }}</h4>
                                        </a>
                                        <p>{{ @$blog['created_at'] }} / {{ @$blog['category'] }}</p>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="blog_sidebar_box mb_30 p-0 border-0">
                            <h4 class="font_18 f_w_700 mb_10">
                                Keywords
                            </h4>
                            <div class="home6_border w-100 mb_20"></div>
                            <div class="keyword_lists d-flex align-items-center flex-wrap gap_10">
                                <a href="#">Project</a>
                                <a href="#">Technology</a>
                                <a href="#">Illustration</a>
                                <a href="#">Illustration</a>
                                <a href="#">Project</a>
                                <a href="#">Travel</a>
                                <a href="#">Project</a>
                                <a href="#">Technology</a>
                                <a href="#">Illustration</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- blog_details_area::end  -->
@endsection
