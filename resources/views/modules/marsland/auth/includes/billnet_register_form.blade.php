<div id="step1" class="step">
    <h4 class="mb-3">Step 1</h4>
    <div class="row">
        <div class="ot-contact-form mb-2 col-md-12">
            <label class="ot-contact-label">{{ _trans('common.Account Type') }} <span
                    class="text-danger">*</span>
            </label>
            <select required class="select2" name="property_owner" id="input-property-owner" onchange="accountTypeChangeHandler(this.value)">
                <option value="Individual" {{ request('account_type') == 'Individual' ? 'selected' : '' }}>
                    {{ _trans('common.Individual') }}
                </option>
                <option value="Organization" {{ request('account_type') == 'Organization' ? 'selected' : '' }}>
                    {{ _trans('common.Organization') }}
                </option>
                <option value="Joint" {{ request('account_type') == 'Joint' ? 'selected' : '' }}>
                    {{ _trans('common.Joint') }}
                </option>
            </select>
        </div>

        <div class="ot-contact-form mb-2 col-md-6">
            <label class="ot-contact-label">{{ _trans('common.Name') }}<span class="text-danger">*</span></label>
            <input name="name" value="{{ old('name') }}" class="form-control ot-contact-input" type="text"
                   placeholder="{{ _trans('common.Enter your full name') }}" autocomplete="off">
            @error('name')<p class="text-danger">{{ $message }}</p>@enderror
        </div>

        <div class="ot-contact-form mb-2 col-md-6">
            <label class="ot-contact-label">{{ _trans('common.Email Address') }}
                <span class="text-danger">*</span>
            </label>
            <input name="email" value="{{ old('email') }}" class="form-control ot-contact-input" type="text"
                   placeholder="{{ _trans('common.Enter your email') }}" autocomplete="off">
            <small><a href="https://accounts.google.com/" target="_blank" class="text-danger font-size-7">Create a gmail
                    account</a></small>
            @error('email')<p class="text-danger">{{ $message }}</p>@enderror
        </div>

        <div class="ot-contact-form mb-2 col-md-6">
            <label class="ot-contact-label">{{ _trans('common.Phone') }}<span class="text-danger">*</span></label>
            <input name="phone" value="{{ old('phone') }}" class="form-control ot-contact-input" type="text"
                   placeholder="{{ _trans('common.Enter your Phone') }}" autocomplete="off">
            @error('phone')<p class="text-danger">{{ $message }}</p>@enderror
        </div>

        @if(request('account_type')  == 'Joint' || request('account_type')  == 'Individual')
        <div class="ot-contact-form mb-2 col-md-6">
            <label class="ot-contact-label">{{ _trans('common.Date of Birth') }}<span
                    class="text-danger">*</span></label>
            <input name="date_of_birth" value="{{ old('date_of_birth') }}" class="form-control ot-contact-input"
                   type="date" placeholder="{{ _trans('common.Enter Date of Birth') }}" autocomplete="off">
            @error('date_of_birth')<p class="text-danger">{{ $message }}</p>@enderror
        </div>

            <div class="ot-contact-form mb-2 col-md-6">
                <label class="ot-contact-label">{{ _trans('common.Nationality') }}</label>
                <select class="select2" name="nationality" onchange="nationalityChanageHandler(this.value)">
                    <option value="Ghanaian" {{ old('nationality') == 'Ghanaian' ? 'selected' : '' }}>
                        {{ _trans('common.Ghanaian') }}
                    </option>
                    <option value="Dual" {{ old('nationality') == 'Dual' ? 'selected' : '' }}>
                        {{ _trans('common.Dual') }}
                    </option>
                    <option value="Foreigner" {{ old('nationality') == 'Foreigner' ? 'selected' : '' }}>
                        {{ _trans('common.Foreigner') }}
                    </option>
                </select>
            </div>

            <div class="ot-contact-form mb-2 col-md-6" id="country__for__dual__foreigner">
                <label class="ot-contact-label">{{ _trans('common.Country') }}</label>
                <select class="select2 __country__for__nationality" name="country_id">
                    @foreach($data['countries'] as $country)
                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                    @endforeach
                </select>
            </div>
        @endif

        @if(request('account_type')  == 'Organization')
            <div class="ot-contact-form mb-2 col-md-6">
                <label class="ot-contact-label">Reg. No.<span class="text-danger">*</span></label>
                <input name="reg_no" value="{{ old('reg_no') }}" class="form-control ot-contact-input" type="text" autocomplete="off">
                @error('reg_no')<p class="text-danger">{{ $message }}</p>@enderror
            </div>
        @endif
    </div>
