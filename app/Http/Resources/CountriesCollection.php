<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class CountriesCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return $this->collection->map(function($data) {
                return [
                    'id'      => $data->id,
                    'code' => $data->iso2,
                    'name' => $data->name,
                    'status' => $data->status,
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
