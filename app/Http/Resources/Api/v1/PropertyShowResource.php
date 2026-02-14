<?php

namespace App\Http\Resources\Api\v1;

use Illuminate\Http\Resources\Json\JsonResource;

class PropertyShowResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'image' => @apiAssetPath($this->defaultImage->path),
            'deal_type' => $this->deal_type == 1 ? 'Rent' : 'Sell',
            'type' => $this->type == 1 ? 'Commercial' : 'Residential',
            'completion' => $this->completion == 1 ? 'Under Construction' : 'Completed',
            'total_unit' => $this->total_unit,
            'total_occupied' => $this->total_occupied,
            'total_rent' => $this->total_rent,
            'total_sell' => $this->total_sell,
            'address'    => @$this->location->address,
            'city' => @$this->location->city->name,
            'country' => @$this->location->country->name,
            'zip_code' =>@ $this->location->post_code,
            'size' => $this->size,
            'dining_combined' => $this->dining_combined,
            'bedroom' => $this->bedroom,
            'bathroom' => $this->bathroom,
            'rent_amount' => $this->rent_amount,
            'flat_no' => $this->flat_no,
            'description' => $this->description

        ];
    }
}
