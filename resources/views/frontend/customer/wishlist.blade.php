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
                        @if ($data['wishlist']->count() > 0)
                            <div class="d-flex align-items-center gap_20 mb_30">
                                <h5 class="font_14 f_w_400 flex-fill">{{ _trans('landlord.Showing') }}

                                    {{ $data['wishlist']->perPage() * $data['wishlist']->currentPage() - ($data['wishlist']->perPage() - 1) }}
                                    –
                                    {{ $data['wishlist']->perPage() * $data['wishlist']->currentPage() > $data['wishlist']->total() ? $data['wishlist']->total() : $data['wishlist']->perPage() * $data['wishlist']->currentPage() }}
                                    of
                                    {{ $data['wishlist']->total() }} {{ _trans('landlord.Results') }}</h5>

                                <div class="wish_selects d-flex align-items-center gap_10 flex-wrap">
                                    <select class="o_land_select4">
                                        <option value="8">{{ _trans('landlord.Show 8 item’s') }}</option>
                                        <option value="20">{{ _trans('landlord.Show 20 item’s') }}</option>
                                        <option value="50">{{ _trans('landlord.Show 50 item’s') }}</option>
                                        <option value="100">{{ _trans('landlord.Show 100 item’s') }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="dashboard_wishlist_grid mb_40">
                                @foreach ($data['wishlist'] as $wishlist)
                                    <div class="product_widget5 style3 bg-white wishlist-box-hover">
                                        <div class="product_thumb_upper">
                                            <a class="pe-auto wishlist-delete delete-icon" data-id="{{ @$wishlist->id }}">
                                                <button class="wishlist-btn btn-delete">
                                                    <span class="mdi mdi-delete mdi-24px"></span>
                                                    <span class="mdi mdi-delete-empty mdi-24px"></span>
                                                    <span><i class="fas fa-trash-alt"></i></span>
                                                  </button>
                                            </a>
                                            <a href="{{ url('property/' . $wishlist->property->id . '/details' . '/' . $wishlist->property->slug) }}"
                                                class="thumb">
                                                <img src="{{ @globalAsset($wishlist->property->defaultImage->path) }}"
                                                    alt="">

                                            </a>
                                            <div class="product_action">
                                                <a href="#">
                                                    <i class="ti-control-shuffle"></i>
                                                </a>
                                                <a data-bs-toggle="modal" data-bs-target="#theme_modal">
                                                    <i class="ti-eye"></i>
                                                </a>
                                                <a href="#">
                                                    <i class="ti-star"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="product__meta text-center">
                                            <span class="product_banding "> {{ $wishlist->property->category->name }}
                                            </span>
                                            <a
                                                href="{{ url('property/' . $wishlist->property->id . '/details' . '/' . $wishlist->property->slug) }}">
                                                <h4>{{ $wishlist->property->name }}</h4>
                                            </a>
                                            <div class="product_prise">
                                                <p>৳ {{ $wishlist->property->rent_amount }}</p>

                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="o_land_pagination d-flex align-items-center justify-content-center mb_10">

                                @if ($data['wishlist']->currentPage() == 1)
                                    <a class="arrow_btns d-inline-flex align-items-center justify-content-center ms-0"
                                        href="javascript:void(0)">
                                        <i class="fas fa-chevron-left"></i>
                                        <span>{{ _trans('landlord.Prev') }}</span>
                                    </a>
                                @else
                                    <a class="arrow_btns d-inline-flex align-items-center justify-content-center ms-0"
                                        href="{{ url('customer/my-wishlist?page=') }}{{ $data['wishlist']->currentPage() - 1 }}">
                                        <i class="fas fa-chevron-left"></i>
                                        <span>{{ _trans('landlord.Prev') }}</span>
                                    </a>
                                @endif


                                @foreach ($data['wishlist']->links()['elements'][0] as $key => $item)
                                    <a class="page_counter {{ $key == $data['wishlist']->currentPage() ? 'active' : '' }}"
                                        href="{{ $item }}">{{ $key }}</a>
                                @endforeach

                                @if ($data['wishlist']->currentPage() == count($data['wishlist']->links()['elements'][0]))
                                    <a class="arrow_btns d-inline-flex align-items-center justify-content-center"
                                        href="javascript:void(0)">
                                        <span>{{ _trans('landlord.Next') }}</span>
                                        <i class="fas fa-chevron-right"></i>
                                    </a>
                                @else
                                    <a class="arrow_btns d-inline-flex align-items-center justify-content-center"
                                        href="{{ url('customer/my-wishlist?page=') }}{{ $data['wishlist']->currentPage() + 1 }}">
                                        <span>{{ _trans('landlord.Next') }}</span>
                                        <i class="fas fa-chevron-right"></i>
                                    </a>
                                @endif

                            </div>
                            @else
                            <p class="text-center">You have no Wishlist</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
