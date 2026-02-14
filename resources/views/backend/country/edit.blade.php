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
                        <li class="breadcrumb-item"><a href="{{ route('countries.index') }}">{{ $data['title'] }}</a>
                        </li>
                        <li class="breadcrumb-item">{{ _trans('landlord.edit') }}</li>
                    </ol>
            </div>
        </div>
    </div>
    {{-- bradecrumb Area E n d --}}

    <div class="card ot-card">
        <div class="card-header">
            <h4>{{ _trans('landlord.Edit') }}</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('countries.update', @$data['country']->id) }}" enctype="multipart/form-data"
                method="post" id="visitForm">
                @csrf
                @method('PUT')
                <div class="row mb-3">
                    <div class="col-lg-12">
                        <div class="row">

                            <div class="col-md-6 mb-3">
                                <label for="exampleDataList" class="form-label ">{{ _trans('landlord.Name') }} <span
                                        class="fillable">*</span></label>
                                <input class="form-control ot-input @error('name') is-invalid @enderror" name="name"
                                    value="{{ $data['country']->name }}" list="datalistOptions" id="exampleDataList"
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
                                    list="datalistOptions" id="exampleDataList" value="{{ $data['country']->iso2 }}"
                                    placeholder="{{ _trans('landlord.enter code') }}">
                                @error('code')
                                <div id="validationServer04Feedback" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="exampleDataList" class="form-label ">{{ _trans('landlord.Currency Name') }}
                                    <span class="fillable">*</span></label>
                                <input class="form-control ot-input @error('currency_name') is-invalid @enderror"
                                    value="{{ $data['country']->currency_name }}" name="currency_name"
                                    list="datalistOptions" id="exampleDataList"
                                    placeholder="{{ _trans('landlord.enter currency name') }}">
                                @error('currency_name')
                                <div id="validationServer04Feedback" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="exampleDataList" class="form-label ">{{ _trans('landlord.Currency Code') }}
                                    <span class="fillable">*</span></label>
                                <input class="form-control ot-input @error('currency') is-invalid @enderror"
                                    value="{{ $data['country']->currency }}" name="currency" list="datalistOptions"
                                    id="exampleDataList" placeholder="{{ _trans('landlord.enter currency') }}">
                                @error('currency')
                                <div id="validationServer04Feedback" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="exampleDataList"
                                    class="form-label ">{{ _trans('landlord.Currency Symbol') }} <span
                                        class="fillable">*</span></label>
                                <input class="form-control ot-input @error('currency_symbol') is-invalid @enderror"
                                    value="{{ $data['country']->currency_symbol }}" name="currency_symbol"
                                    list="datalistOptions" id="exampleDataList"
                                    placeholder="{{ _trans('landlord.enter currency symbol') }}">
                                @error('currency_symbol')
                                <div id="validationServer04Feedback" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="col-md-6">

                                {{-- Status --}}
                                <label for="validationServer04" class="form-label">{{ _trans('landlord.Status') }}
                                    <span class="fillable">*</span></label>

                                <select
                                    class="nice-select niceSelect bordered_style wide @error('status') is-invalid @enderror"
                                    name="status" id="validationServer04" aria-describedby="validationServer04Feedback">

                                    <option value="{{ App\Enums\Status::ACTIVE }}"
                                        {{ @$data['country']->status == App\Enums\Status::ACTIVE ? 'selected' : '' }}>
                                        {{ _trans('landlord.Active') }}
                                    </option>
                                    <option value="{{ App\Enums\Status::INACTIVE }}"
                                        {{ @$data['country']->status == App\Enums\Status::INACTIVE ? 'selected' : '' }}>
                                        {{ _trans('landlord.Inactive') }}
                                    </option>
                                </select>
                                @error('status')
                                <div id="validationServer04Feedback" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror

                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mt-24">
                        <div class="text-end">
                            <button class="btn btn-lg ot-btn-primary"><span><i class="fa-solid fa-save"></i>
                                </span>{{ _trans('landlord.Update') }}
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection