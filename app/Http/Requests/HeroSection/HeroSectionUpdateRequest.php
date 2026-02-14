<?php

namespace App\Http\Requests\HeroSection;

use Illuminate\Foundation\Http\FormRequest;

class HeroSectionUpdateRequest extends FormRequest
{
    /**
     * Determine if the HeroSection is authorized to make this request.
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
            'title' => 'required|max:91',
            'highlight_title_one' => 'required|max:91',
            'btn_one' => 'required|max:91',
            'image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'status' => 'required',
        ];
    }

    public function messages()
    {
    return [
        'image.max' => 'The image size must not exceed 2048 KB.',
        'btn_one.required' => 'The Link field is required.',
    ];
    }
}
