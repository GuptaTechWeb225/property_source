<?php

namespace App\Http\Requests\Payment;

use Illuminate\Foundation\Http\FormRequest;

class PaymentStoreRequest extends FormRequest
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
            'order_detail_id' => 'required|numeric',
            'property_id' => 'required|numeric',
            'tenant_id' => 'required|numeric',
            'payable_amount' => 'required|numeric|min:0',
            'payment_amount' => 'required|numeric|min:0|max:' . $this->payable_amount,
            'due_amount' => 'required|numeric|min:0',
        ];
    }
}
