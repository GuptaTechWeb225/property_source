<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        if($this->role_id == 4){
            $roles = [
                'name'                    => 'required',
                'email'                   => 'required|unique:users,email,' . $this->id,
                'phone'                   => 'required|unique:users,phone,' . $this->id,
                'password'                => 'required|same:confirm_password',
                'confirm_password'        => 'required',
            ];
        }else{
            $roles = [
                'name'                    => 'required',
                'email'                   => 'required|unique:users,email,' . $this->id
            ];
        }

        if (!empty(env('NOCAPTCHA_SITEKEY')) && !empty(env('NOCAPTCHA_SECRET'))){
            $roles['g-recaptcha-response'] ='required|captcha';
        }

        return $roles;
    }

    public function messages()
    {
        return [
            'name.required'                       => _trans('validation.The name field is required.'),
            'passport.required'                   => _trans('validation.National Id or Passport is required.'),
            'email.required'                      => _trans('validation.The email field is required.'),
            'email.unique'                        => _trans('validation.The email has already been taken.'),
            'phone.required'                      => _trans('validation.The phone number field is required.'),
            'phone.unique'                        => _trans('validation.The phone number has already been taken.'),
            'date_of_birth.required'              => _trans('validation.The date of birth field is required.'),
            'password.required'                   => _trans('validation.The password field is required.'),
            'password.same'                       => _trans('validation.The password and confirmation password must match.'),
            'confirm_password.required'           => _trans('validation.The confirmation password field is required.'),
            'organization_name.required_if'       => _trans('validation.The organization name field is required.'),
            'organization_tin_number.required_if' => _trans('validation.The organization tin number field is required.'),
            'organization_type.required_if'       => _trans('validation.The organization type field is required.'),
            'g-recaptcha-response.required'       => _trans('validation.Please complete the reCAPTCHA verification'),
        ];
    }
}
