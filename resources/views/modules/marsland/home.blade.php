@extends('marsland::layouts.master')
@section('title', _trans('Home'))
@section('marsland-content')
    <!-- Hero area S t a r t-->
    @include('marsland::includes.slider')
    <!-- End-of Hero-->
    <!-- Our Best Product S t a r t-->
    <section class="our-best-product section-padding section-bg-two">
        <div class="container mt-70">
            <div class="row justify-content-center">
                <div class=" col-xl-12">
                    <div class="section-tittle d-flex align-items-center flex-wrap gap-15 mb-30">
                        <div class="flex-fill">
                            <h2 class="title text-capitalize mb-0 ">{{ _trans('landlord.Trending Property') }}</h2>
                        </div>
                        <a class="d-inline-flex align-items-center view_btn" href="{{ route('properties',['filter'=> 'is_trending']) }}">
                            {{ _trans('common.View All') }} <i class="ri-arrow-right-s-line"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row g-24" id="trendingProperties">
                <!-- Data will be loaded from javascript -->
            </div>
        </div>
    </section>
    <!-- End-of Best Product -->

    <!-- LAN Card S t a r t -->
    <div class="section-bg-two">
        <div class="container">
            <div class="row g-24">
                @foreach($feature_categories as $key =>  $category)
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="lan-single-card-2 single-card-2-bg{{$key+1}} d-flex justify-content-end radius-6 o-hidden">
                        <div class="lan-caption d-flex flex-column gap-10 align-items-start">
                            <div class="two-badge ">
                            </div>
                            <h4>
                                <a href="{{ route('properties',['category_id' => $category->id]) }}"> {{ $category->name }}</a>
                            </h4>
                            <a class="card-link" href="{{ route('properties',['category_id' => $category->id]) }}">{{ _trans('landlord.See now') }}</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- End-of LAN Card -->

    <!-- Our All Product S t a r t-->
    <section class="our-all-porduct our-best-product section-bg-two section-padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class=" col-xl-12">
                    <div class="section-tittle d-flex align-items-center flex-wrap gap-15 mb-30">
                        <div class="flex-fill">
                            <h2 class="title text-capitalize mb-0 ">{{ _trans('landlord.Recommendation For You') }}</h2>
                        </div>
                        <a class="d-inline-flex align-items-center view_btn" href="{{ route('properties',['filter' => 'is_recommended']) }}">
                            {{ _trans('landlord. View All') }} <i class="ri-arrow-right-s-line"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row g-24" id="recommedationProperties">

            </div>
        </div>
    </section>
    <!-- End-of All Product -->

    <!-- Our All Product S t a r t-->
    <section class="our-all-porduct our-best-product section-bg-two">
        <div class="container">
            <div class="row justify-content-center">
                <div class=" col-xl-12">
                    <div class="section-tittle d-flex align-items-center flex-wrap gap-15 mb-30">
                        <div class="flex-fill">
                            <h2 class="title text-capitalize mb-0 ">{{ _trans('landlord.Buy Property') }}</h2>
                        </div>
                        <a class="d-inline-flex align-items-center view_btn" href="{{ route('properties',['purpose' => 'sell']) }}">
                            {{ _trans('landlord.View All') }} <i class="ri-arrow-right-s-line"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row g-24" id="buyProperties">

            </div>
        </div>
    </section>
    <!-- End-of All Product -->
    <!-- Our All Product S t a r t-->
    <section class="our-all-porduct our-best-product section-bg-two section-padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class=" col-xl-12">
                    <div class="section-tittle d-flex align-items-center flex-wrap gap-15 mb-30">
                        <div class="flex-fill">
                            <h2 class="title text-capitalize mb-0 ">{{ _trans('landlord.Rent Property') }}</h2>
                        </div>
                        <a class="d-inline-flex align-items-center view_btn" href="{{ route('properties',['purpose' => 'rent']) }}">
                            {{ _trans('landlord.View All') }} <i class="ri-arrow-right-s-line"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row g-24" id="rentProperties">

            </div>
        </div>
    </section>
    <!-- End-of All Product -->

    <!-- Our All Product S t a r t-->
    <section class="our-all-porduct our-best-product section-bg-two section-padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class=" col-xl-12">
                    <div class="section-tittle d-flex align-items-center flex-wrap gap-15 mb-30">
                        <div class="flex-fill">
                            <h2 class="title text-capitalize mb-0 ">{{ _trans('landlord.Discount property') }}</h2>
                        </div>
                        <a class="d-inline-flex align-items-center view_btn" href="{{ route('properties',['filter' => 'discounted']) }}">
                            {{ _trans('landlord.View All') }} <i class="ri-arrow-right-s-line"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row g-24" id="discountedProperies">

            </div>
        </div>
    </section>
    <!-- End-of All Product -->

    <!-- Category area S t a r t -->
    @include('marsland::includes.categories')
    <!-- End-of Category -->

    <!-- About area S t a r t -->
    <section class="about-area section-padding section-bg-three">
        <div class="container">
            <div class="row g-24 justify-content-between align-items-center">
                <div class="col-xl-7 col-lg-6">
                    <div class="about-caption">
                        <h3 class="small-title text-paragraph font-700">{{ @$config->title_four }}</h3>
                        <p class="pera mb-20 text-16">{{@ $config->subtitle_four }}</p>
                        <div class="about-info mb-50">
                            {!! @$config->desc_four !!}
                        </div>

                        <a href="#" class="btn-primary-fill big-btn">{{ _trans('common.Learn More') }}</a>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-6">
                    <div class="about-caption text-center">
                        <img src="{{ @globalAsset($config->image_four->path) }}" alt="img" class="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End-of about -->

    <!-- Technology We Used S t a r t -->
    @include('marsland::includes.partners')
    <!-- End-of Technology We Used -->
