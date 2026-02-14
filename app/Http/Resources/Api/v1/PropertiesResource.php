<?php

namespace App\Http\Resources\Api\v1;

use App\Enums\DealType;
use App\Utils\Utils;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class PropertiesResource extends JsonResource
{

    public function toArray($request)
    {
        $property = @$this->property;
        return [
            'id' => $property->id,
            'advertise_id' => $this->id,
            'name' => $property->name,
            'slug' => $property->slug,
            'address' => @$property->location->country->name ?? '-',
            'bedrooms' => $property->bedroom,
            'bathrooms' => $property->bathroom,
            'size' => $property->size,
            'booking_amount' => priceFormat($this->booking_amount),
            'price' => $this->getPrice($this),
            'discount_amount' => $property->discount_type == 'fixed' ? priceFormat($property->discount_amount) : $property->discount_amount . '%',
            'discount_type' => $property->discount_type,
            'rent_type' => $this->rent_type == 1 ? 'Monthly' : null,
            'image' => apiAssetPath($property->defaultImage->path),
            'type' => $property->type,
            'vacant' => $property->vacant == 1 ? 'Vacant' : 'Occupied',
            'flat_no' => $property->flat_no,
            'completion' => $property->completion == 1 ? 'Ready' : 'Under Construction',
            'deal_type' => Utils::advertisementTypes()[$this->advertisement_type],
            'category' => @$property->category->name,
            'owner' => [
                'id' => @$property->user->id,
                'name' => @$property->user->name,
                'email' => @$property->user->email,
                'phone' => @$property->user->phone,
            ]
        ];
    }


    public function getPrice($advertisement)
    {
        $amount = 0;
        if ($advertisement->advertisement_type == DealType::RENT) {
            $amount = $advertisement->rent_amount;

        } elseif ($advertisement->advertisement_type == DealType::SELL) {
            $amount = $advertisement->sell_amount;
        }elseif($advertisement->advertisement_type == DealType::MORTGAGE){
            $amount = $advertisement->mortgage_amount;
        }elseif($advertisement->advertisement_type == DealType::LEASE){
            $amount = $advertisement->lease_amount;
        }

        return priceFormat($amount);
    }
}
