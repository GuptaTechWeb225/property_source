<?php

namespace App\Http\Requests\CommitteeMember;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'user_id' => 'required|unique:committee_members,user_id,NULL,id,committee_id,' . $this->input('committee_id'),
            'committee_id' => 'required',
            'member_type' => 'required',
        ];
    }

}
