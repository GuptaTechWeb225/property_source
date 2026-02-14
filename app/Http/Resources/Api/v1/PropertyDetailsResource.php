<?php

namespace App\Http\Resources\Api\v1;

use App\Enums\DealType;
use App\Utils\Utils;
use Illuminate\Http\Resources\Json\JsonResource;

class PropertyDetailsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
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
            'details_url' =>  route('properties.details', ['slug' => $property->slug, 'advertise_id' => $this->id]),  //
            'flat_no' => $property->flat_no,
            'completion' => $property->completion == 1 ? 'Ready' : 'Under Construction',
            'deal_type' => $this->advertisement_type == 1 ? 'Rent' : 'Sale',
            'category' => @$property->category->name,
            'description' => $property->description,
            'user_email' => @$property->user->email,
            'user_phone' => @$property->user->phone,
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
