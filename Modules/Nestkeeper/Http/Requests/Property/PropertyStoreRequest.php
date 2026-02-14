<?php

namespace Modules\Nestkeeper\Http\Requests\Property;

use Illuminate\Foundation\Http\FormRequest;

class PropertyStoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'                  => 'required',
            'deal_type'             => 'required',
            'address'               => 'required',
            'size'                  => 'required',
            'bedroom'               => 'required',
            'bathroom'              => 'required',
            'property_category_id'  => 'required',
            'default_image'         => 'required',
        ];

    }



    public function authorize()
    {
        return true;
    }
}
