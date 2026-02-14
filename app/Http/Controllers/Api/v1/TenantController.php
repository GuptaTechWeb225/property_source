<?php

namespace App\Http\Controllers\Api\v1;

use App\Enums\Role;
use App\Http\Controllers\Controller;
use App\Http\Requests\Tenant\TenantStoreRequest;
use App\Http\Requests\Tenant\TenantUpdateRequest;
use App\Http\Resources\Api\v1\AccountResource;
use App\Http\Resources\Api\v1\TenantListResource;
use App\Http\Resources\Api\v1\TenantShowResource;
use App\Http\Resources\v1\DuePaymentResource;
use App\Http\Resources\v1\OrderResource;
use App\Http\Resources\v1\WishlistResource;
use App\Interfaces\TenantInterface;
use App\Models\Account;
use App\Models\Advertisement;
use App\Models\Cart;
use App\Models\Document;
use App\Models\DuePayment;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Tenant;
use App\Models\Transaction;
use App\Models\Wishlist;
use App\Traits\ApiReturnFormatTrait;
use App\Utils\Utils;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TenantController extends Controller
{
    use ApiReturnFormatTrait;

    private $tenantInterface;

    function __construct(TenantInterface $tenantInterface)
    {
        $this->tenantInterface = $tenantInterface;
    }


    public function tenantList()
    {
        $authId = auth()->user();
        if ($authId->role_id == 1) {
            $data['tenant'] = Tenant::select('id', 'name')->get();
        } else {
            $data['tenant'] = Tenant::select('id', 'name')
                ->where('created_by')
                ->orWhereHas('orders.orderDetails.property', function ($query) {
                $query->where('user_id', auth()->id());
            })->get();
        }

        return $this->responseWithSuccess('Tenant List', $data, 200);
    }

    public function tenantAccountList(Request $request)
    {
        try {
            if (!$request->filled('id')){
                return $this->responseWithError('Tenant ID is required');
            }
            $tenant = Tenant::where('role_id', Role::TENANT)->where('id', $request->id)->first();
            if(!$tenant) {
                return $this->responseWithError('Tenant Account not found');
            }
            $accounts = Account::where('user_id', $tenant->id)->get();
            $responseData = new AccountResource($accounts);
            return $this->responseWithSuccess('Tenant Account List', $responseData);
        } catch (\Exception $exception) {
            $this->responseWithError($exception->getMessage(),'',500);
        }
    }

    public function index(Request $request)
    {
        try {
            $user = auth()->user();
            if ($user->role_id == Role::SUPER_ADMIN) {
                $tenants = Tenant::paginate($request->input('limit',10));
            } else {

                $tenants = Tenant::where('created_by', $user->id)->orWhereHas('orders.orderDetails.property', function ($query) {
                    $query->where('user_id', auth()->id());
                })->paginate($request->input('limit',10));
            }

            $responseData = new TenantListResource($tenants);
            return $this->successResponse('success', $responseData);
        } catch (\Exception $exception) {
            return $this->responseExceptionError($exception->getMessage(), $exception->getTrace(), 500);
        }
    }


    public function store(TenantStoreRequest $request)
    {
        try {
            $result = $this->tenantInterface->store($request);
            return $this->successResponse('success', $result);
        } catch (\Exception $exception) {
            return $this->responseExceptionError($exception->getMessage(), $exception->getTrace(), 500);
        }
    }


    public function show($id)
    {
        try {
            $tenant = $this->tenantInterface->show($id);
            $accounts = Account::where('user_id', $tenant->id)->get();
            $accountIds = $accounts->pluck('id');
            $transactions = Transaction::whereIn('account_id', $accountIds)->get();

            $documents  = Document::where('user_id', $id)->get();
            $responseData = [
                'id' => $tenant->id,
                'name' => $tenant->name,
                'email' => $tenant->email,
                'date_of_birth' => $tenant->date_of_birth,
                'gender' => $tenant->gender,
                'phone' => $tenant->phone,
                'alt_phone' => $tenant->alt_phone,
                'blood_group' => $tenant->blood_group,
                'avater' => @apiAssetPath($tenant->image->path),
                'social_security_number' => $tenant->social_security_number,
                'nationality' => $tenant->nationality,
                'tax_certificate' => $tenant->tax_certificate,
                'tin_number' => $tenant->tin_number,
                'marital_status' => $tenant->marital_status,
                'religion' => $tenant->religion,
                'basic_info' => [
                    'join_date' => $tenant->join_date,
                    'occupation' => $tenant->occupation,
                    'institution' => $tenant->institution,
                    'nid' => $tenant->nid,
                    'passport' => $tenant->passport,
                ],
                'accounts' => $accounts->map(function ($account) {
                    return [
                        'id' => $account->id,
                        'account_number' => $account->account_no,
                        'account_name' => $account->name,
                        'account_category' => @$account->category->name,
                        'bank_branch' => @$account->bank_branch,
                        'is_default' => $account->is_default,
                    ];
                }),
                'transactions' => $transactions->map(function ($transaction) {
                    return [
                        'id' => $transaction->id,
                        'date' => $transaction->date,
                        'type' => $transaction->type,
                        'account_name' => @$transaction->account->name,
                        'account_number' => @$transaction->account->account_no,
                        'reference_no' => $transaction->reference_no,
                        'payment_method' => $transaction->payment_method,
                        'trx_no' => $transaction->trx_no,
                        'amount' => $transaction->amount,
                        'bank_info' => $transaction->bank_info,
                    ];
                }),
                'documents' => $documents->map(function ($document) {
                    return [
                        'id' => $document->id,
                        'filename' => $document->filename,
                        'attachment_type' => $document->attachment_type,
                        'attachment' => @apiAssetPath($document->attachment->path),
                    ];
                }),
                'present_address' => [
                    'country' => @$tenant->permanentCountry->name,
                    'state' => @$tenant->permanentState->name,
                    'city' => @$tenant->permanentCity->name,
                    'address' => $tenant->address,
                ],
                'permanent_address' => [
                    'country' => @$tenant->country->name,
                    'state' => @$tenant->state->name,
                    'city' => @$tenant->city->name,
                    'address' => $tenant->present_address,
                ],
            ];
            return $this->successResponse('Tenant show', $responseData);
        } catch (\Exception $exception) {
            return $this->responseExceptionError($exception->getMessage(), $exception->getTrace(), 500);
        }
    }


    public function update(TenantUpdateRequest $request, $id)
    {
        try {
            $result = $this->tenantInterface->update($request, $id);
            return $this->successResponse('success', $result);
        } catch (\Exception $exception) {
            return $this->responseExceptionError($exception->getMessage(), $exception->getTrace(), 500);
        }
    }

    public function dashboard()
    {
        try {
            $tenant_id = Auth::id();
            $data['statistics']['total_order'] = Order::where('tenant_id', $tenant_id)->count();
            $data['statistics']['wishlist'] = Wishlist::where('user_id', $tenant_id)->count();
            $data['statistics']['purchase_amount'] = Order::where('tenant_id', $tenant_id)->sum('grand_total');
            $data['statistics']['used_coupons'] = Order::where('tenant_id', $tenant_id)->whereNotNull('coupon_code')->count();
            $data['statistics']['cart'] = Cart::where('tenant_id', $tenant_id)->count();
            $data['statistics']['complete_order'] = Order::whereHas('orderDetails', function ($query) {
                $query->where('payment_status', 'approved');
            })->where('tenant_id', $tenant_id)->count();

            $data['order_history'] = Order::select('id', 'invoice_no', 'date', 'grand_total', 'discount_amount', 'paid_amount', 'due_amount')
                ->where('tenant_id', $tenant_id)
                ->take(5)
                ->get();

            return $this->successResponse('success', $data);
        } catch (\Exception $exception) {
            return $this->responseExceptionError($exception->getMessage(), $exception->getTrace(), 500);
        }
    }


    public function orders(Request $request)
    {
        try {
            $limit = $request->input('limit', 10);
            $tenant_id = Auth::id();
            $orders = Order::with(["orderDetails"])->where('tenant_id', $tenant_id)->paginate($limit);
            $responseData = new OrderResource($orders);

            return $this->successResponse('success', $responseData);
        } catch (\Exception $exception) {
            return $this->responseExceptionError($exception->getMessage(), $exception->getTrace(), 500);
        }
    }


    public function orderDetails($id)
    {
        try {
            $order_details = orderDetail::select('id', 'order_id', 'property_id', 'advertisement_id', 'start_date', 'end_date', 'price', 'discount_amount', 'total_amount', 'payment_status', 'status')
                ->with('property', 'assets.attachment')->findOrFail($id);
            $advertisement = Advertisement::findOrFail($order_details->advertisement_id);
            $property = $order_details->property;
            $responseData = [
                'id' => $order_details->id,
                'order_id' => $order_details->order_id,
                'property_id' => $order_details->property_id,
                'advertisement_id' => $order_details->advertisement_id,
                'start_date' => $order_details->start_date,
                'end_date' => $order_details->end_date,
                'price' => $order_details->price,
                'discount_amount' => $order_details->discount_amount,
                'total_amount' => $order_details->total_amount,
                'payment_status' => $order_details->payment_status,
                'status' => $order_details->status,
                'property' => [
                    'id' => $property->id,
                    'advertise_id' => $property->id,
                    'name' => $property->name,
                    'slug' => $property->slug,
                    'address' => @$property->location->country->name ?? '-',
                    'bedrooms' => $property->bedroom,
                    'bathrooms' => $property->bathroom,
                    'size' => $property->size,
                    'rent_type' => $property->rent_type == 1 ? 'Monthly' : null,
                    'image' => apiAssetPath($property->defaultImage->path),
                    'type' => $property->type,
                    'vacant' => $property->vacant == 1 ? 'Vacant' : 'Occupied',
                    'flat_no' => $property->flat_no,
                    'completion' => $property->completion == 1 ? 'Ready' : 'Under Construction',
                    'deal_type_name' => Utils::advertisementTypes()[$advertisement->advertisement_type],
                    'deal_type' => $advertisement->advertisement_type,
                    'category' => @$property->category->name,
                ]
            ];
            return $this->successResponse('success', $responseData);
        } catch (\Exception $exception) {
            return $this->responseExceptionError($exception->getMessage(), $exception->getTrace(), 500);
        }
    }


    public function wishlist(Request $request)
    {
        try {
            $limit = $request->input('limit', 10);
            $tenant_id = Auth::id();
            $wishlist = Wishlist::with('property')
                ->where('user_id', $tenant_id)
                ->paginate($limit);
            $responseData = new WishlistResource($wishlist);
            return $this->successResponse('success', $responseData);
        } catch (\Exception $exception) {
            return $this->responseExceptionError($exception->getMessage(), $exception->getTrace(), 500);
        }
    }


    public function duePayment(Request $request)
    {
        try {
            $limit = $request->input('limit', 10);
            $tenant_id = Auth::id();
            $duepayment = DuePayment::with('orderDetail')->where('tenant_id', $tenant_id)
                ->paginate($limit);
            $responseData = new DuePaymentResource($duepayment);
            return $this->successResponse('success', $responseData);
        } catch (\Exception $exception) {
            return $this->responseExceptionError($exception->getMessage(), $exception->getTrace(), 500);
        }
    }
}
