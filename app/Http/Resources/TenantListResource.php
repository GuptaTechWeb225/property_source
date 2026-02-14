<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TenantListResource extends JsonResource
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
            'items' => $request->map(function ($data) {
                return [
                    'id' => @$data->id,
                    'name' => @$data->user->name,
                    'email' => @$data->user->email,
                    'phone' => @$data->user->phone,
                ];
            }),
        ];
    }
}
