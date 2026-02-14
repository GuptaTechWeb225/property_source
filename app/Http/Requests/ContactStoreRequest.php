<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactStoreRequest extends FormRequest
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
        return [
            'reason' => 'required' ,
            'f_name' => 'required' ,
            'l_name' => 'required' ,
            'email' => 'required' ,
            'phone_number' => 'required' ,
            'message' => 'required' ,
        ];
    }

    public function messages()
    {
        return [
            'f_name.required' => 'First Name is required',
            'l_name.required' => 'Last Name is required'
        ];
    }
}
