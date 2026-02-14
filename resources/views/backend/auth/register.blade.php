@extends('backend.auth.master')
@section('script')
    {!! NoCaptcha::renderJs() !!}
@endsection
@section('title')
    {{ $data['title'] }}
@endsection

@section('content')
    <!-- form heading  -->
    <div class="form-heading mb-40">
        <h1 class="title mb-8">{{ _trans('common.Create') }} <span
                class="text-theme-color">{{ request('type') }}</span> {{ _trans('common.Account') }}</h1>
        <p class="subtitle mb-0"> {{ _trans('common.Please sign up to your personal account if you want to use all our premium products') }}</p>
        <div class="mt-3">
            Register as a <a href="{{ route('register', ['type' => 'Landlord']) }}"
                             class="text-theme-color">Landlord</a> Or <a
                href="{{ route('register', ['type' => 'Tenant']) }}" class="text-theme-color">Tenant</a>
        </div>
    </div>
    <!-- Start With form -->

    <form action="{{ route('register') }}" method="post"
          class="auth-form d-flex justify-content-center align-items-start flex-column">
    @csrf
    <!-- username input field  -->
        <input type="hidden" name="role_id" value="{{@$data['role_id']}}">

        <div class="input-field-group mb-20">
            <label for="username">{{ _trans('common.Name') }} <sup class="fillable">*</sup></label><br/>
            <div class="custom-input-field">
                <input type="text" name="name" id="username" class="ot-input @error('name') is-invalid @enderror"
                       placeholder="{{ _trans('common.enter your name') }}" value="{{ old('name') }}"/>
                <img src="{{ asset('backend') }}/assets/images/icons/username-cus.svg" alt="">
                @error('name')
                <p class="input-error error-danger invalid-feedback">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="input-field-group mb-20">
            <label for="username">{{ _trans('common.Email') }} <sup class="fillable">*</sup></label><br/>
            <div class="custom-input-field">
                <input type="email" name="email" class="ot-input @error('email') is-invalid @enderror" id="username"
                       placeholder="{{ _trans('common.enter your email') }}" value="{{ old('email') }}"/>
                <img src="{{ asset('backend') }}/assets/images/icons/email-cus.svg" alt="">
                @error('email')
                <p class="input-error error-danger invalid-feedback">{{ $message }}</p>
                @enderror
            </div>

        </div>
        <div class="input-field-group mb-20">
            <label for="username">{{ _trans('common.Phone') }} </label><br/>
            <div class="custom-input-field">
                <input type="text" name="phone" class="ot-input @error('phone') is-invalid @enderror" id="username"
                       placeholder="{{ _trans('common.enter your phone') }}" value="{{ old('phone') }}"/>
                <img src="{{ asset('backend') }}/assets/images/icons/phone.svg" alt="">
                @error('phone')
                <p class="input-error error-danger invalid-feedback">{{ $message }}</p>
                @enderror
            </div>

        </div>

        <!-- password input field  -->
        <div class="input-field-group mb-20">
            <label for="password">{{ _trans('common.Password') }} <sup class="fillable">*</sup></label><br/>
            <div class="custom-input-field password-input">
                <input type="password" name="password" class="ot-input @error('password') is-invalid @enderror"
                       id="password" placeholder="******************"/>
                <i class="lar la-eye"></i>
                <img src="{{ asset('backend') }}/assets/images/icons/lock-cus.svg" alt="">
                @error('password')
                <p class="input-error error-danger invalid-feedback">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <!-- password input field  -->
        <div class="input-field-group mb-20">
            <label for="password">{{ _trans('common.Confirm password') }} <sup class="fillable">*</sup></label><br/>
            <div class="custom-input-field password-input">
                <input type="password" name="confirm_password" id="confirm_password"
                       class="ot-input @error('confirm_password') is-invalid @enderror"
                       placeholder="******************"/>
                <i class="lar la-eye"></i>
                <img src="{{ asset('backend') }}/assets/images/icons/lock-cus.svg" alt="">
                @error('confirm_password')
                <p class="input-error error-danger invalid-feedback">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <!-- Remember Me and forget password section start -->
        <div class="d-flex justify-content-between w-100 mb-3">
            <!-- Remember Me input field  -->
            <div class="remember-me input-check-radio">
                <div class="form-check d-flex align-items-center">
                    <input class="form-check-input" type="checkbox" name="agree_with" id="agree_with" checked>
                    <label for="agree_with">{{ _trans('common.I agree to')}} <a class="text-primary"
                                                                                href="{{ url('terms') }}"> {{ _trans('common.privacy policy & terms') }}</a></label>
                </div>
            </div>
        </div>
        <!-- Remember Me and forget password section end -->
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

    <!-- submit button  -->
        <button type="submit" class="submit-btn pv-16 mt-32 mb-20" value="Sign In">
            {{ _trans('common.Register') }}
        </button>
    </form>
    <!-- End form -->
    <p class="authenticate-now mb-0">
        {{ _trans('common.Already have an account') }}
        <a class="link-text" href="{{ route('login') }}"> {{ _trans('common.Login') }}</a>
    </p>

@endsection
