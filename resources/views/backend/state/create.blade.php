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
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ _trans('landlord.home') }}</a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page"><a
                                href="{{ route('states.index') }}">{{ _trans('landlord.states') }}</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">{{ _trans('landlord.Add New') }}</li>
                    </ol>
            </div>
        </div>
    </div>
    {{-- bradecrumb Area E n d --}}

    <div class="card ot-card">
        <div class="card-body">
            <form action="{{ route('states.store') }}" enctype="multipart/form-data" method="post" id="visitForm">
                @csrf
                <div class="row mb-3">
                    <div class="col-md-6 mb-3">

                        {{-- Status --}}
                        <label for="validationServer04" class="form-label">{{ _trans('landlord.Country') }} <span
                                class="fillable">*</span></label>

                        <select
                            class="nice-select niceSelect bordered_style wide @error('country_id') is-invalid @enderror"
                            name="country_id" id="validationServer04" aria-describedby="validationServer04Feedback">

                            @foreach ($data['countries'] as $country)
                            <option value="{{ $country->id }}">{{ $country->name }}</option>
                            @endforeach
                        </select>
                        @error('country_id')
                        <div id="validationServer04Feedback" class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror

                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="exampleDataList" class="form-label ">{{ _trans('landlord.Name') }} <span
                                class="fillable">*</span></label>
                        <input class="form-control ot-input @error('name') is-invalid @enderror" name="name"
                            list="datalistOptions" id="exampleDataList"
                            placeholder="{{ _trans('landlord.enter name') }}">
                        @error('name')
                        <div id="validationServer04Feedback" class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="exampleDataList" class="form-label ">{{ _trans('landlord.Code') }} <span
                                class="fillable">*</span></label>
                        <input class="form-control ot-input @error('code') is-invalid @enderror" name="code"
                            list="datalistOptions" id="exampleDataList"
                            placeholder="{{ _trans('landlord.enter code') }}">
                        @error('code')
                        <div id="validationServer04Feedback" class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">

                        {{-- Status --}}
                        <label for="validationServer04" class="form-label">{{ _trans('landlord.Status') }} <span
                                class="fillable">*</span></label>

                        <select class="nice-select niceSelect bordered_style wide @error('status') is-invalid @enderror"
                            name="status" id="validationServer04" aria-describedby="validationServer04Feedback">

                            <option value="{{ App\Enums\Status::ACTIVE }}">{{ _trans('landlord.active') }}</option>
                            <option value="{{ App\Enums\Status::INACTIVE }}">{{ _trans('landlord.inactive') }}
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
                                </span>{{ _trans('landlord.submit') }}</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection