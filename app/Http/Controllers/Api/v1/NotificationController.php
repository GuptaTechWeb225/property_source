<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use App\Traits\ApiReturnFormatTrait;

class NotificationController extends Controller
{
    use ApiReturnFormatTrait;

    public function index()
    {
        try {
            $data = Notification::query()
                ->select('id','title','message','sender_id','receiver_id','is_read','created_by')
                ->orderBy('is_read', 'ASC')
                ->latest('created_at')
                ->when(!isSuperAdmin(), function ($q){
                    $q->where('receiver_id', auth()->id());
                })->get();
            return $this->successResponse('Notification List',$data,200);
        }catch (\Exception $e) {
            return $this->errorResponse($e->getMessage(), true, 200);
        }
    }


}


