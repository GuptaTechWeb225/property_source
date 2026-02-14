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
                        <ol class="breadcrumb ot-breadcrumb-secondary mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ _trans('common.home') }}</a>
                            </li>
                            <li class="breadcrumb-item" aria-current="page"><a
                                    href="{{ route('languages.index') }}">{{ _trans('common.languages') }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ _trans('common.add_new') }}</li>
                        </ol>
                </div>
            </div>
        </div>
        {{-- bradecrumb Area E n d --}}

        <div class="card ot-card">

            <div class="card-body">
                <form action="{{ route('languages.store') }}" enctype="multipart/form-data" method="post" id="visitForm">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <div class="row mb-3">
                                <div class="col-md-6 mb-3">
                                    <label for="exampleDataList" class="form-label ">{{ _trans('common.name') }} <span
                                            class="fillable">*</span></label>
                                    <input class="form-control ot-input @error('name') is-invalid @enderror" name="name"
                                        list="datalistOptions" id="exampleDataList"
                                        placeholder="{{ _trans('common.enter_name') }}">
                                    @error('name')
                                        <div id="validationServer04Feedback" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="exampleDataList" class="form-label ">{{ _trans('common.code') }} <span
                                            class="fillable">*</span></label>
                                    <input class="form-control ot-input @error('code') is-invalid @enderror" name="code"
                                        list="datalistOptions" id="exampleDataList"
                                        placeholder="{{ _trans('common.enter_code') }}">
                                    @error('code')
                                        <div id="validationServer04Feedback" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="validationServer04" class="form-label">{{ _trans('common.flag_icon') }}
                                        <span class="fillable">*</span></label>
                                    <select
                                        class="form-select ot-input flag_icon_list @error('flagIcon') is-invalid @enderror"
                                        name="flagIcon" id="validationServer04"
                                        aria-describedby="validationServer04Feedback">
                                        <option value="">{{ _trans('common.select') }}</option>
                                        @foreach ($data['flagIcons'] as $row)
                                            <option value="{{ $row->icon_class }}" data-icon="{{ $row->icon_class }}">
                                                {{ $row->title }}</option>
                                        @endforeach
                                    </select>
                                    @error('flagIcon')
                                        <div id="validationServer04Feedback" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>


                                <div class="col-md-6 direction-button">

                                    <label for="validationServer04"
                                        class="form-label">{{ _trans('common.direction') }}</label>

                                    <div class="input-check-radio">
                                        <div class="form-check d-flex align-items-center">
                                            <input type="radio" class="form-check-input mt-0 mr-4 read common-key"
                                                name="direction" value="{{ App\Enums\Direction::RTL }}" id="rtl_direction">
                                            <label class="custom-control-label"
                                                for="rtl_direction">{{ _trans('common.rtl') }}</label>
                                        </div>
                                    </div>

                                    <div class="input-check-radio">
                                        <div class="form-check d-flex align-items-center">
                                            <input type="radio" class="form-check-input mt-0 mr-4 read common-key"
                                                name="direction" value="{{ App\Enums\Direction::LTR }}" id="ltr_direction">
                                            <label class="custom-control-label"
                                                for="ltr_direction">{{ _trans('common.ltr') }}</label>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>

                        <div class="col-md-12 mt-3">
                            <div class="text-end">
                                <button class="btn btn-lg ot-btn-primary"><span><i class="fa-solid fa-save"></i>
                                    </span>{{ _trans('common.submit') }}</button>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
@endsection
