@extends('backend.master')
@section('title')
    {{ @$title }}
@endsection
@section('content')
    <x-container title="{{ $title }}" :breadcrumbs="[['title' => 'Orders', 'route' => route('orders.index')], ['title' => 'Add New']]">
        <x-slot:rightPageHeader>
            <div class="text-end">
                <a href="{{ route('orders.checkout') }}" class="position-relative d-flex align-items-center justify-content-end gap-2">
                       <div class="position-relative p-2">
                           <i class="las la-shopping-cart la-2x"></i>
                           <span class="badge bg-danger  position-absolute end-0 top-0">
                                @if(session()->has('order_cart'))
                                   {{ count(session()->get('order_cart')) }}
                               @else
                                   0
                               @endif
                            </span>
                       </div>
                    <h3 class="my-0">
                       <span>{{ _trans('landlord.Booking List') }}</span>
                   </h3>
                </a>
            </div>
        </x-slot:rightPageHeader>
        <div class="row">
            @forelse($advertisements as $advertisement)
                <div class="col-xl-6 col-lg-6 col-md-6 mb-3">
                    <div class="card ot-card">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card-header position-relative">
                                    <img class="img-fluid" src="{{ @globalAsset($advertisement->property->defaultImage->path) }}"
                                         alt="{{ $advertisement->property->name }}">
                                    <div class="position-absolute top-0 start-0">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card-body">
                                    <h3 class="">{{ @$advertisement->property->name }} (<span class="text-warning">{{ $advertisement->property->category->name }}</span>)</h3>
                                    <div class="d-flex justify-content-between flex-column gap-2 mb-1">
                                        @if($advertisement->advertisement_type == 1)
                                            <h5 class="m-0">{{ _trans('landlord.Booking Price') }} : {{ priceFormat($advertisement->booking_amount) }}</h5>
                                            <h5 class="m-0">{{ _trans('landlord.Rent Price') }} : {{ priceFormat($advertisement->rent_amount) }}</h5>
                                            <h5 class="m-0">{{ _trans('landlord.Rent Start Date') }} : {{ $advertisement->rent_start_date }}</h5>
                                            <h5 class="m-0">{{ _trans('landlord.Rent End Date') }} : {{ $advertisement->rent_end_date }}</h5>
                                        @else
                                            <h5 class="m-0">{{ _trans('landlord.Sell Price') }} : {{ priceFormat($advertisement->sell_amount) }}</h5>
                                            <h5 class="m-0">{{ _trans('landlord.Sell Start Date') }} : {{ $advertisement->sell_start_date }}</h5>
                                        @endif
                                    </div>

                                    <div class="d-flex justify-content-between gap-3  mt-3">
                                        <span class="body_text d-flex gap-2 align-items-center justify-content-center font_14"><i class="fas fa-bed fw-bolder body_text"></i>{{ $advertisement->property->bedroom }} {{ _trans('landlord.Bed') }}</span>
                                        <span class="body_text d-flex gap-2 align-items-center justify-content-center font_14"><i class="far fa-bath fw-bolder body_text"></i>{{ $advertisement->property->bathroom }} {{ _trans('landlord.Bath') }} </span>
                                        <span class="body_text d-flex gap-2 align-items-center justify-content-center font_14"><i class="far fa-border-all fw-bolder body_text"></i>{{ $advertisement->property->size }} {{ _trans('landlord.sqft') }} </span>
                                    </div>
                                    <a href="{{ route('orders.addToCart',$advertisement->id) }}" class="btn ot-btn-primary d-block w-100 mt-3">
                                        <i class="fa fa-plus-circle"></i> {{ _trans('BOOK PROPERTY') }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="row justify-content-center my-5">
                    <div class="col-lg-4 text-center">
                        <img src="{{ asset('images/no_data.svg') }}" alt="" class="mb-primary"
                             width="100">
                        <p class="mb-0 text-center">{{ _trans('landlord.No data available')}}</p>
                        <p class="mb-0 text-center text-secondary font-size-90">
                            {{ _trans('landlord.Please add new entity regarding this table')}}</p>
                    </div>
                </div>
            @endforelse
        </div>
    </x-container>
@endsection
