<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Resources\Json\ResourceCollection;

class OrderResource extends ResourceCollection
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
                    'invoice_no' => $data->invoice_no,
                    'date' => $data->date,
                    'discount_amount' => $data->discount_amount,
                    'grand_total' => $data->grand_total,
                    'paid_amount' => $data->paid_amount,
                    'due_amount' => $data->due_amount,
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
