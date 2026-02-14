@extends('frontend.layouts.master')
@section('title', @$data['title'])
@section('content')
    <!-- product_details_wrapper::start  -->

    <div class="product_details_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-xl-9">
                    <div class="row">
                        <div class="col-lg-6 col-xl-6">
                            <div class="slider-container slick_custom_container mb_30">
                                <div class="slider-for">
                                    @forelse ($galleries as $ikey => $gallery)
                                        <div class="item-slick">
                                            <a data-fancybox="gallery" href="{{ @$gallery['image'] }}">
                                                <img class="image-selected" src="{{ @$gallery['image'] }}"
                                                     alt="{{ @$gallery['name'] }}">
                                            </a>
                                            <span class="magnifier-icon"><i class="fas fa-search-plus"></i></span>
                                        </div>
                                    @empty
                                        <img src="{{ url($property['image']) }}">
                                    @endforelse

                                </div>
                                <div id="gallery_1" class="slider-nav">
                                    @foreach ($galleries as $ikey => $gallery)
                                        <div class="item-slick">
                                            <img src="{{ @$gallery['image'] }}" alt="{{ @$gallery['name'] }}">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-6">
                            <div class="product_content_details mb_20">
                                <div class="d-flex align-items-center justify-content-between flex-wrap">
                                    <div class="">
                                        <span class="stoke_badge">{{ $property['deal_type'] }}</span>
                                        <span class="stoke_badge">{{ $property['category'] }}</span>
                                    </div>
                                    <div class="add_wish_compare d-flex alingn-items-center mb_20">
                                        <button onclick="addToWishlist({{ @$data['details']['id'] }})"
                                                class="single_wish_compare text-uppercase text-nowrap bg-transparent border-0">
                                            <i class="ti-heart"></i>Add to Wishlist
                                        </button>

                                    </div>
                                </div>

                                <h3>{{ $property['name'] }}</h3>
                                <div class="viendor_text d-flex align-items-center">
                                    <p class="stock_text"><span class="text-uppercase">Beds:</span>
                                        {{ $property['bedroom'] }} </p>
                                    <p class="stock_text"><span class="text-uppercase">Baths:</span>
                                        {{ $property['bathroom'] }}</p>
                                    <p class="stock_text"><span class="text-uppercase">sqft:</span>
                                        {{ $property['size'] }} </p>
                                </div>
                                <div class="product_ratings">
                                    <h3 class="mb-0 text-theme-color fw-bold">Price
                                        : {{ priceFormat($property['rent_amount']) }}</h3>
                                </div>
                                <div class="product_info">
                                    <div class="d-flex gap-2 flex-column mt-3">
                                        <x-action_button property_id="{{ @$property['id'] }}" advertise_id="{{ @$property['advertise_id'] }}" amount="{{ @$property['rent_amount'] }}"></x-action_button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <ul class="nav lms_tabmenu mb_30" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="overview-tab" data-bs-toggle="tab"
                                            data-bs-target="#overview" type="button" role="tab" aria-controls="overview"
                                            aria-selected="true">overview
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="Basic-tab" data-bs-toggle="tab" data-bs-target="#Basic"
                                            type="button" role="tab" aria-controls="Basic" aria-selected="true">Basic
                                        Info
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="Gallery-tab" data-bs-toggle="tab"
                                            data-bs-target="#Gallery" type="button" role="tab" aria-controls="Gallery"
                                            aria-selected="false">Gallery
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="Tenants-tab" data-bs-toggle="tab"
                                            data-bs-target="#Tenants" type="button" role="tab" aria-controls="Tenants"
                                            aria-selected="false">Tenants
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="Facilities-tab" data-bs-toggle="tab"
                                            data-bs-target="#Facilities" type="button" role="tab"
                                            aria-controls="Facilities" aria-selected="false">Facilities
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="Floor_Plan-tab" data-bs-toggle="tab"
                                            data-bs-target="#Floor_Plan " type="button" role="tab"
                                            aria-controls="Floor_Plan" aria-selected="false">Floor Plan
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="Review-tab" data-bs-toggle="tab"
                                            data-bs-target="#Review " type="button" role="tab" aria-controls="Review"
                                            aria-selected="false">Review
                                    </button>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active " id="overview" role="tabpanel"
                                     aria-labelledby="overview-tab">
                                    <!-- CONTENT ::START  -->
                                    <div class="product_details_dec">
                                        <div class="product_details_dec_header">
                                            <h4 class="font_20 f_w_400 m-0 ">Property Details</h4>
                                        </div>
                                        <div class="product_details_dec_body">
                                            <div class="product_details_dec_img mb_20">
                                                <img class="img-fluid"
                                                     src="{{ $property['image'] }}"
                                                     alt="">
                                            </div>
                                            <div class="single_desc mb_25">
                                                <h5 class="font_18 f_w_400 mb_15 ">Description:</h5>
                                                <p class="mb_20">{{ @$data['details']['description'] }}  </p>
                                            </div>

                                        </div>
                                    </div>
                                    <!-- Basic Info  -->
                                    <div class="product_details_dec mt-4">
                                        <div class="product_details_dec_header">
                                            <h4 class="font_20 f_w_400 m-0 ">Basic Info </h4>
                                        </div>
                                        <div class="product_details_dec_body">
                                            <div class="table-responsive">
                                                <table class="table o_landy_table style5 mb-0">
                                                    <thead>
                                                    <tr>
                                                        <th class="font_14 f_w_700 priamry_text" scope="col">SL
                                                        </th>
                                                        <th class="font_14 f_w_700 priamry_text border-start-0 border-end-0"
                                                            scope="col">Title
                                                        </th>
                                                        <th class="font_14 f_w_700 priamry_text border-start-0 border-end-0"
                                                            scope="col">Content
                                                        </th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td>
                                                            <span class="font_14 f_w_500 mute_text">01</span>
                                                        </td>
                                                        <td>
                                                            <span class="font_14 f_w_500 mute_text">Size</span>
                                                        </td>
                                                        <td>
                                                            <span class="font_14 f_w_500 mute_text"> {{@$data['details']['size'] }} Sq Ft</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <span class="font_14 f_w_500 mute_text">02</span>
                                                        </td>
                                                        <td>
                                                            <span class="font_14 f_w_500 mute_text">Beds</span>
                                                        </td>
                                                        <td>
                                                            <span
                                                                class="font_14 f_w_500 mute_text">{{@$data['details']['bedroom'] }}</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <span class="font_14 f_w_500 mute_text">03</span>
                                                        </td>
                                                        <td>
                                                            <span class="font_14 f_w_500 mute_text">Bath</span>
                                                        </td>
                                                        <td>
                                                            <span
                                                                class="font_14 f_w_500 mute_text">{{@$data['details']['bathroom'] }}</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <span class="font_14 f_w_500 mute_text">04</span>
                                                        </td>
                                                        <td>
                                                            <span class="font_14 f_w_500 mute_text">Rent</span>
                                                        </td>
                                                        <td>
                                                                <span
                                                                    class="font_14 f_w_500 mute_text">{{@$data['details']['rent_amount'] }}</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <span class="font_14 f_w_500 mute_text">05</span>
                                                        </td>
                                                        <td>
                                                            <span class="font_14 f_w_500 mute_text">Type</span>
                                                        </td>
                                                        <td>
                                                            <span
                                                                class="font_14 f_w_500 mute_text">{{@$data['details']['type'] }}</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <span class="font_14 f_w_500 mute_text">06</span>
                                                        </td>
                                                        <td>
                                                            <span class="font_14 f_w_500 mute_text">Completion</span>
                                                        </td>
                                                        <td>
                                                            <span
                                                                class="font_14 f_w_500 mute_text">{{@$data['details']['completion'] }}</span>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Gallery  -->
                                    <div class="product_details_dec mt-4">
                                        <div class="product_details_dec_header">
                                            <h4 class="font_20 f_w_400 m-0 ">Gallery </h4>
                                        </div>
                                        <div class="product_details_dec_body">
                                            <div class="row">
                                                @foreach ($galleries as $gallery)
                                                    <div class="col-lg-3 col-md-4">
                                                        <a class="mb_30 d-block gallery_Img" data-fancybox="gallery"
                                                           data-src="{{ @$gallery['image'] }}">
                                                            <img class="img-fluid" src="{{ @$gallery['image'] }}"
                                                                 alt="">
                                                        </a>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Tenants  -->
                                    <div class="product_details_dec mt-4">
                                        <div class="product_details_dec_header">
                                            <h4 class="font_20 f_w_400 m-0 ">Tenants </h4>
                                        </div>
                                        <div class="product_details_dec_body">
                                            <div class="tanens_wrapper">
                                                <div class="dash_product_lists">

                                                    @foreach ($tenants as $tenant)
                                                        <a href="#"
                                                           class="dashboard_order_list d-flex align-items-center flex-wrap  gap_20">
                                                            <div class="thumb max_100">
                                                                <img class="img-fluid rounded-circle"
                                                                     src="{{ @$tenant['photo'] }}"
                                                                     alt="">
                                                            </div>
                                                            <div class="dashboard_order_content">
                                                                <h4
                                                                    class="font_16 f_w_700 mb-1 lh-base theme_hover {{ $tenant['name'] }}">
                                                                    {{ @$tenant['name'] }}</h4>
                                                                <p class="font_14 f_w_500 d-flex align-items-center gap-2">
                                                                    <i class="ti-calendar secondary_text"></i> <span
                                                                        class="secondary_text">{{date("j F, Y", strtotime($tenant['created_at']))}} </span>
                                                                </p>
                                                            </div>
                                                        </a>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Facilities  -->
                                    <div class="product_details_dec mt-4">
                                        <div class="product_details_dec_header">
                                            <h4 class="font_20 f_w_400 m-0 ">Facilities</h4>
                                        </div>
                                        <div class="product_details_dec_body">
                                            <div class="table-responsive">
                                                <table class="table o_landy_table style5 mb-0">
                                                    <thead>
                                                    <tr>
                                                        <th class="font_14 f_w_700 priamry_text" scope="col"><i
                                                                class="fas fa-sort-down"></i></th>
                                                        <th class="font_14 f_w_700 priamry_text border-start-0 border-end-0"
                                                            scope="col">Title
                                                        </th>
                                                        <th class="font_14 f_w_700 priamry_text border-start-0 border-end-0"
                                                            scope="col">Content
                                                        </th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach ($facilities as $facility)
                                                        <tr>
                                                            <td>
                                                                    <span class="font_14 f_w_500 mute_text"><img
                                                                            class="img-fluid max_14"
                                                                            src="{{ @$facility['icon'] }}"
                                                                            alt=""></span>
                                                            </td>
                                                            <td>
                                                                    <span
                                                                        class="font_14 f_w_500 mute_text">{{ @$facility['name'] }}</span>
                                                            </td>
                                                            <td>
                                                                    <span
                                                                        class="font_14 f_w_500 mute_text">{{ @$facility['content'] }}</span>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Floor  -->
                                    <div class="product_details_dec mt-4">
                                        <div class="product_details_dec_header">
                                            <h4 class="font_20 f_w_400 m-0 ">Floor Plan</h4>
                                        </div>
                                        <div class="product_details_dec_body">
                                            <div class="floorImg cursor_pointer">
                                                @foreach ($floorPlans as $floorPlan)

                                                    <a data-fancybox="floorMap"
                                                       data-src="{{$floorPlan['image']}}">
                                                        <img class="img-fluid"
                                                             src="{{$floorPlan['image']}}"
                                                             alt="">
                                                    </a>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Customer  -->
                                    <div class="product_reviews_wrapper">
                                        <div
                                            class="product_reviews_wrapper_head d-flex align-items-center justify-content-between">
                                            <h4 class="font_20 f_w_700 m-0">Customer Feedback</h4>
                                            <a href="product.php" class="title_link d-flex align-items-center lh-1">
                                                <span class="title_text">View all</span>
                                                <span class="title_icon">
                                                    <i class="fas fa-chevron-right"></i>
                                                </span>
                                            </a>
                                        </div>


                                        <div class="course_cutomer_reviews">
                                            <div class="course_feedback">
                                                <div class="course_feedback_left">

                                                    <h2>{{ $agvRating }}</h2>
                                                    <div class="feedmak_stars">
                                                        {!! getRating($agvRating) !!}
                                                    </div>
                                                    <span>Course Rating</span>
                                                </div>
                                                <div class="feedbark_progressbar">
                                                    <div class="single_progrssbar">
                                                        <div class="progress">
                                                            <div class="progress-bar" role="progressbar"
                                                                 style="width: {{ $ratting[5] }}%" aria-valuenow="25"
                                                                 aria-valuemin="0"
                                                                 aria-valuemax="100">
                                                            </div>
                                                        </div>
                                                        <div class="rating_percent d-flex align-items-center">
                                                            <div class="feedmak_stars d-flex align-items-center">
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                            </div>
                                                            <span>{{ $ratting[5] }}%</span>
                                                        </div>
                                                    </div>
                                                    <div class="single_progrssbar">
                                                        <div class="progress">
                                                            <div class="progress-bar" role="progressbar"
                                                                 style="width: {{ $ratting[4] }}%" aria-valuenow="25"
                                                                 aria-valuemin="0"
                                                                 aria-valuemax="100">
                                                            </div>
                                                        </div>
                                                        <div class="rating_percent d-flex align-items-center">
                                                            <div class="feedmak_stars d-flex align-items-center">
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="far fa-star"></i>
                                                            </div>
                                                            <span>{{ $ratting[4] }}%</span>
                                                        </div>
                                                    </div>
                                                    <div class="single_progrssbar">
                                                        <div class="progress">
                                                            <div class="progress-bar" role="progressbar"
                                                                 style="width: {{ $ratting[3] }}%" aria-valuenow="25"
                                                                 aria-valuemin="0"
                                                                 aria-valuemax="100">
                                                            </div>
                                                        </div>
                                                        <div class="rating_percent d-flex align-items-center">
                                                            <div class="feedmak_stars d-flex align-items-center">
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="far fa-star"></i>
                                                                <i class="far fa-star"></i>
                                                            </div>
                                                            <span>{{ $ratting[3] }}%</span>
                                                        </div>
                                                    </div>
                                                    <div class="single_progrssbar">
                                                        <div class="progress">
                                                            <div class="progress-bar" role="progressbar"
                                                                 style="width: {{ $ratting[2] }}%" aria-valuenow="25"
                                                                 aria-valuemin="0"
                                                                 aria-valuemax="100">
                                                            </div>
                                                        </div>
                                                        <div class="rating_percent d-flex align-items-center">
                                                            <div class="feedmak_stars d-flex align-items-center">
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="far fa-star"></i>
                                                                <i class="far fa-star"></i>
                                                                <i class="far fa-star"></i>
                                                            </div>
                                                            <span>{{ $ratting[2] }}%</span>
                                                        </div>
                                                    </div>
                                                    <div class="single_progrssbar">
                                                        <div class="progress">
                                                            <div class="progress-bar" role="progressbar"
                                                                 style="width: {{ $ratting[1] }}%" aria-valuenow="25"
                                                                 aria-valuemin="0"
                                                                 aria-valuemax="100">
                                                            </div>
                                                        </div>
                                                        <div class="rating_percent d-flex align-items-center">
                                                            <div class="feedmak_stars d-flex align-items-center">
                                                                <i class="fas fa-star"></i>
                                                                <i class="far fa-star"></i>
                                                                <i class="far fa-star"></i>
                                                                <i class="far fa-star"></i>
                                                                <i class="far fa-star"></i>
                                                            </div>
                                                            <span>{{ $ratting[1] }}%</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="customers_reviews">
                                                <div class="blog_reviews mb_30">
                                                    <h3 class="font_30 f_w_700 mb_35 lh-1">{{ @$property_reviews->count() }}
                                                        Comments</h3>
                                                    <div class="blog_reviews_inner">
                                                        @foreach (@$property_reviews as $reviewers)
                                                            <div class="single_reviews">
                                                                <div class="thumb">
                                                                    {{ Str::limit($reviewers->name, 2, '') }}
                                                                </div>
                                                                <div class="review_content">
                                                                    <div
                                                                        class="review_content_head d-flex justify-content-between align-items-start flex-wrap">
                                                                        <div class="review_content_head_left">
                                                                            <h4 class="f_w_700 font_20">{{ $reviewers->name }}</h4>
                                                                            <div
                                                                                class="rated_customer d-flex align-items-center">
                                                                                <div class="feedmak_stars">
                                                                                    {!! getRating(@$reviewers->ratings) !!}

                                                                                </div>
                                                                                <span>{{ Carbon\Carbon::parse($reviewers->created_at)->diffForHumans() }}</span>
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
                                                    <form action="{{ route('propertyReview', @$property['id']) }}"
                                                          method="POST">
                                                        @csrf
                                                        <input type="hidden" name="property_id"
                                                               value="{{ @$property['id'] }}">
                                                        <div class="row">
                                                            @guest
                                                                <div class="col-lg-12">
                                                                    <label class="primary_label2">Full Name
                                                                        <span>*</span> </label>
                                                                    <input name="name" placeholder="Enter Full Name"
                                                                           class="primary_input3 bg_style1 radius_5px mb_20"
                                                                           required="" type="text">
                                                                </div>
                                                                <div class="col-12">
                                                                    <label class="primary_label2">Email Address
                                                                        <span>*</span> </label>
                                                                    <input name="email"
                                                                           placeholder="Enter Email Address"
                                                                           class="primary_input3 bg_style1 radius_5px mb_20"
                                                                           required="" type="email">
                                                                </div>
                                                            @endguest
                                                            <div class="col-12">
                                                                <label
                                                                    class="primary_label2">Comments<span>*</span></label>
                                                                <textarea name="comments"
                                                                          placeholder="Write your comments here…"
                                                                          class="primary_textarea3 radius_5px mb_15"
                                                                          required=""></textarea>
                                                            </div>
                                                            <div class="col-12 mb-3">
                                                                <div id="full-stars-example-two">
                                                                    <label class="primary_label2">Ratings<span>*</span></label>
                                                                    <div class="rating-group">
                                                                        <input disabled checked
                                                                               class="rating__input rating__input--none"
                                                                               name="ratings"
                                                                               id="rating3-none" value="0" type="radio">
                                                                        <label aria-label="1 star" class="rating__label"
                                                                               for="rating3-1"><i
                                                                                class="rating__icon rating__icon--star fa fa-star"></i></label>
                                                                        <input class="rating__input" name="ratings"
                                                                               id="rating3-1" value="1"
                                                                               type="radio">
                                                                        <label aria-label="2 stars"
                                                                               class="rating__label" for="rating3-2"><i
                                                                                class="rating__icon rating__icon--star fa fa-star"></i></label>
                                                                        <input class="rating__input" name="ratings"
                                                                               id="rating3-2" value="2"
                                                                               type="radio">
                                                                        <label aria-label="3 stars"
                                                                               class="rating__label" for="rating3-3"><i
                                                                                class="rating__icon rating__icon--star fa fa-star"></i></label>
                                                                        <input class="rating__input" name="ratings"
                                                                               id="rating3-3" value="3"
                                                                               type="radio">
                                                                        <label aria-label="4 stars"
                                                                               class="rating__label" for="rating3-4"><i
                                                                                class="rating__icon rating__icon--star fa fa-star"></i></label>
                                                                        <input class="rating__input" name="ratings"
                                                                               id="rating3-4" value="4"
                                                                               type="radio">
                                                                        <label aria-label="5 stars"
                                                                               class="rating__label" for="rating3-5"><i
                                                                                class="rating__icon rating__icon--star fa fa-star"></i></label>
                                                                        <input class="rating__input" name="ratings"
                                                                               id="rating3-5" value="5"
                                                                               type="radio">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <button
                                                                    class="o_land_primary_btn min_220 style2 text-uppercase text-right"
                                                                    type="submit">Post comment
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </form>

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <!-- CONTENT ::END    -->
                                <div class="tab-pane fade " id="Basic" role="tabpanel" aria-labelledby="Basic-tab">
                                    <!-- CONTENT ::START  -->
                                    <div class="product_details_dec">
                                        <div class="product_details_dec_header">
                                            <h4 class="font_20 f_w_400 m-0 ">Basic Info </h4>
                                        </div>
                                        <div class="product_details_dec_body">
                                            <div class="table-responsive">
                                                <table class="table o_landy_table style5 mb-0">
                                                    <thead>
                                                    <tr>
                                                        <th class="font_14 f_w_700 priamry_text" scope="col">SL
                                                        </th>
                                                        <th class="font_14 f_w_700 priamry_text border-start-0 border-end-0"
                                                            scope="col">Title
                                                        </th>
                                                        <th class="font_14 f_w_700 priamry_text border-start-0 border-end-0"
                                                            scope="col">Content
                                                        </th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td>
                                                            <span class="font_14 f_w_500 mute_text">01</span>
                                                        </td>
                                                        <td>
                                                            <span class="font_14 f_w_500 mute_text">Size</span>
                                                        </td>
                                                        <td>
                                                            <span class="font_14 f_w_500 mute_text"> {{@$data['details']['size'] }} Sq Ft</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <span class="font_14 f_w_500 mute_text">02</span>
                                                        </td>
                                                        <td>
                                                            <span class="font_14 f_w_500 mute_text">Beds</span>
                                                        </td>
                                                        <td>
                                                            <span
                                                                class="font_14 f_w_500 mute_text">{{@$data['details']['bedroom'] }}</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <span class="font_14 f_w_500 mute_text">03</span>
                                                        </td>
                                                        <td>
                                                            <span class="font_14 f_w_500 mute_text">Bath</span>
                                                        </td>
                                                        <td>
                                                            <span
                                                                class="font_14 f_w_500 mute_text">{{@$data['details']['bathroom'] }}</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <span class="font_14 f_w_500 mute_text">04</span>
                                                        </td>
                                                        <td>
                                                            <span class="font_14 f_w_500 mute_text">Rent</span>
                                                        </td>
                                                        <td>
                                                                <span
                                                                    class="font_14 f_w_500 mute_text">{{@$data['details']['rent_amount'] }}</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <span class="font_14 f_w_500 mute_text">05</span>
                                                        </td>
                                                        <td>
                                                            <span class="font_14 f_w_500 mute_text">Type</span>
                                                        </td>
                                                        <td>
                                                            <span
                                                                class="font_14 f_w_500 mute_text">{{@$data['details']['type'] }}</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <span class="font_14 f_w_500 mute_text">06</span>
                                                        </td>
                                                        <td>
                                                            <span class="font_14 f_w_500 mute_text">Completion</span>
                                                        </td>
                                                        <td>
                                                            <span
                                                                class="font_14 f_w_500 mute_text">{{@$data['details']['completion'] }}</span>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- CONTENT ::END    -->
                                </div>
                                <div class="tab-pane fade" id="Gallery" role="tabpanel" aria-labelledby="Gallery-tab">
                                    <!-- CONTENT ::START  -->
                                    <div class="product_details_dec">
                                        <div class="product_details_dec_header">
                                            <h4 class="font_20 f_w_400 m-0 ">Gallery </h4>
                                        </div>
                                        <div class="product_details_dec_body">
                                            <div class="row">

                                                @foreach ($galleries as $gallery)
                                                    <div class="col-lg-3 col-md-4">
                                                        <a class="mb_30 d-block gallery_Img" data-fancybox="gallery"
                                                           data-src="{{ @$gallery['image'] }}">
                                                            <img class="img-fluid" src="{{ @$gallery['image'] }}"
                                                                 alt="">
                                                        </a>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <!-- CONTENT ::END    -->
                                </div>
                                <div class="tab-pane fade" id="Tenants" role="tabpanel" aria-labelledby="Tenants-tab">
                                    <!-- CONTENT ::START  -->
                                    <div class="product_details_dec">
                                        <div class="product_details_dec_header">
                                            <h4 class="font_20 f_w_400 m-0 ">Tenants </h4>
                                        </div>
                                        <div class="product_details_dec_body">
                                            <div class="tanens_wrapper">
                                                <div class="dash_product_lists">
                                                    @foreach ($tenants as $tenant)
                                                        <a href="#"
                                                           class="dashboard_order_list d-flex align-items-center flex-wrap  gap_20">
                                                            <div class="thumb max_100">
                                                                <img class="img-fluid rounded-circle"
                                                                     src="{{ url('frontend/img/profile/01.png') }}"
                                                                     alt="">
                                                            </div>
                                                            <div class="dashboard_order_content">
                                                                <h4 class="font_16 f_w_700 mb-1 lh-base theme_hover">
                                                                    {{ @$tenant['name'] }}</h4>
                                                                <p class="font_14 f_w_500 d-flex align-items-center gap-2">
                                                                    <i class="ti-calendar secondary_text"></i> <span
                                                                        class="secondary_text">{{date("j F, Y", strtotime($tenant['created_at']))}}</span>
                                                                </p>
                                                            </div>
                                                        </a>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- CONTENT ::END    -->
                                </div>
                                <div class="tab-pane fade " id="Facilities" role="tabpanel"
                                     aria-labelledby="Facilities-tab">
                                    <!-- CONTENT ::START  -->
                                    <div class="product_details_dec">
                                        <div class="product_details_dec_header">
                                            <h4 class="font_20 f_w_400 m-0 ">Facilities</h4>
                                        </div>
                                        <div class="product_details_dec_body">
                                            <div class="table-responsive">
                                                <table class="table o_landy_table style5 mb-0">
                                                    <thead>
                                                    <tr>
                                                        <th class="font_14 f_w_700 priamry_text" scope="col"><i
                                                                class="fas fa-sort-down"></i></th>
                                                        <th class="font_14 f_w_700 priamry_text border-start-0 border-end-0"
                                                            scope="col">Title
                                                        </th>
                                                        <th class="font_14 f_w_700 priamry_text border-start-0 border-end-0"
                                                            scope="col">Content
                                                        </th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach ($facilities as $facility)
                                                        <tr>
                                                            <td>
                                                                    <span class="font_14 f_w_500 mute_text"><img
                                                                            class="img-fluid max_14"
                                                                            src="{{ @$facility['icon'] }}"
                                                                            alt=""></span>
                                                            </td>
                                                            <td>
                                                                    <span
                                                                        class="font_14 f_w_500 mute_text">{{ @$facility['name'] }}</span>
                                                            </td>
                                                            <td>
                                                                    <span
                                                                        class="font_14 f_w_500 mute_text">{{ @$facility['content'] }}</span>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- CONTENT ::END    -->
                                </div>
                                <div class="tab-pane fade" id="Floor_Plan" role="tabpanel"
                                     aria-labelledby="Floor_Plan-tab">
                                    <!-- CONTENT ::START  -->
                                    <div class="product_details_dec">
                                        <div class="product_details_dec_header">
                                            <h4 class="font_20 f_w_400 m-0 ">Floor Plan</h4>
                                        </div>
                                        <div class="product_details_dec_body">

                                            @foreach ($floorPlans as $floor)
                                                <div class="floorImg cursor_pointer">
                                                    <a data-fancybox="floorMap" data-src="{{ $floor['image'] }}">
                                                        <img class="img-fluid" src="{{ $floor['image'] }}"
                                                             alt="">
                                                    </a>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <!-- CONTENT ::END    -->
                                </div>
                                <div class="tab-pane fade" id="Review" role="tabpanel" aria-labelledby="Review-tab">
                                    <!-- CONTENT ::START  -->
                                    <div class="product_reviews_wrapper mt-0">
                                        <div
                                            class="product_reviews_wrapper_head d-flex align-items-center justify-content-between">
                                            <h4 class="font_20 f_w_700 m-0">Customer Feedback</h4>
                                            <a href="product.php" class="title_link d-flex align-items-center lh-1">
                                                <span class="title_text">View all</span>
                                                <span class="title_icon">
                                                    <i class="fas fa-chevron-right"></i>
                                                </span>
                                            </a>
                                        </div>
                                        <div class="course_cutomer_reviews">
                                            <div class="course_feedback">
                                                <div class="course_feedback_left">

                                                    <h2>{{ $agvRating }}</h2>
                                                    <div class="feedmak_stars">
                                                        {!! getRating($agvRating) !!}
                                                    </div>
                                                    <span>Course Rating</span>
                                                </div>
                                                <div class="feedbark_progressbar">
                                                    <div class="single_progrssbar">
                                                        <div class="progress">
                                                            <div class="progress-bar" role="progressbar"
                                                                 style="width: {{ $ratting[5] }}%" aria-valuenow="25"
                                                                 aria-valuemin="0"
                                                                 aria-valuemax="100">
                                                            </div>
                                                        </div>
                                                        <div class="rating_percent d-flex align-items-center">
                                                            <div class="feedmak_stars d-flex align-items-center">
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                            </div>
                                                            <span>{{ $ratting[5] }}%</span>
                                                        </div>
                                                    </div>
                                                    <div class="single_progrssbar">
                                                        <div class="progress">
                                                            <div class="progress-bar" role="progressbar"
                                                                 style="width: {{ $ratting[4] }}%" aria-valuenow="25"
                                                                 aria-valuemin="0"
                                                                 aria-valuemax="100">
                                                            </div>
                                                        </div>
                                                        <div class="rating_percent d-flex align-items-center">
                                                            <div class="feedmak_stars d-flex align-items-center">
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="far fa-star"></i>
                                                            </div>
                                                            <span>{{ $ratting[4] }}%</span>
                                                        </div>
                                                        <div class="progress-bar" role="progressbar"
                                                             style="width: {{ $ratting[3] }}%" aria-valuenow="25"
                                                             aria-valuemin="0"
                                                             aria-valuemax="100">
                                                        </div>
                                                    </div>
                                                    <div class="rating_percent d-flex align-items-center">
                                                        <div class="feedmak_stars d-flex align-items-center">
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="far fa-star"></i>
                                                            <i class="far fa-star"></i>
                                                        </div>
                                                        <span>{{ $ratting[3] }}%</span>
                                                    </div>
                                                </div>
                                                <div class="single_progrssbar">
                                                    <div class="progress">
                                                        <div class="progress-bar" role="progressbar"
                                                             style="width: {{ $ratting[2] }}%" aria-valuenow="25"
                                                             aria-valuemin="0"
                                                             aria-valuemax="100">
                                                        </div>
                                                    </div>
                                                    <div class="rating_percent d-flex align-items-center">
                                                        <div class="feedmak_stars d-flex align-items-center">
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="far fa-star"></i>
                                                            <i class="far fa-star"></i>
                                                            <i class="far fa-star"></i>
                                                        </div>
                                                        <span>{{ $ratting[2] }}%</span>
                                                    </div>
                                                </div>
                                                <div class="single_progrssbar">
                                                    <div class="progress">
                                                        <div class="progress-bar" role="progressbar"
                                                             style="width: {{ $ratting[1] }}%" aria-valuenow="25"
                                                             aria-valuemin="0"
                                                             aria-valuemax="100">
                                                        </div>
                                                    </div>
                                                    <div class="rating_percent d-flex align-items-center">
                                                        <div class="feedmak_stars d-flex align-items-center">
                                                            <i class="fas fa-star"></i>
                                                            <i class="far fa-star"></i>
                                                            <i class="far fa-star"></i>
                                                            <i class="far fa-star"></i>
                                                            <i class="far fa-star"></i>
                                                        </div>
                                                        <span>{{ $ratting[1] }}%</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="customers_reviews">
                                            <div class="blog_reviews mb_30">

                                                <div class="blog_reviews_inner">
                                                    @foreach (@$property_reviews as $reviewers)
                                                        <div class="single_reviews">
                                                            <div class="review_content">
                                                                <div
                                                                    class="review_content_head d-flex justify-content-between align-items-start flex-wrap">
                                                                    <div class="review_content_head_left">
                                                                        <h4 class="f_w_700 font_20">{{ $reviewers->name }}</h4>
                                                                        <div
                                                                            class="rated_customer d-flex align-items-center">
                                                                            <div class="feedmak_stars">
                                                                                {!! getRating(@$reviewers->ratings) !!}

                                                                            </div>
                                                                            <span>{{ Carbon\Carbon::parse($reviewers->created_at)->diffForHumans() }}</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <p>{{ $reviewers->comments }}</p>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <!-- CONTENT ::END    -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3">
                    <div class="o_landcart_delivery_wiz mb_20">
                        <div class="o_landcart_delivery_wiz_head">
                            <h4 class="font_18 f_w_700 m-0">Property Owner</h4>
                        </div>
                        <div class="o_landcart_delivery_wiz_body">
                            <div class="logIcon mb-3">
                                <img class="img-fluid" src="{{ url($user->image->path) }}" alt="">
                            </div>
                            <h4 class="font_16 f_w_700 mb_6">{{  $user->name }}</h4>
                            <p class="delivery_text font_14 f_w_400">Address: {{ $user->present_address}}</p>
                        </div>
                    </div>
                    <div class="o_landcart_delivery_wiz mb_20">
                        <div class="o_landcart_delivery_wiz_head">
                            <h4 class="font_18 f_w_700 m-0">{{ _trans('landlord.Location') }}</h4>
                        </div>
                        <div class="o_landcart_delivery_wiz_body">
                            <p>{{ _trans('landlord.country') }} : {{ $address['country'] }}</p>
                            <p>{{ _trans('landlord.address') }} : {{ $address['address'] }}</p>
                            {{ $address['latitude']  }}
                            {{ $address['longitude']  }}
                        </div>
                    </div>
                    <div class="o_landcart_delivery_wiz mb_20">
                        <div class="o_landcart_delivery_wiz_head">
                            <h4 class="font_18 f_w_700 m-0">Terms Conditions</h4>
                        </div>
                        <div class="o_landcart_delivery_wiz_body">
                            {!! $advertisement->terms_condition !!}
                        </div>
                    </div>
                    <div class="o_landcart_delivery_wiz mb_30">
                        <div class="o_landcart_delivery_wiz_head">
                            <h4 class="font_18 f_w_700 m-0">Contact With seller</h4>
                        </div>
                        <div class="o_landcart_delivery_wiz_body">
                            <div class="contact_box">
                                <input name="name" placeholder="Name" onfocus="this.placeholder = ''"
                                       onblur="this.placeholder = 'Enter your Name'"
                                       class="primary_input3 radius_5px mb_10"
                                       required="" type="text">
                            </div>
                            <div class="contact_box">
                                <input name="name" placeholder="Enter email" onfocus="this.placeholder = ''"
                                       onblur="this.placeholder = 'Enter email'" class="primary_input3 radius_5px mb_10"
                                       required="" type="email">
                            </div>
                            <div class="contact_box">
                                <input name="name" placeholder="Enter your Number" onfocus="this.placeholder = ''"
                                       onblur="this.placeholder = 'Enter your Number ?'"
                                       class="primary_input3 radius_5px mb_10" required="" type="text">
                            </div>
                            <div class="contact_box">
                                <textarea placeholder="message" class="primary_textarea mb_10"></textarea>
                            </div>
                            <div class="contact_box d-flex gap-2">
                                @include('frontend.property.partials.call-email')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- product_details_wrapper::end  -->


    <!-- sujjested_prosuct_area::start  -->
    <div class="sujjested_prosuct_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section__title d-flex align-items-center gap-3 mb_30">
                        <h3 class="m-0 flex-fill">Related Property</h3>
                    </div>
                </div>
            </div>
            <!-- call getRelatedProperties() for loading the related properties -->
            <div class="row custom_rowProduct " id="loading_related_properties">
            </div>

        </div>
    </div>
    <!-- sujjested_prosuct_area::end  -->
