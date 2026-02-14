@extends('layouts.marsland')

@section('content')
    <main>
        <!-- Login area S t a r t  -->
        <div class="ot-login-area">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xxl-5 col-xl-5 col-lg-6 col-md-8 col-sm-10">
                        <div class="ot-login-card">

                            <!-- Logo ( Dark-mode )-->
                            <div class="logo logo-large dark-logo mb-40">
                                <a href="{{ route('home') }}">
                                    <img src="{{ @globalAsset(setting('dark_logo')) }}" alt="logo">
                                </a>
                            </div>
                            <!-- White Logo ( light-mode )-->
                            <div class="logo logo-large  light-logo mb-40">
                                <a href="{{ route('home') }}">
                                    <img src="{{ @globalAsset(setting('light_logo')) }}" alt="logo">
                                </a>
                            </div>

                            <!-- Form -->
                            <form action="{{ route('login.auth') }}" method="POST">
                                @csrf

                                <div class="position-relative ot-contact-form mb-24">
                                    <label class="ot-contact-label">
                                        {{ _trans('common.Email Address') }}
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input name="email" value="{{ old('email') }}" class="form-control ot-contact-input"
                                        type="text" placeholder="{{ _trans('common.Your Email') }}">
                                    @error('email')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="position-relative ot-contact-form mb-24">
                                    <label class="ot-contact-label">
                                        {{ _trans('common.Password') }}
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input name="password" class="form-control ot-contact-input" type="password"
                                        placeholder="{{ _trans('common.Your Password') }}">
                                    @error('password')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="remember-me">
                                    <label>
                                        <input name="rememberMe" class="ot-checkbox" type="checkbox">
                                        <small>{{ _trans('common.Remember me') }}</small>
                                        <span class="ot-checkmark"></span>
                                    </label>
                                    <div class="forget-section">
                                        <a href="{{ route('forgot-password') }}" class="forget-pass">
                                            <span>{{ _trans('common.Forgot password ?') }}</span>
                                        </a>
                                    </div>
                                </div>
                                <button class="btn-primary-submit w-100">{{ _trans('common.Login') }}</button>
                            </form>
                            @if (env('APP_DEMO'))
                                <h5 class="my-3">{{ _trans('common.Login as') }}</h5>
                                <div class="row row-cols-3">
                                    <div class="col">
                                        <form action="{{ route('login.auth') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="email" value="landlord0@onest.com">
                                            <input type="hidden" name="password" value="12345678">
                                            <button class="btn btn-secondary w-100 p-2 ">
                                                <i class="ri-user-shared-2-line"></i> {{ _trans('common.Landlord') }}
                                            </button>
                                        </form>
                                    </div>
                                    <div class="col">
                                        <form action="{{ route('login.auth') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="email" value="tenant1@onest.com">
                                            <input type="hidden" name="password" value="12345678">
                                            <button class="btn btn-warning w-100 p-2 text-white">
                                                <i class="ri-user-shared-2-line"></i> {{ _trans('common.Tenant') }}
                                            </button>
                                        </form>
                                    </div>
                                    <div class="col">
                                        <form action="{{ route('login.auth') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="email" value="superadmin@onest.com">
                                            <input type="hidden" name="password" value="12345678">
                                            <button class="btn btn-dark w-100 p-2">
                                                <i class="ri-user-shared-2-line"></i> {{ _trans('common.Super Admin') }}
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            @endif
                            <div class="login-footer">
                                <div class="create-account">
                                    <p>{{ _trans('common.New User?') }}
                                        <a href="{{ route('') }}"><span>{{ _trans('Become Landlord') }}</span></a>
                                        <br>
                                        <a href="{{ route('register') }}"
                                            class="mt-5"><span>{{ _trans('Become Tenant') }}</span></a>
                                    </p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End-of Login -->
    </main>
@endsection
