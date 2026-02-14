<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\v1\RentalListResource;
use App\Http\Resources\Api\v1\TenantListResource;
use App\Interfaces\RentalInterface;
use App\Models\OrderDetail;
use App\Models\Property\Property;
use App\Models\Tenant;
use App\Traits\ApiReturnFormatTrait;
use Illuminate\Http\Request;

class RentalController extends Controller
{
    use ApiReturnFormatTrait;


    public function index(Request $request)
    {
        try {
            $limit = $request->input('limit', 10);
            $rentals = OrderDetail::with('advertisement','property','payments','order.tenant')
                ->when($request->input('tenant_id'), function ($query) use ($request){
                    $query->whereHas('order', function ($query) use ($request){
                        $query->where('tenant_id',$request->input('tenant_id'));
                    });
                })
                ->when($request->input('property_id'), function ($query) use ($request){
                    $query->where('property_id', $request->input('property_id'));
                })
                ->when($request->input('payment_status'), function($query) use($request){
                    $query->where('payment_status', $request->input('payment_status'));
                })
                ->when($request->input('status'), function($query) use($request){
                    $query->where('status', $request->input('status'));
                })
                ->latest()
                ->paginate($limit);
            $responseData = new RentalListResource($rentals);
            return $this->successResponse('success', $responseData);
        } catch (\Exception $exception) {
            return $this->responseExceptionError($exception->getMessage(), $exception->getTrace(), 500);
        }
    }
}
