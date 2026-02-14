<?php


namespace App\Http\Resources\Api\v1;


use App\Enums\DealType;
use App\Utils\Utils;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class CategoryProepertyListResource extends ResourceCollection
{

    public function toArray($request)
    {
        return [
            'list' => $this->collection->map(function ($data) {
                return [
                    'id' =>  @$data->property->id,
                    'advertise_id' =>  $data->id,
                    'name' => @$data->property->name,
                    'slug' => @$data->property->slug,
                    'address' => @@$data->property->location->country->name ?? '-',
                    'bedrooms' => @$data->property->bedroom,
                    'bathrooms' => @$data->property->bathroom,
                    'size' => @$data->property->size,
                    'booking_amount' => priceFormat($data->booking_amount),
                    'price' => $this->getPrice($data),
                    'discount_amount' => @$data->property->discount_type == 'fixed' ? priceFormat(@$data->property->discount_amount) : @$data->property->discount_amount . '%',
                    'discount_type' => @$data->property->discount_type,
                    'rent_type' => $data->rent_type == 1 ? 'Monthly' : null,
                    'image' => apiAssetPath(@$data->property->defaultImage->path),
                    'type' => @$data->property->type,
                    'vacant' => @$data->property->vacant == 1 ? 'Vacant' : 'Occupied',
                    'flat_no' => @$data->property->flat_no,
                    'completion' => @$data->property->completion == 1 ? 'Ready' : 'Under Construction',
                    'deal_type' => Utils::advertisementTypes()[$data->advertisement_type],
                    'category' => @$data->property->category->name,
                    'owner' => [
                        'id' => @$data->property->user->id,
                        'name' => @$data->property->user->name,
                        'email' => @$data->property->user->email,
                        'phone' => @$data->property->user->phone,
                    ]
                ];
            }),
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