@endsection
@section('script')
    <script>
        function ADDTOCART(propertyId, amount, advertiseId, discountAmount) {
            var formData = {
                property_id: propertyId,
                amount: amount,
                advertisement_id: advertiseId,
                discount_amount: discountAmount,
            };

            console.log(formData)

            $.ajax({
                type: "post",
                dataType: "json",
                data: formData,
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
                url: "{{ route('cart.addtocart') }}",
                success: function (data) {
                    if (data.status == true) {
                        $(".cart-view").html(data.data.count);
                        location.reload();
                        toastr.success("Property Added Successfully", "Success");
                    } else {
                        console.log(data);
                        toastr.warning("Property Already Added", "Success");
                    }
                },
                error: function (data) {
                    console.log(data);
                    toastr.Error("Something Went Wrong", "Error");
                },
            });
        }

        // $('#daterange').hide()
        function advertisementType() {
            // var advertisementType = $('#advertisementType').val();
            // var propertyID = $('#propertyID').val();
            var advertisementData = @json($advertisement);
            adlist();

            function adlist() {
                let adTypeVal = $('#advertisementType').val();
                var advertisementDataDiv = document.getElementById('advertisementData');
                var advertisement = null;
                for (var i = 0; i < advertisementData.length; i++) {

                    if (advertisementData[i].advertisement_type == adTypeVal) {

                        advertisement = advertisementData[i];
                        break;
                    }
                }

                // Display advertisement data
                if (advertisement) {
                    var rentType = advertisement.rent_type == 1 ? 'Monthly' : 'Yearly';

                    if (advertisement.advertisement_type == 1) {
                        advertisementDataDiv.innerHTML = '<h4 class="discount_prise">৳ ' + advertisement.booking_amount + '  <span class="stoke_badge">Booking Amount</span>' + '</h4>' +
                            '<h4 class="discount_prise">৳ ' + advertisement.rent_amount + ' /' + rentType + ' <span class="stoke_badge">Rent Amount</span>' + '</h4>' +
                            '<p class="pro_details_text">+ Available from ' + advertisement.rent_start_date + ' to ' + advertisement.rent_end_date + '</p>' +
                            '<input type="hidden" id="dateRange" value="' + advertisement.rent_start_date + ' - ' + advertisement.rent_end_date + '" />';

                    } else if (advertisement.advertisement_type == 2) {
                        advertisementDataDiv.innerHTML = '<h4 class="discount_prise">৳ ' + advertisement.booking_amount + '  <span class="stoke_badge">Booking Amount</span>' + '</h4>' +
                            '<h4 class="discount_prise">৳ ' + advertisement.sell_amount + ' <span class="stoke_badge">Buy Amount</span>' + '</h4>' +
                            '<p class="pro_details_text">+ Available from ' + advertisement.sell_start_date + '</p>' +
                            '<input type="hidden" id="dateRange" value=' + advertisement.sell_start_date + ' />';
                    }
                } else {
                    advertisementDataDiv.innerHTML = '';

                }
            }

        }

        //Date range picker
        $(function () {
            $('input[name="daterange"]').daterangepicker({
                autoUpdateInput: false
            });
        });
        $('input[name="daterange"]').on('apply.daterangepicker', function (ev, picker) {
            $(this).val(picker.startDate.format('YYYY-MM-DD') + ' - ' + picker.endDate.format('YYYY-MM-DD'));
        });

        var advertisementData = @json($advertisement);
        adlist();

        function adlist() {
            let adTypeVal = $('#advertisementType').val();
            var advertisementDataDiv = document.getElementById('advertisementData');
            var advertisement = null;
            for (var i = 0; i < advertisementData.length; i++) {

                if (advertisementData[i].advertisement_type == adTypeVal) {

                    advertisement = advertisementData[i];
                    break;
                }
            }

            // Display advertisement data
            if (advertisement) {
                var rentType = advertisement.rent_type == 1 ? 'Monthly' : 'Yearly';

                if (advertisement.advertisement_type == 1) {
                    advertisementDataDiv.innerHTML = '<h4 class="discount_prise">৳ ' + advertisement.booking_amount + '  <span class="stoke_badge">Booking Amount</span>' + '</h4>' +
                        '<h4 class="discount_prise">৳ ' + advertisement.rent_amount + ' /' + rentType + ' <span class="stoke_badge">Rent Amount</span>' + '</h4>' +
                        '<p class="pro_details_text">+ Available from ' + advertisement.rent_start_date + ' to ' + advertisement.rent_end_date + '</p>' +
                        '<input type="hidden" id="dateRange" value="' + advertisement.rent_start_date + ' - ' + advertisement.rent_end_date + '" />';

                } else if (advertisement.advertisement_type == 2) {
                    advertisementDataDiv.innerHTML = '<h4 class="discount_prise">৳ ' + advertisement.booking_amount + '  <span class="stoke_badge">Booking Amount</span>' + '</h4>' +
                        '<h4 class="discount_prise">৳ ' + advertisement.sell_amount + ' <span class="stoke_badge">Buy Amount</span>' + '</h4>' +
                        '<p class="pro_details_text">+ Available from ' + advertisement.sell_start_date + '</p>' +
                        '<input type="hidden" id="dateRange" value=' + advertisement.sell_start_date + ' />';
                }
            } else {
                advertisementDataDiv.innerHTML = '';

            }
        }
    </script>

@endsection

