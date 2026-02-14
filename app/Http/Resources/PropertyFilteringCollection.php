<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class PropertyFilteringCollection extends ResourceCollection
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
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'address' => $this->address,
            'bedrooms' => $this->bedrooms,
            'bathrooms' => $this->bathrooms,
            'size' => $this->size,
            'price' => $this->rent_amount,
            'image' => apiAssetPath($this->defaultImage->path),
            'type' => $this->type,
            'vacant' => $this->vacant == 1 ? 'Vacant' : 'Occupied',
            'details_url' =>  url("property/".$property->id."/details"."/".$property->slug ), // url("property/".$property->id."/details"."/".$property->slug )
        ];

    }

}
