<?php

namespace Modules\Nestkeeper\Http\Requests\Property;

use Illuminate\Foundation\Http\FormRequest;

class DeleteBookRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'user_id'                  => 'required',
            'property_id'              => 'required',
            'advertisement_type'       => 'required',
        ];

    }

    public function messages(){
        return [
            'user_id.required'               => 'User Id is required',
            'property_id.required'           => 'Property Id is required',
            'advertisement_type.required'    => 'Advertisement type is required',
        ];
    }



    public function authorize()
    {
        return true;
    }
}
