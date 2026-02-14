@extends('backend.master')
@section('title')
    {{ $title }}
@endsection
@section('content')
    <x-container title="{{ $title }}" :breadcrumbs="[['title' => 'Managing Bill'],['title' => 'Bills', 'route'=> route('bill.index')],['title' => $title]]">
        <div class="table-content table-basic mt-20">
            <div class="card">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <div class="col-lg-2">
                        <h4 class="mb-0">{{ _trans('common.Bill Callection') }}</h4>
                    </div>
                </div>
                <div class="card-body ot-card">
                    <form action="{{ route('bill.payment') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-7">
                                <input type="hidden" name="bill_id" value="{{ $bill->id }}">
                                <input type="hidden" name="owner_id" value="{{ @$bill->property->user->id }}">
                                <x-forms.input
                                    inputsInline
                                    readonly
                                    :requried="true"
                                    label="Total Amount"
                                    value="{{ $bill->total_amount }}"
                                    col="col-lg-12 mb-3"
                                    type="number"
                                    name="total_amount"
                                ></x-forms.input>
                                <x-forms.select
                                    :requried="true"
                                    inputsInline
                                    label="Account"
                                    col="col-lg-12 mb-3"
                                    name="account_id"
                                >
                                    <option value="">{{ _trans('common.Select One') }}</option>
                                    @foreach($accounts as $account)
                                        <option value="{{ $account->id }}">{{ $account->name }}</option>
                                    @endforeach
                                </x-forms.select>
                                <x-forms.input
                                    :requried="true"
                                    inputsInline
                                    label="Payment Amount"
                                    col="col-lg-12 mb-3"
                                    type="number"
                                    step="any"
                                    name="payment_amount"
                                ></x-forms.input>
                                <x-forms.file
                                    inputsInline
                                    label="Attachment"
                                    name="attachment"
                                    col="col-lg-12 mb-3">
                                </x-forms.file>
                                <x-forms.textarea
                                    inputsInline
                                    label="Additional Info"
                                    name="additional_info"
                                ></x-forms.textarea>
                                <x-button title="Process to pay"></x-button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </x-container>
@endsection
