<?php

namespace App\Http\Requests\Committee;

use Illuminate\Foundation\Http\FormRequest;

class CommitteeStoreRequest extends FormRequest
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
            'property_id' => 'required',
            'name' => 'required|max:91',
            'phone' => 'required',
            'email' => 'required|email|unique:committees,email',
            'status' => 'required',
            'member_id.*' => 'required',
        ];
    }
}
