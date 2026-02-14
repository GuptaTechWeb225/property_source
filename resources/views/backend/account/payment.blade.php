@extends('backend.master')
@section('title')
    {{ $title }}
@endsection
@section('content')
    <x-container title="{{ $title }}" :breadcrumbs="[['title' => 'Account'],['title' => $title]]">
        <div class="table-content table-basic mt-20">
            <div class="card">
                <div class="card-header py-0 pb-3 d-flex justify-content-between align-items-center">
                    <div class="col-lg-4">
                        <h4 class="mb-0">{{ _trans('common.Payments History') }}</h4>
                    </div>
                    <div class="col-lg-8">
                        <form action="" class="row">
                            <x-forms.input
                                col="col-lg-4"
                                name="invoice_no"
                                placeholder="Invoice No"
                                value="{{ request('invoice_no') }}"
                            ></x-forms.input>
                            <x-forms.input
                                col="col-lg-4"
                                type="date"
                                name="date"
                                value="{{ request('date') }}"
                            ></x-forms.input>
                            @if(request('invoice_no') || request('date'))
                                <div class="col-lg-1 mt-5">
                                    <a type="reset" href="{{ route('account.payment') }}" class="btn btn-danger">{{ _trans('common.Reset') }}</a>
                                </div>
                            @endif
                            <div class="col-lg-2 mt-2">
                                <x-button title="Search" icon="las la-search"></x-button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card-body ot-card">
                    <div class="table-responsive">
                        <table class="table table-bordered ot-table-bg">
                            <thead class="thead">
                            <tr>
                                <th class="serial">{{ _trans('common.SR No') }}</th>
                                <th>{{ _trans('common.Invoice No.') }}</th>
                                <th>{{ _trans('common.Date') }}</th>
                                <th>{{ _trans('common.Amount') }}</th>
                                <th>{{ _trans('common.Payment Method') }}</th>
                                <th>{{ _trans('common.TRX No') }}</th>
                                <th>{{ _trans('common.Attachment') }}</th>
                                <th class="action">{{ _trans('common.Action') }}</th>
                            </tr>
                            </thead>
                            <tbody class="tbody">
                            @forelse($payments as $row)
                                <tr>
                                    <th>{{ $loop->iteration }}</th>
                                    <td>{{ $row->invoice_no }}</td>
                                    <td>{{ $row->date }}</td>
                                    <td>{{ $row->amount }}</td>
                                    <td>{{ $row->payment_method }}</td>
                                    <td>{{ $row->trx_no }}</td>
                                    <td>
                                        @if($row->attachment)
                                            <a target="_blank" href="{{ @$row->attachment->path }}">{{ _trans('common.Attachment') }}</a>
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td class="action">
                                        <x-action.button
                                            class="btn ot-btn-primary"
                                            text="Invoice"
                                            route="{{ route('account.payment_details', $row->id) }}"
                                            icon="fa-solid fa-print">
                                        </x-action.button>
                                    </td>
                                </tr>
                            @empty
                                <x-emptytable></x-emptytable>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </x-container>
@endsection
