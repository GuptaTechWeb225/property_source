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
                            @include('backend.partials.user_profile-menu')
                            <!-- profile menu head end -->

                                <!-- profile menu body start -->
                                <div class="profile-menu-body">
                                    @include('backend.partials.profile_nav')

                                </div>
                                <!-- profile menu body end -->
                            </div>
                            <!-- profile menu end -->
                        </div>
                    </div>
                </div>
                <!-- profile menu mobile end -->


                <!-- profile menu start -->
                <div class="profile-menu">
                    <!-- profile menu head start -->
                @include('backend.partials.user_profile-menu')
                <!-- profile menu head end -->

                    <!-- profile menu body start -->
                    <div class="profile-menu-body">
                        @include('backend.partials.profile_nav')
                    </div>
                    <!-- profile menu body end -->
                </div>
                <!-- profile menu end -->

                <!-- profile body start -->
                <div class="profile-body">
                    <div class="emergency-header-edit edit-section">
                        <h2 class="mb-5">{{ @$emergency->type }}</h2>
                    </div>
                    <div class="emergency-details">
                        @if(!empty($emergency))
                            <div class="load-data">
                                <div class="row">
                                    <div class="col-lg-6 mb-20">
                                        <div class="all-contact-numbers">
                                            <div class="single-emergency">
                                                <div class="emergency-name-info">
                                                    <div class="emergency-name">
                                                        <img class="img-fluid rounded-circle"
                                                             src="{{ @globalAsset($emergency->image->path) }}"
                                                             alt="profile image"/>
                                                        <p>{{ @$emergency->relation }}</p>
                                                    </div>

                                                    <div class="emergency-info">
                                                        <h6>{{ @$emergency->name }}</h6>
                                                        <span
                                                            class="emergency-occupasion text-muted">{{ @$emergency->occupied }}</span>
                                                        <p class="m-0"><i class="fa-solid fa-phone"></i>
                                                            {{ @$emergency->phone }}</p>
                                                        <p>
                                                            <i class="fa-regular fa-envelope"></i> {{ @$emergency->email }}
                                                        </p>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <div class="card ot-card mb-24">
                            <form action="{{ route('users.profileDetailsStore', [$data['id'], 'emergency']) }}"
                                  enctype="multipart/form-data" method="post" id="visitForm">
                                @csrf
                                <input type="hidden" name="id" value="{{ @$emergency->id }}">

                                <div class="row mb-3">
                                    <div class="col-md-6 mb-3">
                                        <label for="exampleDataList" class="form-label ">{{ _trans('common.Name') }}
                                            <span
                                                class="fillable">*</span></label>
                                        <input class="form-control ot-input @error('name') is-invalid @enderror"
                                               name="name" value="{{ @$emergency->name }}" list="datalistOptions"
                                               id="exampleDataList" placeholder="Enter Name">
                                        @error('name')
                                        <div id="validationServer04Feedback" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="exampleDataList"
                                               class="form-label ">{{ _trans('common.Occupation') }}
                                            <span class="fillable">*</span></label>
                                        <input class="form-control ot-input @error('occupied') is-invalid @enderror"
                                               name="occupied" value="{{ @$emergency->occupied }}"
                                               list="datalistOptions"
                                               id="exampleDataList" placeholder="Enter occupied">
                                        @error('occupied')
                                        <div id="validationServer04Feedback" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="exampleDataList" class="form-label ">{{ _trans('common.Relation') }}
                                            <span class="fillable">*</span></label>
                                        <input class="form-control ot-input @error('relation') is-invalid @enderror"
                                               name="relation" value="{{ @$emergency->relation }}"
                                               list="datalistOptions"
                                               id="exampleDataList" placeholder="Enter relation">
                                        @error('relation')
                                        <div id="validationServer04Feedback" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="exampleDataList" class="form-label ">{{ _trans('common.Phone') }}
                                            <span class="fillable">*</span></label>
                                        <input class="form-control ot-input @error('phone') is-invalid @enderror"
                                               name="phone" value="{{ @$emergency->phone }}" list="datalistOptions"
                                               id="exampleDataList" placeholder="Enter phone">
                                        @error('phone')
                                        <div id="validationServer04Feedback" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="exampleDataList" class="form-label ">{{ _trans('common.Email') }}
                                            <span class="fillable">*</span></label>
                                        <input class="form-control ot-input @error('email') is-invalid @enderror"
                                               name="email" value="{{ @$emergency->email }}" list="datalistOptions"
                                               id="exampleDataList" placeholder="Enter email">
                                        @error('email')
                                        <div id="validationServer04Feedback" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        {{-- File Uplode --}}
                                        <label class="form-label" for="inputImage">{{ _trans('common.image') }}</label>
                                        <div class="ot_fileUploader left-side mb-3">
                                            <input class="form-control" type="text" placeholder="Image"
                                                   readonly="" id="placeholder">
                                            <button class="primary-btn-small-input" type="button">
                                                <label class="btn btn-lg ot-btn-primary" for="fileBrouse">Browse</label>
                                                <input type="file" class="d-none form-control" name="image"
                                                       id="fileBrouse" accept="image/*">
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mt-3">
                                    <div class="text-end">
                                        <button class="btn btn-lg ot-btn-primary"><span><i class="fa-solid fa-save"></i>
                                            </span>{{ _trans('common.submit') }}</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
                <!-- profile body form end -->
            </div>
            <!-- profile body end -->
        </div>
    </div>
@endsection

