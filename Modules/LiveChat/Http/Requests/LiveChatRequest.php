<?php

namespace Modules\LiveChat\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LiveChatRequest extends FormRequest
{
    public function rules()
    {
        return [
            'pusher_app_id'      => 'required|max:255',
            'pusher_app_key'     => 'required|max:255',
            'pusher_app_secret'  => 'required|max:255',
            'pusher_app_cluster' => 'required|max:255',
        ];
    }

    public function authorize()
    {
        return true;
    }

    public function messages()
    {
        return [
            'pusher_app_id.required'      => _trans('validation.pusher_app_id_is_required'),
            'pusher_app_id.max'           => _trans('validation.pusher_app_id_must_not_be_greater_than_255_characters'),
            'pusher_app_key.required'     => _trans('validation.pusher_app_key_is_required'),
            'pusher_app_key.max'          => _trans('validation.pusher_app_key_must_not_be_greater_than_255_characters'),
            'pusher_app_secret.required'  => _trans('validation.pusher_app_secret_is_required'),
            'pusher_app_secret.max'       => _trans('validation.pusher_app_secret_must_not_be_greater_than_255_characters'),
            'pusher_app_cluster.required' => _trans('validation.pusher_app_cluster_is_required'),
            'pusher_app_cluster.max'      => _trans('validation.pusher_app_cluster_must_not_be_greater_than_255_characters'),
        ];
    }
}
