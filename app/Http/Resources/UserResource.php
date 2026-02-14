<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'list' => $this->collection->map(function ($data) {
                return [
                    'id' => @$data->id,
                    'name' => @$data->name,
                    'email' => @$data->email,
                    'phone' => @$data->phone,
                    'occupation' => @$data->occupation,
                    'join_date' => @$data->join_date,
                    'institution' => @$data->institution,
                    'nid' => @$data->nid,
                    'passport' => @$data->passport,
                    'designation' => @$data->designation->title,
                    'present_address' => @$data->present_address,
                    'nationality' => @$data->nationality,

                ];
            }),
        ];
    }
}
