<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Resources\Json\ResourceCollection;

class WishlistResource extends ResourceCollection
{

    public function toArray($request)
    {
        $current_page = $this->currentPage();
        $total_pages = $this->lastPage();
        $base_url = \request()->url();
        return [
            'list' => $this->collection->map(function ($wishlist) {
                $data = @$wishlist->property;
                $list = [
                    'id' => $wishlist->id,
                    'created_at' => date('F d Y', strtotime($wishlist->created_at)),
                    'property' => [
                        'id' => $data->id,
                        'name' => $data->name,
                        'slug' => $data->slug,
                        'address' => $data->address,
                        'bedrooms' => $data->bedroom,
                        'bathrooms' => $data->bathroom,
                        'size' => $data->size,
                        'price' => priceFormat($data->rent_amount),
                        'image' => apiAssetPath($data->defaultImage->path),
                        'type' => $data->type,
                        'vacant' => $data->vacant == 1 ? 'Vacant' : 'Occupied',
                        'flat_no' => $data->flat_no,
                        'completion' => $data->completion == 1 ? 'Ready' : 'Under Construction',
                        'deal_type' => $data->deal_type == 1 ? 'Rent' : 'Sale',
                        'category' => $data->category->name,
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
