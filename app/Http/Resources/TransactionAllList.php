<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class TransactionAllList extends ResourceCollection
{
    public function toArray($request)
    {

        $current_page = $this->currentPage();
        $total_pages = $this->lastPage();
        $base_url = \request()->url();

        return [

            'list' => $this->collection->map(function ($data) {
                return [
                    'type' => [
                        'id' => @$data->id,
                        'type' => @$data->type,
                    ],
                    'property_name' => [
                        'id' => @$data->id,
                        'name' => @$data->property->name,
                    ],
                    'tenant_name' => [
                        'id' => @$data->id,
                        'name' => @$data->tenant->user->name,
                    ],
                    


                ];
            }),
            'links' => [
                "first" =>  $base_url . "?page=1",
                "last" =>   $base_url . "?page=" . $total_pages,
                "prev" =>   $current_page > 1 ? $base_url . "?page=" . ($current_page - 1) : null,
                "next" =>   $current_page < $total_pages ? $base_url . "?page=" . ($current_page + 1) : null,
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