</div>


<div id="step2" class="step">
    <h4 class="mb-3">Step 2</h4>
    <div class="row">
        <div class="ot-contact-form mb-2 col-md-6">
            <label class="ot-contact-label">{{ _trans('common.Profile Image') }}</label>
            <input class="form-control ot-contact-input" type="file" name="image">
            <small>Passport Sized</small>
        </div>

        <div class="ot-contact-form mb-2 col-md-12">
            <label class="ot-contact-label">Ghana Card No., Passport No., NIN, Foreigner ID<span
                    class="text-danger">*</span></label>
            <input name="ghana_card_or_id" value="{{ old('ghana_card_or_id') }}" class="form-control ot-contact-input"
                   type="text" autocomplete="off">
            @error('date_of_birth')<p class="text-danger">{{ $message }}</p>@enderror
        </div>

        <div class="ot-contact-form mb-2 col-md-6">
            <label class="ot-contact-label">{{ _trans('common.ID front') }} <span
                    class="text-danger">*</span></label>
            <input class="form-control ot-contact-input" type="file" name="idcard_front">
        </div>

        <div class="ot-contact-form mb-2 col-md-6">
            <label class="ot-contact-label">{{ _trans('common.ID back') }} <span
                    class="text-danger">*</span></label>
            <input class="form-control ot-contact-input" type="file" name="idcard_back">
        </div>
        @if(request('account_type')  == 'Joint' || request('account_type')  == 'Organization')
            <div class="ot-contact-form mb-2 col-md-6">
                <label class="ot-contact-label">{{ _trans('common.TIN') }} <span class="text-danger">*</span></label>
                <input class="form-control ot-contact-input" type="text" name="tin_number">
            </div>
        @endif
    </div>
</div>


<div id="step3" class="step">
    <h4 class="mb-3">Step 3</h4>
    <div class="col-md-12">
        <div class="row">
            <div class="ot-contact-form mb-2 col-md-6">
                <label class="ot-contact-label">{{ _trans('common.House Number') }}<span class="text-danger">*</span></label>
                <input class="form-control ot-contact-input" type="text" name="house_number" value="{{ old('organization_name') }}">
                @error('house_number') <p class="text-danger">{{ $message }}</p> @enderror
            </div>

            <div class="ot-contact-form mb-2 col-md-6">
                <label class="ot-contact-label">
                    {{ _trans('common.Region') }}
                </label>
                <input name="religion" value="{{ old('occupation') }}"
                       class="form-control ot-contact-input" type="text"
                       autocomplete="off">
                @error('religion')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="ot-contact-form mb-2 col-md-6">
                <label class="ot-contact-label">
                    Municipal/District
                </label>
                <input name="occupation" value="{{ old('occupation') }}" class="form-control ot-contact-input" type="text">
                @error('occupation')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="ot-contact-form mb-2 col-md-6">
                <label class="ot-contact-label">
                    P. O./PMB Number
                </label>
                <input name="present_address" value="{{ old('post_office_no') }}"
                       class="form-control ot-contact-input" type="text"
                       autocomplete="off">
                @error('post_office_no')
                 <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="ot-contact-form mb-2 col-md-12 mb-4">
                <label class="ot-contact-label">{{ _trans('common.Digital Address') }} <span class="text-danger">*</span></label>
                <input class="form-control ot-contact-input" type="text" name="address" value="{{ old('address') }}">
                @error('address') <p class="text-danger">{{ $message }}</p> @enderror
            </div>

            <div class="ot-contact-form mb-2 col-md-6">
                <label class="ot-contact-label">
                    {{ _trans('common.Password') }}
                    <span class="text-danger">*</span>
                </label>
                <input name="password" class="form-control ot-contact-input" type="password"
                       placeholder="{{ _trans('common.Enter your password') }}"
                       autocomplete="off">
                @error('password')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="ot-contact-form mb-2 col-md-6">
                <label class="ot-contact-label">
                    {{ _trans('common.Confirm Your Password') }}
                    <span class="text-danger">*</span>
                </label>
                <input name="confirm_password" class="form-control ot-contact-input" type="password"
                       placeholder="{{ _trans('common.Enter your password') }}"
                       autocomplete="off">
                @error('confirm_password')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>
    </div>
</div>

@push('script')

@endpush
