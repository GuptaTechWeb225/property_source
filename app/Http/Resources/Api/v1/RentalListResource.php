<?php

namespace App\Http\Resources\Api\v1;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class RentalListResource extends ResourceCollection
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $current_page = $this->currentPage();
        $total_pages = $this->lastPage();
        $base_url = \request()->url();

        return [
            'list' => $this->collection->map(function ($data) {
                return [
                    'id' => $data->id,
                    'for' => @$data->advertisement->advertisement_type == 1 ? 'Rent' : 'Sell',
                    'duration' => date('M d Y', strtotime($data->start_date)). '-'. isset($data->end_date) ? date('M d Y', strtotime($data->start_date)) : 'Lifetime',
                    'is_buy' => $data->is_buy,
                    'price' => $data->advertisement->advertisement_type == 1 ? priceFormat($data->advertisement->rent_amount) : priceFormat($data->advertisement->sell_amount),
                    'paid_amount' => priceFormat($data->payments->sum('amount')),
                    'due_amount' => priceFormat($data->total_amount - $data->payments->sum('amount')),
                    'payment_status' => $data->payment_status,
                    'status' => $data->status,
                    'tenant' => @$data->order->tenant->name,
                    'property' => [
                        'name' => @$data->property->name,
                        'image' => @apiAssetPath($data->property->defaultImage->path),
                        'owner' => @$data->property->user->name
                    ],
                ];
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
