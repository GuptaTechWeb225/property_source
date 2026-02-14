<?php

namespace App\Http\Requests\Property;

use Illuminate\Foundation\Http\FormRequest;

class PropertyStoreRequest extends FormRequest
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
        $rules = [
            "name" => 'required',
            "size_of_property" => 'required|integer',
            "property_type" => 'required|integer',
            "property_category" => 'required|integer',
            "address" => 'required',
            "rent_amount" => 'integer',
            "country_id" => 'required',
            "completion" => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg,webp|max:2048',
            "description" => 'required'
        ];

        if ($this->property_category != 6){
            $rules['bedroom'] = 'required|integer';
            $rules['bathroom'] = 'required|integer';
        }

        return $rules;
    }
}
