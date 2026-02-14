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
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ _trans('common.home') }}</a></li>
                            <li class="breadcrumb-item" aria-current="page"><a
                                    href="{{ route('languages.index') }}">{{ _trans('common.blogs') }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ _trans('common.add new') }}</li>
                        </ol>
                </div>
            </div>
        </div>
        {{-- bradecrumb Area E n d --}}

        <div class="card ot-card">

            <div class="card-body">
                <form action="{{ route('blogs.store') }}" enctype="multipart/form-data" method="post" id="visitForm">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <div class="row mb-3">
                                <div class="col-md-12 mb-3">
                                <label for="exampleDataList" class="form-label ">{{ _trans('landlord.title') }} <span
                                            class="fillable">*</span></label>
                                    <input class="form-control ot-input @error('title') is-invalid @enderror" name="title"
                                        list="datalistOptions" id="exampleDataList"
                                        placeholder="{{ _trans('landlord.blog title') }}" value="{{ old('title') }}">
                                    @error('title')
                                        <div id="validationServer04Feedback" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="category" class="form-label ">{{ _trans('landlord.category') }} <span class="fillable">*</span></label>
                                    <select class="nice-select niceSelect bordered_style wide @error('category') is-invalid @enderror"
                                    name="category" id="category"
                                    aria-describedby="validationServer04Feedback">

                                    @foreach($data['blogCategories'] as $category)
                                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                                    @endforeach
                                    </select>
                                </div>
                                @error('category')
                                    <div id="validationServer04Feedback" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror


                                <div class="col-md-6">
                                    <label for="case_study" class="form-label ">{{ _trans('common.case_study') }} </label>
                                    <select class="nice-select niceSelect bordered_style wide @error('case_study') is-invalid @enderror"
                                    name="case_study" id="case_study"
                                    aria-describedby="validationServer04Feedback">
                                    <option value="">Select Case Study</option>
                                    @foreach($data['case_studies'] as $case_study)
                                        <option value="{{ $case_study->id }}">{{ $case_study->title }}</option>
                                    @endforeach
                                    </select>
                                </div>
                                @error('case_study')
                                    <div id="validationServer04Feedback" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>
                        </div>

                        <div class="row pb-3">
                            <div class="col-md-12 form-group">
                                <label for="content">{{ _trans('landlord.content') }} <span class="fillable">*</span></label>
                                <textarea name="content" id="content" class="form-control @error('content') is-invalid @enderror">{{ old('content') }}</textarea>
                            </div>
                            @error('content')
                            <div id="validationServer04Feedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="exampleDataList" class="form-label ">{{ _trans('landlord.Tags') }} <span class="fillable">*</span></label>
                                <input class="form-control ot-input @error('tags') is-invalid @enderror" name="tags"
                                    list="datalistOptions" id="exampleDataList"
                                    placeholder="{{ _trans('landlord.Add Multiple Tags by Comma') }}" value="{{ old('tags') }}">
                                @error('tags')
                                    <div id="validationServer04Feedback" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                        </div>

                        <div class="col-xs-6 col-sm-12 col-md-6">
                            {{-- File Uplode --}}
                            <label class="form-label" for="inputImage">{{ _trans('landlord.image') }}</label>
                            <div class="ot_fileUploader left-side mb-3">
                                <input class="form-control" type="text" placeholder="{{ _trans('landlord.image') }}"
                                    readonly="" id="placeholder">
                                <button class="primary-btn-small-input" type="button">
                                    <label class="btn btn-lg ot-btn-primary"
                                        for="fileBrouse">{{ _trans('landlord.browse') }}</label>
                                    <input type="file" class="d-none form-control" name="image" id="fileBrouse"
                                        accept="image/*">
                                </button>
                            </div>
                            @error('image')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="validationServer04" class="form-label">{{ _trans('landlord.status') }} <span class="fillable">*</span></label>
                            <select class="nice-select niceSelect bordered_style wide @error('status') is-invalid @enderror"
                            name="status" id="validationServer04"
                            aria-describedby="validationServer04Feedback">
                                <option value="{{ App\Enums\Status::ACTIVE }}">{{ _trans('landlord.active') }}</option>
                                <option value="{{ App\Enums\Status::INACTIVE }}">{{ _trans('landlord.inactive') }}</option>

                            </select>
                        </div>

                        <div class="col-md-12 mt-3">
                            <div class="text-end">
                                <button class="btn btn-lg ot-btn-primary"><span><i class="fa-solid fa-save"></i>
                                    </span>{{ _trans('landlord.submit') }}</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
