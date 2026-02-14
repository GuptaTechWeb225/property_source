<?php

namespace Modules\Nestkeeper\Http\Requests\Settings;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    public function rules()
    {
        return [
            'address'       => 'required',
            'country_id'    => 'required',
            'division_id'    => 'required',
            'district_id'    => 'required',
            'upazila_id'    => 'required',
            'postal'        => 'required',
        ];

    }

    public function messages()
    {
        return [
            'address.required'          => _trans('landlord.Address is required!'),
            'country_id.required'       => _trans('landlord.Country Id is required'),
            'division_id.required'       => _trans('landlord.Division Id is required'),
            'district_id.required'       => _trans('landlord.District Id is required'),
            'upazila_id.required'       => _trans('landlord.Upazila Id is required'),
            'postal.required'           => _trans('landlord.Postal Code is required'),
        ];
    }

    public function authorize()
    {
        return true;
    }
}
