@extends('landlord.landlord_layout')
@section('title',@$title)
@section('landlord_content')
    <x-landlord.container subtitle="Here's your list of tenants and their expected rent this month " tab="property">
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
                    <tr>
                        <td>
                            <div class="d-flex align-items-center gap_12">
                                <div class="thumb flex-shrink-0">
                                    <img class="img-fluid wh_40 rounded-circle" src="img/avatars/1.png" alt="#">
                                </div>
                                <div class="">
                                    <h5 class="font_14 f_w_500 mb-0">Catalog</h5>
                                    <p class="mb-0 font_14 fw-normal neutral_text">catalogapp.io</p>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center gap_12">
                                <div class="thumb flex-shrink-0">
                                    <img class="img-fluid wh_40 rounded-circle" src="img/avatars/1.png" alt="#">
                                </div>
                                <div class="">
                                    <h5 class="font_14 f_w_500 mb-0">Olivia Rhye</h5>
                                    <p class="mb-0 font_14 fw-normal neutral_text">olivia@untitledui.com</p>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="badge bg-success green_text  order-1 order-sm-2">Paid This Month</span>
                        </td>
                        <td>
                            <span class="font_14 fw-normal text-capitalize neutral_text">£300</span>
                        </td>
                        <td>
                            <button data-bs-toggle="modal" data-bs-target="#invoiceModal" class="p-0 bg-transparent border-0 invoice_request_btn position-relative">
                                    <span class="invoice_request_tooltip">
                                        Request Invoice
                                    </span>
                                <svg width="16" height="18" viewBox="0 0 16 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5.50016 7.75L7.16683 9.41667L10.9168 5.66667M14.6668 16.5V5.5C14.6668 4.09987 14.6668 3.3998 14.3943 2.86502C14.1547 2.39462 13.7722 2.01217 13.3018 1.77248C12.767 1.5 12.067 1.5 10.6668 1.5H5.3335C3.93336 1.5 3.2333 1.5 2.69852 1.77248C2.22811 2.01217 1.84566 2.39462 1.60598 2.86502C1.3335 3.3998 1.3335 4.09987 1.3335 5.5V16.5L3.62516 14.8333L5.7085 16.5L8.00016 14.8333L10.2918 16.5L12.3752 14.8333L14.6668 16.5Z" stroke="#D0D5DD" stroke-width="1.67" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="d-flex align-items-center gap_12">
                                <div class="thumb flex-shrink-0">
                                    <img class="img-fluid wh_40 rounded-circle" src="img/avatars/1.png" alt="#">
                                </div>
                                <div class="">
                                    <h5 class="font_14 f_w_500 mb-0">Catalog</h5>
                                    <p class="mb-0 font_14 fw-normal neutral_text">catalogapp.io</p>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center gap_12">
                                <div class="thumb flex-shrink-0">
                                    <img class="img-fluid wh_40 rounded-circle" src="img/avatars/1.png" alt="#">
                                </div>
                                <div class="">
                                    <h5 class="font_14 f_w_500 mb-0">Olivia Rhye</h5>
                                    <p class="mb-0 font_14 fw-normal neutral_text">olivia@untitledui.com</p>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="badge bg-success green_text  order-1 order-sm-2">Paid This Month</span>
                        </td>
                        <td>
                            <span class="font_14 fw-normal text-capitalize neutral_text">£300</span>
                        </td>
                        <td>
                            <button data-bs-toggle="modal" data-bs-target="#invoiceModal" class="p-0 bg-transparent border-0 invoice_request_btn position-relative">
                                    <span class="invoice_request_tooltip">
                                        Request Invoice
                                    </span>
                                <svg width="16" height="18" viewBox="0 0 16 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5.50016 7.75L7.16683 9.41667L10.9168 5.66667M14.6668 16.5V5.5C14.6668 4.09987 14.6668 3.3998 14.3943 2.86502C14.1547 2.39462 13.7722 2.01217 13.3018 1.77248C12.767 1.5 12.067 1.5 10.6668 1.5H5.3335C3.93336 1.5 3.2333 1.5 2.69852 1.77248C2.22811 2.01217 1.84566 2.39462 1.60598 2.86502C1.3335 3.3998 1.3335 4.09987 1.3335 5.5V16.5L3.62516 14.8333L5.7085 16.5L8.00016 14.8333L10.2918 16.5L12.3752 14.8333L14.6668 16.5Z" stroke="#D0D5DD" stroke-width="1.67" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="d-flex align-items-center gap_12">
                                <div class="thumb flex-shrink-0">
                                    <img class="img-fluid wh_40 rounded-circle" src="img/avatars/1.png" alt="#">
                                </div>
                                <div class="">
                                    <h5 class="font_14 f_w_500 mb-0">Catalog</h5>
                                    <p class="mb-0 font_14 fw-normal neutral_text">catalogapp.io</p>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center gap_12">
                                <div class="thumb flex-shrink-0">
                                    <img class="img-fluid wh_40 rounded-circle" src="img/avatars/1.png" alt="#">
                                </div>
                                <div class="">
                                    <h5 class="font_14 f_w_500 mb-0">Olivia Rhye</h5>
                                    <p class="mb-0 font_14 fw-normal neutral_text">olivia@untitledui.com</p>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="badge bg-warning brown_text">Payment Pending</span>
                        </td>
                        <td>
                            <span class="font_14 fw-normal text-capitalize neutral_text">£300</span>
                        </td>
                        <td>
                            <button data-bs-toggle="modal" data-bs-target="#invoiceModal" class="p-0 bg-transparent border-0 invoice_request_btn position-relative">
                                    <span class="invoice_request_tooltip">
                                        Request Invoice
                                    </span>
                                <svg width="16" height="18" viewBox="0 0 16 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5.50016 7.75L7.16683 9.41667L10.9168 5.66667M14.6668 16.5V5.5C14.6668 4.09987 14.6668 3.3998 14.3943 2.86502C14.1547 2.39462 13.7722 2.01217 13.3018 1.77248C12.767 1.5 12.067 1.5 10.6668 1.5H5.3335C3.93336 1.5 3.2333 1.5 2.69852 1.77248C2.22811 2.01217 1.84566 2.39462 1.60598 2.86502C1.3335 3.3998 1.3335 4.09987 1.3335 5.5V16.5L3.62516 14.8333L5.7085 16.5L8.00016 14.8333L10.2918 16.5L12.3752 14.8333L14.6668 16.5Z" stroke="#D0D5DD" stroke-width="1.67" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </button>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="table_pagination d-flex align-items-center justify-content-between gap-2 flex-wrap">
                <div class="table_pagination_left d-flex gap_12 align-items-center">
                    <button class="navigation_button">Previous</button>
                    <button class="navigation_button">Next</button>
                </div>
                <div class="table_pagination_right text-nowrap">Page 1 of 1</div>
            </div>
        </div>
    </x-landlord.container>
@endsection
