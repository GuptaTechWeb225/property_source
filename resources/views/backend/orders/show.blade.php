@extends('backend.master')
@section('title')
    {{ @$title }}
@endsection
@section('content')
    <div class="page-content">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <h4 class="bradecrumb-title mb-1">{{ $title }}</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ _trans('common.home') }}</a>
                        </li>
                        <li class="breadcrumb-item">{{ $title }}</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="card mb-16 border-0 shadow-sm">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 col-lg-4 d-flex flex-column gap-1">
                        <small>{{ _trans('common.To') }}</small>
                        <b>{{ @$order->tenant->name }}</b>
                        <span>{{ @$order->tenant->present_address }}, {{ @$order->tenant->city->name }}</span>
                        <span>{{ @$order->tenant->country->name }}, {{ @$order->tenant->zip_code }}, {{ @$order->tenant->state->name }}</span>
                        <span>{{ @$order->tenant->email }}</span>
                        <span>{{ @$order->tenant->phone }}</span>
                    </div>
                    <div class="col-md-6 col-lg-4 d-flex flex-column gap-1">
                        <small>{{ _trans('common.Billing Address') }}</small>
                        @if(!empty($order->billingAddress))
                            <b>
                                {{ @$order->billingAddress->name }}
                            </b>
                            <span>{{ @$order->billingAddress->address }}, {{ @$order->billingAddress->country->name }}</span>
                            <span>{{ @$order->billingAddress->email }}</span>
                            <span>{{ @$order->billingAddress->phone }}</span>
                        @else
                            <b>{{ @$order->tenant->name }}</b>
                            <span>{{ @$order->tenant->present_address }}, {{ @$order->tenant->city->name }}</span>
                            <span>{{ @$order->tenant->country->name }}, {{ @$order->tenant->zip_code }}, {{ @$order->tenant->state->name }}</span>
                            <span>{{ @$order->tenant->email }}</span>
                            <span>{{ @$order->tenant->phone }}</span>
                        @endif
                    </div>
                    <div class="col-md-6 col-lg-4 d-flex flex-column gap-1 text-end">
                        <h3 class="fs-3 text-end">{{ _trans('common.Invoice No.') }}: {{ $order->invoice_no }}</h3>
                        <span>{{ _trans('common.Date') }}: {{ date('F d Y', strtotime($order->date)) }}</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($order->orderDetails as $item)
                <div class="col-lg-12">
                    <div class="card mb-16 border-0 shadow-sm">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-4">
                                    <img height="300" width="100" class="d-block w-100"
                                         src="{{ @globalAsset($item->property->defaultImage->path) }}"
                                         alt="{{ $item->property->name }}">
                                </div>
                                <div class="col-lg-8">
                                    <h3>{{ @$item->property->name }}</h3>
                                    <strong class="border-bottom text-primary">{{ _trans('landlord.Property Info') }}</strong>
                                    <div class="row mb-3">
                                        <div class="col-md-6 mb-1">
                                            {{ _trans('common.Property Size') }}: {{ @$item->property->size }}
                                        </div>
                                        <div class="col-md-6 mb-1">
                                            {{ _trans('common.Flat No') }}: {{ @$item->property->flat_no }}
                                        </div>
                                        <div class="col-md-6 mb-1">
                                            {{ _trans('common.Bedroom') }}: {{ @$item->property->bedroom }}
                                        </div>
                                        <div class="col-md-6 mb-1">
                                            {{ _trans('common.Bathroom') }}: {{ @$item->property->bathroom }}
                                        </div>
                                        <div class="col-md-6 mb-1">
                                            {{ _trans('common.Date') }}: {{ @$item->start_date }} @if($item->end_date)
                                                - {{ $item->end_date }}
                                            @endif
                                        </div>
                                        <div class="col-md-6 mb-1">
                                            {{ _trans('common.Rent Amount') }}: {{ priceFormat($item->price) }}
                                        </div>
                                        <div class="col-md-6 mb-1">
                                            {{ _trans('common.Discount Amount') }}: {{ priceFormat($item->discount_amount) }}
                                        </div>
                                        <div class="col-md-6 mb-1">
                                            {{ _trans('common.Payable Amount') }}
                                            : {{ priceFormat($item->total_amount) }}
                                        </div>
                                        <div class="col-md-6 mb-1">
                                            {{ _trans('common.Max Memeber Allow') }}
                                            : {{ $item->advertisement->max_member }}
                                        </div>
                                    </div>
                                    <strong class="border-bottom text-primary">{{ _trans('landlord.Payment Info') }}</strong>
                                    <div class="row mb-3">
                                        <div class="col-md-6 mb-1">
                                            {{ _trans('common.Total Paid') }}: {{ priceFormat($item->payments->sum('amount')) }}
                                        </div>
                                        <div class="col-md-6 mb-1">
                                            {{ _trans('common.Due Amount') }}: {{ priceFormat($item->total_amount - $item->payments->sum('amount'))}}
                                        </div>
                                    </div>
                                    <div class="d-flex">
                                        @if($item->status == 'pending')
                                            <form action="{{ route('orders.update.detail')}}"
                                                  enctype="multipart/form-data"
                                                  method="post">
                                                @csrf
                                                <input type="hidden" name="order_item_id"
                                                       id="order_id" value="{{ $item->id }}">
                                                @if(hasPermission('order_create'))
                                                <button type="submit" value="approved" name="status"
                                                        class="btn btn-success">
                                                    <i class="las la-check-circle"></i>
                                                    {{ _trans('common.Approve') }}
                                                </button>
                                                <button type="submit" value="rejected" name="status"
                                                        class="btn btn-danger">
                                                    <i class="las la-ban"></i>
                                                    {{ _trans('common.Reject') }}
                                                </button>
                                                @endif
                                            </form>
                                        @else
                                            @if($item->status == 'approved')
                                            <span class="btn disabled text-capitalize btn-success">
                                                <i class="las la-check-circle"></i> {{ $item->status }}
                                            </span>
                                            @else
                                                <span class="btn disabled text-capitalize btn-danger">
                                                <i class="las la-ban"></i> {{ $item->status }}
                                            </span>
                                            @endif
                                        @endif
                                        @if(!empty($item->payments))
                                            @if($item->payments->sum('amount') == $item->property->rent_amount - $item->discount_amount)
                                                <span class="btn btn-success ml-6">
                                                {{ _trans('common.Paid') }}
                                            </span>

                                            @else
                                                @if(hasPermission('order_payment'))
                                                <button onclick="calculatePaymentAmount({{@$item->id}})" type="button"
                                                        class="btn btn-primary ml-6" data-bs-toggle="modal"
                                                        data-bs-target="#exampleModal_{{@$order->id}}">
                                                    <i class="las la-money-bill"></i>
                                                    {{ _trans('common.Payment') }}
                                                </button>
                                                @endif
                                            @endif
                                        @endif
                                    </div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    @if(count($item->familyMembers) > 0)
                                        <div class="row my-5">
                                            <h4 class="mb-3">{{ _trans('landlord.Family Mambers') }}</h4>
                                            @foreach($item->familyMembers as $member)
                                                <div class="col-lg-4 mb-3">
                                                    <div class="card card-body">
                                                        <div class="d-flex align-items-center gap-10">
                                                            <div class="position-relative">
                                                                <img height="70" width="70"
                                                                     src="{{ @globalAsset($member->image->path) }}"
                                                                     alt="{{ $member->name }}">
                                                                <span class="position-absolute top-0 start-0 text-danger text-capitalize fw-bold">{{ !$member->status ? 'not eligible':'' }}</span>
                                                            </div>
                                                            <div class="d-flex flex-column gap-1">
                                                                <strong>{{ $member->name }}</strong>
                                                                <small>{{ $member->phone }}</small>
                                                                <div class="d-flex gap-2">
                                                                    <a target="_blank"
                                                                       href="{{ @globalAsset($member->document->path) }}"
                                                                       title="Document"
                                                                       class="badge bg-primary border-0 text-white"><i
                                                                            class="ri-article-line"></i>
                                                                    </a>
                                                                    {{--                                                                    <a onclick="return confirm('Are you sure?')"--}}
                                                                    {{--                                                                       title="Remove member"--}}
                                                                    {{--                                                                       href="{{ route('customer.family-member.delete', $member->id) }}"--}}
                                                                    {{--                                                                       class="badge bg-danger border-0 text-white"><i--}}
                                                                    {{--                                                                            class="ri-delete-bin-2-line"></i>--}}
                                                                    {{--                                                                    </a>--}}
                                                                    @if(!$member->status)
                                                                        <a onclick="return confirm('Are you sure?')" href="{{ route('orders.familyMemberEligible', $member->id) }}" class="badge bg-secondary text-white">Make Eligible</a>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>

                                <div class="col-lg-6">
                                    @if(count($item->assets) > 0)
                                        <div class="row my-5">
                                            <h4 class="mb-3">{{ _trans('common.Assets') }}</h4>
                                            @foreach($item->assets as $asset)
                                                <div class="col-lg-6">
                                                    <div class="card card-body">
                                                        <div class="d-flex align-items-center gap-10">
                                                            <img height="70" width="70"
                                                                 src="{{ @globalAsset($asset->attachment->path) }}"
                                                                 alt="">
                                                            <div class="d-flex flex-column">
                                                                <strong>{{ $asset->name }}</strong>
                                                                <small>{{ $asset->serial }}</small>
                                                            </div>
                                                        </div>
                                                        <div class="pt-2">
                                                            {!! $asset->note !!}
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Modal -->
                        <div class="modal fade sticky" id="exampleModal_{{@$order->id}}" tabindex="-1"
                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title"
                                            id="exampleModalLabel"> {{ _trans('common.Order Payment') }}</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                    </div>
                                    <form action="{{ route('orders.payment') }}" enctype="multipart/form-data"
                                          method="post">
                                        @csrf
                                        <div class="modal-body">
                                            <input type="hidden" name="order_detail_id" value="{{$item->id}}">
                                            <input type="hidden" name="property_id" value="{{ @$item->property->id }}">
                                            <input type="hidden" name="tenant_id" value="{{ @$order->tenant->id }}">

                                            <div class="col-md-12 mb-3 mt-3">
                                                <label for="address"
                                                       class="form-label">{{ _trans('common.Payable Amount') }}</label>
                                                <input readonly class="form-control ot-input" name="payable_amount"
                                                       id="payable_amount"
                                                       placeholder="{{ _trans('common.Payable Amount') }}"
                                                       value="{{@$item->price }}">
                                            </div>
                                            <div class="col-md-12 mb-3 mt-3">
                                                <label for="address"
                                                       class="form-label">{{ _trans('common.Payment Amount') }}</label>
                                                <input type="number" required onkeyup="calculateDueAmount()"
                                                       id="payment_amount" class="form-control ot-input"
                                                       name="payment_amount"
                                                       placeholder="{{ _trans('common.Payment Amount') }}">
                                            </div>
                                            <x-forms.select label="Accounts" :required="true" name="account_id" col="col-lg-12 mb-4 mt-3">
                                                <option value="">{{ _trans('common.Select One') }}</option>
                                                @foreach($accounts  as $account)
                                                    <option value="{{ $account->id }}">{{ $account->name }} </option>
                                                @endforeach
                                            </x-forms.select>
                                            @if(count($accounts) < 1)
                                                <p class="text-danger">{{ _trans('common.The tenant has no account available!') }}</p>
                                            @endif
                                            <div class="col-md-12 mb-3 mt-3">
                                                <label for="address"
                                                       class="form-label">{{ _trans('common.Due Amount') }}</label>
                                                <input readonly type="number" class="form-control ot-input"
                                                       id="due_amount" name="due_amount"
                                                       placeholder="{{ _trans('common.Due Amount') }}">
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <label for="Description"
                                                       class="form-label">{{ _trans('common.Payment Details') }}
                                                </label>
                                                <textarea name="payment_details" id="payment_details"
                                                          placeholder="{{ _trans('common.Payment Details') }}"
                                                          class="form-control m-0 "></textarea>
                                            </div>
                                            <div class="col-md-12 mb-3 mt-3">

                                                <label class="form-label"
                                                       for="inputImage">{{ _trans('common.Attachment') }} </label>
                                                <div class="ot_fileUploader left-side mb-3">
                                                    <input class="form-control" type="text"
                                                           placeholder="{{ _trans('common.Attachment') }} " readonly=""
                                                           id="placeholder">
                                                    <button class="primary-btn-small-input" type="button">
                                                        <label class="btn btn-lg ot-btn-primary"
                                                               for="fileBrouse">{{ _trans('common.browse') }}</label>
                                                        <input type="file" class="d-none form-control" name="image"
                                                               id="fileBrouse" accept="image/*">
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mb-3 mt-3">
                                                <label for="address"
                                                       class="form-label">{{ _trans('common.Note') }}</label>
                                                <input class="form-control ot-input" name="note" id="note"
                                                       placeholder="{{ _trans('common.Note') }}" value="">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">{{ _trans('common.Close') }}</button>
                                            <button type="submit"
                                                    class="btn btn-primary">{{ _trans('common.Submit') }}</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            @endforeach
        </div>
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
                url: "/orders/calculate-payment",
                success: function (data) {
                    $('#payable_amount').val(data.data);
                },
                error: function (data) {
                    toastr.Error("Something Went Wrong", "Error");
                },
            });
        }

        const calculateDueAmount = () => {
            let rentAmount = Number($('#payable_amount').val());
            let payment_amount = Number($('#payment_amount').val());

            if (payment_amount > rentAmount) {
                toastr('warning', `{{ _trans("common.Amount can't greater than rent amount") }}`);
                $('#due_amount').val(rentAmount);
                return;
            }

            let payableAmount = rentAmount - payment_amount;

            $('#due_amount').val(payableAmount);
        }
    </script>
@endpush
