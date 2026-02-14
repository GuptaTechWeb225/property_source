<?php

namespace App\Http\Resources\Api\v1;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class AccountListResource extends ResourceCollection
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
                    'account_category' => @$data->category->name,
                    'name' => $data->name,
                    'account_no' => $data->account_no,
                    'balance' => $data->balance,
                    'is_default' => $data->is_default,
                    'details' => $data->details,
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
