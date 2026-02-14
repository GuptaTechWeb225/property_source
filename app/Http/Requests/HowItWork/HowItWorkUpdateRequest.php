<?php

namespace App\Http\Requests\HowItWork;

use Illuminate\Foundation\Http\FormRequest;

class HowItWorkUpdateRequest extends FormRequest
{
    /**
     * Determine if the HowItWork is authorized to make this request.
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
            'title' => 'required',
            'message' => 'required',
            'image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'status' => 'required',
        ];
    }
}
