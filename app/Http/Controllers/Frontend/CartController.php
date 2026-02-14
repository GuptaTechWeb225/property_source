<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\CartRepository;
use App\Traits\AjaxReturnFormatTrait;

class CartController extends Controller
{
    use AjaxReturnFormatTrait;
    private $repo;

    function __construct(CartRepository $repo)
    {
        $this->middleware('auth');
        $this->repo = $repo;
    }


    public function addToCart(Request $request)
    {
        $request->validate([
            'property_id' => 'required',
            'amount' => 'required',
            'advertisement_id' => 'required',
        ]);

        try {
            $result = $this->repo->addToCart($request);
            if ($result){
                return redirect()->route('customer.cart')->with('success','alert.Item successfully added to cart');
            }
        }catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function store(Request $request)
    {
        $result = $this->repo->store($request);
        if($result['status']){
            return $this->responseWithSuccess($result['message'], $result['data'], \App\Enums\ApiStatus::SUCCESS);
        }
        return $this->responseWithError($result['message'], [], \App\Enums\ApiStatus::ERROR);
    }
    public function wishlistStore(Request $request)
    {
        $result = $this->repo->wishlistStore($request);

        if($result['status']){
            return $this->responseWithSuccess($result['message'], $result['data'], \App\Enums\ApiStatus::SUCCESS);
        }
        return $this->responseWithError($result['message'], [], \App\Enums\ApiStatus::ERROR);

    }
}
