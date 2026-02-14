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
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ _trans('common.home') }}</a>
                            </li>
                            <li class="breadcrumb-item" aria-current="page"><a
                                    href="{{ route('testimonials.index') }}">{{ _trans('common.testimonials') }}</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">{{ _trans('common.add_new') }}</li>
                        </ol>
                </div>
            </div>
        </div>
        {{-- bradecrumb Area E n d --}}
        <div class="card ot-card">
            <div class="card-body">
                <form action="{{ route('testimonials.store') }}" enctype="multipart/form-data" method="post"
                    id="visitForm">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-md-6 mb-3">
                            <label for="exampleDataList" class="form-label ">{{ _trans('common.name') }} <span
                                    class="fillable">*</span></label>
                            <input class="form-control ot-input @error('name') is-invalid @enderror" name="name"
                                list="datalistOptions" id="exampleDataList" placeholder="{{ _trans('common.enter_name') }}">
                            @error('name')
                                <div id="validationServer04Feedback" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="exampleDataList" class="form-label ">{{ _trans('common.designation') }} <span
                                    class="fillable">*</span></label>
                            <input class="form-control ot-input @error('designation') is-invalid @enderror"
                                name="designation" list="datalistOptions" id="exampleDataList"
                                placeholder="{{ _trans('common.enter_designation') }}">
                            @error('designation')
                                <div id="validationServer04Feedback" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror


                        </div>
                        <div class="col-md-6 mb-3">
                            {{-- File Uplode --}}
                            <label class="form-label" for="inputImage">{{ _trans('common.image') }}</label>
                            <div class="ot_fileUploader left-side mb-3">
                                <input class="form-control" type="text" placeholder="{{ _trans('common.image') }}"
                                    readonly="" id="placeholder">
                                <button class="primary-btn-small-input" type="button">
                                    <label class="btn btn-lg ot-btn-primary"
                                        for="fileBrouse">{{ _trans('common.browse') }}</label>
                                    <input type="file" class="d-none form-control" name="image" id="fileBrouse"
                                        accept="image/*">
                                </button>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="exampleDataList" class="form-label ">{{ _trans('common.message') }} <span
                                    class="fillable">*</span></label>
                            <input class="form-control ot-input @error('message') is-invalid @enderror" name="message"
                                list="datalistOptions" id="exampleDataList"
                                placeholder="{{ _trans('common.enter_your_message') }}">
                            @error('message')
                                <div id="validationServer04Feedback" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror


                        </div>
                        <div class="col-md-12 mb-3">

                            {{-- Status --}}
                            <label for="validationServer04" class="form-label">{{ _trans('common.status') }} <span
                                    class="fillable">*</span></label>

                            <select class="nice-select niceSelect bordered_style wide @error('status') is-invalid @enderror"
                                name="status" id="validationServer04" aria-describedby="validationServer04Feedback">

                                <option value="{{ App\Enums\Status::ACTIVE }}">{{ _trans('common.active') }}</option>
                                <option value="{{ App\Enums\Status::INACTIVE }}">{{ _trans('common.inactive') }}
                                </option>
                            </select>
                            @error('status')
                                <div id="validationServer04Feedback" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>
                        <div class="col-md-12 mt-24">
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
