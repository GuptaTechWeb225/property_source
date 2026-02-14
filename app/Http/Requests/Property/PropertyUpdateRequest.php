<?php

namespace App\Http\Requests\Property;

use Illuminate\Foundation\Http\FormRequest;

class PropertyUpdateRequest extends FormRequest
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
        // return [
        //     "name"              => 'required',
        //     "size_of_property"  => 'required',
        //     "property_type"     => 'required',
        //     "property_category" =>'required',
        //     "address"           => 'required',
        //     "country"           => 'required',
        //     "division"          => 'required',
        //     "district"          => 'required',
        //     "upazila"           => 'required',
        //     "completion"        => 'required',
        //     'image'             => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        //     "Description"       => 'required',
        // ];
    }
}
