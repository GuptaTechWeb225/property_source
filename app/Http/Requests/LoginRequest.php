<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class LoginRequest extends FormRequest
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
        $required = '';
        if(setting('recaptcha_status')):
            $required = 'required';
        endif;


        return [
            'email' => ['required'],
            'password' => ['required'],
            'rememberMe' => ['nullable'],
            'g-recaptcha-response' => "$required",
        ];
    }

    /**
     * Get custom error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages()
    {
        return [
            'email.required'                => _trans('validation.The email field is required.'),
            'email.email'                   => _trans('validation.Please enter a valid email address.'),
            'password.required'             => _trans('validation.The password field is required.'),
            'g-recaptcha-response.required' => _trans('validation.Please complete the reCAPTCHA verification.'),
        ];
    }
}
