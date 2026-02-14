<?php

namespace Modules\LiveChat\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MessageRequest extends FormRequest
{
    public function rules()
    {
        return [
            'message' => 'required:max:600',
        ];
    }

    public function authorize()
    {
        return true;
    }

    public function messages()
    {
        return [
            'message.required' => _trans('validation.message_is_required'),
            'message.max'      => _trans('validation.message_must_be_less_than_600_characters')
        ];
    }
}
