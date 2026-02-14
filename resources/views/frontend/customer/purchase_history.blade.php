@extends('frontend.layouts.master')
@section('title', @$data['title'])

@section('content')
<div class="o_landy_dashboard_area dashboard_bg section_spacing6">
    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-lg-4">
                @include('frontend.include.sidebar')
            </div>
            <div class="col-xl-9 col-lg-8">
                <div class="dashboard_white_box_header d-flex align-items-center gap_20  mb_20">
                    <h3 class="font_20 f_w_700 mb-0 ">{{ _trans('landlord.Purchase History')}}</h3>
                </div>
                <div class="dashboard_white_box bg-white mb_25 pt-0 ">
                    <div class="dashboard_white_box_body">
                        <div class="table-responsive mb_30">
                            <table class="table o_landy_table2 mb-0">
                                <thead>
                                    <tr>
                                    <th class="font_14 f_w_700" scope="col">{{ _trans('landlord.Order Number')}}</th>
                                    <th class="font_14 f_w_700" scope="col">{{ _trans('landlord.Order Date')}}</th>
                                    <th class="font_14 f_w_700 border-start-0 border-end-0" scope="col">{{ _trans('landlord.Total Amount')}}</th>
                                    <th class="font_14 f_w_700 border-start-0 border-end-0" scope="col">{{ _trans('landlord.Payment Status')}}</th>
                                    <th class="font_14 f_w_700 border-start-0 border-end-0" scope="col">{{ _trans('landlord.Order Status')}}</th>
                                    <th class="font_14 f_w_700 border-start-0 border-end-0" scope="col">{{ _trans('landlord.Discount Amount')}}</th>
                                    <th class="font_14 f_w_700 border-start-0 border-end-0" scope="col">{{ _trans('landlord.Paid Amount')}}</th>
                                    <th class="font_14 f_w_700 border-start-0 border-end-0" scope="col">{{ _trans('landlord.Due Amount')}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($data['order_history'] as $history)
                                    <tr>
                                        <td>
                                                <h4 class="font_16 f_w_700 ">{{@$history->order_number}}</h4>
                                        </td>
                                         <td>
                                                <h4 class="font_16 f_w_700 ">{{@$history->order_date}}</h4>
                                        </td>
                                        <td>
                                            <h4 class="font_16 f_w_500 m-0 ">${{@$history->total_amount}}</h4>
                                        </td>
                                        <td>
                                            <a href="#" class="table_badge_btn text-nowrap">{{@$history->payment_status}}</a>
                                        </td>
                                        <td>
                                            <a href="#" class="table_badge_btn text-nowrap">{{@$history->order_status}}</a>
                                        </td>
                                        <td>
                                            <h4 class="font_16 f_w_500 m-0 ">${{@$history->discount_amount}}</h4>
                                        </td>
                                        <td>
                                            <h4 class="font_16 f_w_500 m-0 ">${{@$history->paid_amount}}</h4>
                                        </td>
                                        <td>
                                            <h4 class="font_16 f_w_500 m-0 ">${{@$history->due_amount}}</h4>
                                        </td>

                                    </tr>
                                    @empty
                                    <p>No data found</p>
                                    @endforelse
                                </tbody>

                            </table>
                        </div>
                        <div class="o_land_pagination d-flex align-items-center justify-content-start">
                            {!! $data['order_history']->links() !!}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
