@extends('landlord.landlord_layout')
@section('title',@$title)
@section('landlord_content')
    <x-landlord.container subtitle="Here's your list of tenants and their expected rent this month  " tab="property">
        <h3 class="fs-4 fw-normal mb_12">Rent & Tenant</h3>
        <div class="theme_table_wrapper mb_25">
            <div class=" table-responsive">
                <table class="table custom_table m-0">
                    <thead>
                    <tr>
                        <th scope="col">Property Name</th>
                        <th scope="col">Tenant</th>
                        <th scope="col">Status</th>
                        <th scope="col">Monthly Rent</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($rentals as $row)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center gap_12">
                                    <div class="thumb flex-shrink-0">
                                        <img class="img-fluid wh_40 rounded-circle"
                                             src="{{ @globalAsset($row->property->defaultImage->path) }}" alt="#">
                                    </div>
                                    <div class="">
                                        <h5 class="font_14 f_w_500 mb-0">{{ @$row->property->name }}</h5>
                                        <p class="mb-0 font_14 fw-normal neutral_text">
                                            {{ @$row->property->location->address }},
                                            {{ @$row->property->state->name }},
                                            {{ @$row->property->city->name }}
                                            {{ @$row->property->location->post_code }}
                                            {{ @$row->property->location->country->name }}
                                        </p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center gap_12">
                                    <div class="thumb flex-shrink-0">
                                        <img class="img-fluid wh_40 rounded-circle"
                                             src="{{ @globalAsset(@$row->order->tenant->image->path) }}" alt="#">
                                    </div>
                                    <div class="">
                                        <h5 class="font_14 f_w_500 mb-0">{{ @$row->order->tenant->name }}</h5>
                                        <p class="mb-0 font_14 fw-normal neutral_text">{{ @$row->order->tenant->name }}</p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="badge bg-success green_text  order-1 order-sm-2">
                                    {{ $row->payment_status }}
                                </span>
                            </td>
                            <td>
                                <span class="font_14 fw-normal text-capitalize neutral_text">{{ priceFormat($row->total_amount) }}</span>
                            </td>
                            <td>
                                <button data-bs-toggle="modal" data-bs-target="#invoiceModal"
                                        class="p-0 bg-transparent border-0 invoice_request_btn position-relative">
                                    <span class="invoice_request_tooltip">
                                        Request Invoice
                                    </span>
                                    <svg width="16" height="18" viewBox="0 0 16 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M5.50016 7.75L7.16683 9.41667L10.9168 5.66667M14.6668 16.5V5.5C14.6668 4.09987 14.6668 3.3998 14.3943 2.86502C14.1547 2.39462 13.7722 2.01217 13.3018 1.77248C12.767 1.5 12.067 1.5 10.6668 1.5H5.3335C3.93336 1.5 3.2333 1.5 2.69852 1.77248C2.22811 2.01217 1.84566 2.39462 1.60598 2.86502C1.3335 3.3998 1.3335 4.09987 1.3335 5.5V16.5L3.62516 14.8333L5.7085 16.5L8.00016 14.8333L10.2918 16.5L12.3752 14.8333L14.6668 16.5Z"
                                            stroke="#D0D5DD" stroke-width="1.67" stroke-linecap="round"
                                            stroke-linejoin="round"/>
                                    </svg>
                                </button>
                            </td>
                        </tr>
                    @empty
                    @endforelse
                    </tbody>
                </table>
            </div>
            <x-table.pagination :data="$rentals"></x-table.pagination>
        </div>
    </x-landlord.container>

    <div class="modal fade  primary_modal" id="invoiceModal" tabindex="-1" aria-labelledby="invoiceModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered border-0 mw_400">
            <div class="modal-content border-0 p-4">
                <div class="modal-header justify-content-center border-0 p-0">
                    <div class="icon">
                        <svg width="56" height="56" viewBox="0 0 56 56" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="4" y="4" width="48" height="48" rx="24" fill="#F2F4F7"/>
                            <rect x="4" y="4" width="48" height="48" rx="24" stroke="#F9FAFB" stroke-width="8"/>
                            <path
                                d="M25 26.5L27 28.5L31.5 24M36 37V23.8C36 22.1198 36 21.2798 35.673 20.638C35.3854 20.0735 34.9265 19.6146 34.362 19.327C33.7202 19 32.8802 19 31.2 19H24.8C23.1198 19 22.2798 19 21.638 19.327C21.0735 19.6146 20.6146 20.0735 20.327 20.638C20 21.2798 20 22.1198 20 23.8V37L22.75 35L25.25 37L28 35L30.75 37L33.25 35L36 37Z"
                                stroke="#667085" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                </div>
                <div class="modal-body text-center p-0">
                    <h3 class="modal_title mb-0">Send The Invoice?</h3>
                    <p class="modal_desc">Do you want to send the invoice?</p>
                </div>
                <div class="modal-footer border-0 p-0 gap_12">
                    <button type="button" class="theme_line_btn style2  m-0 flex-fill" data-bs-dismiss="modal">Discard
                    </button>
                    <button type="button " class="theme_btn style2  m-0 flex-fill">Send</button>
                </div>
            </div>
        </div>
    </div>
@endsection
