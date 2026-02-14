<?php

namespace App\Http\Resources\Api\v1;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class CommitteeShowResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'phone' => $this->phone,
            'email' => $this->email,
            'status' => $this->status,
            'logo_id' => @apiAssetPath($this->image->path),
            'total_member' => $this->total_member,
            'total_admin' => $this->total_admin,
            'property' => [
                'name' => @$this->property->name,
                'image' => @apiAssetPath($this->property->defaultImage->path),
                'owner' => @$this->property->user->name
            ],
            'members' => $this->members->map(function ($member) {
                return [
                    'id' => $member->id,
                    'name' => @$member->user->name,
                    'email' => @$member->user->name,
                    'phone' => @$member->user->name,
                    'member_type' => $member->member_type,
                ];
            })
        ];
    }
}
