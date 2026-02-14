@extends('backend.master')
@section('title')
    {{ @$title }}
@endsection
@php
    $subtotal = 0;
    $total_discount = 0;
@endphp
@section('content')
    <x-container title="{{ $title }}"
                 :breadcrumbs="[['title' => 'Orders', 'route' => route('orders.index')], ['title' => 'Checkout']]">
        <x-slot:rightPageHeader>
            <div class="text-end">
                <a href="{{ route('orders.checkout') }}"
                   class="position-relative d-flex align-items-center justify-content-end gap-2">
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
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="card ot-card">
            <form action="{{ route('orders.store') }}" class="row justify-content-end" method="post">
                @csrf
                <div class="d-flex align-items-center gap-4 mb-5">
                    <h1 class="mb-0">{{ _trans('landlord.Booking List') }}</h1>
                    <a href="{{ route('orders.create') }}" class="btn ot-btn-primary">{{ _trans('landlord.Booking More') }}</a>
                </div>
                <table class="table table-borderless">
                    <thead>
                    <tr>
                        <th>{{ _trans('landlord.Property') }}</th>
                        <th>{{ _trans('landlord.Price') }}</th>
                        <th>{{ _trans('landlord.Discount') }}</th>
                        <th>{{ _trans('landlord.Total Amount') }}</th>
                        <th class="text-center" width="10%">{{ _trans('landlord.Action') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($carts as $key => $property)
                        <tr>
                            <td>{{ @$property['property'] }}</td>
                            <td>{{ priceFormat($property['price']) }}</td>
                            <td>{{ priceFormat($property['discount_amount']) }}</td>
                            <td>{{ priceFormat($property['total_amount']) }}</td>
                            <td class="text-center">
                                <a href="{{ route('orders.removeFromCart',$key) }}" class="btn btn-danger btn-sm">
                                    <i class="fa fa-trash"></i> {{ _trans('landlord.Remove') }}</a>
                            </td>
                        </tr>
                        @php
                            $subtotal += $property['price'];
                            $total_discount += $property['discount_amount'];
                        @endphp
                    @empty
                        <x-emptytable></x-emptytable>
                    @endforelse
                    </tbody>
                </table>
                <hr>
                <div class="col-lg-3">
                    <table class="table table-borderless">
                        <tr>
                            <th class="text-end">{{ _trans('landlord.Sub Total') }}</th>
                            <th>:</th>
                            <td>{{ priceFormat($subtotal) }}</td>
                            <input type="hidden" name="subtotal" value="{{ $subtotal }}">
                        </tr>
                        <tr>
                            <th class="text-end">{{ _trans('landlord.Total Discount') }}</th>
                            <th>:</th>
                            <td>{{ priceFormat($total_discount) }}</td>
                            <input type="hidden" name="discount_amount" value="{{ $total_discount }}">
                        </tr>
                        <tr>
                            <th class="text-end">{{ _trans('landlord.Total Amount') }}</th>
                            <th>:</th>
                            <td>{{ priceFormat($subtotal - $total_discount) }}</td>
                            <input type="hidden" name="grand_total" value="{{ $subtotal - $total_discount }}">
                        </tr>
                    </table>
                    <x-forms.select label="Tenent" :required="true" name="tenant_id" col="col-lg-12">
                        <option value="">{{ _trans('landlord.Select On') }}</option>
                        @foreach($tenants  as $tenant)
                            <option
                                value="{{ $tenant->id }}" {{ @old('tenant_id') == $tenant->id ? 'selected': ''}}>{{ $tenant->name }}</option>
                        @endforeach
                    </x-forms.select>
                </div>
                <br>
                <br>
                <br>
                <div class="col-lg-12">
                    @if(count($carts) > 0)
                        <x-button title="CONFIRM ORDER" icon="fa fa-plus-circle"></x-button>
                    @endif
                </div>
            </form>
        </div>
    </x-container>
@endsection
