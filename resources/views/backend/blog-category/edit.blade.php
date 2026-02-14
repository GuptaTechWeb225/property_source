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
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ _trans('common.Home') }}</a>
                            </li>
                            <li class="breadcrumb-item">{{ $data['title'] }}</li>
                            <li class="breadcrumb-item">{{ _trans('common.Edit') }}</li>
                        </ol>
                </div>
            </div>
        </div>
        {{-- bradecrumb Area E n d --}}

        <div class="card ot-card">
            {{-- <div class="card-header">
                <h4>{{ _trans('common.edit') }}</h4>
            </div> --}}
            <div class="card-body">
                <form action="{{ route('blogs.category.update', @$data['blogCategories']->id) }}"
                    enctype="multipart/form-data" method="post" id="visitForm">
                    @csrf
                    @method('PUT')
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <div class="row mb-3 d-flex justify-content-center">
                                <div class="col-md-6 mb-3">
                                    <label for="exampleDataList" class="form-label ">{{ _trans('common.title') }} <span
                                            class="fillable">*</span></label>
                                    <input class="form-control ot-input @error('title') is-invalid @enderror" name="title"
                                        list="datalistOptions" id="exampleDataList"
                                        placeholder="{{ _trans('common.enter_category_title') }} "
                                        value="{{ $data['blogCategories']->title }}">
                                    @error('title')
                                        <div id="validationServer04Feedback" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <div class="col-md-12">
                                        {{-- Status  --}}
                                        <label for="validationServer04" class="form-label">{{ _trans('common.status') }}
                                            <span class="fillable">*</span></label>

                                        <select
                                            class="nice-select niceSelect bordered_style wide @error('status') is-invalid @enderror"
                                            name="status" id="validationServer04"
                                            aria-describedby="validationServer04Feedback">

                                            <option value="{{ App\Enums\Status::ACTIVE }}"
                                                {{ @$data['blogCategories']->status == App\Enums\Status::ACTIVE ? 'selected' : '' }}>
                                                {{ _trans('common.active') }}</option>
                                            <option value="{{ App\Enums\Status::INACTIVE }}"
                                                {{ @$data['blogCategories']->status == App\Enums\Status::INACTIVE ? 'selected' : '' }}>
                                                {{ _trans('common.inactive') }}
                                            </option>
                                        </select>
                                    </div>
                                    @error('status')
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
                                    </span>{{ _trans('common.update') }}</button>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
@endsection
