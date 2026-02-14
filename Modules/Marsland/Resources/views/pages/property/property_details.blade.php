@extends('marsland::layouts.master')
@section('title', @$property['name'])
@section('marsland-content')
    <!-- Breadcrumb Area S t a r t-->
    <section class="ot-breadcrumb-area breadcrumb-gradient">
        <div class="container">
            <div class="ot-breadcrumb-inner">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="ot-breadcrumb-inner-wrapper text-center">
                            <div class="breadcrumb-text">
                                <h3 class="title font-700">{{ _trans('landlord.Property Details') }}</h3>
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

    <!-- Our Blogs S t a r t -->
    <div class="product-details section-bg-two border-top section-padding3">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-5 col-md-5">
                    <div class="white-bg radius-12 p-4 mb-30">
                        <!-- TAB -->
                        <ul class="tab-style2" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="one-tab" data-bs-toggle="tab" data-bs-target="#one"
                                        type="button" role="tab" aria-controls="one" aria-selected="true">
                                    <span class="icon">
                                        <i class="ri-checkbox-circle-line"></i>
                                    </span>
                                    <span>{{ _trans('landlord.overview') }}</span>
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="two-tab" data-bs-toggle="tab" data-bs-target="#two"
                                        type="button" role="tab" aria-controls="two" aria-selected="false">
                                    <span class="icon">
                                        <i class="ri-checkbox-circle-line"></i>
                                    </span>
                                    <span>{{ _trans('landlord.Basic info') }}</span>
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="three-tab" data-bs-toggle="tab" data-bs-target="#three"
                                        type="button" role="tab" aria-controls="three" aria-selected="false">
                                    <span class="icon">
                                        <i class="ri-checkbox-circle-line"></i>
                                    </span>
                                    <span>{{ _trans('landlord.gallery') }}</span>
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="four-tab" data-bs-toggle="tab" data-bs-target="#four"
                                        type="button" role="tab" aria-controls="four" aria-selected="false">
                                    <span class="icon">
                                        <i class="ri-checkbox-circle-line"></i>
                                    </span>
                                    <span>{{ _trans('landlord.Location') }}</span>
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="five-tab" data-bs-toggle="tab" data-bs-target="#five"
                                        type="button" role="tab" aria-controls="five" aria-selected="false">
                                    <span class="icon">
                                        <i class="ri-checkbox-circle-line"></i>
                                    </span>
                                    <span>{{ _trans('landlord.facilities') }} </span>
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="six-tab" data-bs-toggle="tab" data-bs-target="#six"
                                        type="button" role="tab" aria-controls="six" aria-selected="false">
                                    <span class="icon">
                                        <i class="ri-checkbox-circle-line"></i>
                                    </span>
                                    <span>{{ _trans('landlord.floor plan') }}</span>
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="seven-tab" data-bs-toggle="tab" data-bs-target="#seven"
                                        type="button" role="tab" aria-controls="seven" aria-selected="false">
                                    <span class="icon">
                                        <i class="ri-checkbox-circle-line"></i>
                                    </span>
                                    <span>{{ _trans('landlord.reviews') }} </span>
                                </button>
                            </li>
                        </ul>
                        <!-- End-of TAB -->
                    </div>

                    <!-- Owner -->
                    <div class="product-details-card mt-4 white-bg radius-12">
                        <div class="product-details-card_header">
                            <h4 class="text-20 font-600 m-0 text-capitalize">{{ _trans('landlord.Property Owner') }}</h4>
                        </div>
                        <div class="product-details-card_body">
                            <!-- Single -->
                            <div class="single-team radius-4">
                                <div class="team-image imgEffect mb-0">
                                    <img src="{{ @globalAsset(@$user->image->path) }}" alt="img">
                                </div>
                                <div class="caption white-bg pt-20">
                                    <h6 class="team-name font-600">{{ @$user->name }}</h6>
                                    <p class="team-position font-500 text-secondary"> {{ $user->email }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product-details-card mt-4 white-bg radius-12">
                        <div class="product-details-card_header">
                            <h4 class="text-20 font-600 m-0 text-capitalize">{{ _trans('landlord.Contact With seller ') }}
                            </h4>
                        </div>
                        <div class="product-details-card_body">

                            <form action="#">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="ot-contact-form mb-24">
                                            <input class="form-control ot-contact-input" type="text"
                                                   placeholder="Name">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="ot-contact-form mb-24">
                                            <input class="form-control ot-contact-input" type="email"
                                                   placeholder="test@gmail.com">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="ot-contact-form mb-24">
                                            <input class="form-control ot-contact-input" type="text"
                                                   placeholder="+0951442254">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="ot-contact-form mb-24">
                                            <textarea class="ot-contact-textarea" placeholder="message" cols="3"
                                                      rows="2"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <button type="submit"
                                                class="btn-primary-fill btn-block">{{ _trans('landlord.submit now') }}</button>
                                    </div>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>

                <div class="col-xl-9 col-lg-7 col-md-7">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="one" role="tabpanel" aria-labelledby="one-tab">
                            <div class="ot-card border-0 white-bg">
                                <div class="row mb-30">
                                    <div class="view-wrapper col-xl-12">
                                        <div class="single-product radius-8 h-calc grids-views">
                                            <div class="product-img position-relative overflow-hidden">
                                                <a href="javascript:">
                                                    <img src="{{ $property['image'] }}" class="img-fluid"
                                                         alt="img">
                                                </a>
                                            </div>
                                            <div class="w-100">
                                                <div class="product-info d-flex flex-column gap-15">
                                                    <div class="row gy-1">
                                                        <div class="col-lg-12">
                                                            <div
                                                                class="two-badge d-flex align-items-center gap-10 justify-content-between">
                                                                <span
                                                                    class="badges text-uppercase badge-bg-green position-static">
                                                                    {{ $property['deal_type']  }}
                                                                </span>
                                                                <form action="{{ route('customer.wishlists.add') }}"
                                                                      method="POST">
                                                                    @csrf
                                                                    <input type="hidden" name="property_id"
                                                                           value="{{ $property['id'] }}">

                                                                    <button type="submit"
                                                                            class="text-25 border-0 bg-none  text-primary text-uppercase d-flex align-items-center">
                                                                        @if (count(@$property['wishlist']))
                                                                           <i class="ri-heart-fill"></i>
                                                                        @else
                                                                           <i class="ri-heart-3-line"></i>
                                                                        @endif
                                                                    </button>
                                                                </form>
                                                                {{-- End property added to wishlist --}}

                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div
                                                                class="text-paragraph text-14 font-600 d-flex gap-8 align-items-center">
                                                                <div class="icon text-primary"><i
                                                                        class="ri-map-pin-2-line"></i></div>
                                                                <span> {{ $address['country'] }}</span>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div
                                                                class="text-paragraph text-14 font-600 d-flex gap-8 align-items-center">
                                                                <div class="icon text-primary"><i
                                                                        class="ri-hotel-bed-line"></i></div>
                                                                <span> {{ $property['bedroom'] }}
                                                                    {{ $property['bedroom'] > 1 ? _trans('landlord.Beds') : _trans('landlord.Bed') }}</span>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div
                                                                class="text-paragraph text-14 font-600 d-flex gap-8 align-items-center">
                                                                <div class="icon text-primary"><i
                                                                        class="ri-walk-fill"></i></div>
                                                                <span> {{ $property['bedroom'] }}
                                                                    {{ $property['bedroom'] > 1 ? _trans('landlord.Baths') : _trans('landlord.Bath') }}
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div
                                                                class="text-paragraph text-14 font-600 d-flex gap-8 align-items-center">
                                                                <div class="icon text-primary"><i
                                                                        class="ri-building-4-line"></i></div>
                                                                <span>
                                                                    {{ $property['size'] }}{{ _trans('landlord.sqft') }}</span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <a href="javascript:">
                                                        <h4 class="line-clamp-1 text-20 font-600">{{ $property['name'] }}
                                                        </h4>
                                                    </a>

                                                    <div class="d-flex justify-content-between flex-wrap gap-2">
                                                        <span
                                                            class="product_banding text-title">{{ @$property['category'] }}</span>
                                                    </div>

                                                    <div
                                                        class="d-flex flex-column justify-content-between flex-wrap gap-20">
                                                        <div class="text-primary fw-bold">
                                                            @if($advertisement['advertisement_type'] == \App\Enums\DealType::RENT)
                                                                {{ $property['deal_type'] }} <span
                                                                    class="text-warning">{{ _trans('landlord.From') }}</span> {{ date('M d , Y', strtotime($advertisement['rent_start_date'])) }}
                                                                <span
                                                                    class="text-warning">{{ _trans('landlord.To') }}</span>  {{ date('M d , Y', strtotime($advertisement['rent_end_date'])) }}
                                                            @elseif($advertisement['advertisement_type'] == \App\Enums\DealType::SELL)
                                                                {{ $property['deal_type'] }} {{ _trans('landlord.From') }}  {{ $advertisement['sell_start_date'] }}
                                                            @elseif($advertisement['advertisement_type'] == \App\Enums\DealType::MORTGAGE)
                                                                {{ $property['deal_type'] }} {{ _trans('landlord.For') }}
                                                                "{{ $advertisement['mortgage_duration'] }}
                                                                " {{ _trans('common.days') }}
                                                            @elseif($advertisement['advertisement_type'] == \App\Enums\DealType::LEASE)
                                                                {{ $property['deal_type'] }} {{ _trans('landlord.For') }}
                                                                "{{ $advertisement['lease_duration'] }}
                                                                " {{ _trans('common.days') }}
                                                            @elseif($advertisement['advertisement_type'] == \App\Enums\DealType::CARETAKER)
                                                                {{ $property['deal_type'] }} {{ _trans('landlord.For') }}
                                                                "{{ $advertisement['caretacker_duration'] }}
                                                                " {{ _trans('common.days') }}
                                                            @endif
                                                        </div>
                                                        <h5 class="font-500 text-16">
                                                            {{ _trans('landlord.Booking Price') }} : <span
                                                                class="text-primary">{{ priceFormat($property['booking_amount']) }}</span>
                                                        </h5>
                                                        <h5 class="font-500 text-16">
                                                            {{ $property['deal_type'] }} {{ _trans('landlord.Amount') }}
                                                            :
                                                            <span
                                                                class="text-primary">{{ priceFormat($property['amount']) }}</span>
                                                        </h5>
                                                    </div>
                                                    <div class="d-flex gap-10 flex-wrap">
                                                        <a href="mailto:{{ $property['user_email'] }}"
                                                           class="btn-primary-outline flex-fill text-uppercase">{{ _trans('landlord.email') }}</a>
                                                        <a href="tel:{{ $property['user_phone'] }}"
                                                           class="btn-primary-fill flex-fill text-uppercase">{{ _trans('landlord.call') }}</a>

                                                        <form action="{{ route('cart.add_to_cart') }}" method="post">
                                                            @csrf
                                                            <input type="hidden" value="{{ $property['id'] }}"
                                                                   name="property_id">
                                                            <input type="hidden" value="{{ $advertisement->id }}"
                                                                   name="advertisement_id">
                                                            <button type="button"
                                                                    class="btn-primary-fill flex-fill text-uppercase"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#terms_condition">
                                                                {{ _trans('landlord.Book Property') }}
                                                            </button>
                                                            <div class="modal fade" id="terms_condition"
                                                                 data-bs-backdrop="static" data-bs-keyboard="false"
                                                                 tabindex="-1" aria-labelledby="staticBackdropLabel"
                                                                 aria-hidden="true">
                                                                <div class="modal-dialog modal-xl">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h1 class="modal-title fs-4"
                                                                                id="exampleModalFullscreenLabel">{{ _trans('landlord.Property Terms & Conditions') }}</h1>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            {!! $advertisement->terms_condition !!}
                                                                        </div>
                                                                        <div class="p-4">
                                                                            <div class="form-check">
                                                                                <input class="form-check-input"
                                                                                       type="checkbox" value="" required
                                                                                       id="flexCheckDefault">
                                                                                <label class="form-check-label"
                                                                                       for="flexCheckDefault">
                                                                                    {{ _trans('common.Accept terms & condition') }}
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer px-5">
                                                                            <button class="btn btn-primary px-3"
                                                                                    type="submit">
                                                                                {{ _trans('landlord.Book Now') }} <i class="ri ri-arrow-right-circle-fill"></i>
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-12">
                                        <!-- Single Description -->
                                        <div class="single-description mb-20">
                                            <h5 class="title font-700 mb-20"> {{ _trans('landlord.Descriptions') }}</h5>
                                            <div class="pera">
                                                {{ $property['description'] }}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Slider Gallery -->
                                <div class="col-lg-12">
                                    @include('marsland::pages.property.includes.gallery')
                                </div>
                                <!-- End-of Slider -->

                                <!-- Basic info Table -->
                                <div class="col-lg-12">
                                    @include('marsland::pages.property.includes.basic_info')
                                </div>
                                <!-- end -->

                                <!-- location -->
                                <div class="col-lg-12">
                                    @include('marsland::pages.property.includes.location')
                                </div>
                                <!-- End-of location -->

                                <!-- Tenants -->
                                <div class="col-lg-12">
                                    @include('marsland::pages.property.includes.reviews')
                                    <div class="col-lg-12 mt-4">
                                        <!-- Comments box -->
                                        <form action="{{ route('property.review') }}" method="post">
                                            <div class="ot-contact-form mb-24">
                                                @csrf
                                                <input type="hidden" name="property_id" value="{{ $property['id'] }}">
                                                <label
                                                    class="ot-contact-label">{{ _trans('landlord.Comments') }}</label>
                                                <textarea class="ot-contact-textarea mb-15" name="comments"
                                                          placeholder="write here" cols="8"
                                                          rows="4"> </textarea>

                                                <div class="col-12 mb-3">
                                                    <div id="full-stars-example-two">
                                                        <div class="rating-group">
                                                            <input disabled="" checked=""
                                                                   class="rating__input rating__input--none"
                                                                   name="ratings"
                                                                   id="rating3-none" value="0" type="radio">
                                                            <label aria-label="1 star" class="rating__label"
                                                                   for="rating3-1"><i
                                                                    class="rating__icon rating__icon--star ri-star-fill"></i></label>
                                                            <input class="rating__input" name="ratings" id="rating3-1"
                                                                   value="1" type="radio">
                                                            <label aria-label="2 stars" class="rating__label"
                                                                   for="rating3-2"><i
                                                                    class="rating__icon rating__icon--star ri-star-fill"></i></label>
                                                            <input class="rating__input" name="ratings" id="rating3-2"
                                                                   value="2" type="radio">
                                                            <label aria-label="3 stars" class="rating__label"
                                                                   for="rating3-3"><i
                                                                    class="rating__icon rating__icon--star ri-star-fill"></i></label>
                                                            <input class="rating__input" name="ratings" id="rating3-3"
                                                                   value="3" type="radio">
                                                            <label aria-label="4 stars" class="rating__label"
                                                                   for="rating3-4"><i
                                                                    class="rating__icon rating__icon--star ri-star-fill"></i></label>
                                                            <input class="rating__input" name="ratings" id="rating3-4"
                                                                   value="4" type="radio">
                                                            <label aria-label="5 stars" class="rating__label"
                                                                   for="rating3-5"><i
                                                                    class="rating__icon rating__icon--star ri-star-fill"></i></label>
                                                            <input class="rating__input" name="ratings" id="rating3-5"
                                                                   value="5" type="radio">
                                                        </div>
                                                    </div>
                                                </div>
                                                <button type="submit"
                                                        class="btn-primary-fill">{{ _trans('landlord.submit now') }}</button>
                                            </div>
                                        </form>
                                        <ul>
                                            @foreach($errors->all() as $error)
                                                <li class="text-danger">
                                                    {{ $error }}
                                                </li>
                                            @endforeach
                                        </ul>

                                    </div>
                                </div>
                                <!-- End-of Tenants -->

                            </div>
                        </div>
                        <div class="tab-pane fade" id="two" role="tabpanel" aria-labelledby="two-tab">
                            <div class="ot-card border-0 white-bg">

                                <!-- Basic info Table -->
                                <div class="col-lg-12">
                                    @include('marsland::pages.property.includes.basic_info')
                                </div>

                            </div>
                        </div>
                        <div class="tab-pane fade" id="three" role="tabpanel" aria-labelledby="three-tab">

                            <div class="ot-card border-0 white-bg">
                                <!-- Slider Gallery -->
                                <div class="col-lg-12">
                                    @include('marsland::pages.property.includes.gallery')
                                </div>
                                <!-- End-of Slider -->
                            </div>
                        </div>

                        <div class="tab-pane fade" id="four" role="tabpanel" aria-labelledby="four-tab">
                            <div class="ot-card border-0 white-bg">

                                <!-- location -->
                                <div class="col-lg-12">
                                    @include('marsland::pages.property.includes.location')
                                </div>
                                <!-- End-of location -->

                            </div>
                        </div>

                        <div class="tab-pane fade" id="five" role="tabpanel" aria-labelledby="five-tab">

                            <div class="ot-card border-0 white-bg">

                                <!-- Basic info Table -->
                                <div class="col-lg-12">
                                    @include('marsland::pages.property.includes.facilities')
                                </div>
                                <!-- end -->

                            </div>

                        </div>
                        <div class="tab-pane fade" id="six" role="tabpanel" aria-labelledby="six-tab">
                            <div class="ot-card border-0 white-bg">
                                <!-- floor plan -->
                                <div class="col-lg-12">
                                    @include('marsland::pages.property.includes.floor_plans')
                                </div>
                                <!-- End-of floor plan -->
                            </div>
                        </div>

                        <div class="tab-pane fade" id="seven" role="tabpanel" aria-labelledby="seven-tab">

                            <div class="ot-card border-0 white-bg">
                                @include('marsland::pages.property.includes.reviews')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End-of Our Blogs -->

@endsection
