<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class PropertyAdCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return $this->collection->map(function ($list) {
            return [
                'id' => $list->id,
                'name' => $list->name,
                'slug' => $list->slug,
                'address' => $list->address,
                'bedrooms' => $list->bedroom,
                'bathrooms' => $list->bathroom,
                'size' => $list->size,
                'price' => $list->rent_amount,
                'image' => apiAssetPath($list->defaultImage->path),
                'type' => $list->type,
                'vacant' => $list->vacant == 1 ? 'Vacant' : 'Occupied',
                'details_url' =>  url("property/" . $list->id . "/details" . "/" . $list->slug),  //
                'flat_no' => $list->flat_no,
                'completion' => $list->completion == 1 ? 'Ready' : 'Under Construction',
                'deal_type' => $list->deal_type == 1 ? 'Rent' : 'Sale',
                'category' => $list->category->name,

            ];
        });
    }
}
