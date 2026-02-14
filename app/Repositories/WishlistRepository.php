<?php

namespace App\Repositories;

use App\Models\Cart;
use App\Models\Wishlist;
use App\Interfaces\CartInterface;
use App\Traits\ReturnFormatTrait;
use App\Interfaces\WishlistInterface;

class WishlistRepository implements WishlistInterface
{
    use ReturnFormatTrait;

    private $model;
    private $wishlistModel;

    public function __construct(Wishlist $wishlistModel)
    {
        $this->wishlistModel = $wishlistModel;
    }

    public function store($request)
    {
        try {

            $data          = [];

            if ($cart = $this->wishlistModel->where('property_id', $request->property_id)->where('user_id', \Auth::user()->id)->first()) {
                $data['count'] = $this->wishlistModel->where('user_id', \Auth::user()->id)->count();
                return $this->responseWithSuccess(_trans('alert.already_added'), $data);
            } else {

                $cart              = new $this->wishlistModel;
                $cart->property_id = $request->property_id;
                $cart->user_id   = \Auth::user()->id;
                $cart->save();
            }



            $data['count'] = $this->wishlistModel->where('user_id', \Auth::user()->id)->count();




            return $this->responseWithSuccess(_trans('alert.added_successfully'), $data);
        } catch (\Throwable $th) {
            return $this->responseWithError(_trans('alert.something_went_wrong_please_try_again'), []);
        }
    }
}
