@extends('frontend.layouts.master')

@section('title', @$data['title'])
@section('content')
    <div class="prodcuts_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-xl-3">
                    <div id="product_category_chose" class="product_category_chose mb_30 mt_15">
                        <div class="course_title mb_15 d-flex align-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="19.5" height="13" viewBox="0 0 19.5 13">
                                <g id="filter-icon" transform="translate(28)">
                                    <rect id="Rectangle_1" data-name="Rectangle 1" width="19.5" height="2"
                                          rx="1" transform="translate(-28)" fill="#F99417"/>
                                    <rect id="Rectangle_2" data-name="Rectangle 2" width="15.5" height="2"
                                          rx="1" transform="translate(-26 5.5)" fill="#F99417"/>
                                    <rect id="Rectangle_3" data-name="Rectangle 3" width="5" height="2"
                                          rx="1" transform="translate(-20.75 11)" fill="#F99417"/>
                                </g>
                            </svg>
                            <h5 class="font_16 f_w_700 mb-0 ">{{ _trans('landlord.Filter Category') }}</h5>
                            <div class="catgory_sidebar_closeIcon flex-fill justify-content-end d-flex d-lg-none">
                                <button id="catgory_sidebar_closeIcon"
                                        class="home10_primary_btn2 gj-cursor-pointer mb-0 small_btn">{{ _trans('landlord.close') }}</button>
                            </div>
                        </div>

                        <div class="course_category_inner">
                            <div class="single_pro_categry">
                                <h4 class="font_18 f_w_700 ">
                                    {{ _trans('landlord.Purpose') }}
                                </h4>
                                <ul class="Check_sidebar mb_35">
                                    <li>
                                        <label class="primary_checkbox d-flex" onchange="updateProperties()">
                                            <input
                                                {{ request('purpose_type') == 'rent' ? 'checked' : '' }} type="checkbox"
                                                value="RENT" class="__purpose">
                                            <span class="checkmark mr_10"></span>
                                            <span class="label_name">{{ _trans('landlord.RENT') }}</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="primary_checkbox d-flex" onchange="updateProperties()">
                                            <input
                                                {{ request('purpose_type') == 'sell' ? 'checked' : '' }} type="checkbox"
                                                value="SELL" class="__purpose">
                                            <span class="checkmark mr_10"></span>
                                            <span class="label_name">{{ _trans('landlord.SELL') }}</span>
                                        </label>
                                    </li>
                                </ul>
                            </div>
                            <div class="single_pro_categry">
                                <div
                                    class="d-flex align-items-center gap-2 land_border_bottom pb-2 mb-3 justify-content-between">
                                    <h4 class="font_18 f_w_700 m-0 border-0 p-0">
                                        {{ _trans('landlord.Filter by Categories') }}
                                    </h4>
                                </div>
                                <ul class="Check_sidebar mb_35" id="category_list_loading">
                                </ul>
                            </div>


                            <div class="single_pro_categry">
                                <h4 class="font_18 f_w_700">
                                    {{ _trans('landlord.Filter by Beds') }}
                                </h4>
                                <ul class="Check_sidebar mb_35">
                                    @for ($i = 1; $i <= 5; $i++)
                                        <li>
                                            <label class="primary_checkbox d-flex" onchange="updateProperties()">
                                                <input type="checkbox" value="{{ $i }}" class="__beds">
                                                <span class="checkmark mr_10"></span>
                                                <span class="label_name"> {{ $i }}
                                                    {{ $i >= 2 ? ' Beds' : ' Bed' }}</span>
                                            </label>
                                        </li>
                                    @endfor
                                </ul>
                            </div>
                            <div class="single_pro_categry">
                                <h4 class="font_18 f_w_700">
                                    {{ _trans('landlord.Filter by Baths') }}
                                </h4>
                                <ul class="Check_sidebar mb_35">
                                    @for ($i = 1; $i <= 5; $i++)
                                        <li>
                                            <label class="primary_checkbox d-flex" onchange="updateProperties()">
                                                <input type="checkbox" value="{{ $i }}" class="__baths">
                                                <span class="checkmark mr_10"></span>
                                                <span class="label_name"> {{ $i }}
                                                    {{ $i >= 2 ? ' Baths' : ' Bath' }}</span>
                                            </label>
                                        </li>
                                    @endfor
                                </ul>
                            </div>
                            <div class="single_pro_categry">
                                <h4 class="font_18 f_w_700">
                                    {{ _trans('landlord.Area') }} ({{ _trans('landlord.sqft') }})
                                </h4>
                                <ul class="Check_sidebar mb_35">
                                    @for ($i = 1; $i <= 7; $i++)
                                        <li>
                                            <label class="primary_checkbox d-flex" onchange="updateProperties()">
                                                <input type="checkbox" value="{{ $i * 1000 }}-{{ $i * 1000 + 1000 }}"
                                                       class="__sqfts">
                                                <span class="checkmark mr_10"></span>
                                                <span class="label_name">{{ $i * 1000 }}-{{ $i * 1000 + 1000 }}
                                                    {{ _trans('landlord.Sq Ft') }}</span>
                                            </label>
                                        </li>
                                    @endfor
                                </ul>
                            </div>
                            <div class="single_pro_categry d-none">
                                <h4 class="font_18 f_w_700">
                                    {{ _trans('landlord.Filter by Rating') }}
                                </h4>
                                <ul class="rating_lists mb_35">
                                    <li>
                                        <div class="ratings">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="ratings">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star unrated"></i>
                                            <span>{{ _trans('landlord.And Up') }}</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="ratings">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star unrated"></i>
                                            <i class="fas fa-star unrated"></i>
                                            <span>{{ _trans('landlord.And Up') }}</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="ratings">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star unrated"></i>
                                            <i class="fas fa-star unrated"></i>
                                            <i class="fas fa-star unrated"></i>
                                            <span>{{ _trans('landlord.And Up') }}</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="ratings">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star unrated"></i>
                                            <i class="fas fa-star unrated"></i>
                                            <i class="fas fa-star unrated"></i>
                                            <i class="fas fa-star unrated"></i>
                                            <span>{{ _trans('landlord.And Up') }}</span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="single_pro_categry d-none">
                                <h4 class="font_18 f_w_700">
                                    {{ _trans('landlord.Filter by Price') }}
                                </h4>
                                <div class="filter_wrapper">
                                    <div id="slider-range"></div>
                                    <div class="d-flex align-items-center prise_line">
                                        <button
                                            class="home10_primary_btn2 mr_20 mb-0 small_btn">{{ _trans('landlord.Filter') }}</button>
                                        <span>{{ _trans('landlord.Price') }}: </span> <input type="text"
                                                                                             id="amount" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-xl-9">
                    <div class="row ">
                        <div class="col-12">
                            <div class="box_header d-flex flex-wrap align-items-center justify-content-between">
                                <div class="d-flex gap-2 flex-fill align-items-center flex-wrap">
                                    <h5 class="font_16 f_w_500 mr_10 mb-0" id="__countResults">0 Results</h5>
                                    <div class="keyword_lists d-flex gap-2 align-items-center flex-wrap"
                                         id="__keyword_lists">

                                    </div>
                                </div>
                                <div class="box_header_right ">
                                    <div class="short_select d-flex align-items-center gap_10 flex-wrap">
                                        <div class="prduct_showing_style">
                                            <ul class="nav align-items-center" id="myTab" role="tablist">
                                            </ul>
                                        </div>
                                        <div class="shorting_box d-none">
                                            <select class="o_land_select">
                                                <option data-display="Filter By City">{{ _trans('landlord.City') }}
                                                </option>
                                                <option value="1">Rangpur</option>
                                                <option value="2">Dhaka</option>
                                                <option value="3">Chattogram</option>
                                                <option value="4">Sylhet</option>
                                                <option value="5">Barishal</option>
                                            </select>
                                        </div>
                                        <div class="shorting_box d-none">
                                            <select class="o_land_select">
                                                <option data-display="Completion Status">
                                                    {{ _trans('landlord.Completion Status') }}</option>
                                                <option value="1">ALL</option>
                                                <option value="2">Ready</option>
                                                <option value="3">Under construcion</option>
                                                <option value="4">Low to High</option>
                                                <option value="5">High to Low</option>
                                            </select>
                                        </div>
                                        <div class="flex-fill text-end">
                                            <div class="category_toggler d-inline-block d-lg-none  gj-cursor-pointer">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="19.5" height="13"
                                                     viewBox="0 0 19.5 13">
                                                    <g id="filter-icon" transform="translate(28)">
                                                        <rect id="Rectangle_1" data-name="Rectangle 1" width="19.5"
                                                              height="2" rx="1" transform="translate(-28)"
                                                              fill="#F99417"/>
                                                        <rect id="Rectangle_2" data-name="Rectangle 2" width="15.5"
                                                              height="2" rx="1" transform="translate(-26 5.5)"
                                                              fill="#F99417"/>
                                                        <rect id="Rectangle_3" data-name="Rectangle 3" width="5"
                                                              height="2" rx="1"
                                                              transform="translate(-20.75 11)" fill="#F99417"/>
                                                    </g>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-content mb_30" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel"
                             aria-labelledby="home-tab">
                            <div class="row custom_rowProduct" id="filtering-property-items">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


