@extends('backend.master')

@section('title')
    {{ @$data['title'] }}
@endsection
@section('content')
    <x-container title="{{ $title }}"
                 :breadcrumbs="[['title' => 'tenants', 'route' => route('tenants.index')], ['title' => 'Properties']]">
        <div class="row">

            @foreach($advertisments as $advertisment)
                <div class="col-xl-6 col-lg-6 col-md-6 mb-3">
                    <div class="card ot-card">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card-header position-relative">
                                    <img class="img-fluid" src="{{ @globalAsset($advertisment->property->defaultImage->path) }}"
                                         alt="{{ $advertisment->property->name }}">
                                    <div class="position-absolute top-0 start-0">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card-body">
                                    <h3 class="">{{ @$advertisment->property->name }} (<span class="text-warning">{{ $advertisment->property->category->name }}</span>)</h3>
                                    <div class="d-flex justify-content-between flex-column gap-2 mb-1">
                                        @if($advertisment->property->deal_type == 1)
                                        <h5 class="m-0">{{ _trans('landlord.Booking Price') }} : {{ $advertisment->booking_amount }}</h5>
                                        <h5 class="m-0">{{ _trans('landlord.Rent Price') }} : {{ $advertisment->rent_amount }}</h5>
                                        <h5 class="m-0">{{ _trans('landlord.Rent Start Date') }} : {{ $advertisment->rent_start_date }}</h5>
                                        <h5 class="m-0">{{ _trans('landlord.Rent End Date') }} : {{ $advertisment->rent_end_date }}</h5>
                                        @else
                                            <h5 class="m-0">{{ _trans('landlord.Sell Price') }} : {{ $advertisment->sell_amount }}</h5>
                                            <h5 class="m-0">{{ _trans('landlord.Sell Start Date') }} : {{ $advertisment->sell_start_date }}</h5>
                                            <h5 class="m-0">{{ _trans('landlord.Sell End Date') }} : {{ $advertisment->rent_end_date }}</h5>
                                        @endif
                                    </div>

                                    <div class="d-flex justify-content-between gap-3  mt-3">
                                        <span class="body_text d-flex gap-2 align-items-center justify-content-center font_14"><i class="fas fa-bed fw-bolder body_text"></i>{{ $advertisment->property->bedroom }} {{ _trans('landlord.Bed') }}</span>
                                        <span class="body_text d-flex gap-2 align-items-center justify-content-center font_14"><i class="far fa-bath fw-bolder body_text"></i>{{ $advertisment->property->bathroom }} {{ _trans('landlord.Bath') }} </span>
                                        <span class="body_text d-flex gap-2 align-items-center justify-content-center font_14"><i class="far fa-border-all fw-bolder body_text"></i>{{ $advertisment->property->size }} {{ _trans('landlord.sqft') }} </span>
                                    </div>
                                    <a href="{{ route('tenants.checkout', $advertisment->id) }}" class="btn ot-btn-primary d-block w-100 mt-3">
                                       <i class="fa fa-plus-circle"></i> {{ _trans('BOOK PROPERTY') }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </x-container>
@endsection
