<?php

namespace Modules\Nestkeeper\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email'     => 'required',
            'password'  => 'required'
        ];

    }

    public function messages()
    {
        return [
            'email.required'        => _trans('landlord.Email/Phone is required!'),
            'password.required'     => _trans('landlord.Password is required'),
        ];
    }

    public function authorize()
    {
        return true;
    }
}
