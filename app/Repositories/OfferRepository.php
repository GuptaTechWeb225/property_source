<?php


namespace App\Repositories;


use App\Interfaces\OfferInterface;
use App\Models\PropertyOffer;
use Illuminate\Support\Facades\Auth;

class OfferRepository implements OfferInterface
{

    protected $offer;

    public function __construct(PropertyOffer $propertyOffer)
    {
        $this->offer = $propertyOffer;
    }

    public function offerList()
    {
        return $this->offer->with('property', 'advertisement')
            ->where('user_id', auth()->id())
            ->get();
    }

    public function offerPaginate($request)
    {
        $userId = Auth::id();
       return $this->offer->with('property','user:id,name,email,phone,image_id','user.image')->whereHas('property', function($query) use ($userId) {
            $query->where('user_id', $userId);
        })->paginate($request->input('limit', 6));
    }

    public function find($id)
    {
        return $this->offer->findOrFail($id);
    }

    public function store($request)
    {
        try {
            $offer = new  $this->offer();
            $offer->user_id  = auth()->id();
            $offer->property_id = $request->property_id;
            $offer->advertisement_id = $request->advertisement_id;
            $offer->price = $request->price;
            $offer->offer_price = $request->offer_price;
            $offer->save();

            return true;
        }catch (\Exception $e) {
            throw $e;
        }
    }
}
