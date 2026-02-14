
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
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ _trans('landlord.home') }}</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('how-it-works.index') }}">{{ $data['title'] }}</a></li>
                        <li class="breadcrumb-item">{{ _trans('landlord.edit') }}</li>
                    </ol>
                </div>
            </div>
        </div>
        {{-- bradecrumb Area E n d --}}

        <div class="card ot-card">
            <div class="card-header">
                <h4>{{ _trans('landlord.edit') }}</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('how-it-works.update', @$data['howItWork']->id) }}" enctype="multipart/form-data" method="post"
                    id="visitForm">
                    @csrf
                    @method('PUT')
                    <div class="row mb-3">
                                <div class="col-md-6 mb-3">
                                    <label for="exampleDataList" class="form-label ">{{ _trans('landlord.title') }} <span
                                            class="fillable">*</span></label>
                                    <input class="form-control ot-input @error('title') is-invalid @enderror" name="title"
                                        value="{{ @$data['howItWork']->title }}" list="datalistOptions" id="exampleDataList"
                                        placeholder="Enter Title">
                                    @error('title')
                                        <div id="validationServer04Feedback" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                    <div class="col-md-6 mb-3">

                                        {{-- File Uplode --}}
                                        <label class="form-label" for="inputImage">{{ _trans('landlord.icon') }}</label>
                                        <div class="ot_fileUploader left-side mb-3">
                                            <input class="form-control" type="text" placeholder="icon" readonly="" id="placeholder">
                                            <button class="primary-btn-small-input" type="button">
                                                <label class="btn btn-lg ot-btn-primary" for="fileBrouse">Browse</label>
                                                <input type="file" class="d-none form-control" name="image" id="fileBrouse" accept="image/*">
                                            </button>
                                        </div>
                                    </div>
                                <div class="col-md-6 mb-3">
                                    <label for="exampleInputEmail1" class="form-label">{{ _trans('landlord.message') }} <span
                                            class="fillable">*</span></label>
                                            <input class="form-control ot-input @error('message') is-invalid @enderror" name="message"
                                            value="{{ @$data['howItWork']->message }}" list="datalistOptions" id="exampleDataList2"
                                            placeholder="Enter message">
                                    @error('message')
                                        <div id="validationServer04Feedback" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">

                                    {{-- Status --}}
                                    <label for="validationServer04" class="form-label">{{ _trans('landlord.status') }} <span class="fillable">*</span></label>

                                    <select class="nice-select niceSelect bordered_style wide @error('status') is-invalid @enderror"
                                    name="status" id="validationServer04"
                                    aria-describedby="validationServer04Feedback">

                                        <option value="{{ App\Enums\Status::ACTIVE }}"
                                            {{ @$data['howItWork']->status == App\Enums\Status::ACTIVE ? 'selected' : '' }}>
                                            {{ _trans('landlord.active') }}
                                        </option>
                                        <option value="{{ App\Enums\Status::INACTIVE }}"
                                            {{ @$data['howItWork']->status == App\Enums\Status::INACTIVE ? 'selected' : '' }}>
                                            {{ _trans('landlord.inactive') }}
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
                                    </span>{{ _trans('landlord.update') }}
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
