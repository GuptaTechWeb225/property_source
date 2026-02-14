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
                                <div class="profile-menu-head">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-shrink-0">
                                            <img class="img-fluid rounded-circle"
                                                src="{{ @globalAsset(Auth::user()->image->path) }}"
                                                alt="{{ Auth::user()->name }}">
                                        </div>
                                        <div class="flex-grow-1">
                                            <div class="body">
                                                <h2 class="title">{{ _trans('common.robert_downey') }}</h2>
                                                <p class="paragraph">{{ _trans('common.ui_ux_designer') }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- profile menu head end -->

                                <!-- profile menu body start -->
                                <div class="profile-menu-body">
                                    <nav>
                                        <ul class="nav flex-column">
                                            <li class="nav-item">
                                                <a class="nav-link active" aria-current="page"
                                                    href="{{ route('my.profile') }}">{{ _trans('common.my_profile') }}</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link"
                                                    href="{{ route('passwordUpdate') }}">{{ _trans('common.update_password') }}</a>
                                            </li>
                                        </ul>
                                    </nav>
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
                    <div class="profile-menu-head">
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0">
                                <img class="img-fluid rounded-circle" src="{{ @globalAsset(Auth::user()->image->path) }}"
                                    alt="{{ Auth::user()->name }}">
                            </div>
                            <div class="flex-grow-1">
                                <div class="body">
                                    <h2 class="title">{{ Auth::user()->name }}</h2>
                                    <p class="paragraph">{{ Auth::user()->role->name }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- profile menu head end -->

                    <!-- profile menu body start -->
                    <div class="profile-menu-body">
                        <nav>
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link " aria-current="page"
                                        href="{{ route('my.profile') }}">{{ _trans('common.my_profile') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active"
                                        href="{{ route('passwordUpdate') }}">{{ _trans('common.update_password') }}</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <!-- profile menu body end -->
                </div>
                <!-- profile menu end -->

                <!-- profile body start -->
                <div class="profile-body">

                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h2 class="title">{{ _trans('common.update_password') }}</h2>
                    </div>

                    <!-- profile body form start -->
                    <div class="profile-body-form">
                        <form action="{{ route('passwordUpdateStore') }}" enctype="multipart/form-data" method="post"
                            id="visitForm">
                            @csrf
                            @method('PUT')

                            <div class="row mb-3 mt-3">
                                <div class="col-md-12">
                                    <div class="row mb-3">
                                        <div class="col-sm-12">
                                            <label for="inputname"
                                                class="form-label">{{ _trans('common.Current Password') }}
                                                <span class="text-danger">*</span></label>
                                            <input type="password" name="current_password"
                                                placeholder="{{ _trans('common.current password') }}"
                                                class="form-control ot-input @error('current_password') is-invalid @enderror">
                                            @error('current_password')
                                                <div id="validationServer04Feedback" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-12">
                                            <label for="inputname" class="form-label">{{ _trans('common.New Password') }}
                                                <span class="text-danger">*</span></label>
                                            <input type="password" name="password"
                                                placeholder="{{ _trans('common.new password') }}"
                                                class="form-control ot-input @error('password') is-invalid @enderror">
                                            @error('password')
                                                <div id="validationServer04Feedback" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-12">
                                            <label for="inputname"
                                                class="form-label">{{ _trans('common.Confirm Password') }}
                                                <span class="text-danger">*</span></label>
                                            <input type="password" name="password_confirmation"
                                                 placeholder="{{ _trans('common.confirm password') }}"
                                                class="form-control ot-input @error('password_confirmation') is-invalid @enderror">
                                            @error('password_confirmation')
                                                <div id="validationServer04Feedback" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 mt-3">
                                    <div class="text-end">
                                        <button class="btn btn-lg ot-btn-primary"><span><i class="fa-solid fa-save"></i>
                                            </span>{{ _trans('common.update') }}</button>
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
