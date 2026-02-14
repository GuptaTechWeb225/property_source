@extends('marsland::layouts.customer')
@section('title', _trans('common.Properties'))

@section('customer-content')
    <div class="sidebar-content-wrap flex-fill ot-card white-bg border-0">
        <section class="my-orders">
            <div class="row">
                <div class="col-xl-12">
                    <div class="page-content">
                        <div class="page-header">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h4 class="bradecrumb-title mb-1">{{ $title }}</h4>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a
                                                href="{{ route('dashboard') }}">{{ _trans('common.home') }}</a>
                                        </li>
                                        <li class="breadcrumb-item">{{ $title }}</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            @forelse($orders as $order)
                                <div class="col-lg-12">
                                    <div class="card mb-16 border-0">
                                        <div
                                            class="card-header border-0 d-flex align-items-center justify-content-between">
                                            <div class="">
                                                <h5 class="text-uppercase">{{ _trans('common.Invoice No.') }}
                                                    : {{ $order->invoice_no }}</h5>
                                                <p>{{ _trans('common.Date') }}
                                                    : {{ date('F d Y', strtotime($order->date)) }}</p>
                                            </div>
                                            <h5>{{ _trans('common.Total') }} {{ priceFormat($order->grand_total) }}</h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                @foreach ($order->orderDetails as $item)
                                                    <div class="col-lg-6">
                                                        <a href="{{ route('customer.property.details', $item->id) }}" class="text-muted">
                                                            <div class="card card-body shadow-sm">
                                                                <div class="d-flex gap-10">
                                                                    <img height="100" width="100"
                                                                         src="{{ @globalAsset($item->property->defaultImage->path) }}"
                                                                         alt="{{ $item->property->name }}">

                                                                    <div class="info">
                                                                        <h5 class="text-primary">{{ @$item->property->name }}</h5>
                                                                        <strong>{{ @App\Utils\Utils::advertisementTypes()[$item->advertisement->advertisement_type] }}</strong>
                                                                        <div class="col-md-6 mb-1">
                                                                            {{ _trans('common.Status') }}: <span
                                                                                class="badges text-uppercase badge-bg-green">{{ $item->status }}</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <h6 class="text-center my-5">{{ _trans('common.No Data Found') }}</h6>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@push('script')

    <script>
        const calculatePaymentAmount = (order_id) => {
            var formData = {
                order_id: order_id,
            };

            $.ajax({
                type: "post",
                dataType: "json",
                data: formData,
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
                url: '{{ route('customer.calculate_payment') }}',
                success: function (data) {
                    $('#payable_amount').val(data.data);
                },
                error: function (data) {
                    console.log('Something Went Wrong')
                },
            });
        }

        const calculateDueAmount = () => {
            let rentAmount = Number($('#payable_amount').val());
            let payment_amount = Number($('#payment_amount').val());

            if (payment_amount > rentAmount) {
                console.log('{{ _trans("common.Amount can't greater than rent amount") }}')
                $('#due_amount').val(rentAmount);
                return;
            }

            let payableAmount = rentAmount - payment_amount;

            $('#due_amount').val(payableAmount);
        }
    </script>
@endpush
