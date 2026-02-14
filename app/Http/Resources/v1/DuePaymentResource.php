<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Resources\Json\ResourceCollection;

class DuePaymentResource extends ResourceCollection
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
            'list' => $this->collection->map(function ($dueData) {
                $list = [
                    'id' => $dueData->id,
                    'amount' => priceFormat($dueData->amount),
                    'paid_amount' => priceFormat($dueData->paid_amount),
                    'due_amount' => priceFormat($dueData->due_amount),
                    'payment_status' => $dueData->payment_status,
                    'property' => [
                        'id' => @$dueData->property->id,
                        'name' => @$dueData->property->name,
                        'slug' => @$dueData->property->slug,
                        'image' => apiAssetPath(@$dueData->property->defaultImage->path),
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
