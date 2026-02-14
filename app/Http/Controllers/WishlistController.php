<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\CartRepository;
use App\Traits\AjaxReturnFormatTrait;


class WishlistController extends Controller
{
    use AjaxReturnFormatTrait;
    private $repo;

    function __construct(CartRepository $repo)
    {
        $this->repo = $repo;
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
