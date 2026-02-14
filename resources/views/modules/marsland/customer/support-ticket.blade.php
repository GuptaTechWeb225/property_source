@extends('marsland::layouts.customer')
@section('title', _trans('common.Support ticket'))

@section('customer-content')
    <div class="sidebar-content-wrap flex-fill ot-card white-bg border-0">
        <div class="dashboard-card mb-40">
            <div class="row g-24">
                <div class="col-xl-4 col-sm-6">
                    <div class="single-dashboard-card single-dashboard-card2  h-calc d-flex flex-wrap align-items-center gap-17">
                        <div class="icon">
                            <i class="ri-coupon-2-line"></i>
                        </div>
                        <div class="cat-caption">
                            <p class="pera font-600">{{ _trans('landlord.All Tickets') }}</p>
                            <!-- Counter -->
                            <div class="single-counter">
                                <p class="amount">05</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-sm-6">
                    <div class="single-dashboard-card single-dashboard-card2 h-calc d-flex flex-wrap align-items-center gap-17">
                        <div class="icon">
                            <i class="ri-book-open-line"></i>
                        </div>
                        <div class="cat-caption">
                            <p class="pera font-600">Open</p>
                            <!-- Counter -->
                            <div class="single-counter">
                                <p class="amount">2</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-sm-6">
                    <div class="single-dashboard-card single-dashboard-card2 h-calc d-flex flex-wrap align-items-center gap-17">
                        <div class="icon">
                            <i class="ri-close-line"></i>
                        </div>
                        <div class="cat-caption">
                            <p class="pera font-600">Closed</p>
                            <!-- Counter -->
                            <div class="single-counter">
                                <p class="amount">0</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- End-of card -->

        <!-- Tickets Table S t a r t -->
        <div class="tickets-table">
            <div class="row">
                <div class="col-xl-12">
                    <div class="ot-cardd">
                        <div class="d-flex align-items-center justify-content-between flex-wrap mb-10">
                            <!-- Section Tittle -->
                            <div class="section-tittle-two pb-0">
                                <h5 class="title font-600 text-capitalize">open Tickets</h5>
                            </div>
                            <div class="d-flex aling-items-center flex-wrap gap-10 mb-20">
                                <a href="{{ route('customer.support.tickets.create') }}" class="btn-primary-fill">
                                    open new ticket
                                </a>
                            </div>
                        </div>

                        <div class="data-show-table">
                            <table class="table-responsive">
                                <thead>
                                    <tr>
                                        <th>Number</th>
                                        <th>Title</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>01</td>
                                        <td class="ticket-subject">
                                            <a href="{{ route('customer.support.tickets.show', 1) }}" class="line-clamp-1 text-primary text-capitalize">HubSpot's Service Hub tools manage customer</a>
                                        </td>
                                        <td>10 Jul 2023</td>
                                        <td class="text-orange text-capitalize">Pending</td>
                                        <td>
                                            <div class="d-flex gap-6">
                                                <a href="{{ route('customer.support.tickets.show', 1) }}" class="text-16 text-paragraph">
                                                    <i class="ri-eye-line"></i>
                                                </a>
                                                <a href="{{ route('customer.support.tickets.edit', 1) }}" class="text-16 text-paragraph">
                                                    <i class="ri-edit-2-fill"></i>
                                                </a>
                                                <button class="border-0 bg-transparent text-danger text-16"><i class="ri-delete-bin-7-line"></i></button>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>02</td>
                                        <td class="ticket-subject">
                                            <a href="{{ route('customer.support.tickets.show', 1) }}" class="line-clamp-1 text-primary text-capitalize">Option for small business owners that is available</a>
                                        </td>
                                        <td>12 Dec 2021</td>
                                        <td class="text-success text-capitalize">open</td>
                                        <td>
                                            <div class="d-flex gap-6">
                                                <a href="{{ route('customer.support.tickets.show', 1) }}" class="text-16 text-paragraph">
                                                    <i class="ri-eye-line"></i>
                                                </a>
                                                <a href="{{ route('customer.support.tickets.edit', 1) }}" class="text-16 text-paragraph">
                                                    <i class="ri-edit-2-fill"></i>
                                                </a>
                                                <button class="border-0 bg-transparent text-danger text-16"><i class="ri-delete-bin-7-line"></i></button>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>03</td>
                                        <td class="ticket-subject">
                                            <a href="{{ route('customer.support.tickets.show', 1) }}" class="line-clamp-1 text-primary text-capitalize">can distribute amongst their customer service teams</a>
                                        </td>
                                        <td>01 jan 2022</td>
                                        <td class="text-success text-capitalize">open</td>
                                        <td>
                                            <div class="d-flex gap-6">
                                                <a href="{{ route('customer.support.tickets.show', 1) }}" class="text-16 text-paragraph">
                                                    <i class="ri-eye-line"></i>
                                                </a>
                                                <a href="{{ route('customer.support.tickets.edit', 1) }}" class="text-16 text-paragraph">
                                                    <i class="ri-edit-2-fill"></i>
                                                </a>
                                                <button class="border-0 bg-transparent text-danger text-16"><i class="ri-delete-bin-7-line"></i></button>
                                            </div>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End-of Tickets Table -->
    </div>
@endsection
