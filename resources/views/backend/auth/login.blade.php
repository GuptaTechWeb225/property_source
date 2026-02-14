@extends('backend.auth.master')

@section('title', _trans('Landlord.Login'))

@section('content')
    <ul class="nav nav-tabs w-100 mb-3" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link text-theme-color active fw-bold" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Landlord</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link text-theme-color fw-bold" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Tenant</button>
        </li>
    </ul>
    <div class="form-heading mb-20 mx-2">
        <h1 class="title mb-8">{{ _trans('landlord.Login') }}</h1>
        <p class="subtitle mb-0">{{ _trans('landlord.Welcome back please login to your account') }}</p>
    </div>
    <form action="{{ route('login.auth') }}" method="post"
          class="auth-form d-flex justify-content-center align-items-start flex-column mx-2">
    @csrf
    <!-- username input field  -->
        <div class="input-field-group mb-20">
            <label for="username">{{ _trans('landlord.Email') }} <sup class="fillable">*</sup></label><br />
            <div class="custom-input-field">
                <input type="email" name="email" class="ot-input @error('email') is-invalid @enderror" id="username"
                       placeholder="{{ _trans('landlord.Enter your email') }}" />
                <img src="{{ asset('backend') }}/assets/images/icons/username-cus.svg" alt="">
                @error('email')
                <p class="input-error error-danger invalid-feedback">{{ $message }}</p>
                @enderror
            </div>

        </div>
        <!-- password input field  -->
        <div class="input-field-group mb-20">
            <label for="password">{{ _trans('landlord.Password') }} <sup class="fillable">*</sup></label><br />
            <div class="custom-input-field password-input">
                <input type="password" name="password" class="ot-input @error('password') is-invalid @enderror"
                       id="password" placeholder="******************" />
                <i class="lar la-eye"></i>
                <img src="{{ asset('backend') }}/assets/images/icons/lock-cus.svg" alt="">
                @error('password')
                <p class="input-error error-danger invalid-feedback">{{ $message }}</p>
                @enderror
            </div>

        </div>
        <!-- password input field  -->
        @if (setting('recaptcha_status'))
            <div class="input-field-group">
                <div class="form-group {{ $errors->has('g-recaptcha-response') ? 'is-invalid' : '' }}">
                    {!! app('captcha')->display() !!}
                    @if ($errors->has('g-recaptcha-response'))
                        <p class="input-error error-danger">{{ $errors->first('g-recaptcha-response') }}
                        </p>
                    @endif
                </div>
            </div>
    @endif
    <!-- Remember Me and forget password section start -->
        <div class="d-flex justify-content-between align-items-center w-100 mt-20">
            <!-- Remember Me input field  -->
            <div class="remember-me input-check-radio">
                <div class="form-check d-flex align-items-center">
                    <input type="checkbox" class="form-check-input" name="rememberMe" id="rememberMe"/>
                    <label for="rememberMe">{{ _trans('landlord.remember me') }}</label>
                </div>
            </div>
            <!-- Forget Password link  -->
            <div>
                <a class="fogotPassword" href="{{ route('forgot-password') }}">{{ _trans('landlord.Forgot password ?') }}</a>
            </div>
        </div>
        <!-- Remember Me and forget password section end -->

        <!-- submit button  -->
        <button type="submit" class="submit-btn pv-16 mt-32 mb-20" value="Sign In">
            {{ _trans('landlord.Login') }}
        </button>
    </form>
    <!-- Start With form -->


    <!-- End form -->
    @if (\Config::get('app.APP_DEMO'))
    <div class="login_credential">
        @php $superadmin = \App\Models\User::where('role_id', 1)->first(); @endphp
        @if($superadmin != null)
        <div class="">
            <form action="{{ route('login.auth') }}" method="post"
                class="form d-flex justify-content-center align-items-start flex-column">
                @csrf
                <input name="email" type="hidden" value="{{$superadmin->email}}">
                <input name="password" type="hidden" value="12345678">
                <input name="g-recaptcha-response" type="hidden" value="12345678">
                <button type="submit" class="submit-button submit-button-only-border pv-14"
                    value="Login">{{ _trans('common.superadmin') }}</button>
            </form>
        </div>
        @endif
        @php $landloard = \App\Models\User::where('role_id', 4)->first(); @endphp
        @if($landloard != null)
        <div class="">
            <form action="{{ route('login.auth') }}" method="post"
                class="form d-flex justify-content-center align-items-start flex-column">
                @csrf
                <input name="email" type="hidden" value="{{$landloard->email}}">
                <input name="password" type="hidden" value="12345678">
                <input name="g-recaptcha-response" type="hidden" value="12345678">
                <button type="submit" class="submit-button submit-button-only-border pv-14"
                    value="Login">{{ _trans('common.landloard') }}</button>
            </form>
        </div>
        @endif
        @php $tenant = \App\Models\User::where('role_id', 5)->first(); @endphp
        @if($tenant != null)
        <div class="">
            <form action="{{ route('login.auth') }}" method="post"
                class="form d-flex justify-content-center align-items-start flex-column">
                @csrf
                <input name="email" type="hidden" value="{{$tenant->email}}">
                <input name="password" type="hidden" value="12345678">
                <input name="g-recaptcha-response" type="hidden" value="12345678">
                <button type="submit" class="submit-button submit-button-only-border pv-14"
                    value="Login">{{ _trans('common.tenant') }}</button>
            </form>
        </div>
        @endif
    </div>
    @endif

    <p class="authenticate-now mb-0">
        {{ _trans('common.Do you have an account ?') }}
        <a class="link-text" href="{{ route('register') }}"> {{ _trans('common.create an account') }}</a>
    </p>

@endsection
@section('script')
    {!! NoCaptcha::renderJs() !!}
@endsection
