<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\v1\OrderDetailResource;
use App\Http\Resources\Api\v1\OrderListResource;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Traits\ApiReturnFormatTrait;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    use ApiReturnFormatTrait;

    public function index(Request $request)
    {
        try {
            $keyword = $request->input('keyword');
            $limit = $request->input('limit', 10);

            $orders = Order::latest()
                ->when($keyword, function ($q) use ($keyword, $request) {
                    $q->where($keyword, 'LIKE', "%{$request->input('value')}%");
                })
                ->orderByDesc('id')
                ->paginate($limit);

            $responseData = new OrderListResource($orders);
            return $this->successResponse('success', $responseData);
        } catch (\Exception $exception) {
            return $this->responseExceptionError($exception->getMessage(), $exception->getTrace(), 500);
        }
    }


    public function orderDetails(Request $request, $id)
    {
        try {
            $limit = $request->input('limit', 10);
            $order = OrderDetail::with('property')->where('order_id', $id)->paginate($limit);
            $responseData = new OrderDetailResource($order);
            return $this->successResponse('success', $responseData);
        } catch (\Exception $exception) {
            return $this->responseExceptionError($exception->getMessage(), $exception->getTrace(), 500);
        }
    }
}
