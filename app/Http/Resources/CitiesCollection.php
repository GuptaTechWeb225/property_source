<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class CitiesCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return $this->collection->map(function ($data) {
                return [
                    'id'      => $data->id,
                    // 'country_id' => $data->country_id,
                    'name' => $data->name,
                    // 'cost' => $data->cost,
                ];
            });
    }

    public function with($request)
    {
        return [
            'success' => true,
            'status' => 200
        ];
    }
}
