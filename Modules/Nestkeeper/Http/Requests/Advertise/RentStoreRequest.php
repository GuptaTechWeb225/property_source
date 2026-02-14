<?php

namespace Modules\Nestkeeper\Http\Requests\Advertise;

use Illuminate\Foundation\Http\FormRequest;

class RentStoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'advertisement_type'                    => 'required',
            'property_id'                           => 'required',
            'booking_amount'                        => 'required',
            'rent_amount'                           => 'required',
            'rent_type'                             => 'required',
            'rent_start_date'                       => 'required',
            'rent_end_date'                         => 'required',
            'negotiable'                            => 'required',
            'status'                                => 'required',
        ];
    }



    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
