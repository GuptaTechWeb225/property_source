@extends('landlord.landlord_layout')
@section('title',@$title)
@section('landlord_content')
    <x-landlord.container subtitle="Here's list of offers that have been made on your properties." tab="property">
        <div class="table_search_header">
            <form action="" method="get" class="d-flex align-items-center flex-wrap gap-4" id="filterForm">
                <div class="">
                    <div class="input-group input_search_group ">
                    <span class="input-group-text" id="basic-addon1">
                        <img src="{{ asset('landlord/img/svg/input_search.svg') }}" alt="">
                    </span>
                        <input type="text" class="form-control" name="keyword" value="{{ request('keyword') }}"
                               placeholder="Search for trades" aria-label="Search"
                               aria-describedby="basic-addon1">
                    </div>
                </div>
                <div class="flex-fill d-flex justify-content-end gap_12 flex-wrap">
                    <!-- dateRangePicker  -->
                    <div id="dateRangePicker" class="dateRange_input" onchange="filterDateRange(this)">
                        <svg width="18" height="20" viewBox="0 0 18 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M12.3333 1.66699V5.00033M5.66667 1.66699V5.00033M1.5 8.33366H16.5M3.16667 3.33366H14.8333C15.7538 3.33366 16.5 4.07985 16.5 5.00033V16.667C16.5 17.5875 15.7538 18.3337 14.8333 18.3337H3.16667C2.24619 18.3337 1.5 17.5875 1.5 16.667V5.00033C1.5 4.07985 2.24619 3.33366 3.16667 3.33366Z"
                                stroke="#344054" stroke-width="1.67" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <input type="hidden" name="start_date" id="startDateInput">
                        <input type="hidden" name="end_date" id="endDateInput">
                        <span></span>
                    </div>
                    <div class="btn-group primary_dropdown">
                        <button type="button" class="theme_line_btn" data-bs-toggle="dropdown" aria-expanded="false">
                            <svg width="18" height="12" viewBox="0 0 18 12" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path d="M4 6H14M1.5 1H16.5M6.5 11H11.5" stroke="currentColor" stroke-width="1.67"
                                      stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            Filters
                        </button>
                        <ul class="dropdown-menu">
                            <li>
                                <label for="orderByName" class="dropdown-item">
                                    <input type="radio" onchange="filterChangeHandler()" name="order_by" value="name"
                                           id="orderByName" class="d-none">
                                    Order By Name
                                </label>
                                <label for="orderByDate" class="dropdown-item">
                                    <input type="radio" onchange="filterChangeHandler()" name="order_by" value="date"
                                           id="orderByDate" class="d-none">
                                    Order By Date
                                </label>
                                <label for="orderByStatus" class="dropdown-item">
                                    <input type="radio" onchange="filterChangeHandler()" name="order_by" value="status"
                                           id="orderByStatus" class="d-none">
                                    Order By Status
                                </label>
                            </li>
                        </ul>
                    </div>
                </div>
            </form>
        </div>
        <div class="theme_table_wrapper ">
            <div class="table-responsive mb-0">
                <table class="table custom_table m-0">
                    <thead>
                    <tr>
                        <th scope="col">
                            <div class="d-flex align-items-center gap_12">
                                <label class="primary_checkbox d-flex">
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                </label> <span>Property</span>
                            </div>
                        </th>
                        <th scope="col">Offer amount</th>
                        <th scope="col">Executed by</th>
                        <th scope="col">Status</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($offers as $offer)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center gap_12">
                                    <label class="primary_checkbox d-flex">
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                    <div class="">
                                        <h5 class="font_14 f_w_500 mb-0">{{ $offer->property->name }}</h5>
                                        <p class="mb-0 font_14 fw-normal neutral_text">
                                            {{ @$offer->property->location->address }},
                                            {{ @$offer->property->state->name }},
                                            {{ @$offer->property->city->name }}
                                            {{ @$offer->property->location->post_code }}
                                            {{ @$offer->property->location->country->name }}
                                        </p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span
                                    class="font_14 fw-normal text-capitalize neutral_text">{{ priceFormat($offer->offer_price) }}</span>
                            </td>
                            <td>
                                <div class="d-flex align-items-center gap_12">
                                    <div class="thumb flex-shrink-0">
                                        <img class="img-fluid wh_40 rounded-circle"
                                             src="{{ @globalAsset($offer->user->image->path) }}"
                                             alt="#">
                                    </div>
                                    <div class="">
                                        <h5 class="font_14 f_w_500 mb-0">{{ @$offer->user->name }}</h5>
                                        <p class="mb-0 font_14 fw-normal neutral_text">{{ @$offer->user->email }}</p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                @if($offer->status == 'accepted')
                                    <span class="badge bg-success text-success">{{ $offer->status }}</span>
                                @elseif($offer->status == 'declined')
                                    <span class="badge bg-danger text-danger">{{ $offer->status }} </span>
                                @else
                                    <span class="badge bg-warning text-warning">{{ $offer->status }}</span>
                                @endif
                            </td>
                            <td>
                                <div class="d-flex action_buttons gap_12">
                                    @if($offer->status == 'pending')
                                        <a onclick="return confirm('Are you sure?')" href="{{ route('landlord.property.offer.status-update', ['id'=> $offer->id, 'status' => 'declined']) }}"
                                           class="bg-transparent border-0 font_14 f_w_600 p-0 danger_text">Decline
                                        </a>
                                        <a onclick="return confirm('Are you sure?')" href="{{ route('landlord.property.offer.status-update', ['id'=> $offer->id, 'status' => 'accepted']) }}"
                                           class="bg-transparent border-0 font_14 f_w_600 p-0 green_text">Accept
                                        </a>
                                    @elseif($offer->status == 'accepted')
                                        <a onclick="return confirm('Are you sure?')" href="{{ route('landlord.property.offer.status-update', ['id'=> $offer->id, 'status' => 'declined']) }}"
                                           class="bg-transparent border-0 font_14 f_w_600 p-0 danger_text">Decline
                                        </a>
                                    @else
                                        <a onclick="return confirm('Are you sure?')" href="{{ route('landlord.property.offer.status-update', ['id'=> $offer->id, 'status' => 'accepted']) }}"
                                           class="bg-transparent border-0 font_14 f_w_600 p-0 green_text">Accept
                                        </a>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">
                                <h4 class="font_14 fw-normal neutral_text py-5 fw-bold">No offers found</h4>
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
            <x-table.pagination2 :data="$offers"></x-table.pagination2>

        </div>
    </x-landlord.container>
@endsection
@push('js')
    <script>
        function advertisementChangeHandler(adv) {
            $.ajax({
                url: "{{ route('landlord.requirement.offer.get-property') }}",
                type: "GET",
                data: {
                    advertisement_id: adv
                },
                success: function (data) {
                    $('#propertyId').val(data.property_id);
                    $('#propertyPrice').val(data.price);
                    $('#formatePropertyPrice').val(data.formatePrice);
                }
            });
        }

        function filterChangeHandler() {
            $('#filterForm').submit();
        }

        function filterDateRange(obj) {
            console.log($(obj))
        }
    </script>
@endpush
