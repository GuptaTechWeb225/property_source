<?php

namespace App\Http\Resources\Api\v1;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class OrderDetailResource extends ResourceCollection
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $current_page = $this->currentPage();
        $total_pages = $this->lastPage();
        $base_url = \request()->url();

        return [
            'list' => $this->collection->map(function ($details) {
                $list = [
                    'id' => $details->id,
                    'order_id' => $details->order_id,
                    'property_id' => $details->property_id,
                    'advertisement_id' => $details->advertisement_id,
                    'start_date' => $details->start_date,
                    'end_date' => $details->end_date,
                    'price' => priceFormat($details->price),
                    'discount_amount' => priceFormat($details->discount_amount),
                    'total_amount' => priceFormat($details->total_amount),
                    'payment_status' => $details->payment_status,
                    'status' => $details->status,
                    'property' => [
                        'id' => @$details->property->id,
                        'name' => @$details->property->name,
                        'slug' => @$details->property->slug,
                        'image' => apiAssetPath(@$details->property->defaultImage->path),
                    ]
                ];
                return $list;
            }),
            'links' => [
                "first" => $base_url . "?page=1",
                "last" => $base_url . "?page=" . $total_pages,
                "prev" => $current_page > 1 ? $base_url . "?page=" . ($current_page - 1) : null,
                "next" => $current_page < $total_pages ? $base_url . "?page=" . ($current_page + 1) : null,
            ],
            'pagination' => [
                'total' => $this->total(),
                'count' => $this->count(),
                'per_page' => $this->perPage(),
                'current_page' => $this->currentPage(),
                'total_pages' => $this->lastPage(),
            ],
        ];
    }
}
