@extends('backend.master')
@section('title')
    {{ @$data['title'] }}
@endsection
@section('content')
    <div class="page-content">
        <!-- profile content start -->
        <div class="profile-content">
            <div class="d-flex flex-column flex-lg-row gap-4 gap-lg-0">
                <!-- profile menu mobile start -->
                <div class="profile-menu-mobile">
                    <button class="btn-menu-mobile" type="button" data-bs-toggle="offcanvas"
                        data-bs-target="#offcanvasWithBothOptionsMenuMobile"
                        aria-controls="offcanvasWithBothOptionsMenuMobile">
                        <span class="icon"><i class="fa-solid fa-bars"></i></span>
                    </button>
                    <div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1"
                        id="offcanvasWithBothOptionsMenuMobile">
                        <div class="offcanvas-header">
                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close">
                                <span class="icon"><i class="fa-solid fa-xmark"></i></span>
                            </button>
                        </div>
                        <div class="offcanvas-body">
                            <!-- profile menu start -->
                            <div class="profile-menu">
                                <!-- profile menu head start -->
                                @include('backend.partials.property-profile-menu')
                                <!-- profile menu head end -->
                                <div class="profile-menu-body">
                                    @include('backend.property.propert_nav')
                                </div>
                            </div>
                            <!-- profile menu end -->
                        </div>
                    </div>
                </div>
                <!-- profile menu mobile end -->
                <!-- profile menu start -->
                <div class="profile-menu">
                    <!-- profile menu head start -->
                    @include('backend.partials.property-profile-menu')
                    <!-- profile menu head end -->
                    <!-- profile menu body start -->
                    <div class="profile-menu-body">
                        @include('backend.property.propert_nav')
                    </div>
                    <!-- profile menu body end -->
                </div>
                <!-- profile menu end -->
                <!-- profile body start -->
                <div class="profile-body">
                    <h2 class="title">Tenants</h2>
                    <!-- profile body nav end -->
                    <!-- profile body form start -->
                    <div class="profile-body-form style-2">
                        <div class="property-tenant">
                            <div class="tenant-info-data">

                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="title">
                                            <h3 class="">Current Tenant</h3>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    @forelse ($data['tenants'] as $value)
                                    <div class="col-xl-6">
                                        <div class="property-tenants-data">
                                            <div class="single-property-tenants d-flex mb-24">
                                                <div class="tenants-img mr-12">
                                                    <img class="img-fluid" src="{{ asset($value->user->image->path?? @globalAsset('backend/uploads/default-images/default-1.jpeg'))}}" alt="">
                                                </div>
                                                <div class="all-property-tenants w-100">
                                                    <div class="property-tenants-info name-info d-flex justify-content-between">
                                                        <b>{{$value->user->name}}</b>
                                                        {{-- <a href="#">
                                                            <span class="text-success">
                                                                <i class="fa-solid fa-phone"></i>
                                                            </span>
                                                        </a> --}}
                                                    </div>
                                                    <div
                                                        class="property-tenants-info apartment-info d-flex justify-content-between">
                                                        <p class="text-muted m-0">{{$value->property->location->address}}</p>
                                                        {{-- <a href="#">
                                                            <span class="text-info"><i class="fa-regular fa-envelope"></i></span>
                                                        </a> --}}
                                                    </div>
                                                    <div
                                                        class="property-tenants-info address-info d-flex justify-content-between">
                                                        <p class="text-muted m-0">{{$value->user->present_address}}</p>
                                                        {{-- <a href="#">
                                                            <span class="text-primary"><i class="fa-solid fa-ellipsis"></i></span>
                                                        </a> --}}
                                                    </div>
                                                    <div class="property-tenants-info">
                                                       {{-- <span class="text-success">
                                                            <i class="fa-solid fa-phone"></i>
                                                        </span> --}}
                                                        <b class="font-weight-400">{{$value->user->phone}}</b>
                                                    </div>
                                                    <div class="property-tenants-info apartment-info">
                                                        {{-- <span class="text-info">
                                                            <i class="fa-regular fa-envelope"></i>
                                                        </span> --}}
                                                        <b class="font-weight-400">{{$value->user->email}}</b>
                                                    </div>
                                                    <div class="property-tenants-info apartment-info">
                                                        <b class="font-weight-400">{{date('d/m/Y', strtotime($value->start_date))}} to continue</b>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                     @empty
                                            <div class="col-xl-12">
                                                <div class="property-tenants-data">
                                                    <div class="single-property-tenants d-flex mb-24">
                                                        <div class="all-property-tenants w-100">
                                                            <div colspan="100%" class="text-center gray-color">
                                                                <img src="{{ asset('images/no_data.svg') }}" alt="" class="mb-primary" width="100">
                                                                <p class="mb-0 text-center">No data available</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    @endforelse
                                </div>
                            </div>

                            <div class="tenant-info-data table">
                                <div class="table-content table-basic">
                                    <form method="get">
                                        <div class="row">
                                            <div class="col-xl-12">
                                                <div class="title">
                                                    <h3 class="">History</h3>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row table-toolbar">
                                            <div class="col-xl-5 mb-3">
                                                <div class="form-group">
                                                    <label class="form-label">Search </label>
                                                    <div class="search-box d-flex">
                                                        <input class="form-control height-48" placeholder="Search" name="search" id="table_search" value="{{ request()->search ?? ""}}">
                                                        <span class="icon"><i class="fa-solid fa-magnifying-glass"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 mb-3">
                                                <div class="form-group">
                                                    <label class="form-label">From</label>
                                                    <input type="date" name="date_from" class="form-control ot-input" value="{{ request()->date_from ?? ""}}">
                                                </div>
                                            </div>
                                            <div class="col-xl-3 mb-3">
                                                <div class="form-group">
                                                    <label class="form-label">To</label>
                                                    <input type="date" name="date_to" class="form-control ot-input" value="{{ request()->date_to ?? ""}}">
                                                </div>
                                            </div>
                                            <div class="col-xl-1 mb-3">
                                                <div class="form-group">
                                                    <label class="form-label">&nbsp;</label>
                                                    <button type="submit" class="btn btn-primary"><i class="las la-search"></i></button>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            @forelse ($data['tenants_old'] as $key => $value)
                                            <div class="col-xl-6">
                                                <div class="property-tenants-data">
                                                    <div class="single-property-tenants d-flex mb-24">
                                                        <div class="tenants-img mr-12">
                                                            <img class="img-fluid" src="{{ asset($value->user->image->path?? @globalAsset('backend/uploads/default-images/default-1.jpeg'))}}" alt="">
                                                        </div>
                                                        <div class="all-property-tenants w-100">
                                                            <div class="property-tenants-info name-info d-flex justify-content-between">
                                                                <b>{{$value->user->name}}</b>
                                                                {{-- <a href="#">
                                                                    <span class="text-success"><i class="fa-solid fa-phone"></i></span>
                                                                </a> --}}
                                                            </div>
                                                            <div class="property-tenants-info apartment-info d-flex justify-content-between">
                                                                <p class="text-muted m-0">{{$value->property->location->address}}</p>
                                                                {{-- <a href="#">
                                                                    <span class="text-info"><i class="fa-regular fa-envelope"></i></span>
                                                                </a> --}}
                                                            </div>
                                                            <div class="property-tenants-info address-info d-flex justify-content-between">
                                                                <p class="text-muted m-0">{{$value->user->present_address}}</p>
                                                                {{-- <a href="#">
                                                                    <span class="text-primary"><i class="fa-solid fa-ellipsis"></i></span>
                                                                </a> --}}
                                                            </div>
                                                            <div class="property-tenants-info">
                                                                <b class="font-weight-400">{{$value->user->phone}}</b>
                                                            </div>
                                                            <div class="property-tenants-info apartment-info">
                                                                <b class="font-weight-400">{{$value->user->email}}</b>
                                                            </div>
                                                            <div class="property-tenants-info apartment-info">
                                                                <b class="font-weight-400">{{date('d/m/Y', strtotime($value->start_date))}} to {{date('d/m/Y', strtotime($value->end_date))}}</b>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @empty
                                            <div class="col-xl-12">
                                                <div class="property-tenants-data">
                                                    <div class="single-property-tenants d-flex mb-24">
                                                        <div class="all-property-tenants w-100">
                                                            <div colspan="100%" class="text-center gray-color">
                                                                <img src="{{ asset('images/no_data.svg') }}" alt="" class="mb-primary" width="100">
                                                                <p class="mb-0 text-center">No data available</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforelse
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- profile body form end -->
            </div>
            <!-- profile body end -->
        </div>
    </div>
@endsection

@push('script')
    @include('backend.partials.delete-ajax')
@endpush
