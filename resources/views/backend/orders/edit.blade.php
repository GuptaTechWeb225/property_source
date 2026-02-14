@extends('backend.master')
@section('title')
    {{ @$data['title'] }}
@endsection
@section('content')

    <!-- start main content -->
    <div class="page-content">


        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <h4 class="bradecrumb-title mb-1">{{ $data['title'] }}</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ _trans('common.home') }}</a>
                        </li>
                        <li class="breadcrumb-item">{{ $data['title'] }}</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="card ot-card">

            <div class="card-body">
                <form action="{{ route('orders.update')}}" enctype="multipart/form-data" method="post" id="visitForm">
                    @csrf
                    <input class="form-control ot-input " type="hidden" name="order_number" id="order_number"
                           value="{{ $data['orders']->order_number }}">
                    <input class="form-control ot-input " type="hidden" name="invoice_property_id"
                           id="invoice_property_id"
                           value="{{   $data['orders']->property_id }}">

                    <div class="row mb-3">
                        <div class="col-md-12">
                            <!-- Process Flow for our business model -->
                            <div class="row mb-3 page-title-description">
                                <!-- title Head Start -->
                                <div class="section-title-head">
                                    <h3>Details</h3>
                                    <hr>
                                </div>
                                <!-- title Head End -->
                                <div class="col-md-12 mb-3">
                                    <label for="title_one" class="form-label ">{{ _trans('common.Property Name') }} <span
                                            class="fillable">*</span></label>
                                    <select required
                                            class="nice-select niceSelect bordered_style wide"
                                            name="property_id" id="property_id">
                                        @foreach ($data['properties'] as $key => $item)
                                            <option @if ($data['orders']->property_id ==  $item->id) selected
                                                    @endif value="{{$item->id}}">{{$item->name}}
                                            </option>
                                        @endforeach

                                    </select>

                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="title_one" class="form-label ">{{ _trans('common.Property Size') }} </label>
                                    <div class="form-label" id="property_size"></div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="title_one" class="form-label ">{{ _trans('common.Flat NO') }} <span
                                            class="fillable">*</span></label>
                                    <div class="form-label" id="flat_no"></div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="title_one" class="form-label ">{{ _trans('common.Bedroom') }} <span
                                            class="fillable">*</span></label>
                                    <div class="form-label" id="bedroom"></div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="title_one" class="form-label ">{{ _trans('common.Bathroom') }} <span class="fillable">*</span></label>
                                    <div class="form-label" id="bathroom"></div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="title_one" class="form-label ">{{ _trans('common.Date Range') }} <span
                                            class="fillable">*</span></label>
                                    <div>{{ $data['orders']->start_date }} @if($data['orders']->end_date) - {{ $data['orders']->end_date }}@endif</div>
                                    <input type="hidden" class="form-control ot-input" id="daterange2" name="daterange"
                                           placeholder="{{ _trans('common.Date') }}"
                                           value="{{ $data['orders']->start_date }}

                                           @if($data['orders']->end_date) - {{ $data['orders']->end_date }}@endif

                                           ">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="title_one" class="form-label ">{{ _trans('common.Rent Amount') }} <span
                                            class="fillable">*</span></label>
                                    <input readonly  class="form-control ot-input "  id="rent_amount"
                                           placeholder="{{ _trans('common.Rent Amount') }}" value="{{ $data['orders']->rent_amount }}">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="title_one" class="form-label ">{{ _trans('common.Discount') }} <span
                                            class="fillable">*</span></label>
                                    <input class="form-control ot-input " type="number" name="discount_amount" id="discount_amount" onkeyup="calculatePayableAmount()"
                                           placeholder="{{ _trans('common.Discount') }}" value="{{ $data['orders']->discount_amount }}">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="title_one" class="form-label ">{{ _trans('common.Payable Amount') }}<span
                                            class="fillable">*</span></label>
                                    <input readonly class="form-control ot-input " id="payable_amount" value="{{ $data['orders']->rent_amount - $data['orders']->discount_amount }}"
                                           placeholder="{{ _trans('common.Payable Amount') }}">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="title_one" class="form-label ">{{ _trans('common.Status') }} <span
                                            class="fillable">*</span></label>
                                    <select
                                            class="nice-select niceSelect bordered_style wide"
                                            name="status" id="status">
                                        <option value="pending"
                                                @if ($data['orders']->order_status == 'pending') selected @endif >
                                            Pending
                                        </option>
                                        <option value="approved"
                                                @if ($data['orders']->order_status == 'approved') selected @endif>
                                            Approved
                                        </option>
                                        <option value="rejected"
                                                @if ($data['orders']->order_status == 'rejected') selected @endif>
                                            Rejected
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12 mt-3">
                                <div class="text-end">
                                    <button id="submitBtn" class="btn btn-lg ot-btn-primary
                                        @if($data['orders']->order_status == 'rejected' || $data['orders']->order_status == 'approved')
                                         disabled @endif
                                        "><span><i class="fa-solid fa-save"></i>
                                    </span>update
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
    <!-- end main content -->

