<?php

namespace App\Http\Requests\Advertisement;

use App\Enums\DealType;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class AdvertisementStoreRequest extends FormRequest
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
        $advertisement_type = $this->input('advertisement_type');
        $property_id = $this->input('property_id');

        $rules = [
            'advertisement_type' => 'required',
            'property_id' => ['required'],
            'booking_amount' => 'required|numeric|min:0',
        ];

        if ($advertisement_type == DealType::RENT) {
            $rules['max_member'] = 'required|numeric|min:1';
            $rules['rent_amount'] = 'required|numeric|min:0';
            $rules['rent_type'] = 'required|string';
            $rules['rent_start_date'] = 'required|date';
            $rules['rent_end_date'] = 'required|date|after:rent_start_date';
        } elseif ($advertisement_type == DealType::SELL) {
            $rules['sell_amount'] = 'required|numeric|min:0';
            $rules['sell_start_date'] = 'required|date';
        } elseif ($advertisement_type == DealType::MORTGAGE) {
            $rules['mortgage_duration'] = 'required';
            $rules['mortgage_amount'] = 'required';
        } elseif ($advertisement_type == DealType::LEASE) {
            $rules['lease_duration'] = 'required';
            $rules['lease_amount'] = 'required';
        }

        return $rules;
    }
}
