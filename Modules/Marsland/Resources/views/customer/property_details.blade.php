@extends('marsland::layouts.customer')
@section('title', _trans('common.Property details'))

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
                                        <li class="breadcrumb-item">
                                            <a href="{{ route('customer.properties') }}">{{ _trans('common.Properties') }}</a>
                                        </li>
                                        <li class="breadcrumb-item">{{ $title }}</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card mb-16 border-0 shadow-sm">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <img class="d-block w-100"
                                                     src="{{ @globalAsset($order_details->property->defaultImage->path) }}"
                                                     alt="{{ $order_details->property->name }}">
                                            </div>
                                            <div class="col-lg-8">
                                                <h3>{{ @$order_details->property->name }}</h3>
                                                <strong
                                                    class="border-bottom text-primary">{{ _trans('landlord.Property Info') }}</strong>
                                                <div class="row mb-3">
                                                    <div class="col-md-6 mb-1">
                                                        {{ _trans('common.Status') }}: <span
                                                            class="badges text-uppercase badge-bg-green">{{ $order_details->status }}</span>
                                                    </div>
                                                    <div class="col-md-6 mb-1">
                                                        {{ _trans('common.Property Size') }}
                                                        : {{ @$order_details->property->size }}
                                                    </div>
                                                    <div class="col-md-6 mb-1">
                                                        {{ _trans('common.Flat No') }}
                                                        : {{ @$order_details->property->flat_no }}
                                                    </div>
                                                    <div class="col-md-6 mb-1">
                                                        {{ _trans('common.Bedroom') }}
                                                        : {{ @$order_details->property->bedroom }}
                                                    </div>
                                                    <div class="col-md-6 mb-1">
                                                        {{ _trans('common.Bathroom') }}
                                                        : {{ @$order_details->property->bathroom }}
                                                    </div>
                                                    <div class="col-md-6 mb-1">
                                                        {{ _trans('common.Date') }}
                                                        : {{ @$order_details->start_date }} @if($order_details->end_date)
                                                            - {{ $order_details->end_date }}
                                                        @endif
                                                    </div>
                                                    <div class="col-md-6 mb-1">
                                                        {{ _trans('common.Amount') }}
                                                        : {{ priceFormat($order_details->price) }}
                                                    </div>
                                                    <div class="col-md-6 mb-1">
                                                        {{ _trans('common.Discount Amount') }}
                                                        : {{ priceFormat($order_details->discount_amount) }}
                                                    </div>
                                                    <div class="col-md-6 mb-1">
                                                        {{ _trans('common.Payable Amount') }}
                                                        : {{ priceFormat($order_details->total_amount) }}
                                                    </div>
                                                    <div class="col-md-6 mb-1">
                                                        {{ _trans('common.Max Memeber Allow') }}
                                                        : {{ $order_details->advertisement->max_member }}
                                                    </div>
                                                </div>
                                                <strong
                                                    class="border-bottom text-primary">{{ _trans('landlord.Payment Info') }}</strong>
                                                <div class="row mb-3">
                                                    <div class="col-md-6 mb-1">
                                                        {{ _trans('common.Payment Status') }}: <span
                                                            class="badges text-uppercase badge-bg-green">{{ $order_details->payment_status }}</span>
                                                    </div>
                                                    <div class="col-md-6 mb-1">
                                                        {{ _trans('common.Total Paid') }}
                                                        : {{ priceFormat($order_details->payments->sum('amount')) }}
                                                    </div>
                                                    <div class="col-md-6 mb-1">
                                                        {{ _trans('common.Due Amount') }}
                                                        : {{ priceFormat($order_details->total_amount - $order_details->payments->sum('amount'))}}
                                                    </div>
                                                </div>
                                                <div class="d-flex gap-4">
                                                    @if(!empty($order_details->payments))
                                                        @if($order_details->payments->sum('amount') == $order_details->property->rent_amount - $order_details->discount_amount)
                                                            <span class="btn btn-success ml-6">
                                                                            {{ _trans('common.Paid') }}
                                                                        </span>
                                                        @else
                                                            @if(hasPermission('order_payment'))
                                                                <button
                                                                    onclick="calculatePaymentAmount({{@$order_details->id}})"
                                                                    type="button"
                                                                    class="btn btn-primary"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#exampleModal_{{@$order->id}}">
                                                                    <i class="ri-refund-2-fill"></i>
                                                                    {{ _trans('common.Pay Now') }}
                                                                </button>
                                                            @endif
                                                        @endif
                                                    @endif
                                                    @if(@$order_details->advertisement->advertisement_type == \App\Enums\DealType::RENT)
                                                        @if($order_details->status  == 'approved')
                                                            <a data-bs-toggle="modal" data-bs-target="#familyMember-{{ $order_details->id }}" href="{{ route('customer.family-member.create', ['id' => $order_details->id]) }}"
                                                               type="button"
                                                               class="btn-primary-fill big-btn primary-soft-btn">
                                                                <i class="ri-user-add-fill"></i> {{ _trans('common.Add Family Member') }}
                                                            </a>
                                                        @endif
                                                    @endif

                                                    <a href="{{ route('customer.family-member.create', ['id' => $order_details->id]) }}"
                                                       type="button"
                                                       data-bs-toggle="modal"
                                                       data-bs-target="#assetModal"
                                                       class="btn-primary-fill big-btn primary-soft-btn">
                                                        <i class="ri-briefcase-line"></i> {{ _trans('common.Add Assets') }}
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        @if(count($order_details->familyMembers) > 0)
                                            <div class="row my-5">
                                                <h4 class="mb-4">{{ _trans('landlord.Family Mambers') }}</h4>
                                                @foreach($order_details->familyMembers as $member)
                                                    <div class="col-lg-4 mb-3">
                                                        <div class="card card-body">
                                                            <div class="d-flex align-items-center gap-10">
                                                                <div class="position-relative">
                                                                    <img height="70" width="70"
                                                                         src="{{ @globalAsset($member->image->path) }}"
                                                                         alt="">
                                                                    <span class="position-absolute top-0 start-0 text-danger text-capitalize fw-bold">{{ !$member->status ? 'not eligible':'' }}</span>
                                                                </div>
                                                                <div class="d-flex flex-column gap-1">
                                                                    <strong>{{ $member->name }}</strong>
                                                                    <small>{{ $member->phone }}</small>
                                                                    <div class="d-flex gap-10">
                                                                        <a target="_blank"
                                                                           href="{{ @globalAsset($member->document->path) }}"
                                                                           title="Document"
                                                                           class="badge bg-primary border-0 text-white"><i
                                                                                class="ri-article-line"></i>
                                                                        </a>
                                                                        <a onclick="return confirm('Are you sure?')"
                                                                           title="Remove member"
                                                                           href="{{ route('customer.family-member.delete', $member->id) }}"
                                                                           class="badge bg-danger border-0 text-white"><i
                                                                                class="ri-delete-bin-2-line"></i>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endif

                                        @if(count($order_details->assets) > 0)
                                            <div class="row my-5">
                                                <h4 class="mb-4">{{ _trans('common.Assets') }}</h4>
                                                @foreach($order_details->assets as $asset)
                                                    <div class="col-lg-3">
                                                        <div class="d-flex align-items-center gap-10">
                                                            <img height="70" width="70"
                                                                 src="{{ @globalAsset($asset->attachment->path) }}"
                                                                 alt="">
                                                            <div class="d-flex flex-column">
                                                                <strong>{{ $asset->name }}</strong>
                                                                <small>{{ $asset->serial }}</small>
                                                                <form
                                                                    onsubmit="return confirm('Are you sure you want to delete this asset?')"
                                                                    action="{{ route('customer.asset.delete', $asset->id) }}"
                                                                    method="post">
                                                                    @csrf
                                                                    @method('delete')
                                                                    <button type="submit"
                                                                            class="badge bg-danger border-0">
                                                                        <i class="ri-delete-bin-line"></i></button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                        <div class="pt-2">
                                                            {!! $asset->note !!}
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endif
                                    </div>

                                    <!-- Modal -->
                                    <div class="modal fade sticky" id="exampleModal_{{@$order->id}}"
                                         tabindex="-1"
                                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title"
                                                        id="exampleModalLabel"> {{ _trans('common.Order Payment') }}</h5>
                                                    <button type="button" class="btn-close"
                                                            data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                </div>
                                                <form
                                                    action="{{ route('customer.orders.payment', ['order_details_id' => $order_details->id ]) }}"
                                                    enctype="multipart/form-data"
                                                    method="post">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <input type="hidden" name="order_detail_id"
                                                               value="{{$order_details->id}}">
                                                        <input type="hidden" name="property_id"
                                                               value="{{ @$order_details->property->id }}">
                                                        <input type="hidden" name="tenant_id"
                                                               value="{{ @$order->tenant->id }}">

                                                        <div class="col-md-12 mb-3 mt-3">
                                                            <label for="address"
                                                                   class="form-label">{{ _trans('common.Payable Amount') }}</label>
                                                            <input readonly
                                                                   class="form-control ot-input"
                                                                   name="payable_amount"
                                                                   id="payable_amount"
                                                                   placeholder="{{ _trans('common.Payable Amount') }}"
                                                                   value="{{@$order_details->price }}">
                                                        </div>
                                                        <div class="col-md-12 mb-3 mt-3">
                                                            <label for="address"
                                                                   class="form-label">{{ _trans('common.Accounts') }}</label>
                                                            <select class="select2" name="account_id"
                                                                    id="">
                                                                <option
                                                                    value="">{{ _trans('common.Select One') }}</option>
                                                                @foreach($accounts  as $account)
                                                                    <option
                                                                        value="{{ $account->id }}">{{ $account->name }} </option>
                                                                @endforeach
                                                            </select>
                                                            @if(count($accounts) < 1)
                                                                <p class="text-danger">{{ _trans('common.The tenant has no account available!') }}</p>
                                                            @endif
                                                        </div>
                                                        <div class="col-md-12 mb-3 mt-3">
                                                            <label for="address"
                                                                   class="form-label">{{ _trans('common.Payment Amount') }}</label>
                                                            <input type="number" required
                                                                   onkeyup="calculateDueAmount()"
                                                                   id="payment_amount"
                                                                   class="form-control ot-input"
                                                                   name="payment_amount"
                                                                   placeholder="{{ _trans('common.Payment Amount') }}">
                                                        </div>

                                                        <div class="col-md-12 mb-3 mt-3">
                                                            <label for="address"
                                                                   class="form-label">{{ _trans('common.Due Amount') }}</label>
                                                            <input readonly type="number"
                                                                   class="form-control ot-input"
                                                                   id="due_amount" name="due_amount"
                                                                   placeholder="{{ _trans('common.Due Amount') }}">
                                                        </div>
                                                        <div class="col-md-12 mb-3">
                                                            <label for="Description"
                                                                   class="form-label">{{ _trans('common.Payment Details') }}
                                                            </label>
                                                            <textarea name="payment_details"
                                                                      id="payment_details"
                                                                      placeholder="{{ _trans('common.Payment Details') }}"
                                                                      class="form-control m-0 "></textarea>
                                                        </div>
                                                        <div class="col-md-12 mb-3 mt-3">
                                                            <label class="form-label"
                                                                   for="inputImage">{{ _trans('common.Attachment') }} </label>
                                                            <input type="file" class="form-control">
                                                        </div>
                                                        <div class="col-md-12 mb-3 mt-3">
                                                            <label for="address"
                                                                   class="form-label">{{ _trans('common.Note') }}</label>
                                                            <input class="form-control ot-input"
                                                                   name="note" id="note"
                                                                   placeholder="{{ _trans('common.Note') }}"
                                                                   value="">
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


                                    {{--  assets modal--}}
                                    <div class="modal fade sticky" id="assetModal"
                                         tabindex="-1"
                                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title"
                                                        id="exampleModalLabel"> {{ _trans('common.Add New Asset') }}</h5>
                                                    <button type="button" class="btn-close"
                                                            data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                </div>
                                                <form action="{{ route('customer.asset.store') }}"
                                                      enctype="multipart/form-data"
                                                      method="post">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <input type="hidden" name="order_detail_id"
                                                               value="{{$order_details->id}}">
                                                        <input type="hidden" name="property_id"
                                                               value="{{ @$order_details->property->id }}">

                                                        <div class="col-md-12 mb-3 mt-3">
                                                            <label for="name"
                                                                   class="form-label">{{ _trans('common.Name') }}</label>
                                                            <input
                                                                required
                                                                class="form-control ot-input"
                                                                name="name"
                                                                id="name"
                                                                placeholder="{{ _trans('common.Name') }}"
                                                            >
                                                        </div>
                                                        <div class="col-md-12 mb-3 mt-3">
                                                            <label class="form-label"
                                                                   for="inputImage">{{ _trans('common.Attachment') }} </label>
                                                            <input type="file" accept="image/*" class="form-control"
                                                                   name="attachment">
                                                        </div>
                                                        <div class="col-md-12 mb-3">
                                                            <label for="payment_details"
                                                                   class="form-label">{{ _trans('common.Note') }}
                                                            </label>
                                                            <textarea name="note"
                                                                      id="payment_details"
                                                                      placeholder="{{ _trans('common.Note') }}"
                                                                      class="form-control m-0 "></textarea>
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

                                    <!-- Modal -->
                                    <div class="modal fade modal-lg" id="familyMember-{{ $order_details->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">{{ _trans('landlord.Add family members') }}</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('customer.family-member.store') }}" method="post" enctype="multipart/form-data">
                                                        @csrf
                                                        <input type="hidden" name="order_details_id" value="{{ $order_details->id }}">
                                                        <div class="position-relative ot-contact-form mb-15 row">
                                                            <div class="contact-fields-container">
                                                                <div class="row align-items-center contact-field">
                                                                    <div class="col-lg-6 mb-3">
                                                                        <label class="ot-contact-label">{{ _trans('common.Name') }}<span
                                                                                class="text-danger">*</span></label>
                                                                        <input class="form-control ot-contact-input" required
                                                                               name="name" type="text"
                                                                               placeholder="{{ _trans('common.Enter Here') }}">
                                                                    </div>
                                                                    <div class="col-lg-6 mb-3">
                                                                        <label class="ot-contact-label">{{ _trans('common.Relation') }}</label>
                                                                        <input class="form-control ot-contact-input" required name="relation"
                                                                               type="text" placeholder="{{ _trans('common.Enter Here') }}">
                                                                    </div>
                                                                    <div class="col-lg-6 mb-3">
                                                                        <label class="ot-contact-label">{{ _trans('common.Phone') }}</label>
                                                                        <input class="form-control ot-contact-input" name="phone"
                                                                               type="text" required placeholder="{{ _trans('common.Enter Here') }}">
                                                                    </div>
                                                                    <div class="col-lg-6 mb-3">
                                                                        <label class="ot-contact-label">{{ _trans('common.Photo') }}</label>
                                                                        <input class="form-control ot-contact-input" accept="image/*"
                                                                               name="photo" type="file"
                                                                               placeholder="{{ _trans('common.Enter Here') }}">
                                                                    </div>
                                                                    <div class="col-lg-6 mb-3">
                                                                        <label class="ot-contact-label">{{ _trans('common.Document') }}</label>
                                                                        <input class="form-control ot-contact-input" name="document"
                                                                               accept="application/pdf" type="file"
                                                                               placeholder="{{ _trans('common.Enter Here') }}">
                                                                    </div>
                                                                    <div class="col-xl-12 col-lg-12">
                                                                        <div class="row align-items-center">
                                                                            <div class="col-lg-8">
                                                                                <div class="ot-contact-form mb-24">
                                                                                    <label class="ot-contact-label">{{ _trans('common.Personal Code') }}</label>
                                                                                    <input class="form-control ot-contact-input" placeholder="G-5464343" type="text"
                                                                                           name="personal_code" id="personalCode" value="">
                                                                                    @error('personal_code')
                                                                                    <p class="text-danger">{{ $message }}</p>
                                                                                    @enderror
                                                                                    <p class="mt-2 mb-0"><i
                                                                                            class="ri-information-line text-danger"></i> {{ _trans('common.Anyone can find you by using your personal code') }}
                                                                                    </p>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-4 mb-4">
                                                                                <button class="btn btn-light" type="button" onclick="generateCode()" title="Generate Code"><i class="ri-refresh-line"></i></button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-12 text-end">
                                                            <button class="btn-primary-fill"> {{ _trans('common.Submit') }} <i
                                                                    class="ri-arrow-right-line"></i></button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End-of My Orders -->
    </div>
@endsection
@push('script')

    <script>


        const  generateCode = () => {
            $.ajax({
                type: 'GET',
                url: '{{ route('customer.family-member.generatePersonalCode') }}',
                success: function (res) {
                    $('#personalCode').val(res)
                },
                error: function (error) {
                    console.error('Error fetching cities:', error);
                }
            });
        }




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
