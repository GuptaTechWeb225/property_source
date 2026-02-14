@extends('backend.auth.master')

@section('title')
{{ $data['title'] }}
@endsection

@section('content')
    <!-- form heading  -->
    <div class="form-heading mb-40">
        <h1 class="title mb-8">{{ _trans('landlord.forgot password') }}</h1>
        <p class="subtitle mb-0">{{ _trans('landlord.enter your phone or email to recover your password') }}</p>
    </div>
    <!-- Start With form -->

    <form action="{{ route('forgot.password') }}" method="post" class="auth-form d-flex justify-content-center align-items-start flex-column">
        @csrf
        <!-- username input field  -->
        <div class="input-field-group mb-20">
            <label for="username">{{ _trans('landlord.email') }} <sup class="fillable">*</sup></label><br />
            <div class="custom-input-field">
                <input type="email" name="email" id="username" class="ot-input @error('email') is-invalid @enderror" placeholder="{{ _trans('landlord.enter your email') }}"
                value="{{old('email')}}"/>
                <img src="{{ asset('backend') }}/assets/images/icons/username-cus.svg" alt="">
                @error('email')
                <p class="input-error error-danger invalid-feedback">{{ $message }}</p>
            @enderror
            </div>
        </div>
        <!-- submit button  -->
        <button type="submit" class="submit-btn pv-16 mb-20" value="Sign In">
            {{ _trans('landlord.send link') }}
        </button>
    </form>
    <!-- End form -->
    <p class="authenticate-now mb-0">
        <a class="link-text" href="{{ route('login') }}"> {{ _trans('landlord.back to login') }}</a>
    </p>

@endsection
