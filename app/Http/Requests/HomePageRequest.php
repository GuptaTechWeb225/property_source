<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Symfony\Contracts\Service\Attribute\Required;

class HomePageRequest extends FormRequest
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
            'business_model_title'          => 'required',
            'business_model_description'    => 'required',
            'business_model_link'           => 'required',
            'feature_title'                 => 'required',
            'feature_description'           => 'required',
            'howitworks_title'              => 'required',
            'howitworks_description'        => 'required',
            'app_store_link'                => 'required',
            'play_store_link'               => 'required',
            'testimonial_title'             => 'required',
            'testimonial_description'       => 'required',
            'blogs_title'                   => 'required',
            'blogs_description'             => 'required',
        ];
    }
}
