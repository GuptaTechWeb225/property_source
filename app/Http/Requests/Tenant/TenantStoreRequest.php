<?php

namespace App\Http\Requests\Tenant;

use App\Traits\ApiReturnFormatTrait;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;

class TenantStoreRequest extends FormRequest
{
    use ApiReturnFormatTrait;
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
    public function rules(Request $r)
    {
        return [
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'phone' =>  'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|unique:users,phone',
            'password' => 'required|min:6|confirmed',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'The email field is required.',
            'email.unique' => 'This email has already been taken',
            'phone.required' => 'The phone number field is required.',
            'phone.unique' => 'This phone number has already been used',
            'phone.regex' => 'The phone number format is invalid.',
            'phone.min' => 'The phone number must be at least 10 digits.',
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException($this->responseWithError('Request validation fail',$validator->errors()));
    }

}
