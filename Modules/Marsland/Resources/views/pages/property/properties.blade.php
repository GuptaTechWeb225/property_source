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
                                <h3 class="title font-700">{{ _trans('landlord.Properties') }}</h3>
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

    <!-- Product S t a r t-->
    <div class="ot-sidebar-overlay"></div>
    <section class="ot-filter-course section-padding3  section-bg-two">
        <div class="container">
            <div class="row">

                <div class="col-lg-12">
                    <!-- Search Box -->
                    <form action="#" onsubmit="getProperties()" class="search-box-style mb-20">
                        <div class="responsive-search-box">
                            <input class="ot-search " id="topSearchBar" type="text" value="{{ request('keyword') }}"
                                   placeholder="Search product">
                            <!-- icon -->
                            <div class="search-icon">
                                <i class="ri-search-line"></i>
                            </div>
                            <!-- Button -->
                            <button class="search-btn">{{ _trans('landlord.Search') }}</button>
                        </div>
                    </form>
                    <!-- End Search Box-->
                </div>

                <div class="col-lg-12">
                    <div class="row justify-content-between">
                        <div class="col-lg-6">
                            <div class="d-flex align-items-center flex-wrap mb-30">
                                <div class="total-count">
                                    <span class="tag-cout text-title text-16 font-600 mr-10" id="result_count"></span>
                                </div>
                                <!-- Search-Tab -->
                                <div class="search-tags" id="keywords">
                                    <!-- Data will be loarded from javascript -->
                                </div>
                                <!-- Clear Tag -->
                                <div class="clear-all-tag">
                                    <span class="clear" onclick="clearAll()">{{ _trans('landlord.Clear all') }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="ot-contact-form">
                                <select class="select2 __filter" name="filter" onchange="getProperties()">
                                    <option value="''">{{ _trans('landlord.Filters') }}</option>
                                    <option
                                        {{ request('filter') == 'is_trending' ? 'selected':'' }} value="is_trending">{{ _trans('landlord.Trending Property') }}</option>
                                    <option
                                        {{ request('filter') == 'is_recommended' ? 'selected':'' }} value="is_recommended">{{ _trans('landlord.Recommanded Property') }}</option>
                                    <option
                                        {{ request('filter') == 'discounted' ? 'selected':'' }} value="discounted">{{ _trans('landlord.Discounted Property') }}</option>
                                </select>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Left Sidebar -->
                <div class="col-xl-3 col-lg-3">
                    <div class="sidebar-wrapper bg-transparent mb-24">
                        <!-- Mobile Device -->
                        <div id="otSidebarBtnOpen" class="responsive-bar">
                            <div class="sticky-icon">
                                <i class="ri-equalizer-line"></i>
                                <span>{{ _trans('landlord.Filters') }}</span>
                            </div>
                        </div>
                        <nav class="ot-sidebar" id="ot-sidebar">
                            <div class="ot-sidebar-btn-close" id="otSidebarBtnClose"><i class="ri-close-fill"></i></div>
                            <div class="accordion-item ot-checkbox-dropdown">
                                <h4 class="accordion-header" id="headingThree">
                                    <button class="accordion-button " type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapseThree" aria-expanded="true"
                                            aria-controls="collapseThree">
                                        {{ _trans('landlord.Purpose') }}
                                    </button>
                                </h4>
                                <div id="collapseThree" class="accordion-collapse collapse show"
                                     aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                    <ul class="ot-checkbox-dropdown-list ">
                                        @foreach(\App\Utils\Utils::advertisementTypes() as $key => $type)
                                            <li>
                                                <label>
                                                    <input class="ot-checkbox __purpose"
                                                           {{ request('purpose') == $key ? 'checked' : '' }}  onchange="getProperties()"
                                                           value="{{ $key }}" type="checkbox">{{ $type }}
                                                    <span class="ot-checkmark"></span>
                                                </label>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="accordion" id="accordionExample">
                                <div class="accordion-item ot-checkbox-dropdown">
                                    <h4 class="accordion-header" id="headingOne">
                                        <button class="accordion-button " type="button" data-bs-toggle="collapse"
                                                data-bs-target="#collapseOne" aria-expanded="true"
                                                aria-controls="collapseOne">
                                            {{ _trans('landlord.Filter by Categories') }}
                                        </button>
                                    </h4>
                                    <div id="collapseOne" class="accordion-collapse collapse show"
                                         aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                        <ul class="ot-checkbox-dropdown-list ">
                                            @foreach($categories as $category)
                                                <li>
                                                    <label>
                                                        <input class="ot-checkbox __categories"
                                                               onchange="getProperties()"
                                                               {{ request('category_id') == $category->id ? 'checked' : '' }} value="{{ request('category_id') ? request('category_id') : $category->id }}"
                                                               type="checkbox"> {{ $category->name }}
                                                        <span class="ot-checkmark"></span>
                                                    </label>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                <div class="accordion-item ot-checkbox-dropdown">
                                    <h4 class="accordion-header" id="headingThree">
                                        <button class="accordion-button " type="button" data-bs-toggle="collapse"
                                                data-bs-target="#collapseThree" aria-expanded="true"
                                                aria-controls="collapseThree">
                                            {{ _trans('landlord.Filter by Beds') }}
                                        </button>
                                    </h4>
                                    <div id="collapseThree" class="accordion-collapse collapse show"
                                         aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                        <ul class="ot-checkbox-dropdown-list ">
                                            @for($i = 1; $i < 7; $i++ )
                                                <li>
                                                    <label>
                                                        <input class="ot-checkbox __beds" onchange="getProperties()"
                                                               value="{{ $i }}"
                                                               type="checkbox"> {{ $i }} {{ $i>=2 ? ' Beds': ' Bed' }}
                                                        <span class="ot-checkmark"></span>
                                                    </label>
                                                </li>
                                            @endfor
                                        </ul>
                                    </div>
                                </div>
                                <div class="accordion-item ot-checkbox-dropdown">
                                    <h4 class="accordion-header" id="headingThree">
                                        <button class="accordion-button " type="button" data-bs-toggle="collapse"
                                                data-bs-target="#collapseThree" aria-expanded="true"
                                                aria-controls="collapseThree">
                                            {{ _trans('landlord.Filter by Baths') }}
                                        </button>
                                    </h4>
                                    <div id="collapseThree" class="accordion-collapse collapse show"
                                         aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                        <ul class="ot-checkbox-dropdown-list ">
                                            @for($i = 1; $i < 7; $i++ )
                                                <li>
                                                    <label>
                                                        <input class="ot-checkbox __baths" onchange="getProperties()"
                                                               value="{{ $i }}"
                                                               type="checkbox"> {{ $i }} {{ $i>=2 ? ' Baths': ' Bath' }}
                                                        <span class="ot-checkmark"></span>
                                                    </label>
                                                </li>
                                            @endfor
                                        </ul>
                                    </div>
                                </div>
                                <div class="accordion-item ot-checkbox-dropdown">
                                    <h4 class="accordion-header" id="headingFor">
                                        <button class="accordion-button " type="button" data-bs-toggle="collapse"
                                                data-bs-target="#collapseFour" aria-expanded="true"
                                                aria-controls="collapseFour">
                                            {{ _trans('landlord.Area (Sqft)') }}
                                        </button>
                                    </h4>
                                    <div id="collapseFour" class="accordion-collapse collapse show"
                                         aria-labelledby="headingFor" data-bs-parent="#accordionExample">
                                        <ul class="ot-checkbox-dropdown-list ">
                                            @for($i=1; $i<=7; $i++)
                                                <li>
                                                    <label>
                                                        <input class="ot-checkbox __sqfts" onchange="getProperties()"
                                                               value="{{ request('sqfts') ? request('sqfts') : $i * 1000 }}-{{ $i * 1000 + 1000}}"
                                                               type="checkbox">
                                                        {{ $i * 1000 }}
                                                        -{{ $i * 1000 + 1000 }} {{ _trans('landlord.Sq Ft')}}
                                                        <span class="ot-checkmark"></span>
                                                    </label>
                                                </li>
                                            @endfor
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>

                <!-- Right Content Result -->
                <div class="col-xl-9 col-lg-9 position-relative">
                    <div class="loading" id="loader">
                        <div class="spinner-border spinner-border-lg text-primary" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </div>
                    <!-- list & Grid  view -->
                    <div class="row g-24" id="properties">
                        <!-- Data will be loard from javascript -->
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!--End-of Product -->
@endsection
@push('script')
    <!--Request for properties page with filtering -->
    <script>
        const getProperties = () => {
            var search = $('#topSearchBar').val();

            var beds = [];
            $('.__beds:checked').each(function () {
                beds.push($(this).val());
            });
            var filters = $('.__filter').val();

            var baths = [];
            $('.__baths:checked').each(function () {
                baths.push($(this).val());
            });

            var sqfts = [];
            $('.__sqfts:checked').each(function () {
                sqfts.push($(this).val());
            });

            var purpose = [];
            $('.__purpose:checked').each(function () {
                purpose.push($(this).val());
            });

            var categories = [];
            $('.__categories:checked').each(function () {
                categories.push($(this).val());
            });

            const appendContainer = $('#properties');
            appendContainer.empty();
            $('#loader').show();
            $.ajax({
                url: "{{ route('property.filter') }}",
                type: 'POST',
                data: {
                    search: search,
                    purpose: purpose,
                    categories: categories,
                    beds: beds,
                    baths: baths,
                    sqfts: sqfts,
                    filters: filters,
                    _token: "{{ csrf_token() }}"
                },
                success: function (response) {
                    $('#loader').hide();
                    if (Object.keys(response.property).length > 0) {
                        response.property.forEach(property => {

                            const propertyCard = `
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 view-wrapper">
                            <div class="single-product radius-8 h-calc">
                                <div class="product-img position-relative overflow-hidden">
                                    <a href="${property.details_url}">
                                        <img src="${property.image}" class="img-fluid" alt="img">
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
                                                    <span> ${property.bedrooms} ${property.bedrooms > 1 ? 'Beds' : 'Bed'}</span>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="text-paragraph text-14 font-600 d-flex gap-8 align-items-center">
                                                    <div class="icon text-primary"><i class="ri-walk-fill"></i></div>
                                                    <span> ${property.bathrooms} ${property.bathrooms > 1 ? 'Baths' : 'Bath'}</span>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="text-paragraph text-14 font-600 d-flex gap-8 align-items-center">
                                                    <div class="icon text-primary"><i class="ri-building-4-line"></i></div>
                                                    <span> ${property.size}'sqft'</span>
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
                                            <a href="mailto:${property.user_email}" class="btn-primary-outline flex-fill text-uppercase">{{ _trans('landlord.email') }}</a>
                                            <a href="tel:${property.user_phone}" class="btn-primary-fill flex-fill text-uppercase">{{ _trans('landlord.call') }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                                `;

                            appendContainer.append(propertyCard);
                        });
                    } else {
                        const empty = `
                            <div class="text-center mt-40">
                                <img src="{{ asset('marsland/assets/images/gallery/empty-data.png') }}">
                                <h5 class="text-muted">{{ _trans('common.No data found') }}</h5>
                            </div>
                        `
                        appendContainer.append(empty);
                    }
                    let keywordStr = "";
                    let keywords = response.keyword ?? [];

                    $.each(keywords, function (i, keyword) {
                        keywordStr += `
                            <span class="single-search-tag">${keyword} <i class="ri-close-line"></i></span>
                        `;
                    });
                    $('#keywords').html(keywordStr);
                    $('#result_count').html(response.count);
                },
                error: function (error) {
                    $('#loader').hide();
                    console.log('Error:', error);
                }
            });
        }


        const clearAll = () => {
            const checkboxes = document.querySelectorAll('input[type="checkbox"]');
            checkboxes.forEach(checkbox => {
                checkbox.checked = false;
            });
            getProperties()
        };

        getProperties();
    </script>
@endpush
