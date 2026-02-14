@extends('marsland::layouts.customer')
@section('title', _trans('common.Setting'))

@section('customer-content')
    <div class="sidebar-content-wrap flex-fill ot-card white-bg border-0">
        <div class="row">
            <div class="col-xl-12">

                <!-- Student Setting TAB -->
                <ul class="nav course-details-tabs setting-tab mb-20" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="one-tab" data-bs-toggle="tab" data-bs-target="#one"
                                type="button" role="tab" aria-controls="one" aria-selected="true">
                            <i class="ri-user-add-line"></i>
                            <span>{{ _trans('common.Edit Profile') }}</span>
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="two-tab" data-bs-toggle="tab" data-bs-target="#two" type="button"
                                role="tab" aria-controls="two" aria-selected="false">
                            <i class="ri-lock-line"></i>
                            <span>{{ _trans('common.Change Password') }}</span>
                        </button>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="one" role="tabpanel" aria-labelledby="one-tab">

                        <!-- General info start -->
                        <form action="{{ route('customer.profile.update') }}" class="settings-general-info"
                              method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- Section Tittle -->
                            <div class="row">
                                <div class="small-tittle-two border-bottom mb-20 pb-8">
                                    <h4 class="title text-capitalize font-600">{{ _trans('common.Personal Info') }}</h4>
                                </div>
                                <div class="col-xl-6 col-lg-6">
                                    <!-- Personal Info -->
                                    <div class="ot-contact-form mb-24">
                                        <label class="ot-contact-label">{{ _trans('common.Your Name') }}</label>
                                        <input class="form-control ot-contact-input" type="text"
                                               value="{{ $user->name }}" name="name"
                                               placeholder="{{ _trans('common.Your Name') }}">
                                        @error('name')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6">
                                    <div class="ot-contact-form mb-24">
                                        <label class="ot-contact-label">{{ _trans('common.Email') }}</label>
                                        <input class="form-control ot-contact-input disabled bg-light" type="email"
                                               value="{{ $user->email }}" disabled>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6">
                                    <div class="ot-contact-form mb-24">
                                        <label class="ot-contact-label">{{ _trans('common.Phone') }}</label>
                                        <input class="form-control ot-contact-input disabled bg-light" type="text"
                                               value="{{ $user->phone }}" disabled>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6">
                                    <div class="ot-contact-form mb-24">
                                        <label class="ot-contact-label">{{ _trans('common.Date of birth') }}</label>
                                        <input class="form-control ot-contact-input" type="date" name="date_of_birth"
                                               value="{{ $user->date_of_birth }}">
                                        @error('date_of_birth')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6">
                                    <div class="ot-contact-form mb-24">
                                        <label class="ot-contact-label">{{ _trans('common.Occupation') }}</label>
                                        <input class="form-control ot-contact-input" type="text" name="occupation"
                                               value="{{ $user->occupation }}">
                                        @error('occupation')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xl-12 col-lg-12">
                                    <div class="row align-items-center">
                                        <div class="col-lg-8">
                                            <div class="ot-contact-form mb-24">
                                                <label class="ot-contact-label">{{ _trans('common.Personal Code') }}</label>
                                                <input class="form-control ot-contact-input" placeholder="G-5464343" type="text"
                                                       name="personal_code" id="personalCode" value="{{ $user->personal_code }}">
                                                @error('personal_code')
                                                <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                                <p class="mt-2 mb-0"><i
                                                        class="ri-information-line text-danger"></i> {{ _trans('common.Anyone can find you by using your personal code') }}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 mb-4">
                                            <button class="btn btn-light" type="button" onclick="generateCode()" title="Generate Code"><i class="ri-refresh-line"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12 col-lg-12">
                                    <!-- Address -->
                                    <div class="small-tittle-two border-bottom mb-20 pb-8 pt-24">
                                        <h4 class="title text-capitalize font-600">{{ _trans('common.Address') }}</h4>
                                    </div>
                                    <div class="ot-contact-form mb-24">
                                        <label class="ot-contact-label">{{ _trans('common.Address') }}</label>
                                        <input class="form-control ot-contact-input" type="text" name="address"
                                               value="{{ $user->address }}">
                                    </div>

                                    <div class="ot-contact-form mb-24">
                                        <label class="ot-contact-label">{{ _trans('common.Country') }}</label>
                                        <!-- Select2 -->
                                        <select class="select2" name="country_id" id="country"
                                                onchange="fetchCities(this.value)">
                                            @foreach ($countries as $country)
                                                <option value="">{{ _trans('common.Select') }}</option>
                                                <option
                                                    value="{{ $country->id }}" {{ $country->id == $user->country_id ? "selected" : '' }}>
                                                    {{ $country->name }}
                                                </option>
                                            @endforeach
                                            @error('country_id')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </select>
                                    </div>
                                    <div class="ot-contact-form mb-24">
                                        <label class="ot-contact-label">{{ _trans('common.City') }}</label>
                                        <!-- Select2 -->
                                        <select class="select2" name="city_id" id="city">
                                            <option value="">{{ _trans('common.Select') }}</option>
                                            @error('city_id')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </select>
                                    </div>
                                    <div class="ot-contact-form mb-24">
                                        <label class="ot-contact-label">{{ _trans('common.Profile Image') }}</label>
                                        <input class="form-control ot-contact-input" type="file" name="image">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="d-flex gap-10 mt-10">
                                        <button class="btn-primary-fill"
                                                type="submit">{{ _trans('common.Update') }}</button>
                                    </div>
                                </div>

                            </div>
                        </form>
                        <!-- General info end -->
                    </div>
                    <div class="tab-pane fade" id="two" role="tabpanel" aria-labelledby="two-tab">
                        <!-- Security -->
                        <form action="{{ route('customer.password.update') }}" class="Security" method="POST">
                            @csrf

                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="ot-contact-form mb-24">
                                        <label class="ot-contact-label">{{ _trans('common.Old Password') }}</label>
                                        <input class="form-control ot-contact-input mb-10" type="password"
                                               name="old_password"
                                               placeholder="{{ _trans('common.Enter your old password') }}">
                                        @error('old_password')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="ot-contact-form mb-24">
                                        <label class="ot-contact-label">{{ _trans('common.New Passwords') }}</label>
                                        <input class="form-control ot-contact-input" type="password" name="password"
                                               placeholder="{{ _trans('common.Enter your new password') }}">
                                        @error('password')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="ot-contact-form mb-24">
                                        <label
                                            class="ot-contact-label">{{ _trans('common.Re-Enter Passwords') }}</label>
                                        <input class="form-control ot-contact-input" type="password"
                                               name="confirm_password"
                                               placeholder="{{ _trans('common.Re-Enter your password') }}">
                                        @error('confirm_password')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="d-flex gap-10 mt-20">
                                        <button class="btn-primary-fill"
                                                type="submit">{{ _trans('common.Update') }}</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- End-of Student Setting TAB -->
            </div>
        </div>
        <!-- end  -->
    </div>
@endsection
@push('script')
    <script>

        const  generateCode = () => {
            $.ajax({
                type: 'GET',
                url: '{{ route('customer.generatePersonalCode') }}',
                success: function (res) {
                    $('#personalCode').val(res)
                },
                error: function (error) {
                    console.error('Error fetching cities:', error);
                }
            });
        }



        const fetchCities = async () => {
            let country_id = $('#country').find('option:selected').val();
            let selected_city_id = $('#city').attr('selected-id');
            const url = `{{ route('fetch-cities') }}`;
            await $.ajax({
                type: 'GET',
                url: url,
                data: {
                    country_id
                },
                success: function ({status, message, data}) {
                    if (status) {
                        data.map(city => {
                            $('#presentAddressCity').append(
                                `<option value="${city.id}" ${selected_city_id == city.id ? 'selected' : ''}>${city.name}</option>`
                            )
                        });
                    }
                },
                error: function (error) {
                    console.error('Error fetching cities:', error);
                }
            });
        }
    </script>
@endpush
