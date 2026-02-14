@extends('backend.master')

@section('title', $data['title'])

@push('styles')
    <link rel="stylesheet" href="{{ asset('backend/vendors/summernote/summernote-bs5.min.css') }}">
@endpush
@section('content')

    <div class="page-content">

        {{-- bradecrumb Area S t a r t --}}
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <h4 class="bradecrumb-title mb-1">{{ $data['title'] }}</h1>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ _trans('landlord.Home') }}</a>
                            </li>
                            <li class="breadcrumb-item">{{ $data['title'] }}</li>
                            <li class="breadcrumb-item">{{ _trans('landlord.Update') }}</li>
                        </ol>
                </div>
            </div>
        </div>

        {{-- bradecrumb Area E n d --}}
        <div class="card ot-card">

            <div class="card-body">
                <form action="{{ route('about.section-titles.update') }}" enctype="multipart/form-data" method="post"
                    id="visitForm">
                    @csrf
                    @method('PUT')
                    <div class="row mb-3">
                        <div class="col-md-12">

                            <!-- Process Flow for our business model -->
                            <div class="row mb-3 page-title-description">
                                <!-- title Head Start -->
                                <div class="section-title-head">
                                    <h3>{{ _trans('landlord.Home Page Hero Section') }}</h3>
                                    <hr>
                                </div>
                                <!-- title Head End -->
                                <div class="col-md-12 mb-3">
                                    <label for="main_title" class="form-label ">{{ _trans('landlord.Main Title') }} <span
                                            class="fillable">*</span></label>
                                    <textarea name="main_title" class="summernote form-control ot-input @error('main_title') is-invalid @enderror" required>{{ @$data['aboutTitles']->main_title }}</textarea>

                                    @error('main_title')
                                        <div id="validationServer04Feedback" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>



                                <div class="col-md-12 mb-3">
                                    <label for="hero_desc"
                                        class="form-label ">{{ _trans('landlord.Hero Area Description') }} <span
                                            class="fillable">*</span></label>
                                    <textarea name="hero_desc" class="summernote form-control ot-input @error('hero_desc') is-invalid @enderror" required>{{ @$data['aboutTitles']->hero_desc }}</textarea>

                                    @error('hero_desc')
                                        <div id="validationServer04Feedback" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Process Flow for our business model -->
                            <div class="row mb-3 page-title-description">
                                <!-- title Head Start -->
                                <div class="section-title-head">
                                    <h3>{{ _trans('landlord.About Us') }}</h3>
                                    <hr>
                                </div>
                                <!-- title Head End -->
                                <div class="col-md-6 mb-3">
                                    <label for="title_one" class="form-label ">{{ _trans('landlord.Top Title') }} <span
                                            class="fillable">*</span></label>
                                    <input class="form-control ot-input @error('title_one') is-invalid @enderror"
                                        name="title_one" list="datalistOptions" id="title_one"
                                        placeholder="{{ _trans('landlord.About Us') }}"
                                        value="{{ @$data['aboutTitles']->title_one }}">
                                    @error('title_one')
                                        <div id="validationServer04Feedback" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="subtitle_one" class="form-label ">{{ _trans('landlord.Title') }} <span
                                            class="fillable">*</span></label>
                                    <input class="form-control ot-input @error('subtitle_one') is-invalid @enderror"
                                        name="subtitle_one" list="datalistOptions" id="subtitle_one"
                                        placeholder="{{ _trans('landlord.Welcome to our LandLord!') }}"
                                        value="{{ @$data['aboutTitles']->subtitle_one }}">
                                    @error('subtitle_one')
                                        <div id="validationServer04Feedback" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="desc_one" class="form-label ">{{ _trans('landlord.Description') }} <span
                                            class="fillable">*</span></label>
                                    <input class="form-control ot-input @error('desc_one') is-invalid @enderror"
                                        name="desc_one" list="datalistOptions" id="desc_one"
                                        placeholder="{{ _trans('landlord.Short Description') }}"
                                        value="{{ @$data['aboutTitles']->desc_one }}">
                                    @error('desc_one')
                                        <div id="validationServer04Feedback" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-xs-6 col-sm-12 col-md-6">
                                    {{-- File Uplode --}}
                                    <label class="form-label" for="inputImage">{{ _trans('landlord.image') }}</label>
                                    <div class="ot_fileUploader left-side mb-3">
                                        <input class="form-control" type="text"
                                            placeholder="{{ _trans('landlord.image') }}" readonly="" id="placeholder">
                                        <button class="primary-btn-small-input" type="button">
                                            <label class="btn btn-lg ot-btn-primary"
                                                for="fileBrouse">{{ _trans('landlord.browse') }}</label>
                                            <input type="file" class="d-none form-control" name="image_id_one"
                                                id="fileBrouse" accept="image/*">
                                        </button>
                                    </div>
                                    @error('image_id_one')
                                        <div id="validationServer04Feedback" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Our Mission -->
                            <div class="row mb-3 page-title-description">
                                <!-- title Head Start -->
                                <div class="section-title-head">
                                    <h3>{{ _trans('landlord.Our Mission') }}</h3>
                                    <hr>
                                </div>
                                <!-- title Head End -->
                                <div class="col-md-6 mb-3">
                                    <label for="title_two" class="form-label ">{{ _trans('landlord.Top Title') }} <span
                                            class="fillable">*</span></label>
                                    <input class="form-control ot-input @error('title_two') is-invalid @enderror"
                                        name="title_two" list="datalistOptions" id="title_two"
                                        placeholder="{{ _trans('landlord.Our Mission') }}"
                                        value="{{ @$data['aboutTitles']->title_two }}">
                                    @error('title_two')
                                        <div id="validationServer04Feedback" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <!-- title Head End -->
                                <div class="col-md-6 mb-3">
                                    <label for="subtitle_two" class="form-label ">{{ _trans('landlord.Title') }} <span
                                            class="fillable">*</span></label>
                                    <input class="form-control ot-input @error('subtitle_two') is-invalid @enderror"
                                        name="subtitle_two" list="datalistOptions" id="subtitle_two"
                                        placeholder="{{ _trans('landlord.Our mission is to Build a Strong Foundation For Your Life.') }}"
                                        value="{{ @$data['aboutTitles']->subtitle_two }}">
                                    @error('subtitle_two')
                                        <div id="validationServer04Feedback" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="desc_two" class="form-label ">{{ _trans('landlord.Description') }} <span
                                            class="fillable">*</span></label>
                                    <input class="form-control ot-input @error('desc_two') is-invalid @enderror"
                                        name="desc_two" list="datalistOptions" id="desc_two"
                                        placeholder="{{ _trans('landlord.Short Description') }}"
                                        value="{{ @$data['aboutTitles']->desc_two }}">
                                    @error('desc_two')
                                        <div id="validationServer04Feedback" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-xs-6 col-sm-12 col-md-6">
                                    {{-- File Uplode --}}
                                    <label class="form-label" for="inputImage">{{ _trans('landlord.image') }}</label>
                                    <div class="ot_fileUploader left-side mb-3">
                                        <input class="form-control" type="text"
                                            placeholder="{{ _trans('landlord.image') }}" readonly=""
                                            id="placeholder">
                                        <button class="primary-btn-small-input" type="button">
                                            <label class="btn btn-lg ot-btn-primary"
                                                for="fileBrouse">{{ _trans('landlord.browse') }}</label>
                                            <input type="file" class="d-none form-control" name="image_id_two"
                                                id="fileBrouse" accept="image/*">
                                        </button>
                                    </div>
                                    @error('image_id_two')
                                        <div id="validationServer04Feedback" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Our Vision -->
                            <div class="row mb-3 page-title-description">
                                <!-- title Head Start -->
                                <div class="section-title-head">
                                    <h3>{{ _trans('landlord.Our Vision') }}</h3>
                                    <hr>
                                </div>
                                <!-- title Head End -->
                                <div class="col-md-6 mb-3">
                                    <label for="title_three" class="form-label ">{{ _trans('landlord.Top Title') }} <span
                                            class="fillable">*</span></label>
                                    <input class="form-control ot-input @error('title_three') is-invalid @enderror"
                                        name="title_three" list="datalistOptions" id="title_three"
                                        placeholder="{{ _trans('landlord.Our Vision') }}"
                                        value="{{ @$data['aboutTitles']->title_three }}">
                                    @error('title_three')
                                        <div id="validationServer04Feedback" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="subtitle_three" class="form-label ">{{ _trans('landlord.Title') }} <span
                                            class="fillable">*</span></label>
                                    <input class="form-control ot-input @error('subtitle_three') is-invalid @enderror"
                                        name="subtitle_three" list="datalistOptions" id="subtitle_three"
                                        placeholder="{{ _trans('landlord.Our vision is to establish ourselves as the most trusted and reliable Real Estate Company.') }}"
                                        value="{{ @$data['aboutTitles']->subtitle_three }}">
                                    @error('subtitle_three')
                                        <div id="validationServer04Feedback" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="desc_three" class="form-label ">{{ _trans('landlord.Description') }}
                                        <span class="fillable">*</span></label>
                                    <input class="form-control ot-input @error('desc_three') is-invalid @enderror"
                                        name="desc_three" list="datalistOptions" id="desc_three"
                                        placeholder="{{ _trans('landlord.Short Description') }}"
                                        value="{{ @$data['aboutTitles']->desc_three }}">
                                    @error('desc_three')
                                        <div id="validationServer04Feedback" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-xs-6 col-sm-12 col-md-6">
                                    {{-- File Uplode --}}
                                    <label class="form-label" for="inputImage">{{ _trans('landlord.image') }}</label>
                                    <div class="ot_fileUploader left-side mb-3">
                                        <input class="form-control" type="text"
                                            placeholder="{{ _trans('landlord.image') }}" readonly=""
                                            id="placeholder">
                                        <button class="primary-btn-small-input" type="button">
                                            <label class="btn btn-lg ot-btn-primary"
                                                for="fileBrouse">{{ _trans('landlord.browse') }}</label>
                                            <input type="file" class="d-none form-control" name="image_id_three"
                                                id="fileBrouse" accept="image/*">
                                        </button>
                                    </div>
                                    @error('image_id_three')
                                        <div id="validationServer04Feedback" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <!-- EASY AND SIMPLE -->
                            <div class="row mb-3 page-title-description">
                                <!-- title Head Start -->
                                <div class="section-title-head">
                                    <h3>{{ _trans('landlord.EASY AND SIMPLE') }}</h3>
                                    <hr>
                                </div>
                                <!-- title Head End -->
                                <div class="col-md-6 mb-3">
                                    <label for="title_four" class="form-label ">{{ _trans('landlord.Top Title') }} <span
                                            class="fillable">*</span></label>
                                    <input class="form-control ot-input @error('title_four') is-invalid @enderror"
                                        name="title_four" list="datalistOptions" id="title_four"
                                        placeholder="{{ _trans('landlord.Easy And Simple') }}"
                                        value="{{ @$data['aboutTitles']->title_four }}">
                                    @error('title_four')
                                        <div id="validationServer04Feedback" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="subtitle_four" class="form-label ">{{ _trans('landlord.Title') }} <span
                                            class="fillable">*</span></label>
                                    <input class="form-control ot-input @error('subtitle_four') is-invalid @enderror"
                                        name="subtitle_four" list="datalistOptions" id="subtitle_four"
                                        placeholder="{{ _trans('landlord.And these are our principles') }}"
                                        value="{{ @$data['aboutTitles']->subtitle_four }}">
                                    @error('subtitle_four')
                                        <div id="validationServer04Feedback" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="desc_four" class="form-label ">{{ _trans('landlord.Description') }} <span
                                            class="fillable">*</span></label>
                                    <input class="form-control ot-input @error('desc_four') is-invalid @enderror"
                                        name="desc_four" list="datalistOptions" id="desc_four"
                                        placeholder="{{ _trans('landlord.Short Description') }}"
                                        value="{{ @$data['aboutTitles']->desc_four }}">
                                    @error('desc_four')
                                        <div id="validationServer04Feedback" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-xs-6 col-sm-12 col-md-6">
                                    {{-- File Uplode --}}
                                    <label class="form-label" for="inputImage">{{ _trans('landlord.image') }}</label>
                                    <div class="ot_fileUploader left-side mb-3">
                                        <input class="form-control" type="text"
                                            placeholder="{{ _trans('landlord.image') }}" readonly=""
                                            id="placeholder">
                                        <button class="primary-btn-small-input" type="button">
                                            <label class="btn btn-lg ot-btn-primary"
                                                for="fileBrouse">{{ _trans('landlord.browse') }}</label>
                                            <input type="file" class="d-none form-control" name="image_id_four"
                                                id="fileBrouse" accept="image/*">
                                        </button>
                                    </div>
                                    @error('image_id_four')
                                        <div id="validationServer04Feedback" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Download App -->
                            <div class="row mb-3 page-title-description">
                                <!-- title Head Start -->
                                <div class="section-title-head">
                                    <h3>{{ _trans('landlord.Download App') }}</h3>
                                    <hr>
                                </div>
                                <!-- title Head End -->
                                <div class="col-md-6 mb-3">
                                    <label for="title_five" class="form-label ">{{ _trans('landlord.Top Title') }} <span
                                            class="fillable">*</span></label>
                                    <input class="form-control ot-input @error('title_five') is-invalid @enderror"
                                        name="title_five" list="datalistOptions" id="title_five"
                                        placeholder="{{ _trans('landlord.DOWNLOAD APP') }}"
                                        value="{{ @$data['aboutTitles']->title_five }}">
                                    @error('title_five')
                                        <div id="validationServer04Feedback" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="subtitle_five" class="form-label ">{{ _trans('landlord.Title') }} <span
                                            class="fillable">*</span></label>
                                    <input class="form-control ot-input @error('subtitle_five') is-invalid @enderror"
                                        name="subtitle_five" list="datalistOptions" id="subtitle_five"
                                        placeholder="{{ _trans('landlord.Find your property solution anytime, anywhere') }}"
                                        value="{{ @$data['aboutTitles']->subtitle_five }}">
                                    @error('subtitle_five')
                                        <div id="validationServer04Feedback" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="desc_five" class="form-label ">{{ _trans('landlord.Short Description') }}
                                        <span class="fillable">*</span></label>
                                    <input class="form-control ot-input @error('desc_five') is-invalid @enderror"
                                        name="desc_five" list="datalistOptions" id="desc_five"
                                        placeholder="{{ _trans('landlord.Short Description') }}"
                                        value="{{ @$data['aboutTitles']->desc_five }}">
                                    @error('desc_five')
                                        <div id="validationServer04Feedback" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="download_app_link"
                                        class="form-label ">{{ _trans('landlord.Download App') }} <span
                                            class="fillable">*</span></label>
                                    <input class="form-control ot-input @error('download_app_link') is-invalid @enderror"
                                        name="download_app_link" list="datalistOptions" id="download_app_link"
                                        placeholder="{{ _trans('landlord.App Link') }}"
                                        value="{{ @$data['aboutTitles']->download_app_link }}">
                                    @error('download_app_link')
                                        <div id="validationServer04Feedback" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-xs-6 col-sm-12 col-md-6">
                                    {{-- File Upload --}}
                                    <label class="form-label" for="inputImage">{{ _trans('landlord.image') }}</label>
                                    <div class="ot_fileUploader left-side mb-3">
                                        <input class="form-control" type="text"
                                            placeholder="{{ _trans('landlord.image') }}" readonly=""
                                            id="placeholder">
                                        <button class="primary-btn-small-input" type="button">
                                            <label class="btn btn-lg ot-btn-primary"
                                                for="fileBrouse">{{ _trans('landlord.browse') }}</label>
                                            <input type="file" class="d-none form-control" name="image_id_five"
                                                id="fileBrouse" accept="image/*">
                                        </button>
                                    </div>
                                    @error('image_id_five')
                                        <div id="validationServer04Feedback" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
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

    @section('script')
        <script src="{{ asset('backend/vendors/summernote/summernote-bs5.min.js') }}"></script>
        <script>
            $(document).ready(function() {
                $('.select2').select2();
                $('.summernote').summernote({
                    tabsize: 2,
                    height: 100
                });
            });
        </script>
    @endsection
