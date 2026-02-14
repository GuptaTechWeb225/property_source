@extends('layouts.marsland')

@section('content')
    <main>
        <!-- login area S t a r t  -->
        <div class="ot-login-area bg-light">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-10 my-4">
                        <div class="ot-login-card card  border-0 rounded-4">
                            <div class="row border-bottom border-primary">
                                <div class="col-lg-2">
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
                                </div>
                                <div class="col-lg-8 text-center">
                                    <h2 class="mb-0 text-white">Create New Account</h2>
                                </div>
                                <div class="col-lg-2">
                                    <a href="{{ route('home') }}" class="text-white" >Home</a>
                                </div>
                            </div>

                            <div class="card-body">
                                <form action="{{ route('register') }}" class="row" method="POST"
                                      enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="role_id" value="{{@$data['role_id']}}">
                                    <div class="ot-contact-form mb-24 col-md-6 col-lg-4">
                                        <label class="ot-contact-label">
                                            {{ _trans('common.Full Name') }}
                                            <span class="text-white">*</span>
                                        </label>
                                        <input name="name" value="{{ old('name') }}"
                                               class="form-control ot-contact-input" type="text"
                                               placeholder="{{ _trans('common.Enter your full name') }}"
                                               autocomplete="off">
                                        @error('name')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="ot-contact-form mb-24 col-md-6 col-lg-4">
                                        <label class="ot-contact-label">
                                            {{ _trans('common.Email Address') }}
                                            <span class="text-white">*</span>
                                        </label>
                                        <input name="email" value="{{ old('email') }}"
                                               class="form-control ot-contact-input" type="text"
                                               placeholder="{{ _trans('common.Enter your email') }}"
                                               autocomplete="off">
                                        @error('email')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="ot-contact-form mb-24 col-md-6 col-lg-4">
                                        <label class="ot-contact-label">
                                            {{ _trans('common.Phone') }}
                                            <span class="text-white">*</span>
                                        </label>
                                        <input name="phone" value="{{ old('phone') }}"
                                               class="form-control ot-contact-input" type="text"
                                               placeholder="{{ _trans('common.Enter your Phone') }}"
                                               autocomplete="off">
                                        @error('phone')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="ot-contact-form mb-24 col-md-6 col-lg-4">
                                        <label class="ot-contact-label">
                                            {{ _trans('common.Date of Birth') }}
                                            <span class="text-white">*</span>
                                        </label>
                                        <input name="date_of_birth" value="{{ old('date_of_birth') }}"
                                               class="form-control ot-contact-input" type="date"
                                               placeholder="{{ _trans('common.Enter Date of Birth') }}"
                                               autocomplete="off">
                                        @error('date_of_birth')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="ot-contact-form mb-24 col-md-6 col-lg-4">
                                        <label class="ot-contact-label">{{ _trans('common.Religion') }}</label>
                                        <select class="select2" name="religion">
                                            <option
                                                value="Christian" {{ old('religion') == 'Christian' ? 'selected' : '' }}>
                                                {{ _trans('common.Christian') }}
                                            </option>
                                            <option
                                                value="Muslim" {{ old('religion') == 'Muslim' ? 'selected' : '' }}>
                                                {{ _trans('common.Muslim') }}
                                            </option>
                                            <option
                                                value="Others" {{ old('religion') == 'Others' ? 'selected' : '' }}>
                                                {{ _trans('common.Others') }}
                                            </option>
                                        </select>
                                    </div>

                                    <div class="ot-contact-form mb-24 col-md-6 col-lg-4">
                                        <label class="ot-contact-label">{{ _trans('common.Gender') }}</label>
                                        <select class="select2" name="gender">
                                            <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>
                                                {{ _trans('common.Male') }}
                                            </option>
                                            <option
                                                value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>
                                                {{ _trans('common.Female') }}
                                            </option>
                                        </select>
                                    </div>

                                    <div class="ot-contact-form mb-24 col-md-6 col-lg-4">
                                        <label
                                            class="ot-contact-label">{{ _trans('common.Marital Status') }}</label>
                                        <select class="select2" name="marital_status">
                                            <option
                                                value="Married" {{ old('marital_status') == 'Female' ? 'selected' : '' }}>
                                                {{ _trans('common.Married') }}
                                            </option>
                                            <option
                                                value="Single" {{ old('marital_status') == 'Single' ? 'selected' : '' }}>
                                                {{ _trans('common.Single') }}
                                            </option>
                                            <option
                                                value="Divorce" {{ old('marital_status') == 'Divorce' ? 'selected' : '' }}>
                                                {{ _trans('common.Divorce') }}
                                            </option>
                                        </select>
                                    </div>

                                    <div class="ot-contact-form mb-24 col-md-6 col-lg-4">
                                        <label class="ot-contact-label">
                                            {{ _trans('common.Occupation') }}
                                        </label>
                                        <input name="occupation" value="{{ old('occupation') }}"
                                               class="form-control ot-contact-input" type="text"
                                               placeholder="{{ _trans('common.Enter Occupation') }}"
                                               autocomplete="off">
                                        @error('occupation')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="ot-contact-form mb-24 col-md-6 col-lg-4">
                                        <label
                                            class="ot-contact-label">{{ _trans('common.Property owner') }}</label>
                                        <select class="select2" name="property_owner" id="input-property-owner">
                                            <option
                                                value="Individual" {{ old('property_owner') == 'Individual' ? 'selected' : '' }}>
                                                {{ _trans('common.Individual') }}
                                            </option>
                                            <option
                                                value="Organization" {{ old('property_owner') == 'Organization' ? 'selected' : '' }}>
                                                {{ _trans('common.Organization') }}
                                            </option>
                                            <option
                                                value="Joint" {{ old('property_owner') == 'Joint' ? 'selected' : '' }}>
                                                {{ _trans('common.Joint') }}
                                            </option>
                                        </select>
                                    </div>


                                    <div class="ot-contact-form mb-24 col-md-6 col-lg-4">
                                        <label class="ot-contact-label">
                                            {{ _trans('common.Current Address') }}
                                        </label>
                                        <input name="present_address" value="{{ old('present_address') }}"
                                               class="form-control ot-contact-input" type="text"
                                               placeholder="{{ _trans('common.Enter Current Address') }}"
                                               autocomplete="off">
                                        @error('present_address')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>


                                    <div class="ot-contact-form mb-24 col-md-6 col-lg-4">
                                        <label class="ot-contact-label">
                                            {{ _trans('common.Enter your Passport or ID Card NO') }}
                                            <span class="text-white">*</span>
                                        </label>
                                        <input name="passport" value="{{ old('passport') }}"
                                               class="form-control ot-contact-input" type="text"
                                               placeholder="{{ _trans('common.Enter your Passport or ID Card NO') }}"
                                               autocomplete="off" >
                                        @error('passport')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="ot-contact-form mb-24 col-md-6 col-lg-4">
                                        <label class="ot-contact-label">
                                            {{ _trans('common.SSNIT NO') }}
                                        </label>
                                        <input name="social_security_number"
                                               value="{{ old('social_security_number') }}"
                                               class="form-control ot-contact-input" type="text"
                                               placeholder="{{ _trans('common.Enter SSNIT NO') }}"
                                               autocomplete="off">
                                        @error('social_security_number')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="ot-contact-form mb-24 col-md-6 col-lg-4">
                                        <label class="ot-contact-label">{{ _trans('common.Profile Image') }}</label>
                                        <input class="form-control ot-contact-input" type="file" name="image">
                                    </div>

                                    <div class="ot-contact-form mb-24 col-md-6 col-lg-4">
                                        <label class="ot-contact-label">{{ _trans('common.Tin Number') }}</label>
                                        <input class="form-control ot-contact-input" type="text" name="tin_number">
                                    </div>
                                    <div class="ot-contact-form mb-24 col-md-6 col-lg-4">
                                        <label class="ot-contact-label">
                                            {{ _trans('common.Password') }}
                                            <span class="text-white">*</span>
                                        </label>
                                        <input name="password" class="form-control ot-contact-input" type="password"
                                               placeholder="{{ _trans('common.Enter your password') }}"
                                               autocomplete="off">
                                        @error('password')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="col-md-12 d-none" id="organization-section">
                                        <hr class="border border-2">
                                        <div class="row">
                                            {{-- Organization name --}}
                                            <div class="col-md-6">
                                                <div class="ot-contact-form mb-24">
                                                    <label
                                                        class="ot-contact-label">{{ _trans('common.Name of Organization') }}</label>
                                                    <span class="text-white">*</span>
                                                    <input class="form-control ot-contact-input" type="text"
                                                           name="organization_name"
                                                           value="{{ old('organization_name') }}"
                                                           placeholder="{{ _trans('common.Organisation Name') }}">
                                                    @error('organization_name')
                                                    <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            {{--Organization tin number --}}
                                            <div class="col-md-6">
                                                <div class="ot-contact-form mb-24">
                                                    <label
                                                        class="ot-contact-label">{{ _trans('common.Organisation Tin Number') }}</label>
                                                    <span class="text-white">*</span>
                                                    <input class="form-control ot-contact-input" type="text"
                                                           name="organization_tin_number"
                                                           value="{{ old('organization_tin_number') }}"
                                                           placeholder="{{ _trans('common.Organisation Tin Number') }}">

                                                    @error('organization_tin_number')
                                                    <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            {{-- Type --}}
                                            <div class="col-md-6">
                                                <div class="ot-contact-form mb-24">
                                                    <label
                                                        class="ot-contact-label">{{ _trans('common.Type') }}</label>
                                                    <span class="text-white">*</span>
                                                    <select class="select2" name="organization_type">
                                                        <option
                                                            value="Sole Proprietorship" {{ old('organization_type') == 'Sole Proprietorship' ? 'selected' : '' }}>
                                                            {{ _trans('common.Sole Proprietorship') }}
                                                        </option>
                                                        <option
                                                            value="Limited" {{ old('organization_type') == 'Limited' ? 'selected' : '' }}>
                                                            {{ _trans('common.Limited') }}
                                                        </option>
                                                        <option
                                                            value="LBG" {{ old('organization_type') == 'LBG' ? 'selected' : '' }}>
                                                            {{ _trans('common.LBG') }}
                                                        </option>
                                                    </select>
                                                </div>
                                                @error('organization_type')
                                                <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            {{--Organization Tin number --}}
                                            <div class="col-md-6">
                                                <div class="ot-contact-form mb-24">
                                                    <label
                                                        class="ot-contact-label">{{ _trans('common.Director Details') }}</label>
                                                    <input class="form-control ot-contact-input"
                                                           type="text"
                                                           name="director_details"
                                                           value="{{ old('director_details') }}"
                                                           placeholder="{{ _trans('common.Director Details') }}"
                                                    >
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            {{-- incorporation_attachment_id --}}
                                            <div class="col-md-6">
                                                <div class="ot-contact-form mb-24">
                                                    <label
                                                        class="ot-contact-label">{{ _trans('common.Incorporation Attachment') }}</label>
                                                    <input class="form-control ot-contact-input" type="file"
                                                           name="incorporation_attachment">
                                                </div>
                                            </div>
                                            {{--Organization Tin number --}}
                                            <div class="col-md-6">
                                                <div class="ot-contact-form mb-24">
                                                    <label
                                                        class="ot-contact-label">{{ _trans('common.Business Attachment') }}</label>
                                                    <input class="form-control ot-contact-input" type="file"
                                                           name="business_attachment">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="ot-contact-form mb-24 col-md-6 col-lg-4">
                                        <label class="ot-contact-label">
                                            {{ _trans('common.Confirm Password') }}
                                            <span class="text-white">*</span>
                                        </label>
                                        <input name="confirm_password" class="form-control ot-contact-input"
                                               type="password"
                                               placeholder="{{ _trans('common.Confirm your password') }}"
                                               autocomplete="off">
                                        @error('confirm_password')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-md-5 d-flex justify-content-cente align-item-center">
                                        <div class="remember-me terms-condition  m-lg-0">
                                            <label>
                                                <input name="agree_with" class="ot-checkbox" type="checkbox"
                                                       checked>
                                                <small>{{ _trans('common.I agree to all the') }}
                                                    <a href="{{ route('terms') }}"
                                                       target="_blank"><span> {{ _trans('common.Terms') }}</span></a> {{ _trans('common.and') }}
                                                    <a href="{{ route('privacy') }}"
                                                       target="_blank"><span> {{ _trans('common.Privacy policy') }}</span></a>
                                                </small>
                                                <span class="ot-checkmark"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <button
                                            class="btn-primary-submit w-100">{{ _trans('common.Sign up') }}</button>
                                    </div>
                                    <div class="login-footer">
                                        <div class="create-account">
                                            <p>{{ _trans('common.Already have an account?') }}
                                                <a href="{{ route('login') }}"><span>{{ _trans('common.Log In') }}</span></a>
                                            </p>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End-of Login -->
    </main>

@endsection

@push('script')
    <script>
        var inputPropertyWwner = $("#input-property-owner");
        var organizationSection = $("#organization-section");

        if (inputPropertyWwner.val() === "Organization") {
            organizationSection.removeClass("d-none");
        }

        inputPropertyWwner.change(function () {
            var value = $(this).val()
            if (value === "Organization") {
                organizationSection.removeClass("d-none");
            } else {
                organizationSection.addClass("d-none");
            }
        });
    </script>

    <script>
        $(document).ready(function() {
            var currentStep = 1;

            $('.next-step').click(function() {
                $('.step.active').removeClass('active');
                currentStep++;
                $('.step:nth-child(' + currentStep + ')').addClass('active');

            });
            $('.prev-step').click(function() {
                $('.step.active').removeClass('active');
                currentStep--;
                $('.step:nth-child(' + currentStep + ')').addClass('active');
            });

        });
    </script>
@endpush
