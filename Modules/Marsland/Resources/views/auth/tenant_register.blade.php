<div id="step1">
    <h4 class="mb-3">Step 1</h4>
    <div class="row">
        <div class="ot-contact-form mb-24 col-md-12">
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
        <div class="ot-contact-form mb-24 col-md-6">
            <label class="ot-contact-label">
                {{ _trans('common.Full Name') }}
                <span class="text-danger">*</span>
            </label>
            <input name="name" value="{{ old('name') }}"
                   class="form-control ot-contact-input" type="text"
                   placeholder="{{ _trans('common.Enter your full name') }}"
                   autocomplete="off">
            @error('name')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="ot-contact-form mb-24 col-md-6">
            <label class="ot-contact-label">
                {{ _trans('common.Email Address') }}
                <span class="text-danger">*</span>
            </label>
            <input name="email" value="{{ old('email') }}"
                   class="form-control ot-contact-input" type="text"
                   placeholder="{{ _trans('common.Enter your email') }}"
                   autocomplete="off">
            @error('email')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="ot-contact-form mb-24 col-md-6">
            <label class="ot-contact-label">
                {{ _trans('common.Phone') }}
                <span class="text-danger">*</span>
            </label>
            <input name="phone" value="{{ old('phone') }}"
                   class="form-control ot-contact-input" type="text"
                   placeholder="{{ _trans('common.Enter your Phone') }}"
                   autocomplete="off">
            @error('phone')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="ot-contact-form mb-24 col-md-6">
            <label class="ot-contact-label">
                {{ _trans('common.Date of Birth') }}
                <span class="text-danger">*</span>
            </label>
            <input name="date_of_birth" value="{{ old('date_of_birth') }}"
                   class="form-control ot-contact-input" type="date"
                   placeholder="{{ _trans('common.Enter Date of Birth') }}"
                   autocomplete="off">
            @error('date_of_birth')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="ot-contact-form mb-24 col-md-6">
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

        <div class="ot-contact-form mb-24 col-md-6">
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

        <div class="ot-contact-form mb-24 col-md-6">
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
    </div>
</div>
<div id="step2">
    <h4 class="mb-3">Step 2</h4>
    <div class="row">
        <div class="ot-contact-form mb-24 col-md-6">
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

        <div class="ot-contact-form mb-24 col-md-6">
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


        <div class="ot-contact-form mb-24 col-md-6">
            <label class="ot-contact-label">
                {{ _trans('common.Enter your Passport or ID Card NO') }}
                <span class="text-danger">*</span>
            </label>
            <input name="passport" value="{{ old('passport') }}"
                   class="form-control ot-contact-input" type="text"
                   placeholder="{{ _trans('common.Enter your Passport or ID Card NO') }}"
                   autocomplete="off">
            @error('passport')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="ot-contact-form mb-24 col-md-6">
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

        <div class="ot-contact-form mb-24 col-md-6">
            <label class="ot-contact-label">{{ _trans('common.Profile Image') }}</label>
            <input class="form-control ot-contact-input" type="file" name="image">
        </div>

        <div class="ot-contact-form mb-24 col-md-6">
            <label class="ot-contact-label">{{ _trans('common.Tin Number') }}</label>
            <input class="form-control ot-contact-input" type="text" name="tin_number">
        </div>
        <div class="ot-contact-form mb-24 col-md-6">
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
    </div>
</div>

<div class="mt-3">
    <button type="button" class="btn btn-secondary" id="prevButton" onclick="prevStep()">{{ _trans('landlord.Previous') }}</button>
    <button type="button" class="btn btn-primary" onclick="nextStep()">{{ _trans('landlord.Next') }}</button>
</div>
