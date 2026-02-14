<?php

namespace App\Http\Resources\Api\v1;

use App\Utils\Utils;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class PropertyListResource extends ResourceCollection
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
                    'name' => $data->name,
                    'image' => @apiAssetPath($data->defaultImage->path),
                    'deal_type' => @Utils::advertisementTypes()[$data->deal_type],
                    'type' => $data->type == 1 ? 'Commercial' : 'Residential',
                    'completion' => $data->completion == 1 ? 'Completed' : 'Under Construction',
                    'status' => $data->status,
                    'total_unit' => $data->total_unit,
                    'total_occupied' => $data->total_occupied,
                    'total_rent' => $data->total_rent,
                    'total_sell' => $data->total_sell,
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
