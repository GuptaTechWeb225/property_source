@extends('backend.master')
@section('title')
    {{ $title }}
@endsection
@section('content')
    <x-container title="{{ $title }}" :breadcrumbs="[['title' => 'Account'],['title' => $title]]">
        <div class="table-content table-basic mt-20">
            <div class="card">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <div class="col-lg-2">
                        <h4 class="mb-0">{{ _trans('common.Generated Bills') }}</h4>
                    </div>
                </div>
                <div class="card-body ot-card">
                    <div class="row">
                        <div class="col-lg-6">
                            <form action="">
                                <x-forms.select label="Occupied Property" name="bill_for" col="col-lg-12">
                                    <option value="">{{ _trans('common.Select One') }}</option>
                                    @foreach($occupied_properties as $occupied)
                                        <option
                                            {{ $occupied->id == request('bill_for') ? 'selected':'' }} value="{{ $occupied->id }}">
                                            {{ @$occupied->property->name }} ({{ @$occupied->tenant->name }})
                                        </option>
                                    @endforeach
                                </x-forms.select>
                                <button class="btn ot-btn-primary mt-5">{{ _trans('common.Details') }}</button>
                            </form>
                        </div>

                        <div class="col-lg-5 offset-lg-1">
                            @if(!empty($bill))
                                <h5>{{ _trans('common.Bill Details') }}</h5>
                                <hr>
                                <form action="{{ route('bill.store') }}" method="post">
                                    @csrf
                                    <input type="hidden" value="{{ request('bill_for') }}" name="id">
                                    <table class="table table-borderless">
                                        <tr>
                                            <th>{{ _trans('common.Property') }}</th>
                                            <th>:</th>
                                            <td>{{ @$bill->property->name }}</td>
                                        </tr>
                                        <tr>
                                            <th>{{ _trans('common.Tenant') }}</th>
                                            <th>:</th>
                                            <td>{{ @$bill->tenant->name }}</td>
                                        </tr>
                                        <tr>
                                            <th>{{ _trans('common.Due Date') }}</th>
                                            <th>:</th>
                                            <td>{{ date('Y-m-d',strtotime(@$bill->orderDetail->end_date."-10 day")) }}</td>
                                        </tr>
                                        <tr>
                                            <th>{{ _trans('common.Month of Bill') }}</th>
                                            <th>:</th>
                                            <td class="pe-5">
                                                <x-forms.input type="month" name="month" :required="true">
                                                </x-forms.input>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>{{ _trans('common.Total Amount') }}</th>
                                            <th>:</th>
                                            <td>{{ @$bill->orderDetail->total_amount }}</td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" class="text-end">
                                                <button type="submit" class="btn ot-btn-primary">
                                                    <i class="las la-receipt"></i> {{ _trans('common.Generate Bill') }}
                                                </button>
                                            </td>
                                        </tr>
                                    </table>
                                </form>
                            @else
                                <h4 class="py-5 text-danger">{{ _trans('common.Please select occupied property to generate bill') }}</h4>
                            @endif
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </x-container>
@endsection
