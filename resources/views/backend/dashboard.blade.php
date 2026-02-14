@extends('backend.master')

@section('title')
    {{ _trans('landlord.Dashboard') }}
@endsection

@section('content')
    <div class="page-content">
        <div class="row g-4">
            <div class="col-12">
                <div class="row">
                    <div class="dashboard-heading row align-items-center mb-10">
                        <div class="col-12 col-md-6 col-xl-6 col-lg-6">
                            <h3 class="title">{{ _trans('common.Hello') }} {{ Auth::user()->name }}</h3>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Dashboard Summery Card Start -->
            @if (Auth::user()->role_id === 1)
                <div class="col-12 summery-card">
                    <div class="row g-4">
                        <x-statistics cardIcon="las la-money-bill" title="Total Orders"
                            data="{{ number_format(@$order_sum['total']) }}"></x-statistics>
                        <x-statistics cardIcon="las la-wallet" title="Total Paid"
                            data="{{ number_format(@$order_sum['paid']) }}"></x-statistics>
                        <x-statistics cardIcon="las la-credit-card" title="Total Discount"
                            data="{{ number_format(@$order_sum['discount']) }}"></x-statistics>
                        <x-statistics cardIcon="las la-comments-dollar" title="Total Due"
                            data="{{ number_format(@$order_sum['due']) }}"></x-statistics>


                        <x-statistics cardIcon="las la-user-tag" title="Total Tenant" data="{{ @$tenant['total'] }}"
                            badgeUpTitle="active" badgeUpData="{{ @$tenant['active'] }}" badgeDownTitle="inactive"
                            badgeDownData="{{ @$tenant['inactive'] }}"></x-statistics>

                        <x-statistics cardIcon="las la-users" title="Total Landlord" data="{{ @$landlord['total'] }}"
                            badgeUpTitle="active" badgeUpData="{{ @$landlord['active'] }}" badgeDownTitle="inactive"
                            badgeDownData="{{ @$landlord['inactive'] }}"></x-statistics>

                        <x-statistics cardIcon="las la-building" title="Total Properties" data="{{ @$property['total'] }}"
                            badgeUpTitle="active" badgeUpData="{{ @$property['active'] }}" badgeDownTitle="inactive"
                            badgeDownData="{{ @$property['inactive'] }}"></x-statistics>
                        <x-statistics cardIcon="las la-address-book" title="Advertisement"
                            data="{{ $advertisement['total'] }}" badgeUpTitle="Approved"
                            badgeUpData="{{ @$advertisement['approved'] }}" badgeDownTitle="Pending"
                            badgeDownData="{{ @$advertisement['pending'] }}"></x-statistics>

                        <x-statistics cardIcon="las la-luggage-cart" title="Total Orders" data="{{ @$order['total'] }}"
                            badgeUpTitle="Approved" badgeUpData="{{ @$order['approved'] }}" badgeDownTitle="Pending"
                            badgeDownData="{{ @$order['pending'] }}"></x-statistics>

                        <x-statistics cardIcon="las la-list-ul" title="Appointment" data="{{ $appointment['total'] }}"
                            badgeUpTitle="Approved" badgeUpData="{{ $appointment['approved'] }}" badgeDownTitle="Pending"
                            badgeDownData="{{ @$appointment['pending'] }}"></x-statistics>
                        <x-statistics cardIcon="las la-list-ul" title="Total Categories" data="{{ $category['total'] }}"
                            badgeUpTitle="Active" badgeUpData="{{ @$category['active'] }}" badgeDownTitle="Inactive"
                            badgeDownData="{{ @$category['inactive'] }}"></x-statistics>
                        <x-statistics cardIcon="las la-list-ul" title="Total Blogs" data="{{ $blogs['total'] }}"
                            badgeUpTitle="Active" badgeUpData="{{ @$blogs['active'] }}" badgeDownTitle="Inactive"
                            badgeDownData="{{ @$blogs['inactive'] }}"></x-statistics>
                    </div>
                </div>
            @endif

            <!-- Dashboard Summery Card End -->
            <div class="col-12 statistic-card">
                <div class="row g-4">
                    <!-- Dashboard Statistic start  -->
                    <div class="ot-charts col-12 col-xxl-8">
                        <div class="card statistic-card ot-card">
                            <div class="card-header">
                                <div class="card-title">
                                    <h4>{{ _trans('common.Transection') }} {{ date('Y') }}</h4>
                                </div>
                                <div class="dropdown card-button">
                                    <button class="btn btn-primary ot-dropdown-btn" type="button">
                                        {{ _trans('landlord.This year report') }}
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div id="transactionChart"></div>
                            </div>
                        </div>
                    </div>
                    <div class="ot-charts col-12 col-xxl-4">
                        <div class="card ot-card ot-visit-chart h-100">
                            <div class="card-header mb-20">
                                <div class="card-title">
                                    <h4>{{ _trans('common.Overview') }}</h4>
                                </div>
                            </div>

                            <div class="card-body">
                                <div id="order_ratio_chart"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 statistic-card">
                <div class="row g-4">
                    <div class="col-lg-8">
                        <div class="card statistic-card ot-card">
                            <div class="card-header">
                                <div class="card-title d-flex justify-content-between align-items-center">
                                    <h4>{{ _trans('common.Appointments') }}</h4>
                                    <a class="ot-btn-primary"
                                        href="{{ route('backend.appointment.index') }}">{{ _trans('common.View All') }}</a>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered role-table">
                                        <thead class="thead">
                                            <tr>
                                                <th class="serial">#</th>
                                                <th class="purchase">{{ _trans('landlord.Type') }}</th>
                                                <th class="purchase">{{ _trans('landlord.Date') }}</th>
                                                <th class="purchase">{{ _trans('landlord.Time') }}</th>
                                                <th class="purchase">{{ _trans('landlord.Name') }}</th>
                                                <th class="purchase">{{ _trans('landlord.Email') }}</th>
                                                <th class="purchase">{{ _trans('landlord.Phone') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody class="tbody">
                                            @forelse($appointments ?? [] as $appointment)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td class="text-capitalize">
                                                        {{ str_replace('_', ' ', $appointment->type) }}</td>
                                                    <td class="fw-bold">{{ date('F d Y', strtotime($appointment->date)) }}
                                                    </td>
                                                    @if ($appointment->type == 'book_viewing')
                                                        <td class="fw-bold">{{ @$appointment->timeSlot->start_time }} -
                                                            {{ @$appointment->timeSlot->end_time }}</td>
                                                    @else
                                                        <td class="fw-bold">{{ $appointment->time }}</td>
                                                    @endif
                                                    <td>{{ $appointment->name }}</td>
                                                    <td><a
                                                            href="mailto:{{ $appointment->email }}">{{ $appointment->email }}</a>
                                                    </td>
                                                    <td>{{ $appointment->phone }}</td>
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
                </div>
            </div>

            <!-- Dashboard Summery Card End -->
            <div class="col-12 statistic-card">
                <div class="row g-4">
                    <!-- Dashboard Statistic start  -->
                    <div class="ot-charts col-6 col-xxl-6">
                        <div class="card statistic-card ot-card">
                            <div class="card-header">
                                <div class="card-title">
                                    <h4>{{ _trans('common.Recent_Orders') }}</h4>
                                </div>

                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered role-table">
                                        <thead class="thead">
                                            <tr>

                                                <th class="purchase">{{ _trans('landlord.Order No') }}</th>
                                                <th class="purchase">{{ _trans('landlord.Order Date') }}</th>
                                                <th class="purchase">{{ _trans('landlord.Total Amount') }}</th>
                                                <th class="purchase">{{ _trans('landlord.Paid Amount') }}</th>
                                                <th class="purchase">{{ _trans('landlord.Due Amount') }}</th>

                                            </tr>
                                        </thead>
                                        <tbody class="tbody">
                                            @forelse ($order_sum['recents'] as  $row)
                                                <tr id="row_{{ $loop->iteration }}">

                                                    <td>{{ $row->invoice_no }}</td>
                                                    <td>{{ $row->date }}</td>
                                                    <td>{{ priceFormat($row->grand_total) }}</td>
                                                    <td>{{ priceFormat($row->paid_amount) }}</td>
                                                    <td>{{ priceFormat($row->due_amount) }}</td>

                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="100%" class="text-center gray-color">
                                                        <img src="{{ asset('images/no_data.svg') }}" alt=""
                                                            class="mb-primary" width="100">
                                                        <p class="mb-0 text-center">
                                                            {{ _trans('common.No data available') }}</p>
                                                        <p class="mb-0 text-center text-secondary font-size-90">
                                                            {{ _trans('common.Please add new entity regarding this table') }}
                                                        </p>
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ot-charts col-6 col-xxl-6">
                        <div class="card ot-card ot-visit-chart h-100">
                            <div class="card-header">
                                <div class="card-title">
                                    <h4>{{ _trans('common.Recent_Transactions') }}</h4>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered role-table">
                                        <thead class="thead">
                                            <tr>

                                                <th>{{ _trans('common.Invoice No.') }}</th>
                                                <th>{{ _trans('common.Date') }}</th>
                                                <th>{{ _trans('common.Amount') }}</th>
                                                <th>{{ _trans('common.Payment Method') }}</th>
                                                <th>{{ _trans('common.TRX No') }}</th>

                                            </tr>
                                        </thead>
                                        <tbody class="tbody">
                                            @forelse ($order_sum['recents_trans'] as  $row)
                                                <tr id="row_{{ $loop->iteration }}">

                                                    <td>{{ $row->trx_no }}</td>
                                                    <td>{{ $row->date }}</td>
                                                    <td>{{ $row->amount }}</td>
                                                    <td>{{ $row->payment_method }}</td>
                                                    <td>{{ $row->trx_no }}</td>

                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="100%" class="text-center gray-color">
                                                        <img src="{{ asset('images/no_data.svg') }}" alt=""
                                                            class="mb-primary" width="100">
                                                        <p class="mb-0 text-center">
                                                            {{ _trans('common.No data available') }}</p>
                                                        <p class="mb-0 text-center text-secondary font-size-90">
                                                            {{ _trans('common.Please add new entity regarding this table') }}
                                                        </p>
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection
@push('script')
    @include('backend.partials.delete-ajax')
    <script src="{{ asset('backend/assets/js/tables/export/excel.js') }}"></script>
    <script src="{{ asset('backend/assets/js/tables/export/pdf.js') }}"></script>
    <script src="{{ asset('backend/assets/js/tables/export/jspdf.js') }}"></script>
    <script src="{{ asset('backend/assets/js/tables/export/exportMethod.js') }}"></script>
    <script src="{{ asset('backend/assets/js/tables/export/__export.js') }}"></script>
    <script src="{{ asset('backend/assets/js/basic-datatable.js') }}"></script>
@endpush

@push('script')
    <script>
        var incomeData = {!! json_encode($incomeData) !!};
        var expenseData = {!! json_encode($expenseData) !!};
        var months = {!! json_encode($months) !!};

        if ($("#transactionChart").length) {
            var revenueChartoptions = {
                series: [{
                        name: "Income",
                        data: incomeData,
                    },
                    {
                        name: "Expense",
                        data: expenseData,
                    },
                ],

                colors: ["#087c7c", "#F99417"],
                chart: {
                    type: "bar",
                    height: 350,
                    toolbar: {
                        show: false,
                    },
                },
                plotOptions: {
                    bar: {
                        horizontal: false,
                        columnWidth: "55%",
                        endingShape: "rounded",
                    },
                },

                legend: {
                    itemMargin: {
                        horizontal: 5,
                        vertical: 5,
                    },
                    horizontalAlign: "center",
                    verticalAlign: "center",
                    position: "bottom",
                    fontSize: "14px",
                    fontWight: "bold",
                    markers: {
                        radius: 5,
                        height: 14,
                        width: 14,
                    },
                },
                dataLabels: {
                    enabled: false,
                },
                stroke: {
                    show: true,
                    width: 2,
                    colors: ["transparent"],
                },
                xaxis: {
                    categories: months
                },
                yaxis: {
                    title: {
                        show: false,
                    },
                    labels: {
                        formatter: function(value) {
                            var val = Math.abs(value);
                            if (val >= 1000) {
                                val = (val / 1000).toFixed(0) + "K";
                            }
                            return val;
                        },
                    },
                },
                fill: {
                    opacity: 1,
                },
                tooltip: {
                    y: {
                        formatter: function(val) {
                            return val + "K";
                        },
                    },
                },
            };

            var revenueChart = new ApexCharts(
                document.querySelector("#transactionChart"),
                revenueChartoptions
            );
            revenueChart.render();
        }



        let optionsAnalyticsVisit = {
            series: [{{ $order_sum['paid'] }}, {{ $order_sum['due'] }}, {{ $order_sum['discount'] }}],
            chart: {
                id: "order_ratio_chart",
                type: "donut",
                height: 320,
                toolbar: {
                    show: false,
                },
                zoom: {
                    enabled: false,
                },
            },
            colors: ["#087c7c", "#0b9595", "#3abdbd"],

            labels: ["Paid", "Due", "Discount"],

            dataLabels: {
                enabled: false,
            },
            plotOptions: {
                pie: {
                    donut: {
                        size: "75%",
                        labels: {
                            show: true,
                            name: {
                                fontSize: "12px",
                                offsetY: 0,
                            },
                            value: {
                                fontSize: "12px",
                                offsetY: 0,
                                formatter(val) {
                                    return ` ${val}`;
                                },
                            },
                            total: {
                                show: true,
                                fontSize: "16px",
                                label: "Total",

                                formatter: function(w) {
                                    return {{ $order_sum['total'] }};
                                },
                            },
                        },
                    },
                },
            },

            legend: {
                itemMargin: {
                    horizontal: 0,
                    vertical: 10,
                },
                horizontalAlign: "center",
                verticalAlign: "center",
                position: "right",
                fontFamily: "Lexend",
                fontSize: "15px",
                fontWight: "500",
                markers: {
                    radius: 5,
                    height: 14,
                    width: 14,
                },
            },

            responsive: [{
                breakpoint: 1400,
                options: {
                    legend: {
                        itemMargin: {
                            horizontal: 5,
                            vertical: 5,
                        },
                        horizontalAlign: "center",
                        verticalAlign: "center",
                        position: "bottom",
                        fontFamily: "Lexend",
                        fontSize: "15px",
                        fontWight: "500",
                        markers: {
                            radius: 5,
                            height: 14,
                            width: 14,
                        },
                    },
                },
                breakpoint: 420,
                options: {
                    legend: {
                        itemMargin: {
                            horizontal: 5,
                            vertical: 5,
                        },
                        horizontalAlign: "center",
                        verticalAlign: "center",
                        position: "bottom",
                        fontFamily: "Lexend",
                        fontSize: "12px",
                        fontWight: "500",
                        markers: {
                            radius: 5,
                            height: 14,
                            width: 14,
                        },
                    },
                },
            }, ],
        };

        if ($("#order_ratio_chart").length) {
            if (document.querySelector("#order_ratio_chart")) {
                let chart = new ApexCharts(
                    document.querySelector("#order_ratio_chart"),
                    optionsAnalyticsVisit
                );
                chart.render();
            }
        }
    </script>
@endpush