@endsection

@push('script')

    <script>
        $(function () {
            $('input[name="daterange"]').daterangepicker({
                autoUpdateInput: false,
                startDate: moment(),
                endDate: moment(),
                locale: {
                    cancelLabel: 'Clear'
                }
            });
        });

        //Date change check property availability
        $('input[name="daterange"]').on('apply.daterangepicker', function (ev, picker) {
            $(this).val(picker.startDate.format('YYYY-MM-DD') + ' - ' + picker.endDate.format('YYYY-MM-DD'));
            var propertyID =  $('#property_id').val();
            var formData = {
                property_id: propertyID,
                start_date: picker.startDate.format('YYYY-MM-DD'),
                end_date: picker.endDate.format('YYYY-MM-DD'),
            };

            $.ajax({
                type: "post",
                dataType: "json",
                data: formData,
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
                url: "/property/check",
                success: function (data) {
                    if(data.status == 0){
                        $('#submitBtn').removeClass('disabled');
                    }else{
                        $('#submitBtn').addClass('disabled');
                        alert("Property Not available within this Date.", "Error");

                    }
                },
                error: function (data) {
                    toastr.Error("Something Went Wrong", "Error");
                },
            });



        });


        //Property Id change to execute api call
        $(document).ready(function () {
            $('#property_id').on('change', function () {
                var property_id = $(this).val();
                var order_number = $("#order_number").val();
                var invoice_property_id = $("#invoice_property_id").val();

                var formData = {
                    property_id: property_id,
                    order_number: order_number,
                    invoice_property_id: invoice_property_id
                };
                $.ajax({
                    type: "post",
                    dataType: "json",
                    data: formData,
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                    },
                    url: "/orders/fetch-property",
                    success: function (data) {
                        $('#property_size').html(data.data.property.size);
                        $('#flat_no').html(data.data.property.flat_no);
                        $('#bedroom').html(data.data.property.bedroom);
                        $('#bathroom').html(data.data.property.bathroom);
                        $('#rent_amount').val(data.data.property.rent_amount);

                        if (data.data.orders) {
                            $('#daterange2').val(data.data.orders.start_date + ' - ' + data.data.orders.end_date);
                            $('#discount_amount').val(data.data.orders.discount_amount);

                        } else {
                            $('#discount_amount').val(0);
                        }

                    },
                    error: function (data) {
                        toastr.Error("Something Went Wrong", "Error");
                    },
                });


            }).change();
        });


        const calculatePayableAmount = () => {
            let rentAmount = Number($('#rent_amount').val());
            let discountAmount = Number($('#discount_amount').val());

            if (discountAmount > rentAmount) {
                toastr('warning', `{{ _trans("common.Discount can't greater than rent amount") }}`);
                $('#payable_amount').val(rentAmount);
                return;
            }

            let payableAmount = rentAmount - discountAmount;

            $('#payable_amount').val(payableAmount);
        }
    </script>
@endpush
