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
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ _trans('landlord.home') }}</a></li>
                            <li class="breadcrumb-item" aria-current="page"><a
                                    href="{{ route('home.partners.index') }}">{{ _trans('landlord.blogs') }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ _trans('landlord.add new') }}</li>
                        </ol>
                </div>
            </div>
        </div>
        {{-- bradecrumb Area E n d --}}

        <div class="card ot-card">

            <div class="card-body">
                <form action="{{ route('home.partners.store') }}" enctype="multipart/form-data" method="post" id="visitForm">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <div class="row mb-3">
                                <div class="col-md-6 mb-3">
                                <label for="name" class="form-label ">{{ _trans('landlord.company name') }} <span
                                            class="fillable">*</span></label>
                                    <input class="form-control ot-input @error('name') is-invalid @enderror" name="name"
                                        list="datalistOptions" id="name"
                                        placeholder="{{ _trans('landlord.name') }}">
                                    @error('name')
                                        <div id="validationServer04Feedback" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                   {{-- File Uplode --}}
                                    <label class="form-label" for="inputImage">{{ _trans('landlord.image') }}</label>
                                    <div class="ot_fileUploader left-side mb-3">
                                        <input class="form-control" type="text" placeholder="{{ _trans('landlord.image') }}"
                                            readonly="" id="placeholder">
                                        <button class="primary-btn-small-input" type="button">
                                            <label class="btn btn-lg ot-btn-primary"
                                                for="fileBrouse">{{ _trans('landlord.browse') }}</label>
                                            <input type="file" class="d-none form-control" name="image" id="fileBrouse" accept="image/*">
                                        </button>
                                    </div>
                                    @error('image')
                                        <div id="validationServer04Feedback" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
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
            </div>
        </div>
    </div>
@endsection
