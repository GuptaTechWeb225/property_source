<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AboutRequest extends FormRequest
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
            'title_one' => 'required',
            'subtitle_one' => 'required',
            'desc_one' => 'required',
            'image_id_one' => 'mimes:jpeg,png,jpg',
            'title_two' => 'required',
            'subtitle_two' => 'required',
            'desc_two' => 'required',
            'image_id_two' => 'mimes:jpeg,png,jpg',
            'title_three' => 'required',
            'subtitle_three' => 'required',
            'desc_three' => 'required',
            'image_id_three' => 'mimes:jpeg,png,jpg',
            'title_four' => 'required',
            'subtitle_four' => 'required',
            'desc_four' => 'required',
            'image_id_four' => 'mimes:jpeg,png,jpg',
            'title_five' => 'required',
            'subtitle_five' => 'required',
            'desc_five' => 'required',
            'download_app_link' => 'required',
            'image_id_five' => 'mimes:jpeg,png,jpg',
        ];
    }
}
