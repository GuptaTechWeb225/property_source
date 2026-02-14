<?php

namespace App\Repositories;

use App\Interfaces\CartInterface;
use App\Models\Advertisement;
use App\Models\Cart;
use App\Models\Property\Property;
use App\Models\Wishlist;
use App\Traits\ReturnFormatTrait;
use Brian2694\Toastr\Facades\Toastr;

class CartRepository implements CartInterface
{
    use ReturnFormatTrait;

    private $model;
    private $wishlistModel;

    public function __construct(Cart $model, Wishlist $wishlistModel)
    {
        $this->model = $model;
        $this->wishlistModel = $wishlistModel;
    }


    public function addToCart($request)
    {
        try {
            $data = $request->only('property_id', 'amount', 'advertisement_id');
            $advertisement = Advertisement::findOrFail($request->advertisement_id);
            $property = Property::findOrFail($request->input('property_id'));
            $data['discount_amount'] = calculatePercentage($property['discount_type'], $property['discount_amount'], $property['rent_amount']);
            if ($advertisement->advertisement_type == 1){
                $data['start_date']  = $advertisement->rent_start_date;
                $data['end_date']  = $advertisement->rent_end_date;
            }else{
                $data['start_date']  = $advertisement->sell_start_date;
            }
            $data['tenant_id'] = auth()->id();
            $has = $this->model->where('advertisement_id', $advertisement->id)
                ->where('property_id',$request->input('property_id'))
                ->where('tenant_id', auth()->id())
                ->first();
            if ($has){
                throw new \Exception('item already added in your cart!');
            }else{
                $this->model->firstOrCreate(['tenant_id' => auth()->id(),'advertisement_id' => $advertisement->id,'property_id' => $request->input('property_id')],$data);
            }

            $response['count'] = $this->model->where('tenant_id', auth()->user()->id)->count();
            return true;
        } catch (\Throwable $th) {
            throw $th;
        }
    }


    public function store($request)
    {

        try {

            $data = [];

            if ($cart = $this->model->where('property_id', $request->property_id)->where('tenant_id', \Auth::user()->id)->first()) {
                $data['count'] = $this->model->where('tenant_id', \Auth::user()->id)->count();
                $message = __('Property Already Added');
                toastr()->success($message);

                return $this->responseWithSuccess(_trans('alert.already_added'), $data);
            } else {

                if ($request->type == 2) {
                    $start_date = $request->start_date;
                    $end_date = null;
                } else {
                    $start_date = $request->start_date;
                    $end_date = $request->end_date;
                }

                $cart = new $this->model;
                $cart->property_id = $request->property_id;
                $cart->amount = $request->amount;
                $cart->start_date = $request->start_date;
                $cart->end_date = $request->end_date;
                $cart->type = $request->type == 1 ? 'rent' : 'buy';
                $cart->tenant_id = \Auth::user()->id;
                $cart->save();
            }


            $data['count'] = $this->model->where('tenant_id', \Auth::user()->id)->count();


            return $this->responseWithSuccess(_trans('alert.added_successfully'), $data);
        } catch (\Throwable $th) {
            return $this->responseWithError(_trans('alert.something_went_wrong_please_try_again'), []);
        }
    }

    public function wishlistStore($request)
    {
        try {

            $data = [];

            if ($cart = $this->wishlistModel->where('property_id', $request->property_id)->where('user_id', \Auth::user()->id)->first()) {
                $data['count'] = $this->wishlistModel->where('user_id', \Auth::user()->id)->count();
                $message = __('Wishlist Already Added');
                toastr()->success($message);
            } else {

                $cart = new $this->wishlistModel;
                $cart->property_id = $request->property_id;
                $cart->user_id = \Auth::user()->id;
                $cart->save();
            }


            $data['count'] = $this->wishlistModel->where('user_id', \Auth::user()->id)->count();


            return $this->responseWithSuccess(_trans('alert.added_successfully'), $data);
        } catch (\Throwable $th) {
            return $this->responseWithError(_trans('alert.something_went_wrong_please_try_again'), []);
        }
    }
}
