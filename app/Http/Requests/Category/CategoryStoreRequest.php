<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;

class CategoryStoreRequest extends FormRequest
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
            'title' => 'required|max:91',
            'subtitle' => 'required|max:91',
            'description' => 'required',
            'short_description' => 'required',
            'slug' => 'required',
            'image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'icon' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'status' => 'required',
        ];
    }
}
