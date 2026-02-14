<?php

namespace App\Http\Resources\Api\v1;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class OrderListResource extends ResourceCollection
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
            'list' => $this->collection->map(function ($orderData) {
                return [
                    'id' => $orderData->id,
                    'invoice_no' => $orderData->invoice_no,
                    'tenant_id' => $orderData->tenant_id,
                    'billing_address_id' => $orderData->billing_address_id,
                    'date' => $orderData->date,
                    'subtotal' => priceFormat($orderData->subtotal),
                    'discount_amount' => priceFormat($orderData->discount_amount),
                    'coupon_amount' => priceFormat($orderData->coupon_amount),
                    'grand_total' => priceFormat($orderData->grand_total),
                    'paid_amount' => priceFormat($orderData->paid_amount),
                    'due_amount' => priceFormat($orderData->due_amount),
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
