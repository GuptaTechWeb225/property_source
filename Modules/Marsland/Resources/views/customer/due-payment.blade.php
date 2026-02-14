@extends('marsland::layouts.customer')
@section('title', _trans('common.Due payment'))

@section('customer-content')
    <div class="sidebar-content-wrap flex-fill ot-card white-bg border-0">
        <!-- Due Payment S t a r t -->
        <section class="due-payment">
            <div class="row">
                <div class="col-xl-12">

                    <div class="d-flex align-items-center justify-content-between flex-wrap mb-10">
                        <!-- Section Tittle -->
                        <div class="section-tittle-two pb-0">
                            <h5 class="title font-600 text-capitalize">{{ _trans('common.Due Payment') }}</h5>
                        </div>
                    </div>

                    <div class="data-show-table">
                        <table class="table-responsive">
                            <thead>
                            <tr>
                                <th class="text-capitalize">{{ _trans('common.Property') }} </th>
                                <th class="text-capitalize">{{ _trans('common.Amount') }} </th>
                                <th class="text-capitalize">{{ _trans('common.Paid Amount') }}</th>
                                <th class="text-capitalize">{{ _trans('common.Due Amount') }}</th>
                                <th class="text-capitalize">{{ _trans('common.Payment Status') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($duePayments as $duePayment)
                                <tr>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <img src="{{ @globalAsset($duePayment->property->defaultImage->path) }}"
                                                 height="40" width="40" alt="{{ $duePayment->property->name }}">
                                            <strong>{{ @$duePayment->property->name }}</strong>
                                        </div>
                                    </td>
                                    <td>{{ priceFormat($duePayment->amount) }}</td>
                                    <td>{{ priceFormat($duePayment->paid_amount) }}</td>
                                    <td>{{ priceFormat($duePayment->due_amount) }}</td>
                                    <td>
                                        @if($duePayment->payment_status)
                                            <span
                                                class="text-capitalize badge bg-{{ $duePayment->payment_status == 'paid' ? 'success':'danger' }}">{{ $duePayment->payment_status }}</span>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5">
                                        <div class="d-flex justify-content-center p-3">
                                            <p>{{ _trans("common.No data found") }}</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
        <!-- End-of Due Payment -->
    </div>
@endsection

