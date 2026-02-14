@extends('backend.master')

@section('title')
    {{ @$data['title'] }}
@endsection
@section('content')

    <div class="page-content">

        {{-- bradecrumb Area S t a r t --}}
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <h4 class="bradecrumb-title mb-1">{{ $data['title'] }}</h1>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ _trans('landlord.Home')}}</a></li>
                        <li class="breadcrumb-item">{{ $data['title'] }}</li>
                        <li class="breadcrumb-item">{{ _trans('landlord.Update')}}</li>
                    </ol>
                </div>
            </div>
        </div>

        {{-- bradecrumb Area E n d --}}
        <div class="card ot-card">

            <div class="card-body">
                <form action="{{ route('home.section-titles.update') }}" enctype="multipart/form-data"
                    method="post" id="visitForm">
                    @csrf
                    @method('PUT')
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <!-- Process Flow for our business model -->
                            <div class="row mb-3 page-title-description">
                                <!-- title Head Start -->
                                <div class="section-title-head">
                                    <h3>{{ _trans('landlord.Process Flow for our business model')}}</h3>
                                    <hr>
                                </div>
                                <!-- title Head End -->
                                <div class="col-md-6 mb-3">
                                    <label for="business_model_title" class="form-label ">{{ _trans('landlord.Title') }} <span class="fillable">*</span></label>
                                    <input class="form-control ot-input @error('business_model_title') is-invalid @enderror" name="business_model_title"
                                        list="datalistOptions" id="business_model_title"
                                        placeholder="{{ _trans('landlord.process flow for our business model') }}" value="{{ @$data['hometitles']->business_model_title }}">
                                    @error('business_model_title')
                                        <div id="validationServer04Feedback" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="business_model_description" class="form-label ">{{ _trans('landlord.Short Description') }} <span class="fillable">*</span></label>
                                    <input class="form-control ot-input @error('business_model_description') is-invalid @enderror" name="business_model_description"
                                        list="datalistOptions" id="business_model_description"
                                        placeholder="{{ _trans('landlord.max 25 words recommended') }}" value="{{ @$data['hometitles']->business_model_description }}">
                                    @error('business_model_description')
                                        <div id="validationServer04Feedback" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="business_model_link" class="form-label ">{{ _trans('landlord.Learn More Link') }} <span class="fillable">*</span></label>
                                    <input class="form-control ot-input @error('business_model_link') is-invalid @enderror" name="business_model_link"
                                        list="datalistOptions" id="business_model_link"
                                        placeholder="{{ _trans('landlord.Link') }}" value="{{ @$data['hometitles']->business_model_link }}">
                                    @error('business_model_link')
                                        <div id="validationServer04Feedback" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Amazing Features -->
                            <div class="row mb-3 page-title-description">
                                <!-- title Head Start -->
                                <div class="section-title-head">
                                    <h3>{{ _trans('landlord.Amazing Features')}}</h3>
                                    <hr>
                                </div>
                                <!-- title Head End -->
                                <div class="col-md-6 mb-3">
                                    <label for="feature_title" class="form-label ">{{ _trans('landlord.Title') }} <span class="fillable">*</span></label>
                                    <input class="form-control ot-input @error('feature_title') is-invalid @enderror" name="feature_title"
                                        list="datalistOptions" id="feature_title"
                                        placeholder="{{ _trans('landlord.how_it_works') }}" value="{{ @$data['hometitles']->feature_title }}">
                                    @error('feature_title')
                                        <div id="validationServer04Feedback" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="feature_description" class="form-label ">{{ _trans('landlord.Short Description') }} <span class="fillable">*</span></label>
                                    <input class="form-control ot-input @error('feature_description') is-invalid @enderror" name="feature_description"
                                        list="datalistOptions" id="feature_description"
                                        placeholder="{{ _trans('landlord.max_25_words_recommended') }}" value="{{ @$data['hometitles']->feature_description }}">
                                    @error('feature_description')
                                        <div id="validationServer04Feedback" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <!-- How It Works -->
                            <div class="row mb-3 page-title-description">
                                <!-- title Head Start -->
                                <div class="section-title-head">
                                    <h3>{{ _trans('landlord.How It Works') }}</h3>
                                    <hr>
                                </div>
                                <!-- title Head End -->
                                <div class="col-md-6 mb-3">
                                    <label for="howitworks_title" class="form-label ">{{ _trans('landlord.Title') }} <span class="fillable">*</span></label>
                                    <input class="form-control ot-input @error('howitworks_title') is-invalid @enderror" name="howitworks_title"
                                        list="datalistOptions" id="howitworks_title"
                                        placeholder="{{ _trans('landlord.how it works') }}" value="{{ @$data['hometitles']->howitworks_title }}">
                                    @error('howitworks_title')
                                        <div id="validationServer04Feedback" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="howitworks_description" class="form-label ">{{ _trans('landlord.Short Description') }} <span class="fillable">*</span></label>
                                    <input class="form-control ot-input @error('howitworks_description') is-invalid @enderror" name="howitworks_description"
                                        list="datalistOptions" id="howitworks_description"
                                        placeholder="{{ _trans('landlord.max 25 words recommended') }}" value="{{ @$data['hometitles']->howitworks_description }}">
                                    @error('howitworks_description')
                                        <div id="validationServer04Feedback" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Download Your Mobile App -->
                            <div class="row mb-3 page-title-description" id="download_app">
                                <!-- title Head Start -->
                                <div class="section-title-head">
                                    <h3>Download Your Mobile App</h3>
                                    <hr>
                                </div>
                                <!-- title Head End -->
                                <div class="col-md-6 mb-3">
                                    <label for="app_store_link" class="form-label ">{{ _trans('landlord.IOS App URL') }} <span class="fillable">*</span></label>
                                    <input class="form-control ot-input @error('app_store_link') is-invalid @enderror" name="app_store_link"
                                        list="datalistOptions" id="app_store_link"
                                        placeholder="{{ _trans('landlord.ios app url link') }}" value="{{ @$data['hometitles']->app_store_link }}">
                                    @error('app_store_link')
                                        <div id="validationServer04Feedback" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="play_store_link" class="form-label ">{{ _trans('landlord.android app url') }}<span class="fillable">*</span></label>
                                    <input class="form-control ot-input @error('play_store_link') is-invalid @enderror" name="play_store_link"
                                        list="datalistOptions" id="play_store_link"
                                        placeholder="{{ _trans('landlord.android app url link') }}" value="{{ @$data['hometitles']->play_store_link }}">
                                    @error('play_store_link')
                                        <div id="validationServer04Feedback" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Testimonial -->
                            <div class="row mb-3 page-title-description">
                                <!-- title Head Start -->
                                <div class="section-title-head">
                                    <h3>Testimonial</h3>
                                    <hr>
                                </div>
                                <!-- title Head End -->
                                <div class="col-md-6 mb-3">
                                    <label for="testimonial_title" class="form-label ">{{ _trans('landlord.title') }} <span class="fillable">*</span></label>
                                    <input class="form-control ot-input @error('testimonial_title') is-invalid @enderror" name="testimonial_title"
                                        list="datalistOptions" id="testimonial_title"
                                        placeholder="{{ _trans('landlord.love from out clients around the world') }}" value="{{ @$data['hometitles']->testimonial_title }}">
                                    @error('testimonial_title')
                                        <div id="validationServer04Feedback" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="testimonial_description" class="form-label ">{{ _trans('landlord.short description') }} <span class="fillable">*</span></label>
                                    <input class="form-control ot-input @error('testimonial_description') is-invalid @enderror" name="testimonial_description"
                                        list="datalistOptions" id="testimonial_description"
                                        placeholder="{{ _trans('landlord.max 25 words recommended') }}" value="{{ @$data['hometitles']->testimonial_description }}">
                                    @error('testimonial_description')
                                        <div id="validationServer04Feedback" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Blog -->
                            <div class="row mb-3 page-title-description">
                                <!-- title Head Start -->
                                <div class="section-title-head">
                                    <h3>Blog</h3>
                                    <hr>
                                </div>
                                <!-- title Head End -->
                                <div class="col-md-6 mb-3">
                                    <label for="blogs_title" class="form-label ">{{ _trans('landlord.title') }} <span class="fillable">*</span></label>
                                    <input class="form-control ot-input @error('blogs_title') is-invalid @enderror" name="blogs_title"
                                        list="datalistOptions" id="blogs_title"
                                        placeholder="{{ _trans('landlord.whats_new') }}" value="{{ @$data['hometitles']->blogs_title }}">
                                    @error('blogs_title')
                                        <div id="validationServer04Feedback" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="blogs_description" class="form-label ">{{ _trans('landlord.short description') }} <span class="fillable">*</span></label>
                                    <input class="form-control ot-input @error('blogs_description') is-invalid @enderror" name="blogs_description"
                                        list="datalistOptions" id="blogs_description"
                                        placeholder="{{ _trans('landlord.max 25 words recommended') }}" value="{{ @$data['hometitles']->blogs_description }}">
                                    @error('blogs_description')
                                        <div id="validationServer04Feedback" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>


                        <div class="col-md-12 mt-3">
                            <div class="text-end">
                                <button class="btn btn-lg ot-btn-primary"><span><i class="fa-solid fa-save"></i>
                                    </span>{{ _trans('landlord.update') }}</button>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
@endsection
