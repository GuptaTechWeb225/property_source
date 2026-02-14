<?php

namespace App\Http\Resources\Api\v1;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class BillListResource extends ResourceCollection
{

    public function toArray($request)
    {
        $current_page = $this->currentPage();
        $total_pages = $this->lastPage();
        $base_url = \request()->url();

        return [
            'list' => $this->collection->map(function ($data) {
                return [
                    'id' => $data->id,
                    'due_date' => $data->due_date,
                    'property_id' => $data->property->name,
                    'tenant_id' => $data->tenant->id,
                    'month' => $data->month,
                    'amount' => $data->amount,
                    'payment_status' => $data->payment_status,
                    'status' => $data->status,
                    'fine_amount' => $data->fine_amount,
                    'total_amount' => $data->total_amount,
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