@section('script')
    <script>
        updateProperties();

        function updateProperties() {

            var search = $('#topSearchBar').val();

            var beds = [];
            $('.__beds:checked').each(function () {
                beds.push($(this).val());
            });

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


            $.ajax({
                url: "{{ route('properties.filters') }}",
                method: "POST",
                data: {
                    search: search,
                    purpose: purpose,
                    categories: categories,
                    beds: beds,
                    baths: baths,
                    sqfts: sqfts,
                    location: '{{ request('location', '') }}',
                    radius: '{{ request('radius', '') }}',
                    _token: "{{ csrf_token() }}"
                },
                success: function (data) {
                    let html = '';
                    let properties = data.property;
                    $.each(properties, function (i, property) {

                        html += `
                            <div class="col-xl-4 col-lg-4 col-md-6 col-6">
                                <div class="product_widget5 mb_30">
                                    <div class="product_thumb_upper">
                                        <a href="${property.details_url}" class="thumb">
                                            <img src="${property.image}" alt=""
                                                class="${property.image}">
                                        </a>
                                        <div class="product_action">
                                            <a href="compare.php">
                                                <i class="ti-control-shuffle"></i>
                                            </a>
                                            <a data-bs-toggle="modal" data-bs-target="#theme_modal">
                                                <i class="ti-eye"></i>
                                            </a>
                                            <a href="#">
                                                <i class="ti-star"></i>
                                            </a>
                                        </div>
                                        <span class="badge_1"> -20% </span>
                                        <span class="badge_1 style2 text-uppercase"> ${property.deal_type} </span>
                                    </div>
                                    <div class="product__meta text-start">
                                        <div class="d-flex justify-content-between flex-wrap gap-2">
                                            <span class="product_banding secondary_text">${property.category}</span>
                                            <h5 class="f_w_600 font_16">${property.price}</h5>
                                        </div>
                                        <a href="${property.details_url}">
                                            <h4>${property.name}</h4>
                                        </a>
                                        <div class="d-flex flex-wrap gap-3  mt_10">
                                            <span
                                                class="body_text d-flex gap_6 align-items-center justify-content-center font_14"><i
                                                    class="fas fa-bed fw-bolder body_text"></i>${property.bedrooms} Bed</span>
                                            <span
                                                class="body_text d-flex gap_6 align-items-center justify-content-center font_14"><i
                                                    class="far fa-bath fw-bolder body_text"></i>${property.bathrooms} bath</span>
                                            <span
                                                class="body_text d-flex gap_6 align-items-center justify-content-center font_14"><i
                                                    class="far fa-border-all fw-bolder body_text"></i>${property.size} sqft</span>
                                        </div>
                                        <div class="d-flex gap-2 flex-column mt-3">
                                            <x-action_button property_id="${property.id}" advertise_id="${property.advertise_id}" amount="${property.price}"></x-action_button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        `;

                    });

                    $('#filtering-property-items').html(html);


                    let keywordStr = "";
                    let keywords = data.keyword ?? [];
                    $.each(keywords, function (i, keyword) {

                        keywordStr += `
                        <button class="tag_added alert fade show d-flex align-items-center m-0">${keyword}
                            <span
                                class="position-relative p-0 ms-2 d-flex align-items-center justify-content-center"
                                data-bs-dismiss="alert">
                                <i class="ti-close"></i>
                            </span>
                        </button>
                        `;

                    });


                    $('#__keyword_lists').html(keywordStr);

                    $('#__countResults').html(data.count);
                },
                error: function (data) {
                    console.log(data);
                }
            });
        }

        function categoryLoad() {

            $('#category_list_loading').empty();
            // ajax call
            $.ajax({
                url: "{{ route('properties.categories') }}",
                method: "POST",
                data: {
                    _token: "{{ csrf_token() }}"
                },
                success: function (data) {
                    let html = '';
                    let categories = data.categories;
                    // categories loop
                    $.each(categories, function (i, category) {
                        html += `
                        <li>
                            <label class="primary_checkbox d-flex"   onchange="updateProperties()">
                                <input type="checkbox" name="" value="${category.id}" class="__categories">
                                <span class="checkmark mr_10"></span>
                                <span class="label_name">${category.name}</span>
                            </label>
                        </li>

                        `;
                    });

                    $('#category_list_loading').html(html);
                }
            });
        }

        categoryLoad();

    </script>

@endsection