@endsection

@push('script')
    <!--Request for properties page with filtering -->
    <script>

        const buyProperties = () => {
            const appendContainer = $('#buyProperties');
            appendContainer.empty();

            $.ajax({
                url: "{{ route('property.buy') }}",
                type: 'GET',
                success: function (response) {
                    response.property.forEach(property => {
                        const propertyCard = generalCard(property);
                        appendContainer.append(propertyCard);
                    });
                },
                error: function (error) {
                    console.log('Error:', error);
                }
            });
        }
        const rentProperties = () => {
            const appendContainer = $('#rentProperties');
            appendContainer.empty();

            $.ajax({
                url: "{{ route('property.rent') }}",
                type: 'GET',
                success: function (response) {
                    response.property.forEach(property => {
                        const propertyCard = generalCard(property);;
                        appendContainer.append(propertyCard);
                    });
                },
                error: function (error) {
                    console.log('Error:', error);
                }
            });
        }

        const discountedProperty = () => {
            const appendContainer = $('#discountedProperies');
            appendContainer.empty();

            $.ajax({
                url: "{{ route('property.discounted') }}",
                type: 'GET',
                success: function (response) {
                    response.property.forEach(property => {
                        const propertyCard = generalCard(property);;
                        appendContainer.append(propertyCard);
                    });
                },
                error: function (error) {
                    console.log('Error:', error);
                }
            });
        }

        const recommendationProperty = () => {
            const appendContainer = $('#recommedationProperties');
            appendContainer.empty();

            $.ajax({
                url: "{{ route('property.recommendation') }}",
                type: 'GET',
                success: function (response) {
                    response.property.forEach(property => {
                        const propertyCard = generalCard(property);
                        appendContainer.append(propertyCard);
                    });
                },
                error: function (error) {
                    console.log('Error:', error);
                }
            });
        }

        recommendationProperty();
        discountedProperty();
        rentProperties();
        buyProperties();
        const generalCard = (property) => {
           return `
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 view-wrapper">
                <div class="single-product radius-8 h-calc">
                    <div class="product-img position-relative overflow-hidden">
                        <a href="${property.details_url}">
                            <img
                               src="${property.image}"
                                class="img-fluid" alt="img">
                        </a>
                        <div class="two-badge">
                            <span class="badges text-uppercase badge-bg-green"> -${property.discount_amount} </span>
                            <span class="badges text-uppercase badge-bg-yellow "> ${property.deal_type} </span>
                        </div>
                    </div>
                    <div class="w-100">
                        <div class="product-info d-flex flex-column gap-15">
                            <div class="row gy-2 border-bottom pb-15">
                                <div class="col-sm-6">
                                    <div class="text-paragraph text-14 font-600 d-flex gap-8 align-items-center">
                                        <div class="icon text-primary"><i class="ri-map-pin-2-line"></i></div>
                                        <span> ${property.address}</span>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="text-paragraph text-14 font-600 d-flex gap-8 align-items-center">
                                        <div class="icon text-primary"><i class="ri-hotel-bed-line"></i></div>
                                        <span> ${property.bedrooms} ${property.bedrooms > 1 ? 'Beds':'Bed'}</span>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="text-paragraph text-14 font-600 d-flex gap-8 align-items-center">
                                        <div class="icon text-primary"><i class="ri-walk-fill"></i></div>
                                        <span> ${property.bathrooms} ${property.bathrooms > 1 ? 'Baths':'Bath'}</span>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="text-paragraph text-14 font-600 d-flex gap-8 align-items-center">
                                        <div class="icon text-primary"><i class="ri-building-4-line"></i></div>
                                        <span> ${property.size}sqft</span>
                                    </div>
                                </div>
                            </div>

                            <a href="${property.details_url}">
                                <h4 class="line-clamp-1 text-20 font-600">${property.name}</h4>
                            </a>

                            <div class="d-flex justify-content-between flex-wrap gap-2">
                                <span class="product_banding text-title">${property.category}</span>
                                <h5 class="font-500 text-16 text-primary">${property.price}</h5>
                            </div>

                            <div class="d-flex gap-10 flex-wrap">
                                <a href="mailto:${property.user_email}" class="btn-primary-outline flex-fill text-uppercase">email</a>
                                <a href="tel:${property.user_phone}" class="btn-primary-fill flex-fill text-uppercase">call</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        `
        }
    </script>
    <script>
        const trendingProperty = () => {
            const appendContainer = $('#trendingProperties');
            appendContainer.empty();

            $.ajax({
                url: "{{ route('property.trending') }}",
                type: 'GET',
                success: function (response) {
                    response.property.forEach(property => {
                        const propertyCard = `
                                    <div class="col-xl-4 col-lg-6 col-md-6">
                                        <div class="single-best-product tilt-effects h-calc">
                                            <a href="${property.details_url}"
                                               class="d-flex align-items-center justify-content-between gap-15 mb-15">
                                                <div class="d-flex align-items-center gap-20">
                                                    <div class="icon">
                                                        <i class="ri-home-8-line"></i>
                                                    </div>
                                                    <div class="cat-caption">
                                                        <h4 class="title  line-clamp-1 font-600 text-title text-capitalize">${property.name}</h4>
                                                    </div>
                                                </div>
                                                <span class="product-tag font-700 text-capitalize">${property.category}</span>
                                            </a>
                                            <div class="cat-caption">
                                                <p class=" line-clamp-2 mb-16 text-16">${property.description}</p>
                                            </div>
                                            <div class="row gy-2 border-bottom pb-15 mb-15">
                                                <div class="col-sm-6">
                                                    <div class="text-paragraph text-14 font-600 d-flex gap-8 align-items-center">
                                                        <div class="icons text-primary"><i class="ri-map-pin-2-line"></i></div>
                                                        <span> ${property.address}</span>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="text-paragraph text-14 font-600 d-flex gap-8 align-items-center">
                                                        <div class="icons text-primary"><i class="ri-hotel-bed-line"></i></div>
                                                        <span> ${property.bedrooms} ${property.bedrooms > 1 ? 'Beds':'Bed'}</span>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="text-paragraph text-14 font-600 d-flex gap-8 align-items-center">
                                                        <div class="icons text-primary"><i class="ri-walk-fill"></i></div>
                                                        <span> ${property.bathrooms} ${property.bathrooms > 1 ? 'Baths':'Bath'} </span>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="text-paragraph text-14 font-600 d-flex gap-8 align-items-center">
                                                        <div class="icons text-primary"><i class="ri-building-4-line"></i></div>
                                                        <span> ${property.size}sqft </span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="d-flex justify-content-between flex-wrap gap-2 mb-20">
                                                <span class="product_banding text-title">Price</span>
                                                <h5 class="font-500 text-16 text-primary">${property.price}</h5>
                                            </div>

                                            <div class="best-product-screen position-relative">
                                                <div class="two-badge">
                                                    <span class="badges text-uppercase badge-bg-green"> -${property.discount_amount} </span>
                                                    <span class="badges text-uppercase badge-bg-yellow "> ${property.deal_type} </span>
                                                </div>
                                                <div class="slider-screen-active dot-style-screen radius-12 overflow-hidden">
                                                    <!-- Single -->
                                                    <div class="single-screen">
                                                        <img
                                                            src="${property.image}"
                                                            alt="img" class="w-100">
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                `;
                        appendContainer.append(propertyCard);
                    });
                },
                error: function (error) {
                    console.log('Error:', error);
                }
            });
        }
        trendingProperty();
    </script>
@endpush




