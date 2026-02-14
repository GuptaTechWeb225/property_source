<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class HomeSliderCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return [
            $this->collection->map(function ($data) {
                return [
                    'id' => $this->id,
                    'title' => $this->title,
                    'highlight_title' => $this->highlight_title_one,
                    'btn_one' => $this->btn_one,
                    'image' => globalAsset($this->image->path),
                ];
            })
        ];
    }
}
