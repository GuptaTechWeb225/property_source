@extends('backend.master')

@section('title')
    {{ @$data['title'] }}
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('backend/assets/css/datepicker.min.css')}}" />
@endsection

@section('content')
    <div class="page-content">

        {{-- bradecrumb Area S t a r t --}}
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <h4 class="bradecrumb-title mb-1">{{ $data['title'] }}</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ _trans('common.home') }}</a>
                        </li>
                        <li class="breadcrumb-item">{{ $data['title'] }}</li>
                    </ol>
                </div>
            </div>
        </div>
        {{-- bradecrumb Area E n d --}}

        <div class="card ot-card">
            <div class="card-header">
                <h4>{{ _trans('settings.general_settings') }}</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('settings.general-settings') }}" enctype="multipart/form-data" method="post"
                      id="visitForm">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <div class="row mb-3">
                                <!--Application Name Start -->
                                <div class="col-12 col-md-6 col-xl-6 col-lg-6 mb-3 ">
                                    <label for="inputname" class="form-label">{{ _trans('settings.application_name') }}
                                        <span class="fillable">*</span></label>
                                    <input type="text" name="application_name"
                                           class="form-control ot-input @error('application_name') is-invalid @enderror"
                                           value="{{ Setting('application_name') }}"
                                           placeholder="{{ _trans('settings.enter_you_application_name') }}">
                                    @error('application_name')
                                    <div id="validationServer04Feedback" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <!--Application Name End -->
                                <!--Footer Text Start -->
                                <div class="col-12 col-md-6 col-xl-6 col-lg-6 mb-3 ">
                                    <label for="inputname" class="form-label">{{ _trans('settings.footer_text') }} <span
                                            class="fillable">*</span></label>
                                    <input type="text" name="footer_text"
                                           class="form-control ot-input @error('footer_text') is-invalid @enderror"
                                           value="{{ Setting('footer_text') }}"
                                           placeholder="{{ _trans('settings.enter_your_footer_text') }}">
                                    @error('footer_text')
                                    <div id="validationServer04Feedback" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-12 col-md-6 col-xl-6 col-lg-6 mb-3">
                                    <label class="form-label" for="light_logo">{{ _trans('settings.light_logo') }}
                                    </label>
                                    <br>
                                    <div class="d-flex justify-content-center align-items-center">
                                        <img class="img-thumbnail mb-10 ot-input full-logo setting-image"
                                             src="{{ @globalAsset(setting('light_logo'), '154x38.png') }}"
                                             alt="{{ _trans('light logo') }}">
                                    </div>

                                    {{-- File Uplode --}}
                                    <div class="ot_fileUploader left-side mb-3">
                                        <input class="form-control" type="text"
                                               placeholder="{{ _trans('settings.browse_light_logo') }}" readonly=""
                                               id="placeholder">
                                        <button class="primary-btn-small-input" type="button">
                                            <label class="btn btn-lg ot-btn-primary"
                                                   for="fileBrouse">{{ _trans('common.browse') }}</label>
                                            <input type="file" class="d-none form-control" name="light_logo"
                                                   id="fileBrouse" accept="image/*">
                                        </button>
                                    </div>
                                </div>
                                <!--White Logo End -->
                                <!--Black Logo Start -->
                                <div class="col-12 col-md-6 col-xl-6 col-lg-6 ">
                                    <label class="form-label"
                                           for="dark_logo">{{ _trans('settings.dark_logo') }} </label>
                                    <br>
                                    <div class="d-flex justify-content-center align-items-center">
                                        <img class="img-thumbnail mb-10 ot-input full-logo setting-image"
                                             src="{{ @globalAsset(setting('dark_logo'), '154x38.png') }}"
                                             alt="{{ _trans('dark logo') }}">
                                    </div>
                                    {{-- File Uplode --}}
                                    <div class="ot_fileUploader left-side mb-3">
                                        <input class="form-control" type="text"
                                               placeholder="{{ _trans('settings.browse_dark_logo') }}" readonly=""
                                               id="placeholder2">
                                        <button class="primary-btn-small-input" type="button">
                                            <label class="btn btn-lg ot-btn-primary"
                                                   for="fileBrouse2">{{ _trans('common.browse') }}</label>
                                            <input type="file" class="d-none form-control" name="dark_logo"
                                                   id="fileBrouse2" accept="image/*">
                                        </button>
                                    </div>
                                </div>
                                <!--Black Logo End -->
                                <div class="col-12">
                                    <div class="">
                                        <div class="row align-items-end">
                                            <!--Favicon Start -->
                                            <div class="col-md-6 favicon-uploader">
                                                <div class="d-flex flex-column">
                                                    <label class="form-label"
                                                           for="favicon">{{ _trans('settings.favicon') }}</label>
                                                    <br>
                                                    <div class="d-flex align-items-center gap-3 justify-content-center">
                                                        <img
                                                            class="img-thumbnail mb-10 ot-input full-logo setting-image"
                                                            src="{{ @globalAsset(setting('favicon'), '38x38.png') }}"
                                                            alt="{{ _trans('favicon') }}">
                                                    </div>
                                                    <div class="ot_fileUploader left-side mb-3">
                                                        <input class="form-control" type="text"
                                                               placeholder="{{ _trans('settings.browse_favicon') }}"
                                                               readonly="" id="placeholder3">
                                                        <button class="primary-btn-small-input" type="button">
                                                            <label class="btn btn-lg ot-btn-primary"
                                                                   for="fileBrouse3">{{ _trans('common.browse') }}</label>
                                                            <input type="file" class="d-none form-control"
                                                                   name="favicon" id="fileBrouse3" accept="image/*">
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--Favicon End -->
                                            <!-- Default Langauge Start-->
                                            <div class="col-md-6 default-langauge mb-3">
                                                <div class="d-flex flex-column">
                                                    <label for="default langauge"
                                                           class="form-label">{{ _trans('settings.default_langauge') }}
                                                        <span class="fillable">*</span></label>
                                                    <select name="default_langauge" id="defaultlangaugeId"
                                                            class="form-select ot-input flag_icon_list @error('default_langauge') is-invalid @enderror">

                                                        @foreach ($data['languages'] as $row)
                                                            <option value="{{ $row->code }}"
                                                                    data-icon="{{ $row->icon_class }}"
                                                                {{ Setting('default_langauge') == $row->code ? 'selected' : '' }}>
                                                                {{ $row->name }}</option>
                                                            @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <!-- Default Langauge End-->

                                            <x-forms.select label="Currency" :required="true" name="currency_id"
                                                            col="col-lg-6" value="{{ @old('currency_id') }}">
                                                <option value="">{{ _trans('landlord.Select On') }}</option>
                                                @foreach($data['currencies']  as $currency)
                                                    <option
                                                        value="{{ $currency->id }}"
                                                        {{ Setting('currency_id') == $currency->id ? 'selected': ''}}
                                                    >
                                                        {{ $currency->name }} ({{ $currency->code }})
                                                    </option>
                                                @endforeach
                                            </x-forms.select>
                                        </div>
                                    </div>
                                </div>


                                <div class="card-header mt-5 mb-3">
                                    <h4>{{ _trans('settings.Contact Information') }}</h4>
                                </div>
                                <div class="row mb-3">
                                    <!--Phone Number Start -->
                                    <div class="col-12 col-md-6 col-xl-6 col-lg-6 mb-3 ">
                                        <label for="phone_number"
                                               class="form-label">{{ _trans('settings.Phone Number') }} <span
                                                class="fillable">*</span></label>
                                        <input type="text" name="phone_number"
                                               class="form-control ot-input @error('phone_number') is-invalid @enderror"
                                               value="{{ Setting('phone_number') }}"
                                               placeholder="{{ _trans('settings.enter_you_phone_number') }}"
                                               id="phone_number">
                                        @error('phone_number')
                                        <div id="validationServer04Feedback" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <!--Phone Number End -->

                                    <x-forms.input
                                        label="Whatsapp Number"
                                        name="whatsapp_number"
                                        value="{{ setting('whatsapp_number') }}"
                                    ></x-forms.input>
                                    <!--Email Start -->
                                    <div class="col-12 col-md-6 col-xl-6 col-lg-6 mb-3 ">
                                        <label for="email" class="form-label">{{ _trans('settings.email') }} <span
                                                class="fillable">*</span></label>
                                        <input type="text" name="email"
                                               class="form-control ot-input @error('email') is-invalid @enderror"
                                               value="{{ Setting('email') }}"
                                               placeholder="{{ _trans('settings.enter_your_email') }}" id="email">
                                        @error('email')
                                        <div id="validationServer04Feedback" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <!--Email End -->
                                    <x-forms.textarea
                                        label="Tawk Widget Code"
                                        name="tawk_widget_code"
                                        value="{{ setting('tawk_widget_code') }}"
                                    ></x-forms.textarea>
                                </div>
                                <div class="row mb-3">
                                    <!--Facebook Start -->
                                    <div class="col-12 col-md-6 col-xl-6 col-lg-6 mb-3 ">
                                        <label for="facebook_link"
                                               class="form-label">{{ _trans('settings.Facebook Link') }} <span
                                                class="fillable">*</span></label>
                                        <input type="text" name="facebook_link"
                                               class="form-control ot-input @error('facebook_link') is-invalid @enderror"
                                               value="{{ Setting('facebook_link') }}"
                                               placeholder="{{ _trans('settings.enter_you_facebook_link') }}"
                                               id="facebook_link">
                                        @error('facebook_link')
                                        <div id="validationServer04Feedback" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <!-- Facebook End -->

                                    <!-- Twitter Start -->
                                    <div class="col-12 col-md-6 col-xl-6 col-lg-6 mb-3 ">
                                        <label for="twitter_link"
                                               class="form-label">{{ _trans('settings.Twitter Link') }} <span
                                                class="fillable">*</span></label>
                                        <input type="text" name="twitter_link"
                                               class="form-control ot-input @error('twitter_link') is-invalid @enderror"
                                               value="{{ Setting('twitter_link') }}"
                                               placeholder="{{ _trans('settings.enter_your_twitter_link') }}"
                                               id="twitter_link">
                                        @error('twitter_link')
                                        <div id="validationServer04Feedback" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <!--Twitter End -->
                                </div>
                                <div class="row mb-3">
                                    <!--Linkedin Start -->
                                    <div class="col-12 col-md-6 col-xl-6 col-lg-6 mb-3 ">
                                        <label for="linkedin_link"
                                               class="form-label">{{ _trans('settings.Linkedin Link') }} <span
                                                class="fillable">*</span></label>
                                        <input type="text" name="linkedin_link"
                                               class="form-control ot-input @error('linkedin_link') is-invalid @enderror"
                                               value="{{ Setting('linkedin_link') }}"
                                               placeholder="{{ _trans('settings.enter_you_linkedin_link') }}"
                                               id="linkedin_link">
                                        @error('linkedin_link')
                                        <div id="validationServer04Feedback" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <!-- Linkedin End -->

                                    <!-- Instagram Start -->
                                    <div class="col-12 col-md-6 col-xl-6 col-lg-6 mb-3 ">
                                        <label for="instagram_link"
                                               class="form-label">{{ _trans('settings.Instagram Link') }} <span
                                                class="fillable">*</span></label>
                                        <input type="text" name="instagram_link"
                                               class="form-control ot-input @error('instagram_link') is-invalid @enderror"
                                               value="{{ Setting('instagram_link') }}"
                                               placeholder="{{ _trans('settings.enter_your_instagram_link') }}"
                                               id="instagram_link">
                                        @error('instagram_link')
                                        <div id="validationServer04Feedback" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <!--Instagram End -->
                                </div>
                                <div class="row mb-3">
                                    <!--Address Start -->
                                    <div class="col-12 col-md-6 col-xl-6 col-lg-6 mb-3 ">
                                        <label for="address" class="form-label">{{ _trans('settings.Address') }} <span
                                                class="fillable">*</span></label>
                                        <input type="text" name="address"
                                               class="form-control ot-input @error('address') is-invalid @enderror"
                                               value="{{ Setting('address') }}"
                                               placeholder="{{ _trans('settings.enter_you_address') }}" id="address">
                                        @error('address')
                                        <div id="validationServer04Feedback" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <!-- Address End -->
                                </div>

                            </div>
                        </div>

                        <div class="col-md-12 mt-3">
                            <!-- Update Button Start-->
                            <div class="text-end">
                                @if (hasPermission('general_settings_update'))
                                    <button class="btn btn-lg ot-btn-primary"><span><i class="fa-solid fa-save"></i>
                                        </span>{{ _trans('common.update') }}</button>
                                @endif
                            </div>
                            <!-- Update Button End-->
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
