<section class="hero-area slider-img-bg" data-background="{{ asset('marsland/assets/images/hero/hero2.jpg') }}">
    <div class="hero-padding">
        <div class="container">
            <div class="row g-24 align-items-center justify-content-between">
                <div class="col-xxl-7 col-xl-7 col-lg-6">
                    <div class="hero-caption">
                        <h1 class="title font-700 title-shape-star wow fadeInUp" data-wow-delay="0.0s">
                            {!! @$config->main_title !!}
                        </h1>
                        <div class="pera mx-width-780 line-clamp-3 wow fadeInUp mt-3" data-wow-delay="0.1s">
                            {!! @$config->hero_desc !!}
                        </div>
                        <div class="d-flex gap-20 flex-wrap">
                            <button data-bs-toggle="modal" data-bs-target="#bookEvaluation"
                                    class="btn-primary-fill wow fadeInLeft"
                                    data-wow-delay="0.2s">{{ _trans('landlord.Book free evaluation') }}</button>
                            <a href="{{ route('upload_property') }}" class="btn-secondary-fill wow fadeInRight"
                               data-wow-delay="0.2s">{{ _trans('landlord.Upload your Property') }}</a>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-5 col-xl-5 col-lg-5">
                    <div class="hero-image d-none d-lg-block">
                        <div class="hero-gallery-slider parallax_img">
                            @foreach($sliders as $slider)
                                <div class="single layer" data-depth="0.2">
                                    <img src="{{ $slider['imageURL'] }}" alt="{{ $slider['title'] }}" class="w-100 "
                                         data-animation="fadeInRight" data-delay="0.2s">
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row g-24 align-items-center justify-content-between">

            <div class="col-xl-12">
                <div class="hero-form-area wow fadeInLeft" data-wow-delay="0.1s">
                    <div class="ot-login-card property_wrapper">
                        <div class="d-flex gap-4 flex-wrap">
                            <div class="flex-fill">
                                <!-- Form -->
                                <form class="form_property" action="{{ route('properties') }}" method="get">
                                    <div class="row g-24 ">
                                        <div class="col-xl-6 col-lg-3 col-md-6">
                                            <div class="ot-contact-form">
                                                <label class="ot-contact-label">{{ _trans('common.Search property') }} </label>
                                                <div class="d-flex gap-2">
                                                    <div class="lef type">
                                                        <select class="select2  flex-grow-1" name="type">
                                                            <option value="Properties">{{ _trans('Properties') }}</option>
                                                            <option value="Tenant">{{ _trans('Tenant') }}</option>
                                                        </select>
                                                    </div>
                                                   <div class="right w-100">
                                                       <input class="form-control ot-contact-input" type="text"
                                                              name="keyword"
                                                              placeholder="Enter property location & name">
                                                   </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-2 col-lg-3 col-md-6">
                                            <div class="ot-contact-form">
                                                <label class="ot-contact-label">{{ _trans('common.Category') }}</label>
                                                <select class="select2" name="category_id">
                                                    @foreach($categories as $category)
                                                        <option
                                                            value="{{ $category['id'] }}">{{ $category['name'] }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xl-2 col-lg-3 col-md-6">
                                            <div class="ot-contact-form">
                                                <label class="ot-contact-label">{{ _trans('landlord.Purpose') }}</label>
                                                <select class="select2" name="purpose">
                                                    @foreach(\App\Utils\Utils::advertisementTypes() as $key => $type)
                                                        <option
                                                            {{ old('advertisement_type') == $key ? 'selected':'' }}   value="{{ $key }}">{{ $type }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xl-2 col-lg-3 col-md-6">
                                            <div class="ot-contact-form">
                                                <label class="ot-contact-label">&nbsp</label>
                                                <button type="submit"
                                                        class="btn-primary-fill justify-content-center w-100">
                                                    <i class="ri-search-line"></i>
                                                    <span>{{ _trans('landlord.Search') }}</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
{{--                                <form class="form_tanent" action="{{ route('properties') }}" method="get">--}}
{{--                                    <div class="row g-24 ">--}}
{{--                                        <div class="col-xl-10 col-lg-9 col-md-6">--}}
{{--                                            <div class="ot-contact-form">--}}
{{--                                                <label--}}
{{--                                                    class="ot-contact-label">{{ _trans('common.Search Tenant') }} </label>--}}
{{--                                                <input class="form-control ot-contact-input" type="text" name="keyword"--}}
{{--                                                       placeholder="Enter property location, name, tenant name">--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="col-xl-2 col-lg-3 col-md-6">--}}
{{--                                            <div class="ot-contact-form">--}}
{{--                                                <label class="ot-contact-label">&nbsp</label>--}}
{{--                                                <button type="submit"--}}
{{--                                                        class="btn-primary-fill justify-content-center w-100">--}}
{{--                                                    <i class="ri-search-line"></i>--}}
{{--                                                    <span>{{ _trans('landlord.Search') }}</span>--}}
{{--                                                </button>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </form>--}}
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
