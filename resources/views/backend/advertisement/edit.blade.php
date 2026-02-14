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
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ _trans('landlord.Home') }}</a>
                            </li>
                            <li class="breadcrumb-item" aria-current="page"><a
                                    href="{{ route('users.index') }}">{{ _trans('landlord.Advertisement') }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ _trans('landlord.Add New') }}</li>
                        </ol>
                </div>
            </div>
        </div>
        {{-- bradecrumb Area E n d --}}
        <div class="card ot-card">
            <div class="card-body">
                <form action="{{ route('advertisements.store') }}" enctype="multipart/form-data" method="post"
                    id="visitForm">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-md-6 mb-3">
                            <label for="validationServer04"
                                class="form-label">{{ _trans('landlord.Advertisement Type') }}</label>
                            <select id="advertisementType"
                                class="nice-select niceSelect bordered_style wide @error('advertisement_type') is-invalid @enderror"
                                name="advertisement_type" aria-describedby="validationServer04Feedback" onchange="adlist()">
                                <option data-display="Please Select Type">{{ _trans('landlord.Please Select Type') }}
                                </option>
                                <option value="1" {{ old('advertisement_type') == 1 ? 'selected' : '' }}>
                                    {{ _trans('landlord.Rent') }}</option>
                                <option value="2" {{ old('advertisement_type') == 2 ? 'selected' : '' }}>
                                    {{ _trans('landlord.Sell') }}
                                </option>
                            </select>
                            @error('advertisement_type')
                                <div id="validationServer04Feedback" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="validationServer04" class="form-label">{{ _trans('common.Property Name') }}</label>
                            <select
                                class="nice-select niceSelect bordered_style wide @error('properties') is-invalid @enderror"
                                name="properties" id="validationServer04" aria-describedby="validationServer04Feedback"
                                value="{{ old('properties') }}">
                                <option data-display="Please Select Property Name" value="">
                                    {{ _trans('landlord.Please Select Property Name') }}</option>
                                @foreach ($data['properties'] as $property)
                                    <option value="{{ $property->id }}">{{ $property->name }}
                                        {{ Auth::id() == 1 ? '(' . $property->id . ')' : '' }}</option>
                                @endforeach
                            </select>
                            @error('properties')
                                <div id="validationServer04Feedback" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="exampleDataList"
                                class="form-label ">{{ _trans('landlord.Booking Amount') }}</label>
                            <input class="form-control ot-input @error('booking_amount') is-invalid @enderror"
                                name="booking_amount" type="number" list="datalistOptions" id="exampleDataList"
                                placeholder="{{ _trans('common.40,000') }}">
                            @error('booking_amount')
                                <div id="validationServer04Feedback" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="row" id="rent">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="exampleDataList"
                                            class="form-label ">{{ _trans('landlord.Rent Amount') }}</label>
                                        <input class="form-control ot-input @error('rent_amount') is-invalid @enderror"
                                            name="rent_amount" type="number" list="datalistOptions" id="exampleDataList"
                                            placeholder="{{ _trans('common.40,000') }}">
                                        @error('rent_amount')
                                            <div id="validationServer04Feedback" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="validationServer04"
                                            class="form-label">{{ _trans('landlord.Rent Type') }}</label>
                                        <select
                                            class="nice-select niceSelect bordered_style wide @error('rent_type') is-invalid @enderror"
                                            name="rent_type" aria-describedby="validationServer04Feedback">
                                            <option value="" data-display="Please Select Type">
                                                {{ _trans('landlord.Please Select Type') }}</option>
                                            <option value="1">{{ _trans('landlord.Monthly') }}</option>
                                            <option value="2">{{ _trans('landlord.Yearly') }}
                                            </option>
                                        </select>
                                        @error('rent_type')
                                            <div id="validationServer04Feedback" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="exampleDataList"
                                            class="form-label ">{{ _trans('landlord.Rent Start Date') }}</label>
                                        <input class="form-control ot-input @error('rent_start_date') is-invalid @enderror"
                                            name="rent_start_date" type="date" list="datalistOptions"
                                            id="exampleDataList" placeholder="{{ _trans('common.40,000') }}">
                                        @error('rent_start_date')
                                            <div id="validationServer04Feedback" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="exampleDataList"
                                            class="form-label ">{{ _trans('landlord.Rent End Date') }}</label>
                                        <input class="form-control ot-input @error('rent_end_date') is-invalid @enderror"
                                            name="rent_end_date" type="date" list="datalistOptions"
                                            id="exampleDataList" placeholder="{{ _trans('common.40,000') }}">
                                        @error('rent_end_date')
                                            <div id="validationServer04Feedback" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row" id="sell">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="exampleDataList"
                                            class="form-label ">{{ _trans('landlord.Sell Amount') }}</label>
                                        <input class="form-control ot-input @error('sell_amount') is-invalid @enderror"
                                            name="sell_amount" type="number" list="datalistOptions"
                                            id="exampleDataList" placeholder="{{ _trans('common.40,000') }}"
                                            value="{{ old('sell_amount') }}">
                                        @error('sell_amount')
                                            <div id="validationServer04Feedback" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="exampleDataList"
                                            class="form-label ">{{ _trans('landlord.Sell Start Date') }}</label>
                                        <input class="form-control ot-input @error('sell_start_date') is-invalid @enderror"
                                            name="sell_start_date" type="date" list="datalistOptions"
                                            id="exampleDataList" placeholder="{{ _trans('common.40,000') }}">
                                        @error('sell_start_date')
                                            <div id="validationServer04Feedback" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="validationServer04" class="form-label">{{ _trans('common.Negotiable') }}</label>
                            <select
                                class="nice-select niceSelect bordered_style wide @error('negotiable') is-invalid @enderror"
                                name="negotiable" id="validationServer04" aria-describedby="validationServer04Feedback"
                                value="{{ old('name') }}">
                                <option value="1">{{ _trans('common.Negotiable') }}</option>
                                <option value="0">{{ _trans('common.Not Negotiable') }}
                                </option>
                            </select>
                            @error('negotiable')
                                <div id="validationServer04Feedback" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="validationServer04" class="form-label">{{ _trans('common.Status') }}</label>
                            <select
                                class="nice-select niceSelect bordered_style wide @error('status') is-invalid @enderror"
                                name="status" id="validationServer04" aria-describedby="validationServer04Feedback"
                                value="{{ old('name') }}">
                                <option value="1">{{ _trans('common.Active') }}</option>
                                <option value="0">{{ _trans('common.Inactive') }}
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
                                <button type="submit" class="btn btn-lg ot-btn-primary"><span><i
                                            class="fa-solid fa-save"></i>
                                    </span>{{ _trans('common.Create') }}</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection


@push('script')
    @include('backend.advertisement.advertise_script')
@endpush
