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

                    <div class="card ot-card mb-24 update-data">
                        <form action="" enctype="multipart/form-data" method="post" id="visitForm">
                            @csrf
                            <div class="row mb-3">
                            </div>
                        </form>
                    </div>
                    <div class="card table-content table-basic mb-5 load-data">
                        <div class="card-body">
                            <div class="header-add-edit mb-16">
                                <h2 class="m-0">{{ _trans('property.Add Facility') }}</h2>
                            </div>
                            <div class="row">

                                <div class="col-lg-6">
                                    <div class="all-lands-basic">
                                        <div class="table-responsive table-height-350 niceScroll">
                                            <table class="table table-bordered ">
                                                <tbody class="tbody">
                                                    @foreach ($data['facilities'] as $facility)
                                                        <tr>
                                                            <th class="w-50percent"><i
                                                                    class="{{ $facility->type->icon }}"></i>
                                                                {{ $facility->type->name }}</th>
                                                            <td class="w-50percent">{{ $facility->content }}</td>
                                                            <td>
                                                                <a href="{{ url('property.facility.edit', $facility->id) }}"
                                                                    class="btn btn-sm btn-primary">
                                                                    <i class="fa-solid fa-edit"></i>
                                                                </a>
                                                                <a href="{{ route('properties.facilityDelete', $facility->id) }}"
                                                                    class="btn btn-sm btn-danger">
                                                                    <i class="fa-solid fa-trash"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="profile-body-form style-2">
                                        <form action="{{ route('properties.update', [$data['property']->id, 'facility']) }}"
                                            method="post" id="visitForm" enctype="multipart/form-data">
                                            @csrf

                                            <select name="facility_type" id=""
                                                class="nice-select niceSelect bordered_style wide mb-3">
                                                @foreach ($data['type'] as $facility_type)
                                                    <option value="{{ $facility_type->id }}">{{ $facility_type->name }}
                                                    </option>
                                                @endforeach

                                            </select>
                                            <div class="col-xl-12">
                                                <label for="exampleDataList"
                                                    class="form-label ">{{ _trans('landlord.Value') }}</label>
                                                <input
                                                    class="form-control ot-input mb-3 @error('value') is-invalid @enderror"
                                                    name="content" list="datalistOptions" id="exampleDataList"
                                                    value="" placeholder="{{ _trans('common.Enter Value') }}">
                                            </div>

                                            <button class="btn btn-lg ot-btn-primary">submit</button>

                                        </form>
                                    </div>


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
