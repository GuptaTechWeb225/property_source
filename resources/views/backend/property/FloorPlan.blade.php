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
                    <div class="emergency-header-edit mb-16">
                        <h2 class="m-0">Floor Plans</h2>
                    </div>

                    <!-- profile body form start -->
                    <div class="profile-body-form style-2">

                        <div class="land-project-gallery">

                            {{-- gallery images --}}
                            <div class="gallery-image-box flex-shrink-0">
                                <div class="row">
                                    @foreach ($data['floorPlans'] as $floorPlan)
                                        <div class="col-xl-4">
                                            <div class="single-gallery-wrapper position-relative">
                                                <div class="action ">
                                                    <a href="{{ route('properties.deleteImage', $floorPlan->image->id) }}"
                                                        class="btn btn-danger" type="submit">Delete</a>
                                                </div>
                                                <img class="img-fluid mb-24"
                                                    src="{{ @globalAsset($floorPlan->image->path) }}" alt="profile image" />
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            {{-- add gallery --}}
                            <form class="property-add-gallery"
                                action="{{ route('properties.update', [$data['property']->id, 'floor_plan']) }}"
                                method="post" id="visitForm" enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-3">

                                    <div class="col-xl-12">
                                        <div class="title mb-10">
                                            <h3 class="">Add Floor Plan</h3>
                                        </div>
                                    </div>

                                    <div class="col-xl-12 mb-3">
                                        <label for="exampleDataList" class="form-label ">{{ _trans('common.Title') }}
                                        </label>
                                        <input class="form-control ot-input @error('Title') is-invalid @enderror"
                                            name="Title" list="datalistOptions" id="exampleDataList"
                                            placeholder="{{ _trans('common.Name') }}" required>
                                        @error('Title')
                                            <div id="validationServer04Feedback" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-xl-12">
                                        {{-- File Uplode --}}
                                        <label class="form-label" for="inputImage">{{ _trans('common.image') }}</label>
                                        <div class="ot_fileUploader left-side mb-3">
                                            <input class="form-control" type="text" placeholder="Image" readonly=""
                                                id="placeholder">
                                            <button class="primary-btn-small-input" type="button">
                                                <label class="btn btn-lg ot-btn-primary" for="fileBrouse">Browse</label>
                                                <input type="file" class="d-none form-control" name="image"
                                                    id="fileBrouse" accept="image/*" required>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-24">
                                        <div class="text-center">
                                            <button class="btn btn-lg ot-btn-primary"><span><i class="fa-solid fa-save"></i>
                                                </span>{{ _trans('common.Save') }}</button>
                                        </div>
                                    </div>
                                </div>
                            </form>

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
