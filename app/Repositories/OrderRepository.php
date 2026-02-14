<?php

namespace App\Repositories;

use App\Interfaces\OrderInterface;
use App\Models\DuePayment;
use App\Models\MasterOrder;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Property\PropertyTenant;
use App\Models\PropertyStatus;
use App\Services\NotificationService;
use App\Services\PropertyStatusService;
use Carbon\Carbon;
use App\Traits\CommonHelperTrait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

//use Your Model

/**
 * Class CategoryRepository.
 */
class OrderRepository implements OrderInterface
{
    use CommonHelperTrait;

    private Order $model;
    protected $propertyStatus;

    public function __construct(Order $model, PropertyStatusService $propertyStatusService)
    {
        $this->model = $model;
        $this->propertyStatus = $propertyStatusService;
    }

    public function index($request)
    {
        return Order::all();
    }

    public function status($request)
    {
        return $this->model->whereIn('id', $request->ids)->update(['status' => $request->status]);
    }

    public function deletes($request)
    {
        return $this->model->destroy((array)$request->ids);
    }

    public function getAll()
    {
        return Order::latest()->paginate(15);
    }

    public function store($request)
    {
        try {
            DB::beginTransaction();
            $tenant_id = $request->input('tenant_id');
            $grand_total  = $request->input('grand_total');

            $carts = session()->get('order_cart',[]);
            if (count($carts) < 1 ) {
                throw  new  \Exception(_trans('alert.Cart can not be empry!'));
            }
            $order = new Order;
            $order->invoice_no = uniqid();
            $order->tenant_id = $tenant_id;
            $order->date = date('Y-m-d',time());
//            $order->coupon_code = $tenant_id;
            $order->subtotal = $request->input('subtotal');
            $order->discount_amount = $request->input('discount_amount');
//            $order->coupon_amount = $tenant_id;
            $order->grand_total = $grand_total;
            $order->paid_amount = 0;
            $order->due_amount = $grand_total;
            $order->created_by = Auth::id();
            $order->updated_by = Auth::id();
            $order->save();

            foreach ($carts as $item) {
                $orderDetails =  new OrderDetail();
                $orderDetails->order_id =  $order->id;
                $orderDetails->property_id =  $item['property_id'];
                $orderDetails->advertisement_id =  $item['advertisement_id'];
                $orderDetails->start_date =  $item['start_date'];
                $orderDetails->end_date =  $item['end_date'];
                $orderDetails->is_buy =  $item['is_buy'];
                $orderDetails->price =  $item['price'];
                $orderDetails->discount_amount =  $item['discount_amount'];
                $orderDetails->total_amount =  $item['total_amount'];

                $orderDetails->save();

                $this->propertyStatus->updatePropertyStatus($orderDetails->property_id,$orderDetails,'occupied',true,$order->tenant_id);
                NotificationService::notify(\auth()->id(),@$orderDetails->property->user_id,'Placed a new order','You have a new order'.' Invoice ID '. $order->invoice_no);

            }
            session()->forget('order_cart');

//            $tenant = new PropertyTenant();
//            $tenant->property_id = $property_id;
//            $tenant->user_id = $tenant_id;
//            $tenant->start_date = $start_date;
//            $tenant->end_date = $end_date;
//            $tenant->save();
            DB::commit();
            return true;
        } catch (\Throwable $th) {
            DB::rollBack();
            return false;

        }
    }

    public function show($id)
    {
        return $this->model->find($id);
    }

    public function update($request, $id)
    {
        try {
            $categoryUpdate = $this->model->findOrfail($id);
            $categoryUpdate->title = $request->title;
            $categoryUpdate->subtitle = $request->subtitle;
            $categoryUpdate->description = $request->description;
            $categoryUpdate->short_description = $request->short_description;
            $categoryUpdate->slug = $request->slug;
            $categoryUpdate->status = $request->status;
            $categoryUpdate->image_id = $this->UploadImageUpdate($request->image, 'backend/uploads/categories', $categoryUpdate->image_id);
            $categoryUpdate->icon_id = $this->UploadIconUpdate($request->icon, 'backend/uploads/categories/icons', $categoryUpdate->icon_id);
            $categoryUpdate->save();
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function destroy($id)
    {
        try {
            $categoryDestroy = $this->model->find($id);
            $this->UploadImageDelete($categoryDestroy->image_id); // delete image & record
            $this->UploadIconDelete($categoryDestroy->icon_id); // delete image & record
            $categoryDestroy->delete();
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }


}
