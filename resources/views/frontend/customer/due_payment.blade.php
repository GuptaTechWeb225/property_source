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
                    <h3 class="font_20 f_w_700 mb-0 ">{{ _trans('landlord.Due Payment')}}</h3>
                </div>
                <div class="dashboard_white_box bg-white mb_25 pt-0 ">
                    <div class="dashboard_white_box_body">
                        <div class="table-responsive mb_30">
                            <table class="table o_landy_table2 mb-0">
                                <thead>
                                    <tr>
                                    <th class="font_14 f_w_700" scope="col">{{ _trans('landlord.Order Number')}}</th>
                                    <th class="font_14 f_w_700 border-start-0 border-end-0" scope="col">{{ _trans('landlord.Month')}}</th>
                                    <th class="font_14 f_w_700 border-start-0 border-end-0" scope="col">{{ _trans('landlord.Amount')}}</th>
                                    <th class="font_14 f_w_700 border-start-0 border-end-0" scope="col">{{ _trans('landlord.Property Name')}}</th>
                                    <th class="font_14 f_w_700 border-start-0 border-end-0" scope="col">{{ _trans('landlord.Payment Status')}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ( @$data['due_payments'] as $due_payment )
                                    <tr>
                                        <td>
                                                <h4 class="font_16 f_w_500 m-0">{{ @$due_payment->order_number }}</h4>

                                        </td>
                                        <td>
                                                <h4 class="font_16 f_w_500 m-0">{{ @$due_payment->months }}</h4>

                                        </td>
                                        <td>
                                            <h4 class="font_16 f_w_500 m-0 ">{{ @$due_payment->amount }}</h4>
                                        </td>
                                        <td>
                                            <a href="#" class="font_16 f_w_500 m-0">{{ @$due_payment->property_name }}</a>
                                        </td>
                                        <td>
                                            @if (@$due_payment->payment_status == 'paid')
                                            <a href="#" class="table_badge_btn style4 text-nowrap">{{ @$due_payment->payment_status }}</a>

                                            @else
                                            <a href="#" class="table_badge_btn  text-nowrap">{{ @$due_payment->payment_status }}</a>
                                                                         
                                            @endif
                                            
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="o_land_pagination d-flex align-items-center justify-content-start">
                            <a class="arrow_btns d-inline-flex align-items-center justify-content-center ms-0" href="#">
                                <i class="fas fa-chevron-left"></i>
                                <span>Prev</span>
                            </a>
                            <a class="page_counter active" href="#">1</a>
                            <a class="page_counter" href="#">2</a>
                            <a class="page_counter" href="#">3</a>
                            <a class="page_counter_dot"  href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="3" viewBox="0 0 15 3">
                                    <g id="dot" transform="translate(-998 -3958)">
                                        <circle id="Ellipse_92" data-name="Ellipse 92" cx="1.5" cy="1.5" r="1.5" transform="translate(998 3958)" fill="#00124e"/>
                                        <circle id="Ellipse_93" data-name="Ellipse 93" cx="1.5" cy="1.5" r="1.5" transform="translate(1004 3958)" fill="#00124e"/>
                                        <circle id="Ellipse_94" data-name="Ellipse 94" cx="1.5" cy="1.5" r="1.5" transform="translate(1010 3958)" fill="#00124e"/>
                                    </g>
                                </svg>
                            </a>
                            <a class="page_counter" href="#">8</a>
                            <a class="arrow_btns d-inline-flex align-items-center justify-content-center" href="#">
                                <span>Next</span>
                                <i class="fas fa-chevron-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
