<?php

namespace Modules\Nestkeeper\Http\Requests\Advertise;

use Illuminate\Foundation\Http\FormRequest;

class SellStoreRequest extends FormRequest
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
            'sell_amount'                           => 'required',
            'sell_start_date'                       => 'required',
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
