@extends('frontend.layouts.master')


@section('content')
<div class="o_landy_dashboard_area dashboard_bg section_spacing6">
    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-lg-4">
                @include('frontend.include.sidebar')
            </div>
            <div class="col-xl-9 col-lg-8">
                <div class="dashboard_white_box style2 bg-white mb_25">
                    <div class="dashboard_white_box_header d-flex align-items-center">
                        <h4 class="font_24 f_w_700 mb_20">{{ _trans('landlord.My Referral Code')}}</h4>
                    </div>

                    <div class="d-flex gap_10 flex-sm-wrap flex-md-nowrap gray_color_1 theme_border padding25 mb_40">
                        <input name="name" placeholder="{{ _trans('landlord.#JAP%BBAL83')}}" onfocus="this.placeholder = ''" onblur="this.placeholder = '#JAP%BBAL83'" class="primary_input3 rounded-0 style2  flex-fill" required="" type="text">
                        <button class="o_land_primary_btn style2 text-nowrap ">{{ _trans('landlord.Copy Code')}}</button>
                    </div>

                    <div class="dashboard_white_box_header d-flex align-items-center">
                        <h4 class="font_20 f_w_700 mb_20">{{ _trans('landlord.User List')}}</h4>
                    </div>
                    <div class="dashboard_white_box_body">
                        <div class="table_border_whiteBox mb_30">
                            <div class="table-responsive">
                                <table class="table o_landy_table style4 mb-0">
                                    <thead>
                                        <tr>
                                        <th class="font_14 f_w_700 priamry_text" scope="col">{{ _trans('landlord.SL')}}</th>
                                        <th class="font_14 f_w_700 priamry_text border-start-0 border-end-0" scope="col">{{ _trans('landlord.User')}}</th>
                                        <th class="font_14 f_w_700 priamry_text border-start-0 border-end-0" scope="col">{{ _trans('landlord.Date')}}</th>
                                        <th class="font_14 f_w_700 priamry_text border-start-0 border-end-0" scope="col">{{ _trans('landlord.Status')}}</th>
                                        <th class="font_14 f_w_700 priamry_text border-start-0 border-end-0" scope="col">{{ _trans('landlord.Discount Amount')}}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <span class="font_14 f_w_500 mute_text">01</span>
                                            </td>
                                            <td>
                                                <span class="font_14 f_w_500 mute_text">Huge Jackman</span>
                                            </td>
                                            <td>
                                                <span class="font_14 f_w_500 mute_text">14 Jan, 2022 </span>
                                            </td>
                                            <td>
                                            <a href="#" class="table_badge_btn style4 text-nowrap">Delivered</a>
                                            </td>
                                            <td>
                                                <span class="font_14 f_w_500 mute_text">$3240.00 </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span class="font_14 f_w_500 mute_text">01</span>
                                            </td>
                                            <td>
                                                <span class="font_14 f_w_500 mute_text">Huge Jackman</span>
                                            </td>
                                            <td>
                                                <span class="font_14 f_w_500 mute_text">14 Jan, 2022 </span>
                                            </td>
                                            <td>
                                            <a href="#" class="table_badge_btn style4 text-nowrap">Delivered</a>
                                            </td>
                                            <td>
                                                <span class="font_14 f_w_500 mute_text">$3240.00 </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span class="font_14 f_w_500 mute_text">01</span>
                                            </td>
                                            <td>
                                                <span class="font_14 f_w_500 mute_text">Huge Jackman</span>
                                            </td>
                                            <td>
                                                <span class="font_14 f_w_500 mute_text">14 Jan, 2022 </span>
                                            </td>
                                            <td>
                                            <a href="#" class="table_badge_btn style4 text-nowrap">Delivered</a>
                                            </td>
                                            <td>
                                                <span class="font_14 f_w_500 mute_text">$3240.00 </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span class="font_14 f_w_500 mute_text">01</span>
                                            </td>
                                            <td>
                                                <span class="font_14 f_w_500 mute_text">Huge Jackman</span>
                                            </td>
                                            <td>
                                                <span class="font_14 f_w_500 mute_text">14 Jan, 2022 </span>
                                            </td>
                                            <td>
                                            <a href="#" class="table_badge_btn style4 text-nowrap">Delivered</a>
                                            </td>
                                            <td>
                                                <span class="font_14 f_w_500 mute_text">$3240.00 </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span class="font_14 f_w_500 mute_text">01</span>
                                            </td>
                                            <td>
                                                <span class="font_14 f_w_500 mute_text">Huge Jackman</span>
                                            </td>
                                            <td>
                                                <span class="font_14 f_w_500 mute_text">14 Jan, 2022 </span>
                                            </td>
                                            <td>
                                            <a href="#" class="table_badge_btn style4 text-nowrap">Delivered</a>
                                            </td>
                                            <td>
                                                <span class="font_14 f_w_500 mute_text">$3240.00 </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span class="font_14 f_w_500 mute_text">01</span>
                                            </td>
                                            <td>
                                                <span class="font_14 f_w_500 mute_text">Huge Jackman</span>
                                            </td>
                                            <td>
                                                <span class="font_14 f_w_500 mute_text">14 Jan, 2022 </span>
                                            </td>
                                            <td>
                                            <a href="#" class="table_badge_btn style4 text-nowrap">Delivered</a>
                                            </td>
                                            <td>
                                                <span class="font_14 f_w_500 mute_text">$3240.00 </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span class="font_14 f_w_500 mute_text">01</span>
                                            </td>
                                            <td>
                                                <span class="font_14 f_w_500 mute_text">Huge Jackman</span>
                                            </td>
                                            <td>
                                                <span class="font_14 f_w_500 mute_text">14 Jan, 2022 </span>
                                            </td>
                                            <td>
                                            <a href="#" class="table_badge_btn style4 text-nowrap">Delivered</a>
                                            </td>
                                            <td>
                                                <span class="font_14 f_w_500 mute_text">$3240.00 </span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="o_land_pagination d-flex align-items-center justify-content-center mb_10">
                            <a class="arrow_btns d-inline-flex align-items-center justify-content-center ms-0" href="#">
                                <i class="fas fa-chevron-left"></i>
                                <span>{{ _trans('landlord.Prev')}}</span>
                            </a>
                            <a class="page_counter active" href="#">1</a>
                            <a class="page_counter" href="#">2</a>
                            <a class="page_counter" href="#">3</a>
                            <a class="page_counter_dot" href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="3" viewBox="0 0 15 3">
                                    <g id="dot" transform="translate(-998 -3958)">
                                        <circle id="Ellipse_92" data-name="Ellipse 92" cx="1.5" cy="1.5" r="1.5" transform="translate(998 3958)" fill="#00124e"></circle>
                                        <circle id="Ellipse_93" data-name="Ellipse 93" cx="1.5" cy="1.5" r="1.5" transform="translate(1004 3958)" fill="#00124e"></circle>
                                        <circle id="Ellipse_94" data-name="Ellipse 94" cx="1.5" cy="1.5" r="1.5" transform="translate(1010 3958)" fill="#00124e"></circle>
                                    </g>
                                </svg>
                            </a>
                            <a class="page_counter" href="#">8</a>
                            <a class="arrow_btns d-inline-flex align-items-center justify-content-center" href="#">
                                <span>{{ _trans('landlord.Next')}}</span>
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
